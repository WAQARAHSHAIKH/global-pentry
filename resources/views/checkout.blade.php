@extends('layout.app')

@section('title', 'Checkout - Veridan Roots')

@section('content')
<section class="checkout-page sec py-5 bg-light" style="margin-top:80px;">
    <div class="container">
        <h2 class="mb-5 text-center fw-bold">Checkout</h2>

        <div class="row">
            <!-- Billing Details -->
            <div class="col-lg-7 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">Billing Information</h5>

                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" placeholder="John">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Doe">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="you@example.com">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" placeholder="+123 456 7890">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" placeholder="123 Street, City, Country">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" placeholder="City">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" placeholder="12345">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Payment Method</label>
                                <select class="form-select">
                                    <option selected disabled>Choose Payment Option</option>
                                    <option>Credit / Debit Card</option>
                                    <option>Cash on Delivery</option>
                                    <option>PayPal</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                Place Order <i class="fa-solid fa-leaf ms-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">Order Summary</h5>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/product2.png') }}" alt="product" width="60" class="rounded me-3">
                                <div>
                                    <h6 class="mb-0">Herbal Hair Oil</h6>
                                    <small class="text-muted">Qty: 1</small>
                                </div>
                            </div>
                            <span>$39.99</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>$39.99</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span>$5.00</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-3">
                            <strong>Total</strong>
                            <strong>$44.99</strong>
                        </div>

                        <p class="text-muted small">
                            Your personal data will be used to process your order and support your experience throughout this website.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection