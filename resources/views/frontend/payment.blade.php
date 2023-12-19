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
                    <h1>Order Summary</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="what__you__wrapp">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <h2 class="pt-0 mb-4">Order Summary</h2>
                </div>
            </div>
            <form>
                @csrf
            </form>

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
                                <input class="form-control" type="text" value="{{auth()->user()->email}}" name="email" placeholder="Email" disabled readonly>
                                @else
                                <input class="form-control" type="text" name="email" placeholder="Email" disabled readonly>
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
                                    <input class="form-control" type="text" value="{{auth()->user()->name}}" name="name" placeholder="Name" disabled readonly>
                                    @else
                                    <input class="form-control" type="text" name="name" placeholder="Name" disabled readonly>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                                <div class="form-group checkout__form">
                                    <p>Phone</p>
                                    <input class="form-control" type="text" name="phone" placeholder="Phone" value="{{$inputs['phone']}}" disabled readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                                <div class="form-group checkout__form">
                                    <p>Address</p>
                                    <input class="form-control" type="text" placeholder="Address" name="address" value="{{ $inputs['address'] }}" disabled readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-5 mb-4">
                                <div class="form-group checkout__form">
                                    <p>Country</p>
                                    <input class="form-control" type="text" placeholder="Country" name="country" value="{{ $inputs['country'] }}" disabled readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-5 mb-4">
                                <div class="form-group checkout__form">
                                    <p>State</p>
                                    <input class="form-control" type="text" placeholder="State" name="state" value="{{ $inputs['state'] }}" disabled readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-4">
                                <div class="form-group checkout__form">
                                    <p>PIN Code</p>
                                    <input class="form-control" type="text" placeholder="Pincode" name="pincode" value="{{ $inputs['pincode'] }}" disabled readonly>
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
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=AWb3YLX1iFbEJhu5Va-6NobdCFdrpb_x5pC4lxAXNgXzhKN0aGaymQepce8wJsfC-U2prmZnSuWrr57b"></script>
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        currency_code: "USD",
                        value: "{{ $total + (((float)$total * 17)/100) }}"
                    }
                }],
                intent: "CAPTURE",
                // payer: {
                //     email_address: "{{ auth()->user()->email }}",
                //     name: {
                //         given_name: "Raktim",
                //         surname: "Banerjee"
                //     },
                //     address: {
                //         address_line_1: "{{ $inputs['address'] }}",
                //         admin_area_1: "{{ $inputs['state'] }}",
                //         postal_code: "{{ $inputs['pincode'] }}",
                //         country_code: "{{ $inputs['country'] }}"
                //     },
                // },
                payment_source: {
                    paypal: {
                        experience_context: {
                            brand_name: "FintekIN",
                            locale: "en-US",
                            landing_page: "LOGIN",
                            user_action: "PAY_NOW",
                            return_url: "https://example.com/cancelUrl",
                            cancel_url: "https://example.com/cancelUrl"
                        }
                    }
                },
                application_context: {
                    shipping_preference: 'NO_SHIPPING'
                }
            })
        },
        onApprove(data) {
            console.log("Success")
            console.log(data)

            let formdata = new FormData()

            formdata.append("order_id", <?php echo $order->id ?>)
            formdata.append("paypal_order_id", data.orderID)
            formdata.append("paypal_payment_id", data.paymentID)

            fetch("{{route('payment.success')}}", {
                    headers: {
                        "X-CSRF-Token": $('input[name="_token"]').val()
                    },
                    method: "POST",
                    body: formdata
                })
                .then(response => response.json())
                .then(data => {
                    window.location.href = "{{route('my_courses')}}"
                    console.log(data)
                })
        },
        onCancel(data) {
            console.log("Failed")
            console.log(data)

            let formdata = new FormData()
            formdata.append("order_id", <?php echo $order->id ?>)

            fetch("{{route('payment.cancel')}}", {
                    headers: {
                        "X-CSRF-Token": $('input[name="_token"]').val()
                    },
                    method: "POST",
                    body: formdata
                })
                .then(response => response.json())
                .then(data => {
                    alert("Payment failed. Please try again!!")
                    console.log(data)
                })
        }
    }).render("#paypal-button-container")
</script>
@stop