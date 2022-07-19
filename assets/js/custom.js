(function($) {
    "use strict";
    var $window = $(window),
        $body = $("body");
    var $offCanvasToggle = $(".offcanvas-toggle"),
        $offCanvas = $(".offcanvas"),
        $offCanvasOverlay = $(".offcanvas-overlay"),
        $mobileMenuToggle = $(".mobile-menu-toggle");
    $offCanvasToggle.on("click", function(e) {
        e.preventDefault();
        var $this = $(this),
            $target = $this.attr("href");
        $body.addClass("offcanvas-open");
        $($target).addClass("offcanvas-open");
        $offCanvasOverlay.fadeIn();

        if ($this.parent().hasClass("mobile-menu-toggle")) {
            $this.addClass("close");
        }
    });
    $(".offcanvas-close, .offcanvas-overlay").on("click", function(e) {
        e.preventDefault();
        $body.removeClass("offcanvas-open");
        $offCanvas.removeClass("offcanvas-open");
        $offCanvasOverlay.fadeOut();
        $mobileMenuToggle.find("a").removeClass("close");
    });
    function mobileOffCanvasMenu() {
        var $offCanvasNav = $(".offcanvas-menu, .overlay-menu"),
            $offCanvasNavSubMenu = $offCanvasNav.find(".offcanvas-submenu");
        $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"></span>');
        $offCanvasNav.on("click", "li a, .menu-expand", function(e) {
            var $this = $(this);
            if ($this.attr("href") === "#" || $this.hasClass("menu-expand")) {
                e.preventDefault();
                if ($this.siblings("ul:visible").length) {
                    $this.parent("li").removeClass("active");
                    $this.siblings("ul").slideUp();
                    $this.parent("li").find("li").removeClass("active");
                    $this.parent("li").find("ul:visible").slideUp();
                } else {
                    $this.parent("li").addClass("active");
                    $this
                        .closest("li")
                        .siblings("li")
                        .removeClass("active")
                        .find("li")
                        .removeClass("active");
                    $this.closest("li").siblings("li").find("ul:visible").slideUp();
                    $this.siblings("ul").slideDown();
                }
            }
        });
    }
    mobileOffCanvasMenu()
    $(document).ready(function() {
        // var heroSlider = new Swiper(".hero-slider .swiper-container", {
        //     slidesPerView: 1,
        //     speed: 600,
        //     loop: true,
        //     spaceBetween: 0,
        //     autoplay: false,
        //     navigation: {
        //         nextEl: ".hero-slider .swiper-button-next",
        //         prevEl: ".hero-slider .swiper-button-prev",
        //     },
        // });
        
        // var req = $.ajax({
        //     url: base_url + "get-slider",
        //     dataType: "JSON",
        //     success: function(data) {
        //         var bannercontent = "";
        //         for (var i = 0; i < data.bannerList.length; i++) {
        //             bannercontent +='<div class="swiper-slide" style="background-image:url('+data.bannerList[i]['imageurl']+');>';
        //             bannercontent +='<div class="container"><div class="row"><div class="col-12"><div class="slider-content"><p class="text animated delay1 '+data.bannerList[i]['txt_class_p']+'">feel the difference with us</p><br/><br/><h2 class="title animated delay2 '+data.bannerList[i]['txt_class_h2']+'">'+data.bannerList[i]['title']+'</h2></div></div></div></div>';
        //             bannercontent +='</div>';
        //         }
        //         heroSlider.appendSlide(bannercontent);
        //         heroSlider.update(true);
        //         //setTimeout(heroSlider.onResize(),2000);
        //     }
        // });
        var serviceSlider = new Swiper(".service-slider-container", {
            slidesPerView: 3,
            speed: 1000,
            loop: true,
            spaceBetween: 30,
            autoplay: false,
            breakpoints: {
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 84,
                },

                992: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },

                768: {
                    slidesPerView: 2,
                    spaceBetween: 50,
                },

                576: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });

        var teamSlider = new Swiper(".team-slider-container", {
            slidesPerView: 3,
            speed: 1000,
            loop: true,
            spaceBetween: 30,
            autoplay: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1200: {
                    slidesPerView: 3,
                },

                991: {
                    slidesPerView: 2,
                },

                767: {
                    slidesPerView: 2,
                },

                560: {
                    slidesPerView: 2,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });

        var teamSlider = new Swiper(".screenshot", {
            slidesPerView: 3,
            speed: 1000,
            loop: true,
            spaceBetween: 30,
            autoplay: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1200: {
                    slidesPerView: 3,
                },

                991: {
                    slidesPerView: 3,
                },

                767: {
                    slidesPerView: 2,
                },

                560: {
                    slidesPerView: 2,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });
        var teamSlidere = new Swiper(".screenshot-d", {
            slidesPerView: 1,
            speed: 1000,
            loop: true,
            spaceBetween:0,
            autoplay: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1200: {
                    slidesPerView: 1,
                },

                991: {
                    slidesPerView: 1,
                },

                767: {
                    slidesPerView: 1,
                },

                560: {
                    slidesPerView: 1,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });
        var teamSliderss = new Swiper(".doctor", {
            slidesPerView: 7,
            speed: 1000,
            loop: true,
            spaceBetween: 30,
            autoplay: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1200: {
                    slidesPerView: 7,
                },

                991: {
                    slidesPerView: 7,
                },

                767: {
                    slidesPerView: 3,
                },

                560: {
                    slidesPerView: 2,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });
        var caseSlider = new Swiper(".case-slider-container", {
            slidesPerView: 2,
            speed: 1000,
            loop: true,
            spaceBetween: 30,
            autoplay: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1200: {
                    slidesPerView: 2,
                },

                991: {
                    slidesPerView: 2,
                },

                767: {
                    slidesPerView: 2,
                },

                576: {
                    slidesPerView: 2,
                },

                0: {
                    slidesPerView: 1,
                },
            },
        });

        var testimonialSlider = new Swiper(".testimonial-slider-container", {
            slidesPerView: 1,
            speed: 1000,
            loop: true,
            spaceBetween: 0,
            effect: "fade",
            fadeEffect: { crossFade: true },
            autoplay: {
                delay: 2500,
                disableOnInteraction: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        // counter cool
        $('.counter-cool.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false
                }
            }
        })
        // 7 doctor icon slider
        
        $('.doctor-side.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
            //jsonPath : '<?= base_url()?>assets/customData.json',
        })
            // function customDataSuccess(data){
            //     alert(1);
            //     var content = "";
            //     for(var i in data["items"]){
            //        var img = data["items"][i].img;
            //        var alt = data["items"][i].alt;
            //         content +='<div class="item">';
            //             content +='<div class="image_box1">';
            //                 content +='<img src="'+img+'" alt="icon">';
            //             content +='</div>';
            //             content +='<div class="image_title_text1"><h4>Radio Diagnostic Center</h4></div>';
            //         content +='</div>';
            //         //content += "<img src=\"" +img+ "\" alt=\"" +alt+ "\">"
            //     }
            //     alert(content);
            //     $(".doctor-side").html(content);
            // }
        
        // App screen shot slider
        $('.app-step.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
        // register Page slider
        $('.doctor-s-slides.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay:false,
            autoplayTimeout:3000,
            responsiveClass: true,
            dots: false,
            nav: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        })
        $(document).ready(function() {
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
        
                fixedContentPos: false
            });
        });
        var gallerySlider = new Swiper(".department-gallery", {
            slidesPerView: 1,
            speed: 1000,
            loop: true,
            spaceBetween: 10,
            autoplay: {
                delay: 2500,
                disableOnInteraction: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });
    function stylePreloader() {
        $("body").addClass("preloader-deactive");
    }
    $("[data-bg-img]").each(function() {
        $(this).css("background-image", "url(" + $(this).data("bg-img") + ")");
    });
    $("[data-bg-color]").each(function() {
        $(this).css("background-color", $(this).data("bg-color"));
    });
    $(".lightbox-image").fancybox();
    $(".play-video-popup").fancybox();
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 250) {
            $(".scroll-to-top").fadeIn();
        } else {
            $(".scroll-to-top").fadeOut();
        }
        if ($(".sticky-header").length) {

            var windowpos = $(this).scrollTop();
            if (windowpos >= 150) {
                $(".sticky-header").addClass("sticky");
                $(".mobile-sticky").addClass("sticky");
            } else {
                $(".sticky-header").removeClass("sticky");
                $(".mobile-sticky").removeClass("sticky");
            }
        }
    });
    var form = $("#contact-form");
    var formMessages = $(".form-message");
    $(form).submit(function(e) {
        e.preventDefault();
        var formData = form.serialize();
        $.ajax({
                type: "POST",
                url: form.attr("action"),
                data: formData,
            })
            .done(function(response) {
                $(formMessages).removeClass("alert alert-danger");
                $(formMessages).addClass("alert alert-success fade show");
                formMessages.html(
                    "<button type='button' class='btn-close' data-bs-dismiss='alert'>&times;</button>"
                );
                formMessages.append(response);
                $("#contact-form input,#contact-form textarea").val("");
            })
            .fail(function(data) {
                $(formMessages).removeClass("alert alert-success");
                $(formMessages).addClass("alert alert-danger fade show");
                if (data.responseText !== "") {
                    formMessages.html(
                        "<button type='button' class='btn-close' data-bs-dismiss='alert'>&times;</button>"
                    );
                    formMessages.append(data.responseText);
                } else {
                    $(formMessages).text(
                        "Oops! An error occurred and your message could not be sent."
                    );
                }
            });
    });
    $("#datepicker").datepicker();
    $(".scroll-to-top").on("click", function() {
        $("html, body").animate({ scrollTop: 0 }, 800);
        return false;
    });
     $(window).on("load", function() {
        AOS.init({
            easing: "ease",
            once: true,
        });
        stylePreloader();
    });
})(window.jQuery);