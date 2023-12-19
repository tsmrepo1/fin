@extends('layouts.app')

@section('content')
<div class="main__body__wrapp">
    <div class="what__you__wrapp">

        @if(count($records) > 0)
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 col-xxl-8 pe-lg-4">
                    <div class="table-responsive">
                        <table class="table cart-data-table">
                            <thead>
                                <tr class="bg--primary">
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Regular Price</th>
                                    <th scope="col">Sale Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                <tr class="cart-data-table__row">
                                    <td>
                                        <a href="{{ route('course.single', $record->id) }}" class="d-flex align-items-center cart-data-table__product">
                                            <span class="cart-data-table__product-image me-3">
                                                <img src="{{ asset(Storage::url($record->thumbnail)) }}" />
                                            </span>
                                            <span class="cart-data-table__product-title" style="text-align: left;">{{ $record->title }}</span>
                                        </a>
                                    </td>
                                    <td class="text--heading fw-bold">{{ '$'.$record['price'] }}</td>
                                    <td class="text--heading fw-bold">{{ '$'.$record['sale_price'] }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="cart-data-table__button--remove-row"><i class="bi bi-x-lg"></i></a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="empty-cart-text text-center d-none error-text mt-3">
                        No item has been added to the cart.
                    </p>


                    <div class="checkout-steps mx-4 mx-sm-0 d-none">
                        <div class="checkout-step__content mt-4">
                            <div class="address-container">
                                <ul class="address-saved-list row">
                                    <li class="address-saved-list__item col-12 col-sm-6 col-xl-4 selected">
                                        <div class="p-4 bg--light border-radius--custom border-custom-1">
                                            <p class="text--xs text--primary m-0 p-2">
                                                1/30 Lorem Street, Kolkata-5050, Near Lorem Shop
                                            </p>
                                            <a href="javascript:void(0)" class="address-saved-list__item--select-btn"><i class="bi bi-check-circle-fill"></i></a>
                                        </div>
                                    </li>
                                    <li class="address-saved-list__item col-12 col-sm-6 col-xl-4">
                                        <div class="p-4 bg--light border-radius--custom border-custom-1">
                                            <p class="text--xs text--primary m-0 p-2">
                                                1/30 Lorem Street, Kolkata-5050, Near Lorem Shop
                                            </p>
                                            <a href="javascript:void(0)" class="address-saved-list__item--select-btn"><i class="bi bi-check-circle-fill"></i></a>
                                        </div>
                                    </li>
                                    <div class="col-12 col-sm-6 col-xl-4 mt-3 mt-sm-0 text-center text-sm-start">
                                        <a class="button button-primary d-inline-block w-auto address-container__button--add-adress" data-bs-toggle="offcanvas" href="#addAddressOffCanvas" role="button" aria-controls="offcanvasExample">Add Address<span class="ms-1"><i class="bi bi-plus"></i></span></a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 col-xxl-4 mt-5 mt-lg-0">
                    <div class="cart-total-wrapper order-summary bg--light border-custom-1 border-radius--custom p-4">
                        <h3>Total: ${{ $total }}</h3>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{route('cart-checkout')}}" class="button button-primary con w-100 text-center">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <img src="{{ asset('assets/frontend/images/empty-shopping-cart-v2.jpg') }}" class="m-auto d-block pt-5">
                    <h5 class="text-center pb-5">Your cart is empty. Keep shopping to find a course!</h5>
                    <a href="#" class="keep">Keep shopping</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@stop