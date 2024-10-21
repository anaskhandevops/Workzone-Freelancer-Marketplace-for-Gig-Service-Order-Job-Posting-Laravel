@extends('buyer.layout')
@section('title')
    <title>{{ __('translate.Buyer || Order Details') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Page Header -->
      <div
        class="d-flex gap-4 flex-column flex-md-row align-items-md-center justify-content-between"
      >
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">
            {{ __('translate.Order Details') }}
          </h3>
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
            <li class="text-lime-300 fs-6">{{ __('translate.My Orders') }}</li>
          </ul>
        </div>

      </div>
      <!-- Content -->
      <div>
        <div class="row row-gap-4">
          <!-- Order Info -->
          <div class="col-lg-4 col-md-6">
            <div class="info-card-wrapper">
              <div class="info-card-header">
                <h4 class="info-card-title">{{ __('translate.Order Information') }}</h4>
              </div>
              <div class="info-card-body">
                <div>
                  <p class="info-card-subtitle">{{ __('translate.Basic Information') }}</p>
                  <ul class="info-card-list">
                    <li
                      class="d-flex justify-content-between align-items-center info-card-list-item"
                    >
                      <p>{{ __('translate.Order ID') }}:</p>
                      <p>#{{ $order->order_id }}</p>
                    </li>
                    <li
                      class="d-flex info-card-list-item justify-content-between align-items-center"
                    >
                      <p>{{ __('translate.Created At') }}:</p>
                      <p>{{ $order->created_at->format('d M Y') }}</p>
                    </li>
                    <li
                      class="d-flex info-card-list-item justify-content-between align-items-center"
                    >
                      <p>{{ __('translate.Delivery Date') }}:</p>
                      <p>{{ \Carbon\Carbon::parse($order->created_at)->addDays($order->delivery_date)->format('d M Y') }}</p>
                    </li>
                    <li
                      class="d-flex info-card-list-item justify-content-between align-items-center"
                    >
                      <p>{{ __('translate.Revision') }}:</p>
                      <p>{{ $order->revision }}</p>
                    </li>
                  </ul>
                </div>

                <div>
                  <p class="info-card-subtitle">{{ __('translate.Payment Information') }}</p>
                  <ul class="info-card-list">
                    <li
                      class="d-flex justify-content-between align-items-center info-card-list-item"
                    >
                      <p>{{ __('translate.Payment Status:') }}</p>
                      @if ($order->payment_status == 'success')
                      <p class="payment-success">{{ __('translate.Success') }}</p>
                        @else
                        <p class="payment-pending">{{ __('translate.Pending') }}</p>
                      @endif
                    </li>
                    <li
                      class="d-flex info-card-list-item justify-content-between align-items-center"
                    >
                      <p>{{ __('translate.Payment Gateway') }}:</p>
                      <p>{{ $order->payment_method }}</p>
                    </li>
                    <li
                      class="d-flex info-card-list-item justify-content-between align-items-center"
                    >
                      <p>{{ __('translate.Total') }}:</p>
                      <p>{{ currency($order->total_amount) }}</p>
                    </li>
                    <li
                      class="d-flex info-card-list-item justify-content-between align-items-center"
                    >
                      <p>{{ __('translate.Transaction') }}:</p>
                      {!! clean($order->transaction_id) !!}
                    </li>

                  </ul>
                </div>
                <div>
                  <p class="info-card-subtitle">{{ __('translate.Order Status') }}</p>
                  <ul class="info-card-list">
                    <li
                      class="d-flex justify-content-between align-items-center info-card-list-item"
                    >
                      <p>{{ __('translate.Status') }}:</p>
                        @if ($order->approved_by_seller == 'approved')
                            @if ($order->order_status == 'approved_by_seller')
                                <span class="status-badge in-progress">
                                    {{ __('translate.In-Progress') }}
                                </span>
                            @elseif($order->completed_by_buyer == 'complete')
                                <span class="status-badge in-progress">
                                    {{ __('translate.Complete') }}
                                </span>
                            @elseif($order->order_status == 'cancel_by_seller')
                                <span class="status-badge pending">
                                    {{ __('translate.Cancel by Seller') }}
                                </span>
                            @elseif($order->order_status == 'cancel_by_buyer')
                                <span class="status-badge pending">
                                    {{ __('translate.Cancel by Buyer') }}
                                </span>

                            @endif

                        @elseif ($order->approved_by_seller == 'rejected')
                            <span class="status-badge pending">
                                {{ __('translate.Rejected by Seller') }}
                            </span>
                        @elseif ($order->order_status == 'cancel_by_buyer')
                            <span class="status-badge pending">
                                {{ __('translate.Cancel by Buyer') }}
                            </span>
                        @else
                            <span class="status-badge pending">
                                {{ __('translate.Awaiting for Approval') }}
                            </span>
                        @endif
                    </li>
                  </ul>

                    @if($order->approved_by_seller == 'approved')

                        @if ($order->order_status == 'approved_by_seller')

                            <div class="d-flex gap-3 align-items-center">
                              <button type="button" class="w-btn-secondary-lg" id="completeOrderBtn">
                                {{ __('translate.Complete Order') }}
                            </button>

                             <button type="button" class="w-btn-secondary-lg rejected_btn" id="cancelOrderBtn">
                                {{ __('translate.Cancel Order') }}
                            </button>
                            </div>

                            <form action="{{ route('buyer.order-complete', $order->id) }}" class="hidden" method="POST" id="completeForm">
                                    @csrf
                            </form>




                            <form action="{{ route('buyer.order-cancel', $order->id) }}" class="hidden" method="POST" id="cancelForm">
                                    @csrf
                            </form>
                        @endif
                    @elseif($order->approved_by_seller == 'pending')

                        @if ($order->order_status != 'cancel_by_buyer' )
                            <button type="button" class="w-btn-secondary-lg rejected_btn" id="cancelOrderBtn">
                                {{ __('translate.Cancel Order') }}
                            </button>
                            <form action="{{ route('buyer.order-cancel', $order->id) }}" class="hidden" method="POST" id="cancelForm">
                                    @csrf
                            </form>
                        @endif

                    @endif

                    @if ($order->order_status == 'cancel_by_seller' || $order->order_status == 'cancel_by_buyer' || $order->approved_by_seller == 'rejected')


                      @if (checkModule('Wallet') && checkModule('Refund'))

                            @if ($refund_available)
                              <a href="" class="w-btn-secondary-lg mt-3" data-bs-toggle="modal"
                              data-bs-target="#refundRequest{{ $refund->id }}">
                                {{ __('translate.Refund Request') }}
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="14"
                                  height="10"
                                  viewBox="0 0 14 10"
                                  fill="none"
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

                              @include('refund::buyer.refund_show')
                            @else
                              <a href="" class="w-btn-secondary-lg mt-3" data-bs-toggle="modal"
                              data-bs-target="#refundRequestModal">
                                {{ __('translate.Refund Request') }}
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  width="14"
                                  height="10"
                                  viewBox="0 0 14 10"
                                  fill="none"
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

                              @include('refund::buyer.refund_form')
                            @endif

                      @endif
                    @endif

                </div>
              </div>
            </div>
          </div>
          <!-- Service Info -->
          <div class="col-lg-4 col-md-6">
            <div class="info-card-wrapper">
              <div class="info-card-header">
                <h4 class="info-card-title">{{ __('translate.Service & Package Information') }}</h4>
              </div>
              <div class="info-card-body">
                <div>
                  <p class="info-card-subtitle">{{ __('translate.Service & Package') }}</p>
                  <div class="info-card-list">
                    <div class="d-flex justify-content-between gap-5 info-card-list-item" >
                      <div class="flex-shrink-0 w-25">
                        <p>{{ __('translate.Service') }}:</p>
                      </div>
                      <div class="w-75">
                        <p class="info-text">
                            <a href="{{ route('service', $order?->listing?->slug) }}">
                                {{ html_decode($order?->listing?->title) }}
                            </a>
                        </p>
                      </div>
                    </div>

                  </div>
                  <div class="info-card-list">
                    <div class="d-flex justify-content-between gap-5">
                      <div class="d-flex w-25">
                        <p>{{ __('translate.Package') }}:</p>
                      </div>
                      <ul class="w-75">

                        @if ($order->fn_website == 'yes')
                            <li class="d-flex gap-2 align-items-center service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                    <path
                                        d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                        fill="#06131C" /></svg>{{ __('translate.Functional website') }}
                            </li>
                        @endif

                        <li class="d-flex gap-2 align-items-center service-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                <path
                                    d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                    fill="#06131C" /></svg>{{ $order->number_of_page }} {{ __('translate.Pages') }}
                        </li>

                        @if ($order->responsive == 'yes')
                            <li class="d-flex gap-2 align-items-center service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                    <path
                                        d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                        fill="#06131C" /></svg>{{ __('translate.Responsive design') }}
                            </li>
                        @endif

                        @if ($order->source_code == 'yes')
                            <li class="d-flex gap-2 align-items-center service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                    <path
                                        d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                        fill="#06131C" /></svg>{{ __('translate.Source file') }}
                            </li>

                        @endif

                        @if ($order->content_upload == 'yes')
                            <li class="d-flex gap-2 align-items-center service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                    <path
                                        d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                        fill="#06131C" /></svg>{{ __('translate.Content upload') }}
                            </li>
                        @endif

                        @if ($order->speed_optimized == 'yes')
                            <li class="d-flex gap-2 align-items-center service-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <rect width="14" height="14" rx="7" fill="#EDEBE7" />
                                    <path
                                        d="M10.9989 4.56984C11.0104 4.74646 10.9288 4.88498 10.8005 5.00444C9.44356 6.26706 8.08607 7.52917 6.72804 8.79076C6.43121 9.06522 6.10773 9.07037 5.8109 8.80209C5.26037 8.30466 4.71781 7.79934 4.18322 7.28612C4.12574 7.2337 4.07992 7.17091 4.04845 7.10145C4.01699 7.03199 4.00052 6.95727 4.00001 6.88169C3.99951 6.80612 4.01497 6.7312 4.0455 6.66138C4.07603 6.59155 4.12101 6.52821 4.17778 6.4751C4.40938 6.25368 4.7758 6.24441 5.03403 6.4751C5.33956 6.74338 5.63204 7.02659 5.92724 7.30363C6.25941 7.61259 6.25887 7.61259 6.60137 7.2959C7.68178 6.29109 8.76237 5.28749 9.84314 4.28508C9.92373 4.20401 10.0151 4.13322 10.115 4.07447C10.2055 4.02511 10.3083 3.99942 10.4127 4.00001C10.5172 4.0006 10.6196 4.02747 10.7095 4.07785C10.7995 4.12824 10.8736 4.20034 10.9245 4.28678C10.9753 4.37322 11.001 4.47091 10.9989 4.56984Z"
                                        fill="#06131C" /></svg>{{ __('translate.Speed optimization') }}
                            </li>

                        @endif

                      </ul>
                    </div>
                  </div>


                  @if ($order->submit_file)
                  <a href="{{ route('download-submission-file', $order->submit_file) }}" class="w-btn-secondary-lg mt-3">
                    {{ __('translate.Download Submission File') }}
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="14"
                      height="10"
                      viewBox="0 0 14 10"
                      fill="none"
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
                  @endif

                </div>
              </div>
            </div>
          </div>

          <!-- Freelancer Info -->
          <div class="col-lg-4 col-md-6">
            <div class="info-card-wrapper">
              <div class="info-card-header">
                <h4 class="info-card-title">{{ __('translate.Freelancer Info') }}</h4>
              </div>
              <div class="info-card-body">
                <div class="d-flex align-items-center gap-4 pb-3">
                    @if ($seller->image)
                        <img src="{{ asset($seller->image) }}" class="seller-avatar" alt="" />
                    @else
                        <img src="{{ asset($general_setting->default_avatar) }}" class="seller-avatar" alt="" />
                    @endif

                  <div>
                    <h3 class="card-seller-name">
                      {{ html_decode($seller->name) }} <span>({{ html_decode($seller->designation) }})</span>
                    </h3>
                    <p class="seller-location">{{ html_decode($seller->address) }}</p>
                  </div>
                </div>
                <ul class="seller-info-list">
                  <li class="d-flex align-items-center seller-info-list-item justify-content-between">
                    <div class="d-flex gap-2 align-items-center">
                      <svg
                        width="24"
                        height="20"
                        viewBox="0 0 24 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M20.7083 19H3.29167C2.0285 19 1 17.878 1 16.5V3.5C1 2.122 2.0285 1 3.29167 1H20.7083C21.9715 1 23 2.122 23 3.5V16.5C23 17.878 21.9715 19 20.7083 19ZM3.29167 2C2.53358 2 1.91667 2.673 1.91667 3.5V16.5C1.91667 17.327 2.53358 18 3.29167 18H20.7083C21.4664 18 22.0833 17.327 22.0833 16.5V3.5C22.0833 2.673 21.4664 2 20.7083 2H3.29167Z"
                          fill="#22BE0D"
                          stroke="#22BE0D"
                          stroke-width="0.4"
                        />
                        <path
                          d="M7.86589 10C6.60272 10 5.57422 8.878 5.57422 7.5C5.57422 6.122 6.60272 5 7.86589 5C9.12905 5 10.1576 6.122 10.1576 7.5C10.1576 8.878 9.12905 10 7.86589 10ZM7.86589 6C7.1078 6 6.49089 6.673 6.49089 7.5C6.49089 8.327 7.1078 9 7.86589 9C8.62397 9 9.24089 8.327 9.24089 7.5C9.24089 6.673 8.62397 6 7.86589 6Z"
                          fill="#22BE0D"
                          stroke="#22BE0D"
                          stroke-width="0.4"
                        />
                        <path
                          d="M11.5378 15C11.2848 15 11.0794 14.776 11.0794 14.5V13.5C11.0794 12.673 10.4625 12 9.70443 12H6.03776C5.27968 12 4.66276 12.673 4.66276 13.5V14.5C4.66276 14.776 4.45743 15 4.20443 15C3.95143 15 3.74609 14.776 3.74609 14.5V13.5C3.74609 12.122 4.77459 11 6.03776 11H9.70443C10.9676 11 11.9961 12.122 11.9961 13.5V14.5C11.9961 14.776 11.7908 15 11.5378 15Z"
                          fill="#22BE0D"
                          stroke="#22BE0D"
                          stroke-width="0.4"
                        />
                        <path
                          d="M19.7904 7H14.2904C14.0374 7 13.832 6.776 13.832 6.5C13.832 6.224 14.0374 6 14.2904 6H19.7904C20.0434 6 20.2487 6.224 20.2487 6.5C20.2487 6.776 20.0434 7 19.7904 7Z"
                          fill="#22BE0D"
                          stroke="#22BE0D"
                          stroke-width="0.4"
                        />
                        <path
                          d="M19.7904 11H14.2904C14.0374 11 13.832 10.776 13.832 10.5C13.832 10.224 14.0374 10 14.2904 10H19.7904C20.0434 10 20.2487 10.224 20.2487 10.5C20.2487 10.776 20.0434 11 19.7904 11Z"
                          fill="#22BE0D"
                          stroke="#22BE0D"
                          stroke-width="0.4"
                        />
                        <path
                          d="M19.7904 15H14.2904C14.0374 15 13.832 14.776 13.832 14.5C13.832 14.224 14.0374 14 14.2904 14H19.7904C20.0434 14 20.2487 14.224 20.2487 14.5C20.2487 14.776 20.0434 15 19.7904 15Z"
                          fill="#22BE0D"
                          stroke="#22BE0D"
                          stroke-width="0.4"
                        />
                      </svg>
                      <p>{{ __('translate.Member Since') }}</p>
                    </div>
                    <div>
                      <p>{{ $seller->created_at->format('d M Y') }}</p>
                    </div>
                  </li>
                  <li
                    class="d-flex align-items-center seller-info-list-item justify-content-between"
                  >
                    <div class="d-flex gap-2 align-items-center">
                      <svg
                        width="21"
                        height="19"
                        viewBox="0 0 21 19"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M13.3631 16.7452C12.4735 16.216 11.5826 15.6859 10.6825 15.1558C10.554 15.0667 10.367 14.9715 10.1291 14.9715C9.88947 14.9715 9.70154 15.068 9.5729 15.1577C7.85382 16.1907 6.10057 17.2238 4.37895 18.2248C4.5041 17.7102 4.623 17.1967 4.74096 16.6871L4.74146 16.685C4.87748 16.0975 5.01226 15.5154 5.15581 14.934C5.266 14.5012 5.3668 14.0694 5.4659 13.645L5.4666 13.6419C5.56659 13.2136 5.66488 12.7927 5.77181 12.3728C5.8097 12.224 5.8306 12.0267 5.75144 11.813C5.68105 11.623 5.55658 11.495 5.48845 11.4281L5.47111 11.4111L5.45254 11.3954C4.6744 10.7381 3.90507 10.0806 3.1341 9.42176L3.13347 9.42122C2.36818 8.7672 1.60127 8.11179 0.825209 7.45617C0.824879 7.45586 0.82455 7.45555 0.82422 7.45525C1.05609 7.43191 1.27752 7.41488 1.51488 7.41488H1.54594L1.57685 7.41192C2.37038 7.33593 3.1273 7.27304 3.89355 7.20937C4.60007 7.15067 5.31453 7.09131 6.07291 7.02041L6.08226 7.01954L6.09158 7.01839C6.3886 6.98195 6.63917 6.95202 6.8829 6.95202C7.0652 6.95202 7.26744 6.90534 7.4451 6.7697C7.60511 6.64753 7.6927 6.49313 7.74114 6.36414C8.15605 5.40774 8.56196 4.4603 8.96719 3.51443L8.96746 3.5138C9.34757 2.62657 9.72709 1.74071 10.1138 0.847947C10.3123 1.30393 10.511 1.76715 10.7105 2.23228L10.7108 2.23293C10.9282 2.73974 11.1465 3.24883 11.365 3.74933L11.365 3.74934L11.3676 3.75512C11.5633 4.19178 11.7507 4.63844 11.9417 5.09366L11.9432 5.09723C12.1296 5.54169 12.3195 5.99436 12.5187 6.43975C12.5675 6.56784 12.6549 6.72013 12.8131 6.84091C12.9789 6.96752 13.1662 7.01662 13.3386 7.0226C13.9171 7.07561 14.4947 7.11989 15.0715 7.16378L15.1409 7.16906C15.7036 7.21186 16.2658 7.25463 16.8357 7.3055L16.8357 7.30556L16.8446 7.30622C17.3096 7.34134 17.7847 7.38532 18.2663 7.42991L18.2691 7.43018C18.6421 7.46472 19.019 7.49963 19.393 7.5304C19.3919 7.53153 19.3907 7.53265 19.3896 7.53377C17.8802 8.83884 16.3702 10.1094 14.8565 11.3831C14.7318 11.4784 14.5723 11.6351 14.5012 11.8794C14.4341 12.1101 14.4745 12.3193 14.5297 12.4741C14.762 13.4569 14.9944 14.4484 15.227 15.4405C15.4462 16.376 15.6657 17.3122 15.8851 18.2413C15.0401 17.743 14.2022 17.2445 13.3631 16.7452Z"
                          stroke="#22BE0D"
                          stroke-width="1.3"
                        />
                      </svg>
                      <p>{{ __('translate.Reviews') }}</p>
                    </div>
                    <div>
                      <p>{{ $seller->total_rating }}</p>
                    </div>
                  </li>
                  <li
                    class="d-flex align-items-center seller-info-list-item justify-content-between"
                  >
                    <div class="d-flex gap-2 align-items-center">
                      <svg
                        width="21"
                        height="21"
                        viewBox="0 0 21 21"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <mask
                          id="mask0_2545_15584"
                        class="mask-type"
                          maskUnits="userSpaceOnUse"
                          x="0"
                          y="0"
                          width="21"
                          height="21"
                        >
                          <path
                            d="M20.0167 20.016V0.649267H0.65V20.016H20.0167Z"
                            fill="white"
                            stroke="white"
                            stroke-width="1.3"
                          />
                        </mask>
                        <g mask="url(#mask0_2545_15584)">
                          <path
                            d="M12.1536 5.08858H18.3243C19.3943 5.08858 20.2618 5.95602 20.2618 7.02609V17.5176C20.2618 18.5876 19.3943 19.4551 18.3243 19.4551H2.33985C1.26978 19.4551 0.402344 18.5876 0.402344 17.5176V7.02609C0.402344 5.95602 1.26978 5.08858 2.33985 5.08858H8.52078"
                            stroke="#22BE0D"
                            stroke-width="1.3"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M20.2618 8.31394C20.2618 10.4479 18.5319 12.1777 16.398 12.1777H4.26614C2.13221 12.1777 0.402344 10.4479 0.402344 8.31394"
                            stroke="#22BE0D"
                            stroke-width="1.3"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M10.3444 14.6914C9.49727 14.6914 8.81055 14.0047 8.81055 13.1575V10.9148C8.81055 10.6301 9.04131 10.3993 9.326 10.3993H11.3628C11.6475 10.3993 11.8783 10.6301 11.8783 10.9148V13.1575C11.8783 14.0047 11.1915 14.6914 10.3444 14.6914Z"
                            stroke="#22BE0D"
                            stroke-width="1.3"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M5.32812 5.08789V3.14703C5.32812 2.07696 6.19556 1.20952 7.26563 1.20952H13.4011C14.4711 1.20952 15.3386 2.07696 15.3386 3.14703V5.08789"
                            stroke="#22BE0D"
                            stroke-width="1.3"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                          <path
                            d="M5.32812 3.14844H15.3386"
                            stroke="#22BE0D"
                            stroke-width="1.3"
                            stroke-miterlimit="10"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          />
                        </g>
                      </svg>
                      <p>{{ __('translate.Total Job') }}</p>
                    </div>
                    <div>
                      <p>{{ $total_job }}</p>
                    </div>
                  </li>
                </ul>

                @if ($order->completed_by_buyer == 'complete')
                    @if ($review_exist == 0)
                        <button type="button" class="w-btn-secondary-lg" data-bs-toggle="modal"
                        data-bs-target="#reviewModal">
                            {{ __('translate.Write Review') }}
                    </button>

                    @endif
                @endif


              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="jobDetailsModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="bg-white p-lg-5 rounded-3">
                    <div class="proposal-container">
                        <div class="proposal-header">
                            <h3 class="text-dark-300 text-24 fw-bold">{{ __('translate.Write Your Feedback') }}</h3>
                        </div>
                        <form action="{{ route('buyer.store-review', $order->id) }}" method="POST">
                            @csrf

                            <div class="d-flex flex-column gap-4">

                                <div class="proposal-input-container">
                                    <label for="rating" class="proposal-form-label" >{{ __('translate.Rating') }}*</label >
                                    <select name="rating" id="rating" class="form-select shadow-none" >
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="proposal-input-container">
                                    <label for="time" class="proposal-form-label" >{{ __('translate.Review') }}*</label >
                                    <textarea placeholder="{{ ('Write Something') }}" class="form-textarea shadow-none" name="review"></textarea>
                                </div>


                                <div class="d-flex gap-4 align-items-center justify-content-end" >
                                    <button type="button" class="w-btn-gray-sm" data-bs-dismiss="modal">
                                        {{ __('translate.Cancel') }}
                                    </button>
                                    <button  class="w-btn-secondary-sm">
                                        {{ __('translate.Submit Review') }}
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




@endsection


@push('js_section')
<script src="{{ asset('global/sweetalert/sweetalert2@11.js') }}"></script>


<script>
    (function($) {
        "use strict"
        $(document).ready(function () {

            $('#completeOrderBtn').on('click', function(){
                Swal.fire({
                    title: "{{ __('translate.Are you really want to complete the order?') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('translate.Yes, Complete It') }}",
                    cancelButtonText: "{{ __('translate.Cancel') }}",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#completeForm").submit();
                    }

                })
            });



            $('#cancelOrderBtn').on('click', function(){
                Swal.fire({
                    title: "{{ __('translate.Are you really want to cancel the order?') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('translate.Yes, Cancel It') }}",
                    cancelButtonText: "{{ __('translate.Cancel') }}",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#cancelForm").submit();
                    }

                })
            });


        });
    })(jQuery);


</script>

@endpush
