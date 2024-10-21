@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || My Orders') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Page Header -->
      <div
        class="d-flex gap-4 flex-column flex-md-row align-items-md-center justify-content-between"
      >
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.My Orders') }}</h3>
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
              {{ __('translate.All') }}({{ $orders->count() }})
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
              {{ __('translate.Active') }}({{ $active_orders->count() }})
            </button>
            <button
              class="dashboard-tab-btn"
              id="nav-empty-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-empty"
              type="button"
              role="tab"
              aria-controls="nav-empty"
              aria-selected="false"
            >
              {{ __('translate.Awaiting') }}({{ $awaiting_orders->count() }})</button
            ><button
              class="dashboard-tab-btn"
              id="nav-completed-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-completed"
              type="button"
              role="tab"
              aria-controls="nav-completed"
              aria-selected="false"
            >
              {{ __('translate.Rejected') }}({{ $rejected_orders->count() }})</button
            ><button
              class="dashboard-tab-btn"
              id="nav-close-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-close"
              type="button"
              role="tab"
              aria-controls="nav-close"
              aria-selected="false"
            >
              {{ __('translate.Cancel') }}({{ $cancel_orders->count() }})
            </button>

            <button
              class="dashboard-tab-btn"
              id="nav-complete-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-complete"
              type="button"
              role="tab"
              aria-controls="nav-complete"
              aria-selected="false"
            >
              {{ __('translate.Complete') }}({{ $complete_orders->count() }})
            </button>


          </div>
        </nav>
        <!-- Tab Content -->
        <div class="tab-content mt-4" id="nav-tabContent">
          <!-- All -->
          <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0" >
            <div>
                @if ($orders->count() > 0)
                    <div class="overflow-x-auto">
                        <div class="w-100">
                        <table class="w-100 dashboard-table">
                            <thead class="pb-3">
                            <tr>
                                <th scope="col" class="ps-4">{{ __('translate.Service') }}</th>
                                <th scope="col">{{ __('translate.Amount') }}</th>
                                <th scope="col">{{ __('translate.Status') }}</th>
                                <th scope="col">{{ __('translate.Freelancer') }}</th>
                                <th scope="col">{{ __('translate.Delivery Date') }}</th>
                                <th scope="col" class="pe-4 text-end">{{ __('translate.Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>
                                        <div class="d-flex gap-3 align-items-center project-name" >
                                            <div class="order-img">
                                                <a href="{{ route('service', $order?->listing?->slug) }}">
                                                    <img  src="{{ asset($order?->listing?->thumb_image) }}"  alt="" />
                                                </a>
                                            </div>
                                            <div>
                                            <p class="text-dark-200">
                                                <a href="{{ route('service', $order?->listing?->slug) }}">
                                                    {{ html_decode($order?->listing?->title) }}
                                                </a>

                                            </p>
                                            <ul class="d-flex gap-1 order-category">
                                                <li class="text-dark-200">{{ html_decode($order?->listing?->category?->name) }}</li>

                                            </ul>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="text-dark-200">{{ currency($order->total_amount) }}</td>
                                        <td>
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

                                        </td>
                                        <td class="text-dark-200">{{ html_decode($order?->seller?->name) }}</td>

                                        <td class="text-dark-200">
                                            {{ \Carbon\Carbon::parse($order->created_at)->addDays($order->delivery_date)->format('d M Y') }}

                                        </td>

                                        <td>
                                        <div class="d-flex justify-content-end gap-2">

                                            <a href="{{ route('seller.order', $order->order_id) }}" class="dashboard-action-btn" >
                                                <svg
                                                    width="26"
                                                    height="19"
                                                    viewBox="0 0 26 19"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                    d="M23.3187 6.66195C24.6716 8.08537 24.6716 10.248 23.3187 11.6714C21.0369 14.0721 17.1181 17.3333 12.6667 17.3333C8.21523 17.3333 4.29641 14.0721 2.01466 11.6714C0.661781 10.248 0.661781 8.08537 2.01466 6.66195C4.29641 4.26122 8.21523 1 12.6667 1C17.1181 1 21.0369 4.26122 23.3187 6.66195Z"
                                                    stroke="#5B5B5B"
                                                    stroke-width="1.5"
                                                    />
                                                    <circle
                                                    cx="12.668"
                                                    cy="9.16699"
                                                    r="3.5"
                                                    stroke="#5B5B5B"
                                                    stroke-width="1.5"
                                                    />
                                                </svg>
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
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
                                {{ __('translate.Order Empty') }}
                                </h3>
                                <p class="fs-6 text-dark-200 text-center">
                                {{ __('translate.You do not have any active order') }}
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
          <div class="tab-pane fade" id="nav-active" role="tabpanel" aria-labelledby="nav-active-tab" tabindex="0" >
            <div>
                @if ($active_orders->count() > 0)
                <div class="overflow-x-auto">
                    <div class="w-100">
                    <table class="w-100 dashboard-table">
                        <thead class="pb-3">
                        <tr>
                            <th scope="col" class="ps-4">{{ __('translate.Service') }}</th>
                            <th scope="col">{{ __('translate.Amount') }}</th>
                            <th scope="col">{{ __('translate.Status') }}</th>
                            <th scope="col">{{ __('translate.Freelancer') }}</th>
                            <th scope="col">{{ __('translate.Delivery Date') }}</th>
                            <th scope="col" class="pe-5 text-end">{{ __('translate.Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($active_orders as $index => $order)
                                <tr>
                                    <td>
                                    <div class="d-flex gap-3 align-items-center project-name" >
                                        <div class="order-img">
                                            <a href="{{ route('service', $order?->listing?->slug) }}">
                                                <img  src="{{ asset($order?->listing?->thumb_image) }}"  alt="" />
                                            </a>
                                        </div>
                                        <div>
                                        <p class="text-dark-200">
                                            <a href="{{ route('service', $order?->listing?->slug) }}">
                                                {{ html_decode($order?->listing?->title) }}
                                            </a>

                                        </p>
                                        <ul class="d-flex gap-1 order-category">
                                            <li class="text-dark-200">{{ html_decode($order?->listing?->category?->name) }}</li>

                                        </ul>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="text-dark-200">{{ currency($order->total_amount) }}</td>
                                    <td>
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

                                    </td>
                                    <td class="text-dark-200">{{ html_decode($order?->seller?->name) }}</td>

                                    <td class="text-dark-200">
                                        {{ \Carbon\Carbon::parse($order->created_at)->addDays($order->delivery_date)->format('d M Y') }}

                                    </td>

                                    <td>
                                    <div class="d-flex justify-content-end gap-2">

                                        <a href="{{ route('seller.order', $order->order_id) }}" class="dashboard-action-btn" >
                                            <svg
                                                width="26"
                                                height="19"
                                                viewBox="0 0 26 19"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                d="M23.3187 6.66195C24.6716 8.08537 24.6716 10.248 23.3187 11.6714C21.0369 14.0721 17.1181 17.3333 12.6667 17.3333C8.21523 17.3333 4.29641 14.0721 2.01466 11.6714C0.661781 10.248 0.661781 8.08537 2.01466 6.66195C4.29641 4.26122 8.21523 1 12.6667 1C17.1181 1 21.0369 4.26122 23.3187 6.66195Z"
                                                stroke="#5B5B5B"
                                                stroke-width="1.5"
                                                />
                                                <circle
                                                cx="12.668"
                                                cy="9.16699"
                                                r="3.5"
                                                stroke="#5B5B5B"
                                                stroke-width="1.5"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
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
                            {{ __('translate.Order Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any order') }}
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
          <!-- Empty -->
          <div class="tab-pane fade" id="nav-empty" role="tabpanel" aria-labelledby="nav-empty-tab" tabindex="0" >
                <div>
                    @if ($awaiting_orders->count() > 0)
                        <div class="overflow-x-auto">
                            <div class="w-100">
                            <table class="w-100 dashboard-table">
                                <thead class="pb-3">
                                <tr>
                                    <th scope="col" class="ps-4">{{ __('translate.Service') }}</th>
                                    <th scope="col">{{ __('translate.Amount') }}</th>
                                    <th scope="col">{{ __('translate.Status') }}</th>
                                    <th scope="col">{{ __('translate.Freelancer') }}</th>
                                    <th scope="col">{{ __('translate.Delivery Date') }}</th>
                                    <th scope="col" class="pe-5 text-end">{{ __('translate.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($awaiting_orders as $index => $order)
                                        <tr>
                                            <td>
                                            <div class="d-flex gap-3 align-items-center project-name" >
                                                <div class="order-img">
                                                    <a href="{{ route('service', $order?->listing?->slug) }}">
                                                        <img  src="{{ asset($order?->listing?->thumb_image) }}"  alt="" />
                                                    </a>
                                                </div>
                                                <div>
                                                <p class="text-dark-200">
                                                    <a href="{{ route('service', $order?->listing?->slug) }}">
                                                        {{ html_decode($order?->listing?->title) }}
                                                    </a>

                                                </p>
                                                <ul class="d-flex gap-1 order-category">
                                                    <li class="text-dark-200">{{ html_decode($order?->listing?->category?->name) }}</li>

                                                </ul>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="text-dark-200">{{ currency($order->total_amount) }}</td>
                                            <td>
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

                                            </td>
                                            <td class="text-dark-200">{{ html_decode($order?->seller?->name) }}</td>

                                            <td class="text-dark-200">
                                                {{ \Carbon\Carbon::parse($order->created_at)->addDays($order->delivery_date)->format('d M Y') }}

                                            </td>

                                            <td>
                                            <div class="d-flex justify-content-end gap-2">

                                                <a href="{{ route('seller.order', $order->order_id) }}" class="dashboard-action-btn" >
                                                    <svg
                                                        width="26"
                                                        height="19"
                                                        viewBox="0 0 26 19"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                        d="M23.3187 6.66195C24.6716 8.08537 24.6716 10.248 23.3187 11.6714C21.0369 14.0721 17.1181 17.3333 12.6667 17.3333C8.21523 17.3333 4.29641 14.0721 2.01466 11.6714C0.661781 10.248 0.661781 8.08537 2.01466 6.66195C4.29641 4.26122 8.21523 1 12.6667 1C17.1181 1 21.0369 4.26122 23.3187 6.66195Z"
                                                        stroke="#5B5B5B"
                                                        stroke-width="1.5"
                                                        />
                                                        <circle
                                                        cx="12.668"
                                                        cy="9.16699"
                                                        r="3.5"
                                                        stroke="#5B5B5B"
                                                        stroke-width="1.5"
                                                        />
                                                    </svg>
                                                </a>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            </div>
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
                                    {{ __('translate.Order Empty') }}
                                    </h3>
                                    <p class="fs-6 text-dark-200 text-center">
                                    {{ __('translate.You do not have any awaiting order') }}
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
          <!-- Completed -->
          <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab" tabindex="0" >
            <div>

                @if ($rejected_orders->count() > 0)
                    <div class="overflow-x-auto">
                        <div class="w-100">
                        <table class="w-100 dashboard-table">
                            <thead class="pb-3">
                            <tr>
                                <th scope="col" class="ps-4">{{ __('translate.Service') }}</th>
                                <th scope="col">{{ __('translate.Amount') }}</th>
                                <th scope="col">{{ __('translate.Status') }}</th>
                                <th scope="col">{{ __('translate.Freelancer') }}</th>
                                <th scope="col">{{ __('translate.Delivery Date') }}</th>
                                <th scope="col" class="pe-5 text-end">{{ __('translate.Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($rejected_orders as $index => $order)
                                    <tr>
                                        <td>
                                        <div class="d-flex gap-3 align-items-center project-name" >
                                            <div class="order-img">
                                                <a href="{{ route('service', $order?->listing?->slug) }}">
                                                    <img  src="{{ asset($order?->listing?->thumb_image) }}"  alt="" />
                                                </a>
                                            </div>
                                            <div>
                                            <p class="text-dark-200">
                                                <a href="{{ route('service', $order?->listing?->slug) }}">
                                                    {{ html_decode($order?->listing?->title) }}
                                                </a>

                                            </p>
                                            <ul class="d-flex gap-1 order-category">
                                                <li class="text-dark-200">{{ html_decode($order?->listing?->category?->name) }}</li>

                                            </ul>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="text-dark-200">{{ currency($order->total_amount) }}</td>
                                        <td>
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

                                        </td>
                                        <td class="text-dark-200">{{ html_decode($order?->seller?->name) }}</td>

                                        <td class="text-dark-200">
                                            {{ \Carbon\Carbon::parse($order->created_at)->addDays($order->delivery_date)->format('d M Y') }}

                                        </td>

                                        <td>
                                        <div class="d-flex justify-content-end gap-2">

                                            <a href="{{ route('seller.order', $order->order_id) }}" class="dashboard-action-btn" >
                                                <svg
                                                    width="26"
                                                    height="19"
                                                    viewBox="0 0 26 19"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                    d="M23.3187 6.66195C24.6716 8.08537 24.6716 10.248 23.3187 11.6714C21.0369 14.0721 17.1181 17.3333 12.6667 17.3333C8.21523 17.3333 4.29641 14.0721 2.01466 11.6714C0.661781 10.248 0.661781 8.08537 2.01466 6.66195C4.29641 4.26122 8.21523 1 12.6667 1C17.1181 1 21.0369 4.26122 23.3187 6.66195Z"
                                                    stroke="#5B5B5B"
                                                    stroke-width="1.5"
                                                    />
                                                    <circle
                                                    cx="12.668"
                                                    cy="9.16699"
                                                    r="3.5"
                                                    stroke="#5B5B5B"
                                                    stroke-width="1.5"
                                                    />
                                                </svg>
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
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
                                {{ __('translate.Order Empty') }}
                                </h3>
                                <p class="fs-6 text-dark-200 text-center">
                                {{ __('translate.You do not have any rejected order') }}
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
          <!-- Close -->
          <div class="tab-pane fade" id="nav-close" role="tabpanel" aria-labelledby="nav-close-tab" tabindex="0" >
            <div>
                @if ($cancel_orders->count() > 0)
                    <div class="overflow-x-auto">
                        <div class="w-100">
                        <table class="w-100 dashboard-table">
                            <thead class="pb-3">
                            <tr>
                                <th scope="col" class="ps-4">{{ __('translate.Service') }}</th>
                                <th scope="col">{{ __('translate.Amount') }}</th>
                                <th scope="col">{{ __('translate.Status') }}</th>
                                <th scope="col">{{ __('translate.Freelancer') }}</th>
                                <th scope="col">{{ __('translate.Delivery Date') }}</th>
                                <th scope="col" class="pe-5 text-end">{{ __('translate.Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($cancel_orders as $index => $order)
                                    <tr>
                                        <td>
                                        <div class="d-flex gap-3 align-items-center project-name" >
                                            <div class="order-img">
                                                <a href="{{ route('service', $order?->listing?->slug) }}">
                                                    <img  src="{{ asset($order?->listing?->thumb_image) }}"  alt="" />
                                                </a>
                                            </div>
                                            <div>
                                            <p class="text-dark-200">
                                                <a href="{{ route('service', $order?->listing?->slug) }}">
                                                    {{ html_decode($order?->listing?->title) }}
                                                </a>

                                            </p>
                                            <ul class="d-flex gap-1 order-category">
                                                <li class="text-dark-200">{{ html_decode($order?->listing?->category?->name) }}</li>

                                            </ul>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="text-dark-200">{{ currency($order->total_amount) }}</td>
                                        <td>
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

                                        </td>
                                        <td class="text-dark-200">{{ html_decode($order?->seller?->name) }}</td>

                                        <td class="text-dark-200">
                                            {{ \Carbon\Carbon::parse($order->created_at)->addDays($order->delivery_date)->format('d M Y') }}

                                        </td>

                                        <td>
                                        <div class="d-flex justify-content-end gap-2">

                                            <a href="{{ route('seller.order', $order->order_id) }}" class="dashboard-action-btn" >
                                                <svg
                                                    width="26"
                                                    height="19"
                                                    viewBox="0 0 26 19"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                    d="M23.3187 6.66195C24.6716 8.08537 24.6716 10.248 23.3187 11.6714C21.0369 14.0721 17.1181 17.3333 12.6667 17.3333C8.21523 17.3333 4.29641 14.0721 2.01466 11.6714C0.661781 10.248 0.661781 8.08537 2.01466 6.66195C4.29641 4.26122 8.21523 1 12.6667 1C17.1181 1 21.0369 4.26122 23.3187 6.66195Z"
                                                    stroke="#5B5B5B"
                                                    stroke-width="1.5"
                                                    />
                                                    <circle
                                                    cx="12.668"
                                                    cy="9.16699"
                                                    r="3.5"
                                                    stroke="#5B5B5B"
                                                    stroke-width="1.5"
                                                    />
                                                </svg>
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
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
                                {{ __('translate.Order Empty') }}
                                </h3>
                                <p class="fs-6 text-dark-200 text-center">
                                {{ __('translate.You do not have any cancel order') }}
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

          <div class="tab-pane fade" id="nav-complete" role="tabpanel" aria-labelledby="nav-close-tab" tabindex="0" >
            <div>
                @if ($complete_orders->count() > 0)
                    <div class="overflow-x-auto">
                        <div class="w-100">
                        <table class="w-100 dashboard-table">
                            <thead class="pb-3">
                            <tr>
                                <th scope="col" class="ps-4">{{ __('translate.Service') }}</th>
                                <th scope="col">{{ __('translate.Amount') }}</th>
                                <th scope="col">{{ __('translate.Status') }}</th>
                                <th scope="col">{{ __('translate.Freelancer') }}</th>
                                <th scope="col">{{ __('translate.Delivery Date') }}</th>
                                <th scope="col" class="pe-5 text-end">{{ __('translate.Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($complete_orders as $index => $order)
                                    <tr>
                                        <td>
                                        <div class="d-flex gap-3 align-items-center project-name" >
                                            <div class="order-img">
                                                <a href="{{ route('service', $order?->listing?->slug) }}">
                                                    <img  src="{{ asset($order?->listing?->thumb_image) }}"  alt="" />
                                                </a>
                                            </div>
                                            <div>
                                            <p class="text-dark-200">
                                                <a href="{{ route('service', $order?->listing?->slug) }}">
                                                    {{ html_decode($order?->listing?->title) }}
                                                </a>

                                            </p>
                                            <ul class="d-flex gap-1 order-category">
                                                <li class="text-dark-200">{{ html_decode($order?->listing?->category?->name) }}</li>

                                            </ul>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="text-dark-200">{{ currency($order->total_amount) }}</td>
                                        <td>
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

                                        </td>
                                        <td class="text-dark-200">{{ html_decode($order?->seller?->name) }}</td>

                                        <td class="text-dark-200">
                                            {{ \Carbon\Carbon::parse($order->created_at)->addDays($order->delivery_date)->format('d M Y') }}

                                        </td>

                                        <td>
                                        <div class="d-flex justify-content-end gap-2">

                                            <a href="{{ route('seller.order', $order->order_id) }}" class="dashboard-action-btn" >
                                                <svg
                                                    width="26"
                                                    height="19"
                                                    viewBox="0 0 26 19"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                    d="M23.3187 6.66195C24.6716 8.08537 24.6716 10.248 23.3187 11.6714C21.0369 14.0721 17.1181 17.3333 12.6667 17.3333C8.21523 17.3333 4.29641 14.0721 2.01466 11.6714C0.661781 10.248 0.661781 8.08537 2.01466 6.66195C4.29641 4.26122 8.21523 1 12.6667 1C17.1181 1 21.0369 4.26122 23.3187 6.66195Z"
                                                    stroke="#5B5B5B"
                                                    stroke-width="1.5"
                                                    />
                                                    <circle
                                                    cx="12.668"
                                                    cy="9.16699"
                                                    r="3.5"
                                                    stroke="#5B5B5B"
                                                    stroke-width="1.5"
                                                    />
                                                </svg>
                                            </a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
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
                                {{ __('translate.Order Empty') }}
                                </h3>
                                <p class="fs-6 text-dark-200 text-center">
                                {{ __('translate.You do not have any complete order') }}
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


        </div>
      </div>
    </div>
  </main>


@endsection
