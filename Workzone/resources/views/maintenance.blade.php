

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ env('APP_NAME') }} || {{ __('translate.Maintenance') }}</title>

    <link rel="shortcut icon" href="{{ asset($general_setting->favicon) }}" type="image/x-icon">

    <!-- GLightBox -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/glightbox.min.css') }}" />
    <!-- Aos -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" />
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}" />
    <!-- Quill CSS -->
    <link href="{{ asset('frontend/assets/css/quill.core.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/quill.snow.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Font-awesome CSS -->
    <link href="{{ asset('frontend/assets/css/font-awesome-all.min.css') }}" rel="stylesheet" />
    <!-- Swiper CSS -->
    <link href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" rel="stylesheet" />
    <!-- Main CSS -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/job_post.css') }}" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link href="{{ asset('frontend/assets/css/resposive.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">

  </head>
  <body>


    <main>
        <section class="bg-offWhite py-80 h-100vh">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-7 col-12">

                @php
                    $maintenance_text = Modules\GlobalSetting\App\Models\GlobalSetting::where('key', 'maintenance_text')->first();
                    $maintenance_image = Modules\GlobalSetting\App\Models\GlobalSetting::where('key', 'maintenance_image')->first();
                @endphp


                <div
                  class=" p-5 rounded-3 not-found-img d-flex flex-column flex-wrap align-items-center"
                >
                  <img
                    src="{{ asset($maintenance_image->value) }}"
                    class="img-fluid"
                    alt=""
                  />
                </div>
                <div class="text-center not-found-text">

                  <p >{!! clean(nl2br($maintenance_text->value)) !!}</p>

                </div>
              </div>
            </div>
          </div>
        </section>
      </main>



      <!-- Jquery -->
      <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
      <!-- Migrate  -->
      <script src="{{ asset('frontend/assets/js/jquery-migrate.min.js') }}"></script>
      <!-- CounterUp  -->
      <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
      <!-- Waypoint -->
      <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
      <!-- Nice Select -->
      <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
      <!-- Isotope -->
      <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
      <!-- ImgLoaded -->
      <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
      <!-- AOS -->
      <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
      <!-- Quill Editor -->
      <script src="{{ asset('frontend/assets/js/quill.js') }}"></script>
      <!-- GLightBox -->
      <script src="{{ asset('frontend/assets/js/glightbox.min.js') }}"></script>
      <!-- Popper -->
      <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
      <!-- Swiper -->
      <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
      <!-- Main -->
      <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    </body>
  </html>
