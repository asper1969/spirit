require('waypoints/lib/noframework.waypoints.min.js');
require('waypoints/lib/shortcuts/inview.min.js');
require('jquery-form-validator/form-validator/jquery.form-validator.min.js');
require('fancybox')($);
import {slick} from 'slick-carousel';
const ScrollMagic = require('ScrollMagic');
require('animation.gsap');
const TimelineMax = require('TimelineMax');
jQuery.extend(jQuery.easing,{easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a}});

$(document).ready(()=>{
    let offset = $(document).scrollTop();
    console.log(offset);

    $('header .wrapper>.container .btns .btn__menu').click(function(){
        $('header .wrapper .main__menu >.container').toggleClass('is-active');
    });

    $('header .wrapper .main__menu .btn__close').click(function(){
        $('header .wrapper .main__menu >.container').removeClass('is-active');
    });

    $.validate({
        lang: 'ru',
        scrollToTopOnError: false
    });
});

function scrollTo($target){
    $('html, body').stop().animate({
        scrollTop: $target.offset().top
    }, 1500, 'easeInOutExpo');
}

var fancyboxModule = {

    settings: {
        forms: $('.hidden-region form'),
        btns: $('a.fancybox')
    },

    init: function(){
        let holder = this;
        this.settings.btns.click(function(e){
            e.preventDefault();
            let event = e;
            holder.formPopup(event);
        });
    },

    formPopup: function(e){
        e.preventDefault;
        let target = $(e.target).attr('href');

        $.fancybox.open({
            href: $(target),
            type: 'inline',
            helpers : {
                overlay : {
                    locked : false
                }
            },
            closeBtn: 'true'
        });
    }
};