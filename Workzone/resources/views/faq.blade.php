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
                    <h2 class="section-title-light mb-2">{{ __('translate.FAQ') }}</h2>
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb w-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        {{ __('translate.FAQ') }}
                        </li>
                    </ol>
                    </nav>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Faq -->
    <section class="py-110 bg-offWhite">
      <div class="container">
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
                        data-bs-parent="#accordionFlushExample">
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
