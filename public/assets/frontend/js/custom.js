(function ($) {
    "use strict";
    // for sticky navbar
    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            $(".navbar-area").addClass("sticky");
        } else {
            $(".navbar-area").removeClass("sticky");
        }
    });

    $(window).on("load", function (event) {
        $("#pre-loader").delay(800).fadeOut(500);
    });

    // popup button
    $('.popup-button').click(function () {
        $('.popup').css('visibility', 'visible');
        $('.popup-content').addClass('hi');
    })
    $('#popup-close').click(function () {
        $('.popup').css('visibility', 'hidden');
        $('.popup-content').removeClass('hi');
    })

    // Mean Menu
    $(".mean-menu").meanmenu({
        meanScreenWidth: "1199",
    });

    $(".main-banner-slider-area").owlCarousel({
        autoplayHoverPause: true,
        autoplaySpeed: 2500,
        autoplay: true,
        loop: true,
        items: 1,
        autoHeight: true,
    });

    // Index 02 Product Slider
    $(".team-slider-area").owlCarousel({
        autoplayHoverPause: true,
        autoplaySpeed: 2000,
        autoplay: true,
        loop: true,
        dots: false,
        margin: 20,
        nav: true,
        navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            },
        }
    });


    $('.speaker-slider-img-content').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        fade: true,
        arrows: false,
        asNavFor: '.slider-thumb',
    });
    $('.speaker-slider-text-area').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        asNavFor: '.slider-thumb',
    });
    $('.slider-thumb').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.speaker-slider-text-area, .speaker-slider-img-content',
        dots: false,
        arrows: false,
        centerMode: false,
        focusOnSelect: true,
    });

    // Index 02 Sponsors Slider
    $(".sponsor-card-slider-area").owlCarousel({
        autoplayHoverPause: true,
        autoplaySpeed: 2000,
        autoplay: true,
        loop: true,
        dots: false,
        margin: 20,
        responsive: {
            0: {
                items: 2,
            },
            576: {
                items: 3,
            },
            992: {
                items: 5,
            },
            1200: {
                items: 6,
            },
        }
    });

    // Index 03 Event Slider
    $(".event-slider-area-3").owlCarousel({
        autoplayHoverPause: true,
        autoplaySpeed: 2000,
        autoplay: true,
        loop: true,
        dots: false,
        margin: 20,
        nav: true,
        navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 3,
            },
        }
    });

    // Index 03 Team Slider
    $(".team-slider-area-3").owlCarousel({
        autoplayHoverPause: true,
        autoplaySpeed: 2000,
        autoplay: true,
        loop: true,
        dots: false,
        margin: 20,
        nav: true,
        navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            }
        }
    });

    // Index 03 Team Slider
    $(".testimonials-slider-area-3").owlCarousel({
        autoplayHoverPause: true,
        autoplaySpeed: 2000,
        autoplay: true,
        loop: true,
        dots: false,
        margin: 20,
        nav: true,
        navText: ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
        }
    });


    // Video PopUp
    $(".video-popup").magnificPopup({
        type: "iframe",
    });
    $('.image-popup').magnificPopup({
        type: 'image'
    });
    
    // language select
    $("select").niceSelect();

    // Input Plus & Minus Number JS
    $('.input-counter').each(function() {
        var spinner = jQuery(this),
        input = spinner.find('input[type="text"]'),
        btnUp = spinner.find('.plus-btn'),
        btnDown = spinner.find('.minus-btn'),
        min = input.attr('min'),
        max = input.attr('max');
        
        btnUp.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.on('click', function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    }); 

    // Tween Max
    // $('.main-banner').mousemove(function(e){
    //     var wx = $(window).width();
    //     var wy = $(window).height();
    //     var x = e.pageX - this.offsetLeft;
    //     var y = e.pageY - this.offsetTop;
    //     var newx = x - wx/2;
    //     var newy = y - wy/2;
    //     $('span, .shape4, .shape5, .banner-text-area-1').each(function(){
    //         var speed = $(this).attr('data-speed');
    //         if($(this).attr('data-revert')) speed *= -.4;
    //         TweenMax.to($(this), 1, {x: (1 - newx*speed), y: (1 - newy*speed)});
    //     });
    // });



    // Subscribe form
	$(".newsletter-form").validator().on("submit", function (event) {
		if (event.isDefaultPrevented()) {
			// handle the invalid form...
			formErrorSub();
			submitMSGSub(false, "Please enter your email correctly.");
		} else {
			// everything looks good!
			event.preventDefault();
		}
	});
	function callbackFunction (resp) {
		if (resp.result === "success") {
			formSuccessSub();
		}
		else {
			formErrorSub();
		}
	}
	function formSuccessSub(){
		$(".newsletter-form")[0].reset();
		submitMSGSub(true, "Thank you for subscribing!");
		setTimeout(function() {
			$("#validator-newsletter").addClass('hide');
		}, 4000)
	}
	function formErrorSub(){
		$(".newsletter-form").addClass("animated shake");
		setTimeout(function() {
			$(".newsletter-form").removeClass("animated shake");
		}, 1000)
	}
	function submitMSGSub(valid, msg){
		if(valid){
			var msgClasses = "validation-success";
		} else {
			var msgClasses = "validation-danger";
		}
		$("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
	}
	$(".newsletter-form").ajaxChimp({
		url: "https://envytheme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9", // Your url MailChimp
		callback: callbackFunction
	});

    // Go to Top
    var progressPath = document.querySelector('.progress-wrap path');
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';		
    var updateProgress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    }
    updateProgress();
    $(window).scroll(updateProgress);	
    var offset = 50;
    var duration = 50;
    jQuery(window).on('scroll', function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.progress-wrap').addClass('active-progress');
        } else {
            jQuery('.progress-wrap').removeClass('active-progress');
        }
    });				
    jQuery('.progress-wrap').on('click', function (event) {
        event.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, duration);
        return false;
    });

    // countdown
    $("#getting-started-d").countdown("2023/05/05", function (event) {
        $(this).html(
        event.strftime("<div><span>%D</span> <span>Days </span> </div> ")
        );
    });
    $("#getting-started-h").countdown("2023/05/05", function (event) {
        $(this).html(
        event.strftime("<div><span>%H</span> <span>Hours </span> </div> ")
        );
    });
    $("#getting-started-m").countdown("2023/05/05", function (event) {
        $(this).html(
        event.strftime("<div><span>%M</span> <span>minutes </span> </div> ")
        );
    });
    $("#getting-started-s").countdown("2023/05/05", function (event) {
        $(this).html(
        event.strftime("<div><span>%S</span> <span>seconds </span> </div> ")
        );
    });

    $('.js-tilt').tilt({
        perspective: 1500,
    })

    // Fun Facts Area
    $(".odometer").appear(function (e) {
        var odo = $(".odometer");
        odo.each(function () {
            var countNumber = $(this).attr("data-count");
            $(this).html(countNumber);
        });
    });

    // WOW Animation JS
    if ($(".wow").length) {
        var wow = new WOW({
            mobile: false,
        });
        wow.init();
    }

})(jQuery);