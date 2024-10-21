@extends('layout')

@section('title')
    <title>{{ $custom_page->page_name }}</title>
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
                    <h2 class="section-title-light mb-2">{{ $custom_page->page_name }}</h2>
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb w-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $custom_page->page_name }}
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
    <section class="py-110">
      <div class="container">
        <div>
          <div class="row">
            <div class="co-auto">
              <div class="legal-content">
                <div class="content-details">
                {!! clean($custom_page->description) !!}
              </div>
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
