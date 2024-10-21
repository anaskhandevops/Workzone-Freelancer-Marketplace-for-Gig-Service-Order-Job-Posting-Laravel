@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || Create Service') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4 pb-110">
      <!-- Header -->
      <div>
        <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Create Service') }}</h3>
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
          <li class="text-lime-300 fs-6">{{ __('translate.Create Service') }}</li>
        </ul>
      </div>
      <!-- Content -->
      <div>
        <div class="row justify-content-center">
          <div class="col-xl-8">
            <form method="POST" enctype="multipart/form-data" action="{{ route('seller.listing.store') }}">
                @csrf
                <input type="hidden" name="seller_id" value="{{ Auth::guard('web')->user()->id }}">
              <div class="d-flex flex-column gap-4">
                <!-- Project Info -->
                <div class="gig-info-card">
                  <!-- Header -->
                  <div class="gig-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Basic Info') }}
                    </h4>
                  </div>
                  <div class="gig-info-body bg-white">
                    <div class="row g-4">
                      <div class="col-12">
                        <div class="form-container">
                          <label for="title" class="form-label"
                            >{{ __('translate.Title') }}*</label
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
                          <label for="slug" class="form-label"
                            >{{ __('translate.Slug') }}*</label
                          >
                          <input
                            type="text"
                            class="form-control shadow-none"
                            placeholder="{{ __('translate.Slug') }}"
                            name="slug"
                            value="{{ old('slug') }}"
                            id="slug"
                          />
                        </div>
                      </div>


                      <div class="col-12">
                        <div class="form-container">
                          <label for="category" class="form-label"
                            >{{ __('translate.Category') }}*</label>
                          <select
                            id="category-select"
                            autocomplete="off"
                            class="form-select shadow-none"
                            name="category_id">
                            <option value="">{{ __('translate.Select Category') }}</option>
                            @foreach ($categories as $category)
                                <option  {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->translate->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-container">
                          <label for="category" class="form-label"
                            >{{ __('translate.Subcategory') }}*</label>
                          <select
                           id="subcategory-select"
                            autocomplete="off"
                            class="form-select shadow-none"
                            name="sub_category_id">
                            <option value="">{{ __('translate.Select Subcategory') }}</option>
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

                <!-- Pricing Package -->
                <div class="gig-info-card">
                  <!-- Header -->
                  <div class="gig-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Pricing Package') }}
                    </h4>
                  </div>
                  <div class="gig-info-body bg-white">
                    <div class="row g-0 price-pack-wrapper">
                      <div class="col-md-4">
                        <div class="gig-pricing-pack border-end">
                          <div class="p-2 ps-3 border-bottom">
                            <span class="pricing-pack-name">{{ __('translate.Basic') }}</span>
                          </div>
                          <div class="pack-description border-bottom">
                            <textarea
                              class="border-0 px-3 w-100 shadow-none form-control"
                              placeholder="{{ __('translate.Description Here') }}"
                              rows="3"
                              name="basic_description"
                            >{{ old('basic_description') }}</textarea>
                          </div>
                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="basic_delivery_date"
                            >
                              <option value="">
                                {{ __('translate.Select Delivery Time') }}
                              </option>
                              @for ($i = 1; $i<=5; $i++)
                              <option {{ old('basic_delivery_date') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>
                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="basic_revision"
                            >
                              <option value="">{{ __('translate.Revision') }}</option>
                              @for ($i = 1; $i<=5; $i++)
                              <option {{ old('basic_revision') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="basic_fn_website"
                            >
                              <option value="">{{ __('translate.Functional Website') }}</option>
                              <option {{ old('basic_fn_website') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('basic_fn_website') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="basic_page"
                            >
                              <option value="">{{ __('translate.Number of Page') }}</option>
                              @for ($i = 1; $i<=10; $i++)
                              <option {{ old('basic_page') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="basic_responsive"
                            >
                              <option value="">{{ __('translate.Responsive') }}</option>
                              <option {{ old('basic_responsive') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('basic_responsive') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="basic_source_code"
                            >
                              <option value="">{{ __('translate.Source Code') }}</option>
                              <option {{ old('basic_source_code') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('basic_source_code') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="basic_content_upload"
                            >
                              <option value="">{{ __('translate.Content Upload') }}</option>
                              <option {{ old('basic_content_upload') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('basic_content_upload') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="basic_speed_optimized"
                            >
                              <option value="">{{ __('translate.Speed Optimized') }}</option>
                              <option {{ old('basic_speed_optimized') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('basic_speed_optimized') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="pack-description">
                            <input
                              class="border-0 px-3 w-100 shadow-none form-control"
                              placeholder="{{ __('translate.Price Here') }}"
                              rows="1"
                              name="basic_price"
                              value="{{ old('basic_price') }}"
                            />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="gig-pricing-pack border-end">
                          <div class="p-2 ps-3 border-bottom">
                            <span class="pricing-pack-name"
                              >{{ __('translate.Standard') }}</span
                            >
                          </div>

                          <div class="pack-description border-bottom">
                            <textarea
                              class="border-0 px-3 w-100 shadow-none form-control"
                              placeholder="{{ __('translate.Description Here') }}"
                              rows="3"
                              name="standard_description"
                            >{{ old('standard_description') }}</textarea>
                          </div>
                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="standard_delivery_date"
                            >
                              <option value="">
                                {{ __('translate.Select Delivery Time') }}
                              </option>
                              @for ($i = 1; $i<=5; $i++)
                              <option {{ old('standard_delivery_date') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>
                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="standard_revision"
                            >
                              <option value="">{{ __('translate.Revision') }}</option>
                              @for ($i = 1; $i<=5; $i++)
                              <option {{ old('standard_revision') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="standard_fn_website"
                            >
                              <option value="">{{ __('translate.Functional Website') }}</option>
                              <option {{ old('standard_fn_website') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('standard_fn_website') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="standard_page"
                            >
                              <option value="">{{ __('translate.Number of Page') }}</option>
                              @for ($i = 1; $i<=10; $i++)
                              <option {{ old('standard_page') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="standard_responsive"
                            >
                              <option value="">{{ __('translate.Responsive') }}</option>
                              <option {{ old('standard_responsive') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('standard_responsive') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="standard_source_code"
                            >
                              <option value="">{{ __('translate.Source Code') }}</option>
                              <option {{ old('standard_source_code') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('standard_source_code') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="standard_content_upload"
                            >
                              <option value="">{{ __('translate.Content Upload') }}</option>
                              <option {{ old('standard_content_upload') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('standard_content_upload') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="standard_speed_optimized"
                            >
                              <option value="">{{ __('translate.Speed Optimized') }}</option>
                              <option {{ old('standard_speed_optimized') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('standard_speed_optimized') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="pack-description">
                            <input
                              class="border-0 px-3 w-100 shadow-none form-control"
                              placeholder="{{ __('translate.Price Here') }}"
                              rows="1"
                              name="standard_price"
                              value="{{ old('standard_price') }}"
                            />
                          </div>


                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="gig-pricing-pack">
                          <div class="p-2 ps-3 border-bottom">
                            <span class="pricing-pack-name">{{ __('translate.Premium') }}</span>
                          </div>


                          <div class="pack-description border-bottom">
                            <textarea
                              class="border-0 px-3 w-100 shadow-none form-control"
                              placeholder="{{ __('translate.Description Here') }}"
                              rows="3"
                              name="premium_description"
                            >{{ old('premium_description') }}</textarea>
                          </div>
                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="premium_delivery_date"
                            >
                              <option value="">
                                {{ __('translate.Select Delivery Time') }}
                              </option>
                              @for ($i = 1; $i<=5; $i++)
                              <option {{ old('premium_delivery_date') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>
                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="premium_revision"
                            >
                              <option value="">{{ __('translate.Revision') }}</option>
                              @for ($i = 1; $i<=5; $i++)
                              <option {{ old('premium_revision') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="premium_fn_website"
                            >
                              <option value="">{{ __('translate.Functional Website') }}</option>
                              <option {{ old('premium_fn_website') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('premium_fn_website') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="premium_page"
                            >
                              <option value="">{{ __('translate.Number of Page') }}</option>
                              @for ($i = 1; $i<=10; $i++)
                              <option {{ old('premium_page') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="premium_responsive"
                            >
                              <option value="">{{ __('translate.Responsive') }}</option>
                              <option {{ old('premium_responsive') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('premium_responsive') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="premium_source_code"
                            >
                              <option value="">{{ __('translate.Source Code') }}</option>
                              <option {{ old('premium_source_code') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('premium_source_code') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="premium_content_upload"
                            >
                              <option value="">{{ __('translate.Content Upload') }}</option>
                              <option {{ old('premium_content_upload') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('premium_content_upload') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="p-2 ps-3 border-bottom">
                            <select
                              id=""
                              class="form-select p-0 border-0 shadow-none"
                              name="premium_speed_optimized"
                            >
                              <option value="">{{ __('translate.Speed Optimized') }}</option>
                              <option {{ old('premium_speed_optimized') == 'yes' ? 'selected' : '' }} value="yes">{{ __('translate.Yes') }}</option>
                              <option {{ old('premium_speed_optimized') == 'no' ? 'selected' : '' }} value="no">{{ __('translate.No') }}</option>

                            </select>
                          </div>

                          <div class="pack-description">
                            <input
                              class="border-0 px-3 w-100 shadow-none form-control"
                              placeholder="{{ __('translate.Price Here') }}"
                              rows="1"
                              name="premium_price"
                              value="{{ old('premium_price') }}"
                            />
                          </div>


                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Upload Gig Img -->
                <div class="gig-info-card">
                  <!-- Header -->
                  <div class="gig-info-header">
                    <h4 class="text-18 fw-semibold text-dark-300">
                      {{ __('translate.Upload Thumbnail') }}
                    </h4>
                  </div>
                  <div class="gig-info-body bg-white">
                    <p class="text-dark-200 mb-2">{{ __('translate.Thumbnail Image') }} *</p>
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


                <!-- Project Info -->
                <div class="gig-info-card">
                    <!-- Header -->
                    <div class="gig-info-header">
                      <h4 class="text-18 fw-semibold text-dark-300">
                        {{ __('translate.SEO Information') }}
                      </h4>
                    </div>
                    <div class="gig-info-body bg-white">
                      <div class="row g-4">

                        <div class="col-12">
                            <div class="form-container">
                              <label for="tags" class="form-label"
                                >{{ __('translate.Tags') }}</label
                              >
                              <input
                                type="text"
                                class="form-control shadow-none tags"
                                placeholder="{{ __('translate.Tags') }}"
                                name="tags"
                                value="{{ old('tags') }}"
                                id="tags"
                              />
                            </div>
                          </div>


                        <div class="col-12">
                          <div class="form-container">
                            <label for="seo_title" class="form-label"
                              >{{ __('translate.SEO Title') }}</label
                            >
                            <input
                              type="text"
                              class="form-control shadow-none"
                              placeholder="{{ __('translate.SEO Title') }}"
                              name="seo_title"
                              value="{{ old('seo_title') }}"
                              id="seo_title"
                            />
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-container">
                            <label for="seo_description" class="form-label"
                              >{{ __('translate.SEO Description') }}</label
                            >
                            <textarea rows="5" class="form-control shadow-none" name="seo_description" id="" cols="30" rows="10" placeholder="{{ __('translate.SEO Description') }}">{{ old('seo_description') }}</textarea>
                          </div>
                        </div>



                      </div>
                    </div>
                  </div>


                <!-- Submit Btn -->
                <div>
                  <button class="w-btn-secondary-lg">
                    {{ __('translate.Publish Now') }}
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
    <link rel="stylesheet" href="{{ asset('global/tagify/tagify.css') }}">
    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }
    </style>
@endpush

@push('js_section')
    <script>
        document.getElementById('category-select').addEventListener('change', function() {
            var categoryId = this.value;
            var subcategorySelect = document.getElementById('subcategory-select');

            // Clear the subcategory dropdown
            subcategorySelect.innerHTML = '<option value="">{{ __('translate.Select Subcategory') }}</option>';

            if (categoryId) {
                // Make an AJAX request to fetch subcategories
                fetch("{{ url('/seller/get-subcategories') }}/" + categoryId)
                    .then(response => response.json())
                    .then(data => {
                        // Populate the subcategory dropdown
                        data.forEach(function(subcategory) {
                            var option = document.createElement('option');
                            option.value = subcategory.id;

                            // Handle missing translation gracefully
                            var subcategoryName = subcategory.translate ? subcategory.translate.name : 'No Name Available';
                            option.textContent = subcategoryName;

                            subcategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching subcategories:', error));
            }
        });

    </script>

    <script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('global/tagify/tagify.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $("#title").on("keyup",function(e){
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
                    $("#slug").val(slug);
                })

                $('.tags').tagify();

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
