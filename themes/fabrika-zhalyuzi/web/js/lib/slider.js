$(document).ready(function () {
    /*Слайдер на первом экране*/
    if($('div').hasClass('carouselSlider')){
        var mainSlide = $('.carouselSlider');
        mainSlide.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
            var i = (currentSlide ? currentSlide : 0) + 1;
            $('.mainCounter').html(('0'+i) + '<span> — </span>' + ('0'+slick.slideCount).slice(-2));
        });
        mainSlide.slick({
            fade: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            dots: false,
            focusOnSelect: false,
            appendArrows: '.main-nav .arrows',
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100,
            speed: 700, 
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true,
                    },
                },
            ]
        });
    }
    /*Преимущества*/
    if($('div').hasClass('advantagesSlider')){
        $('.advantagesSlider').slick({
            fade: false,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: false,
            dots: false,
            focusOnSelect: false,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100,
            speed: 700, 
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        infinite: true,
                        autoplay: true,
                        adaptiveHeight: true,
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 767,
                    settings: {
                        infinite: true,
                        autoplay: true,
                        slidesToShow: 2,
                    },
                },
            ]
        });
    }

    /*О нас*/
    if($('div').hasClass('aboutSlider')){
        var mainSlide = $('.aboutSlider');
        mainSlide.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
            var i = (currentSlide ? currentSlide : 0) + 1;
            $('.aboutCounter').html(('0'+i) + '<span> — </span>' + ('0'+slick.slideCount).slice(-2));
        });
        mainSlide.slick({
            fade: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            dots: false,
            focusOnSelect: false,
            appendArrows: '.about-nav .arrows',
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100,
            speed: 700, 
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true,
                    },
                },
            ]
        });
    }
    // /*Наши работы*/
    var $slider = $('.portfolioSlider');
    var $progressBar = $('.progress');
    var $progressBarLabel = $( '.slider__label' );

    $slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {   
        var calc = ( (nextSlide) / (slick.slideCount-1) ) * 100;
        
        $progressBar
          .css('background-size', calc + '% 100%')
          .attr('aria-valuenow', calc );
        
        $progressBarLabel.text( calc + '% completed' );
    });
    $slider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
        var i = (currentSlide ? currentSlide : 0) + 1;
        $('.portfolioCounter').html(('0'+i) + '<span> — </span>' + ('0'+slick.slideCount).slice(-2));
    });

    $slider.slick({
        // infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        appendArrows: '.portfolio-nav .arrows',
        cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
        speed: 700, 
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false,
                    adaptiveHeight: true,
                },
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false,
                    adaptiveHeight: true,
                },
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    adaptiveHeight: true,
                },
            },
        ]
    });  

    // О компании - преимущества
    var $sliderCompany = $('.company-quality-slider');
    var $progressBars = $('.progres');
    var $progressBarsLabel = $( '.slider__label' );

    $sliderCompany.on('beforeChange', function(event, slick, currentSlide, nextSlide) {   
        var calc = ( (nextSlide) / (slick.slideCount-1) ) * 100;
        
        $progressBars
          .css('background-size', calc + '% 100%')
          .attr('aria-valuenow', calc );
        
        $progressBarsLabel.text( calc + '% completed' );
    });
    $sliderCompany.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
        var i = (currentSlide ? currentSlide : 0) + 1;
        $('.companyCounter').html(('0'+i) + '<span> — </span>' + ('0'+slick.slideCount).slice(-2));
    });

    $sliderCompany.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        appendArrows: '.company-quality-nav .arrows',
        cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
        speed: 700, 
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false,
                    adaptiveHeight: true,
                },
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false,
                    adaptiveHeight: true,
                },
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    adaptiveHeight: true,
                },
            }
        ]
    });  

    /*Слайдер в карточке*/
    if($('div').hasClass('cardView-slider')){
        var mainSlide = $('.cardView-slider');
        mainSlide.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
            var i = (currentSlide ? currentSlide : 0) + 1;
            $('.cardCounter').html(('0'+i) + '<span> — </span>' + ('0'+slick.slideCount).slice(-2));
        });
        mainSlide.slick({
            fade: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            dots: false,
            focusOnSelect: false,
            appendArrows: '.card-nav .arrows',
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchThreshold: 100,
            speed: 700, 
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        adaptiveHeight: true,
                    },
                },
            ]
        });
    }
});