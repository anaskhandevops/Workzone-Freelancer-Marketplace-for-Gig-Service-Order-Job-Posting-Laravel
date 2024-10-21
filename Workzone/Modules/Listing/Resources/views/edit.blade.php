@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Edit Service') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Edit Service') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Service') }} >> {{ __('translate.Edit Service') }}</p>
@endsection

@section('body-content')

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
                                <div class="crancy-product-card translation_main_box">

                                    <div class="crancy-customer-filter">
                                        <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                            <div class="crancy-header__form crancy-header__form--customer">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Switch to language translation') }}</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="translation_box">
                                        <ul >
                                            @foreach ($language_list as $language)
                                            <li><a href="{{ route('admin.listings.edit', ['listing' => $listing->id, 'lang_code' => $language->lang_code] ) }}">
                                                @if (request()->get('lang_code') == $language->lang_code)
                                                    <i class="fas fa-eye"></i>
                                                @else
                                                    <i class="fas fa-edit"></i>
                                                @endif

                                                {{ $language->lang_name }}</a></li>
                                            @endforeach
                                        </ul>

                                        <div class="alert alert-secondary" role="alert">

                                            @php
                                                $edited_language = $language_list->where('lang_code', request()->get('lang_code'))->first();
                                            @endphp

                                        <p>{{ __('translate.Your editing mode') }} : <b>{{ $edited_language->lang_name }}</b></p>
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

    <form action="{{ route('admin.listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="lang_code" value="{{ $listing_translate->lang_code }}">
        <input type="hidden" name="translate_id" value="{{ $listing_translate->id }}">

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
                                            <h4 class="crancy-product-card__title">{{ __('translate.Basic Information') }}</h4>
                                        </div>

                                        <div class="row">

                                            @if (admin_lang() == request()->get('lang_code'))
                                            <div class="col-12 mg-top-form-20">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="crancy__item-form--group w-100 h-100">
                                                            <label class="crancy__item-label">{{ __('translate.Thumbnail Image') }} </label>
                                                            <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                <input type="file" class="btn-check" name="thumb_image" id="input-img1" autocomplete="off" onchange="previewImage(event)">
                                                                <label class="crancy-image-video-upload__label" for="input-img1">
                                                                    <img id="view_img" src="{{ asset($listing->thumb_image) }}">
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
                                                    <select class="form-select crancy__item-input " name="seller_id">
                                                        <option value="">{{ __('translate.Select Seller') }}</option>
                                                        @foreach ($agents as $agent)
                                                            <option  {{ $agent->id == $listing->seller_id ? 'selected' : '' }} value="{{ $agent->id }}">{{ $agent->name }} - {{ $agent->email }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            @endif

                                            <div class="{{ admin_lang() == request()->get('lang_code') ? 'col-md-6' : 'col-12' }}">

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Title') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="title" id="title" value="{{ html_decode($listing_translate->title) }}">
                                                </div>
                                            </div>


                                            @if (admin_lang() == request()->get('lang_code'))
                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Slug') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="slug" id="slug" value="{{ html_decode($listing->slug) }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Category') }} * </label>
                                                    <select class="form-select crancy__item-input" name="category_id" id="category-select">
                                                        <option value="">{{ __('translate.Select Category') }}</option>
                                                        @foreach ($categories as $category)
                                                            <option  {{ $category->id == $listing->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->translate->name }}</option>
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

                                            @endif

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} * </label>

                                                    <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description" id="description">{!! html_decode($listing_translate->description) !!}</textarea>

                                                </div>
                                            </div>

                                        </div>

                                        @if (admin_lang() != request()->get('lang_code'))
                                        <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update Data') }}</button>
                                        @endif

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


    @if (admin_lang() == request()->get('lang_code'))
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
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="basic_description" id="basic_description" placeholder="{{ __('translate.Description Here') }}">{{ $listing_package->basic_description }}</textarea>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Delivery Time') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_delivery_date">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ $listing_package->basic_delivery_date == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }} {{ __('translate.Days') }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Revision') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_revision">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ $listing_package->basic_revision == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Functional Website') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_fn_website">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->basic_fn_website == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->basic_fn_website == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Number of Page') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_page">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=10; $i++)
                                                        <option {{ $listing_package->basic_page == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Responsive') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_responsive">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->basic_responsive == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->basic_responsive == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Source Code') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_source_code">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->basic_source_code == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->basic_source_code == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Content Upload') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_content_upload">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->basic_content_upload == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->basic_content_upload == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Speed Optimized') }} * </label>
                                                    <select class="form-select crancy__item-input" name="basic_speed_optimized">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->basic_speed_optimized == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->basic_speed_optimized == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Price') }} </label>
                                                    <input class="crancy__item-input" type="text" name="basic_price" value="{{ $listing_package->basic_price }}">
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Package Name') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="standard_name" id="standard_name" value="{{ __(('Standard')) }}" readonly>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} *</label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="standard_description" id="standard_description" placeholder="{{ __('translate.Description Here') }}">{{ $listing_package->standard_description }}</textarea>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Delivery Time') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_delivery_date">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ $listing_package->standard_delivery_date == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }} {{ __('translate.Days') }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Revision') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_revision">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ $listing_package->standard_revision == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Functional Website') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_fn_website">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->standard_fn_website == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->standard_fn_website == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Number of Page') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_page">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=10; $i++)
                                                        <option {{ $listing_package->standard_page == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Responsive') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_responsive">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->standard_responsive == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->standard_responsive == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Source Code') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_source_code">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->standard_source_code == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->standard_source_code == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Content Upload') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_content_upload">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->standard_content_upload == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->standard_content_upload == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Speed Optimized') }} * </label>
                                                    <select class="form-select crancy__item-input" name="standard_speed_optimized">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->standard_speed_optimized == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->standard_speed_optimized == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Price') }} </label>
                                                    <input class="crancy__item-input" type="text" name="standard_price" value="{{ $listing_package->standard_price }}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Package Name') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="premium_name" id="premium_name" value="{{ __(('Premium')) }}" readonly>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} *</label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="premium_description" id="premium_description" placeholder="{{ __('translate.Description Here') }}">{{ $listing_package->premium_description }}</textarea>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Delivery Time') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_delivery_date">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ $listing_package->premium_delivery_date == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }} {{ __('translate.Days') }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Revision') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_revision">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=5; $i++)
                                                        <option {{ $listing_package->premium_revision == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Functional Website') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_fn_website">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->premium_fn_website == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->premium_fn_website == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Number of Page') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_page">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        @for ($i = 1; $i<=10; $i++)
                                                        <option {{ $listing_package->premium_page == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Responsive') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_responsive">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->premium_responsive == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->premium_responsive == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Source Code') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_source_code">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->premium_source_code == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->premium_source_code == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>


                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Content Upload') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_content_upload">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->premium_content_upload == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->premium_content_upload == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">
                                                        {{ __('translate.Speed Optimized') }} * </label>
                                                    <select class="form-select crancy__item-input" name="premium_speed_optimized">
                                                        <option value="">{{ __('translate.Select') }}</option>
                                                        <option {{ $listing_package->premium_speed_optimized == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                                        <option {{ $listing_package->premium_speed_optimized == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>
                                                    </select>
                                                </div>

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Price') }} </label>
                                                    <input class="crancy__item-input" type="text" name="premium_price" value="{{ $listing_package->premium_price }}">
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
    @endif

    @if (admin_lang() == request()->get('lang_code'))
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
                                                    <input class="crancy__item-input tags" type="text" name="tags" value="{{ html_decode($listing->tags) }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.SEO title') }} </label>
                                                    <input class="crancy__item-input" type="text" name="seo_title" id="seo_title" value="{{ html_decode($listing->seo_title) }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.SEO Description') }} </label>
                                                    <textarea class="crancy__item-input crancy__item-textarea seo_description_box"  name="seo_description" id="seo_description">{{ html_decode($listing->seo_description) }}</textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update Data') }}</button>

                                        @if ($listing->approved_by_admin == 'pending')
                                            <button class="crancy-btn mg-top-25 approval_button" type="button" data-bs-toggle="modal" data-bs-target="#approvalModal">{{ __('translate.Make Approval') }}</button>
                                        @endif

                                        @if ($listing->is_featured == 'disable')
                                            <button class="crancy-btn mg-top-25 approval_featured" type="button" data-bs-toggle="modal" data-bs-target="#featureModal">{{ __('translate.Make Featured') }}</button>
                                        @else
                                            <button class="crancy-btn mg-top-25 delete_danger_btn" type="button" data-bs-toggle="modal" data-bs-target="#removeFeatureModal">{{ __('translate.Remove Featured') }}</button>
                                        @endif

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
    @endif


    </form>


    <!-- Approved Confirmation Modal -->
    <div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Approval Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to approved this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.listings-approval', $listing->id) }}" class="delet_modal_form" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Approved') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Confirmation Modal -->
    <div class="modal fade" id="featureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Featured Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to featured this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.listings-featured', $listing->id) }}" class="delet_modal_form" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Featured') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Remove Confirmation Modal -->
    <div class="modal fade" id="removeFeatureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Featured Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to removed featured this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.listings-featured-removed', $listing->id) }}" class="delet_modal_form" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Removed') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>








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
        document.addEventListener('DOMContentLoaded', function() {
            var categorySelect = document.getElementById('category-select');
            var subcategorySelect = document.getElementById('subcategory-select');

            // Populate the subcategory dropdown if editing a listing
            var selectedCategoryId = categorySelect.value;
            var selectedSubCategoryId = '{{ $listing->sub_category_id }}'; // Get the selected subcategory ID from the listing

            if (selectedCategoryId) {
                // Make an AJAX request to fetch subcategories
                fetch("{{ url('/admin/listing/get-subcategories') }}/" + selectedCategoryId)
                    .then(response => response.json())
                    .then(data => {
                        // Populate the subcategory dropdown
                        data.forEach(function(subcategory) {
                            var option = document.createElement('option');
                            option.value = subcategory.id;

                            // Handle missing translation gracefully
                            var subcategoryName = subcategory.translate ? subcategory.translate.name : 'No Name Available';
                            option.textContent = subcategoryName;

                            // Check if this subcategory is the selected one
                            if (subcategory.id == selectedSubCategoryId) {
                                option.selected = true;
                            }

                            subcategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching subcategories:', error));
            }

            // Load subcategories on category change
            categorySelect.addEventListener('change', function() {
                var categoryId = this.value;

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

