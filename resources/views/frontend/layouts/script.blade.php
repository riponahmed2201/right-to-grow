<script type="text/javascript" src="{{asset('assets/frontend/assets/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/assets/plugins/datepicker/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/assets/plugins/validation/dist/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/assets/plugins/validation/dist/additional-methods.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/assets/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/ajax/libs/slick-carousel/1.6.0/slick.js')}}"></script>


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

@yield('custom_js')