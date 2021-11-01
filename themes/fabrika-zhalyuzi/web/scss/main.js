$(document).ready(function () {
/**
   * ajax на формах
   */
    $('form[data-type="ajax-form"]').on('click', function(event) {
        var elem = event.target;
        var dataSend = elem.getAttribute('data-send');
        if (dataSend=='ajax') {
            var
                button   = $(elem),
                form     = button.parents('form'),
                type     = form.attr('method'),
                formId   = form.attr('id');

            console.log("tets");
            $.ajax({
                type: type,
                data:  form.serialize(), //formData,
                dataType: 'html',
                success: function(html) {
                    var newForm = $(html)
                        .find('#'+formId);

                    $('#'+formId).html(newForm.html());
                    
                        if($('#'+formId).find('input[data-mask="phone"]').is('.data-mask')){
                            $('#'+formId).find('input[data-mask="phone"]')
                                .mask("+7(999)999-99-99", {
                                    'placeholder':'_',
                                    'completed':function() {
                                        //console.log("ok");
                                    }
                                });
                        }
                        
                        $.getScript("https://www.google.com/recaptcha/api.js", function () {});
                    },
            });
            return false;
        }
    });

    // класс для заголовка в описании категории
    $('.catTypes-description h1').addClass('heading heading-pb');

    // Модалка для материалов
    $(document).delegate('a[data-jsmodal]', 'click', function (e) {
        var content = $($(this).data('content')).html();
        var modal = $(this).data('jsmodal');

        $(modal).find('.modal-body').html(content);
        $(modal).modal('show');
        
        return false;
    });
    
});

// @koala-append '../js/lib/mobile-menu.js';
// @koala-append '../js/lib/slick.js';
// @koala-append '../js/lib/slider.js';
// @koala-append '../js/lib/tabs.js';
// @koala-append '../js/lib/search.js';
// @koala-append '../js/lib/placeholder-search.js';
// @koala-append '../js/lib/dropdown-menu.js';
// @koala-append '../js/lib/password.js';
// @koala-append '../js/lib/read-more.js';
// @koala-append '../js/lib/scrolltop.js';
// @koala-append '../js/lib/share.js';
// @koala-append '../js/lib/slider-progress.js';
// @koala-append '../js/lib/fancybox.js';

