@extends('layout')

@section('title')
    <title>{{ __('translate.Profile') }} || {{ html_decode($seller->name) }}</title>
    <meta name="title" content="{{ html_decode($seller->name) }}">
@endsection

@section('front-content')
<!-- Main Start-->
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
                    <h2 class="section-title-light mb-2">{{ __('translate.Seller Detail') }}</h2>
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb w-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        {{ __('translate.Seller Detail') }}
                        </li>
                    </ol>
                    </nav>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Freelancer Details -->
    <section class="bg-offWhite py-110">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-4">
            <aside
              class="freelancer-details-sidebar d-flex flex-column gap-4"
            >
              <div
                class="freelancer-sidebar-card p-4 rounded-4 bg-white position-relative"
              >
                <div
                  class="job-type-badge position-absolute d-flex flex-column gap-2"
                >

                @if ($seller->is_top_seller == 'enable')
                <p class="job-type-badge-tertiary">{{ __('translate.Top Seller') }}</p>
                @endif
                  <p class="job-type-badge-secondary">{{ currency($seller->hourly_payment) }}/{{ __('translate.hr') }}</p>
                </div>
                <div
                  class="freelancer-sidebar-card-header d-flex flex-column justify-content-center align-items-center py-4"
                >
                <div class="custom-reletive">
                    @if ($seller->image)
                    <img class="freelancer-avatar rounded-circle mb-4" src="{{ asset($seller->image) }}" alt="" />
                    @else
                    <img class="freelancer-avatar rounded-circle mb-4" src="{{ asset($general_setting->default_avatar) }}" alt="" />
                    @endif

                    @if ($seller->online_status == 1)
                        @if ($seller->online == 1)
                            <span class="online-indicator1"></span>
                        @endif
                    @endif
                </div>



                    <h3 class="fw-bold freelancer-name text-dark-300 mb-2 relative">
                        {{ html_decode($seller->name) }}
                        @if($seller->kyc_status == 1)
                            <button class="varified-badge">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10.007 2.10377C8.60544 1.65006 7.08181 2.28116 6.41156 3.59306L5.60578 5.17023C5.51004 5.35763 5.35763 5.51004 5.17023 5.60578L3.59306 6.41156C2.28116 7.08181 1.65006 8.60544 2.10377 10.007L2.64923 11.692C2.71404 11.8922 2.71404 12.1078 2.64923 12.308L2.10377 13.993C1.65006 15.3946 2.28116 16.9182 3.59306 17.5885L5.17023 18.3942C5.35763 18.49 5.51004 18.6424 5.60578 18.8298L6.41156 20.407C7.08181 21.7189 8.60544 22.35 10.007 21.8963L11.692 21.3508C11.8922 21.286 12.1078 21.286 12.308 21.3508L13.993 21.8963C15.3946 22.35 16.9182 21.7189 17.5885 20.407L18.3942 18.8298C18.49 18.6424 18.6424 18.49 18.8298 18.3942L20.407 17.5885C21.7189 16.9182 22.35 15.3946 21.8963 13.993L21.3508 12.308C21.286 12.1078 21.286 11.8922 21.3508 11.692L21.8963 10.007C22.35 8.60544 21.7189 7.08181 20.407 6.41156L18.8298 5.60578C18.6424 5.51004 18.49 5.35763 18.3942 5.17023L17.5885 3.59306C16.9182 2.28116 15.3946 1.65006 13.993 2.10377L12.308 2.64923C12.1078 2.71403 11.8922 2.71404 11.692 2.64923L10.007 2.10377ZM6.75977 11.7573L8.17399 10.343L11.0024 13.1715L16.6593 7.51465L18.0735 8.92886L11.0024 15.9999L6.75977 11.7573Z"></path></svg>
                                </span>
                            </button>
                        @endif
                    </h3>
                  <p class="text-dark-200 mb-1">{{ html_decode($seller->designation) }}</p>
                  <p>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="12"
                      height="11"
                      viewBox="0 0 12 11"
                      fill="none"
                    >
                      <path
                        d="M11.1141 4.15628C11.0407 3.92385 10.8406 3.75929 10.6048 3.73731L7.38803 3.43649L6.11676 0.370622C6.0229 0.145376 5.80934 0 5.57163 0C5.33392 0 5.12027 0.145376 5.02701 0.370622L3.75574 3.43649L0.538508 3.73731C0.302669 3.75973 0.102963 3.92429 0.0291678 4.15628C-0.0442024 4.3887 0.0235566 4.64364 0.201923 4.80478L2.63351 7.0011L1.91656 10.2539C1.8641 10.493 1.95422 10.7403 2.14687 10.8838C2.25042 10.9613 2.37208 11 2.49417 11C2.59908 11 2.70407 10.9713 2.79785 10.9135L5.57163 9.20504L8.3449 10.9135C8.54835 11.0387 8.80417 11.0272 8.99639 10.8838C9.18904 10.7403 9.27916 10.493 9.22671 10.2539L8.50975 7.0011L10.9413 4.80478C11.1196 4.64364 11.1875 4.38923 11.1141 4.15628Z"
                        fill="#06131C"
                      />
                    </svg>
                    <span class="text-dark-300">{{ sprintf("%.1f", $seller->avg_rating) }} </span>
                    <span class="text-dark-200"> ({{ $seller->total_rating }} {{ __('translate.Reviews') }})</span>
                  </p>
                </div>
                <div
                  class="d-flex gap-4 justify-content-between sidebar-rate-card bg-offWhite p-4 rounded-4"
                >
                  <div>
                    <p class="text-dark-300 fw-medium">{{ __('translate.Service') }}</p>
                    <p class="text-dark-200">{{ $total_service }}</p>
                  </div>
                  <div>
                    <p class="text-dark-300 fw-medium">{{ __('translate.Rate') }}</p>
                    <p class="text-dark-200">{{ currency(html_decode($seller->hourly_payment)) }}/{{ __('translate.hr') }}</p>
                  </div>
                  <div>
                    <p class="text-dark-300 fw-medium">{{ __('translate.Jobs') }}</p>
                    <p class="text-dark-200">{{ $total_job_done }}</p>
                  </div>
                </div>
                <ul class="py-4">
                  <li
                    class="py-1 d-flex justify-content-between align-items-center"
                  >
                    <p class="text-dark-200">{{ __('translate.Location') }}:</p>
                    <p class="text-dark-300 fw-medium">{{ html_decode($seller->address) }}</p>
                  </li>
                  <li
                    class="py-1 d-flex justify-content-between align-items-center"
                  >
                    <p class="text-dark-200">{{ __('translate.Member Since') }}:</p>
                    <p class="text-dark-300 fw-medium">{{ $seller->created_at->format('F Y') }}</p>
                  </li>
                  <li
                    class="py-1 d-flex justify-content-between align-items-center"
                  >
                    <p class="text-dark-200">{{ __('translate.Gender') }}:</p>
                    <p class="text-dark-300 fw-medium">{{ html_decode($seller->gender) }}</p>
                  </li>

                </ul>

                @if (checkModule('LiveChat'))
                @auth('web')
                    @if (Auth::guard('web')->user()->is_seller == 0)
                        <a href="javascript:;" class="w-btn-secondary-xl w-100 mt-3" data-bs-toggle="modal"
                        data-bs-target="#sendMessageModal">
                            {{ __('translate.Send Message') }}
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    @else
                        <a href="javascript:;" class="w-btn-secondary-xl w-100 mt-3 beforeLoginForChat">
                            {{ __('translate.Send Message') }}
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    @endif

                @else
                    <a href="javascript:;" class="w-btn-secondary-xl w-100 mt-3 beforeLoginForChat" >
                        {{ __('translate.Send Message') }}
                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                @endauth
                @endif

              </div>
              <div class="freelancer-sidebar-card p-4 rounded-4 bg-white">
                <div class="freelancer-single-info  pb-4">
                  <h4
                    class="freelancer-sidebar-title text-dark-300 fw-semibold"
                  >
                    {{ __('translate.About Me') }}
                  </h4>
                  <p class="text-dark-200 fs-6">
                    {{ html_decode($seller->about_me) }}
                  </p>
                </div>

                @if ($seller->skills)
                    <div class="freelancer-single-info border-bottom py-4">
                    <h4
                        class="freelancer-sidebar-title text-dark-300 fw-semibold"
                    >
                        {{ __('translate.Skills') }}
                    </h4>
                    <div class="freelancer-skills d-flex flex-wrap gap-3">
                        @foreach (json_decode(html_decode($seller->skills)) as $skill)
                        <span class="single-skill">{{ html_decode($skill->value) }}</span>
                        @endforeach
                    </div>
                    </div>
                @endif

                <div class="freelancer-single-info py-4">
                  <h4
                    class="freelancer-sidebar-title text-dark-300 fw-semibold"
                  >
                    {{ __('translate.Education') }}
                  </h4>
                  <div class="mb-4">
                    <h4
                      class="text-dark-300 freelancer-university-name fw-semibold mb-1"
                    >
                    {{ html_decode($seller->university_name) }}
                    </h4>
                    <p class="text-dark-200">
                        {{ html_decode($seller->university_location) }} <br />
                        {{ html_decode($seller->university_time_period) }}
                    </p>
                  </div>
                  <div>
                    <h4
                      class="text-dark-300 freelancer-university-name fw-semibold mb-1"
                    >
                    {{ html_decode($seller->school_name) }}
                    </h4>
                    <p class="text-dark-200">
                        {{ html_decode($seller->school_location) }} <br />
                        {{ html_decode($seller->school_time_period) }}
                    </p>
                  </div>
                </div>


                <div class="freelancer-single-info pt-4">
                    <h4
                      class="freelancer-sidebar-title text-dark-300 fw-semibold"
                    >
                      {{ __('translate.Language') }}
                    </h4>
                    @if ($seller->language)

                    <ul>
                        @foreach (json_decode(html_decode($seller->language)) as $language)
                            <li class="py-1 text-dark-200 fs-6">{{ $language->value }}</li>
                        @endforeach
                    </ul>
                    @endif

                  </div>



              </div>
            </aside>
          </div>
          <div class="col-xl-9 col-lg-8 mt-4 mt-lg-0">
            <div>
              <!-- Tab Nav -->
              <div
                class="bg-white d-flex gap-3 p-4 freelancer-tab mb-4"
                id="nav-tab"
                role="tablist"
              >
                <button
                  class="tab-btn active"
                  id="nav-service-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-service"
                  type="button"
                  role="tab"
                  aria-controls="nav-service"
                  aria-selected="true"
                >
                  {{ __('translate.Service') }}
                </button>
                <button
                  class="tab-btn"
                  id="nav-portfolio-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-portfolio"
                  type="button"
                  role="tab"
                  aria-controls="nav-portfolio"
                  aria-selected="false"
                >
                  {{ __('translate.Rating') }}
                </button>
              </div>
              <div class="freelancer-tab-content">
                <div class="tab-content" id="nav-tabContent">
                  <!-- Services -->
                  <div
                    class="tab-pane fade show active"
                    id="nav-service"
                    role="tabpanel"
                    aria-labelledby="nav-service-tab"
                    tabindex="0"
                  >
                    <div class="row g-4">
                        @foreach ($services as $index => $service)
                        <article class="col-xl-4 col-md-6">
                            <div class="service-card bg-white w-shadow">
                                <div class="position-relative freelancer-service-thumb">
                                    <img
                                    src="{{ asset($service->thumb_image) }}"
                                    class="recently-view-card-img w-100"
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
                                    <a href="{{ route('freelancer', $service?->seller?->username) }}" class="service-card-author-name">{{ html_decode($service?->seller?->name) }}</a>
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
                  </div>
                  <!-- Portfolio -->
                  <div
                    class="tab-pane fade"
                    id="nav-portfolio"
                    role="tabpanel"
                    aria-labelledby="nav-portfolio-tab"
                    tabindex="0"
                  >

                    <div class="d-flex flex-column gap-4">
                    <!-- Reviews -->
                    <div class="d-flex flex-column flex-md-row gap-4 mb-4">
                      <div class="bg-white service-review-count p-4 rounded-3 d-flex flex-column justify-content-center align-items-center">
                        <h4 class="service-details-subtitle fw-bold mb-1">
                            {{ sprintf("%.2f", $avg_ratings) }}
                        </h4>
                        <p class="fw-semibold text-dark-300 text-18 text-dark-200">
                            {{ $total_ratings }} {{ __('translate.Reviews') }}
                        </p>
                      </div>
                      <div class="flex-grow-1">
                        <div class="d-grid gap-3">
                            @foreach ($rating_data as $rating => $data)
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="flex-shrink-0">
                                        <span class="fs-6 text-dark-300">{{ $rating }} {{ __('translate.Star') }}</span>
                                    </div>
                                    <div class="position-relative review-progress-wrapper">
                                        <div class="review-progress-bar" style="width: {{ $data['percentage'] }}%">

                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="fs-6 text-dark-200"> ({{ $data['count'] }}) </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="d-flex flex-column gap-4">
                      <!-- Buyer Review -->
                        @foreach ($review_list as $review_item)
                            <div class="review-card bg-white">
                                <div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <ul class="d-flex gap-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($review_item->rating < $i)
                                                        <li><i class="fa-regular fa-star"></i></li>
                                                    @else
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                    @endif
                                                @endfor
                                            </ul>
                                        </div>
                                        <span class="text-dark-200 fs-6">{{ $review_item->created_at->format('d M, Y') }}</span>
                                    </div>
                                    <p class="text-dark-200 fs-6">
                                        {{ html_decode($review_item->review) }}
                                    </p>
                                    <div class="d-flex align-items-center buyer-info  justify-content-between mt-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                @if ($review_item?->buyer?->image)
                                                <img src="{{ asset($review_item?->buyer?->image) }}" class="rounded-circle w-64" alt="" />
                                                @else
                                                <img src="{{ asset($general_setting->default_avatar) }}" class="rounded-circle w-64" alt="" />
                                                @endif

                                            </div>
                                            <div>
                                                <h4 class="text-18 text-dark-300 fw-semibold">
                                                    {{ html_decode($review_item?->buyer?->name) }}
                                                </h4>
                                                <p class="text-dark-200 fs-6">{{ html_decode($review_item?->buyer?->designation) }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Freelancer Details End -->
  </main>
  <!-- Main End -->



  @if (checkModule('LiveChat'))
    <!-- Modal -->
    <div class="modal fade" id="sendMessageModal" tabindex="-1"  aria-labelledby="jobDetailsModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-body">
                <div class="bg-white p-lg-5 rounded-3">
                <div class="proposal-container">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('buyer.store-message-from-service') }}">
                        @csrf

                        <input type="hidden" name="seller_id" value="{{ $seller->id }}">
                        <div class="d-flex flex-column gap-4">

                            <div class="proposal-input-container">
                            <label for="time" class="proposal-form-label"
                                >{{ __('translate.Message') }}*</label
                            >
                            <textarea
                                placeholder="{{ __('translate.Type your message') }}"
                                class="form-textarea shadow-none"
                                name="message"
                                required

                            >{{ old('message') }}</textarea>
                            </div>

                            <div
                            class="d-flex gap-4 align-items-center justify-content-end"
                            >
                            <button class="w-btn-gray-sm" type="button" data-bs-dismiss="modal">
                                {{ __('translate.Cancel') }}
                            </button>
                            <button type="submit" class="w-btn-secondary-sm">
                                {{ __('translate.Send Message') }}
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endif

@endsection
