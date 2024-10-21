@extends('buyer.layout')
@section('title')
    <title>{{ __('translate.Buyer || Change Password') }}</title>
@endsection
@section('front-content')
<!-- Main -->
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Header -->
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">
            {{ __('translate.Change Password') }}
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
            <li class="text-lime-300 fs-6">{{ __('translate.Change Password') }}</li>
          </ul>
        </div>
      </div>
      <!-- Content -->
      <div class="bg-white p-4 p-md-5 rounded-4">
        <div class="row">
          <div class="col-lg-6 mb-4">
            <div>
              <div class="mb-4">
                <h4 class="text-24 fw-bold text-dark-300 mb-3">
                  {{ __('translate.Update your Password') }}
                </h4>
                <p class="text-dark-200 fs-6">
                  {{ __('translate.Do you want to change your password, please fill out the form below') }}
                </p>
              </div>
              <form method="POST" action="{{ route('buyer.update-password') }}">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column gap-4">
                  <div class="form-container">
                    <label for="cpass" class="form-label"
                      >{{ __('translate.Current Password') }}</label
                    >
                    <div
                      class="position-relative d-flex align-items-center"
                    >
                      <input
                        type="password"
                        class="form-control shadow-none"
                        placeholder="*******"
                        name="current_password"
                      />

                    </div>
                  </div>

                  <div class="form-container">
                    <label for="cfpass" class="form-label"
                      >{{ __('translate.New Password') }}</label
                    >
                    <div
                      class="position-relative d-flex align-items-center"
                    >
                      <input
                        type="password"
                        class="form-control shadow-none"
                        placeholder="*******"
                        name="password"
                      />

                    </div>
                  </div>

                  <div class="form-container">
                    <label for="cfpass" class="form-label"
                      >{{ __('translate.Confirm Password') }}</label
                    >
                    <div
                      class="position-relative d-flex align-items-center"
                    >
                      <input
                        type="password"
                        class="form-control shadow-none"
                        placeholder="*******"
                        name="password_confirmation"
                      />

                    </div>
                  </div>



                  <div class="d-flex gap-3 align-items-center">
                    <button class="w-btn-secondary-lg">
                      {{ __('translate.Update Password') }}
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
          <div class="col-lg-6">
            <div>
              <img
                src="{{ asset($general_setting->login_page_bg) }}"
                class="img-fluid w-100"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection
