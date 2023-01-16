@extends('web.partials.master')

@push('styles')

@endpush
@section('content')

    <!-- Products -->
    <div class="products">


        @if( $products->count() )
        <div class="container">

            <div class="row" style="margin:50px 0">
                <h2 class="text-center w-100" >Search Results For "{{ request('search_term') }}"</h2>
            </div>

        </div>
        @endif
        <div class="container" style="margin:100px">
            <div class="row">
                @forelse($products as $product)
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
                @empty
                    <div class="col-12">
                        <h2 class="w-100 text-center">There no result for "{{ request('search_term') }}"</h2>
                    </div>
               @endforelse
            </div>

        </div>
    </div>

@endsection
@push('scripts')
@endpush
