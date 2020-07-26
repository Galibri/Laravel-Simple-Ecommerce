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

    <!--frontend css-->
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">

    <!--icon font-->
    <link href="{{ asset('assets/frontend/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/bicon/css/bicon.css') }}" rel="stylesheet">

    <!--woocommerce css-->
    <!--<link rel="stylesheet" href="assets/css/woocommerce-prev.css">-->
    <link href="{{ asset('assets/frontend/css/woocommerce-layouts.css') }}" rel="stylesheet">
    <link rel='stylesheet' id='woocommerce-smallscreen-css'
        href='{{ asset('assets/frontend/css/woocommerce-small-screen.css') }}' type='text/css'
        media='only screen and (max-width: 768px)' />
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
                    <img class="footer-logo" src="{{ asset('assets/frontend/img/logo.png') }}"
                        srcset="{{ asset('assets/frontend/img/logo@2x.png 2x') }}" alt="">
                </div>
                <div class="col-md-4  mb-md-0 mb-4 text-center">
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <p class="mb-0">Proudly powered by Laravel</p>
                    <p class="mb-0">&copy; MyShop 2020</p>
                </div>
            </div>
        </div>
    </footer>



    <!--init scripts-->
    <script src="{{ asset('js/frontend.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>
    <script>
        // Toaster
        @if(Session::has('success'))
            swtoaster('success', "{{ Session::get('success') }}");
        @endif
        @if(Session::has('error'))
            swtoaster('error', "{{ Session::get('error') }}");
        @endif
        @if(Session::has('warning'))
            swtoaster('warning', "{{ Session::get('warning') }}");
        @endif
        @if(Session::has('info'))
            swtoaster('info', "{{ Session::get('info') }}");
        @endif
        @if(Session::has('question'))
            swtoaster('question', "{{ Session::get('question') }}");
        @endif
        
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
                $('.cart-quantity-highlighter').text(res.data.count)
                $('.append-mini-cart-items').html(res.data.markup)
                $('.mini-cart-subtotal').text(res.data.subtotal)
                swtoaster('success', 'Added to cart.')
            })
            .catch(err => console.log(err))
    })

    $(document).on('click', '.remove_from_cart_button', function(e) {
        e.preventDefault()
        let p_id = $(this).data('product_id')
        axios.post('{{ route('frontend.remove-from-cart') }}', {
            id: p_id
        })
            .then(res => {
                $('.cart-quantity-highlighter').text(res.data.count)
                $('.append-mini-cart-items').html(res.data.markup)
                $('.mini-cart-subtotal').text(res.data.subtotal)
                $('#cart_item_' + p_id).remove()
                swtoaster('success', 'Cart item removed.')
                if(res.data.count == 0 && '{{ request()->route()->getName() }}' == 'frontend.cart') {
                    window.location.href = '{{ route('frontend.shop') }}'
                }
            })
            .catch(err => console.log(err))
    })
    </script>
    @yield('scripts')
</body>

</html>