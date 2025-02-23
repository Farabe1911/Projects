$(function() {
    "use strict";

    /* Initialize stellar.js Plugin */
    $('.section').stellar({ horizontalScrolling: false });

    $(window).on('load', function() {
        $('body').addClass('loaded');

        /* Portfolio Grid */
        const grid = $('#portfolio-grid');
        grid.shuffle({ itemSelector: '.item' });

        $('#portfolio-filters > ul > li > a').on('click', function(e) {
            e.preventDefault();
            const groupName = $(this).data('group');
            $('#portfolio-filters > ul > li > a[data-section]').removeClass('active');
            $(this).addClass('active');
            grid.shuffle('shuffle', groupName);
        });

        $('a.image-link').magnificPopup({
            type: 'image',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            gallery: { enabled: true }
        });
    });

    /* Links Navigation System */
    $('.front-person-links > ul > li > a[data-section]').on('click', function(e) {
        e.preventDefault();
        const section = $('#' + $(this).data('section'));
        if (section.length != 0) {
            $('body').addClass('section-show');
            section.addClass('active');
        }
    });

    $('#hire-me').on('click', function(e) {
        e.preventDefault();
        const section = $('#contact');
        if (section.length != 0) {
            $('body').addClass('section-show');
            section.addClass('active');
        }
    });

    $('.close-btn').on('click', function() {
        $('body').removeClass('section-show');
        $('section.active').removeClass('active');
    });

    /* Calculate Experience */
    function calculateExperience(startDate) {
        const today = new Date();
        const startDateObj = new Date(startDate);
        let experience = today.getFullYear() - startDateObj.getFullYear();
        const monthDifference = today.getMonth() - startDateObj.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < startDateObj.getDate())) {
            experience--;
        }
        return experience;
    }

    const startDate = '2018-10-08';
    const experience = calculateExperience(startDate);
    document.getElementById('experience').textContent = experience + ' Years';

    /* Testimonials Slider */
    $('.testimonials-slider').owlCarousel({ singleItem: true });

    /* Skill Bar Initialization */
    $('.skill-bar').each(function() {
        const percent = parseInt($(this).data('percent'), 10);
        $(this).find('.bar').css('width', percent + '%');
    });

    /* Contact Form Submission */
    function isJSON(val) {
        var str = val.replace(/\\./g, '@').replace(/"[^"\\\n\r]*"/g, '');
        return (/^[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t]*$/).test(str);
    }

    $('#contact-form').validator().on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();
            const $this = $(this);
            const alerts = {
                success: "<div class='form-group'><div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><i class='ion-ios-close-empty'></i></button><strong>Message Sent!</strong> We'll be in touch as soon as possible</div></div>",
                error: "<div class='form-group'><div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><i class='ion-ios-close-empty'></i></button><strong>Error!</strong> Sorry, an error occurred. Try again.</div></div>"
            };

            $.ajax({
                url: 'mail.php',
                type: 'post',
                data: $this.serialize(),
                success: function(data) {
                    if (isJSON(data)) {
                        data = $.parseJSON(data);
                        if (!data.error) {
                            $('#contact-form-result').html(alerts.success);
                            $('#contact-form').trigger('reset');
                        } else {
                            $('#contact-form-result').html("<div class='form-group'><div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><i class='ion-ios-close-empty'></i></button>" + data.error + "</div></div>");
                        }
                    } else {
                        $('#contact-form-result').html(alerts.error);
                    }
                },
                error: function() {
                    $('#contact-form-result').html(alerts.error);
                }
            });
        }
    });

    /* Profile Picture Preview */
    const img = document.querySelector('.front-person-img img');
    let isDragging = false, startX, startY, initialX = 0, initialY = 0;

    img.addEventListener('mousedown', function(e) {
        isDragging = true;
        startX = e.clientX - initialX;
        startY = e.clientY - initialY;
        img.style.cursor = 'grabbing';
    });

    $(document).on('mouseup', function() {
        isDragging = false;
        img.style.cursor = 'grab';
        document.getElementById('x_pos').value = initialX;
        document.getElementById('y_pos').value = initialY;
    });

    $(document).on('mousemove', function(e) {
        if (isDragging) {
            initialX = e.clientX - startX;
            initialY = e.clientY - startY;
            img.style.transform = `translate(${initialX}px, ${initialY}px)`;
        }
    });


	window.addEventListener("load", function() {
        // Trigger rotation after page fully loads and preloader disappears
        document.querySelector(".front-person-img").style.animationPlayState = "running";
    });

    window.onload = function() {
        document.body.classList.add('loaded');
    };


});