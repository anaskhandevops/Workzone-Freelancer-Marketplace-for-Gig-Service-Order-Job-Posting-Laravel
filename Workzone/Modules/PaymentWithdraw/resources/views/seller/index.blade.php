@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || My Earnings') }}</title>
@endsection
@section('front-content')

    <main class="dashboard-main min-vh-100">
        <div class="d-flex flex-column gap-4">
        <!-- Page Header -->
        <div
            class="d-flex gap-4 flex-column flex-md-row align-items-md-center justify-content-between"
        >
            <div>
            <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.My Earnings') }}</h3>
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
                  <li class="text-lime-300 fs-6">{{ __('translate.My Earnings') }}</li>

            </ul>
            </div>
            <div>
            <a href="{{ route('seller.my-withdraw.create') }}" class="w-btn-secondary-lg">
                {{ __('translate.New Withdraw') }}</a
            >
            </div>
        </div>
        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="p-4 d-flex align-items-center dashobard-widget justify-content-between bg-white rounded-4" >
                    <div>
                    <h3 class="dashboard-widget-title fw-bold text-dark-300">
                        {{ currency($total_income) }}
                    </h3>
                    <p class="text-18 text-dark-200">{{ __('translate.Total Earnings') }}</p>
                    </div>
                    <div class="dashboard-widget-icon">
                    <img src="{{ asset('frontend/assets/img/dashboard/icon/icon-2.png') }}" alt="" />
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="p-4 d-flex align-items-center dashobard-widget justify-content-between bg-white rounded-4" >
                    <div>
                    <h3 class="dashboard-widget-title fw-bold text-dark-300">
                        {{ currency($total_commission) }}
                    </h3>
                    <p class="text-18 text-dark-200">{{ __('translate.Commission Deducted') }}</p>
                    </div>
                    <div class="dashboard-widget-icon">
                    <img src="{{ asset('frontend/assets/img/dashboard/icon/icon-2.png') }}" alt="" />
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="p-4 d-flex align-items-center dashobard-widget justify-content-between bg-white rounded-4" >
                    <div>
                    <h3 class="dashboard-widget-title fw-bold text-dark-300">
                        {{ currency($net_income) }}
                    </h3>
                    <p class="text-18 text-dark-200">{{ __('translate.Net Earnings') }}</p>
                    </div>
                    <div class="dashboard-widget-icon">
                    <img src="{{ asset('frontend/assets/img/dashboard/icon/icon-2.png') }}" alt="" />
                    </div>
                </div>
            </div>

            
            


            <div class="col-xl-4 col-md-6 mb-4">
                <div class="p-4 d-flex align-items-center dashobard-widget justify-content-between bg-white rounded-4" >
                    <div>
                    <h3 class="dashboard-widget-title fw-bold text-dark-300">
                        {{ currency($current_balance) }}
                    </h3>
                    <p class="text-18 text-dark-200">{{ __('translate.Available Balance') }}</p>
                    </div>
                    <div class="dashboard-widget-icon">
                    <img src="{{ asset('frontend/assets/img/dashboard/icon/icon-1.png') }}" alt="" />
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-md-6 mb-4">
            <div
                class="p-4 d-flex align-items-center dashobard-widget justify-content-between bg-white rounded-4"
            >
                <div>
                <h3 class="dashboard-widget-title fw-bold text-dark-300">
                    {{ currency($total_withdraw_amount) }}
                </h3>
                <p class="text-18 text-dark-200">{{ __('translate.Total Withdraw') }}</p>
                </div>
                <div class="dashboard-widget-icon">
                <img src="{{ asset('frontend/assets/img/dashboard/icon/icon-3.png') }}" alt="" />
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-md-6">
            <div
                class="p-4 d-flex align-items-center dashobard-widget justify-content-between bg-white rounded-4"
            >
                <div>
                <h3 class="dashboard-widget-title fw-bold text-dark-300">
                    {{ currency($pending_withdraw) }}
                </h3>
                <p class="text-18 text-dark-200">{{ __('translate.Pending Withdraw') }}</p>
                </div>
                <div class="dashboard-widget-icon">
                <img src="{{ asset('frontend/assets/img/dashboard/icon/icon-4.png') }}" alt="" />
                </div>
            </div>
            </div>
        </div>

            <!-- Content -->
            @if($withdraw_list->count() > 0)
            <div>
                <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Withdraw List') }}</h3>
                <!-- Table -->
                <div class="overflow-x-auto">
                <div class="w-100">
                    <table class="w-100 dashboard-table">
                        <thead class="pb-3">
                            <tr>
                            <th scope="col" class="ps-4">{{ __('translate.Method Name') }}</th>
                            <th scope="col">{{ __('translate.Total Amount') }}</th>
                            <th scope="col">{{ __('translate.Withdraw Amount') }}</th>
                            <th scope="col">{{ __('translate.Withdraw Charge') }}</th>
                            <th scope="col">{{ __('translate.Status') }}</th>
                            <th scope="col" class="text-end pe-4">{{ __('translate.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($withdraw_list as $index => $withdraw)
                                <tr>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center project-name" >
                                            <div>
                                                <p class="text-dark-200">
                                                {{ $withdraw->withdraw_method_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-dark-200">{{ currency($withdraw->total_amount) }}</td>

                                    <td class="text-dark-200">{{ currency($withdraw->withdraw_amount) }}</td>
                                    <td class="text-dark-200">{{ currency($withdraw->charge_amount) }}</td>

                                    <td>
                                        @if ($withdraw->status == 'approved')
                                            <span class="status-badge in-progress"> {{ __('translate.Approved') }} </span>
                                        @elseif ($withdraw->status == 'rejected')
                                            <span class="status-badge pending"> {{ __('translate.Rejected') }} </span>
                                        @else
                                            <span class="status-badge pending"> {{ __('translate.Pending') }} </span>
                                        @endif

                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            <button class="dashboard-action-btn" data-bs-toggle="modal" data-bs-target="#withdrawShow{{ $withdraw->id }}">
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
                                                    cx="12.667"
                                                    cy="9.16699"
                                                    r="3.5"
                                                    stroke="#5B5B5B"
                                                    stroke-width="1.5"
                                                />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            @endif
        </div>
    </main>



    @foreach ($withdraw_list as $index => $withdraw)
        <div class="modal fade" id="withdrawShow{{ $withdraw->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Withdraw Details') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td>{{ __('translate.Withdraw Method') }}</td>
                                    <td>{{ $withdraw->withdraw_method_name }}</td>
                                </tr>
                                <tr>
                                    <td> {{ __('translate.Total Amount') }}</td>
                                    <td>{{ currency($withdraw->total_amount) }}</td>
                                </tr>

                                <tr>
                                    <td> {{ __('translate.Withdraw Amount') }}</td>
                                    <td>{{ currency($withdraw->withdraw_amount) }}</td>
                                </tr>

                                <tr>
                                    <td> {{ __('translate.Charge Amount') }}</td>
                                    <td>{{ currency($withdraw->charge_amount) }}</td>
                                </tr>

                                <tr>
                                    <td> {{ __('translate.Status') }}</td>
                                    <td>
                                        @if ($withdraw->status == 'approved')
                                            <span class="status-badge in-progress"> {{ __('translate.Approved') }} </span>
                                        @elseif ($withdraw->status == 'rejected')
                                            <span class="status-badge pending"> {{ __('translate.Rejected') }} </span>
                                        @else
                                            <span class="status-badge pending"> {{ __('translate.Pending') }} </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td> {{ __('translate.Withdraw Method') }}</td>
                                    <td>{{ $withdraw->withdraw_method_name }}</td>
                                </tr>

                                <tr>
                                    <td> {{ __('translate.Bank/Account Info') }}</td>
                                    <td>{!! clean(nl2br(html_decode($withdraw->description))) !!}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

@endsection

