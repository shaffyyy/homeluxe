@extends('layouts.base')

@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Checkout</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section Start -->
<section class="section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <form class="needs-validation" method="POST" action="{{ route('order.store') }}">
                    @csrf
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Billing address</h3>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="locality" class="form-label">Locality</label>
                            <input type="text" class="form-control" id="locality" name="locality" placeholder="Locality" required>
                        </div>
                        <div class="col-md-6">
                            <label for="landmark" class="form-label">Landmark</label>
                            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Landmark">
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                        </div>
                        <div class="col-md-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select custome-form-select" id="country" name="country" required>
                                <option>Philippines</option>
                            </select>
                            <div class="invalid-feedback">Please select a valid country.</div>
                        </div>
                        <div class="col-md-3">
                            <label for="state">Province</label>
                            <select class="form-select custome-form-select" id="state" name="state" required>
                                <option selected="" disabled="" value="">Choose Province...</option>
                                <option value="Metro Manila">Metro Manila</option>
                                <option value="Cebu">Cebu</option>
                                <option value="Davao del Sur">Davao del Sur</option>
                                <option value="Ilocos Norte">Ilocos Norte</option>
                                <option value="Laguna">Laguna</option>
                                <option value="Pampanga">Pampanga</option>
                                <option value="Rizal">Rizal</option>
                                <option value="Batangas">Batangas</option>
                                <option value="Bulacan">Bulacan</option>
                                <option value="Cavite">Cavite</option>
                                <option value="Isabela">Isabela</option>
                                <option value="Nueva Ecija">Nueva Ecija</option>
                                <option value="Pangasinan">Pangasinan</option>
                                <option value="Quezon">Quezon</option>
                                <option value="Zambales">Zambales</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="123456" required>
                        </div>
                        <div class="col-md-12 form-check ps-0 mt-3 custome-form-check" style="padding-left:15px !important;">
                            <input class="checkbox_animated check-it" type="checkbox" name="sameAsBilling" id="sameAsBilling">
                            <label class="form-check-label checkout-label" for="sameAsBilling">Shipping address is same as Billing Address</label>
                        </div>
                    </div>
                
                    <div id="shippingAddress" class="row g-4 mt-5">
                        <h3 class="mb-3 theme-color">Shipping address</h3>
                        <div class="col-md-6">
                            <label for="s_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="s_name" name="s_name" placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="s_phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="s_phone" name="s_phone" placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6">
                            <label for="s_locality" class="form-label">Locality</label>
                            <input type="text" class="form-control" id="s_locality" name="s_locality" placeholder="Locality">
                        </div>
                        <div class="col-md-6">
                            <label for="s_landmark" class="form-label">Landmark</label>
                            <input type="text" class="form-control" id="s_landmark" name="s_landmark" placeholder="Landmark">
                        </div>
                        <div class="col-md-12">
                            <label for="s_address" class="form-label">Address</label>
                            <textarea class="form-control" id="s_address" name="s_address"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="s_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="s_city" name="s_city" placeholder="City">
                        </div>
                        <div class="col-md-3">
                            <label for="s_country" class="form-label">Country</label>
                            <select class="form-select custome-form-select" id="s_country" name="s_country">
                                <option>Philippines</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="s_state">Province</label>
                            <select class="form-select custome-form-select" id="s_state" name="s_state" required>
                                <option selected="" disabled="" value="">Choose Province...</option>
                                <option value="Metro Manila">Metro Manila</option>
                                <option value="Cebu">Cebu</option>
                                <option value="Davao del Sur">Davao del Sur</option>
                                <option value="Ilocos Norte">Ilocos Norte</option>
                                <option value="Laguna">Laguna</option>
                                <option value="Pampanga">Pampanga</option>
                                <option value="Rizal">Rizal</option>
                                <option value="Batangas">Batangas</option>
                                <option value="Bulacan">Bulacan</option>
                                <option value="Cavite">Cavite</option>
                                <option value="Isabela">Isabela</option>
                                <option value="Nueva Ecija">Nueva Ecija</option>
                                <option value="Pangasinan">Pangasinan</option>
                                <option value="Quezon">Quezon</option>
                                <option value="Zambales">Zambales</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="s_zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="s_zip" name="s_zip" placeholder="123456">
                        </div>
                    </div>
                
                    <div class="form-check ps-0 mt-3 custome-form-check">
                        <input class="checkbox_animated check-it" type="checkbox" name="saveAddress" id="saveAddress">
                        <label class="form-check-label checkout-label" for="saveAddress">Save this information for next time</label>
                    </div>
                
                    <hr class="my-lg-5 my-4">
                
                    <h3 class="mb-3">Payment</h3>
                
                    <div class="d-block my-3">
                        <div class="form-check custome-radio-box">
                            <input class="form-check-input" type="radio" name="payment_method" value="cod" id="cod" checked>
                            <label class="form-check-label" for="cod">COD</label>
                        </div>
                        <div class="form-check custome-radio-box">
                            <input class="form-check-input" type="radio" name="payment_method" value="debit" id="debit">
                            <label class="form-check-label" for="debit">Debit card</label>
                        </div>
                        <div class="form-check custome-radio-box">
                            <input class="form-check-input" type="radio" name="payment_method" value="paypal" id="paypal">
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                
                    <button class="btn btn-solid-default mt-4" type="submit">Place Order</button>
                </form>
                
            </div>

            <div class="col-lg-4">
                <div class="your-cart-box">
                    <h3 class="mb-3 d-flex text-capitalize">Your cart<span
                            class="badge bg-theme new-badge rounded-pill ms-auto bg-dark">{{Cart::instance('cart')->content()->count()}}</span>
                    </h3>
                    <ul class="list-group mb-3">



                        <li class="list-group-item d-flex justify-content-between lh-condensed active">
                            <div class="text-dark">
                                <h6 class="my-0">Tax</h6>
                                <small></small>
                            </div>
                            <span>${{Cart::instance('cart')->tax()}}</span>
                        </li>
                        <li class="list-group-item d-flex lh-condensed justify-content-between">
                            <span class="fw-bold">Total (USD)</span>
                            <strong>${{Cart::instance('cart')->total()}}</strong>
                        </li>
                    </ul>

                    <form class="card border-0">
                        <div class="input-group custome-imput-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-solid-default rounded-0">Redeem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section End -->
@endsection