@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || Manage Service') }}</title>
@endsection
@section('front-content')
 <!-- Main -->
 <main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Header -->
      <div
        class="d-flex gap-3 flex-column flex-md-row align-items-md-center justify-content-between"
      >
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Manage Service') }}</h3>
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
            <li class="text-lime-300 fs-6">{{ __('translate.Manage Service') }}</li>
          </ul>
        </div>
        <div>
          <a href="{{ route('seller.listing.create') }}" class="w-btn-secondary-lg">
            {{ __('translate.Create Service') }}
          </a>
        </div>
      </div>
      <!-- Content -->
      <div>
        <!-- Tab Nav -->
        <nav>
          <div
            class="d-flex flex-wrap gap-3 align-items-center"
            id="nav-tab"
            role="tablist"
          >
            <button
              class="dashboard-tab-btn active"
              id="nav-all-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-all"
              type="button"
              role="tab"
              aria-controls="nav-all"
              aria-selected="true"
            >
              {{ __('translate.All') }}({{ $services->count() }})
            </button>

            <button
              class="dashboard-tab-btn"
              id="nav-active-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-active"
              type="button"
              role="tab"
              aria-controls="nav-active"
              aria-selected="false"
            >
              {{ __('translate.Active') }}({{ $active_services->count() }})
            </button>
            <button
              class="dashboard-tab-btn"
              id="nav-pending-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-pending"
              type="button"
              role="tab"
              aria-controls="nav-pending"
              aria-selected="false"
            >
            {{ __('translate.Pending') }}({{ $pending_services->count() }})
            </button>

          </div>
        </nav>
        <!-- Tab Content -->
        <div class="tab-content mt-4" id="nav-tabContent">
          <!-- All -->
          <div
            class="tab-pane fade show active"
            id="nav-all"
            role="tabpanel"
            aria-labelledby="nav-all-tab"
            tabindex="0"
          >
          <div>
            @if ($services->count() > 0)
                <div
                class="row "
                >
                @foreach ($services as $index => $service)
                <article class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-card bg-white admin-end">
                    <div class="position-relative service-thumb">
                        <img
                        src="{{ asset($service->thumb_image) }}"
                        class="recently-view-card-img w-100"
                        alt=""
                        />


                        <button class="service-card-wishlist-btn" onclick="deleteService('{{ $service->id }}')">

                            <form action="{{ route('seller.listing.destroy', $service->id) }}" id="remove_service_{{ $service->id }}" class="d-none" method="POST">
                                @csrf
                                @method('DELETE')

                            </form>


                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.273 11.814C16.651 12.216 16.632 12.849 16.23 13.228L13.184 16.095C12.615 16.657 11.859 16.939 11.1 16.939C10.341 16.939 9.578 16.656 8.996 16.087L7.81 15.046C7.395 14.681 7.355 14.049 7.719 13.635C8.086 13.22 8.717 13.18 9.13 13.544L10.355 14.621C10.782 15.035 11.412 15.036 11.795 14.654L14.857 11.77C15.259 11.393 15.891 11.411 16.271 11.813L16.273 11.814ZM22 5C22 5.553 21.553 6 21 6H20V19C20 21.757 17.757 24 15 24H9C6.243 24 4 21.757 4 19V6H3C2.447 6 2 5.553 2 5C2 4.447 2.447 4 3 4H6.101C6.566 1.721 8.586 0 11 0H13C15.414 0 17.435 1.721 17.899 4H21C21.553 4 22 4.447 22 5ZM8.172 4H15.828C15.415 2.836 14.304 2 13 2H11C9.696 2 8.585 2.836 8.172 4ZM18 6H6V19C6 20.654 7.346 22 9 22H15C16.654 22 18 20.654 18 19V6Z" fill="#22BE0D"/>
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
                                fill="#22BE0D"
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
                        class="d-flex align-items-center service-card-author style-two"
                        >
                            @if ($service?->seller?->image)
                                <img src="{{ asset($service?->seller?->image) }}" class="service-card-author-img" alt="" />
                            @else
                                <img src="{{ asset($general_setting->default_avatar) }}" class="service-card-author-img" alt="" />
                            @endif

                            <a href="{{ route('freelancer', $service?->seller?->username) }}" class="service-card-author-name">{{ html_decode($service?->seller?->name) }}</a>
                        </div>
                    </div>
                    <div
                        class="px-3 pb-3 d-flex justify-content-between align-items-center"
                    >
                        <div class="d-flex align-items-center gap-2">
                        <div>
                            <span>{{ __('translate.Status') }}</span>
                        </div>
                        <div class="form-check gig-status form-switch m-0" onclick="changeStatus('{{ $service->id }}')">
                            <input
                                class="form-check-input shadow-none"
                                type="checkbox"
                                role="switch"
                                id="flexSwitchCheckChecked"
                                {{ $service->status == 'enable' ? 'checked' : '' }}
                            />
                            </div>
                        </div>
                        <div class='flex-shrink-0'>
                        <a href="{{ route('seller.listing.edit', ['listing' => $service->id, 'lang_code' => admin_lang()]) }}" class="gig-edit-btn">{{ __('translate.Edit Service') }}</a>
                        </div>
                    </div>
                    </div>
                </article>
                @endforeach
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-7">
                    <div>
                        <div
                        class="bg-white p-5 rounded-3 d-flex justify-content-center align-items-center"
                        >
                        <div class="d-flex flex-column align-items-center">
                            <img
                            src="{{ asset($general_setting->empty_image) }}"
                            class="img-fluid mb-5"
                            alt=""
                            />
                            <h3 class="text-24 fw-bold text-dark-300 m-2">
                            {{ __('translate.Service Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any service') }}
                            <span class="text-dark-300">{{ __('translate.Thank you') }}</span>
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endif

          </div>

          </div>
          <!-- Active -->
          <div
            class="tab-pane fade"
            id="nav-active"
            role="tabpanel"
            aria-labelledby="nav-active-tab"
            tabindex="0"
          >
            <div>
                @if($active_services->count() > 0)
                    <div    class="row" >
                        @foreach ($active_services as $index => $service)
                        <article class="col-md-6 col-lg-4 col-xl-3">
                        <div class="service-card bg-white admin-end">
                            <div class="position-relative service-thumb">
                            <img
                                src="{{ asset($service->thumb_image) }}"
                                class="recently-view-card-img w-100"
                                alt=""
                            />
                            <button class="service-card-wishlist-btn" onclick="deleteService('{{ $service->id }}')">

                                <form action="{{ route('seller.listing.destroy', $service->id) }}" id="remove_service_{{ $service->id }}" class="d-none" method="POST">
                                    @csrf
                                    @method('DELETE')

                                </form>
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
                                    stroke="#22BE0D"
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
                                    fill="#22BE0D"
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
                                class="d-flex align-items-center service-card-author style-two"
                            >
                                @if ($service?->seller?->image)
                                    <img src="{{ asset($service?->seller?->image) }}" class="service-card-author-img" alt="" />
                                @else
                                    <img src="{{ asset($general_setting->default_avatar) }}" class="service-card-author-img" alt="" />
                                @endif

                                <a href="{{ route('freelancer', $service?->seller?->username) }}" class="service-card-author-name">{{ html_decode($service?->seller?->name) }}</a>
                            </div>
                            </div>
                            <div
                            class="px-3 pb-3 d-flex justify-content-between align-items-center"
                            >
                            <div class="d-flex align-items-center gap-2">
                                <div>
                                <span>{{ __('translate.Status') }}</span>
                                </div>
                                <div class="form-check gig-status form-switch m-0" onclick="changeStatus('{{ $service->id }}')">
                                    <input
                                        class="form-check-input shadow-none"
                                        type="checkbox"
                                        role="switch"
                                        id="flexSwitchCheckChecked"
                                        {{ $service->status == 'enable' ? 'checked' : '' }}
                                    />
                                    </div>
                            </div>
                            <div class='flex-shrink-0'>
                                <a href="{{ route('seller.listing.edit', ['listing' => $service->id, 'lang_code' => admin_lang()]) }}" class="gig-edit-btn">{{ __('translate.Edit Service') }}</a>
                            </div>
                            </div>
                        </div>
                        </article>
                        @endforeach
                    </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-7">
                        <div>
                            <div
                            class="bg-white p-5 rounded-3 d-flex justify-content-center align-items-center"
                            >
                            <div class="d-flex flex-column align-items-center">
                                <img
                                src="{{ asset($general_setting->empty_image) }}"
                                class="img-fluid mb-5"
                                alt=""
                                />
                                <h3 class="text-24 fw-bold text-dark-300 m-2">
                                {{ __('translate.Service Empty') }}
                                </h3>
                                <p class="fs-6 text-dark-200 text-center">
                                {{ __('translate.You do not have any active service') }}
                                <span class="text-dark-300">{{ __('translate.Thank you') }}</span>
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif

            </div>
          </div>
          <!-- Pending -->
          <div
            class="tab-pane fade"
            id="nav-pending"
            role="tabpanel"
            aria-labelledby="nav-pending-tab"
            tabindex="0"
          >
            <div>
                @if($pending_services->count() > 0)
                <div    class="row" >
                    @foreach ($pending_services as $index => $service)
                    <article class="col-md-6 col-lg-4 col-xl-3">
                        <div class="service-card admin-end bg-white">
                            <div class="position-relative service-thumb">
                            <img
                                src="{{ asset($service->thumb_image) }}"
                                class="recently-view-card-img w-100"
                                alt=""
                            />
                            <button class="service-card-wishlist-btn" onclick="deleteService('{{ $service->id }}')">

                                <form action="{{ route('seller.listing.destroy', $service->id) }}" id="remove_service_{{ $service->id }}" class="d-none" method="POST">
                                    @csrf
                                    @method('DELETE')

                                </form>
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
                                    stroke="#22BE0D"
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
                                    fill="#22BE0D"
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
                                class="d-flex align-items-center service-card-author style-two"
                            >
                                @if ($service?->seller?->image)
                                    <img src="{{ asset($service?->seller?->image) }}" class="service-card-author-img" alt="" />
                                @else
                                    <img src="{{ asset($general_setting->default_avatar) }}" class="service-card-author-img" alt="" />
                                @endif

                                <a href="{{ route('freelancer', $service?->seller?->username) }}" class="service-card-author-name">{{ html_decode($service?->seller?->name) }}</a>
                            </div>
                            </div>
                            <div
                            class="px-3 pb-3 d-flex justify-content-between align-items-center"
                            >
                            <div class="d-flex align-items-center gap-2">
                                <div>
                                <span>{{ __('translate.Status') }}</span>
                                </div>
                                <div class="form-check gig-status form-switch m-0" onclick="changeStatus('{{ $service->id }}')">
                                <input
                                    class="form-check-input shadow-none"
                                    type="checkbox"
                                    role="switch"
                                    id="flexSwitchCheckChecked"
                                    {{ $service->status == 'enable' ? 'checked' : '' }}
                                />
                                </div>
                            </div>
                            <div class='flex-shrink-0'>
                                <a href="{{ route('seller.listing.edit', ['listing' => $service->id, 'lang_code' => admin_lang()]) }}" class="gig-edit-btn">{{ __('translate.Edit Service') }}</a>
                            </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-7">
                    <div>
                        <div
                        class="bg-white p-5 rounded-3 d-flex justify-content-center align-items-center"
                        >
                        <div class="d-flex flex-column align-items-center">
                            <img
                            src="{{ asset($general_setting->empty_image) }}"
                            class="img-fluid mb-5"
                            alt=""
                            />
                            <h3 class="text-24 fw-bold text-dark-300 m-2">
                            {{ __('translate.Service Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any pending service') }}
                            <span class="text-dark-300">{{ __('translate.Thank you') }}</span>
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endif
            </div>
          </div>
          <!-- Complete -->

        </div>
      </div>
    </div>
  </main>

@endsection



@push('js_section')
    <script src="{{ asset('global/sweetalert/sweetalert2@11.js') }}"></script>

    <script>
        "use strict";

        function changeStatus(id){

            var appMODE = "{{ env('APP_MODE') }}"
            if(appMODE == 'DEMO'){
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }

            $.ajax({
                type:"put",
                data: { _token : '{{ csrf_token() }}' },
                url:"{{url('/seller/listing-status/') }}"+"/"+id,
                success:function(response){
                    toastr.success(response)
                },
                error:function(err){}
            })
        }

        function deleteService(id){
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
                    $("#remove_service_"+id).submit();
                }

            })
        }


    </script>



@endpush
