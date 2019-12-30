$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

$(window).scroll(function() {
    if ($(window).scrollTop() > 100 ){
    
        $('#bag').addClass(' bg-dark');
        $('.textcol').addClass(' text-white');

        $('#bag').removeClass(' bg-transparent');
        // $('.textcol').removeClass(' text-dark');

        
    } else {
    
        $('#bag').removeClass(' bg-white');
        $('.textcol').removeClass(' text-dark');

        $('#bag').addClass(' bg-transparent');
        $('.textcol').addClass(' text-white');

    };   	
});



    