$(function () {
    var changePreloaderState = setupPreloaderButtons();

    $form.validate(
        {
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                var data = $form.serializeArray(),
                    action = $form.attr("action");
                changePreloaderState({loading: true});
                data.push({"name": "action", "value": action});
                var url = mailerPath + "{{post-url}}";
                $.post(url, data, function (r) {
                    changePreloaderState({loading: false});

                    try {
                        r = jQuery.parseJSON(r);
                    } catch (error) {
                        $.bootstrapGrowl("Ocurrio un error inesperado, intente de nuevo!", {
                            type: 'danger', // (null, 'info', 'danger', 'success')
                            align: 'center', // ('left', 'right', or 'center')
                            width: 'auto' // (integer, or 'auto')
                        });
                    }
                    if (r.type == "success") {
                        $form.find("input, textarea").val("");
                        $.bootstrapGrowl("Su información ha sido enviado, pronto nos pondremos en contacto con usted.", {
                            type: 'success', // (null, 'info', 'danger', 'success')
                            align: 'center', // ('left', 'right', or 'center')
                            width: 'auto' // (integer, or 'auto')
                        });
                    } else {
                        $.bootstrapGrowl("Ocurrio un error inesperado, intente de nuevo!", {
                            type: 'danger', // (null, 'info', 'danger', 'success')
                            align: 'center', // ('left', 'right', or 'center')
                            width: 'auto' // (integer, or 'auto')
                        });
                    }
                });
                return false;

            }
        }
    );


});
