@extends('layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')
<!-- Main -->
<main>
    <!-- Breadcrumb -->
    <section
          class="w-breadcrumb-area"
          style="background-image: url({{ asset($general_setting->breadcrumb_image) }});">
          <div class="container">
            <div class="row">
              <div class="col-auto">
                <div
                  class="position-relative z-2"
                  data-aos="fade-up"
                  data-aos-duration="1000"
                  data-aos-easing="linear"
                >
                  <h2 class="section-title-light mb-2">{{ __('translate.Our Freelancers') }}</h2>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb w-breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        {{ __('translate.Our Freelancers') }}
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
    <!-- Breadcrumb End -->

    <!-- Freelancers Start -->
    <section class="py-110 bg-offWhite">
      <div class="container">
        <form action="" id="searchFormId">
        <div class="row justify-content-between mb-40">
          <div class="col-xl-auto col-12">
            <div class="d-flex flex-column flex-wrap  flex-md-row gap-3">
                  <!-- Input -->
                  <div class='custom-input'>
                      <input type="text" class="form-control shadow-none" placeholder="{{ __('translate.Search..') }}" name="search" value="{{ request()->get('search') }}">
                  </div>
                  <!-- SubCategory -->
                  <div>
                    <select name="category" id="category_id" class='border-0 custom-style-select nice-select select-dropdown'>
                        <option value="">{{ __('translate.All Categories') }}</option>
                            @foreach ($categories as $category)
                            <option {{ request()->get('category') == $category->slug ? 'selected' : '' }} value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <!-- Budget -->
                  <div>
                    <select name="sort_by" id="sort_by" class='border-0 custom-style-select nice-select select-dropdown'>
                        <option value="">{{ __('translate.Default') }}</option>
                         <option {{ request()->get('sort_by') == 'a_to_z' ? 'selected' : '' }} value="a_to_z">{{ __('translate.A to Z') }} ({{ __('translate.ASC') }})</option>
                         <option {{ request()->get('sort_by') == 'z_to_a' ? 'selected' : '' }} value="z_to_a">{{ __('translate.Z to A') }} ({{ __('translate.DSC') }})</option>

                      </select>
                  </div>
                  <!-- Rating -->
                  <div>
                    <select name="price_filter" id="price_filter" class='border-0 custom-style-select nice-select select-dropdown'>
                        <option value="">{{ __('translate.Price') }} ({{ __('translate.Default') }})</option>
                        <option {{ request()->get('price_filter') == 'low_to_high' ? 'selected' : '' }} value="low_to_high">{{ __('translate.Low to High') }}</option>
                        <option {{ request()->get('price_filter') == 'high_to_low' ? 'selected' : '' }} value="high_to_low">{{ __('translate.High to Low') }}</option>

                      </select>
                  </div>
            </div>
          </div>
          <div class="col-xl-auto d-none d-lg-block col-12 mt-4 mt-xl-0">
            <div
              class="d-inline-flex justify-content-lg-end gap-3 bg-white rounded-2 py-2 px-4 pe-2"
            >
              <div class="d-flex align-items-center gap-2">
                <label class="flex-shrink-0">{{ __('translate.Sort By') }}:</label>
                <select class="select-dropdown border-0 bg-offWhite shadow-none" name="is_toprated" id="is_toprated">
                    <option value="">{{ __('translate.Most Relevant') }}</option>
                    <option {{ request()->get('is_toprated') == 'toprated' ? 'selected' : '' }} value="toprated">{{ __('translate.Top Seller') }}</option>
                  </select>
              </div>
            </div>
          </div>
        </div>
        </form>
        <!-- Content -->
         @if ($sellers->count() > 0)
        <div
          class="row row-gap-4 row-cols-xl-5 row-cols-lg-3 row-cols-md-2"
        >
            @foreach ($sellers as $seller)
            <article data-aos="fade-up" data-aos-duration="1000" data-aos-easing="linear" >
                <div class="bg-white top-seller-card position-relative">
                    <div
                    class="job-type-badge position-absolute d-flex flex-column gap-2"
                    >
                    @if ($seller->is_top_seller == 'enable')
                    <p class="job-type-badge-tertiary">{{ __('translate.Top Seller') }}</p>

                    @endif
                    <p class="job-type-badge-secondary">{{ currency(html_decode($seller->hourly_payment)) }}/{{ __('translate.hr') }}</p>
                    </div>
                    <div
                    class="d-flex flex-column justify-content-center align-items-center"
                    >
                    <div class="seller-profile-img mb-4">
                        @if ($seller->image)
                        <img src="{{ asset($seller->image) }}" class="rounded-circle" width="100" height="100" alt="" />
                        @else
                        <img src="{{ asset($general_setting->default_avatar) }}" class="rounded-circle"  width="100" height="100" alt="" />
                        @endif
                        @if ($seller->online_status == 1) 
                            @if ($seller->online == 1)
                                <span class="online-indicator"></span>
                            @endif
                        @endif
                    </div>

                    <h3 class="top-seller-name fw-bold relative">
                        {{ html_decode($seller->name) }}
                        @if($seller->kyc_status == 1)
                            <button class="varified-badge2">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10.007 2.10377C8.60544 1.65006 7.08181 2.28116 6.41156 3.59306L5.60578 5.17023C5.51004 5.35763 5.35763 5.51004 5.17023 5.60578L3.59306 6.41156C2.28116 7.08181 1.65006 8.60544 2.10377 10.007L2.64923 11.692C2.71404 11.8922 2.71404 12.1078 2.64923 12.308L2.10377 13.993C1.65006 15.3946 2.28116 16.9182 3.59306 17.5885L5.17023 18.3942C5.35763 18.49 5.51004 18.6424 5.60578 18.8298L6.41156 20.407C7.08181 21.7189 8.60544 22.35 10.007 21.8963L11.692 21.3508C11.8922 21.286 12.1078 21.286 12.308 21.3508L13.993 21.8963C15.3946 22.35 16.9182 21.7189 17.5885 20.407L18.3942 18.8298C18.49 18.6424 18.6424 18.49 18.8298 18.3942L20.407 17.5885C21.7189 16.9182 22.35 15.3946 21.8963 13.993L21.3508 12.308C21.286 12.1078 21.286 11.8922 21.3508 11.692L21.8963 10.007C22.35 8.60544 21.7189 7.08181 20.407 6.41156L18.8298 5.60578C18.6424 5.51004 18.49 5.35763 18.3942 5.17023L17.5885 3.59306C16.9182 2.28116 15.3946 1.65006 13.993 2.10377L12.308 2.64923C12.1078 2.71403 11.8922 2.71404 11.692 2.64923L10.007 2.10377ZM6.75977 11.7573L8.17399 10.343L11.0024 13.1715L16.6593 7.51465L18.0735 8.92886L11.0024 15.9999L6.75977 11.7573Z"></path></svg>
                                </span>
                            </button>
                        @endif
                    </h3>
                    <p class="top-seller-title">{{ html_decode($seller->designation) }}</p>
                    <div class="top-seller-rating mb-4">
                        <p class="d-flex align-items-center top-seller-rating">
                        <svg
                            width="12"
                            height="12"
                            viewBox="0 0 12 12"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                            d="M11.1141 4.65628C11.0407 4.42385 10.8406 4.25929 10.6048 4.23731L7.38803 3.93649L6.11676 0.870622C6.0229 0.645376 5.80934 0.5 5.57163 0.5C5.33392 0.5 5.12027 0.645376 5.02701 0.870622L3.75574 3.93649L0.538508 4.23731C0.302669 4.25973 0.102963 4.42429 0.0291678 4.65628C-0.0442024 4.8887 0.0235566 5.14364 0.201923 5.30478L2.63351 7.5011L1.91656 10.7539C1.8641 10.993 1.95422 11.2403 2.14687 11.3838C2.25042 11.4613 2.37208 11.5 2.49417 11.5C2.59908 11.5 2.70407 11.4713 2.79785 11.4135L5.57163 9.70504L8.3449 11.4135C8.54835 11.5387 8.80417 11.5272 8.99639 11.3838C9.18904 11.2403 9.27916 10.993 9.22671 10.7539L8.50975 7.5011L10.9413 5.30478C11.1196 5.14364 11.1875 4.88923 11.1141 4.65628Z"
                            fill="currentColor"
                            />
                        </svg>
                        {{ sprintf("%.1f", $seller->avg_rating) }} <span class="top-seller-review">({{ $seller->total_rating }} {{ __('translate.Reviews') }})</span>
                        </p>
                    </div>
                    <a href="{{ route('freelancer', $seller->username) }}" class="w-btn-primary-lg">
                        {{ __('translate.View Profile') }}
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="14"
                        height="10"
                        viewBox="0 0 14 10"
                        fill="none"
                        >
                        <path
                            d="M9 9L13 5M13 5L9 1M13 5L1 5"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        /></svg></a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
         @else
                <!-- Listing Not Found Start -->
                <section class="bg-offWhite ">
                    <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                        <div
                            class=" p-lg-5 p-3 rounded-3 not-found-img d-flex flex-column flex-wrap align-items-center"
                        >
                            <img
                            src="{{ asset($general_setting->not_found) }}"
                            class="img-fluid"
                            alt="listing-not-found"
                            />
                        </div>
                        <div class=" text-center">
                            <h2 class="section-title fw-semibold mb-3 mb-2">{{ __('translate.Sorry!! Freelancer Not Found') }}</h2>
                            <p class="mb-4">{{ __('translate.Whoops... this information is not available for a moment') }}</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </section>
                <!-- Listing Not Found End -->
            @endif
        @if($sellers->hasPages())
        <!-- Pagination -->
        <div class="row justify-content-center mt-40">
          <div class="col-auto">
            {{ $sellers->links('custom_pagination') }}
          </div>
        </div>
      </div>
      @endif
    </section>
    <!-- Freelancers Start End -->
  </main>
  <!-- Main End -->
@endsection

@push('js_section')


<script>
    "use strict";
    $(function() {
        $("#category_id, #sort_by, #price_filter, #is_toprated").on("change", function(){

            $("#searchFormId").submit();
        })
    });

    </script>
@endpush
