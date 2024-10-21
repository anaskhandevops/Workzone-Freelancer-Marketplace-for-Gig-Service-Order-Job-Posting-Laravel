@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || Edit Service') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4 pb-110">
      <!-- Header -->
      <div>
        <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Edit Service') }}</h3>
        <ul class="d-flex align-items-center gap-2">
          <li class="text-dark-200 fs-6">{{ __('translate.Dashboard') }}</li>
          <li>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="5"
              height="11"
              viewBox="0 0 5 11"
              fill="none"
            >
              <path
                d="M1 10L4 5.5L1 1"
                stroke="#5B5B5B"
                stroke-width="1.2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </li>
          <li class="text-lime-300 fs-6">{{ __('translate.Edit Service') }}</li>
        </ul>
      </div>
      <!-- Content -->
      <div>
        <div class="row justify-content-center">
          <div class="col-xl-8">

            <!-- crancy Dashboard -->
            <section class="crancy-adashboard crancy-show mb-4">

                            <div class="crancy-body bg-white p-4 rounded-3 pb-3">
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
                                                    <ul class="d-flex py-3 gap-3">
                                                        @foreach ($language_list as $language)
                                                        <li><a class="text-danger" href="{{ route('seller.listing.edit', ['listing' => $listing->id, 'lang_code' => $language->lang_code] ) }}">
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

            </section>
            <!-- End crancy Dashboard -->


            <form method="POST" enctype="multipart/form-data" action="{{ route('seller.listing.update', $listing->id) }}">
                @csrf
                @method('PUT')

                <input type="hidden" name="lang_code" value="{{ $listing_translate->lang_code }}">
                <input type="hidden" name="translate_id" value="{{ $listing_translate->id }}">
                <input type="hidden" name="seller_id" value="{{ Auth::guard('web')->user()->id }}">

              <div class="d-flex flex-column gap-4">
                <!-- Project Info -->
                <div class="gig-info-card">
                  <!-- Header -->
                  <div class="gig-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Basic Info') }}
                    </h4>
                  </div>
                  <div class="gig-info-body bg-white">
                    <div class="row g-4">
                      <div class="col-12">
                        <div class="form-container">
                          <label for="title" class="form-label"
                            >{{ __('translate.Title') }}*</label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Title') }}"
                            name="title"
                            value="{{ html_decode($listing_translate->title) }}"
                            id="title"
                          />
                        </div>
                      </div>

                      @if (admin_lang() == request()->get('lang_code'))
                      <div class="col-12">
                        <div class="form-container">
                          <label for="slug" class="form-label"
                            >{{ __('translate.Slug') }}*</label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Slug') }}"
                            name="slug"
                            value="{{ html_decode($listing->slug) }}"
                            id="slug"
                          />
                        </div>
                      </div>


                      <div class="col-12">
                        <div class="form-container">
                          <label for="category" class="form-label">{{ __('translate.Category') }}*</label>
                          <select
                            id="category-select"
                            autocomplete="off"
                            class="form-select shadow-none"
                            name="category_id">
                            <option value="">{{ __('translate.Select Category') }}</option>
                            @foreach ($categories as $category)
                                <option {{ $category->id == $listing->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->translate->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-container">
                            <label class="form-label">{{ __('translate.Subcategory') }} * </label>
                            <select class="form-select shadow-none" autocomplete="off" name="sub_category_id" id="subcategory-select">
                                <option value="">{{ __('translate.Select Subcategory') }}</option>
                            </select>
                        </div>
                    </div>

                      @endif

                      <div class="col-12">
                        <label for="description" class="form-label"
                          >{{ __('translate.Description') }}*</label
                        >

                        <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description" id="description">{!! html_decode($listing_translate->description) !!}</textarea>

                      </div>
                    </div>
                  </div>
                </div>


                @if (admin_lang() == request()->get('lang_code'))
                <!-- Pricing Package -->
                <div class="gig-info-card">
                    <!-- Header -->
                    <div class="gig-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                        {{ __('translate.Pricing Package') }}
                    </h4>
                    </div>
                    <div class="gig-info-body bg-white">
                    <div class="row g-0 price-pack-wrapper">
                        <div class="col-md-4">
                        <div class="gig-pricing-pack border-end">
                            <div class="p-2 ps-3 border-bottom">
                            <span class="pricing-pack-name">{{ __('translate.Basic') }}</span>
                            </div>
                            <div class="pack-description border-bottom">
                            <textarea
                                class="border-0 px-3 w-100 shadow-none form-control"
                                placeholder="{{ __('translate.Description Here') }}"
                                rows="3"
                                name="basic_description"
                            >{{ $listing_package->basic_description }}</textarea>
                            </div>
                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="basic_delivery_date"
                            >
                                <option value="">
                                {{ __('translate.Select Delivery Time') }}
                                </option>
                                @for ($i = 1; $i<=5; $i++)
                                <option {{ $listing_package->basic_delivery_date == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>
                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="basic_revision"
                            >
                                <option value="">{{ __('translate.Revision') }}</option>
                                @for ($i = 1; $i<=5; $i++)
                                <option {{ $listing_package->basic_revision == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="basic_fn_website"
                            >
                                <option value="">{{ __('translate.Functional Website') }}</option>
                                <option {{ $listing_package->basic_fn_website == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->basic_fn_website == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="basic_page"
                            >
                                <option value="">{{ __('translate.Number of Page') }}</option>
                                @for ($i = 1; $i<=10; $i++)
                                <option {{ $listing_package->basic_page == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="basic_responsive"
                            >
                                <option value="">{{ __('translate.Functional Website') }}</option>
                                <option {{ $listing_package->basic_responsive == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->basic_responsive == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="basic_source_code"
                            >
                                <option value="">{{ __('translate.Source Code') }}</option>
                                <option {{ $listing_package->basic_source_code == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->basic_source_code == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="basic_content_upload"
                            >
                                <option value="">{{ __('translate.Content Upload') }}</option>
                                <option {{ $listing_package->basic_content_upload == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->basic_content_upload == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="basic_speed_optimized"
                            >
                                <option value="">{{ __('translate.Speed Optimized') }}</option>
                                <option {{ $listing_package->basic_speed_optimized == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->basic_speed_optimized == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="pack-description">
                            <input
                                class="border-0 px-3 w-100 shadow-none form-control"
                                placeholder="{{ __('translate.Price Here') }}"
                                rows="1"
                                name="basic_price"
                                value="{{ $listing_package->basic_price }}"
                            />
                            </div>
                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="gig-pricing-pack border-end">
                            <div class="p-2 ps-3 border-bottom">
                            <span class="pricing-pack-name"
                                >{{ __('translate.Standard') }}</span
                            >
                            </div>

                            <div class="pack-description border-bottom">
                            <textarea
                                class="border-0 px-3 w-100 shadow-none form-control"
                                placeholder="{{ __('translate.Description Here') }}"
                                rows="3"
                                name="standard_description"
                            >{{ $listing_package->standard_description }}</textarea>
                            </div>
                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="standard_delivery_date"
                            >
                                <option value="">
                                {{ __('translate.Select Delivery Time') }}
                                </option>
                                @for ($i = 1; $i<=5; $i++)
                                <option {{ $listing_package->standard_delivery_date == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>
                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="standard_revision"
                            >
                                <option value="">{{ __('translate.Revision') }}</option>
                                @for ($i = 1; $i<=5; $i++)
                                <option {{ $listing_package->standard_revision == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="standard_fn_website"
                            >
                                <option value="">{{ __('translate.Functional Website') }}</option>
                                <option {{ $listing_package->standard_fn_website == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->standard_fn_website == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="standard_page"
                            >
                                <option value="">{{ __('translate.Number of Page') }}</option>
                                @for ($i = 1; $i<=10; $i++)
                                <option {{ $listing_package->standard_page == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="standard_responsive"
                            >
                                <option value="">{{ __('translate.Functional Website') }}</option>
                                <option {{ $listing_package->standard_responsive == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->standard_responsive == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="standard_source_code"
                            >
                                <option value="">{{ __('translate.Source Code') }}</option>
                                <option {{ $listing_package->standard_source_code == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->standard_source_code == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="standard_content_upload"
                            >
                                <option value="">{{ __('translate.Content Upload') }}</option>
                                <option {{ $listing_package->standard_content_upload == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->standard_content_upload == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="standard_speed_optimized"
                            >
                                <option value="">{{ __('translate.Speed Optimized') }}</option>
                                <option {{ $listing_package->standard_speed_optimized == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->standard_speed_optimized == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="pack-description">
                            <input
                                class="border-0 px-3 w-100 shadow-none form-control"
                                placeholder="{{ __('translate.Price Here') }}"
                                rows="1"
                                name="standard_price"
                                value="{{ $listing_package->standard_price }}"
                            />
                            </div>


                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="gig-pricing-pack">
                            <div class="p-2 ps-3 border-bottom">
                            <span class="pricing-pack-name">{{ __('translate.Premium') }}</span>
                            </div>


                            <div class="pack-description border-bottom">
                            <textarea
                                class="border-0 px-3 w-100 shadow-none form-control"
                                placeholder="{{ __('translate.Description Here') }}"
                                rows="3"
                                name="premium_description"
                            >{{ $listing_package->premium_description }}</textarea>
                            </div>
                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="premium_delivery_date"
                            >
                                <option value="">
                                {{ __('translate.Select Delivery Time') }}
                                </option>
                                @for ($i = 1; $i<=5; $i++)
                                <option {{ $listing_package->premium_delivery_date == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>
                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="premium_revision"
                            >
                                <option value="">{{ __('translate.Revision') }}</option>
                                @for ($i = 1; $i<=5; $i++)
                                <option {{ $listing_package->premium_revision == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="premium_fn_website"
                            >
                                <option value="">{{ __('translate.Functional Website') }}</option>
                                <option {{ $listing_package->premium_fn_website == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->premium_fn_website == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="premium_page"
                            >
                                <option value="">{{ __('translate.Number of Page') }}</option>
                                @for ($i = 1; $i<=10; $i++)
                                <option {{ $listing_package->premium_page == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="premium_responsive"
                            >
                                <option value="">{{ __('translate.Functional Website') }}</option>
                                <option {{ $listing_package->premium_responsive == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->premium_responsive == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="premium_source_code"
                            >
                                <option value="">{{ __('translate.Source Code') }}</option>
                                <option {{ $listing_package->premium_source_code == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->premium_source_code == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="premium_content_upload"
                            >
                                <option value="">{{ __('translate.Content Upload') }}</option>
                                <option {{ $listing_package->premium_content_upload == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->premium_content_upload == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="p-2 ps-3 border-bottom">
                            <select
                                id=""
                                class="form-select p-0 border-0 shadow-none"
                                name="premium_speed_optimized"
                            >
                                <option value="">{{ __('translate.Speed Optimized') }}</option>
                                <option {{ $listing_package->premium_speed_optimized == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                                <option {{ $listing_package->premium_speed_optimized == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                            </div>

                            <div class="pack-description">
                            <input
                                class="border-0 px-3 w-100 shadow-none form-control"
                                placeholder="{{ __('translate.Price Here') }}"
                                rows="1"
                                name="premium_price"
                                value="{{ $listing_package->premium_price }}"
                            />
                            </div>


                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endif


                @if (admin_lang() == request()->get('lang_code'))
                <!-- Upload Gig Img -->
                <div class="gig-info-card">
                  <!-- Header -->
                  <div class="gig-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Upload Thumbnail') }}
                    </h4>
                  </div>
                  <div class="gig-info-body bg-white">
                    <p class="text-dark-200 mb-2">{{ __('translate.Thumbnail Image') }}</p>
                    <div class="d-flex flex-wrap gap-3">
                      <div>
                        <label
                          for="gig-img"
                          class="border text-center gig-file-upload"
                        >
                          <img
                          class="gig-img-icon"
                          id="view_img"
                            src="{{ asset($listing->thumb_image) }}"
                            alt=""
                          />
                          <p class="text-dark-200">{{ __('translate.Choose File') }}</p>
                          <input
                            class="d-none"
                            type="file"
                            name="thumb_image"
                            id="gig-img"
                            onchange="previewImage(event)"
                          />
                        </label>
                      </div>

                    </div>
                  </div>
                </div>


                <!-- Project Info -->
                <div class="gig-info-card">
                    <!-- Header -->
                    <div class="gig-info-header">
                      <h4 class="text-18 fw-semibold text-dark-300">
                        {{ __('translate.SEO Information') }}
                      </h4>
                    </div>
                    <div class="gig-info-body bg-white">
                      <div class="row g-4">

                        <div class="col-12">
                            <div class="form-container">
                              <label for="tags" class="form-label"
                                >{{ __('translate.Tags') }}</label
                              >
                              <input
                                type="text"
                                class="form-control shadow-none tags"
                                placeholder="{{ __('translate.Tags') }}"
                                name="tags"
                                value="{{ html_decode($listing->tags) }}"
                                id="tags"
                              />
                            </div>
                          </div>


                        <div class="col-12">
                          <div class="form-container">
                            <label for="seo_title" class="form-label"
                              >{{ __('translate.SEO Title') }}</label
                            >
                            <input
                              type="text"
                              class="form-control shadow-none"
                              placeholder="{{ __('translate.SEO Title') }}"
                              name="seo_title"
                              value="{{ html_decode($listing->seo_title) }}"
                              id="seo_title"
                            />
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-container">
                            <label for="seo_description" class="form-label"
                              >{{ __('translate.SEO Description') }}</label
                            >
                            <textarea rows="5" class="form-control shadow-none" name="seo_description" id="" cols="30" rows="10" placeholder="{{ __('translate.SEO Description') }}">{{  html_decode($listing->seo_description) }}</textarea>
                          </div>
                        </div>



                      </div>
                    </div>
                  </div>

                  @endif

                <!-- Submit Btn -->

                <div>
                  <button class="w-btn-secondary-lg">
                    {{ __('translate.Update Now') }}
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="14"
                      height="10"
                      viewBox="0 0 14 10"
                      fill="none"
                    >
                      <path
                        d="M9 9L13 5M13 5L9 1M13 5L1 5"
                        stroke="white"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </button>
                </div>
            </form>

                <!-- Project Info -->
                <div class="gig-info-card">
                    <!-- Header -->
                    <div class="gig-info-header">
                        <h4 class="text-18 fw-semibold text-dark-300">
                            {{ __('translate.Gallery Image') }} <span data-toggle="tooltip" data-placement="top" class="fa fa-info-circle text--primary" title="{{ __('translate.Max 3 Files') }}">
                        </h4>
                    </div>
                    <div class="gig-info-body bg-white">
                        <div class="row g-4">

                            <!-- Manage Listing -->
                            <div class="col-lg-12">
                                <div class="car-images">

                                    <div class="car-images-inner car-images-inner-car custom-dropzone">

                                        <form id="dropzoneForm" method="post" action="{{ route('seller.upload-gallery', $listing->id) }}"  enctype="multipart/form-data"  class="dropzone">
                                            @csrf

                                        </form>
                                        <div class="text-center car-images-manage-car-item-btn">
                                            <button id="submit-all" type="submit" class="w-btn-secondary-lg mt-4">{{ __('translate.Upload Images') }}</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Gallery Images  -->
                            @if ($galleries->count() > 0)
                                <div class="col-lg-12">
                                    <div class="car-images">
                                        <h3 class="car-images-taitel">{{ __('translate.Gallery Images') }} </h3>
                                        <div class="car-images-inner">
                                            <div class="gallery-img-item">

                                                @foreach ($galleries as $gallery)
                                                    <div class="gallery-img-item-thumb">
                                                        <img src="{{ asset($gallery->image) }}" alt="img">
                                                        <button type="button" class="car-delet-btn" onclick="deleteGallery({{ $gallery->id }})">
                                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="0.601562" width="31.3984" height="32" rx="15.6992" fill="#FF603D"/>
                                                                <path d="M18.734 13.375C18.512 13.375 18.332 13.5584 18.332 13.7846V21.5266C18.332 21.7527 18.512 21.9362 18.734 21.9362C18.956 21.9362 19.1359 21.7527 19.1359 21.5266V13.7846C19.1359 13.5584 18.956 13.375 18.734 13.375Z" fill="white"/>
                                                                <path d="M13.9957 13.375C13.7737 13.375 13.5938 13.5584 13.5938 13.7846V21.5266C13.5938 21.7527 13.7737 21.9362 13.9957 21.9362C14.2177 21.9362 14.3976 21.7527 14.3976 21.5266V13.7846C14.3976 13.5584 14.2177 13.375 13.9957 13.375Z" fill="white"/>
                                                                <path d="M10.5361 12.2463V22.3387C10.5361 22.9352 10.7507 23.4954 11.1256 23.8974C11.4988 24.3004 12.0182 24.5292 12.5617 24.5302H20.1663C20.71 24.5292 21.2294 24.3004 21.6024 23.8974C21.9773 23.4954 22.1919 22.9352 22.1919 22.3387V12.2463C22.9372 12.0447 23.4202 11.3109 23.3205 10.5315C23.2206 9.75226 22.5692 9.16934 21.798 9.16918H19.7402V8.65714C19.7425 8.22655 19.5755 7.81309 19.2764 7.50891C18.9773 7.20489 18.571 7.0356 18.1485 7.03912H14.5795C14.157 7.0356 13.7507 7.20489 13.4516 7.50891C13.1525 7.81309 12.9855 8.22655 12.9878 8.65714V9.16918H10.93C10.1588 9.16934 9.50739 9.75226 9.40753 10.5315C9.30784 11.3109 9.79078 12.0447 10.5361 12.2463ZM20.1663 23.7109H12.5617C11.8745 23.7109 11.3399 23.1093 11.3399 22.3387V12.2823H21.3881V22.3387C21.3881 23.1093 20.8535 23.7109 20.1663 23.7109ZM13.7917 8.65714C13.789 8.44385 13.8713 8.23856 14.0198 8.08799C14.1682 7.93742 14.3701 7.85469 14.5795 7.85837H18.1485C18.3579 7.85469 18.5598 7.93742 18.7082 8.08799C18.8567 8.2384 18.939 8.44385 18.9363 8.65714V9.16918H13.7917V8.65714ZM10.93 9.98843H21.798C22.1976 9.98843 22.5215 10.3185 22.5215 10.7258C22.5215 11.133 22.1976 11.4631 21.798 11.4631H10.93C10.5304 11.4631 10.2065 11.133 10.2065 10.7258C10.2065 10.3185 10.5304 9.98843 10.93 9.98843Z" fill="white"/>
                                                                <path d="M16.3668 13.377C16.1448 13.377 15.9648 13.5603 15.9648 13.7866V21.5285C15.9648 21.7546 16.1448 21.9382 16.3668 21.9382C16.5888 21.9382 16.7687 21.7546 16.7687 21.5285V13.7866C16.7687 13.5603 16.5888 13.377 16.3668 13.377Z" fill="white"/>
                                                                </svg>

                                                        </button>
                                                    </div>

                                                    <form action="{{ route('seller.delete-gallery', $gallery->id) }}" id="remove_gallery_{{ $gallery->id }}" class="d-none" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                    </form>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>


              </div>

          </div>
        </div>
      </div>
    </div>
  </main>
@endsection





@push('style_section')
    <link rel="stylesheet" href="{{ asset('global/tagify/tagify.css') }}">
    <link rel="stylesheet" href="{{ asset('global/dropzone/dropzone.min.css') }}">

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }

        .dropzone {
            background: white;
            border-radius: 5px;
            border: 2px dashed rgb(0, 135, 247);
            border-image: none;
            max-width: 805px;
            margin-left: auto;
            margin-right: auto;
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
                fetch("{{ url('/seller/get-subcategories') }}/" + selectedCategoryId)
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
                    fetch("{{ url('/seller/get-subcategories') }}/" + categoryId)
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

    <script src="{{ asset('global/dropzone/dropzone.min.js') }}"></script>

    <script src="{{ asset('global/sweetalert/sweetalert2@11.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $("#title").on("keyup",function(e){
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
                    $("#slug").val(slug);
                })

                $('.tags').tagify();

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

        function deleteGallery(id){
            Swal.fire({
                title: "{{ __('translate.Are you realy want to delete this item ?') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('translate.Yes, Delete It') }}",
                cancelButtonText: "{{ __('translate.Cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#remove_gallery_"+id).submit();
                }

            })
        }


    </script>


<script>
    Dropzone.options.dropzoneForm = {
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 10,
        thumbnailHeight: 200,
        thumbnailWidth: 200,
        maxFilesize: 3,
        maxFiles: 3,
        filesizeBase: 1000,
        addRemoveLinks: true,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.webp",
        init: function() {
            myDropzone = this;
            $('#submit-all').on('click', function(e) {
                e.preventDefault();
                myDropzone.processQueue();
            });

            this.on("complete", function() {
                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                    var _this = this;
                    _this.removeAllFiles();
                }
            });
        },
        success: function(file, response) {
            window.location.reload();
            toastr.success(response.message);
        },
    };

</script>



@endpush
