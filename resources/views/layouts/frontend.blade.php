<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Galib">

    <!--favicon and touch icon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/img/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/frontend/img/favicon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/frontend/img/favicon-114x114.png') }}">

    <!--site title-->
    <title>@yield('title', 'My Shop')</title>

    <!--bootstrap-->
    <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--icon font-->
    <link href="{{ asset('assets/frontend/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/bicon/css/bicon.css') }}" rel="stylesheet">

    <!--woocommerce css-->
    <!--<link rel="stylesheet" href="assets/css/woocommerce-prev.css">-->
    <link href="{{ asset('assets/frontend/css/woocommerce-layouts.css') }}" rel="stylesheet">
    <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='{{ asset('assets/frontend/css/woocommerce-small-screen.css') }}' type='text/css' media='only screen and (max-width: 768px)' />
    <link href="{{ asset('assets/frontend/css/woocommerce.css') }}" rel="stylesheet">

    <!--custom css-->
    <link href="{{ asset('assets/frontend/css/main.css') }}" rel="stylesheet">

</head>
<body class="archive  woocommerce">

@include('layouts.partials.frontend.header')

@yield('content')


<footer class="space-2 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-md-0 mb-4">
                <img class="footer-logo" src="{{ asset('assets/frontend/img/logo.png') }}" srcset="{{ asset('assets/frontend/img/logo@2x.png 2x') }}" alt="">
            </div>
            <div class="col-md-4  mb-md-0 mb-4">
                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <p class="mb-0">Built with Simple Shop & WooCommerce</p>
                <p class="mb-0">© YourCompany 2019</p>
            </div>
        </div>
    </div>
</footer>

<!--scripts-->
<script src="{{ asset('assets/frontend/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/popper.min.js') }}"></script>

<!--init scripts-->
<script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).on('click', '.add-to-cart', function(e) {
        e.preventDefault()

        let p_id = $(this).data('id')
        let p_qty = $('#quantity_'+p_id).val()
        p_qty = p_qty == undefined ? 1 : p_qty

        axios.post('{{ route('frontend.add-to-cart') }}', {
            id: p_id,
            qty: p_qty
        })
            .then(res => {
                console.log(res.data)
                $('.cart-quantity-highlighter').text(res.data.count)
                $('.append-mini-cart-items').html(res.data.markup)
                $('.woocommerce-Price-amount.amount').text(res.data.subtotal)
            })
            .catch()
    })
</script>
@yield('scripts')
</body>
</html>
