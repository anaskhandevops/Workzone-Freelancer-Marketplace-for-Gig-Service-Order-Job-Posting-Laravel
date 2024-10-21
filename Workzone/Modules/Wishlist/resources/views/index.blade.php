@extends('buyer.layout')
@section('title')
    <title>{{ __('translate.Buyer || Wishlist') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Page Header -->
      <div
        class="d-flex gap-4 flex-column flex-md-row align-items-md-center justify-content-between"
      >
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Wishlist') }}</h3>
          <ul class="d-flex align-items-center gap-2">
            <li class="text-dark-200 fs-6">{{ __('translate.Dashboard') }}</li>
            <li>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="5"
                height="11"
                viewBox="0 0 5 11"
                fill="none"
              >
                <path
                  d="M1 10L4 5.5L1 1"
                  stroke="#5B5B5B"
                  stroke-width="1.2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </li>
            <li class="text-lime-300 fs-6">{{ __('translate.Wishlist') }}</li>
          </ul>
        </div>

      </div>
      <!-- Content -->
      <div>
        {{-- item section --}}
         @if ($services->count() > 0)
        <div
            class="row"
          >
                @foreach ($services as $service)
                    <article class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div
                        class="service-card bg-white"
                        data-aos="fade-up"
                        data-aos-duration="1000"
                        data-aos-easing="linear"
                        >
                        <div class="position-relative recently-view-card-thumb">
                        <img
                            src="{{ asset($service->thumb_image) }}"
                            class="recently-view-card-img w-100"
                            alt=""
                        />
                        <button class="service-card-wishlist-btn" onclick="removeWishlist('{{ $service->id }}')">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.68026 1.51314L9.00022 2.24375L8.32017 1.51315C6.44229 -0.504381 3.39763 -0.504382 1.51974 1.51314C-0.358143 3.53067 -0.358144 6.80172 1.51974 8.81925L7.64013 15.3947C8.39128 16.2018 9.60915 16.2018 10.3603 15.3947L16.4807 8.81925C18.3586 6.80172 18.3586 3.53067 16.4807 1.51314C14.6028 -0.504381 11.5581 -0.504381 9.68026 1.51314Z" fill="#22BE0D"/>
                            </svg>

                        </button>
                        </div>
                        <div class="service-card-content">
                        <div class="d-flex align-items-center justify-content-between" >
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
                        <div class="d-flex align-items-center service-card-author">

                            @if ($service?->seller?->image)
                                <img src="{{ asset($service?->seller?->image) }}" class="service-card-author-img" alt="" />
                            @else
                                <img src="{{ asset($general_setting->default_avatar) }}" class="service-card-author-img" alt="" />
                            @endif

                            <a href="{{ route('freelancer', $service?->seller?->username) }}" class="service-card-author-name">{{ html_decode($service?->seller?->name) }}</a>

                        </div>
                        </div>
                    </div>
                    <form action="{{ route('buyer.wishlist.destroy', $service->id) }}" class="d-none" method="post" id="remove_listing_{{ $service->id }}">
                        @csrf
                        @method('DELETE')

                    </form>

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
                        <div class="text-center">
                            <h2 class="section-title fw-semibold mb-3 mb-2">{{ __('translate.Sorry!! Wishlist Item Not Found') }}</h2>
                            <p class="mb-4">{{ __('translate.Whoops... Do not have any item to your wishlist') }}</p>
                            <a href="{{ route('services') }}" class="w-btn-secondary-lg d-inline-flex"
                              >{{ __('translate.Go to Services') }}</a
                            >
                        </div>


                        </div>
                    </div>
                    </div>
                </section>
                <!-- Listing Not Found End -->
            @endif
      </div>
    </div>
  </main>


@endsection




@push('js_section')
<script src="{{ asset('global/sweetalert/sweetalert2@11.js') }}"></script>


<script>
    "use strict";
        function removeWishlist(id){
            Swal.fire({
                title: "{{ __('translate.Are you realy want to delete this item ?') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('translate.Yes, Delete It') }}",
                cancelButtonText: "{{ __('translate.Cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#remove_listing_"+id).submit();
                }

            })
        }
    </script>


@endpush
