@extends('web.partials.master')
@push('styles')
    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('web-assets/styles/cart.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web-assets/styles/cart_responsive.css') }}">
    </head>
@endpush
@section('content')

<div class="super_container">

    <!-- Home -->

    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url('{{ asset('web-assets/images/cart.jpg') }}')"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Info -->
    @if(auth()->check())
    <div class="cart_info">
        <div class="container">
            <div class="row">

                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Product</div>
                        <div class="cart_info_col cart_info_col_price">Price</div>
                        <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                        <div class="cart_info_col cart_info_col_total">Total</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">
                <div class="col" style="overflow-y: scroll; height:400px; ">

                @forelse(auth()->user()->carts as $cart)
                    <!-- Cart Item -->
                <form method="POST" action="{{ route('web.cart.update',$cart) }}">
                    @method('PUT')
                    @csrf
                    <div  class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                        <!-- Name -->
                        <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_item_image">
                                <div><img src="{{ asset('storage/Images/Products/' . $cart->product['image']) }}" alt=""></div>
                            </div>
                            <div class="cart_item_name_container">
                                <div class="cart_item_name"><a href="#">{{$cart->product->name}}</a></div>
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="cart_item_price">{{$cart->product->price}}Egp</div>
                        <!-- Quantity -->
                        <div class="cart_item_quantity">
                            <div class="product_quantity_container">
                                <div class="product_quantity clearfix">
                                    <span>Qty</span>

                                    <input id="quantity_input" type="text"
                                           value="{{ $cart->product_quantity }}" name="product_quantity">

                                    <div class="quantity_buttons mx-10">
                                        <div  id="quantity_inc_button" class="quantity_control" ><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                        <div  id="quantity_dec_button" class="quantity_control" ><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="hidden" value="{{ $cart->product->id }}" name="product_id">
                                    @if(auth()->check())
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="cart_item_total">{{$cart->product->price * $cart->product_quantity}}Egp</div>
                    </div>
                    <button type="submit" class="btn btn-block"> update cart</button>
                </form>
                @empty
                        <tr>
                            <td colspan="6">
                                <h4 class="text-muted text-center my-4">The cart is empty</h4>
                            </td>
                        </tr>
                    @endforelse

                </div>

            </div>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="btn  btn-block border-active-dark"><a href="{{route('web.index')}}">Continue shopping</a></div>
                        <form method="POST" action="{{ route('web.cart.clear') }}">
                            @csrf
                            <button type="submit" class="btn btn-block"> Clear cart</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row row_extra">

                <div class="col-lg-4">

                    <!-- Delivery -->
                    <div class="delivery">
                        <form action="{{route('web.order.createOrder')}}" method="post">
                            @csrf
                        <div class="section_title">Shipping method</div>
                        <div class="section_subtitle">Select the one you want</div>
                        <div class="delivery_options">
                            <label class="delivery_option clearfix">Next day delivery
                                <input type="radio" checked="checked" name="shipping" value="15">
                                <span class="checkmark"></span>
                                <span class="delivery_price">15Egp</span>
                            </label>
                            <label class="delivery_option clearfix">Standard delivery
                                <input type="radio"checked="checked" name="shipping" value="10">
                                <span class="checkmark"></span>
                                <span class="delivery_price">10Egp</span>
                            </label>
                            <label class="delivery_option clearfix">Personal pickup
                                <input type="radio" checked="checked" name="shipping" value="0">
                                <span class="checkmark"></span>
                                <span class="delivery_price">Free</span>
                            </label>
                            <button type="submit" class="btn btn-dark"> Proceed to checkout </button>


                        </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Cart total</div>
                        <div class="section_subtitle">Final info</div>
                        <div class="cart_total_container">
                            <ul>

                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title" >Subtotal</div>
                                    <div class="cart_total_value ml-auto">{{ $subtotal }}Egp</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Shipping</div>
                                    <div class="cart_total_value ml-auto"><span id="shipping-val">0</span>Egp</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Total</div>
                                    <div class="cart_total_value ml-auto">{{$subtotal}}Egp</div>
                                </li>


                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @else
        <tr>
            <td colspan="6">
                <h4 class="text-muted text-center my-4">.</h4>
            </td>
        </tr>
    @endif
    </div>

</div>
@endsection
@push('scripts')
{{--    <script>--}}
{{--        let $product_stock_quantity = {{ $cart->product_quantity }}--}}
{{--        console.log($product_stock_quantity);--}}
{{--    </script>--}}
    <script src="{{ asset('web-assets/js/cart.js') }}"></script>
    <script>
        $('input[name=shipping]').change( function (){
            $('#shipping-val').html( $(this).val() )
        });
    </script>
@endpush

