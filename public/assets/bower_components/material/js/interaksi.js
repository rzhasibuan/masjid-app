const sideNav = document.querySelectorAll('.sidenav');
M.Sidenav.init(sideNav);

const slider = document.querySelectorAll('.slider');
M.Slider.init(slider, {
    indicators: false,
    height: 580,
    transition: 800,
    interval: 3000
});

const parallax = document.querySelectorAll('.parallax');
M.Parallax.init(parallax);

const materialbox = document.querySelectorAll('.materialboxed');
M.Materialbox.init(materialbox);

// const scroll = document.querySelectorAll('.scrollspy');
// M.ScrollSpy.init(scroll, {
//     scrollOffset: 50
// });

const dropdown = document.querySelectorAll('.dropdown-trigger');
M.Dropdown.init(dropdown);



// tombol scroll up
var btn = $('#button');
$(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, '300');
});

// tombol scroll up
var wa = $('#whatsapp');
$(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
        wa.addClass('show');
    } else {
        wa.removeClass('show');
    }
});

// wa.on('click', function (e) {
//     e.preventDefault();
//     $('html, body').animate({
//         scrollTop: 0
//     }, '300');
// });

$(window).scroll(function () {
    var wScroll = $(this).scrollTop();

    // tentang
    // text tentang
    // if (wScroll > $('.about').offset().top - 600) {

    //     $('.about .textTentang').each(function (i) {
    //         setTimeout(function () {
    //             $('.about .textTentang').eq(i).addClass('muncul');
    //         }, 100 * (i + 1))

    //     });
    // }
    // Konten
    if (wScroll > $('.about').offset().top - 400) {

        $('.about .col').each(function (i) {
            setTimeout(function () {
                $('.about .col').eq(i).addClass('muncul');
            }, 100 * (i + 1))

        });
    }
    // berita
    // text berita
    if (wScroll > $('.services').offset().top - 400) {

        $('.services .textberita').each(function (i) {
            setTimeout(function () {
                $('.services .textberita').eq(i).addClass('muncul');
            }, 100 * (i + 1))

        });
    }
    // hr berita
    if (wScroll > $('.services').offset().top - 600) {

        $('.services .hr-berita').each(function (i) {
            setTimeout(function () {
                $('.services .hr-berita').eq(i).addClass('muncul');
            }, 100 * (i + 1))

        });
    }
    // konten berita
    if (wScroll > $('.services').offset().top - 300) {

        $('.services .card').each(function (i) {
            setTimeout(function () {
                $('.services .card').eq(i).addClass('muncul');
            }, 180 * (i + 1))

        });
    }
    // end berita



    // pengumuman
    // if (wScroll > $('.services2').offset().top - 200) {

    //     $('.services2 .textPengumuman').each(function (i) {
    //         setTimeout(function () {
    //             $('.services2 .textPengumuman').eq(i).addClass('muncul');
    //         }, 100 * (i + 1))

    //     });
    // }
    // hr pengumuman
    // if (wScroll > $('.services2').offset().top - 300) {

    //     $('.services2 .hr-pengumuman').each(function (i) {
    //         setTimeout(function () {
    //             $('.services2 .hr-pengumuman').eq(i).addClass('muncul');
    //         }, 100 * (i + 1))

    //     });
    // }
    // konten pengumuman 
    // if (wScroll > $('.services2').offset().top - 100) {

    //     $('.services2 .card').each(function (i) {
    //         setTimeout(function () {
    //             $('.services2 .card').eq(i).addClass('muncul');
    //         }, 180 * (i + 1))

    //     });
    // }

    // paralax client
    // if (wScroll > $('.clients').offset().top - 400) {

    //     $('.clients .h3').each(function (i) {
    //         setTimeout(function () {
    //             $('.clients .h3').eq(i).addClass('muncul');
    //         }, 100 * (i + 1))

    //     });
    // }

    // if (wScroll > $('.clients').offset().top - 300) {

    //     $('.clients .h6').each(function (i) {
    //         setTimeout(function () {
    //             $('.clients .h6').eq(i).addClass('muncul');
    //         }, 100 * (i + 1))

    //     });
    // }

    // if (wScroll > $('.clients').offset().top - 250) {

    //     $('.clients .col').each(function (i) {
    //         setTimeout(function () {
    //             $('.clients .col').eq(i).addClass('muncul');
    //         }, 100 * (i + 1))

    //     });
    // }

});
