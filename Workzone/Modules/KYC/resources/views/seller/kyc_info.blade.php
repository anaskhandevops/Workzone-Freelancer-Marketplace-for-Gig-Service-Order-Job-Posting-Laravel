@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || Manage KYC') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4 pb-110">
      <!-- Header -->
      <div>
        <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Manage KYC') }}</h3>
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
          <li class="text-lime-300 fs-6">{{ __('translate.KYC') }}</li>
        </ul>
      </div>
      <!-- Content -->
      <div>
        <div class="row justify-content-center">
          <div class="col-xl-8">
            @if ($kyc)
            <div class="d-flex flex-column gap-4">
                <!-- Project Info -->
                <div class="gig-info-card">
                    <!-- Header -->
                    <div class="gig-info-header">
                        <h4 class="text-18 fw-semibold text-dark-300">
                        {{ __('translate.KYC Verifaction') }}
                        </h4>
                    </div>
                    <div class="gig-info-body bg-white p-4 rounded">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <a href="{{ asset($kyc->file) }}" class="d-block">
                                            <img class="img-fluid rounded" width="120" src="{{ asset($kyc->file) }}" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <h4 class="mb-1">{{ $kyc->kycType->name }}</h4>
                                        <p class="text-muted mb-2">
                                            {!! clean(html_decode($kyc->message)) !!}
                                        </p>
                                        <div>
                                            @if ($kyc->status == 0)
                                                <span class="badge bg-warning text-dark">{{__('translate.Pending')}}</span>
                                            @endif
                                            @if ($kyc->status == 1)
                                                <span class="badge bg-success">{{__('translate.Approved')}}</span>
                                            @endif
                                            @if ($kyc->status == 2)
                                                <span class="badge bg-danger">{{__('translate.Reject')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @else
                <form method="POST" enctype="multipart/form-data" action="{{ route('seller.kyc-submit') }}">
                    @csrf
                <div class="d-flex flex-column gap-4">
                    <!-- Project Info -->
                    <div class="gig-info-card">
                    <!-- Header -->
                    <div class="gig-info-header">
                        <h4 class="text-18 fw-semibold text-dark-300">
                        {{ __('translate.Send KYC Verifaction') }}
                        </h4>
                    </div>
                    <div class="gig-info-body bg-white">
                        <div class="row g-4">
                        <div class="col-12">
                            <div class="form-container">
                            <label for="category" class="form-label"
                                >{{__('translate.Select Document')}}*</label>
                            <select
                                id="category-select"
                                autocomplete="off"
                                class="form-select shadow-none"
                                name="kyc_id">
                                <option value="">{{__('translate.Select Type')}}</option>
                                @foreach ($kycType as $type)
                                    <option   {{ $type->id == old('kyc_id') ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label"
                            >{{ __('translate.Description') }}*</label
                            >

                            <textarea class="crancy__item-input crancy__item-textarea summernote"  name="message" id="description">{{ old('description') }}</textarea>

                        </div>
                        </div>
                    </div>

                    <div class="gig-info-card pt-3">
                        <!-- Header -->
                        <div class="gig-info-header">
                        <h4 class="text-18 fw-semibold text-dark-300">
                            {{ __('translate.Upload New Image') }}
                        </h4>
                        </div>
                        <div class="gig-info-body bg-white">
                        <p class="text-dark-200 mb-2">{{ __('translate.Upload New Image') }} *</p>
                        <div class="d-flex flex-wrap gap-3">
                            <div>
                            <label for="gig-img" class="border text-center gig-file-upload">
                                <img   id="view_img" class="gig-img-icon" src="{{ asset($general_setting->placeholder_image) }}" alt="">
                                <p class="text-dark-200">Choose File</p>
                                <input class="d-none" type="file" accept="image/*" name="file" id="gig-img" onchange="previewImage(event)">
                            </label>
                            </div>

                        </div>
                        </div>
                    </div>
                    </div>

                    <div>
                    <button class="w-btn-secondary-lg">
                        {{ __('translate.Submit') }}
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
            @endif
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
