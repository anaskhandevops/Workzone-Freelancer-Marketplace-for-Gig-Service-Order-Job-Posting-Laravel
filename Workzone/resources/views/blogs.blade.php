@extends('layout') @section('title')
<title>{{ $seo_setting->seo_title }}</title>
<meta name="title" content="{{ $seo_setting->seo_title }}" />
<meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}" />
@endsection @section('front-content')
<!-- Main Start -->
<main>
    <!-- Breadcrumb -->
    <section class="w-breadcrumb-area" style="background-image: url({{ asset($general_setting->breadcrumb_image) }});">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="position-relative z-2" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="linear">
                        <h2 class="section-title-light mb-2">{{ __('translate.Our Blogs') }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb w-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('translate.Our Blogs') }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Blog Post Start -->
    <section class="py-110 bg-offWhite">
        <div class="container">
            @if ($blogs->count() > 0)
            <div class="row row-gap-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-2">
                @foreach ($blogs as $index => $blog)
                <article class="col-xl-3 col-lg-4 col-md-6">
                    <div class="blog-card">
                            <a href="{{ route('blog', $blog->slug) }}" class="d-block blog-thumb-wrapper position-relative">
                                <img src="{{ asset($blog->image) }}" class="img-fluid blog-thumb w-100" alt="" />
                                 <span class="blog-date position-absolute">{{ $blog->created_at->format('d-m-Y') }}</span>
                            </a>                  
                        <div class="blog-meta">
                            <div class="d-flex justify-content-between mb-3">
                                <p class="d-flex align-items-center gap-2 text-dark-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" viewBox="0 0 12 15" fill="none">
                                        <path
                                            d="M1.761 14.9996C1.55973 14.9336 1.35152 14.8896 1.16065 14.7978C0.397206 14.4272 -0.02963 13.6273 0.00160193 12.743C0.0397743 11.6936 0.275749 10.7103 0.765049 9.7966C1.42439 8.56373 2.36829 7.65741 3.59327 7.07767C3.67309 7.04098 3.7529 7.00428 3.85007 6.95658C2.68061 5.9512 2.17396 4.67062 2.43422 3.10017C2.58691 2.18285 3.03804 1.42698 3.72514 0.847238C5.24163 -0.42967 7.34458 -0.216852 8.60773 1.1738C9.36424 2.00673 9.70779 3.01211 9.61757 4.16426C9.52734 5.31642 9.01375 6.23374 8.14619 6.94924C8.33359 7.04098 8.50363 7.11436 8.6702 7.20609C10.1485 8.006 11.1618 9.24254 11.6997 10.9011C11.9253 11.5945 12.0328 12.3137 11.9912 13.0476C11.9357 14.0163 11.2243 14.8235 10.3151 14.9703C10.2908 14.974 10.2665 14.9886 10.2387 14.9996C7.41051 14.9996 4.58575 14.9996 1.761 14.9996ZM6.00507 13.8475C7.30293 13.8475 8.60079 13.8401 9.89518 13.8512C10.5684 13.8548 10.9571 13.3338 10.9015 12.7577C10.8807 12.5486 10.8773 12.3394 10.846 12.1303C10.6309 10.6185 9.92294 9.41133 8.72225 8.5784C7.17106 7.50331 5.50883 7.3602 3.84313 8.23349C2.05944 9.16916 1.15718 10.7506 1.09125 12.8568C1.08778 13.0072 1.12595 13.1723 1.18494 13.3044C1.36193 13.6934 1.68466 13.8438 2.08026 13.8438C3.392 13.8475 4.70027 13.8475 6.00507 13.8475ZM5.99119 6.53462C7.38969 6.54195 8.53833 5.33843 8.54527 3.85238C8.55221 2.37733 7.41745 1.16647 6.00507 1.15179C4.62046 1.13344 3.45794 2.35531 3.45099 3.8377C3.44405 5.31275 4.58922 6.52728 5.99119 6.53462Z"
                                            fill="#22BE0D"
                                        />
                                    </svg>
                                    {{ $blog?->author?->name }}
                                </p>
                                <p class="d-flex align-items-center gap-2 text-dark-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                        <path
                                            d="M2.73636 12.2097C2.29706 12.1117 1.89189 11.9498 1.52936 11.6985C0.552676 11.0211 0.0238162 10.0839 0.0110212 8.89528C-0.0103037 7.06341 -0.00603875 5.23154 0.00675625 3.39968C0.0238162 1.68284 1.23934 0.298285 2.94108 0.038416C3.11168 0.0128551 3.29081 0.00433481 3.46567 0.00433481C6.15688 0.00433481 8.8481 7.46544e-05 11.5393 0.00433481C13.2069 0.00859496 14.5717 1.10771 14.9172 2.73083C14.9684 2.97366 14.9897 3.22501 14.9897 3.47636C14.994 5.25284 14.9982 7.03359 14.994 8.81007C14.9897 10.5141 13.8637 11.8944 12.2047 12.2139C11.9701 12.2608 11.7312 12.2693 11.4924 12.2693C10.2939 12.2736 9.09973 12.2736 7.90127 12.2693C7.77332 12.2693 7.66669 12.2991 7.56007 12.3716C6.33175 13.1938 5.10343 14.0117 3.87511 14.8339C3.71731 14.9404 3.55097 15.0171 3.35478 14.9958C2.98799 14.9575 2.74489 14.6848 2.74062 14.3014C2.73636 13.6752 2.74062 13.0447 2.74062 12.4184C2.73636 12.3545 2.73636 12.2906 2.73636 12.2097ZM4.09262 13.0447C4.16939 12.9978 4.21631 12.9637 4.26322 12.9339C5.1802 12.3247 6.09717 11.7155 7.00988 11.0978C7.20607 10.9657 7.40226 10.9103 7.63684 10.9103C8.94193 10.9146 10.2428 10.9146 11.5478 10.9103C12.742 10.9061 13.6334 10.0114 13.6334 8.81433C13.6334 7.02507 13.6334 5.2358 13.6334 3.44654C13.6334 2.26222 12.7378 1.36332 11.5521 1.36332C8.85663 1.36332 6.15688 1.36332 3.46141 1.36332C2.27147 1.36332 1.37582 2.26222 1.37582 3.45506C1.37582 5.24006 1.37582 7.02081 1.37582 8.80581C1.37582 9.97309 2.2075 10.8464 3.37611 10.9061C3.84952 10.9316 4.09262 11.183 4.09689 11.6559C4.09262 12.1074 4.09262 12.5547 4.09262 13.0447Z"
                                            fill="#22BE0D"
                                        />
                                        <path
                                            d="M7.48415 5.45717C6.13641 5.45717 4.79293 5.45717 3.4452 5.45717C2.93766 5.45717 2.60499 4.99707 2.77559 4.54124C2.87795 4.26433 3.0912 4.12374 3.38122 4.09392C3.4324 4.08966 3.48784 4.08966 3.53902 4.08966C6.17906 4.08966 8.81483 4.08966 11.4549 4.08966C11.57 4.08966 11.6894 4.09818 11.8003 4.13226C12.1159 4.23025 12.2993 4.5455 12.2524 4.88631C12.2098 5.1973 11.9283 5.44865 11.5956 5.45291C11.2118 5.46143 10.8279 5.45291 10.4483 5.45291C9.46311 5.45717 8.47363 5.45717 7.48415 5.45717Z"
                                            fill="#22BE0D"
                                        />
                                        <path
                                            d="M7.48349 8.17944C6.58784 8.17944 5.69646 8.1837 4.80507 8.17944C4.32739 8.17518 4.01178 7.7875 4.11841 7.34019C4.18238 7.05902 4.42975 6.84601 4.71977 6.82897C4.76242 6.82471 4.80507 6.82471 4.84772 6.82471C6.6177 6.82471 8.39194 6.82471 10.1619 6.82471C10.5586 6.82471 10.8272 7.02919 10.8955 7.37427C10.9765 7.78324 10.6822 8.16666 10.2643 8.17944C9.88895 8.19222 9.50937 8.1837 9.12978 8.1837C8.5796 8.17944 8.03368 8.17944 7.48349 8.17944Z"
                                            fill="#22BE0D"
                                        />
                                    </svg>
                                    {{ $blog->total_comment }} {{ __('translate.Comment') }}
                                </p>
                            </div>
                            <h3 class="blog-title fw-bold mb-3">
                                <a href="{{ route('blog', $blog->slug) }}">
                                    {{ $blog->title }}
                                </a>
                            </h3>
                            <a href="{{ route('blog', $blog->slug) }}" class="blog-link d-flex gap-3 align-items-center text-dark-200">
                                {{ __('translate.Learn More') }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none">
                                    <path
                                        d="M12.6222 4.38176C12.5582 4.38176 12.4984 4.38176 12.4344 4.38176C8.56253 4.38176 4.69065 4.38176 0.818766 4.38176C0.716312 4.38176 0.613859 4.37785 0.515674 4.40129C0.195508 4.4677 -0.0307435 4.76459 0.00340761 5.05758C0.0418276 5.37791 0.30223 5.60839 0.643741 5.62793C0.712043 5.63183 0.780345 5.63183 0.852917 5.63183C4.71199 5.63183 8.57534 5.63183 12.4344 5.63183C12.4984 5.63183 12.5582 5.63183 12.6649 5.63183C12.5966 5.69824 12.5582 5.73731 12.5155 5.77637C11.38 6.8194 10.2402 7.86243 9.10468 8.90546C8.82293 9.16329 8.79305 9.51878 9.03211 9.77661C9.27117 10.0383 9.68525 10.0774 9.9798 9.86646C10.0268 9.8352 10.0652 9.79614 10.1079 9.75707C11.6489 8.34684 13.19 6.93269 14.7268 5.51855C15.0982 5.17868 15.0982 4.83882 14.7268 4.49895C13.1772 3.077 11.6233 1.65504 10.0737 0.229173C9.86881 0.0416613 9.63829 -0.0481873 9.35228 0.0260353C8.8827 0.147137 8.7034 0.670605 9.0065 1.01437C9.04492 1.06125 9.09187 1.10032 9.13883 1.14329C10.2658 2.1746 11.3885 3.20982 12.5198 4.24113C12.5625 4.28019 12.618 4.29972 12.6649 4.33098C12.6479 4.34269 12.6351 4.36223 12.6222 4.38176Z"
                                        fill="currentColor"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            @else
            <!-- Listing Not Found Start -->
            <section class="bg-offWhite">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="p-lg-5 p-3 rounded-3 not-found-img d-flex flex-column flex-wrap align-items-center">
                                <img src="{{ asset($general_setting->not_found) }}" class="img-fluid" alt="listing-not-found" />
                            </div>
                            <div class="text-center">
                                <h2 class="section-title fw-semibold mb-3 mb-2">{{ __('translate.Sorry!! Blog Not Found') }}</h2>
                                <p class="mb-4">{{ __('translate.Whoops... this information is not available for a moment') }}</p>
                                <a href="{{ route('blogs') }}" class="w-btn-secondary-lg d-inline-flex">{{ __('translate.Back To Blogs') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Listing Not Found End -->
            @endif @if($blogs->hasPages())
            <!-- Pagination -->
            <div class="row justify-content-center mt-5">
                <div class="col-auto">
                    {{ $blogs->links('custom_pagination') }}
                </div>
            </div>
            @endif
        </div>
    </section>
    <!-- Blog Post End -->
</main>
<!-- Main End -->

@endsection
