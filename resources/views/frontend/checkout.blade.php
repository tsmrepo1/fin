@extends('layouts.app')

@section('content')
<div class="main__body__wrapp">
    <div class="header__banner__main header__banner__inner">
        <div class="image__box">
            <img alt="" src="{{asset('assets/frontend/images/innerbanner.jpg')}}" />
        </div>
        <div class="banner__content">
            <div class="container">
                <div class="row">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="what__you__wrapp">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <h2 class="pt-0 mb-4">Checkout</h2>
                </div>
            </div>

            <form method="POST" action="{{ route('payment', $ids) }}">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <div class="row">
                            <div class="col-sm-8 mb-4">
                                <h3 class="pt-0 mb-3">Contact</h3>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                                <div class="form-group checkout__form">
                                    <p>Email</p>
                                    @if(auth()->user())
                                    <input class="form-control" type="text" value="{{auth()->user()->email}}" name="email" placeholder="Email">
                                    @else
                                    <input class="form-control" type="text" name="email" placeholder="Email">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 mb-4">
                                    <h3 class="pt-0 mb-3">Billing Address</h3>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                                    <div class="form-group checkout__form">
                                        <p>Name</p>
                                        @if(auth()->user())
                                        <input class="form-control" type="text" value="{{auth()->user()->name}}" name="name" placeholder="Name">
                                        @else
                                        <input class="form-control" type="text" name="name" placeholder="Name">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                                    <div class="form-group checkout__form">
                                        <p>Phone</p>
                                        <input class="form-control" type="text" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                                    <div class="form-group checkout__form">
                                        <p>Address</p>
                                        <input class="form-control" type="text" placeholder="Address" name="address">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-5 mb-4">
                                    <div class="form-group checkout__form">
                                        <p>Country</p>
                                        <input class="form-control" type="text" placeholder="Country" name="country">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-5 mb-4">
                                    <div class="form-group checkout__form">
                                        <p>State</p>
                                        <input class="form-control" type="text" placeholder="State" name="state">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-4">
                                    <div class="form-group checkout__form">
                                        <p>PIN Code</p>
                                        <input class="form-control" type="text" placeholder="Pincode" name="pincode">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="checkout__holder">
                            <h3>Order Details</h3>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Total</td>
                                        <td style="text-align: right;">{{$total == 0 ? "Free" : '$'.$total}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td style="text-align: right;">17%</td>
                                    </tr>
                                    <tr>
                                        <td>Grand Total</td>
                                        <td style="text-align: right;">${{ $total + (((float)$total * 17)/100)  }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="place_order">
                                <input class="form-control" type="submit" value="Place Order">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop