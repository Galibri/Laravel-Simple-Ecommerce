<nav class="woocommerce-MyAccount-navigation">
    <ul>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard {{ request()->routeIs('frontend.user-dashboard') ? 'is-active' : '' }}">
            <a href="{{ route('frontend.user-dashboard') }}">Dashboard</a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders {{ request()->routeIs('frontend.user-orders') ? 'is-active' : '' }}">
            <a href="{{ route('frontend.user-orders') }}">Orders</a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
            <a href="my-account-address.html">Addresses</a>
        </li>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
            <a href="my-account-ac-details.html">Account details</a>
        </li>
        @if(auth()->user()->is_admin == 1)
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
            <a href="{{ route('admin.dashboard') }}" target="_blank">Admin Dasboard</a>
        </li>
        @endif
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </li>
    </ul>
</nav>