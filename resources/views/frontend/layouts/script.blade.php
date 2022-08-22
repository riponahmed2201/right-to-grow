<script>
    $('#bn').addClass('btn-warning');
    $('#bn').addClass('active');

    $('#bn').click(function() {
        $('.bn').show();
        $('.en').hide();
        $('#en').removeClass('btn-warning');
        $('#en').removeClass('active');
        $(this).addClass('btn-warning');
        $(this).addClass('active');
        $('#en').addClass('btn-default');
    });
    $('#en').click(function() {
        $('.bn').hide();
        $('.en').show();
        $('#bn').removeClass('btn-warning');
        $('#bn').removeClass('active');
        $(this).addClass('btn-warning');
        $(this).addClass('active');
        $('#bn').addClass('btn-default');
    });

    $(document).ready(function() {
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script>
