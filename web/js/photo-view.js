jQuery.fn.extend({

    showPhotoFromSlider: function() {
        var link = this,
            id = link.data('picture-id'),
            filename =  link.data('picture-filename'),
            path =  link.data('picture-path');

        $img = $('<img>').attr('src', '/' + path + '/thumb/900/' + filename);
        $('.js-big-photo-container').html($img);

        //console.log (link, id, filename, path);
        //

        link.parents('.js-photo-slider').find('a.selected').removeClass('selected').animate({
            top: 0
        }, 150);

        link.addClass('selected').animate({
            top: -20
        }, 150);

        location.hash = id;

        link.parents('.photo-slider-content').css({
            left:0
        });

        link.parents('.photo-slider-content').animate({
            left: this.parents('.photo-slider-content').width()/2 - parseInt(link.offset().left)
        }, 350);
    }

});


$(document).on('click', '.js-photo-slider a', function( event ) {
    event.preventDefault();
    $(this).showPhotoFromSlider();
});
