export function scrollToId(target) {
    const scroll_el = $(target);

    if ($(scroll_el).length > 0) {
        let scrollSize = $(scroll_el).offset().top - 80;

        if (scrollSize < 0) {
            scrollSize = 0;
        }

        $('html, body').animate({
            scrollTop: scrollSize
        }, 500);
    }

    return false;
}