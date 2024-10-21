@extends('buyer.layout')
@section('title')
    <title>{{ __('translate.Buyer || Post a Job') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4 pb-110">
      <!-- Page Header -->
      <div>
        <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Post a Job') }}</h3>
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
          <li class="text-lime-300 fs-6">{{ __('translate.Post a Job') }}</li>
        </ul>
      </div>
      <!-- Content -->
      <div>
        <div class="row justify-content-center">
          <div class="col-xl-8">
            <form method="POST" enctype="multipart/form-data" action="{{ route('buyer.jobpost.store') }}">
                @csrf
              <div class="d-flex flex-column gap-4">
                <!-- Project Info -->
                <div class="gig-info-card">
                  <!-- Header -->
                  <div class="gig-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Job Info') }}
                    </h4>
                  </div>
                  <div class="gig-info-body bg-white">
                    <div class="row g-4">
                      <div class="col-12">
                        <div class="form-container">
                          <label for="title" class="form-label">
                            {{ __('translate.Job Title') }}
                            <span class="text-lime-300">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Title') }}"
                            name="title"
                            value="{{ old('title') }}"
                            id="title"
                          />
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-container">
                          <label for="title" class="form-label">
                            {{ __('translate.Slug') }}
                            <span class="text-lime-300">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Slug') }}"
                            name="slug"
                            id="slug"
                            value="{{ old('slug') }}"
                          />
                        </div>
                      </div>

                      <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">

                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="jobDuration" class="form-label">
                            {{ __('translate.Category') }}<span class="text-lime-300"
                              >*</span
                            >
                          </label>
                          <select
                            id="jobDuration"
                            autocomplete="off"
                            class="form-select shadow-none"
                            name="category_id"
                          >
                          <option value="">{{ __('translate.Select Category') }}</option>
                          @foreach ($categories as $category)
                              <option  {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->translate->name }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="jobDuration" class="form-label">
                            {{ __('translate.City') }}<span class="text-lime-300"
                              >*</span
                            >
                          </label>
                          <select
                            id="jobDuration"
                            autocomplete="off"
                            class="form-select shadow-none"
                            name="city_id"
                          >
                          <option value="">{{ __('translate.Select City') }}</option>
                          @foreach ($cities as $city)
                              <option {{ $city->id == old('city_id') ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->translate->name }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="title" class="form-label">
                            {{ __('translate.Start from') }}
                            <span class="text-lime-300">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Price') }}"
                            name="regular_price"
                            value="{{ old('regular_price') }}"
                          />
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-container">
                          <label for="jobType" class="form-label"
                            >{{ __('translate.Job Type') }}</label
                          >
                          <select
                            id="jobType"
                            autocomplete="off"
                            class="form-select shadow-none"
                            name="job_type"
                          >
                          <option {{ 'Hourly' == old('job_type') ? 'selected' : '' }} value="Hourly">{{ __('translate.Hourly') }}</option>
                          <option {{ 'Daily' == old('job_type') ? 'selected' : '' }} value="Daily">{{ __('translate.Daily') }}</option>
                          <option {{ 'Monthly' == old('job_type') ? 'selected' : '' }} value="Monthly">{{ __('translate.Monthly') }}</option>
                          <option {{ 'Yearly' == old('job_type') ? 'selected' : '' }} value="Yearly">{{ __('translate.Yearly') }}</option>
                          </select>
                        </div>
                      </div>


                      <div class="col-12">
                        <label for="description" class="form-label"
                          >{{ __('translate.Description') }}*</label
                        >
                        <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description" id="description">{{ old('description') }}</textarea>
                      </div>


                    </div>
                  </div>
                </div>

                <!-- Upload  Img -->
                <div class="gig-info-card">
                  <!-- Header -->
                  <div class="gig-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Upload Image') }}
                    </h4>
                  </div>
                  <div class="gig-info-body bg-white">
                    <p class="text-dark-200 mb-2">{{ __('translate.Thumbnail Image') }}</p>
                    <div class="d-flex flex-wrap gap-3">
                      <div>
                        <label
                          for="gig-img"
                          class="border text-center gig-file-upload"
                        >
                          <img
                          id="view_img"
                          class="gig-img-icon"
                            src="{{ asset($general_setting->placeholder_image) }}"
                            alt=""
                          />
                          <p class="text-dark-200">{{ __('translate.Choose File') }}</p>
                          <input
                            class="d-none"
                            type="file"
                            name="thumb_image"
                            id="gig-img"
                            onchange="previewImage(event)"
                          />
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Submit Btn -->
                <div>
                  <button type="submit" class="w-btn-secondary-lg">
                    {{ __('translate.Submit Now') }}
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

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }
    </style>
@endpush

@push('js_section')

    <script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $("#title").on("keyup",function(e){
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
                    $("#slug").val(slug);
                })

                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ]
                });

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
