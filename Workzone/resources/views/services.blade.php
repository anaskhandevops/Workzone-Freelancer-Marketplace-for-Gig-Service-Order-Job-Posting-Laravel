
@extends('layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')


    <!-- Main Start -->
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
                  <h2 class="section-title-light mb-2">{{ __('translate.Our Services') }}</h2>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb w-breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        {{ __('translate.Our Services') }}
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Breadcrumb End -->

        <!-- Services  -->
        <section class="py-110 bg-offWhite">
          <div class="container">
            <form action="" id="searchFormId">
            <div class="row justify-content-between mb-40">
              <div class="col-xl-auto">
                <div class="d-flex flex-column flex-wrap  flex-md-row gap-3">

                   <!-- Input -->
                  <div class='custom-input'>
                      <input type="text" class="form-control shadow-none" placeholder="{{ __('translate.Search..') }}" name="search" value="{{ request()->get('search') }}">
                  </div>
                   <!-- Category -->
                  <div>
                    <select name="category" id="category_id" class='border-0 custom-style-select nice-select select-dropdown'>
                        <option value="">{{ __('translate.All Categories') }}</option>
                            @foreach ($categories as $category)
                            <option {{ request()->get('category') == $category->slug ? 'selected' : '' }} value="{{ $category->slug }}">{{ $category->name }} <span>({{ $category->total_service }})</span></option>
                        @endforeach
                    </select>
                  </div>
                  <!-- SubCategory -->
                  <div>
                    <select name="sub_category" id="category_id" class='border-0 custom-style-select nice-select select-dropdown'>
                        <option value="">{{ __('translate.Sub Categories') }}</option>
                        @if($sub_categories->isNotEmpty())
                            @foreach ($sub_categories as $sub_category)
                                <option {{ request()->get('sub_category') == $sub_category->slug ? 'selected' : '' }} value="{{ $sub_category->slug }}">
                                    {{ $sub_category->name }} <span>({{ $sub_category->total_service }})</span>
                                </option>
                            @endforeach
                        @endif
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

                </div>
              </div>
              <div class="col-xl-auto col-md-7 mt-4 mt-xl-0">
                <div
                  class="d-inline-flex justify-content-lg-end gap-3 bg-white rounded-2 py-2 px-4 pe-2"
                >
                  <div class="d-flex align-items-center gap-2">
                    <label class="flex-shrink-0">{{ __('translate.Sort By') }}:</label>
                    <select class="select-dropdown border-0 bg-offWhite shadow-none" name="is_featured" id="is_featured">
                      <option value="">{{ __('translate.Most Relevant') }}</option>
                      <option {{ request()->get('is_featured') == 'featured' ? 'selected' : '' }} value="featured">{{ __('translate.Featured') }}</option>
                    </select>
                  </div>
                  <nav>
                    <div
                      class="freelancer-tab-nav d-flex gap-3 align-items-center"
                      id="nav-tab"
                      role="tablist"
                    >
                      <button
                        class="freelancer-tab-link active"
                        id="nav-grid-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-grid"
                        type="button"
                        role="tab"
                        aria-controls="nav-grid"
                        aria-selected="true"
                      >
                        <svg
                          width="20"
                          height="20"
                          viewBox="0 0 20 20"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M6.88404 0.22229H2.58645C1.28267 0.22229 0.22168 1.28329 0.22168 2.58706V6.88412C0.22168 8.1879 1.28267 9.24889 2.58645 9.24889H6.88351C8.18729 9.24889 9.24828 8.1879 9.24828 6.88412V2.58706C9.24881 1.28329 8.18781 0.22229 6.88404 0.22229ZM7.67229 6.88465C7.67229 7.31924 7.31863 7.6729 6.88404 7.6729H2.58645C2.15186 7.6729 1.7982 7.31924 1.7982 6.88465V2.58759C1.7982 2.153 2.15186 1.79933 2.58645 1.79933H6.88351C7.3181 1.79933 7.67177 2.153 7.67177 2.58759L7.67229 6.88465ZM17.5161 0.22229H13.2185C11.9147 0.22229 10.8537 1.28329 10.8537 2.58706V6.88412C10.8537 8.1879 11.9147 9.24889 13.2185 9.24889H17.5161C18.8198 9.24889 19.8808 8.1879 19.8808 6.88412V2.58706C19.8808 1.28329 18.8204 0.22229 17.5161 0.22229ZM18.3043 6.88465C18.3043 7.31924 17.9507 7.6729 17.5161 7.6729H13.2185C12.7839 7.6729 12.4302 7.31924 12.4302 6.88465V2.58759C12.4302 2.153 12.7839 1.79933 13.2185 1.79933H17.5161C17.9507 1.79933 18.3043 2.153 18.3043 2.58759V6.88465ZM6.88404 10.3483H2.58645C1.28267 10.3483 0.22168 11.4092 0.22168 12.713V17.0101C0.22168 18.3139 1.28267 19.3749 2.58645 19.3749H6.88351C8.18729 19.3749 9.24828 18.3139 9.24828 17.0101V12.713C9.24881 11.4087 8.18781 10.3483 6.88404 10.3483ZM7.67229 17.0101C7.67229 17.4447 7.31863 17.7983 6.88404 17.7983H2.58645C2.15186 17.7983 1.7982 17.4447 1.7982 17.0101V12.713C1.7982 12.2784 2.15186 11.9248 2.58645 11.9248H6.88351C7.3181 11.9248 7.67177 12.2784 7.67177 12.713L7.67229 17.0101ZM17.5161 10.3483H13.2185C11.9147 10.3483 10.8537 11.4092 10.8537 12.713V17.0101C10.8537 18.3139 11.9147 19.3749 13.2185 19.3749H16.4293C16.8644 19.3749 17.2176 19.0217 17.2176 18.5866C17.2176 18.1515 16.8644 17.7983 16.4293 17.7983H13.2185C12.7839 17.7983 12.4302 17.4447 12.4302 17.0101V12.713C12.4302 12.2784 12.7839 11.9248 13.2185 11.9248H17.5161C17.9507 11.9248 18.3043 12.2784 18.3043 12.713V16.3148C18.3043 16.75 18.6575 17.1031 19.0926 17.1031C19.5277 17.1031 19.8808 16.75 19.8808 16.3148V12.713C19.8808 11.4087 18.8204 10.3483 17.5161 10.3483Z"
                            fill="currentColor"
                          />
                        </svg>
                      </button>
                      <button
                        class="freelancer-tab-link"
                        id="nav-list-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-list"
                        type="button"
                        role="tab"
                        aria-controls="nav-list"
                        aria-selected="false"
                      >
                        <svg
                          width="27"
                          height="19"
                          viewBox="0 0 27 19"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M23.3586 0.516235H6.84208C5.9299 0.516235 5.19043 1.25571 5.19043 2.16789C5.19043 3.08006 5.9299 3.81954 6.84208 3.81954H23.3586C24.2708 3.81954 25.0102 3.08006 25.0102 2.16789C25.0102 1.25571 24.2708 0.516235 23.3586 0.516235Z"
                            fill="currentColor"
                          />
                          <path
                            d="M3.53814 2.16789C3.53628 1.73056 3.36105 1.31182 3.0509 1.00348C2.40671 0.363099 1.36627 0.363099 0.722075 1.00348C0.411874 1.31182 0.236644 1.73056 0.234838 2.16789C0.222502 2.27489 0.222502 2.38297 0.234838 2.48996C0.253522 2.59758 0.283974 2.70282 0.325679 2.80378C0.370015 2.90158 0.422507 2.99552 0.482585 3.08456C0.54189 3.17715 0.611105 3.26299 0.689042 3.34056C0.764192 3.4154 0.847239 3.48188 0.93679 3.53876C1.02376 3.60209 1.11806 3.65479 1.21757 3.69567C1.32704 3.75244 1.44374 3.79415 1.56442 3.81954C1.67141 3.83152 1.77949 3.83152 1.88649 3.81954C2.32263 3.8199 2.74122 3.64772 3.0509 3.34056C3.12884 3.26299 3.19806 3.17715 3.25736 3.08456C3.31744 2.99552 3.36993 2.90158 3.41427 2.80378C3.46696 2.70406 3.50851 2.59882 3.53814 2.48996C3.55048 2.38297 3.55048 2.27489 3.53814 2.16789Z"
                            fill="currentColor"
                          />
                          <path
                            d="M3.53865 9.60038C3.55094 9.49339 3.55094 9.38531 3.53865 9.27831C3.51011 9.17173 3.46851 9.06912 3.41478 8.97276C3.37225 8.87144 3.31966 8.77461 3.25787 8.68372C3.20063 8.59216 3.13116 8.5088 3.05142 8.43597C2.40722 7.79559 1.36678 7.79559 0.722589 8.43597C0.412388 8.74431 0.237158 9.16306 0.235352 9.60038C0.238552 9.81804 0.280514 10.0333 0.359225 10.2363C0.40062 10.334 0.450376 10.4279 0.507874 10.5171C0.570688 10.6068 0.642638 10.6899 0.722589 10.7648C0.795571 10.8444 0.878876 10.9139 0.970336 10.9713C1.05731 11.0346 1.15155 11.0873 1.25112 11.1282C1.35182 11.1705 1.45716 11.201 1.56493 11.219C1.67059 11.2427 1.77872 11.2538 1.887 11.252C1.994 11.2644 2.10208 11.2644 2.20907 11.252C2.31416 11.234 2.41677 11.2035 2.51463 11.1612C2.61688 11.1206 2.71391 11.0679 2.80367 11.0043C2.89513 10.9469 2.97843 10.8774 3.05142 10.7978C3.13101 10.7249 3.20048 10.6415 3.25787 10.5501C3.32136 10.4632 3.37406 10.3689 3.41478 10.2693C3.47119 10.1597 3.51285 10.043 3.53865 9.92246C3.55135 9.81546 3.55135 9.70738 3.53865 9.60038Z"
                            fill="currentColor"
                          />
                          <path
                            d="M3.53876 17.0328C3.55099 16.9258 3.55099 16.8177 3.53876 16.7107C3.51021 16.6015 3.46861 16.4961 3.41488 16.3969C3.37055 16.2991 3.31805 16.2051 3.25798 16.1161C3.20058 16.0246 3.13111 15.9413 3.05152 15.8683C2.40732 15.228 1.36689 15.228 0.72269 15.8683C0.643101 15.9413 0.573628 16.0246 0.516234 16.1161C0.456155 16.2051 0.403663 16.2991 0.359327 16.3969C0.316487 16.4974 0.285983 16.6028 0.268486 16.7107C0.245208 16.8164 0.234162 16.9245 0.235453 17.0328C0.237311 17.4701 0.412541 17.8888 0.72269 18.1972C0.795672 18.2768 0.878978 18.3462 0.970438 18.4036C1.05741 18.467 1.15165 18.5197 1.25122 18.5605C1.35192 18.6029 1.45726 18.6334 1.56503 18.6514C1.67069 18.6751 1.77882 18.6862 1.8871 18.6844C1.9941 18.6967 2.10218 18.6967 2.20918 18.6844C2.31426 18.6664 2.41687 18.6359 2.51473 18.5936C2.61698 18.553 2.71401 18.5003 2.80377 18.4367C2.89523 18.3793 2.97854 18.3098 3.05152 18.2302C3.13111 18.1572 3.20058 18.0739 3.25798 17.9825C3.32151 17.8956 3.37421 17.8013 3.41488 17.7017C3.47124 17.592 3.5129 17.4754 3.53876 17.3548C3.55145 17.2478 3.55145 17.1398 3.53876 17.0328Z"
                            fill="currentColor"
                          />
                          <path
                            d="M25.0102 7.94861H6.84208C5.9299 7.94861 5.19043 8.68808 5.19043 9.60026C5.19043 10.5124 5.9299 11.2519 6.84208 11.2519H25.0102C25.9224 11.2519 26.6619 10.5124 26.6619 9.60026C26.6619 8.68808 25.9224 7.94861 25.0102 7.94861Z"
                            fill="currentColor"
                          />
                          <path
                            d="M17.5778 15.3812H6.84208C5.9299 15.3812 5.19043 16.1207 5.19043 17.0329C5.19043 17.9451 5.9299 18.6845 6.84208 18.6845H17.5778C18.49 18.6845 19.2295 17.9451 19.2295 17.0329C19.2295 16.1207 18.49 15.3812 17.5778 15.3812Z"
                            fill="currentColor"
                          />
                        </svg>
                      </button>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
            <!-- Content -->
            </form>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab" tabindex="0">
                 @if ($services->count() > 0)
                <div class="row row-cols-1 row-cols-xl-5 row-cols-lg-3 row-cols-md-2">
                    @foreach ($services as $index => $service)
                        <article class="col mb-4">
                            <div class="service-card bg-white">
                            <div class="position-relative recently-view-card-thumb">
                                <img
                                src="{{ asset($service->thumb_image) }}"
                                class="recently-view-card-img w-100"
                                height="200"
                                alt=""
                                />
                                <button class="service-card-wishlist-btn" onclick="addToWishlist('{{ $service->id }}')">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="32"
                                    height="32"
                                    viewBox="0 0 32 32"
                                    fill="none"
                                >
                                    <circle cx="16" cy="16" r="16" fill="white" />
                                    <path
                                    d="M16.68 9.51314L16 10.2438L15.3199 9.51315C13.442 7.49562 10.3974 7.49562 8.5195 9.51314C6.64161 11.5307 6.64161 14.8017 8.5195 16.8192L14.6399 23.3947C15.391 24.2018 16.6089 24.2018 17.3601 23.3947L23.4804 16.8192C25.3583 14.8017 25.3583 11.5307 23.4804 9.51314C21.6026 7.49562 18.5579 7.49562 16.68 9.51314Z"
                                    stroke="currentColor"
                                    stroke-linejoin="round"
                                    />
                                </svg>
                                </button>
                            </div>
                            <div class="service-card-content">
                                <div
                                class="d-flex align-items-center justify-content-between"
                                >
                                <div>
                                    <h3 class="service-card-price fw-bold">{{ currency($service?->listing_package?->basic_price) }}</h3>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="15"
                                    viewBox="0 0 16 15"
                                    fill="none"
                                    >
                                    <path
                                        d="M16 5.95909C15.8855 6.07153 15.7709 6.21207 15.6564 6.32451C14.4537 7.36454 13.2511 8.37646 12.0484 9.38838C11.9339 9.47271 11.9053 9.55704 11.9625 9.69758C12.3348 11.2717 12.707 12.8739 13.0793 14.448C13.1365 14.6448 13.1079 14.8134 12.9361 14.9258C12.7643 15.0383 12.5925 15.0102 12.4207 14.9258C10.989 14.0826 9.58587 13.2393 8.15415 12.396C8.03961 12.3117 7.9537 12.3117 7.83917 12.396C6.43607 13.2393 5.00435 14.0826 3.60126 14.8977C3.48672 14.9821 3.34355 15.0102 3.20038 14.9821C2.9713 14.9258 2.85676 14.701 2.91403 14.448C3.14311 13.5204 3.34355 12.5928 3.57262 11.6652C3.74443 10.9906 3.8876 10.316 4.05941 9.64136C4.08805 9.52893 4.05941 9.47271 3.97351 9.38838C2.74222 8.34835 1.53957 7.30832 0.308291 6.26829C0.251022 6.21207 0.193753 6.18396 0.165118 6.12775C0.0219457 6.01531 -0.0353233 5.87477 0.0219457 5.678C0.0792147 5.50935 0.222387 5.42502 0.394194 5.39691C0.651905 5.36881 0.909615 5.3407 1.19596 5.3407C2.36998 5.22826 3.54399 5.14393 4.74664 5.0315C4.97572 5.00339 5.20479 4.97528 5.43387 4.97528C5.54841 4.97528 5.60567 4.91906 5.63431 4.83474C6.2929 3.31685 6.92286 1.82708 7.58146 0.309198C7.66736 0.140545 7.75326 0.0281089 7.9537 0C8.18278 0.0562179 8.32595 0.140545 8.41186 0.365416C8.75547 1.15247 9.09908 1.96762 9.4427 2.75467C9.75768 3.4574 10.044 4.18823 10.359 4.89095C10.3876 4.97528 10.4449 5.0315 10.5594 5.0315C11.4757 5.11583 12.3921 5.17204 13.337 5.25637C14.0815 5.31259 14.8546 5.39691 15.5991 5.45313C15.7996 5.48124 15.9141 5.59368 16 5.76233C16 5.81855 16 5.90288 16 5.95909Z"
                                        fill="currentColor"
                                    />
                                    </svg>
                                    <span class="service-card-rating">{{ sprintf("%.1f", $service->avg_rating) }} ({{ $service->total_rating }})</span>
                                </div>
                                </div>
                                <h3 class="service-card-title fw-semibold">
                                    <a href="{{ route('service', html_decode($service->slug)) }}">
                                        {{ html_decode($service->title) }}
                                    </a>
                                </h3>
                                <div
                                class="d-flex align-items-center service-card-author"
                                >

                                <div class="custom-reletive">
                                    @if ($service?->seller?->image)
                                        <img src="{{ asset($service?->seller?->image) }}" class="service-card-author-img" alt="" />
                                    @else
                                        <img src="{{ asset($general_setting->default_avatar) }}" class="service-card-author-img" alt="" />
                                    @endif
                                    @if ($service?->seller?->online_status == 1)
                                        @if ($service?->seller?->online == 1)
                                            <span class="online-indicator2"></span>
                                        @endif
                                    @endif
                                </div>

                                <a href="{{ route('freelancer', $service?->seller?->username) }}" class="service-card-author-name">
                                    {{ html_decode($service?->seller?->name) }}
                                </a>
                                @if($service?->seller?->kyc_status == 1)
                                <button class="varified-badge1">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10.007 2.10377C8.60544 1.65006 7.08181 2.28116 6.41156 3.59306L5.60578 5.17023C5.51004 5.35763 5.35763 5.51004 5.17023 5.60578L3.59306 6.41156C2.28116 7.08181 1.65006 8.60544 2.10377 10.007L2.64923 11.692C2.71404 11.8922 2.71404 12.1078 2.64923 12.308L2.10377 13.993C1.65006 15.3946 2.28116 16.9182 3.59306 17.5885L5.17023 18.3942C5.35763 18.49 5.51004 18.6424 5.60578 18.8298L6.41156 20.407C7.08181 21.7189 8.60544 22.35 10.007 21.8963L11.692 21.3508C11.8922 21.286 12.1078 21.286 12.308 21.3508L13.993 21.8963C15.3946 22.35 16.9182 21.7189 17.5885 20.407L18.3942 18.8298C18.49 18.6424 18.6424 18.49 18.8298 18.3942L20.407 17.5885C21.7189 16.9182 22.35 15.3946 21.8963 13.993L21.3508 12.308C21.286 12.1078 21.286 11.8922 21.3508 11.692L21.8963 10.007C22.35 8.60544 21.7189 7.08181 20.407 6.41156L18.8298 5.60578C18.6424 5.51004 18.49 5.35763 18.3942 5.17023L17.5885 3.59306C16.9182 2.28116 15.3946 1.65006 13.993 2.10377L12.308 2.64923C12.1078 2.71403 11.8922 2.71404 11.692 2.64923L10.007 2.10377ZM6.75977 11.7573L8.17399 10.343L11.0024 13.1715L16.6593 7.51465L18.0735 8.92886L11.0024 15.9999L6.75977 11.7573Z"></path></svg>
                                    </span>
                                </button>
                                @endif
                                </div>
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
                                    class="p-lg-5 p-3 rounded-3 not-found-img d-flex flex-column flex-wrap align-items-center"
                                >
                                    <img
                                    src="{{ asset($general_setting->not_found) }}"
                                    class="img-fluid"
                                    alt="listing-not-found"
                                    />
                                </div>
                                <div class=" text-center">
                                    <h2 class="section-title fw-semibold mb-3 mb-2">{{ __('translate.Sorry!! Service Not Found') }}</h2>
                                    <p class="mb-4">{{ __('translate.Whoops... this information is not available for a moment') }}</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </section>
                        <!-- Listing Not Found End -->
                    @endif
              </div>
              <div
                class="tab-pane fade"
                id="nav-list"
                role="tabpanel"
                aria-labelledby="nav-list-tab"
                tabindex="0"
              >
                <div class="row">
                    @if ($services->count() > 0)
                        @foreach ($services as $service)
                        <article class="col-xl-4 col-lg-6 col-md-6 mb-4">
                            <div
                            class="service-card-horizontal align-items-sm-center d-flex flex-column flex-sm-row gap-3 bg-white"
                            >
                            <div class="position-relative horizontal-img-sm flex-shrink-0">
                                <img
                                src="{{ asset($service->thumb_image) }}"
                                class="w-100"
                                alt=""
                                />
                            </div>
                            <div class="service-card-content p-0">
                                <div
                                class="d-flex align-items-center justify-content-between"
                                >
                                <div>
                                    <h3 class="service-card-price fw-bold">{{ currency($service?->listing_package?->basic_price) }}</h3>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <svg
                                    class="text-lime-300"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="15"
                                    viewBox="0 0 16 15"
                                    fill="none"
                                    >
                                    <path
                                        d="M16 5.95909C15.8855 6.07153 15.7709 6.21207 15.6564 6.32451C14.4537 7.36454 13.2511 8.37646 12.0484 9.38838C11.9339 9.47271 11.9053 9.55704 11.9625 9.69758C12.3348 11.2717 12.707 12.8739 13.0793 14.448C13.1365 14.6448 13.1079 14.8134 12.9361 14.9258C12.7643 15.0383 12.5925 15.0102 12.4207 14.9258C10.989 14.0826 9.58587 13.2393 8.15415 12.396C8.03961 12.3117 7.9537 12.3117 7.83917 12.396C6.43607 13.2393 5.00435 14.0826 3.60126 14.8977C3.48672 14.9821 3.34355 15.0102 3.20038 14.9821C2.9713 14.9258 2.85676 14.701 2.91403 14.448C3.14311 13.5204 3.34355 12.5928 3.57262 11.6652C3.74443 10.9906 3.8876 10.316 4.05941 9.64136C4.08805 9.52893 4.05941 9.47271 3.97351 9.38838C2.74222 8.34835 1.53957 7.30832 0.308291 6.26829C0.251022 6.21207 0.193753 6.18396 0.165118 6.12775C0.0219457 6.01531 -0.0353233 5.87477 0.0219457 5.678C0.0792147 5.50935 0.222387 5.42502 0.394194 5.39691C0.651905 5.36881 0.909615 5.3407 1.19596 5.3407C2.36998 5.22826 3.54399 5.14393 4.74664 5.0315C4.97572 5.00339 5.20479 4.97528 5.43387 4.97528C5.54841 4.97528 5.60567 4.91906 5.63431 4.83474C6.2929 3.31685 6.92286 1.82708 7.58146 0.309198C7.66736 0.140545 7.75326 0.0281089 7.9537 0C8.18278 0.0562179 8.32595 0.140545 8.41186 0.365416C8.75547 1.15247 9.09908 1.96762 9.4427 2.75467C9.75768 3.4574 10.044 4.18823 10.359 4.89095C10.3876 4.97528 10.4449 5.0315 10.5594 5.0315C11.4757 5.11583 12.3921 5.17204 13.337 5.25637C14.0815 5.31259 14.8546 5.39691 15.5991 5.45313C15.7996 5.48124 15.9141 5.59368 16 5.76233C16 5.81855 16 5.90288 16 5.95909Z"
                                        fill="currentColor"
                                    />
                                    </svg>
                                    <span class="service-card-rating">{{ sprintf("%.1f", $service->avg_rating) }} ({{ $service->total_rating }})</span>
                                </div>
                                </div>
                                <h3 class="service-card-title fw-semibold">
                                    <a href="{{ route('service', html_decode($service->slug)) }}">
                                        {{ html_decode($service->title) }}
                                    </a>
                                </h3>
                                <div
                                class="d-flex justify-content-between align-items-center"
                                >
                                <div
                                    class="d-flex align-items-center service-card-author horizontal"
                                >
                                    @if ($service?->seller?->image)
                                        <img src="{{ asset($service?->seller?->image) }}" class="service-card-author-img" alt="" />
                                    @else
                                        <img src="{{ asset($general_setting->default_avatar) }}" class="service-card-author-img" alt="" />
                                    @endif

                                    <a href="{{ route('freelancer', $service?->seller?->username) }}" class="service-card-author-name">{{ html_decode($service?->seller?->name) }}</a>


                                </div>
                                <div>
                                    <button class="wishlist-btn-horizontal" onclick="addToWishlist('{{ $service->id }}')">
                                    <svg
                                        width="20"
                                        height="18"
                                        viewBox="0 0 20 18"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                        d="M10.6803 2.51314L10.0002 3.24375L9.32017 2.51315C7.44229 0.495619 4.39763 0.495618 2.51974 2.51314C0.641857 4.53067 0.641856 7.80172 2.51974 9.81925L8.64013 16.3947C9.39128 17.2018 10.6091 17.2018 11.3603 16.3947L17.4807 9.81925C19.3586 7.80172 19.3586 4.53067 17.4807 2.51314C15.6028 0.495619 12.5581 0.495619 10.6803 2.51314Z"
                                        stroke="currentColor"
                                        stroke-linejoin="round"
                                        />
                                    </svg>
                                    </button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </article>
                        @endforeach
                    @else
                        <!-- Listing Not Found Start -->
                        <section class="bg-offWhite">
                            <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                <div
                                    class=" p-lg-5 p-3  rounded-3 not-found-img d-flex flex-column flex-wrap align-items-center"
                                >
                                    <img
                                    src="{{ asset($general_setting->not_found) }}"
                                    class="img-fluid"
                                    alt="listing-not-found"
                                    />
                                </div>
                                <div class=" text-center">
                                    <h2 class="section-title fw-semibold mb-3 mb-2">{{ __('translate.Sorry!! Service Not Found') }}</h2>
                                    <p class="mb-4">{{ __('translate.Whoops... this information is not available for a moment') }}</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </section>
                        <!-- Listing Not Found End -->
                    @endif

                </div>
              </div>
            </div>

            @if ($services->hasPages())
            <!-- Pagination -->
            <div class="row justify-content-center mt-3">
              <div class="col-auto">
                {{ $services->links('custom_pagination') }}
              </div>
            </div>
            @endif
          </div>
        </section>
        <!-- Services  End -->
      </main>
      <!-- Main End -->
@endsection

@push('js_section')


<script>
    "use strict";
    $(function() {
        $("#category_id, #sort_by, #price_filter, #is_featured").on("change", function(){

            $("#searchFormId").submit();
        })
    });

    </script>
@endpush
