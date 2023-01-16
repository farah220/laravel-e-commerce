@extends('web.partials.master')

@push('styles')

@endpush
@section('content')

    <!-- Home -->

    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                @foreach( $sliders as $slider)
                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url('{{ asset('storage/Images/Sliders/' . $slider->image ) }}')"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">{{ $slider->title }}</div>
                                        <div class="home_slider_subtitle">{{ $slider->body }}</div>
                                        @if( $slider->button_url && $slider->button_text )
                                            <div class="button button_light home_button"><a href="{{ $slider->button_url }}">{{ $slider->button_text }}</a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Home Slider Dots -->

            <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
{{--                                    @for($i=1;$i<=$sliders->count();$i++)--}}
{{--                                        <li class="home_slider_custom_dot @if( $i==1 ) active @endif">{{ $i < 10 ? '0' . $i . '.' : $i }}</li>--}}
{{--                                    @endfor--}}
                                    @foreach($sliders as $slider)
                                    <li class="home_slider_custom_dot {{ $loop->first ? 'active' : ''  }}">{{ $loop->iteration < 10 ? "0$loop->iteration." : $loop->iteration }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Products -->

    <div class="products">

        <div class="container">
            <div class="row">
                @foreach($products as $product)
                <div class="col-3 ">
                    <div class="product_grid">
                        <!-- Product -->
                        <div class="product w-100">
                            <div class="product_image"><img src="{{ asset('storage/Images/Products/' . $product['image']) }}" alt="" width="250" height="300"></div>
                            @if( $product->price_after_discount !== null)
                            <div class="product_extra product_sale">Sale</div>
                            @endif
                            <div class="product_content">
                                <div class="product_title"><a href="{{ route('web.product',$product->id) }}">{{$product->name}}</a></div>
                                @if( $product->price_after_discount !== null)
                                <div class="product_price">{{ $product->price_after_discount }} EGP</div>
                                <del>{{ $product->price }} EGP</del>
                                @else
                                <div class="product_price">{{ $product->price }} EGP</div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>

        </div>
    </div>

    <!-- Ad -->

    <div class="avds_xl">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="avds_xl_container clearfix">
                        <div class="avds_xl_background" style="background-image:url('{{ asset('web-assets/images/avds_xl.jpg') }}')"></div>
                        <div class="avds_xl_content">
                            <div class="avds_title">Amazing Devices</div>
                            <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.</div>
                            <div class="avds_link avds_xl_link"><a href="categories.html">See More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Icon Boxes -->

    <div class="icon_boxes">
        <div class="container">
            <div class="row icon_box_row">

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{ asset('web-assets/images/icon_1.svg') }}" alt=""></div>
                        <div class="icon_box_title">Free Shipping Worldwide</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{ asset('web-assets/images/icon_2.svg') }}" alt=""></div>
                        <div class="icon_box_title">Free Returns</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{ asset('web-assets/images/icon_3.svg') }}" alt=""></div>
                        <div class="icon_box_title">24h Fast Support</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
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
            @if( session()->has('success_message') )
                @include('dashboard.partials.success_alert')
            @endif
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter_content text-center">
                        <div class="newsletter_title">Subscribe to our newsletter</div>
                        <div class="newsletter_text"><p>Subscribe to get all news</p></div>
                        <div class="newsletter_form_container">
                            <form action="{{ route('web.subscription') }}" id="newsletter_form" class="newsletter_form" method="POST">
                                @csrf
                                <input type="email" name="email" class="newsletter_input">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                <br/>
                                <button class="btn btn-dark" style="margin-top: 20px; width: 200px;" type="submit"><span>Subscribe</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
