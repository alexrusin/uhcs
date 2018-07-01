
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.showFixedAlert = (message, alertType) =>
    {
        
        let alertHTML = '<div class="alert ' + 'alert-' + alertType + ' alert-is-fixed" id="feedbackAlert" role="alert">' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '<span id="alert-message">' + message + '</span>' +
            '</div>';
        $("#fixed-alert").html(alertHTML);
        setTimeout(function ()
        {
            $("#feedbackAlert").alert('close');
        }, 5000);
    };

Vue.prototype.disableButtons = () =>  $(":button").prop("disabled", true);
Vue.prototype.enableButtons = () => {
	$(":button").prop("disabled", false);
	$(".buttonLoadingImage").addClass("hiddenButtonElement");
    $(".buttonText").removeClass("hiddenButtonElement");
};

Vue.prototype.showSpinner = (button) =>
{
    $(button).find(".buttonText").addClass("hiddenButtonElement");
    $(button).find(".buttonLoadingImage").removeClass("hiddenButtonElement");
};


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('client-form', require('./components/ClientForm.vue'));

const app = new Vue({
    el: '#app'
});
