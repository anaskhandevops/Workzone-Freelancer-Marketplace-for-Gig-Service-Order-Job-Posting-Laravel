@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || Edit Profile') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Header -->
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">
            {{ __('translate.Edit Profile') }}
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
            <li class="text-lime-300 fs-6">{{ __('translate.Edit Profile') }}</li>
          </ul>
        </div>
      </div>
      <!-- Content -->
      <div>
        <div class="row justify-content-center">
          <div class="col-xl-8">
            <form method="post" action="{{ route('seller.update-profile') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="d-flex flex-column gap-4">
                <!-- Profile Info -->
                <div class="profile-info-card">
                  <!-- Header -->
                  <div class="profile-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Basic Information') }}
                    </h4>
                  </div>
                  <div class="profile-info-body bg-white">
                    <div class="row g-4">
                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.Name') }}<span class="text-lime-300"
                              >*</span
                            ></label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Name') }}"
                            name="name"
                            value="{{ html_decode($user->name) }}"
                          />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.Designation') }}</label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Designation') }}"
                            name="designation"
                            value="{{ html_decode($user->designation) }}"
                          />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="email" class="form-label">
                            {{ __('translate.Email') }}<span class="text-lime-300"
                              >*</span
                            ></label
                          >
                          <input
                            type="email"
                            class="form-control shadow-none"
                            name="email"
                            value="{{ html_decode($user->email) }}"
                            readonly
                          />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="gender" class="form-label">{{ __('translate.Gender') }} <span class="text-lime-300">*</span>
                          </label>
                          <select id="gender" autocomplete="off" class="form-select shadow-none" name="gender">
                            <option value="">{{ __('translate.Select') }}</option>
                            <option {{ $user->gender == 'Male' ? 'selected' : '' }} value="Male">{{ __('translate.Male') }}</option>
                            <option {{ $user->gender == 'Female' ? 'selected' : '' }} value="Female">{{ __('translate.Female') }}</option>
                            <option {{ $user->gender == 'Others' ? 'selected' : '' }} value="Others">{{ __('translate.Others') }}</option>
                          </select>
                        </div>
                      </div>



                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.Phone') }}</label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Phone') }}"
                            name="phone"
                            value="{{ html_decode($user->phone) }}"
                          />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.Language') }}</label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none tags"
                            placeholder="{{ __('translate.Language') }}"
                            name="language"
                            value="{{ html_decode($user->language) }}"
                          />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.Hourly Rate') }}</label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Hourly Rate') }}"
                            name="hourly_payment"
                            value="{{ html_decode($user->hourly_payment) }}"
                          />
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.Address') }}</label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Address') }}"
                            name="address"
                            value="{{ html_decode($user->address) }}"
                          />
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-container">
                          <label for="fname" class="form-label"
                            >{{ __('translate.About Me') }}</label
                          >

                          <textarea rows="5" class="form-control shadow-none" name="about_me" id="" cols="30" rows="10" placeholder="{{ __('translate.About Me') }}">{{ html_decode($user->about_me) }}</textarea>

                        </div>
                      </div>


                    </div>
                  </div>
                </div>

                <!-- Upload  Img -->
                <div class="profile-info-card">
                  <!-- Header -->
                  <div class="gig-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                        {{ __('translate.Upload Profile Image') }}
                    </h4>
                  </div>
                  <div class="gig-info-body bg-white">
                    <p class="text-dark-200 mb-2">{{ __('translate.Profile Image') }}</p>
                    <div class="d-flex flex-wrap gap-3">
                      <div>
                        <label
                          for="profile-img"
                          class="border text-center gig-file-upload"
                        >
                        @if ($user->image)
                            <img
                            id="view_img"
                            class="gig-img-icon"
                            src="{{ asset($user->image) }}"
                            alt=""
                            />
                        @else
                            <img
                            id="view_img"
                            class="gig-img-icon"
                            src="{{ asset($general_setting->placeholder_image) }}"
                            alt=""
                            />
                        @endif
                          <p class="text-dark-200">{{ __('translate.Choose File') }}</p>
                          <input
                            class="d-none"
                            type="file"
                            name="image"
                            id="profile-img"
                            onchange="previewImage(event)"
                          />
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="profile-info-card">
                    <!-- Header -->
                    <div class="profile-info-header">
                      <h4 class="text-18 fw-semibold text-dark-300">
                        {{ __('translate.University Information') }}
                      </h4>
                    </div>
                    <div class="profile-info-body bg-white">
                      <div class="row g-4">
                        <div class="col-12">
                          <div class="form-container">
                            <label for="institute" class="form-label">{{ __('translate.Institute') }}
                              </label>
                            <input type="text" id="institute" class="form-control shadow-none" placeholder="{{ __('translate.Name') }}" name="university_name" value="{{ $user->university_name }}">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-container">
                            <label for="degree" class="form-label">{{ __('translate.Location') }}
                              </label>
                            <input id="degree" type="text" class="form-control shadow-none" placeholder="{{ __('translate.Location') }}" name="university_location" value="{{ $user->university_location }}">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-container">
                            <label for="major" class="form-label">
                              {{ __('translate.Time Period') }}
                              </label>
                            <input type="text" class="form-control shadow-none" placeholder="{{ __('translate.Time Period') }}" name="university_time_period" value="{{ $user->university_time_period }}">
                          </div>
                        </div>

                      </div>
                    </div>
                </div>

                <div class="profile-info-card">
                    <!-- Header -->
                    <div class="profile-info-header">
                      <h4 class="text-18 fw-semibold text-dark-300">
                        {{ __('translate.High School Information') }}
                      </h4>
                    </div>
                    <div class="profile-info-body bg-white">
                      <div class="row g-4">
                        <div class="col-12">
                          <div class="form-container">
                            <label for="institute" class="form-label">{{ __('translate.Institute') }}
                              </label>
                            <input type="text" id="institute" class="form-control shadow-none" placeholder="{{ __('translate.Name') }}" name="school_name" value="{{ $user->school_name }}">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-container">
                            <label for="degree" class="form-label">{{ __('translate.Location') }}
                              </label>
                            <input id="degree" type="text" class="form-control shadow-none" placeholder="{{ __('translate.Location') }}" name="school_location" value="{{ $user->school_location }}">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-container">
                            <label for="major" class="form-label">
                              {{ __('translate.Time Period') }}
                              </label>
                            <input type="text" class="form-control shadow-none" placeholder="{{ __('translate.Time Period') }}" name="school_time_period" value="{{ $user->school_time_period }}">
                          </div>
                        </div>

                      </div>
                    </div>
                </div>


                <div class="profile-info-card">
                    <!-- Header -->
                    <div class="profile-info-header">
                      <h4 class="text-18 fw-semibold text-dark-300">
                        {{ __('translate.Skills') }}
                      </h4>
                    </div>
                    <div class="profile-info-body bg-white">
                      <div class="row g-4">
                        <div class="col-12">
                          <div class="form-container">
                            <input type="text" class="form-control shadow-none tags" placeholder="{{ __('translate.Your Skills') }}" name="skills" value="{{ html_decode($user->skills) }}">
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>




                <!-- Submit Btn -->
                <div class="d-flex align-items-center gap-3">
                  <button type="submit" class="w-btn-secondary-lg">
                    {{ __('translate.Save Now') }}
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


@push('style_section')
    <link rel="stylesheet" href="{{ asset('global/tagify/tagify.css') }}">
@endpush

@push('js_section')

    <script src="{{ asset('global/tagify/tagify.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $('.tags').tagify();
            });
        })(jQuery);

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

    </script>
@endpush
