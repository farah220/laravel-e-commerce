@extends('web.partials.master')
@push('styles')

        <link href="{{ asset('web-assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="{{ asset('web-assets/styles/product.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web-assets/styles/product_responsive.css') }}">

@endpush
@section('content')

<div class="super_container">

    <!-- Home -->
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url('{{ asset('web-assets/images/categories.jpg') }}')"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">Smart Phones<span>.</span></div>
                                <div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Details -->

    <div class="product_details">
        <div class="container">
            <div class="row details_row">
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_large"><img src="{{ asset('storage/Images/Products/' . $product['image']) }}" alt="">
                        <div class="product_extra product_new"><a href="categories.html">New</a></div></div>

                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    @if( session()->has('success_message') )
                        @include('dashboard.partials.success_alert')
                    @endif
                    <div class="details_content">
                        <div class="details_name">{{ $product->name }}</div>
                        @if( $product->price_after_discount !== null)
                        <div class="details_discount">{{ $product->price }}</div>
                        <div class="details_price">{{ $product->price_after_discount }}</div>
                        @else
                            <div class="details_price">{{ $product->price }}</div>
                        @endif

                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <div class="availability">Availability:</div>
                        @if( $product->stock_quantity !== "0")
                            <span>In Stock</span>
                         @else
                            <span class="text-danger">Out of Stock</span>
                        @endif
                        </div>
                        <div class="details_text">
                            <p>{{ $product->description }}</p>
                        </div>

                        <!-- Product Quantity -->
                        <form action="{{ route('web.cart.store',$product->id) }}" method="post">
                            @csrf
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Qty</span>

                                <input id="quantity_input" type="text"
                                       {{ $product_stock = $product->stock_quantity }} value="0" name="product_quantity">

                                <div class="quantity_buttons mx-10">
                                    <div  id="quantity_inc_button" class="quantity_control" ><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div  id="quantity_dec_button" class="quantity_control" ><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                @if(auth()->check())
                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                @endif

                            </div>
                            <button type="submit" class="btn btn-dark " >Add to cart</button>

                        </div>
                        </form>
                        @error('product_quantity')
                        <p class="text-danger"> {{$message}}</p>
                        @enderror


                    </div>
                </div>
            </div>

            <div class="row description_row">
                <div class="col">
                    <div class="description_title_container">
                        <div class="description_title">Description</div>
                        <div class="reviews_title"><a href="#">Reviews <span>(1)</span></a></div>
                    </div>
                    <div class="description_text">
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Related Products</div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">
                        @foreach($products as $product)
                        <!-- Product -->
                        <div class="product">
                            <div class="product_image"><img src="{{ asset('storage/Images/Products/' . $product['image']) }}" alt=""></div>
                            @if( $product->price_after_discount !== null)
                            <div class="product_extra product_sale">Sale</div>
                            @endif
                            @if($loop->last)
                            <div class="product_extra product_new">New</div>
                            @endif
                            <div class="product_content">
                                <div class="product_title"><a href={{ route('web.product',$product->id) }}>{{ $product->name }}</a></div>
                                <div class="product_price">{{ $product->price }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_border"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter_content text-center">
                        <div class="newsletter_title">Subscribe to our newsletter</div>
                        <div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
                        <div class="newsletter_form_container">
                            <form action="#" id="newsletter_form" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required">
                                <button class="newsletter_button trans_200"><span>Subscribe</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
@push('scripts')

    <script>
        let $product_stock_quantity = {{ $product_stock }}
        console.log($product_stock_quantity);
    </script>

    <script src="{{ asset('web-assets/js/product.js') }}"></script>
@endpush
