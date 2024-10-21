@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Edit Job Post') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Edit Job Post') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Job Post') }} >> {{ __('translate.Edit Job Post') }}</p>
@endsection

@section('body-content')

<!-- crancy Dashboard -->
<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12">
                <div class="crancy-body">
                    <!-- Dashboard Inner -->
                    <div class="crancy-dsinner">
                        <div class="row">
                            <div class="col-12 mg-top-30">
                                <!-- Product Card E-->
                                <div class="crancy-product-card translation_main_box">

                                    <div class="crancy-customer-filter">
                                        <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                            <div class="crancy-header__form crancy-header__form--customer">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Switch to language translation') }}</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="translation_box">
                                        <ul >
                                            @foreach ($language_list as $language)
                                            <li><a href="{{ route('admin.jobpost.edit', ['jobpost' => $job_post->id, 'lang_code' => $language->lang_code] ) }}">
                                                @if (request()->get('lang_code') == $language->lang_code)
                                                    <i class="fas fa-eye"></i>
                                                @else
                                                    <i class="fas fa-edit"></i>
                                                @endif

                                                {{ $language->lang_name }}</a></li>
                                            @endforeach
                                        </ul>

                                        <div class="alert alert-secondary" role="alert">

                                            @php
                                                $edited_language = $language_list->where('lang_code', request()->get('lang_code'))->first();
                                            @endphp

                                        <p>{{ __('translate.Your editing mode') }} : <b>{{ $edited_language->lang_name }}</b></p>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Product Card -->
                            </div>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End crancy Dashboard -->

    <form action="{{ route('admin.jobpost.update', $job_post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="lang_code" value="{{ $job_post_translate->lang_code }}">
        <input type="hidden" name="translate_id" value="{{ $job_post_translate->id }}">

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Basic Information') }}</h4>
                                        </div>

                                        <div class="row">

                                            @if (admin_lang() == request()->get('lang_code'))
                                            <div class="col-12 mg-top-form-20">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="crancy__item-form--group w-100 h-100">
                                                            <label class="crancy__item-label">{{ __('translate.Thumbnail Image') }} </label>
                                                            <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                <input type="file" class="btn-check" name="thumb_image" id="input-img1" autocomplete="off" onchange="previewImage(event)">
                                                                <label class="crancy-image-video-upload__label" for="input-img1">
                                                                    <img id="view_img" src="{{ asset($job_post->thumb_image) }}">
                                                                    <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.User/Buyer') }} * </label>
                                                    <select class="form-select crancy__item-input" name="user_id">
                                                        <option value="">{{ __('translate.Select User') }}</option>
                                                        @foreach ($agents as $agent)
                                                            <option  {{ $agent->id == $job_post->user_id ? 'selected' : '' }} value="{{ $agent->id }}">{{ $agent->name }} - {{ $agent->email }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            @endif

                                            <div class="{{ admin_lang() == request()->get('lang_code') ? 'col-md-6' : 'col-12' }}">

                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Title') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="title" id="title" value="{{ html_decode($job_post_translate->title) }}">
                                                </div>
                                            </div>


                                            @if (admin_lang() == request()->get('lang_code'))
                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Slug') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="slug" id="slug" value="{{ html_decode($job_post->slug) }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Category') }} * </label>
                                                    <select class="form-select crancy__item-input" name="category_id">
                                                        <option value="">{{ __('translate.Select Category') }}</option>
                                                        @foreach ($categories as $category)
                                                            <option  {{ $category->id == $job_post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->translate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.City') }} * </label>
                                                    <select class="form-select crancy__item-input " name="city_id">
                                                        <option value="">{{ __('translate.Select City') }}</option>
                                                        @foreach ($cities as $city)
                                                            <option {{ $city->id == $job_post->city_id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->translate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Start Price') }} * </label>
                                                    <input class="crancy__item-input" type="text" name="regular_price" id="regular_price" value="{{ html_decode($job_post->regular_price) }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Job Type') }} * </label>
                                                    <select class="form-select crancy__item-input" name="job_type">
                                                        <option {{ 'Hourly' == $job_post->job_type ? 'selected' : '' }} value="Hourly">{{ __('translate.Hourly') }}</option>
                                                        <option {{ 'Daily' == $job_post->job_type ? 'selected' : '' }} value="Daily">{{ __('translate.Daily') }}</option>
                                                        <option {{ 'Monthly' == $job_post->job_type ? 'selected' : '' }} value="Monthly">{{ __('translate.Monthly') }}</option>
                                                        <option {{ 'Yearly' == $job_post->job_type ? 'selected' : '' }} value="Yearly">{{ __('translate.Yearly') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            @endif

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Description') }} * </label>

                                                    <textarea class="crancy__item-input crancy__item-textarea summernote"  name="description" id="description">{!! html_decode($job_post_translate->description) !!}</textarea>

                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                    <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                        <label class="crancy__item-switch">
                                                        <input {{ $job_post->status == 'enable' ? 'checked' : '' }} name="status" type="checkbox" >
                                                        <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update Data') }}</button>

                                        @if ($job_post->approved_by_admin == 'pending')
                                            <button class="crancy-btn mg-top-25 approval_button" type="button" data-bs-toggle="modal" data-bs-target="#approvalModal">{{ __('translate.Make Approval') }}</button>
                                        @endif

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    </form>


    <!-- Approved Confirmation Modal -->
    <div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Approval Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to approved this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.jobpost-approval', $job_post->id) }}" class="delet_modal_form" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Approved') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>



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

