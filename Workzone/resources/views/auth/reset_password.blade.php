@extends('layout')

@section('title')
    <title>{{ __('translate.WorkZone || Reset Password') }}</title>
@endsection
@section('front-content')

    <!-- Main Start -->
    <main>
        <!-- Breadcrumb -->
        <section
          class="w-breadcrumb-area"
          style=" background-image: url({{ asset($general_setting->breadcrumb_image) }});">
          <div class="container">
            <div class="row">
              <div class="col-auto">
                <div
                  class="position-relative z-2"
                  data-aos="fade-up"
                  data-aos-duration="1000"
                  data-aos-easing="linear"
                >
                  <h2 class="section-title-light mb-2">{{ __('translate.Reset Password') }}</h2>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb w-breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('translate.Home') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        {{ __('translate.Reset Password') }}
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Breadcrumb End -->

        <!-- Login Form -->
        <section class="py-110 bg-offWhite">
          <div class="container">
            <div class="bg-white rounded-3 p-3">
              <div class="row g-4">
                <div class="col-lg-6 p-3 p-lg-5">
                  <div class="mb-40">
                    <h2 class="section-title mb-2">{{ __('translate.Reset Password') }}</h2>
                    <p class="section-desc">{{ __('translate.Welcome to Work Zone') }}</p>
                  </div>
                  <form method="POST" action="{{ route('buyer.store-reset-password', $user->forget_password_token) }}">
                    @csrf
                    <div class="form-container d-flex flex-column gap-4">

                        <div class="form-input">
                            <label for="eamil" class="form-label"
                            >{{ __('translate.Email') }} <span class="text-lime-300">*</span>
                            </label>
                            <input
                            type="email"
                            id="email"
                            placeholder="{{ __('translate.Email') }}"
                            class="form-control shadow-none"
                            name="email"
                            readonly
                            value="{{ $user->email }}"
                            />
                        </div>



                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-input">
                                <label for="password" class="form-label"
                                >{{ __('translate.Password') }} <span class="text-lime-300">*</span></label
                                >
                                <input
                                type="password"
                                id="password"
                                placeholder="********"
                                class="form-control shadow-none"
                                name="password"
                                />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-input">
                                <label for="password_confirmation" class="form-label"
                                >{{ __('translate.Confirm Password') }} <span class="text-lime-300">*</span></label
                                >
                                <input
                                type="password"
                                id="password_confirmation"
                                placeholder="********"
                                class="form-control shadow-none"
                                name="password_confirmation"
                                />
                            </div>
                        </div>

                        @if($general_setting->recaptcha_status==1)
                            <div class="form-input col-lg-12 mt-4">
                                <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                            </div>
                        @endif


                    </div>


                      <div class="d-grid">
                        <button class="w-btn-secondary-lg">{{ __('translate.Reset Now') }}</button>
                      </div>
                    </div>
                  </form>
                  <div class="py-5">
                    <div
                      class="form-divider d-flex justify-content-center align-items-center"
                    >
                      <span class="form-divider-text">{{ __('translate.OR') }}</span>
                    </div>
                  </div>
                  <div class="d-flex gap-3 justify-content-center align-items-center social-login" >

                    @if ($general_setting->is_facebook == 1)


                    <a href="{{ route('buyer.login-facebook') }}" class="social-login-item">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 3H15C12.2386 3 10 5.23858 10 8V10H6V14H10V21H14V14H18V10H14V8C14 7.44772 14.4477 7 15 7H18V3Z" fill="currentColor"/>
                            </svg>
                        </a>
                    @endif

                    @if ($general_setting->is_gmail == 1)
                    <a href="{{ route('buyer.login-google') }}" class="social-login-item">
                      <svg
                        width="26"
                        height="26"
                        viewBox="0 0 26 26"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M13 14.95V11.05L25.8547 11.05C25.9504 11.6861 26 12.3372 26 13C26 20.1797 20.1797 26 13 26C5.8203 26 0 20.1797 0 13C0 5.8203 5.8203 0 13 0C16.5898 0 19.8398 1.45507 22.1924 3.80761L19.4347 6.56533C17.7879 4.91855 15.5129 3.9 13 3.9C7.97421 3.9 3.9 7.97421 3.9 13C3.9 18.0258 7.97421 22.1 13 22.1C17.3565 22.1 20.9979 19.0387 21.8906 14.95H13Z"
                          fill="currentColor"
                        />
                      </svg>
                    </a>
                    @endif
                  </div>

                  <div class="mt-4">
                    <p class="text-center form-text">
                      {{ __('translate.Already have an account?') }}
                      <a href="{{ route('buyer.login') }}"> {{ __('translate.Sign In') }} </a>
                    </p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="login-img">
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
        </section>
        <!-- Login Form End -->
      </main>
      <!-- Main End -->


@endsection

@push('js_section')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endpush
