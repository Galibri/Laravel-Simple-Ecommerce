<!--header start-->
<header class="app-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg mainmenu">
                    <!--logo-->
                    <a class="navbar-brand mr-5 text-dark float-left" href="{{ route('frontend.home') }}">
                        <img class="" src="{{ asset('assets/frontend/img/logo.png') }}" srcset="{{ asset('assets/frontend/img/logo@2x.png 2x') }}" alt=""/>
                    </a>
                    <!--logo-->

                    <!--responsive toggle icon-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="fa fa-bars"> </i>
                            </span>
                    </button>
                    <!--responsive toggle icon-->

                    <!--search start-->
                    <form action="{{ route('frontend.shop') }}" method="get">
                        <div id="form-search" class="form-search">
                            <div class="input-group">
                                <input type="search" class="form-control" name="s" placeholder="Search for..." value="{{ request()->has('s') ? request()->get('s') : '' }}">
                                <span class="input-group-btn">
                                    <button id="form-search-close-btn" class="btn" type="button">
                                        <i class="fa fa-search"></i>
                                        <span class="svg svg--cross">
                                            <svg class="svg__icon" width="32px" height="32px" viewBox="0 0 32 32">
                                                <path d="M16.7,16L31.9,0.9c0.2-0.2,0.2-0.5,0-0.7s-0.5-0.2-0.7,0L16,15.3L0.9,0.1C0.7,0,0.3,0,0.1,0.1S0,0.7,0.1,0.9L15.3,16
                                                L0.1,31.1c-0.2,0.2-0.2,0.5,0,0.7C0.2,32,0.4,32,0.5,32s0.3,0,0.4-0.1L16,16.7l15.1,15.1c0.1,0.1,0.2,0.1,0.4,0.1s0.3,0,0.4-0.1
                                                c0.2-0.2,0.2-0.5,0-0.7L16.7,16z"/>
                                            </svg>
                                        </span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                    <!--search end-->
                    <!--nav link-->
                    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                        <ul id="menu" class="navbar-nav ml-auto">
                            <li class=""><a href="{{ route('frontend.home') }}" class="" >Home</a></li>
                            <li class=""><a href="{{ route('frontend.shop') }}" class="" >Shop</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="#" class="" id="search-icon"><i class="fa fa-search"></i></a></li>

                            @guest
                                <li><a href="{{ route('login') }}" class="" >Login</a></li>
                            @else
                                <li><a href="{{ route('frontend.user-dashboard') }}" class="" ><i class="fa fa-user"></i></a></li>
                            @endguest
                            <!--<li><a href="#" class="" ><i class="fa fa-shopping-basket"></i></a></li>-->
                            <li class="dropdown mini-cart">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-basket"></i><span class="cart-quantity-highlighter">{{ CartController::total_in_cart() }}</span></a>
                                <ul class="dropdown-menu dropdown-menu-right widget_shopping_cart_content woocommerce-mini-cart cart_list product_list_widget">
                                    <div class="append-mini-cart-items">{!! CartController::get_markup() !!}</div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

</header>
<!--header end-->