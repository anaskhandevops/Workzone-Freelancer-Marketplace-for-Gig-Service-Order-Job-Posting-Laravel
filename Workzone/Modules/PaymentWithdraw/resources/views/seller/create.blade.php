@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || New Withdraw') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Header -->
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">
            {{ __('translate.New Withdraw') }}
          </h3>
          <ul class="d-flex align-items-center gap-2">
            <li class="text-dark-200 fs-6">{{ __('translate.My Withdraw') }}</li>
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
            <li class="text-lime-300 fs-6">{{ __('translate.New Withdraw') }}</li>
          </ul>
        </div>
      </div>
      <!-- Content -->
      <div>
        <div class="row justify-content-center">
          <div class="col-xl-8">
            <form method="post" action="{{ route('seller.my-withdraw.store') }}" enctype="multipart/form-data">
                @csrf
              <div class="d-flex flex-column gap-4">
                <!-- Profile Info -->
                <div class="profile-info-card">
                  <!-- Header -->
                  <div class="profile-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Withdraw Information') }}
                    </h4>
                  </div>
                  <div class="profile-info-body bg-white">
                    <div class="row g-4">

                      <div class="col-12">
                        <div class="form-container">
                          <label for="gender" class="form-label">{{ __('translate.Withdraw Method') }} <span class="text-lime-300">*</span>
                          </label>
                          <select id="withdraw_method" autocomplete="off" class="form-select shadow-none" name="method_id">
                                <option value="">{{ __('translate.Select') }}</option>
                                @foreach ($methods as $method)
                                    <option value="{{ $method->id }}">{{ $method->method_name }}</option>
                                @endforeach
                          </select>
                        </div>
                      </div>

                        @foreach ($methods as $method)
                            <div class="col-12 d-none method_box" id="method_id_{{ $method->id }}">
                                <div class="form-container">
                                    <div class="card">
                                        <div class="card-body" id="method_des">
                                            <div class="alert alert-primary withdraw-card" role="alert">
                                                <h5 class="mb-2">{{ __('translate.Withdraw Limit') }} :
                                                    {{ currency($method->min_amount) }} - {{ currency($method->max_amount) }}
                                                </h5 >
                                                <h5 class="mb-2">{{ __('translate.Withdraw charge') }} : {{ $method->withdraw_charge }}%</h5>
                                                {!! clean(nl2br($method->description)) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                      <div class="col-12">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.Amount') }}</label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Amount') }}"
                            name="amount"
                            value=""
                          />
                        </div>
                      </div>


                      <div class="col-12">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.Bank/Account Information') }}</label
                          >

                          <textarea rows="5" class="form-control shadow-none" name="description" id="" cols="30" rows="10" placeholder="{{ __('translate.Bank/Account Information') }}"></textarea>

                        </div>
                      </div>


                    </div>
                  </div>
                </div>

                <!-- Submit Btn -->
                <div class="d-flex align-items-center gap-3">
                  <button type="submit" class="w-btn-secondary-lg">
                    {{ __('translate.Send Withdraw Request') }}
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
                  </button>
                  <a
                    href=""
                    class="text-danger text-decoration-underline"
                    >{{ __('translate.Cancel') }}</a
                  >
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection



@push('js_section')

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $("#withdraw_method").on("change", function(){
                    $(".method_box").addClass('d-none');
                    $(`#method_id_${$(this).val()}`).removeClass('d-none');

                })
            });
        })(jQuery);

    </script>
@endpush
