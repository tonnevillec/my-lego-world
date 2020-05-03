let $ = require('jquery');
global.$ = global.jQuery = $;
window.jQuery = $;
window.$ = $;

// import bulmaAccordion from "bulma-extensions/bulma-accordion/src/js";
// let accordion = bulmaAccordion.attach();

require('@fortawesome/fontawesome-free/js/all');

$(document).ready(function () {
    $(document).on('click', '.notification .delete', function(){
        $(this).parent().find('.js-message').html();
        $(this).parent().hide();
    })
});

