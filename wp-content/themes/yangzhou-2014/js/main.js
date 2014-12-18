/**
 * Created by np-admin on 11/27/2014.
 */

jQuery(document).ready(function(){
    (function( $ ) {
        $(".slider01 .carousel").bxSlider({
            pager: false,
            controls: true,
            slideMargin:9,
            onSlideBefore: function($slideElement, oldIndex, newIndex){


                var tmpNum = newIndex+1 >= $bxSlider2.getSlideCount() ? 0 : newIndex+1;
                $bxSlider2.goToSlide(tmpNum, (newIndex > oldIndex || newIndex == 0) ? 'next' : 'prev');
            },
            touchEnabled: false,
            mode: 'horizontal'
        });

        var $bxSlider2 = $(".slider02 .carousel").bxSlider({
            slideWidth:476,
            pager: false,
            controls: false,
            mode: 'horizontal'
        });
        $('.product-slider').bxSlider({
            pager: false,
            controls: true,
            touchEnabled: false,
            slideWidth:180,
            minSlides:2,
            maxSlides:3,
            slideMargin:34,

            mode: 'horizontal'
        })
        $('#site-navigation').find('li').append("<div class='nav-item-hover' />")
        $( "#accordion").accordion();

    })( jQuery );
});
