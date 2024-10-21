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
                  <h2 class="section-title-light mb-2">{{ __('translate.About Us') }}</h2>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb w-breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        {{ __('translate.About Us') }}
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Breadcrumb End -->

        <!-- Latest Features -->
        <section class="latest-features bg-offWhite py-110">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-auto">
                <div class="text-center mb-40">
                  <p class="section-subtitle fw-semibold">{{ __('translate.Best Feature') }}</p>
                  <h2 class="section-title fw-bold">{{ __('translate.Our Latest Features') }}</h2>
                </div>
              </div>
            </div>
            <div class="row justify-content-center g-4">
              <div class="col-xl col-lg-4 col-md-6">
                <div class="feature-card">
                  <img
                    src="{{ asset($homepage->feature_icon1) }}"
                    class="mx-auto d-block"
                    alt=""
                  />
                  <h3 class="fw-bold feature-card-title text-center">
                    {{ $homepage->feature_title1 }}
                  </h3>
                </div>
              </div>
              <div class="col-xl col-lg-4 col-md-6">
                <div class="feature-card">
                    <img
                    src="{{ asset($homepage->feature_icon2) }}"
                    class="mx-auto d-block"
                    alt=""
                  />
                  <h3 class="fw-bold feature-card-title text-center">
                    {{ $homepage->feature_title2 }}
                  </h3>
                </div>
              </div>
              <div class="col-xl col-lg-4 col-md-6">
                <div class="feature-card">
                    <img
                    src="{{ asset($homepage->feature_icon3) }}"
                    class="mx-auto d-block"
                    alt=""
                  />
                  <h3 class="fw-bold feature-card-title text-center">
                    {{ $homepage->feature_title3 }}
                  </h3>
                </div>
              </div>
              <div class="col-xl col-lg-4 col-md-6">
                <div class="feature-card">
                    <img
                    src="{{ asset($homepage->feature_icon4) }}"
                    class="mx-auto d-block"
                    alt=""
                  />
                  <h3 class="fw-bold feature-card-title text-center">
                    {{ $homepage->feature_title4 }}
                  </h3>
                </div>
              </div>
              <div class="col-xl col-lg-4 col-md-6">
                <div class="feature-card">
                    <img
                    src="{{ asset($homepage->feature_icon5) }}"
                    class="mx-auto d-block"
                    alt=""
                  />
                  <h3 class="fw-bold feature-card-title text-center">
                    {{ $homepage->feature_title5 }}
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Latest Features End -->

        <!-- About Company -->
        <section class="about-company position-relative pt-110 pb-150 bg-offWhite" >
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="text-left">
                  <p class="section-subtitle fw-semibold mb-2">{{ $about_us->short_title }}</p>
                  <h2 class="section-title fw-bold mb-3">
                    {{ $about_us->title }}
                  </h2>
                  <div class="about-desc">
                    {!! clean($about_us->description) !!}
                  </div>
                  <ul class="about-list py-4 d-flex flex-wrap">
                    <li
                      class="d-flex gap-2 align-items-center fst-italic about-list-item py-2"
                    >
                      <svg
                        width="19"
                        height="19"
                        viewBox="0 0 19 19"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <circle cx="9.5" cy="9.50037" r="9.5" fill="#22BE0D" />
                        <path
                          d="M7.7291 10.0754C7.99366 9.77772 8.24647 9.48543 8.51103 9.19856C9.71039 7.89408 11.0185 6.69245 12.5177 5.68027C12.6735 5.57472 12.8352 5.47458 12.9998 5.37715C13.0527 5.34738 13.1203 5.32302 13.1821 5.32302C13.5201 5.31761 13.8582 5.32032 14.1933 5.32032C14.2991 5.32032 14.3844 5.35279 14.4226 5.44752C14.4608 5.53953 14.4314 5.61802 14.352 5.68568C12.9792 6.8386 11.8475 8.18096 10.7716 9.56662C9.78094 10.8413 8.86378 12.162 8.00248 13.5179C7.97308 13.5667 7.93487 13.6181 7.88489 13.6478C7.77907 13.7155 7.65855 13.6776 7.57918 13.5612C7.44689 13.3664 7.32343 13.1661 7.18233 12.9767C6.3563 11.8806 5.5244 10.7845 4.69543 9.69112C4.66309 9.65052 4.62782 9.60993 4.59842 9.56662C4.53963 9.48002 4.54257 9.3853 4.619 9.31493C4.83947 9.10925 5.06582 8.90356 5.29217 8.70058C5.38035 8.6221 5.47442 8.62751 5.59201 8.70058C5.95652 8.93333 6.32103 9.16879 6.6826 9.40154C7.02947 9.62616 7.37634 9.84809 7.7291 10.0754Z"
                          fill="white"
                        />
                      </svg>
                      {{ $about_us->item1 }}
                    </li>
                    <li
                      class="d-flex gap-2 align-items-center fst-italic about-list-item py-2"
                    >
                      <svg
                        width="19"
                        height="19"
                        viewBox="0 0 19 19"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <circle cx="9.5" cy="9.50037" r="9.5" fill="#22BE0D" />
                        <path
                          d="M7.7291 10.0754C7.99366 9.77772 8.24647 9.48543 8.51103 9.19856C9.71039 7.89408 11.0185 6.69245 12.5177 5.68027C12.6735 5.57472 12.8352 5.47458 12.9998 5.37715C13.0527 5.34738 13.1203 5.32302 13.1821 5.32302C13.5201 5.31761 13.8582 5.32032 14.1933 5.32032C14.2991 5.32032 14.3844 5.35279 14.4226 5.44752C14.4608 5.53953 14.4314 5.61802 14.352 5.68568C12.9792 6.8386 11.8475 8.18096 10.7716 9.56662C9.78094 10.8413 8.86378 12.162 8.00248 13.5179C7.97308 13.5667 7.93487 13.6181 7.88489 13.6478C7.77907 13.7155 7.65855 13.6776 7.57918 13.5612C7.44689 13.3664 7.32343 13.1661 7.18233 12.9767C6.3563 11.8806 5.5244 10.7845 4.69543 9.69112C4.66309 9.65052 4.62782 9.60993 4.59842 9.56662C4.53963 9.48002 4.54257 9.3853 4.619 9.31493C4.83947 9.10925 5.06582 8.90356 5.29217 8.70058C5.38035 8.6221 5.47442 8.62751 5.59201 8.70058C5.95652 8.93333 6.32103 9.16879 6.6826 9.40154C7.02947 9.62616 7.37634 9.84809 7.7291 10.0754Z"
                          fill="white"
                        />
                      </svg>
                      {{ $about_us->item2 }}
                    </li>
                    <li
                      class="d-flex gap-2 align-items-center fst-italic about-list-item py-2"
                    >
                      <svg
                        width="19"
                        height="19"
                        viewBox="0 0 19 19"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <circle cx="9.5" cy="9.50037" r="9.5" fill="#22BE0D" />
                        <path
                          d="M7.7291 10.0754C7.99366 9.77772 8.24647 9.48543 8.51103 9.19856C9.71039 7.89408 11.0185 6.69245 12.5177 5.68027C12.6735 5.57472 12.8352 5.47458 12.9998 5.37715C13.0527 5.34738 13.1203 5.32302 13.1821 5.32302C13.5201 5.31761 13.8582 5.32032 14.1933 5.32032C14.2991 5.32032 14.3844 5.35279 14.4226 5.44752C14.4608 5.53953 14.4314 5.61802 14.352 5.68568C12.9792 6.8386 11.8475 8.18096 10.7716 9.56662C9.78094 10.8413 8.86378 12.162 8.00248 13.5179C7.97308 13.5667 7.93487 13.6181 7.88489 13.6478C7.77907 13.7155 7.65855 13.6776 7.57918 13.5612C7.44689 13.3664 7.32343 13.1661 7.18233 12.9767C6.3563 11.8806 5.5244 10.7845 4.69543 9.69112C4.66309 9.65052 4.62782 9.60993 4.59842 9.56662C4.53963 9.48002 4.54257 9.3853 4.619 9.31493C4.83947 9.10925 5.06582 8.90356 5.29217 8.70058C5.38035 8.6221 5.47442 8.62751 5.59201 8.70058C5.95652 8.93333 6.32103 9.16879 6.6826 9.40154C7.02947 9.62616 7.37634 9.84809 7.7291 10.0754Z"
                          fill="white"
                        />
                      </svg>
                      {{ $about_us->item3 }}
                    </li>
                  </ul>
                  <div
                    class="d-flex flex-column flex-md-row gap-4 align-items-md-center mt-40"
                  >
                    <div>
                      <a href="{{ route('contact-us') }}" class="w-btn-secondary-xl">
                        {{ __('translate.Contact Us') }}
                        <svg
                          width="14"
                          height="10"
                          viewBox="0 0 14 10"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M9 9L13 5M13 5L9 1M13 5L1 5"
                            stroke="white"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </svg>
                      </a>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                      <img
                        src="{{ asset($about_us->seo_image) }}"
                        class="rounded-circle ceo-avatar"
                        alt=""
                      />
                      <img src="{{ asset($about_us->seo_signature) }}" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mt-5 mt-lg-0">
                <ul class="position-relative about-img-group">
                  <li
                    class="position-lg-absolute d-flex flex-column flex-md-row gap-3"
                  >
                    <img src="{{ asset($about_us->about_image) }}" class="w-100" alt="" />
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <!-- About Company End -->

        <!-- Feature Tab Start-->
        <section class="py-110">
          <div class="container">
            <div class="row g-5">
              <div class="col-xl-5">
                <div
                  class="feature-tab-left"
                  data-aos="fade-up"
                  data-aos-duration="1000"
                  data-aos-easing="linear"
                >
                  <div class="mb-5">
                    <h2 class="section-title fw-bold">
                      {{ $homepage->working_step_title4 }}
                    </h2>
                  </div>
                  <nav>
                    <div class="d-flex flex-column">
                      <div class="feature-tab">
                        <div class="d-flex align-items-center gap-3">
                          <div>
                            <img src="{{ asset($homepage->working_step_icon1) }}" alt="" />
                          </div>
                          <div>
                            <h3 class="text-24 fw-bold text-dark-300 mb-2">
                                {{ $homepage->working_step_title1 }}
                            </h3>
                            <p class="text-dark-200 fs-6">
                                {{ $homepage->working_step_des1 }}
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="feature-tab">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <img src="{{ asset($homepage->working_step_icon2) }}" alt="" />
                              </div>
                              <div>
                                <h3 class="text-24 fw-bold text-dark-300 mb-2">
                                    {{ $homepage->working_step_title2 }}
                                </h3>
                                <p class="text-dark-200 fs-6">
                                    {{ $homepage->working_step_des2 }}
                                </p>
                              </div>
                        </div>
                      </div>
                      <div class="feature-tab">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <img src="{{ asset($homepage->working_step_icon3) }}" alt="" />
                              </div>
                              <div>
                                <h3 class="text-24 fw-bold text-dark-300 mb-2">
                                    {{ $homepage->working_step_title3 }}
                                </h3>
                                <p class="text-dark-200 fs-6">
                                    {{ $homepage->working_step_des3 }}
                                </p>
                              </div>
                        </div>
                      </div>
                    </div>
                  </nav>
                </div>
              </div>
              <div class="col-xl-7">
                <div
                  class="feature-tab-right"
                  data-aos="fade-up"
                  data-aos-duration="800"
                  data-aos-easing="linear"
                >
                  <div class="position-relative feature-tab-images">
                    <img
                      src="{{ asset($homepage->working_step_icon4) }}"
                      class="img-fluid"
                      alt=""
                    />

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Feature Tab End-->

        <!-- Cta Start -->
        <section class="cta-area pb-110">
            <div class="container">
                <div class="bg-darkGreen cta-area-bg">
                  <div class="row align-items-center">
                    <div class="col-12 col-xl-7">
                      <div
                        class="cta-content"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-easing="linear"
                      >
                        <p class="cta-subtitle fw-bold mb-2">{{ $homepage->explore_short_title }}</p>
                        <h2 class="section-title-light fw-bold mb-4">
                          {{ $homepage->explore_title }}
                        </h2>
                        <p class="section-desc-light mb-40">
                          {{ $homepage->explore_description }}
                        </p>
                        <a href="{{ route('services') }}" class="cta-btn-link">
                          {{ __('translate.Get Services') }}
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
                      <div class="cta-counter mt-5">
                        <div class="cta-counter-item">
                          <h3 class="cta-counter-title fw-bold">
                            <span class="counter">{{ $homepage->explore_total_customer }}</span><span>{{ __('translate.M') }}+</span>
                          </h3>
                          <p class="cta-counter-desc fw-bold">{{ __('translate.Total Freelancers') }}</p>
                        </div>
                        <div class="cta-counter-item">
                          <h3 class="cta-counter-title fw-bold">
                              <span class="counter">{{ $homepage->explore_total_service }}</span><span>{{ __('translate.M') }}+</span>
                          </h3>
                          <p class="cta-counter-desc fw-bold">{{ __('translate.Total Services') }}</p>
                        </div>
                        <div class="cta-counter-item">
                          <h3 class="cta-counter-title fw-bold">
                              <span class="counter">{{ $homepage->explore_total_job }}</span><span>{{ __('translate.M') }}+</span>
                          </h3>
                          <p class="cta-counter-desc fw-bold">{{ __('translate.Total Job') }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-xl-5 mt-5 mt-xl-0">
                      <div class="cta-img">
                        <img
                          src="{{ asset($homepage->explore_image) }}"
                          class="img-fluid w-100"
                          alt=""
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </section>
        <!-- Cta End -->

        <!-- Testimonial -->
        <section class="bg-offWhite py-110">
          <div class="container">
            <div class="row mb-40 justify-content-center">
              <div class="co-auto">
                <div class="text-center">
                    <h2 class="fw-bold section-title">{{ __('translate.Testimonial') }}</h2>
                    <p class="section-desc">
                      {{ __('translate.Received 4.8/5 Stars in Over 10,000+ Reviews.') }}
                    </p>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper testimonialsSlider">
            <div class="swiper-wrapper">
              @foreach ($testimonials as $testimonial)
              <div class="swiper-slide">
                <div class="testimonial-card bg-white">
                  <div class="testimonial-content">
                    <div class="d-flex gap-2 align-items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="35"
                        height="35"
                        viewBox="0 0 35 35"
                        fill="none"
                      >
                        <path
                          d="M17.5 0C27.165 0 35 7.83502 35 17.5C35 27.165 27.165 35 17.5 35C7.83502 35 0 27.165 0 17.5C0 7.83502 7.83502 0 17.5 0Z"
                          fill="#F7F5F0"
                        />
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M19.1352 21.6719C18.4288 20.3063 18.0757 18.823 18.0757 17.222C18.0757 15.5975 18.5054 14.2555 19.3647 13.196C20.2241 12.1365 21.5602 11.6068 23.3731 11.6068V13.8317C22.7374 13.8317 22.2724 13.973 21.9781 14.2555C21.6838 14.538 21.5367 15.0795 21.5367 15.88V16.2332H24.1147V21.6719H19.1352ZM11.8246 21.6719C11.1183 20.3063 10.7651 18.823 10.7651 17.222C10.7651 15.5975 11.1948 14.2555 12.0542 13.196C12.9135 12.1365 14.2497 11.6068 16.0626 11.6068V13.8317C15.4269 13.8317 14.9619 13.973 14.6676 14.2555C14.3733 14.538 14.2261 15.0795 14.2261 15.88V16.2332H16.8042V21.6719H11.8246Z"
                          fill="currentColor"
                        />
                      </svg>
                      <span class="testimonial-title">{{ __('translate.Very Solid!!') }}</span>
                    </div>
                    <p class="testimonial-feedback">
                      {{ $testimonial->comment }}
                    </p>
                  </div>
                  <div
                    class="testimonial-meta d-flex align-items-center justify-content-between"
                  >
                    <div class="d-flex gap-3 align-items-center">
                      <div>
                        <img
                          src="{{ asset($testimonial->image) }}"
                          class="testimonial-author-img"
                          alt=""
                        />
                      </div>
                      <div>
                        <h4 class="testimonial-author-name fw-semibold">
                          {{ $testimonial->name }}
                        </h4>
                        <p class="testimonial-author-title">{{ $testimonial->designation }}</p>
                      </div>
                    </div>
                    <div>
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="95"
                        height="16"
                        viewBox="0 0 95 16"
                        fill="none"
                      >
                        <path
                          d="M55.863 5.78722C55.8112 5.62592 55.6753 5.5107 55.5102 5.48436L50.5915 4.77331L48.3781 0.246895C48.3037 0.0954657 48.1516 0 47.9866 0C47.8215 0 47.6695 0.0954657 47.595 0.250187L45.4107 4.78977L40.492 5.53375C40.327 5.56008 40.1911 5.6753 40.1393 5.8366C40.0875 5.99791 40.1329 6.17567 40.2526 6.29089L43.8219 9.80997L42.9967 14.794C42.9676 14.9619 43.0355 15.1297 43.1714 15.2285C43.2459 15.2845 43.3365 15.3141 43.4271 15.3141C43.4983 15.3141 43.5662 15.2976 43.631 15.2614L48.0222 12.8945L52.4264 15.2351C52.4911 15.268 52.559 15.2845 52.627 15.2845C52.8664 15.2845 53.0638 15.0836 53.0638 14.84C53.0638 14.8038 53.0606 14.7709 53.0509 14.738L52.1998 9.78364L55.7465 6.2448C55.8727 6.12629 55.9147 5.94853 55.863 5.78722Z"
                          fill="#FF9E15"
                        />
                        <path
                          d="M74.9191 5.78722C74.8673 5.62592 74.7314 5.5107 74.5664 5.48436L69.6477 4.77331L67.4343 0.246895C67.3599 0.0954657 67.2078 0 67.0427 0C66.8777 0 66.7256 0.0954657 66.6512 0.250187L64.4669 4.78977L59.5482 5.53375C59.3832 5.56008 59.2473 5.6753 59.1955 5.8366C59.1437 5.99791 59.189 6.17567 59.3087 6.29089L62.878 9.80997L62.0529 14.794C62.0237 14.9619 62.0917 15.1297 62.2276 15.2285C62.302 15.2845 62.3926 15.3141 62.4832 15.3141C62.5544 15.3141 62.6224 15.2976 62.6871 15.2614L67.0783 12.8945L71.4825 15.2351C71.5472 15.268 71.6152 15.2845 71.6831 15.2845C71.9226 15.2845 72.12 15.0836 72.12 14.84C72.12 14.8038 72.1168 14.7709 72.1071 14.738L71.256 9.78364L74.8026 6.2448C74.9288 6.12629 74.9709 5.94853 74.9191 5.78722Z"
                          fill="#FF9E15"
                        />
                        <path
                          d="M94.9784 5.78722C94.9267 5.62592 94.7908 5.5107 94.6257 5.48436L89.707 4.77331L87.4936 0.246895C87.4192 0.0954657 87.2671 0 87.1021 0C86.937 0 86.7849 0.0954657 86.7105 0.250187L84.5262 4.78977L79.6075 5.53375C79.4425 5.56008 79.3066 5.6753 79.2548 5.8366C79.203 5.99791 79.2483 6.17567 79.3681 6.29089L82.9374 9.80997L82.1122 14.794C82.0831 14.9619 82.151 15.1297 82.2869 15.2285C82.3613 15.2845 82.452 15.3141 82.5426 15.3141C82.6138 15.3141 82.6817 15.2976 82.7464 15.2614L87.1377 12.8945L91.5418 15.2351C91.6066 15.268 91.6745 15.2845 91.7425 15.2845C91.9819 15.2845 92.1793 15.0836 92.1793 14.84C92.1793 14.8038 92.1761 14.7709 92.1664 14.738L91.3153 9.78364L94.862 6.2448C94.9882 6.12629 95.0302 5.94853 94.9784 5.78722Z"
                          fill="#FF9E15"
                        />
                        <path
                          d="M35.8039 5.78722C35.7521 5.62592 35.6162 5.5107 35.4512 5.48436L30.5325 4.77331L28.3191 0.246895C28.2446 0.0954657 28.0925 0 27.9275 0C27.7625 0 27.6104 0.0954657 27.5359 0.250187L25.3517 4.78977L20.433 5.53375C20.2679 5.56008 20.132 5.6753 20.0802 5.8366C20.0285 5.99791 20.0738 6.17567 20.1935 6.29089L23.7628 9.80997L22.9376 14.794C22.9085 14.9619 22.9764 15.1297 23.1124 15.2285C23.1868 15.2845 23.2774 15.3141 23.368 15.3141C23.4392 15.3141 23.5071 15.2976 23.5719 15.2614L27.9631 12.8945L32.3673 15.2351C32.432 15.268 32.4999 15.2845 32.5679 15.2845C32.8074 15.2845 33.0048 15.0836 33.0048 14.84C33.0048 14.8038 33.0015 14.7709 32.9918 14.738L32.1408 9.78364L35.6874 6.2448C35.8136 6.12629 35.8557 5.94853 35.8039 5.78722Z"
                          fill="#FF9E15"
                        />
                        <path
                          d="M15.7448 5.78722C15.693 5.62592 15.5571 5.5107 15.3921 5.48436L10.4734 4.77331L8.25997 0.246895C8.18555 0.0954657 8.03345 0 7.86842 0C7.70339 0 7.55129 0.0954657 7.47687 0.250187L5.29258 4.78977L0.373883 5.53375C0.208848 5.56008 0.0729369 5.6753 0.0211612 5.8366C-0.0306145 5.99791 0.0146893 6.17567 0.134421 6.29089L3.70371 9.80997L2.87853 14.794C2.84941 14.9619 2.91737 15.1297 3.05328 15.2285C3.12771 15.2845 3.21831 15.3141 3.30892 15.3141C3.38011 15.3141 3.44807 15.2976 3.51279 15.2614L7.90402 12.8945L12.3082 15.2351C12.3729 15.268 12.4409 15.2845 12.5088 15.2845C12.7483 15.2845 12.9457 15.0836 12.9457 14.84C12.9457 14.8038 12.9424 14.7709 12.9327 14.738L12.0817 9.78364L15.6283 6.2448C15.7545 6.12629 15.7966 5.94853 15.7448 5.78722Z"
                          fill="#FF9E15"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="swiper testimonialsSliderBottom mt-4">
            <div class="swiper-wrapper">
              @foreach ($latest_testimonials as $testimonial)
                  <div class="swiper-slide">
                      <div class="testimonial-card bg-white">
                          <div class="testimonial-content">
                          <div class="d-flex gap-2 align-items-center">
                              <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="35"
                              height="35"
                              viewBox="0 0 35 35"
                              fill="none"
                              >
                              <path
                                  d="M17.5 0C27.165 0 35 7.83502 35 17.5C35 27.165 27.165 35 17.5 35C7.83502 35 0 27.165 0 17.5C0 7.83502 7.83502 0 17.5 0Z"
                                  fill="#F7F5F0"
                              />
                              <path
                                  fill-rule="evenodd"
                                  clip-rule="evenodd"
                                  d="M19.1352 21.6719C18.4288 20.3063 18.0757 18.823 18.0757 17.222C18.0757 15.5975 18.5054 14.2555 19.3647 13.196C20.2241 12.1365 21.5602 11.6068 23.3731 11.6068V13.8317C22.7374 13.8317 22.2724 13.973 21.9781 14.2555C21.6838 14.538 21.5367 15.0795 21.5367 15.88V16.2332H24.1147V21.6719H19.1352ZM11.8246 21.6719C11.1183 20.3063 10.7651 18.823 10.7651 17.222C10.7651 15.5975 11.1948 14.2555 12.0542 13.196C12.9135 12.1365 14.2497 11.6068 16.0626 11.6068V13.8317C15.4269 13.8317 14.9619 13.973 14.6676 14.2555C14.3733 14.538 14.2261 15.0795 14.2261 15.88V16.2332H16.8042V21.6719H11.8246Z"
                                  fill="currentColor"
                              />
                              </svg>
                              <span class="testimonial-title">{{ __('translate.Very Solid!!') }}</span>
                          </div>
                          <p class="testimonial-feedback">
                              {{ $testimonial->comment }}
                          </p>
                          </div>
                          <div
                          class="testimonial-meta d-flex align-items-center justify-content-between"
                          >
                          <div class="d-flex gap-3 align-items-center">
                              <div>
                              <img
                                  src="{{ asset($testimonial->image) }}"
                                  class="testimonial-author-img"
                                  alt=""
                              />
                              </div>
                              <div>
                              <h4 class="testimonial-author-name fw-semibold">
                                  {{ $testimonial->name }}
                              </h4>
                              <p class="testimonial-author-title">{{ $testimonial->designation }}</p>
                              </div>
                          </div>
                          <div>
                              <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="95"
                              height="16"
                              viewBox="0 0 95 16"
                              fill="none"
                              >
                              <path
                                  d="M55.863 5.78722C55.8112 5.62592 55.6753 5.5107 55.5102 5.48436L50.5915 4.77331L48.3781 0.246895C48.3037 0.0954657 48.1516 0 47.9866 0C47.8215 0 47.6695 0.0954657 47.595 0.250187L45.4107 4.78977L40.492 5.53375C40.327 5.56008 40.1911 5.6753 40.1393 5.8366C40.0875 5.99791 40.1329 6.17567 40.2526 6.29089L43.8219 9.80997L42.9967 14.794C42.9676 14.9619 43.0355 15.1297 43.1714 15.2285C43.2459 15.2845 43.3365 15.3141 43.4271 15.3141C43.4983 15.3141 43.5662 15.2976 43.631 15.2614L48.0222 12.8945L52.4264 15.2351C52.4911 15.268 52.559 15.2845 52.627 15.2845C52.8664 15.2845 53.0638 15.0836 53.0638 14.84C53.0638 14.8038 53.0606 14.7709 53.0509 14.738L52.1998 9.78364L55.7465 6.2448C55.8727 6.12629 55.9147 5.94853 55.863 5.78722Z"
                                  fill="#FF9E15"
                              />
                              <path
                                  d="M74.9191 5.78722C74.8673 5.62592 74.7314 5.5107 74.5664 5.48436L69.6477 4.77331L67.4343 0.246895C67.3599 0.0954657 67.2078 0 67.0427 0C66.8777 0 66.7256 0.0954657 66.6512 0.250187L64.4669 4.78977L59.5482 5.53375C59.3832 5.56008 59.2473 5.6753 59.1955 5.8366C59.1437 5.99791 59.189 6.17567 59.3087 6.29089L62.878 9.80997L62.0529 14.794C62.0237 14.9619 62.0917 15.1297 62.2276 15.2285C62.302 15.2845 62.3926 15.3141 62.4832 15.3141C62.5544 15.3141 62.6224 15.2976 62.6871 15.2614L67.0783 12.8945L71.4825 15.2351C71.5472 15.268 71.6152 15.2845 71.6831 15.2845C71.9226 15.2845 72.12 15.0836 72.12 14.84C72.12 14.8038 72.1168 14.7709 72.1071 14.738L71.256 9.78364L74.8026 6.2448C74.9288 6.12629 74.9709 5.94853 74.9191 5.78722Z"
                                  fill="#FF9E15"
                              />
                              <path
                                  d="M94.9784 5.78722C94.9267 5.62592 94.7908 5.5107 94.6257 5.48436L89.707 4.77331L87.4936 0.246895C87.4192 0.0954657 87.2671 0 87.1021 0C86.937 0 86.7849 0.0954657 86.7105 0.250187L84.5262 4.78977L79.6075 5.53375C79.4425 5.56008 79.3066 5.6753 79.2548 5.8366C79.203 5.99791 79.2483 6.17567 79.3681 6.29089L82.9374 9.80997L82.1122 14.794C82.0831 14.9619 82.151 15.1297 82.2869 15.2285C82.3613 15.2845 82.452 15.3141 82.5426 15.3141C82.6138 15.3141 82.6817 15.2976 82.7464 15.2614L87.1377 12.8945L91.5418 15.2351C91.6066 15.268 91.6745 15.2845 91.7425 15.2845C91.9819 15.2845 92.1793 15.0836 92.1793 14.84C92.1793 14.8038 92.1761 14.7709 92.1664 14.738L91.3153 9.78364L94.862 6.2448C94.9882 6.12629 95.0302 5.94853 94.9784 5.78722Z"
                                  fill="#FF9E15"
                              />
                              <path
                                  d="M35.8039 5.78722C35.7521 5.62592 35.6162 5.5107 35.4512 5.48436L30.5325 4.77331L28.3191 0.246895C28.2446 0.0954657 28.0925 0 27.9275 0C27.7625 0 27.6104 0.0954657 27.5359 0.250187L25.3517 4.78977L20.433 5.53375C20.2679 5.56008 20.132 5.6753 20.0802 5.8366C20.0285 5.99791 20.0738 6.17567 20.1935 6.29089L23.7628 9.80997L22.9376 14.794C22.9085 14.9619 22.9764 15.1297 23.1124 15.2285C23.1868 15.2845 23.2774 15.3141 23.368 15.3141C23.4392 15.3141 23.5071 15.2976 23.5719 15.2614L27.9631 12.8945L32.3673 15.2351C32.432 15.268 32.4999 15.2845 32.5679 15.2845C32.8074 15.2845 33.0048 15.0836 33.0048 14.84C33.0048 14.8038 33.0015 14.7709 32.9918 14.738L32.1408 9.78364L35.6874 6.2448C35.8136 6.12629 35.8557 5.94853 35.8039 5.78722Z"
                                  fill="#FF9E15"
                              />
                              <path
                                  d="M15.7448 5.78722C15.693 5.62592 15.5571 5.5107 15.3921 5.48436L10.4734 4.77331L8.25997 0.246895C8.18555 0.0954657 8.03345 0 7.86842 0C7.70339 0 7.55129 0.0954657 7.47687 0.250187L5.29258 4.78977L0.373883 5.53375C0.208848 5.56008 0.0729369 5.6753 0.0211612 5.8366C-0.0306145 5.99791 0.0146893 6.17567 0.134421 6.29089L3.70371 9.80997L2.87853 14.794C2.84941 14.9619 2.91737 15.1297 3.05328 15.2285C3.12771 15.2845 3.21831 15.3141 3.30892 15.3141C3.38011 15.3141 3.44807 15.2976 3.51279 15.2614L7.90402 12.8945L12.3082 15.2351C12.3729 15.268 12.4409 15.2845 12.5088 15.2845C12.7483 15.2845 12.9457 15.0836 12.9457 14.84C12.9457 14.8038 12.9424 14.7709 12.9327 14.738L12.0817 9.78364L15.6283 6.2448C15.7545 6.12629 15.7966 5.94853 15.7448 5.78722Z"
                                  fill="#FF9E15"
                              />
                              </svg>
                          </div>
                          </div>
                      </div>
                  </div>
              @endforeach
            </div>
          </div>
        </section>
        <!-- Testimonial End -->

        <!-- Faq -->
        <section class="pb-80 bg-offWhite">
          <div class="container">
            <div class="row justify-content-center mb-40">
              <div class="col-auto">
                <div class="text-center">
                  <h2 class="section-title fw-bold mb-3">{{ __('translate.Our Faq') }}</h2>
                  <p class="section-desc">{{ __('translate.Explore Our Informative FAQ Section') }}</p>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="faq-accordions">
                  <div
                    class="accordion accordion-flush"
                    id="accordionFlushExample"
                  >
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button
                            class="accordion-button shadow-none {{ $index != 0 ? 'collapsed' : '' }}"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne{{ $index }}"
                            aria-expanded="false"
                            aria-controls="flush-collapseOne{{ $index }}"
                            >
                            {{ $faq->question }}
                            </button>
                        </h2>
                        <div
                            id="flush-collapseOne{{ $index }}"
                            class="accordion-collapse {{ $index == 0 ? 'show' : '' }} collapse "
                            data-bs-parent="#accordionFlushExample"
                        >
                            <div class="accordion-body">
                            {!! clean($faq->answer) !!}
                            </div>
                        </div>
                        </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Faq End -->
      </main>
      <!-- Main End -->
@endsection
