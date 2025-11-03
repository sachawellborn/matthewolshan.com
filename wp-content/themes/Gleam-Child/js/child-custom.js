jQuery(document).ready(function($) {
    var menuToToggle = '#main_menu';
    var headerTargetSelector = '#main_content.home_content #main_header';
    var menuSlideSpeed = 400;
    var menuLinkSelector = headerTargetSelector + ' ' + menuToToggle + ' a';

    function get_relative_path(url) {
        var a = document.createElement('a');
        a.href = url;
        return a.pathname + a.search;
    }

    // 1. Clear ANY and ALL previous hover bindings (for stability)
    $(headerTargetSelector).off('mouseenter mouseleave');

    // 2. CRITICAL Delegated Click Handler: Manually trigger the page transition with a 1ms delay.
    // This is the most reliable way to force navigation on the main menu after the theme breaks the link handler.
    $('body').on('click', menuLinkSelector, function(e) {
        var $link = $(this);
        var link_href = $link.attr('href');

        e.preventDefault();
        e.stopImmediatePropagation();

        // Immediately hide the menu
        $(menuToToggle).stop(true, true).hide();

        // Manually trigger the AJAX navigation after a minimal delay
        setTimeout(function() {
            var relative_path = get_relative_path(link_href);
            $.address.value(relative_path);
        }, 1);

        return false;
    });

    // 3. Delegated Hover Handler (for menu stability)
    $('body').on({
        mouseenter: function() {
            $(this).find(menuToToggle).css({'display':'none','opacity':'1'}).stop(true,true).slideDown(menuSlideSpeed);
        },
        mouseleave: function() {
            $(this).find(menuToToggle).stop(true,true).slideUp(menuSlideSpeed);
        }
    }, headerTargetSelector);

    // 4. Close button handler remains to fix the URL hash
    $('body').on('click', '#close_button', function(e) {
        setTimeout(function() {
            if (window.location.hash !== '') {
                history.replaceState('', document.title, window.location.pathname + window.location.search);
            }
        }, menuSlideSpeed + 100);
    });
});
