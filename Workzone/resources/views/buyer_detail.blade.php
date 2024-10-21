@extends('layout')
@section('title')
<title>{{ __('translate.Profile') }} || {{ html_decode($buyer->name) }}</title>
<meta name="title" content="{{ html_decode($buyer->name) }}">
    <meta name="description" content="{{ html_decode($buyer->name) }}">
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
                    <h2 class="section-title-light mb-2">{{ __('translate.Buyer Profile') }}</h2>
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb w-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        {{ __('translate.Buyer Profile') }}
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
            <aside class="freelancer-details-sidebar d-flex flex-column gap-4">
                <div class="freelancer-sidebar-card p-4 rounded-4 bg-white position-relative">
                    <div class="freelancer-sidebar-card-header d-flex flex-column justify-content-center align-items-center py-4">
                        @if ($buyer->image)
                        <img class="freelancer-avatar rounded-circle mb-4" src="{{ asset($buyer->image) }}" alt="" />
                        @else
                        <img class="freelancer-avatar rounded-circle mb-4" src="{{ asset($general_setting->default_avatar) }}" alt="" />
                        @endif


                    <h3 class="fw-bold freelancer-name text-dark-300 mb-2">
                        {{ html_decode($buyer->name) }}
                    </h3>
                    <p class="text-dark-200 mb-1">{{ html_decode($buyer->designation) }}</p>
                    </div>
                    <div class="d-flex justify-content-center sidebar-rate-card bg-offWhite py-4 rounded-4">
                    <div class="border-end px-4">
                        <p class="text-dark-300">{{ __('translate.Jobs') }}</p>
                        <p class="text-dark-200">{{ $total_job }}</p>
                    </div>
                    <div class="px-4">
                        <p class="text-dark-300">{{ __('translate.Hired') }}</p>
                        <p class="text-dark-200">{{ $total_hired }}</p>
                    </div>
                    </div>
                    <ul class="py-4">
                    <li class="py-1 d-flex justify-content-between align-items-center">
                        <p class="text-dark-200">{{ __('translate.Location') }}:</p>
                        <p class="text-dark-300 fw-medium">{{ html_decode($buyer->address) }}</p>
                    </li>
                    <li class="py-1 d-flex justify-content-between align-items-center">
                        <p class="text-dark-200">{{ __('translate.Member Since') }}:</p>
                        <p class="text-dark-300 fw-medium">{{ $buyer->created_at->format('F Y') }}</p>
                    </li>
                    <li class="py-1 d-flex justify-content-between align-items-center">
                        <p class="text-dark-200">{{ __('translate.Gender') }}:</p>
                        <p class="text-dark-300 fw-medium">{{ html_decode($buyer->gender) }}</p>
                    </li>

                    </ul>

                </div>
                <div class="freelancer-sidebar-card p-4 rounded-4 bg-white">
                    <div class="freelancer-single-info  pb-4">
                        <h4 class="freelancer-sidebar-title text-dark-300 fw-semibold">
                            {{ __('translate.About') }}
                        </h4>
                        <p class="text-dark-200 fs-6">
                            {{ html_decode($buyer->about_me) }}
                        </p>
                    </div>

                    <div class="freelancer-single-info pt-4">
                        <h4
                          class="freelancer-sidebar-title text-dark-300 fw-semibold"
                        >
                          {{ __('translate.Language') }}
                        </h4>
                        @if ($buyer->language)

                            <ul>
                                @foreach (json_decode(html_decode($buyer->language)) as $language)
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
                  {{ __('translate.Job Posts') }}
                </button>

              </div>
              <div class="freelancer-tab-content for_buyer">
                <div class="tab-content" id="nav-tabContent">
                  <!-- Services -->
                  <div class="tab-pane fade show active" id="nav-service" role="tabpanel" aria-labelledby="nav-service-tab" tabindex="0" >
                  <div class="row row-gap-4 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">

                    @foreach ($job_posts as $job_post)
                    <article>
                        <div class="job-post bg-white position-relative">
                        <div class="job-type-badge position-absolute d-flex flex-column gap-2" >
                            <p class="job-type-badge-tertiary">
                                @if ($job_post->job_type == 'Hourly')
                                    {{ __('translate.Hourly') }}
                                @elseif ($job_post->job_type == 'Daily')
                                {{ __('translate.Daily') }}
                                @elseif ($job_post->job_type == 'Monthly')
                                {{ __('translate.Monthly') }}
                                @elseif ($job_post->job_type == 'Yearly')
                                {{ __('translate.Yearly') }}
                                @endif
                            </p>
                            @if ($job_post->is_urgent == 'enable')
                            <p class="job-type-badge-secondary">{{ __('translate.Urgent') }}</p>
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="job-post-icon">
                                <img src="{{ asset($job_post->thumb_image) }}" alt="" />
                            </div>
                            <p class="job-post-subtitle fw-normal">{{ __('translate.From') }} - {{ currency($job_post?->listing_package?->basic_price) }}</p>
                            <h3 class="job-post-title fw-semibold">
                                <a href="{{ route('job-post', $job_post->slug) }}">
                                    {{ html_decode($job_post->title) }}
                                </a>
                            </h3>
                            <a href="{{ route('job-post', ['slug' => $job_post->slug, 'is_apply' => 'yes']) }}" class="w-btn-primary-lg">
                                {{ __('translate.Apply Now') }}
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
@endsection
