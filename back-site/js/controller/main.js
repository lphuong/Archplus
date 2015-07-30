$(window).load(function () {
    $('#loading').fadeOut(1000);

    // common: change main content
    var mainNav = $('ul.mainNav li');
    mainNav.bind("click", function (e) {
        e = e || window.event;
        e.preventDefault();

        mainNav.toArray().some(function (val, index) {
            if (val.getAttribute('class') === "active") {
                val.setAttribute('class', 'none');
                $('.mainPage')[index].style.display = 'none';
                return true;
            }
        });

        var ul = $(this).parent();
        var index = ul.children().index(this);

        mainNav[index].setAttribute('class', 'active');
        $('.mainPage')[index].style.display = 'block';

    });

    $('#stats_visits').sparkline('html', {
        type: 'bar',
        chartRangeMin: 0,
        height: '40px',
        barWidth: '5px',
        barColor: '#3e3e3e',
        tooltipClassname: 'tooltip-sp'
    });
    $('#stats_balance').sparkline('html', {
        type: 'bar',
        chartRangeMin: 0,
        height: '40px',
        barWidth: '5px',
        barColor: '#ffffff',
        tooltipClassname: 'tooltip-sp'
    });

    $('.icon-nav-mobile').click(function () {
        $('.mainNav').toggleClass('open');
    });

    $('.ttip').hover(
        function () {
            var ttip_c = $(this).data('ttip');
            var ttip_h = $(this).height();
            $(this).append('<div class="ttip_t">' + ttip_c + '</div>');
            $('.ttip_t').css({'top': ttip_h + ttip_h / 2 + 10});
            $('.ttip_t').fadeIn();
        },
        function () {
            $('.ttip_t').fadeOut(function () {
                $(this).remove()
            });
        }
    );

    $("#footer-html").load("page/footer.html");
}); //.Ready