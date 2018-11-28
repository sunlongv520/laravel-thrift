(function ($) {
    "use strict";
    (function () {
        /*==Left Navigation Accordion ==*/
        if ($.fn.dcAccordion) {
            $('#nav-accordion').dcAccordion({
                eventType: 'click',
                autoClose: true,
                saveState: true,
                disableLink: true,
                speed: 'slow',
                showCount: false,
                autoExpand: true,
                classExpand: 'dcjq-current-parent'
            });
        }
        $('.sidebar-toggle-box .fa-bars').click(function (e) {
            $('#sidebar').toggleClass('hide-left-bar');
            $('#main-content').toggleClass('merge-left');
            $.cookie("hide_left_bar", $('#sidebar').hasClass('hide-left-bar') ? '1' : '0', {"path":"/", "expires": 360});
            e.stopPropagation();
        });

        $('.tooltips').tooltip();

        // popovers

        $('.popovers').popover();


    })();


})(jQuery);