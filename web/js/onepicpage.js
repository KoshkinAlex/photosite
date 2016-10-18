function loadSlider() {
    FOTO.Slider.bucket = [];
    var slotById = {};

    $('.js-scroll-list a').each(function (i, item) {
        var elem = {
            'thumb': $(item).find('img').attr('src'),
            'main': $(item).data('picture-path')+$(item).data('picture-filename'),
            'caption': '',
            'id':$(item).data('picture-id')
        };
        FOTO.Slider.bucket[i] = elem;
        slotById[$(item).data('picture-id')] = i;
    });

    FOTO.Slider.data['lastSlot'] = 1;
    FOTO.Slider.reload();
    FOTO.Slider.preloadImages();

    if (location.hash != '') {
        FOTO.Slider.showImg(slotById[parseInt(location.hash.substring(1))]);
    } else {
        FOTO.Slider.showImg(slotById[$('.js-main-photo').data('picture-id')]);
    }


/*
    FOTO.Slider.bucket = {
    <?php
        $i=0;
    foreach($other_pic as $pic) {
        print $i++.": {'thumb': '/{$pic->path}thumb/3/{$pic->filename}', 'main': '/{$pic->path}{$thumb_type}{$pic->filename}', 'caption': '{$pic->title}', 'id':{$pic->id}},";
        //if ($i<count($other_pic)) print ", ";
        if ($pic->id == $model->id) $cur_slot = $i-1;
    }
    ?>
};
FOTO.Slider.data['lastSlot'] = <?php echo $i-1; ?>;
FOTO.Slider.reload();
FOTO.Slider.preloadImages();

show_id = 0;
if (location.hash != '') {
    show_id = location.hash.substring(1);
    show_id = parseInt(show_id);
    if (show_id) {
        for(i=0;i<=<?php echo $i-1; ?>;i++) {
            if (FOTO.Slider.bucket[i]['id'] == show_id) {
                FOTO.Slider.showImg(i);
                continue;
            }
        }
    }
}

if (!show_id) FOTO.Slider.showImg(<?php echo $cur_slot; ?>);
*/
}

$(document).ready(function(){
	resizeField();
    loadSlider();


});

$(window).resize(function() {
	resizeField();
});

function resizeField () {
	$('#picTable').height($(window).height() - 220);
}


$('#picInfo textarea').live('click', function(e) {
	$(this).select();
	return false;
});

$('#codeInsertButton').live('click', function(e) {
	$('#codeTextarea').toggle();
	$('#codeTextarea').focus();
	$('#codeTextarea').select();
	return false;
});


$('a.srvIA, .srvIA a').live('click', function( event ) {
	var href = $(this).attr('href');	
	var $container = $(this).closest('.srvUC');
	$container.addClass('loading');
	$.post(href, null, function(html){ $container.html(html); $container.removeClass('loading'); });
	return false;
});
