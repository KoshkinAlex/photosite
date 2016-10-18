/*
** Photo Slider 1.0 08/08/07
**  Author: Jesse Janzer
**   jjanzer@lanthera.net http://jjanzer.subculture.org
**  Tutorial Site: http://opiefoto.com/articles/slider
**
** You may use this library for any purpose.
**
** If you find it useful feel free to give me credit and link to
**  the original tutorial site http://opiefoto.com/articles/slider
*/

var FOTO = { };
var SKEL = { };
SKEL.EFFECTS = { };

FOTO.Slider = {
	bucket : { }, //a hash containing our thumbnails & images
	imageCache : { }, //cache of the images so the preloaded images aren't overwritten in some browsers
	loadingURL : '/articles/assets/slider/spinner.gif',
	baseURL : '',
	thumbURL : '{ID}',
	mainURL : '{ID}',

	duration: 3000, //how long do we look at each image?

	data : { }, //contains things like current offset, paused, etc keyed off of the slider id

	//returns the URL for our thumbnails and large images
	getUrlFromId: function(id,isThumb){

		//do we have this url in our bucket?
		if(this.bucket != null && this.bucket[id] != null){
			if(isThumb && this.bucket[id]['thumb'] != null){
				return this.baseURL+this.bucket[id]['thumb'];
			} else if (!isThumb && this.bucket[id]['main'] != null){
			return this.baseURL+this.bucket[id]['main'];
			}
		}

		//we don't have it stored, so generate it
		if(isThumb)
			return this.baseURL+this.thumbURL.replace('{ID}',id);
		return this.baseURL+this.mainURL.replace('{ID}',id);
	},

	/*
	//returns the caption for the image
	getCaptionFromId: function(id){
		if(this.bucket != null && this.bucket[id] != null){
			return this.bucket[id]['caption'];
		}
	},
*/
	
	//ids is just an array
	importBucketFromIds: function(ids){
		this.bucket = new Object(); //replace any existing entries with this new set
		for(i in ids){
			this.bucket[ids[i]] = new Object(); //there isn't any reason to pre-store the urls for this
			//this.bucket[i]['thumb'] = this.getUrlFromId(i,true);
			//this.bucket[i]['main'] = this.getUrlFromId(i,false);
		}
	},

	buildThumbBar: function(bar){
		if(this.bucket == null){
			return false;
		}

		var slot = 0;

		for(i in this.bucket){
			var div = $(document.createElement('div'));
			div.attr('imageid',i);
			div.attr('slot',slot++);
			div.addClass('photoslider_thumb');

			var img = document.createElement('img');
			img.src = this.getUrlFromId(i,true);

			//attach the image to the div
			div.append(img);

			//attach the div to our thumbnail bar
			$(bar).append(div);

			//calc the width (needed for later)
			/*
			this.data['thumbWidth'] =
				parseInt(div.css('width'))
				+parseInt(div.css('border-left-width'))
				+parseInt(div.css('border-right-width'))
				+parseInt(div.css('margin-left'))
				+parseInt(div.css('margin-right'))
				+parseInt(div.css('padding-left'))
				+parseInt(div.css('padding-right'));
				alert (this.data['thumbWidth']);
				*/
		}

		//we need to add a clear since we have floating divs
		var clear = document.createElement('div');
		$(clear).addClass('photoslider_clear');

		//finally we need to force the width of the bar so that the divs don't wrap to the next line
		// we give it 1 extra slot just for buffer
		$(bar).css('width',((slot+1)*this.data['thumbWidth'])+'px')


		$(bar).append(clear);
	},

	//loads in the slideshow, replaces the existing one if set
	reload: function(){

		if(this.data == null){
			this.data = new Object();
		}
		
		this.data['thumbWidth'] = 87;
		this.data['paused'] = true;
		this.data['currentSlot'] = 0;
		this.data['currentId'] = null;


		//sliderDiv.append(sliderNav);
       
		thumbBar = $(document.createElement('div'));
		thumbBar.addClass('photoslider_thumbBar');
		
		//build the bar
		this.buildThumbBar(thumbBar);

		//now we need to attach our events
		$(thumbBar).children('.photoslider_thumb').each(function(){
			//what happens when we click on a thumbnail?
			$(this).click(function(ev){
				FOTO.Slider.thumbClick(ev);
			});
		});

		//attach our thumb nail bar to our parent
		//sliderNav.append(thumbBar);
		
		var thumbBarContainer = $('#thumbBarContainer');
		thumbBarContainer.append(thumbBar);


	},
	
	showImg: function(id) {	
		var firstThumb = $('#thumbBarContainer .photoslider_thumb[slot='+ id +']');
		firstThumb.click();
	},
	
	
	thumbClick: function(ev){
		//find our main parent
		var thumb = null;

		if(ev.currentTarget){
			thumb = $(ev.currentTarget);
		} else if(ev.srcElement){
			//work around for IE's lack of currentTarget
			if( $(ev.srcElement).attr('src') == null){
				//they clicked on the div
				thumb = $(ev.srcElement);
			} else {
				//they clicked on the img
				thumb = $(ev.srcElement).parent();
			}
		}	else if (ev.target) {
			thumb = $(ev.target);
		}

		var id = thumb.attr('imageid');
		var bar = thumb.parent();
		var nav = bar.parent();
		var parent = nav.parent();
		var slot = thumb.attr('slot');
		if(id == null){
			id = 0;
		}
		if(slot == null){
			slot = 0;
		}

		//window.alert('id '+id+' bar '+bar+' nav '+nav+' parent '+parent+' slot '+slot);

		if(id == this.data['currentId']){
			return false; //don't do anything since this is our current image
		}

		this.resetTimer();

		//now we have everything we need, let's load in the main image
		this.setMainImage(id);

		//if we already are animating stop
		if(this.data['interval'])
			SKEL.EFFECTS.Slide.stopByIntervalId(this.data['interval']);
		if(this.data['intervalThumb'])
			SKEL.EFFECTS.Slide.stopByIntervalId(this.data['intervalThumb']);

		//let's move our thumb into position
		if(this.data['currentId'] != null){
			//move the thumbnail back up
			SKEL.EFFECTS.Slide.animate($('.photoslider_thumb[imageid='+this.data['currentId']+']'),'top','20px','0px',500,SKEL.Transitions.quadOut);
			//NOTE: we don't want to clear this interval incase the user clicks really fast (unless we kept track of every animation)
		}

		this.data['currentId'] = id;
		this.data['currentSlot'] = slot;

		//animate our div down
		this.data['intervalThumb'] = SKEL.EFFECTS.Slide.animate(thumb,'top','0px','20px',250,SKEL.Transitions.quadOut);

		//where are we right now?
		var currentPos = this.findRelativePos(bar.get(0));
		var navWidth = parseInt($(nav).css('width'));
		var slots = Math.floor(navWidth / this.data['thumbWidth']);

		//where do we need to be?
		//we want to position the clicked on div in the dead center

		//alternative method
		//var centerStart = (-this.data['thumbWidth'] * slot) + ((this.data['thumbWidth'] * (slots/2)) - (this.data['thumbWidth']/2));

		var centerStart = (navWidth / 2) - ( (+this.data['thumbWidth'] * (slot) ) + (this.data['thumbWidth']/2) ) ;

		var barFrom = currentPos['x']+'px';
		var barTo = centerStart+'px';

		//window.alert('thumb '+thumb+' from '+barFrom+' to '+barTo+ ' navWidth '+navWidth+' thumb '+this.data['thumbWidth']+' slot '+slot+' center'+centerStart);

		this.data['interval'] = SKEL.EFFECTS.Slide.animate(bar,'left',barFrom,barTo,1000,SKEL.Transitions.backOut);
	},

	//preloads the image for the main viewing area
	setMainImage: function(id){
		var main = $('#picContainer');
		var mainImg = $('#picContainer img').get(0);
		
		$(mainImg).remove();
		var mainImg = $(document.createElement('img'));
		main.append(mainImg);
		
		//set the mainImg to the spinner
		//mainImg.src = this.loadingURL;

		//preload the image and on return set our image
		this.preload(this.getUrlFromId(id,false),FOTO.Slider.displayMainImage,{id: id});
	},

	displayMainImage: function(img){
		var newSrc = ($(this).get())[0].src;

		var args = this.args;
		var id = args['id'];
		//var main = $('#picContainer');
		var mainImg = $('#picContainer img').get(0);
		
		//var captionTxt = FOTO.Slider.getCaptionFromId(id);

		$.post('/picture/loaddata', { 'pic_id': FOTO.Slider.bucket[id]['id']}, 
				function(data){
					$('#picTitle h1').remove();
					if (data.title != '') $('#picTitle').prepend('<h1>'+data.title+'</h1>');
					$('#picInfo').html(data.info);
					document.title = data.tag_title;
		}, 'json');
		
		location.hash = FOTO.Slider.bucket[id]['id'];

		$(mainImg).attr('src',newSrc);
		$(mainImg).attr('_pic_id',FOTO.Slider.bucket[id]['id']);
	},

	//preload an image and fire off a callback if needed
	preload: function(url,onLoadFunc,args){
		var image = document.createElement('img');
		if(onLoadFunc){
			image.onload = onLoadFunc;
		}

		if(args){
			image.args = args;
		}

		image.src = url;
		this.imageCache[url] = image;
		return image;
	},

	enableSlideshow: function(){
		$('.photoslider_control').css('display','block');
		this.data['slideshow'] = true;
	},

	//loops through the images available and preloads them one at a time
	preloadImages: function(){
		//we've already started preloading "0" so start at "1"
		if(this.bucket != null && this.bucket[1] != null){
			this.preload(this.getUrlFromId(1,false),FOTO.Slider.preloadImageChain,{slot: 1});
		}
	},

	preloadImageChain: function(){
		var args = this.args;
		var slot = parseInt(args['slot'])+1;
		if(FOTO.Slider.bucket != null && FOTO.Slider.bucket[slot] != null){
			FOTO.Slider.preload(FOTO.Slider.getUrlFromId(slot,false),FOTO.Slider.preloadImageChain,{slot: slot});
		}
	},

	//returns the absolute coords based on where it is on the page (works w/ scrolled content)
	findAbsolutePos: function(el){
		var SL = 0, ST = 0;
		var is_div = /^div$/i.test(el.tagName);
		if (is_div && el.scrollLeft)
			SL = el.scrollLeft;
		if (is_div && el.scrollTop)
			ST = el.scrollTop;
		var r = { x: el.offsetLeft - SL, y: el.offsetTop - ST };
		r.width = el.offsetWidth;
		r.height = el.offsetHeight;

		if (el.offsetParent) {
			var tmp = this.findAbsolutePos(el.offsetParent);
			r.x += tmp.x;
			r.y += tmp.y;
		}
		return r;
	},

	//this is just like the findAbsolutePos, but stops if a parent's css is "position:relative;"
	findRelativePos: function(el){
		var SL = 0, ST = 0;
		var is_div = /^div$/i.test(el.tagName);
		if (is_div && el.scrollLeft)
			SL = el.scrollLeft;
		if (is_div && el.scrollTop)
			ST = el.scrollTop;
		var r = { x: el.offsetLeft - SL, y: el.offsetTop - ST };
		r.width = el.offsetWidth;
		r.height = el.offsetHeight;

		if (el.offsetParent) {
			if($(el.offsetParent).css('position') != 'relative'){
				//stop if we have a relative parent
				var tmp = this.findRelativePos(el.offsetParent);
				r.x += tmp.x;
				r.y += tmp.y;
			} else {
				r.x += 0;
				r.y += 0;
			}
		}
		return r;
	},

	shiftImg: function(position){
		var slot = parseInt(parseInt(this.data['currentSlot'])+position); //force this to be a number

		var thumb = $('#thumbBarContainer .photoslider_thumb[slot='+slot+']').get(0);
		if(thumb == null){
			//perhaps we're at the end or don't have a valid slot, try slot 0
			if (position > 0) thumb = $('#thumbBarContainer .photoslider_thumb[slot=0]').get(0);
			if (position < 0) thumb = $('#thumbBarContainer .photoslider_thumb[slot='+this.data['lastSlot']+']').get(0);
			if(thumb == null){
				//there is no slot available, return
				this.data['paused'] = true;
				return false;
			}
		}
		$(thumb).click();
	},

	play: function(){
		if(this.data['paused']){
			this.data['intervalCycle'] = setInterval(function(){FOTO.Slider.shiftImg(1);},FOTO.Slider.duration);
		}
		this.data['paused'] = false;
	},

	stop: function(){
		this.data['paused'] = true;
		if(this.data['intervalCycle']){
			clearInterval(this.data['intervalCycle']);
		}
	},

	resetTimer: function(){
		if(!this.data['paused'] && this.data['intervalCycle']){
			this.stop();
			this.play();
		}
	}

};


