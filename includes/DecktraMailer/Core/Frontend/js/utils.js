var $preloader = $("*[data-email-preloader]").length > 0 ? $("*[data-email-preloader]") : false;
var $form = $("form[data-email-form]"),
    $submit = $form.find("*[type=submit]");

var mailerPath = "";
if(typeof $form.attr("data-mailer-path" ) == "undefined")
    mailerPath = "includes/";
else
    mailerPath = $form.attr("data-mailer-path" );


var setupPreloaderButtons = function () {

    var setupCustomPreloader = function () {
        $submit.wrap("<div id='submit-div'>");
        $preloader.removeClass("hide");

        var submitHtml = $submit[0].outerHTML,
            preloaderHtml = $preloader[0].outerHTML,
            $parent = $("#submit-div");
        $preloader.remove();
        $submit.remove();
        $parent.html(submitHtml);

        return function (status) {
            if (status.loading)
                $parent.html(preloaderHtml);
            else
                $parent.html(submitHtml);
        }
    };

    setupDefaultBootstrapPreloader = function () {
        return function (status) {
            if (typeof $submit.data("loading-text") == "undefined")
                $submit.data("loading-text", "Enviando...");
            if (status.loading)
                $submit.button('loading');
            else
                $submit.button("reset");
        }
    };
    return $preloader ? setupCustomPreloader() : setupDefaultBootstrapPreloader();
};