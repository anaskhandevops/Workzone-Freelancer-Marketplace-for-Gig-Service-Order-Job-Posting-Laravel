@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Create Service') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Create Service') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Service') }} >> {{ __('translate.Create Service') }}</p>
@endsection

@section('body-content')

    <form action="{{ route('admin.listings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Basic Information') }}</h4>
                                        </div>

                                        <div class="row">
                                            <input type="hidden" name="category_id" value="1">

                                            <div class="col-12 mg-top-form-20">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="crancy__item-form--group w-100 h-100">
                                                            <label class="crancy__item-label">{{ __('translate.Thumbnail Image') }} * </label>
                                                            <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                <input type="file" class="btn-check" name="thumb_image" id="input-img1" autocomplete="off" onchange="previewImage(event)">
                                                                <label class="crancy-image-video-upload__label" for="input-img1">
                                                                    <img id="view_img" src="{{ asset($general_setting->placeholder_image) }}">
                                                                    <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Seller') }} * </label>
                                                    <select class="form-select crancy__item-input" name="seller_id">
                                                        <option value="">{{ __('translate.Select Seller') }}</option>
                                                        @foreach ($agents as $agent)
                                                            <option  {{ $agent->id == old('seller_id') ? 'selected' : '' }} value="{{ $agent->id }}">{{ $agent->name }} - {{ $agent->email }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Title') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="title" id="title" value="{{ old('title') }}">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Slug') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="slug" id="slug" value="{{ old('slug') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Category') }} * </label>
                                                    <select class="form-select crancy__item-input" name="category_id" id="category-select">
                                                        <option value="">{{ __('translate.Select Category') }}</option>
                                                        @foreach ($categories as $category)
                                                            <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->translate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Subcategory') }} * </label>
                                                    <select class="form-select crancy__item-input" name="sub_category_id" id="subcategory-select">
                                                        <option value="">{{ __('translate.Select Subcategory') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} * </label>

                                                    <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description" id="description">{{ old('description') }}</textarea>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Pricing Package') }}</h4>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Package Name') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="basic_name" id="basic_name" value="{{ __(('Basic')) }}" readonly>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} *</label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="basic_description" id="basic_description" placeholder="{{ __('translate.Description Here') }}">{{ old('basic_description') }}</textarea>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Delivery Time') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_delivery_date">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ old('basic_delivery_date') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }} {{ __('translate.Days') }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Revision') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_revision">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ old('basic_revision') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Functional Website') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_fn_website">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('basic_fn_website') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('basic_fn_website') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Number of Page') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_page">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=10; $i++)
                                                        <option {{ old('basic_page') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Responsive') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_responsive">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('basic_responsive') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('basic_responsive') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Source Code') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_source_code">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('basic_source_code') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('basic_source_code') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Content Upload') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_content_upload">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('basic_content_upload') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('basic_content_upload') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Speed Optimized') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_speed_optimized">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('basic_speed_optimized') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('basic_speed_optimized') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Price') }} </label>
                                                    <input class="crancy__item-input" type="text" name="basic_price" value="{{ old('basic_price') }}">
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Package Name') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="standard_name" id="standard_name" value="{{ __(('Standard')) }}" readonly>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} *</label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="standard_description" id="standard_description" placeholder="{{ __('translate.Description Here') }}">{{ old('standard_description') }}</textarea>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Delivery Time') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_delivery_date">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ old('standard_delivery_date') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }} {{ __('translate.Days') }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Revision') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_revision">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ old('standard_revision') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Functional Website') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_fn_website">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('standard_fn_website') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('standard_fn_website') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Number of Page') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_page">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=10; $i++)
                                                        <option {{ old('standard_page') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Responsive') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_responsive">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('standard_responsive') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('standard_responsive') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Source Code') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_source_code">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('standard_source_code') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('standard_source_code') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Content Upload') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_content_upload">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('standard_content_upload') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('standard_content_upload') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Speed Optimized') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_speed_optimized">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('standard_speed_optimized') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('standard_speed_optimized') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Price') }} </label>
                                                    <input class="crancy__item-input" type="text" name="standard_price" value="{{ old('standard_price') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Package Name') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="premium_name" id="premium_name" value="{{ __(('Premium')) }}" readonly>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} *</label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="premium_description" id="premium_description" placeholder="{{ __('translate.Description Here') }}">{{ old('premium_description') }}</textarea>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Delivery Time') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_delivery_date">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ old('premium_delivery_date') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }} {{ __('translate.Days') }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Revision') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_revision">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ old('premium_revision') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Functional Website') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_fn_website">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('premium_fn_website') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('premium_fn_website') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Number of Page') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_page">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=10; $i++)
                                                        <option {{ old('premium_page') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Responsive') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_responsive">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('premium_responsive') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('premium_responsive') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Source Code') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_source_code">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('premium_source_code') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('premium_source_code') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Content Upload') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_content_upload">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('premium_content_upload') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('premium_content_upload') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Speed Optimized') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_speed_optimized">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ old('premium_speed_optimized') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ old('premium_speed_optimized') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Price') }} </label>
                                                    <input class="crancy__item-input" type="text" name="premium_price" value="{{ old('premium_price') }}">
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->


    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.SEO Information') }}</h4>
                                        </div>

                                        <div class="row">

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Tags') }} </label>
                                                    <input class="crancy__item-input tags" type="text" name="tags" value="{{ old('tags') }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.SEO title') }} </label>
                                                    <input class="crancy__item-input" type="text" name="seo_title" id="seo_title" value="{{ old('seo_title') }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.SEO Description') }} </label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="seo_description" id="seo_description">{{ old('seo_description') }}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Save Data') }}</button>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->


    </form>



@endsection


@push('style_section')

    <link rel="stylesheet" href="{{ asset('global/tagify/tagify.css') }}">

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }
    </style>
@endpush

@push('js_section')
    <script>
        document.getElementById('category-select').addEventListener('change', function() {
            var categoryId = this.value;
            var subcategorySelect = document.getElementById('subcategory-select');

            // Clear the subcategory dropdown
            subcategorySelect.innerHTML = '<option value="">{{ __('translate.Select Subcategory') }}</option>';

            if (categoryId) {
                // Make an AJAX request to fetch subcategories
                fetch("{{ url('/admin/listing/get-subcategories') }}/" + categoryId)
                    .then(response => response.json())
                    .then(data => {
                        // Populate the subcategory dropdown
                        data.forEach(function(subcategory) {
                            var option = document.createElement('option');
                            option.value = subcategory.id;

                            // Handle missing translation gracefully
                            var subcategoryName = subcategory.translate ? subcategory.translate.name : 'No Name Available';
                            option.textContent = subcategoryName;

                            subcategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching subcategories:', error));
            }
        });

    </script>

    <script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('global/tagify/tagify.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $("#title").on("keyup",function(e){
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
                    $("#slug").val(slug);
                })

                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ]
                });

                $('.tags').tagify();

            });
        })(jQuery);

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

    </script>
@endpush

