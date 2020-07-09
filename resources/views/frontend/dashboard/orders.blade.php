@extends('layouts.frontend')

@section('content')
    <!--page title start-->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-bold">My Account</h2>
                    <nav class="woocommerce-breadcrumb">
                        <a href="{{ route('frontend.home') }}">Home</a>
                        <span class="breadcrumb-separator"> / </span>My Account
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--page title end-->
    <main class="site-main">
        <!--shop category start-->
        <section class="space-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="woocommerce">
                            @include('frontend.dashboard.partials.dashboard_sidebar')
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="woocommerce-MyAccount-content">
                            <div class="woocommerce-notices-wrapper"></div>

                            <table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
                                <thead>
                                <tr>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">Order</span></th>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Date</span></th>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Status</span></th>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">Total</span></th>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">Actions</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                        <a href="#">
                                            #80								
                                        </a>

                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                        <time datetime="2019-06-12T06:25:27+00:00">June 12, 2019</time>
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
                                        Processing
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>54.00</span> for 3 items
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                        <a href="my-account-view-order.html" class="woocommerce-button button view">View</a>
                                    </td>
                                </tr>
                                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                        <a href="#">
                                            #74								
                                        </a>
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                        <time datetime="2019-06-11T08:35:53+00:00">June 11, 2019</time>

                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
                                        Processing
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>18.00</span> for 1 item
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                        <a href="my-account-view-order.html" class="woocommerce-button button view">View</a>
                                    </td>
                                </tr>
                                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                        <a href="#">
                                            #72								
                                        </a>
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                        <time datetime="2019-06-11T08:27:27+00:00">June 11, 2019</time>

                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
                                        Processing
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>36.00</span> for 2 items
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                        <a href="my-account-view-order.html" class="woocommerce-button button view">View</a>
                                    </td>
                                </tr>
                                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                        <a href="#">
                                            #70								
                                        </a>
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                        <time datetime="2019-06-11T08:26:18+00:00">June 11, 2019</time>

                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
                                        On hold
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>122.00</span> for 5 items
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                        <a href="my-account-view-order.html" class="woocommerce-button button view">View</a>
                                    </td>
                                </tr>
                                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-completed order">
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
                                        <a href="#">
                                            #64								
                                        </a>
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                        <time datetime="2019-06-10T20:50:26+00:00">June 10, 2019</time>
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
                                        Completed
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>107.00</span> for 4 items
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                        <a href="my-account-view-order.html" class="woocommerce-button button view">View</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--shop category end-->
    </main>

@endsection