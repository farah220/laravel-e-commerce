@extends('dashboard.partials.master')
@section('content')

    <!-- begin :: Subheader -->
    <div class="toolbar">

        <div class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <!-- begin :: Title -->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Products</h1>
                <!-- end   :: Title -->

                <!-- begin :: Separator -->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!-- end   :: Separator -->


            </div>

        </div>

    </div>
    <!-- end   :: Subheader -->

    @if( count($errors) > 0 )
        @include('dashboard.partials.error_alert')
    @endif

    <div class="card">
        <!-- begin :: Card body -->
        <div class="card-body p-0">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.products.store') }}" class="form" method="post"
                  enctype="multipart/form-data">
            @csrf
            <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark"> Add Product</h3>
                </div>
                <!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="px-8 py-4">


                    <!-- begin :: Row -->
                    <div class="row mb-8">


                        <!-- begin :: Column -->
                        <div class="col-md-12 text-center mb-5 fv-row">

                            <!--begin::Image input-->
                            <div class="image-input image-input-empty" data-kt-image-input="true"
                                 style="background-image: url('{{ asset('dashboard-assets/media/avatars/blank.png') }}')">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <!--end::Image preview wrapper-->

                                <!--begin::Edit button-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                    data-kt-image-input-action="change"
                                    data-bs-toggle="tooltip"
                                    data-bs-dismiss="click"
                                    title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>

                                    <!--begin::Inputs-->
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                    <input type="hidden" name="avatar_remove"/>
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Edit button-->

                            </div>
                            <!--end::Image input-->


                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->


                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">Name</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_inp" name="name" placeholder="example"
                                       value="{{ old('name') }}">
                                <label for="name_inp">Enter Name</label>
                            </div>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror


                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">Description</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_inp" name="description"
                                       placeholder="example" value="{{ old('description') }}">
                                <label for="phone_inp">Description</label>
                            </div>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror


                        </div>
                        <!-- end   :: Column -->

                    </div>
                    <!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">Price</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="email_inp" name="price"
                                       placeholder="example" value="{{ old('price') }}">
                                <label for="email_inp">Price</label>
                            </div>
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">Price After Discount</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_inp" name="price_after_discount"
                                       placeholder="example" value="{{ old('price_after_discount') }}">
                                <label for="phone_inp">Price After Discount</label>
                            </div>
                            @error('price_after_discount')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">Stock Quantity</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_inp" name="stock_quantity"
                                       placeholder="example" value="{{ old('stock_quantity') }}">
                                <label for="phone_inp">Stock Quantity</label>
                            </div>
                            @error('stock_quantity')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror


                        </div>
                        <!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">SKU</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phone_inp" name="sku" placeholder="example"
                                       value="{{ old('sku') }}">
                                <label for="phone_inp">SKU</label>
                            </div>
                            @error('sku')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror


                        </div>
                        <!-- end   :: Column -->
                        <div class="col-md-6 fv-row" id="children-categories-container" >

                            <label class="fs-5 fw-bold mb-2">Category</label>
                            <select class="form-select" data-control="select2"  name="category_id" multiple data-placeholder="Select an option">
                                <option value=""> </option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            @error('categories')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <!-- end   :: Row -->

                </div>
                <!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer p-8 text-end">

                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary">

                        <span class="indicator-label">save</span>

                    </button>
                    <!-- end   :: Submit btn -->

                </div>
                <!-- end   :: Form footer -->
            </form>
            <!-- end   :: Form -->
        </div>
        <!-- end   :: Card body -->
    </div>

@endsection
