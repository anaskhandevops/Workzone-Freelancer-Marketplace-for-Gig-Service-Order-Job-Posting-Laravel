@extends('layout')

@section('title')
    <title>{{ html_decode($service->title) }}</title>
    <meta name="title" content="{{ html_decode($service->title) }}">

    @php
        $tags = '';
        if($service->tags){
            foreach (json_decode(html_decode($service->tags)) as $key => $service_tag) {
                $tags .= $service_tag->value.', ';
            }
        }
    @endphp

    <meta name="keyword" content="{{ $tags }}">

@endsection

@section('front-content')

<!-- Main Start  -->
<main>
    <!-- Breadcrumb -->
    <section class="w-breadcrumb-area" style="background-image: url({{ asset($general_setting->breadcrumb_image) }})">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="position-relative z-2" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="linear">
                        <h2 class="section-title-light mb-2">{{ __('translate.Service Detail') }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb w-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('translate.Service Detail') }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->


    <!-- Services Details Start -->
    <section class="py-110 bg-offWhite">
        <div class="container">
            <div class="row">
                <!-- Left -->
                <div class="col-xl-9 col-lg-8">
                    <!-- Slider -->
                    <div class="bg-white service-details-content">
                        <!-- <div class="swiper mySwiper2 mb-3">
                            <div class="swiper-wrapper">
                                @foreach ($galleries as $gallery)
                                <div class="swiper-slide">
                                    <div class="job-details-slider-img">
                                        <img src="{{ asset($gallery->image) }}" class="img-fluid w-100" />
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-nav-btn">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div> -->


                        <!-- Service Update Design -->
                        <div class="grid-container ">
                            @if (isset($galleries[0]))
                                <a href='{{ asset($galleries[0]->image) }}' class="main-item d-block">
                                    <img src="{{ asset($galleries[0]->image) }}" class='img-fluid gallery' alt="Main Item">
                                </a>
                            @endif


                            @if (isset($galleries[1]))
                                <a href='{{ asset($galleries[1]->image) }}' class="small-item d-block">
                                    <img src="{{ asset($galleries[1]->image) }}" class='img-fluid gallery'>
                                </a>
                            @endif

                            @if (isset($galleries[2]))
                            <a href='{{ asset($galleries[2]->image) }}' class="small-item d-block">
                                <img src="{{ asset($galleries[2]->image) }}" class='img-fluid gallery'>
                            </a>
                            @endif
                        </div>



                        <div class="mt-40">
                            <h2 class="service-details-title fw-bold mb-4">
                                {{ html_decode($service->title) }}
                            </h2>
                            <h3 class="service-details-subtitle fw-bold mb-3">
                                {{ __('translate.About this gig') }}
                            </h3>
                            <div class="service_details legal-content">
                                <div class="content-details">
                                    {!! clean(html_decode($service->description)) !!}
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- Review -->
                    <div class="pt-80">
                        <h3 class="service-details-title text-dark-200 fw-bold mb-30">
                            {{ __('translate.Reviews') }}
                        </h3>
                        <div class="d-flex flex-md-row gap-4 mb-4">
                            <div class="bg-white service-review-count p-4 rounded-3 d-flex flex-column justify-content-center align-items-center">
                                <h4 class="service-details-subtitle fw-bold mb-1">{{ sprintf("%.2f", $avg_ratings) }}</h4>
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
                                        <div class="d-flex align-items-center buyer-info justify-content-between mt-4">
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
                <!-- Right -->
                <div class="col-xl-3 col-lg-4 mt-30 mt-xl-0">
                    <aside class="d-flex flex-column gap-4">
                        <div>
                            <nav>
                                <div class="nav package-tabs d-flex gap-4 justify-content-between align-items-center" id="nav-tab" role="tablist">
                                    <button class="package-tab-btn active" id="nav-basic-tab" data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab" aria-controls="nav-basic" aria-selected="true">
                                        {{ __('translate.Basic') }}
                                    </button>
                                    <button class="package-tab-btn" id="nav-standard-tab" data-bs-toggle="tab" data-bs-target="#nav-standard" type="button" role="tab" aria-controls="nav-standard" aria-selected="false">
                                        {{ __('translate.Standard') }}
                                    </button>
                                    <button class="package-tab-btn" id="nav-premium-tab" data-bs-toggle="tab" data-bs-target="#nav-premium" type="button" role="tab" aria-controls="nav-premium" aria-selected="false">
                                        {{ __('translate.Premium') }}
                                    </button>
                                </div>
                            </nav>
                            <div class="package-tab-content bg-white">
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- Basic -->
                                    <div class="tab-pane fade show active" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab" tabindex="0">
                                        <div>
                                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                                <h4 class="package-name fw-semibold">{{ __('translate.Basic') }}</h4>
                                                <h3 class="package-price fw-bold">
                                                    {{ currency($service_package->basic_price) }}</h3>
                                            </div>
                                            <p class="text-dark-200 fs-6">
                                                {{ $service_package->basic_description }}
                                            </p>
                                            <div class="d-flex align-items-center gap-4 pt-2 pb04">
                                                <p class="package-title d-flex gap-2 align-items-center" >
                                                    <svg
                                                      width="18"
                                                      height="18"
                                                      viewBox="0 0 18 18"
                                                      fill="none"
                                                      xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                      <path
                                                        d="M12.2067 10.5894L9.69703 8.70714V4.87293C9.69703 4.48741 9.38541 4.17578 8.99988 4.17578C8.61436 4.17578 8.30273 4.48741 8.30273 4.87293V9.05575C8.30273 9.27534 8.40592 9.48241 8.58159 9.61347L11.3701 11.7049C11.4956 11.799 11.642 11.8443 11.7877 11.8443C12.0003 11.8443 12.2095 11.7488 12.3461 11.5647C12.5776 11.2573 12.5149 10.8202 12.2067 10.5894Z"
                                                        fill="#06131C"
                                                      />
                                                      <path
                                                        d="M9 0C4.0371 0 0 4.0371 0 9C0 13.9629 4.0371 18 9 18C13.9629 18 18 13.9629 18 9C18 4.0371 13.9629 0 9 0ZM9 16.6057C4.80674 16.6057 1.39426 13.1933 1.39426 9C1.39426 4.80674 4.80674 1.39426 9 1.39426C13.194 1.39426 16.6057 4.80674 16.6057 9C16.6057 13.1933 13.1933 16.6057 9 16.6057Z"
                                                        fill="#06131C"
                                                      />
                                                    </svg>
                                                    {{ $service_package->basic_delivery_date }} {{ __('translate.Day Delivery') }}
                                                </p>
                                                <p class="package-title d-flex gap-2 align-items-center" >
                                                    <svg
                                                      width="14"
                                                      height="18"
                                                      viewBox="0 0 14 18"
                                                      fill="none"
                                                      xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                      <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M7.65918 0.000467673C7.63557 -0.000442585 7.61192 -2.38521e-05 7.58836 0.00172189C7.46703 0.0129311 7.35144 0.0590761 7.25535 0.134669L4.71057 2.0599C4.63134 2.11968 4.56702 2.19728 4.52271 2.28655C4.47841 2.37582 4.45534 2.47428 4.45534 2.57413C4.45534 2.67397 4.47841 2.77244 4.52271 2.86171C4.56702 2.95097 4.63134 3.02858 4.71057 3.08836L7.25535 5.01735C7.32198 5.07115 7.39865 5.11087 7.4808 5.13415C7.56295 5.15742 7.6489 5.16377 7.73353 5.15283C7.81817 5.14188 7.89975 5.11386 7.97344 5.07042C8.04712 5.02699 8.11139 4.96904 8.16243 4.90002C8.21346 4.831 8.25022 4.75232 8.2705 4.66866C8.29079 4.585 8.2942 4.49808 8.28051 4.41307C8.26683 4.32806 8.23635 4.2467 8.19087 4.17382C8.14539 4.10095 8.08585 4.03806 8.0158 3.98889L6.99689 3.21629C10.1668 3.21628 12.7264 5.79487 12.7264 8.99448C12.7264 9.16496 12.7935 9.32846 12.9129 9.449C13.0323 9.56955 13.1943 9.63727 13.3632 9.63727C13.5321 9.63727 13.6941 9.56955 13.8135 9.449C13.9329 9.32846 14 9.16496 14 8.99448C14 5.10267 10.8569 1.9347 7.00186 1.93197L8.0158 1.16313C8.12387 1.0845 8.20475 0.973607 8.24704 0.846092C8.28932 0.718577 8.29088 0.580879 8.25148 0.452426C8.21208 0.323972 8.13371 0.211248 8.02744 0.130158C7.92117 0.0490672 7.79236 0.00370371 7.65918 0.000467673ZM0.617556 8.35232C0.452091 8.35726 0.295043 8.42708 0.179744 8.54697C0.0644443 8.66687 -3.14633e-05 8.82739 1.15183e-08 8.99448C1.15183e-08 12.888 3.13957 16.0633 6.99689 16.0633L5.98296 16.8309C5.9129 16.88 5.85336 16.9429 5.80789 17.0158C5.76241 17.0887 5.73192 17.17 5.71824 17.255C5.70456 17.34 5.70796 17.427 5.72825 17.5106C5.74854 17.5943 5.78529 17.673 5.83633 17.742C5.88736 17.811 5.95164 17.869 6.02532 17.9124C6.099 17.9558 6.18059 17.9838 6.26522 17.9948C6.34986 18.0057 6.43581 17.9994 6.51796 17.9761C6.60011 17.9528 6.67678 17.9131 6.74341 17.8593L9.28943 15.9303C9.36795 15.8705 9.43164 15.7931 9.4755 15.7042C9.51935 15.6152 9.54218 15.5173 9.54218 15.418C9.54218 15.3187 9.51935 15.2207 9.4755 15.1318C9.43164 15.0429 9.36795 14.9655 9.28943 14.9056L6.74341 12.9766C6.62554 12.885 6.47956 12.8379 6.33088 12.8437C6.19875 12.849 6.07154 12.8957 5.96696 12.9774C5.86237 13.0591 5.7856 13.1716 5.74733 13.2994C5.70906 13.4271 5.71118 13.5638 5.75341 13.6902C5.79565 13.8167 5.87588 13.9268 5.98296 14.0051L7.00559 14.7777H6.99689C3.82701 14.7777 1.27239 12.1941 1.27239 8.99448C1.2724 8.90855 1.25534 8.82349 1.2222 8.74434C1.18906 8.66519 1.14052 8.59355 1.07946 8.53367C1.0184 8.47379 0.946061 8.42689 0.86672 8.39574C0.787379 8.36459 0.702652 8.34983 0.617556 8.35232Z"
                                                        fill="black"
                                                      />
                                                    </svg>
                                                    {{ $service_package->basic_revision }} {{ __('translate.Revisions') }}
                                                </p>
                                            </div>
                                            <ul class="py-4">
                                                @if ($service_package->basic_fn_website == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Functional website') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">

                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                    {{ __('translate.Functional website') }}
                                                </li>
                                                @endif

                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ $service_package->basic_page }} {{ __('translate.Pages') }}
                                                </li>

                                                @if ($service_package->basic_responsive == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Responsive design') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Responsive design') }}
                                                </li>
                                                @endif @if ($service_package->basic_source_code == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Source file') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Source file') }}
                                                </li>
                                                @endif

                                                @if ($service_package->basic_content_upload == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Content upload') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Content upload') }}
                                                </li>
                                                @endif

                                                @if ($service_package->basic_speed_optimized == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Speed optimization') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Speed optimization') }}
                                                </li>
                                                @endif

                                            </ul>
                                            <div class="mt-3">
                                                <a href="{{ route('payment.pay', ['service_package_id' => $service_package->id, 'package_name' => $service_package->basic_name]) }}" class="w-btn-secondary-xl">
                                                    {{ __('translate.Order Now') }}
                                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Standard -->
                                    <div class="tab-pane fade" id="nav-standard" role="tabpanel" aria-labelledby="nav-standard-tab" tabindex="0">
                                        <div>
                                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                                <h4 class="package-name fw-semibold">{{ __('translate.Standard') }}</h4>
                                                <h3 class="package-price fw-bold">
                                                    {{ currency($service_package->standard_price) }}</h3>
                                            </div>
                                            <p class="text-dark-200 fs-6">
                                                {{ $service_package->standard_description }}
                                            </p>
                                            <div class="d-flex align-items-center gap-4 pt-2 pb04">
                                                <p class="package-title d-flex gap-2 align-items-center" >
                                                    <svg
                                                      width="18"
                                                      height="18"
                                                      viewBox="0 0 18 18"
                                                      fill="none"
                                                      xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                      <path
                                                        d="M12.2067 10.5894L9.69703 8.70714V4.87293C9.69703 4.48741 9.38541 4.17578 8.99988 4.17578C8.61436 4.17578 8.30273 4.48741 8.30273 4.87293V9.05575C8.30273 9.27534 8.40592 9.48241 8.58159 9.61347L11.3701 11.7049C11.4956 11.799 11.642 11.8443 11.7877 11.8443C12.0003 11.8443 12.2095 11.7488 12.3461 11.5647C12.5776 11.2573 12.5149 10.8202 12.2067 10.5894Z"
                                                        fill="#06131C"
                                                      />
                                                      <path
                                                        d="M9 0C4.0371 0 0 4.0371 0 9C0 13.9629 4.0371 18 9 18C13.9629 18 18 13.9629 18 9C18 4.0371 13.9629 0 9 0ZM9 16.6057C4.80674 16.6057 1.39426 13.1933 1.39426 9C1.39426 4.80674 4.80674 1.39426 9 1.39426C13.194 1.39426 16.6057 4.80674 16.6057 9C16.6057 13.1933 13.1933 16.6057 9 16.6057Z"
                                                        fill="#06131C"
                                                      />
                                                    </svg>
                                                    {{ $service_package->standard_delivery_date }} {{ __('translate.Day Delivery') }}
                                                </p>
                                                <p class="package-title d-flex gap-2 align-items-center" >
                                                    <svg
                                                      width="14"
                                                      height="18"
                                                      viewBox="0 0 14 18"
                                                      fill="none"
                                                      xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                      <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M7.65918 0.000467673C7.63557 -0.000442585 7.61192 -2.38521e-05 7.58836 0.00172189C7.46703 0.0129311 7.35144 0.0590761 7.25535 0.134669L4.71057 2.0599C4.63134 2.11968 4.56702 2.19728 4.52271 2.28655C4.47841 2.37582 4.45534 2.47428 4.45534 2.57413C4.45534 2.67397 4.47841 2.77244 4.52271 2.86171C4.56702 2.95097 4.63134 3.02858 4.71057 3.08836L7.25535 5.01735C7.32198 5.07115 7.39865 5.11087 7.4808 5.13415C7.56295 5.15742 7.6489 5.16377 7.73353 5.15283C7.81817 5.14188 7.89975 5.11386 7.97344 5.07042C8.04712 5.02699 8.11139 4.96904 8.16243 4.90002C8.21346 4.831 8.25022 4.75232 8.2705 4.66866C8.29079 4.585 8.2942 4.49808 8.28051 4.41307C8.26683 4.32806 8.23635 4.2467 8.19087 4.17382C8.14539 4.10095 8.08585 4.03806 8.0158 3.98889L6.99689 3.21629C10.1668 3.21628 12.7264 5.79487 12.7264 8.99448C12.7264 9.16496 12.7935 9.32846 12.9129 9.449C13.0323 9.56955 13.1943 9.63727 13.3632 9.63727C13.5321 9.63727 13.6941 9.56955 13.8135 9.449C13.9329 9.32846 14 9.16496 14 8.99448C14 5.10267 10.8569 1.9347 7.00186 1.93197L8.0158 1.16313C8.12387 1.0845 8.20475 0.973607 8.24704 0.846092C8.28932 0.718577 8.29088 0.580879 8.25148 0.452426C8.21208 0.323972 8.13371 0.211248 8.02744 0.130158C7.92117 0.0490672 7.79236 0.00370371 7.65918 0.000467673ZM0.617556 8.35232C0.452091 8.35726 0.295043 8.42708 0.179744 8.54697C0.0644443 8.66687 -3.14633e-05 8.82739 1.15183e-08 8.99448C1.15183e-08 12.888 3.13957 16.0633 6.99689 16.0633L5.98296 16.8309C5.9129 16.88 5.85336 16.9429 5.80789 17.0158C5.76241 17.0887 5.73192 17.17 5.71824 17.255C5.70456 17.34 5.70796 17.427 5.72825 17.5106C5.74854 17.5943 5.78529 17.673 5.83633 17.742C5.88736 17.811 5.95164 17.869 6.02532 17.9124C6.099 17.9558 6.18059 17.9838 6.26522 17.9948C6.34986 18.0057 6.43581 17.9994 6.51796 17.9761C6.60011 17.9528 6.67678 17.9131 6.74341 17.8593L9.28943 15.9303C9.36795 15.8705 9.43164 15.7931 9.4755 15.7042C9.51935 15.6152 9.54218 15.5173 9.54218 15.418C9.54218 15.3187 9.51935 15.2207 9.4755 15.1318C9.43164 15.0429 9.36795 14.9655 9.28943 14.9056L6.74341 12.9766C6.62554 12.885 6.47956 12.8379 6.33088 12.8437C6.19875 12.849 6.07154 12.8957 5.96696 12.9774C5.86237 13.0591 5.7856 13.1716 5.74733 13.2994C5.70906 13.4271 5.71118 13.5638 5.75341 13.6902C5.79565 13.8167 5.87588 13.9268 5.98296 14.0051L7.00559 14.7777H6.99689C3.82701 14.7777 1.27239 12.1941 1.27239 8.99448C1.2724 8.90855 1.25534 8.82349 1.2222 8.74434C1.18906 8.66519 1.14052 8.59355 1.07946 8.53367C1.0184 8.47379 0.946061 8.42689 0.86672 8.39574C0.787379 8.36459 0.702652 8.34983 0.617556 8.35232Z"
                                                        fill="black"
                                                      />
                                                    </svg>
                                                    {{ $service_package->standard_revision }} {{ __('translate.Revisions') }}
                                                </p>
                                            </div>
                                            <ul class="py-4">
                                                @if ($service_package->standard_fn_website == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Functional website') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">

                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                    {{ __('translate.Functional website') }}
                                                </li>
                                                @endif

                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ $service_package->standard_page }} {{ __('translate.Pages') }}
                                                </li>

                                                @if ($service_package->standard_responsive == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Responsive design') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Responsive design') }}
                                                </li>
                                                @endif @if ($service_package->standard_source_code == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Source file') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Source file') }}
                                                </li>
                                                @endif

                                                @if ($service_package->standard_content_upload == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Content upload') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Content upload') }}
                                                </li>
                                                @endif

                                                @if ($service_package->standard_speed_optimized == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Speed optimization') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Speed optimization') }}
                                                </li>
                                                @endif

                                            </ul>
                                            <div class="mt-3">
                                                <a href="{{ route('payment.pay', ['service_package_id' => $service_package->id, 'package_name' => $service_package->standard_name]) }}" class="w-btn-secondary-xl">
                                                {{ __('translate.Order Now') }}
                                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Premium -->
                                    <div class="tab-pane fade" id="nav-premium" role="tabpanel" aria-labelledby="nav-premium-tab" tabindex="0">
                                        <div>
                                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                                <h4 class="package-name fw-semibold">{{ __('translate.Standard') }}</h4>
                                                <h3 class="package-price fw-bold">
                                                    {{ currency($service_package->premium_price) }}</h3>
                                            </div>
                                            <p class="text-dark-200 fs-6">
                                                {{ $service_package->premium_description }}
                                            </p>
                                            <div class="d-flex align-items-center gap-4 pt-2 pb04">
                                                <p class="package-title d-flex gap-2 align-items-center" >
                                                    <svg
                                                      width="18"
                                                      height="18"
                                                      viewBox="0 0 18 18"
                                                      fill="none"
                                                      xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                      <path
                                                        d="M12.2067 10.5894L9.69703 8.70714V4.87293C9.69703 4.48741 9.38541 4.17578 8.99988 4.17578C8.61436 4.17578 8.30273 4.48741 8.30273 4.87293V9.05575C8.30273 9.27534 8.40592 9.48241 8.58159 9.61347L11.3701 11.7049C11.4956 11.799 11.642 11.8443 11.7877 11.8443C12.0003 11.8443 12.2095 11.7488 12.3461 11.5647C12.5776 11.2573 12.5149 10.8202 12.2067 10.5894Z"
                                                        fill="#06131C"
                                                      />
                                                      <path
                                                        d="M9 0C4.0371 0 0 4.0371 0 9C0 13.9629 4.0371 18 9 18C13.9629 18 18 13.9629 18 9C18 4.0371 13.9629 0 9 0ZM9 16.6057C4.80674 16.6057 1.39426 13.1933 1.39426 9C1.39426 4.80674 4.80674 1.39426 9 1.39426C13.194 1.39426 16.6057 4.80674 16.6057 9C16.6057 13.1933 13.1933 16.6057 9 16.6057Z"
                                                        fill="#06131C"
                                                      />
                                                    </svg>
                                                    {{ $service_package->premium_delivery_date }} {{ __('translate.Day Delivery') }}
                                                </p>
                                                <p class="package-title d-flex gap-2 align-items-center" >
                                                    <svg
                                                      width="14"
                                                      height="18"
                                                      viewBox="0 0 14 18"
                                                      fill="none"
                                                      xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                      <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M7.65918 0.000467673C7.63557 -0.000442585 7.61192 -2.38521e-05 7.58836 0.00172189C7.46703 0.0129311 7.35144 0.0590761 7.25535 0.134669L4.71057 2.0599C4.63134 2.11968 4.56702 2.19728 4.52271 2.28655C4.47841 2.37582 4.45534 2.47428 4.45534 2.57413C4.45534 2.67397 4.47841 2.77244 4.52271 2.86171C4.56702 2.95097 4.63134 3.02858 4.71057 3.08836L7.25535 5.01735C7.32198 5.07115 7.39865 5.11087 7.4808 5.13415C7.56295 5.15742 7.6489 5.16377 7.73353 5.15283C7.81817 5.14188 7.89975 5.11386 7.97344 5.07042C8.04712 5.02699 8.11139 4.96904 8.16243 4.90002C8.21346 4.831 8.25022 4.75232 8.2705 4.66866C8.29079 4.585 8.2942 4.49808 8.28051 4.41307C8.26683 4.32806 8.23635 4.2467 8.19087 4.17382C8.14539 4.10095 8.08585 4.03806 8.0158 3.98889L6.99689 3.21629C10.1668 3.21628 12.7264 5.79487 12.7264 8.99448C12.7264 9.16496 12.7935 9.32846 12.9129 9.449C13.0323 9.56955 13.1943 9.63727 13.3632 9.63727C13.5321 9.63727 13.6941 9.56955 13.8135 9.449C13.9329 9.32846 14 9.16496 14 8.99448C14 5.10267 10.8569 1.9347 7.00186 1.93197L8.0158 1.16313C8.12387 1.0845 8.20475 0.973607 8.24704 0.846092C8.28932 0.718577 8.29088 0.580879 8.25148 0.452426C8.21208 0.323972 8.13371 0.211248 8.02744 0.130158C7.92117 0.0490672 7.79236 0.00370371 7.65918 0.000467673ZM0.617556 8.35232C0.452091 8.35726 0.295043 8.42708 0.179744 8.54697C0.0644443 8.66687 -3.14633e-05 8.82739 1.15183e-08 8.99448C1.15183e-08 12.888 3.13957 16.0633 6.99689 16.0633L5.98296 16.8309C5.9129 16.88 5.85336 16.9429 5.80789 17.0158C5.76241 17.0887 5.73192 17.17 5.71824 17.255C5.70456 17.34 5.70796 17.427 5.72825 17.5106C5.74854 17.5943 5.78529 17.673 5.83633 17.742C5.88736 17.811 5.95164 17.869 6.02532 17.9124C6.099 17.9558 6.18059 17.9838 6.26522 17.9948C6.34986 18.0057 6.43581 17.9994 6.51796 17.9761C6.60011 17.9528 6.67678 17.9131 6.74341 17.8593L9.28943 15.9303C9.36795 15.8705 9.43164 15.7931 9.4755 15.7042C9.51935 15.6152 9.54218 15.5173 9.54218 15.418C9.54218 15.3187 9.51935 15.2207 9.4755 15.1318C9.43164 15.0429 9.36795 14.9655 9.28943 14.9056L6.74341 12.9766C6.62554 12.885 6.47956 12.8379 6.33088 12.8437C6.19875 12.849 6.07154 12.8957 5.96696 12.9774C5.86237 13.0591 5.7856 13.1716 5.74733 13.2994C5.70906 13.4271 5.71118 13.5638 5.75341 13.6902C5.79565 13.8167 5.87588 13.9268 5.98296 14.0051L7.00559 14.7777H6.99689C3.82701 14.7777 1.27239 12.1941 1.27239 8.99448C1.2724 8.90855 1.25534 8.82349 1.2222 8.74434C1.18906 8.66519 1.14052 8.59355 1.07946 8.53367C1.0184 8.47379 0.946061 8.42689 0.86672 8.39574C0.787379 8.36459 0.702652 8.34983 0.617556 8.35232Z"
                                                        fill="black"
                                                      />
                                                    </svg>
                                                    {{ $service_package->premium_revision }} {{ __('translate.Revisions') }}
                                                </p>
                                            </div>
                                            <ul class="py-4">
                                                @if ($service_package->premium_fn_website == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Functional website') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">

                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                    {{ __('translate.Functional website') }}
                                                </li>
                                                @endif

                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ $service_package->premium_page }} {{ __('translate.Pages') }}
                                                </li>

                                                @if ($service_package->premium_responsive == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Responsive design') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Responsive design') }}
                                                </li>
                                                @endif @if ($service_package->premium_source_code == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Source file') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Source file') }}
                                                </li>
                                                @endif

                                                @if ($service_package->premium_content_upload == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Content upload') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Content upload') }}
                                                </li>
                                                @endif

                                                @if ($service_package->premium_speed_optimized == 'yes')
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                        <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                                        <path
                                                            d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                                            fill="#06131C" /></svg>{{ __('translate.Speed optimization') }}
                                                </li>
                                                @else
                                                <li class="fs-6 d-flex align-items-center gap-3 text-dark-200">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="14" height="14" rx="7" fill="#EDEBE7"/>
                                                    <path d="M9.41422 5.00003L5 9.41425M9.41422 9.41422L5 5" stroke="#28303F" stroke-width="1.1705" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                {{ __('translate.Speed optimization') }}
                                                </li>
                                                @endif

                                            </ul>
                                            <div class="mt-3">
                                                <a href="{{ route('payment.pay', ['service_package_id' => $service_package->id, 'package_name' => $service_package->premium_name]) }}" class="w-btn-secondary-xl">
                                                    {{ __('translate.Order Now') }}
                                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="freelancer-sidebar-card p-4 rounded-4 bg-white position-relative">
                            <div class="job-type-badge position-absolute d-flex flex-column gap-2">
                                @if ($seller->is_top_seller == 'enable')
                                <p class="job-type-badge-tertiary">{{ __('translate.Top Seller') }}</p>
                                @endif

                                <p class="job-type-badge-secondary">
                                    {{ currency(html_decode($seller->hourly_payment)) }}/{{ __('translate.hr') }}</p>
                            </div>
                            <div class="freelancer-sidebar-card-header border-bottom d-flex flex-column justify-content-center align-items-center py-4">
                                <div class="custom-reletive">
                                    @if ($seller->image)
                                        <img class="freelancer-avatar rounded-circle mb-4" src="{{ asset($seller->image) }}" alt="" />
                                    @else
                                        <img class="freelancer-avatar rounded-circle mb-4" src="{{ asset($general_setting->default_avatar) }}" alt="" />
                                    @endif

                                    @if ($seller->online_status == 1)
                                        @if ($seller->online == 1)
                                            <span class="online-indicator"></span>
                                        @endif
                                    @endif
                                </div>
                                <h3 class="fw-bold freelancer-name text-dark-300 mb-2 relative">
                                    <a href="" class="">
                                        {{ html_decode($seller->name) }}
                                    </a>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                                        <path
                                            d="M11.1141 4.15628C11.0407 3.92385 10.8406 3.75929 10.6048 3.73731L7.38803 3.43649L6.11676 0.370622C6.0229 0.145376 5.80934 0 5.57163 0C5.33392 0 5.12027 0.145376 5.02701 0.370622L3.75574 3.43649L0.538508 3.73731C0.302669 3.75973 0.102963 3.92429 0.0291678 4.15628C-0.0442024 4.3887 0.0235566 4.64364 0.201923 4.80478L2.63351 7.0011L1.91656 10.2539C1.8641 10.493 1.95422 10.7403 2.14687 10.8838C2.25042 10.9613 2.37208 11 2.49417 11C2.59908 11 2.70407 10.9713 2.79785 10.9135L5.57163 9.20504L8.3449 10.9135C8.54835 11.0387 8.80417 11.0272 8.99639 10.8838C9.18904 10.7403 9.27916 10.493 9.22671 10.2539L8.50975 7.0011L10.9413 4.80478C11.1196 4.64364 11.1875 4.38923 11.1141 4.15628Z"
                                            fill="#06131C" />
                                    </svg>
                                    <span class="text-dark-300">{{ sprintf("%.1f", $seller->avg_rating) }} </span>
                                    <span class="text-dark-200"> ({{ $seller->total_rating }}
                                        {{ __('translate.Reviews') }})</span>
                                </p>
                            </div>
                            <div class="d-flex gap-4 justify-content-between sidebar-rate-card p-4">
                                <div>
                                    <p class="text-dark-300 mb-2">{{ __('translate.Service') }}</p>
                                    <p class="text-dark-200">{{ $total_service }}</p>
                                </div>
                                <div>
                                    <p class="text-dark-300 mb-2">{{ __('translate.Rate') }}</p>
                                    <p class="text-dark-200">
                                        {{ currency(html_decode($seller->hourly_payment)) }}/{{ __('translate.hr') }}</p>
                                </div>
                                <div>
                                    <p class="text-dark-300 mb-2">{{ __('translate.Jobs') }}</p>
                                    <p class="text-dark-200">{{ $total_job_done }}</p>
                                </div>
                            </div>
                            <div class="d-grid">
                                <a href="{{ route('freelancer', $seller->username) }}" class="w-btn-black-lg w-100">
                                    {{ __('translate.View Profile') }}
                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 9L13 5M13 5L9 1M13 5L1 5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>

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
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Details End -->
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