SKEL.Transitions = {

	/* Many of these functions come from Robert Penner and mootools
	**  http://www.robertpenner.com/easing/
	**  http://mootools.net
	**
	** For more methods check
	**  http://opiefoto.com/js/skel/transitions.js
	*/

	quadOut: function(t, b, c, d){
		return -c *(t/=d)*(t-2) + b;
	},

	backOut: function(t, b, c, d, s){
		if (!s) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	}

};


SKEL.EFFECTS.Slide = {
	counter: 0,
	fps: 50,

	//handles the animation from an attribute to an attribute
	animate: function(element,cssAttribute,from,to,duration,transition){

		if(element.css('display') != 'block'){
			element.skel_old_display = element.css('display');
		}

		//if there isn't a default transition set one
		if(!transition){
			transition = SKEL.Transitions.quadOut;
		}

		//cancel any current animation
		SKEL.EFFECTS.Slide.stop(element);

		var startTime = new Date().getTime();

		//IE doesn't support arguments, so make a function that explicitly calls with those arguments
		element.skel_animate_id = setInterval(function(){
			SKEL.EFFECTS.Slide.step(element,cssAttribute,from,to,duration,startTime,transition);
		},(1000/SKEL.EFFECTS.Slide.fps));

		return element.skel_animate_id;
	},

	//cancels any animation event
	stop: function(element){
		//console.log(this,element,element.skel_animate_id);
		//console.log(element.skel_animate_id);
		if(element.skel_animate_id){
			clearInterval(element.skel_animate_id);
			element.skel_animate_id = 0;
			if(element.skel_old_display){
				element.css('display',element.skel_old_display);
			}
		}

	},

	//cancels any animation event
	stopByIntervalId: function(id){
		if(id){
			clearInterval(id);
		}
	},

	step: function(element,cssAttribute,from,to,duration,start,transition){
		var curTime = new Date().getTime();

		if(cssAttribute == 'color' || cssAttribute == 'background-color'){
			from = this.hexToRgb(from);
			to = this.hexToRgb(to);
		} else {
			//what we use to finalize the unit
			var result = this.splitValue(from);
			var prefix = result.prefix;
			if(prefix == '-')
				prefix = '';
			var postfix = result.postfix;

			from = parseInt(from);
			to = parseInt(to);
		}

		//compute the new property
		var newValue = SKEL.EFFECTS.Slide.compute(curTime,from,to,duration,start,transition);

		var finished = false;

		if(curTime > (start+duration)){
			finished = true;
		}
		if(cssAttribute == 'color' || cssAttribute == 'background-color'){
			newValue = this.rgbToHex(newValue);
		} else {
			newValue = prefix+Math.round(newValue)+postfix;
		}

		if(finished){
			SKEL.EFFECTS.Slide.stop(element);
		}

		//window.alert('css: '+cssAttribute+' new:'+newValue+' element: '+element);
		element.css(cssAttribute,newValue);
	},

	//thanks to mootools and Robert Penner
	compute: function(time,from,to,duration,startTime,transitionFunc){
		var deltaTime = time-startTime;
		if(time > (startTime + duration)){
			//we're past our point, return max
			return to;
		} else {
			if(typeof(from) == 'object'){
				//if we have an object, compute all the transitions\
				var tmpObject = Array();
				from.forEach(function(value,index){
					newFrom = value;
					newTo = to[index];
					newValue = transitionFunc(deltaTime,newFrom,(newTo-newFrom),duration);
					tmpObject[index] = Math.round(newValue);
				});
				return tmpObject;
			} else {
				return transitionFunc(deltaTime,from,(to-from),duration);
			}
		}
	},

	hexToRgb: function(str){
		var hex = str.match(/^#?(\w{1,2})(\w{1,2})(\w{1,2})$/);
		if(hex){
			if(hex[1] != ''){
				hex[1] = parseInt(hex[1],16);
				hex[2] = parseInt(hex[2],16);
				hex[3] = parseInt(hex[3],16);
			}
		}

		return (hex) ? hex.slice(1) : false;
	},

	rgbToHex: function(rgb){
		if (rgb.length < 3) return false;
		if (rgb[3] && (rgb[3] == 0) && !rgb) return 'transparent';
		var hex = [];
		for (var i = 0; i < 3; i++){
			var bit = (rgb[i]-0).toString(16);
			hex.push((bit.length == 1) ? '0'+bit : bit);
		}
		return '#'+hex.join('');
	},

	//returns prefix,postfix,value eg: #ff0000 {prefix: #, value: ff0000}, abc123efg {prefix: abc, value: 123, postfix: efg}
	splitValue: function(str){
		result = {
			prefix: '',
			postfix: '',
			value: ''
		}
		if(str != ''){
			var res = str.match(/([^0-9]*)([0-9]+)([^0-9]*)/);
			//try{
			result = {
				prefix: res[1],
				postfix: res[3],
				value: res[2]
			};
		}
		return result;

	}

}
