@extends('layout.app')

@section('title', 'Cart - Global Pentry')

@section('content')


    <section id="home" class="banner-bg cart-banner vh-40 vh-md-60 d-flex align-items-center justify-content-center rounded-bottom shadow-lg position-relative">
        <div class="banner-overlay position-absolute top-0 bottom-0 start-0 end-0 rounded-bottom"></div>
        <div class="container text-center z-1 p-4 rounded-3 position-relative">
            <h1 class="display-4 fw-bolder text-black mb-3 text-shadow">
                Cart
            </h1>
        </div>
    </section>

<section class="add-to-cart all-section-inner">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-12">
                <div class="table-responsive">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Sub Price</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                            {{-- ITEM 1 --}}
                            <tr class="space">
                                <td class="col-md-5">
                                    <div class="row">
                                        <div class="table-space d-flex">

                                            <div class="col-md-5 no-padding">
                                                <div class="cart-product-img">
                                                    <img src="{{ asset('images/pro2.jpg') }}" 
                                                         alt=""
                                                         class="img-responsive">
                                                </div>
                                            </div>

                                            <div class="col-md-7 no-space">
                                                <h6>Ipsum Dolar</h6>
                                                <!-- <span>Size: M</span><br> -->
                                                <span>30 Reviews</span>
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                <td class="col-md-3">
                                    <div class="number-item">
                                        <ul class="list-inline pr_counter d-flex align-items-center justify-content-center">
                                            <li class="inc">
                                                <span class="input-number-decrement">–</span>
                                                <input class="input-number4" type="text" value="1">
                                                <span class="input-number-increment">+</span>
                                            </li>
                                        </ul>
                                        <a href="#" class="update">Update Cart</a>
                                    </div>
                                </td>

                                <td class="col-md-2"><h4>$22</h4></td>
                                <td class="col-md-2"><h4>$44</h4></td>
                                <td><a href="#" class="remove">x</a></td>
                            </tr>

                            {{-- ITEM 2 --}}
                            <tr class="space">
                                <td class="col-md-5">
                                    <div class="row">
                                        <div class="table-space d-flex">

                                            <div class="col-md-5 no-padding">
                                                <div class="cart-product-img">
                                                    <img src="{{ asset('images/pro8.jpg') }}" 
                                                         alt=""
                                                         class="img-responsive">
                                                </div>
                                            </div>

                                            <div class="col-md-7 no-space">
                                                <h6>Ipsum Dolar</h6>
                                                <!-- <span>Size: M</span><br> -->
                                                <span>30 Reviews</span>
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                <td class="col-md-3">
                                    <div class="number-item">
                                        <ul class="list-inline pr_counter d-flex align-items-center justify-content-center">
                                            <li class="inc">
                                                <span class="input-number-decrement">–</span>
                                                <input class="input-number4" type="text" value="1">
                                                <span class="input-number-increment">+</span>
                                            </li>
                                        </ul>
                                        <a href="#" class="update">Update Cart</a>
                                    </div>
                                </td>

                                <td class="col-md-2"><h4>$22</h4></td>
                                <td class="col-md-2"><h4>$44</h4></td>
                                <td><a href="#" class="remove">x</a></td>
                            </tr>

                        </tbody>

                    </table>

                </div>

                {{-- PROCEED --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="proceed">

                            <div class="col-md-5 col-sm-12">
                                 <a href="{{ url('/browse') }}">

                                    Continue Purchasing
                                    <span><i class="fa fa-angle-right"></i></span>
                                </a>
                            </div>

                            <div class="col-md-7 col-sm-12 text-center">
                              <a href="{{ url('/checkout') }}" class="checkout-btn">
                                    Proceed To Cash Checkout
                                </a>
                            </div>

                        </div>
                    </div>

                 
                </div>
            </div>

            {{-- ORDER SUMMARY --}}
            <div class="col-md-12 col-lg-3">
                <div class="total-section border-gri-top">
                    <ul class="p-0 check-out-side-icon">
                        <li>Sub Total <span>$76</span></li>
                        <li>Discount <span>$10</span></li>
                        <li>Shipping <span>$15</span></li>
                        <li class="color-change">Total <span>$91</span></li>
                    </ul>
                </div>

                <div class="ship-estimate border-gri-top">
                    <ul class="p-0 check-out-side-icon">
                        <li>Shipping</li>
                        <li class="grey-style">Courier ($15)</li>
                    </ul>

                    <ul class="p-0 check-out-side-icon">
                        <li>Estimate For</li>
                        <li class="grey-style">United States, NY, 1230</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


@endsection
