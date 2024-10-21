@extends('layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('front-content')
<!-- Main Start -->
<main class="bg-offWhite">

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
                        <h2 class="section-title-light mb-2">{{ __('translate.Privacy Policy') }}</h2>
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb w-breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                            {{ __('translate.Privacy Policy') }}
                            </li>
                        </ol>
                        </nav>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb End -->

    <!-- Content -->
    <section class="py-110 legal-content">
      <div class="container">
        <div>
          <div class="row">
            <div class="co-auto">
              <div class="content-details">

                {!! clean($privacy_policy->description) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Job Grid End -->
  </main>
  <!-- Main End -->
@endsection
