<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @yield('title')

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

    @stack('style_section')


    @if ($general_setting->google_analytic_status == 1)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $general_setting->google_analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $general_setting->google_analytic_id }}');
        </script>
    @endif


    @if ($general_setting->pixel_status == 1)
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $general_setting->pixel_app_id }}');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={{ $general_setting->pixel_app_id }}&ev=PageView&noscript=1"
    /></noscript>
    @endif

  </head>
  <body>
    <!-- Menu Start -->
    <header class="header-primary">
      <div class="container">
        <nav class="navbar navbar-expand-xl justify-content-between">
          <a href="{{ route('home') }}">
            <img src="{{ asset($general_setting->logo) }}" alt="" />
          </a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="d-block d-xl-none">
                <div class="logo">
                  <a href="{{ route('home') }}"
                    ><img src="{{ asset($general_setting->logo) }}" alt=""
                  /></a>
                </div>
              </li>

              @if ($general_setting->selected_theme == 'all_theme')
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  data-bs-auto-close="outside"
                  aria-expanded="false"
                  >{{ __('translate.Home') }}</a>
                <div class="dropdown-menu">
                  <div class="d-flex flex-column flex-xl-row">
                    <ul>
                      <li>
                        <a href="{{ route('home', ['theme' => 'one']) }}" class="dropdown-item"
                          ><span>{{ __('translate.Home One') }}</span></a
                        >
                      </li>

                      <li>
                        <a href="{{ route('home', ['theme' => 'two']) }}" class="dropdown-item"
                          ><span>{{ __('translate.Home Two') }}</span></a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">{{ __('translate.Home') }}</a>
              </li>
              @endif

              <li class="nav-item">
                <a class="nav-link" href="{{ route('services') }}">{{ __('translate.Services') }}</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('job-posts') }}">{{ __('translate.Job Post') }}</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('freelancers') }}">{{ __('translate.Freelancers') }}</a>
              </li>


              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  data-bs-auto-close="outside"
                  aria-expanded="false"
                  >{{ __('translate.Pages') }}</a
                >
                <ul class="dropdown-menu">

                  @if (checkModule('Subscription'))
                    @if ($general_setting->commission_type == 'subscription')
                      <li>
                        <a href="{{ route('seller.subscription.plan') }}" class="dropdown-item"
                          ><span>{{ __('translate.Subscription Plan') }}</span></a
                        >
                      </li>
                    @endif
                  @endif

                  <li>
                    <a href="{{ route('about-us') }}" class="dropdown-item"
                      ><span>{{ __('translate.About Us') }}</span></a
                    >
                  </li>

                  <li>
                    <a href="{{ route('blogs') }}" class="dropdown-item"
                      ><span>{{ __('translate.Our Blogs') }}</span></a
                    >
                  </li>

                  <li>
                    <a href="{{ route('privacy-policy') }}" class="dropdown-item"
                      ><span>{{ __('translate.Privacy Policy') }}</span></a
                    >
                  </li>

                  <li>
                    <a href="{{ route('terms-conditions') }}" class="dropdown-item"
                      ><span>{{ __('translate.Terms & Conditions') }}</span></a
                    >
                  </li>

                 <li>
                    <a href="{{ route('faq') }}" class="dropdown-item"
                      ><span>{{ __('translate.FAQ') }}</span></a
                    >
                  </li>

                  @foreach ($custom_pages as $custom_page)
                    <li>
                        <a href="{{ route('custom-page', $custom_page->slug) }}" class="dropdown-item"
                        ><span>{{ $custom_page->page_name }}</span></a
                        >
                    </li>
                  @endforeach

                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('contact-us') }}">{{ __('translate.Contact') }}</a>
              </li>
            </ul>
            <div class="d-flex align-items-center gap-4 mt-4">
              <div class="d-flex d-lg-none">
                @guest('web')
                    <a href="{{ route('buyer.login') }}" class="header-btn">
                @else
                    @if(Auth::guard('web')->user()->is_seller == 1)
                        <a href="{{ route('seller.dashboard') }}" class="header-btn">
                    @else
                         <a href="{{ route('buyer.dashboard') }}" class="header-btn">
                    @endif
                @endguest

                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="13"
                    height="17"
                    viewBox="0 0 13 17"
                    fill="none"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M6.5 7.55556C8.55134 7.55556 10.2143 5.86419 10.2143 3.77778C10.2143 1.69137 8.55134 0 6.5 0C4.44866 0 2.78571 1.69137 2.78571 3.77778C2.78571 5.86419 4.44866 7.55556 6.5 7.55556ZM6.5 17C10.0899 17 13 15.3086 13 13.2222C13 11.1358 10.0899 9.44444 6.5 9.44444C2.91015 9.44444 0 11.1358 0 13.2222C0 15.3086 2.91015 17 6.5 17Z"
                      fill="white"
                    /></svg>
                    @guest('web')
                        {{ __('translate.Sign In') }}
                    @else
                        {{ __('translate.Dashboard') }}
                    @endguest
                    </a>
              </div>
            </div>
          </div>
          <div class="navbar-right d-flex align-items-center gap-4">
            <div
              class="header-dropdown d-none d-sm-flex gap-2 align-items-center"
            >
              <div class="d-flex align-items-center">
                <svg
                  class="text-lime-300 flex-shrink-0 mt-n2"
                  width="8"
                  height="15"
                  viewBox="0 0 8 15"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6.14726 6.44268C5.54139 6.13511 4.89726 5.90077 4.2595 5.65765C3.8896 5.51704 3.53565 5.35301 3.22315 5.12453C2.60772 4.67342 2.7257 3.94112 3.44637 3.65112C3.65045 3.5691 3.86409 3.54274 4.08093 3.53102C4.91639 3.49002 5.7104 3.63062 6.46614 3.96455C6.84241 4.13152 6.96677 4.07879 7.09432 3.7185C7.22825 3.3377 7.33986 2.95104 7.46422 2.56731C7.54713 2.30954 7.44509 2.13964 7.18042 2.03126C6.69573 1.835 6.19828 1.6944 5.67532 1.61824C4.99292 1.52157 4.99292 1.51864 4.98973 0.888859C4.98654 0.0013019 4.98654 0.00130188 4.01716 0.00130188C3.87685 0.00130188 3.73654 -0.00162735 3.59624 0.00130188C3.14343 0.0130188 3.0669 0.0862495 3.05415 0.50513C3.04777 0.6926 3.05415 0.880071 3.05096 1.07047C3.04777 1.62702 3.04458 1.61824 2.46422 1.81157C1.06116 2.28024 0.193814 3.15901 0.10134 4.56504C0.0184316 5.80997 0.72634 6.65066 1.83922 7.26286C2.52481 7.64074 3.28374 7.86336 4.01078 8.15921C4.29458 8.27345 4.56563 8.40526 4.80159 8.58688C5.49994 9.11707 5.37239 9.99877 4.5433 10.3327C4.10006 10.5114 3.63131 10.5553 3.14981 10.4997C2.40682 10.4147 1.69573 10.236 1.02608 9.91675C0.633865 9.72928 0.519069 9.77907 0.385141 10.1687C0.270345 10.5055 0.168304 10.8453 0.0662633 11.1851C-0.0708541 11.6421 -0.019834 11.7504 0.455294 11.9643C1.06116 12.2338 1.70848 12.3714 2.36856 12.4681C2.88514 12.5443 2.90108 12.5648 2.90746 13.0569C2.91065 13.2795 2.91065 13.5051 2.91384 13.7277C2.91703 14.0089 3.06371 14.1729 3.3794 14.1788C3.73654 14.1846 4.09687 14.1846 4.45402 14.1758C4.74739 14.17 4.89726 14.0235 4.89726 13.7511C4.89726 13.4465 4.9132 13.1389 4.90045 12.8343C4.8845 12.5238 5.03119 12.3656 5.35644 12.2836C6.1058 12.0961 6.74356 11.727 7.23463 11.1763C8.59943 9.65312 8.07966 7.42397 6.14726 6.44268Z"
                    fill="currentColor"
                  />
                </svg>

                <form action="{{ route('currency-switcher') }}" id="currency_form">
                <select
                  id="currency_dropdown"
                  class="select-dropdown border-0 shadow-none ps-1"
                  name="currency_code"
                >
                    @foreach ($currency_list as $currency_item)
                        <option {{ Session::get('currency_code') == $currency_item->currency_code ? 'selected' : '' }} value="{{ $currency_item->currency_code }}">{{ $currency_item->currency_name }}</option>
                    @endforeach

                </select>
                </form>
              </div>
              <div class="d-flex align-items-center">
                <svg
                  class="text-lime-300 flex-shrink-0 mt-n2"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  viewBox="0 0 14 14"
                  fill="none"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M5.4881 2.14377C5.2365 2.77789 5.03173 3.54816 4.89336 4.41291C5.56283 4.35158 6.27016 4.31894 7.00002 4.31894C7.72988 4.31894 8.43721 4.35158 9.10668 4.41291C8.96831 3.54816 8.76354 2.77789 8.51194 2.14377C8.27012 1.53428 7.99547 1.07703 7.71771 0.780915C7.441 0.485938 7.1983 0.386864 7.00002 0.386864C6.80174 0.386864 6.55903 0.485938 6.28233 0.780915C6.00456 1.07703 5.72992 1.53428 5.4881 2.14377ZM4.50048 1.7455C4.18655 2.53672 3.94567 3.48985 3.79803 4.54354C3.07129 4.6516 2.40808 4.79577 1.83286 4.96975C1.16357 5.17217 0.583188 5.42386 0.158263 5.72771C0.104579 5.7661 0.0515911 5.80668 3.20909e-05 5.84945C0.469066 2.9266 2.6958 0.597519 5.55163 8.85086e-07C5.53747 0.0145331 5.52342 0.0292256 5.50949 0.0440711C5.10854 0.471503 4.77196 1.06123 4.50048 1.7455ZM8.4484 0C8.46257 0.0145325 8.47662 0.0292253 8.49055 0.0440711C8.8915 0.471503 9.22807 1.06123 9.49956 1.7455C9.81349 2.53672 10.0544 3.48985 10.202 4.54354C10.9287 4.6516 11.592 4.79577 12.1672 4.96975C12.8365 5.17217 13.4168 5.42386 13.8418 5.72772C13.8955 5.7661 13.9484 5.80668 14 5.84945C13.531 2.92661 11.3042 0.597517 8.4484 0ZM14 8.15034C13.9485 8.19312 13.8955 8.2337 13.8418 8.2721C13.4168 8.57595 12.8365 8.82764 12.1672 9.03007C11.592 9.20404 10.9287 9.34822 10.202 9.45627C10.0544 10.51 9.81349 11.4631 9.49956 12.2543C9.22807 12.9386 8.8915 13.5283 8.49055 13.9557C8.47655 13.9707 8.46243 13.9854 8.44819 14C11.3042 13.4026 13.5311 11.0733 14 8.15034ZM5.55185 14C5.53761 13.9854 5.52349 13.9707 5.50949 13.9557C5.10854 13.5283 4.77196 12.9386 4.50048 12.2543C4.18655 11.4631 3.94567 10.51 3.79803 9.45627C3.07129 9.34822 2.40808 9.20404 1.83286 9.03007C1.16357 8.82764 0.583188 8.57595 0.158263 8.2721C0.104568 8.2337 0.0515691 8.19312 0 8.15034C0.468976 11.0733 2.69584 13.4026 5.55185 14ZM2.13851 8.00291C2.58965 8.13936 3.10872 8.25764 3.68083 8.35255C3.64845 7.91282 3.63163 7.46069 3.63163 6.99991C3.63163 6.53912 3.64845 6.08699 3.68083 5.64727C3.10872 5.74218 2.58965 5.86046 2.13851 5.9969C1.52453 6.1826 1.0664 6.39307 0.773646 6.60242C0.467074 6.82164 0.440533 6.96373 0.440533 6.99991C0.440533 7.03608 0.467074 7.17818 0.773646 7.3974C1.0664 7.60674 1.52453 7.81721 2.13851 8.00291ZM4.69533 6.99991C4.69533 7.51552 4.71763 8.01627 4.75957 8.4965C5.45881 8.56879 6.21241 8.60849 7.00002 8.60849C7.78763 8.60849 8.54123 8.56879 9.24047 8.4965C9.28241 8.01627 9.3047 7.51552 9.3047 6.99991C9.3047 6.4843 9.28241 5.98354 9.24047 5.50331C8.54123 5.43102 7.78763 5.39133 7.00002 5.39133C6.21241 5.39133 5.45881 5.43102 4.75957 5.50331C4.71763 5.98354 4.69533 6.4843 4.69533 6.99991ZM5.4881 11.856C5.2365 11.2219 5.03173 10.4517 4.89336 9.58691C5.56283 9.64823 6.27016 9.68087 7.00002 9.68087C7.72988 9.68087 8.43721 9.64823 9.10668 9.58691C8.96831 10.4517 8.76354 11.2219 8.51194 11.856C8.27012 12.4655 7.99547 12.9228 7.71771 13.2189C7.441 13.5139 7.1983 13.613 7.00002 13.613C6.80174 13.613 6.55903 13.5139 6.28233 13.2189C6.00456 12.9228 5.72992 12.4655 5.4881 11.856ZM11.8615 8.00291C11.4104 8.13936 10.8913 8.25764 10.3192 8.35255C10.3516 7.91282 10.3684 7.46069 10.3684 6.99991C10.3684 6.53912 10.3516 6.08699 10.3192 5.64727C10.8913 5.74218 11.4104 5.86046 11.8615 5.9969C12.4755 6.1826 12.9336 6.39307 13.2264 6.60242C13.533 6.82164 13.5595 6.96373 13.5595 6.99991C13.5595 7.03609 13.533 7.17818 13.2264 7.3974C12.9336 7.60674 12.4755 7.81721 11.8615 8.00291Z"
                    fill="currentColor"
                  />
                </svg>
                <form action="{{ route('language-switcher') }}" id="language_form">
                <select id="language_dropdown" class="select-dropdown border-0 shadow-none ps-1" name="lang_code">
                    @foreach ($language_list as $language_item)
                    <option {{ Session::get('front_lang') == $language_item->lang_code ? 'selected' : '' }} value="{{ $language_item->lang_code }}">{{ $language_item->lang_name }}</option>
                    @endforeach
                </select>
                </form>
              </div>
            </div>
            <div class="align-items-center d-none d-lg-flex">

                @guest('web')
                    <a href="{{ route('buyer.login') }}" class="w-btn-secondary-lg">
                @else
                    @if(Auth::guard('web')->user()->is_seller == 1)
                        <a href="{{ route('seller.dashboard') }}" class="w-btn-secondary-lg">
                    @else
                         <a href="{{ route('buyer.dashboard') }}" class="w-btn-secondary-lg">
                    @endif

                @endguest
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="13"
                  height="17"
                  viewBox="0 0 13 17"
                  fill="none"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M6.5 7.55556C8.55134 7.55556 10.2143 5.86419 10.2143 3.77778C10.2143 1.69137 8.55134 0 6.5 0C4.44866 0 2.78571 1.69137 2.78571 3.77778C2.78571 5.86419 4.44866 7.55556 6.5 7.55556ZM6.5 17C10.0899 17 13 15.3086 13 13.2222C13 11.1358 10.0899 9.44444 6.5 9.44444C2.91015 9.44444 0 11.1358 0 13.2222C0 15.3086 2.91015 17 6.5 17Z"
                    fill="white"
                  /></svg>
                    @guest('web')
                        {{ __('translate.Sign In') }}
                    @else
                        {{ __('translate.Dashboard') }}
                    @endguest
                  </a
              >
            </div>
            <button
              class="navbar-toggler d-block d-xl-none"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav"
              aria-controls="navbarNav"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span></span>
            </button>
          </div>
        </nav>
      </div>
    </header>
    <!-- Menu End -->

    <!-- Secondary Nav -->
    <div class="d-none d-xl-block secondary-nav-wrapper">
      <div class="container">
        <div class="position-relative">
          <nav
            class="secondary-nav-container bg-white position-absolute w-100 start-0 z-3 border-top"
          >
            <ul
              class="secondary-nav d-flex  align-items-center"
            >
                @php
                    $menu_categories = Modules\Category\Entities\Category::where('status', 'enable')->latest()->take(10)->get();
                @endphp
                @foreach ($menu_categories as $category)
                <li><a href="{{ route('services', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                @endforeach

                <li>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="19" cy="19" r="19" fill="#F7F5F0" />
                        <path d="M17 19C17 20.0178 17.8283 20.8461 18.8462 20.8461C19.864 20.8461 20.6923 20.0178 20.6923 19C20.6923 17.9821 19.864 17.1538 18.8462 17.1538C17.8283 17.1538 17 17.9821 17 19Z" fill="#06131C" />
                        <path d="M17 25.1538C17 26.1716 17.8283 26.9999 18.8462 26.9999C19.864 26.9999 20.6923 26.1716 20.6923 25.1538C20.6923 24.1359 19.864 23.3076 18.8462 23.3076C17.8283 23.3076 17 24.1359 17 25.1538Z" fill="#06131C" />
                        <path d="M17 12.8462C17 13.864 17.8283 14.6923 18.8462 14.6923C19.864 14.6923 20.6923 13.864 20.6923 12.8462C20.6923 11.8283 19.864 11 18.8462 11C17.8283 11 17 11.8283 17 12.8462Z" fill="#06131C" />
                      </svg>
                    </button>
                </li>

            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!-- Secondary Nav End -->



    @yield('front-content')


    @if ($general_setting->tawk_status == 1)
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='{{ $general_setting->tawk_chat_link }}';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
    @endif



    @if ($general_setting->cookie_consent_status == 1)
        <!-- common-modal start  -->
        <div class="common-modal cookie_consent_modal d-none bg-white" >
            <button type="button" class="btn-close cookie_consent_close_btn" aria-label="Close"></button>

            <h5>{{ __('translate.Cookies') }}</h5>
            <p>{{ $general_setting->cookie_consent_message }}</p>

            <div class="common-modal-btn">
                <a href="javascript:;" class="report-modal-btn cookie_consent_accept_btn">{{ __('translate.Accept') }}</a>
            </div>

        </div>
        <!-- common-modal end  -->
    @endif


    <!-- Footer  -->
    <footer class="footer-area">
        <div class="bg-dark-300 pt-110">
          <div class="container">
            <!-- Newsletter -->
            <div
              class="footer-newsletter pb-60"
              data-aos="fade-right"
              data-aos-duration="1000"
              data-aos-easing="linear"
            >
              <div class="row justify-content-between row-gap-4">
                <div class="col-lg-6 col-xl-4">
                  <div>
                    <a href="{{ route('home') }}" class="d-block mb-4">
                      <img src="{{ asset($general_setting->footer_logo) }}" alt="" />
                    </a>
                    <p class="text-white">
                      {{ $footer->about_us }}
                    </p>
                  </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                  <div class="d-flex flex-column justify-content-end">
                    <h3 class="text-white mb-3">{{ __('translate.Subscribe to Our Newsletter') }}</h3>
                    <p class="footer-newsletter-desc mb-30">
                      {{ __('translate.We will keep you updated with the best new jobs.') }}
                    </p>
                    <form action="{{ route('store-newsletter') }}" method="POST">
                        @csrf
                      <div
                        class="relative footer-newsletter-form d-flex align-items-center justify-content-between"
                      >
                        <input
                          type="text"
                          class="form-control shadow-none"
                          placeholder="{{ __('translate.Enter your email address') }}"
                          name="email"
                        />
                        <button class="footer-newsletter-btn" type="submit">{{ __('translate.Subscribe') }}</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Footer Widgets -->
            <div class="footer-widgets py-60">
              <div class="row justify-content-between row-gap-4">
                <div
                  class="col-md-6 col-xl-3"
                  data-aos="fade-up"
                  data-aos-duration="1000"
                  data-aos-easing="linear"
                >
                  <div class="mb-5">
                    <h3 class="footer-widget-title fw-bold mb-4">{{ __('translate.Contact Us') }}</h3>
                    <ul class="footer-info-widget p-0">
                      <li
                        class="d-flex gap-3 align-items-center py-2 footer-info-widget-item"
                      >
                        <svg
                          width="17"
                          height="16"
                          viewBox="0 0 17 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M14.3497 15.9951C14.0086 15.9654 13.6674 15.9407 13.3263 15.9011C11.1211 15.654 9.07412 14.9472 7.19033 13.7708C5.2126 12.5351 3.61064 10.9237 2.39433 8.94161C1.41041 7.34507 0.762699 5.62496 0.441317 3.77634C0.302876 2.98054 0.233655 2.1798 0.223767 1.36917C0.213878 0.553599 0.75281 0 1.56863 0C2.49816 0 3.42275 0 4.35229 0C5.14338 0 5.67242 0.504171 5.6922 1.29503C5.71692 2.24405 5.85042 3.16837 6.13719 4.07291C6.29541 4.57708 6.19158 5.01205 5.85536 5.4223C5.40543 5.9759 4.99011 6.55422 4.56489 7.12759C4.54017 7.16219 4.53523 7.23633 4.555 7.27587C5.48454 9.05035 6.79973 10.4541 8.55002 11.4378C8.70824 11.5267 8.87141 11.6849 9.02468 11.675C9.17301 11.6651 9.31145 11.4872 9.45484 11.3834C9.95422 11.0077 10.4486 10.6222 10.948 10.2515C11.2595 10.0192 11.6106 9.95984 11.9863 10.0488C12.4659 10.1625 12.9406 10.3157 13.4251 10.3948C13.9097 10.4739 14.4091 10.4986 14.8986 10.5283C15.4375 10.5579 15.8528 10.7655 16.0951 11.2598C16.1495 11.3735 16.1791 11.502 16.2236 11.6256C16.2236 12.7179 16.2236 13.8103 16.2236 14.9076C16.1346 15.1053 16.0704 15.3179 15.9566 15.4958C15.7688 15.7924 15.4573 15.916 15.1309 16C14.8689 15.9951 14.6068 15.9951 14.3497 15.9951Z"
                            fill="currentColor"
                          />
                        </svg>
                        {{ $footer->phone }}
                      </li>
                      <li
                        class="d-flex gap-3 align-items-center py-2 footer-info-widget-item"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="17"
                          height="12"
                          viewBox="0 0 17 12"
                          fill="none"
                        >
                          <path
                            d="M17.0001 10.6994C16.9513 10.846 16.9069 10.9882 16.8626 11.1215C15.1461 9.41089 13.4384 7.71363 11.7263 6.01192C13.4473 4.30132 15.1549 2.60405 16.8714 0.902344C16.9069 1.00898 16.9557 1.1556 17.0001 1.30222C17.0001 4.43461 17.0001 7.56701 17.0001 10.6994Z"
                            fill="currentColor"
                          />
                          <path
                            d="M0.859375 0.125118C1.05897 0.0806868 1.23195 0.0406989 1.4005 0.00959711C1.45373 -0.00373221 1.51139 0.000710897 1.56461 0.000710897C6.18192 0.000710897 10.8037 0.000710897 15.421 0.005154C15.6472 0.005154 15.8734 0.0629144 16.0996 0.0940161C16.104 0.116232 16.104 0.134004 16.1085 0.15622C16.0685 0.196208 16.0286 0.240639 15.9887 0.280627C13.6512 2.63103 11.3182 4.98588 8.98069 7.33628C8.6569 7.66507 8.34198 7.66507 8.0182 7.34072C5.68071 4.98588 3.33879 2.63103 1.00131 0.276184C0.96139 0.236196 0.925907 0.196208 0.859375 0.125118Z"
                            fill="currentColor"
                          />
                          <path
                            d="M10.9856 6.754C12.6977 8.45571 14.4009 10.1485 16.1396 11.8769C15.9356 11.9213 15.7715 11.9613 15.5985 11.9924C15.532 12.0058 15.4654 11.9969 15.3989 11.9969C10.7949 11.9969 6.19534 11.9969 1.59135 11.9969C1.3474 11.9969 1.11232 11.9747 0.872803 11.8502C2.58932 10.1441 4.29254 8.45127 6.00906 6.74512C6.0268 6.75845 6.06672 6.79843 6.11107 6.83842C6.51913 7.24719 6.92276 7.65595 7.33082 8.06472C8.01832 8.7534 8.97194 8.7534 9.65943 8.06472C10.1118 7.62041 10.5598 7.1761 10.9856 6.754Z"
                            fill="currentColor"
                          />
                          <path
                            d="M0.114213 11.1218C0.0787293 10.9307 0.00332659 10.7263 0.00332659 10.522C-0.00110886 7.50954 -0.00110886 4.49711 0.00332659 1.48024C0.00332659 1.27586 0.0742938 1.07147 0.114213 0.875977C1.84404 2.59546 3.55169 4.29717 5.26821 6.00332C3.55612 7.70059 1.84847 9.39786 0.114213 11.1218Z"
                            fill="currentColor"
                          /></svg>{{ $footer->email }}
                      </li>
                      <li
                        class="d-flex gap-3 align-items-center py-2 footer-info-widget-item"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="16"
                          height="23"
                          viewBox="0 0 16 23"
                          fill="none"
                        >
                          <path
                            d="M8.22365 23C8.0718 23 7.91995 23 7.7681 23C7.28825 22.8742 6.94204 22.6047 6.69908 22.1674C4.82222 18.7474 2.92713 15.3333 1.03812 11.9133C0.157396 10.3201 -0.164525 8.63099 0.0784345 6.82812C0.503613 3.7375 2.86032 1.06615 5.91553 0.275521C6.40145 0.14974 6.91167 0.0898438 7.40366 0C7.79847 0 8.19328 0 8.58809 0C8.91608 0.0479167 9.25015 0.0838542 9.57207 0.14974C13.1982 0.8625 15.9194 4.09089 15.9983 7.74453C16.0287 9.27786 15.64 10.6974 14.899 12.0391C13.0525 15.3573 11.212 18.6875 9.38378 22.0177C9.11652 22.5029 8.78245 22.8682 8.22365 23ZM8.00498 3.95312C6.20708 3.95312 4.73111 5.39661 4.72503 7.16953C4.71896 8.96042 6.18279 10.4219 7.99284 10.4219C9.79074 10.4219 11.2667 8.97838 11.2728 7.20547C11.2789 5.41458 9.80896 3.95312 8.00498 3.95312Z"
                            fill="currentColor"
                          /></svg>{{ $footer->address }}
                      </li>
                    </ul>
                  </div>
                  <div>
                    <h3 class="footer-widget-title fw-bold mb-4">{{ __('translate.Download App') }}</h3>
                    <div class="d-flex gap-3">
                      <a href="{{ $footer->playstore }}" target="_blank">
                        <span>
                            <svg width="135" height="40" viewBox="0 0 135 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="134" height="39" rx="7.5" fill="black"/>
                                <rect x="0.5" y="0.5" width="134" height="39" rx="7.5" stroke="#A6A6A6"/>
                                <path d="M68.137 21.752C65.785 21.752 63.868 23.54 63.868 26.005C63.868 28.454 65.785 30.258 68.137 30.258C70.489 30.258 72.406 28.454 72.406 26.005C72.406 23.54 70.489 21.752 68.137 21.752ZM68.137 28.583C66.848 28.583 65.736 27.52 65.736 26.005C65.736 24.474 66.848 23.427 68.137 23.427C69.426 23.427 70.537 24.474 70.537 26.005C70.537 27.519 69.426 28.583 68.137 28.583ZM58.823 21.752C56.471 21.752 54.554 23.54 54.554 26.005C54.554 28.454 56.471 30.258 58.823 30.258C61.175 30.258 63.092 28.454 63.092 26.005C63.093 23.54 61.175 21.752 58.823 21.752ZM58.823 28.583C57.534 28.583 56.423 27.52 56.423 26.005C56.423 24.474 57.535 23.427 58.823 23.427C60.112 23.427 61.223 24.474 61.223 26.005C61.224 27.519 60.112 28.583 58.823 28.583ZM47.745 24.861H52.063C51.934 25.876 51.596 26.617 51.08 27.133C50.452 27.761 49.469 28.454 47.745 28.454C45.087 28.454 43.009 26.311 43.009 23.653C43.009 20.995 45.087 18.852 47.745 18.852C49.179 18.852 50.226 19.416 50.999 20.141L52.272 18.868C51.193 17.837 49.759 17.047 47.745 17.047C44.104 17.047 41.043 20.011 41.043 23.652C41.043 27.293 44.104 30.257 47.745 30.257C49.71 30.257 51.193 29.613 52.353 28.404C53.545 27.212 53.916 25.536 53.916 24.183C53.916 23.764 53.884 23.377 53.819 23.055H47.745V24.861ZM93.053 24.458C92.699 23.507 91.619 21.751 89.412 21.751C87.221 21.751 85.401 23.475 85.401 26.004C85.401 28.388 87.205 30.257 89.622 30.257C91.571 30.257 92.699 29.065 93.166 28.372L91.716 27.405C91.233 28.114 90.572 28.581 89.622 28.581C88.671 28.581 87.995 28.146 87.56 27.292L93.247 24.94L93.053 24.458ZM87.253 25.876C87.205 24.233 88.526 23.395 89.476 23.395C90.217 23.395 90.845 23.765 91.055 24.297L87.253 25.876ZM82.629 30H84.498V17.499H82.629V30ZM79.568 22.702H79.504C79.085 22.203 78.28 21.751 77.265 21.751C75.138 21.751 73.189 23.62 73.189 26.02C73.189 28.404 75.138 30.257 77.265 30.257C78.28 30.257 79.085 29.806 79.504 29.29H79.568V29.902C79.568 31.529 78.698 32.399 77.296 32.399C76.152 32.399 75.443 31.577 75.153 30.885L73.526 31.562C73.993 32.69 75.234 34.075 77.296 34.075C79.487 34.075 81.34 32.786 81.34 29.645V22.009H79.568V22.702ZM77.426 28.583C76.137 28.583 75.058 27.504 75.058 26.021C75.058 24.523 76.137 23.427 77.426 23.427C78.699 23.427 79.697 24.522 79.697 26.021C79.697 27.503 78.699 28.583 77.426 28.583ZM101.807 17.499H97.336V30H99.201V25.264H101.806C103.874 25.264 105.907 23.767 105.907 21.382C105.907 18.997 103.875 17.499 101.807 17.499ZM101.855 23.524H99.201V19.239H101.855C103.25 19.239 104.042 20.394 104.042 21.382C104.042 22.35 103.25 23.524 101.855 23.524ZM113.387 21.729C112.036 21.729 110.637 22.324 110.058 23.643L111.715 24.335C112.069 23.643 112.728 23.418 113.42 23.418C114.385 23.418 115.366 23.997 115.382 25.026V25.155C115.044 24.962 114.32 24.672 113.436 24.672C111.651 24.672 109.833 25.653 109.833 27.487C109.833 29.16 111.297 30.237 112.937 30.237C114.192 30.237 114.883 29.674 115.317 29.015H115.381V29.98H117.182V25.187C117.182 22.967 115.526 21.729 113.387 21.729ZM113.161 28.58C112.55 28.58 111.697 28.274 111.697 27.519C111.697 26.554 112.759 26.184 113.675 26.184C114.495 26.184 114.881 26.361 115.38 26.602C115.236 27.76 114.239 28.58 113.161 28.58ZM123.744 22.002L121.605 27.422H121.541L119.322 22.002H117.312L120.641 29.577L118.743 33.791H120.689L125.82 22.002H123.744ZM106.937 30H108.803V17.499H106.937V30Z" fill="white"/>
                                <path d="M47.376 9.79097H44.468V10.512H46.647C46.588 11.098 46.353 11.559 45.96 11.894C45.566 12.229 45.063 12.397 44.468 12.397C43.814 12.397 43.261 12.171 42.809 11.718C42.365 11.257 42.138 10.688 42.138 9.99997C42.138 9.31297 42.365 8.74297 42.809 8.28197C43.261 7.82997 43.814 7.60397 44.468 7.60397C44.803 7.60397 45.122 7.66197 45.415 7.78797C45.708 7.91397 45.943 8.08997 46.127 8.31597L46.68 7.76297C46.429 7.47797 46.11 7.25997 45.717 7.10097C45.323 6.94197 44.912 6.86597 44.468 6.86597C43.596 6.86597 42.859 7.16797 42.256 7.77097C41.652 8.37497 41.351 9.11997 41.351 9.99997C41.351 10.88 41.652 11.626 42.256 12.229C42.859 12.833 43.596 13.134 44.468 13.134C45.381 13.134 46.11 12.841 46.672 12.246C47.166 11.752 47.418 11.081 47.418 10.243C47.418 10.101 47.401 9.94997 47.376 9.79097Z" fill="white"/>
                                <path d="M48.524 6.99997V13H52.027V12.263H49.295V10.361H51.758V9.63997H49.295V7.73797H52.027V6.99997H48.524Z" fill="white"/>
                                <path d="M56.953 7.73797V6.99997H52.83V7.73797H54.506V13H55.277V7.73797H56.953Z" fill="white"/>
                                <path d="M60.7079 6.99997H59.9369V13H60.7079V6.99997Z" fill="white"/>
                                <path d="M65.8029 7.73797V6.99997H61.6799V7.73797H63.3559V13H64.1269V7.73797H65.8029Z" fill="white"/>
                                <path d="M73.605 7.77997C73.01 7.16797 72.281 6.86597 71.409 6.86597C70.538 6.86597 69.808 7.16797 69.213 7.77097C68.618 8.36597 68.325 9.11197 68.325 9.99997C68.325 10.889 68.618 11.634 69.213 12.229C69.808 12.833 70.538 13.134 71.409 13.134C72.272 13.134 73.01 12.833 73.605 12.229C74.2 11.634 74.493 10.889 74.493 9.99997C74.493 9.11997 74.2 8.37497 73.605 7.77997ZM69.767 8.28197C70.211 7.82997 70.755 7.60397 71.409 7.60397C72.063 7.60397 72.607 7.82997 73.043 8.28197C73.487 8.72697 73.705 9.30497 73.705 9.99997C73.705 10.696 73.487 11.274 73.043 11.718C72.607 12.171 72.063 12.397 71.409 12.397C70.755 12.397 70.211 12.171 69.767 11.718C69.331 11.266 69.113 10.696 69.113 9.99997C69.113 9.30497 69.331 8.73497 69.767 8.28197Z" fill="white"/>
                                <path d="M76.345 9.26297L76.312 8.10597H76.345L79.396 13H80.2V6.99997H79.429V10.512L79.463 11.668H79.429L76.513 6.99997H75.575V13H76.345V9.26297Z" fill="white"/>
                                <path d="M20.7173 19.4243L10.0703 30.7243C10.0713 30.7263 10.0713 30.7283 10.0723 30.7303C10.3983 31.9583 11.5193 32.8613 12.8493 32.8613C13.3813 32.8613 13.8803 32.7173 14.3083 32.4653L14.3423 32.4453L26.3263 25.5303L20.7173 19.4243Z" fill="#EB4335"/>
                                <path d="M31.4896 17.5004L31.4796 17.4934L26.3056 14.4934L20.4766 19.6804L26.3256 25.5284L31.4726 22.5594C32.3746 22.0724 32.9866 21.1214 32.9866 20.0244C32.9866 18.9354 32.3826 17.9884 31.4896 17.5004Z" fill="#FABC13"/>
                                <path d="M10.0707 9.27734C10.0067 9.51334 9.97266 9.76034 9.97266 10.0173V29.9843C9.97266 30.2413 10.0053 30.4893 10.0703 30.7243L21.0837 19.7133L10.0707 9.27734Z" fill="#547DBF"/>
                                <path d="M20.7953 20.0004L26.3063 14.4914L14.3353 7.55138C13.9003 7.29038 13.3933 7.14038 12.8493 7.14038C11.5193 7.14038 10.3973 8.04538 10.0703 9.27438L10.0707 9.27734L20.7953 20.0004Z" fill="#30A851"/>
                                </svg>

                        </span>
                      </a>
                      <a href="{{ $footer->appstore }}" target="_blank">
                        <span>
                            <svg width="120" height="40" viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="119" height="39" rx="7.5" fill="black"/>
                                <rect x="0.5" y="0.5" width="119" height="39" rx="7.5" stroke="#A6A6A6"/>
                                <path d="M24.77 20.3007C24.7807 19.4661 25.0024 18.6477 25.4145 17.9218C25.8265 17.1958 26.4154 16.5859 27.1265 16.1487C26.6748 15.5035 26.0788 14.9726 25.386 14.598C24.6932 14.2235 23.9226 14.0156 23.1354 13.991C21.4561 13.8147 19.8282 14.9958 18.9725 14.9958C18.1002 14.9958 16.7827 14.0085 15.364 14.0377C14.4463 14.0673 13.5519 14.3342 12.7681 14.8123C11.9842 15.2903 11.3375 15.9633 10.891 16.7656C8.95705 20.114 10.3996 25.035 12.2522 27.7416C13.1791 29.067 14.2624 30.5474 15.6799 30.4949C17.0669 30.4374 17.585 29.6105 19.2593 29.6105C20.918 29.6105 21.4041 30.4949 22.8503 30.4616C24.3387 30.4374 25.2764 29.1303 26.1708 27.7924C26.8368 26.8481 27.3492 25.8043 27.6892 24.6999C26.8245 24.3342 26.0866 23.722 25.5675 22.9397C25.0483 22.1574 24.771 21.2396 24.77 20.3007Z" fill="white"/>
                                <path d="M22.0383 12.211C22.8499 11.2367 23.2497 9.98457 23.1529 8.72034C21.913 8.85056 20.7678 9.44312 19.9453 10.3799C19.5431 10.8376 19.2351 11.37 19.0389 11.9468C18.8427 12.5236 18.762 13.1334 18.8016 13.7413C19.4217 13.7477 20.0352 13.6133 20.5959 13.3482C21.1565 13.0831 21.6497 12.6943 22.0383 12.211Z" fill="white"/>
                                <path d="M42.3025 27.1397H37.5691L36.4324 30.4961H34.4275L38.9109 18.0781H40.9939L45.4773 30.4961H43.4382L42.3025 27.1397ZM38.0593 25.5908H41.8113L39.9617 20.1436H39.91L38.0593 25.5908Z" fill="white"/>
                                <path d="M55.1599 25.9697C55.1599 28.7832 53.6541 30.5908 51.3816 30.5908C50.8059 30.6209 50.2334 30.4883 49.7296 30.2082C49.2259 29.9281 48.8111 29.5117 48.533 29.0068H48.49V33.4912H46.6316V21.4424H48.4304V22.9483H48.4646C48.7556 22.4458 49.1773 22.0316 49.6849 21.7498C50.1925 21.4679 50.7671 21.3289 51.3474 21.3477C53.6452 21.3477 55.1599 23.1641 55.1599 25.9697ZM53.2498 25.9697C53.2498 24.1367 52.3025 22.9317 50.8572 22.9317C49.4373 22.9317 48.4822 24.1621 48.4822 25.9697C48.4822 27.794 49.4373 29.0156 50.8572 29.0156C52.3025 29.0156 53.2498 27.8194 53.2498 25.9697Z" fill="white"/>
                                <path d="M65.1248 25.9697C65.1248 28.7832 63.6189 30.5908 61.3464 30.5908C60.7708 30.6209 60.1983 30.4883 59.6945 30.2082C59.1907 29.9281 58.776 29.5117 58.4978 29.0068H58.4548V33.4912H56.5964V21.4424H58.3952V22.9483H58.4294C58.7204 22.4458 59.1421 22.0316 59.6497 21.7498C60.1574 21.4679 60.7319 21.329 61.3122 21.3477C63.6101 21.3477 65.1248 23.1641 65.1248 25.9697ZM63.2146 25.9697C63.2146 24.1367 62.2673 22.9317 60.822 22.9317C59.4021 22.9317 58.447 24.1621 58.447 25.9697C58.447 27.794 59.4021 29.0156 60.822 29.0156C62.2673 29.0156 63.2146 27.8194 63.2146 25.9697Z" fill="white"/>
                                <path d="M71.7107 27.0361C71.8484 28.2676 73.0447 29.0761 74.6795 29.0761C76.2459 29.0761 77.3728 28.2676 77.3728 27.1572C77.3728 26.1933 76.6931 25.6162 75.0837 25.2207L73.4744 24.833C71.1941 24.2822 70.1355 23.2158 70.1355 21.4853C70.1355 19.3427 72.0027 17.8711 74.6541 17.8711C77.2781 17.8711 79.0769 19.3427 79.1375 21.4853H77.2615C77.1492 20.2461 76.1247 19.498 74.6277 19.498C73.1306 19.498 72.1062 20.2549 72.1062 21.3564C72.1062 22.2343 72.7605 22.7509 74.3611 23.1464L75.7292 23.4824C78.2771 24.0849 79.3357 25.1084 79.3357 26.9247C79.3357 29.248 77.4851 30.7031 74.5417 30.7031C71.7878 30.7031 69.9284 29.2822 69.8083 27.0361L71.7107 27.0361Z" fill="white"/>
                                <path d="M83.3464 19.2998V21.4424H85.0681V22.9141H83.3464V27.9053C83.3464 28.6807 83.6912 29.042 84.448 29.042C84.6524 29.0384 84.8564 29.0241 85.0593 28.999V30.4619C84.7191 30.5255 84.3732 30.5543 84.0271 30.5478C82.1941 30.5478 81.4792 29.8594 81.4792 28.1035V22.9141H80.1628V21.4424H81.4792V19.2998H83.3464Z" fill="white"/>
                                <path d="M86.0652 25.9697C86.0652 23.1211 87.743 21.3311 90.3592 21.3311C92.9842 21.3311 94.6541 23.1211 94.6541 25.9697C94.6541 28.8262 92.993 30.6084 90.3592 30.6084C87.7263 30.6084 86.0652 28.8262 86.0652 25.9697ZM92.7605 25.9697C92.7605 24.0156 91.865 22.8623 90.3592 22.8623C88.8533 22.8623 87.9588 24.0244 87.9588 25.9697C87.9588 27.9317 88.8533 29.0762 90.3592 29.0762C91.865 29.0762 92.7605 27.9317 92.7605 25.9697Z" fill="white"/>
                                <path d="M96.1863 21.4424H97.9587V22.9834H98.0017C98.1217 22.5021 98.4036 22.0768 98.8002 21.7789C99.1968 21.481 99.6838 21.3287 100.179 21.3477C100.394 21.3469 100.607 21.3702 100.816 21.417V23.1553C100.546 23.0727 100.264 23.0347 99.9812 23.043C99.7112 23.032 99.4421 23.0796 99.1922 23.1825C98.9424 23.2854 98.7178 23.4411 98.5338 23.639C98.3498 23.8369 98.2108 24.0723 98.1264 24.3289C98.042 24.5856 98.0141 24.8575 98.0447 25.126V30.4961H96.1863L96.1863 21.4424Z" fill="white"/>
                                <path d="M109.385 27.8369C109.135 29.4805 107.534 30.6084 105.486 30.6084C102.852 30.6084 101.218 28.8438 101.218 26.0127C101.218 23.1729 102.861 21.3311 105.408 21.3311C107.913 21.3311 109.488 23.0518 109.488 25.7969V26.4336H103.094V26.5459C103.064 26.8791 103.106 27.2148 103.216 27.5306C103.326 27.8464 103.502 28.1352 103.733 28.3778C103.963 28.6203 104.242 28.8111 104.552 28.9374C104.862 29.0637 105.195 29.1227 105.529 29.1104C105.968 29.1515 106.409 29.0498 106.786 28.8203C107.162 28.5909 107.455 28.246 107.62 27.8369L109.385 27.8369ZM103.102 25.1348H107.629C107.645 24.8352 107.6 24.5354 107.495 24.2542C107.391 23.9729 107.229 23.7164 107.02 23.5006C106.812 23.2849 106.561 23.1145 106.284 23.0003C106.006 22.8861 105.708 22.8305 105.408 22.8369C105.105 22.8351 104.805 22.8933 104.525 23.008C104.245 23.1227 103.991 23.2918 103.776 23.5054C103.562 23.7191 103.392 23.9731 103.276 24.2527C103.161 24.5324 103.102 24.8321 103.102 25.1348Z" fill="white"/>
                                <path d="M37.8264 8.73101C38.216 8.70305 38.607 8.76191 38.9711 8.90334C39.3352 9.04478 39.6634 9.26526 39.932 9.54888C40.2006 9.83251 40.4029 10.1722 40.5243 10.5435C40.6457 10.9147 40.6832 11.3083 40.634 11.6959C40.634 13.6021 39.6038 14.6979 37.8264 14.6979H35.6711V8.73101H37.8264ZM36.5979 13.854H37.7229C38.0013 13.8707 38.2799 13.825 38.5385 13.7204C38.797 13.6158 39.029 13.4548 39.2174 13.2493C39.4059 13.0437 39.5462 12.7987 39.6281 12.5321C39.7099 12.2655 39.7313 11.9839 39.6907 11.708C39.7284 11.4332 39.7048 11.1534 39.6217 10.8887C39.5386 10.6241 39.398 10.3811 39.2099 10.1771C39.0218 9.97321 38.791 9.81341 38.5339 9.70917C38.2768 9.60493 37.9999 9.55885 37.7229 9.57422H36.5979V13.854Z" fill="white"/>
                                <path d="M41.6809 12.4444C41.6526 12.1484 41.6865 11.8499 41.7803 11.5678C41.8741 11.2857 42.0259 11.0264 42.2258 10.8064C42.4258 10.5864 42.6695 10.4107 42.9413 10.2904C43.2132 10.1701 43.5072 10.108 43.8044 10.108C44.1017 10.108 44.3957 10.1701 44.6675 10.2904C44.9394 10.4107 45.1831 10.5864 45.3831 10.8064C45.583 11.0264 45.7348 11.2857 45.8286 11.5678C45.9224 11.8499 45.9563 12.1484 45.928 12.4444C45.9568 12.7406 45.9234 13.0396 45.8298 13.3221C45.7362 13.6046 45.5845 13.8644 45.3845 14.0848C45.1845 14.3053 44.9406 14.4814 44.6685 14.6019C44.3964 14.7225 44.1021 14.7847 43.8044 14.7847C43.5068 14.7847 43.2125 14.7225 42.9404 14.6019C42.6682 14.4814 42.4243 14.3053 42.2243 14.0848C42.0244 13.8644 41.8727 13.6046 41.7791 13.3221C41.6855 13.0396 41.6521 12.7406 41.6809 12.4444ZM45.0139 12.4444C45.0139 11.4683 44.5754 10.8975 43.8059 10.8975C43.0334 10.8975 42.5989 11.4683 42.5989 12.4444C42.5989 13.4283 43.0335 13.9947 43.8059 13.9947C44.5754 13.9946 45.0139 13.4243 45.0139 12.4444Z" fill="white"/>
                                <path d="M51.5735 14.6978H50.6516L49.721 11.3814H49.6506L48.7239 14.6978H47.8108L46.5696 10.1948H47.471L48.2776 13.6308H48.344L49.2698 10.1948H50.1223L51.0481 13.6308H51.1184L51.9211 10.1948H52.8098L51.5735 14.6978Z" fill="white"/>
                                <path d="M53.8538 10.1948H54.7092V10.9102H54.7756C54.8883 10.6532 55.0783 10.4379 55.3192 10.2941C55.56 10.1503 55.8398 10.0852 56.1194 10.1079C56.3385 10.0914 56.5585 10.1245 56.7631 10.2046C56.9677 10.2847 57.1516 10.4098 57.3013 10.5706C57.451 10.7315 57.5626 10.9239 57.6278 11.1337C57.693 11.3436 57.7101 11.5654 57.678 11.7827V14.6977H56.7893V12.0059C56.7893 11.2822 56.4749 10.9224 55.8176 10.9224C55.6689 10.9154 55.5204 10.9408 55.3823 10.9966C55.2443 11.0524 55.1199 11.1374 55.0178 11.2458C54.9157 11.3542 54.8382 11.4834 54.7906 11.6245C54.7431 11.7657 54.7267 11.9154 54.7424 12.0635V14.6978H53.8538L53.8538 10.1948Z" fill="white"/>
                                <path d="M59.094 8.43701H59.9827V14.6978H59.094V8.43701Z" fill="white"/>
                                <path d="M61.218 12.4444C61.1897 12.1484 61.2236 11.8498 61.3175 11.5677C61.4113 11.2857 61.5631 11.0263 61.7631 10.8063C61.963 10.5863 62.2068 10.4106 62.4786 10.2903C62.7505 10.17 63.0445 10.1079 63.3418 10.1079C63.6391 10.1079 63.9331 10.17 64.205 10.2903C64.4768 10.4106 64.7206 10.5863 64.9205 10.8063C65.1205 11.0263 65.2723 11.2857 65.3661 11.5677C65.46 11.8498 65.4939 12.1484 65.4656 12.4444C65.4944 12.7406 65.4609 13.0396 65.3673 13.3221C65.2737 13.6046 65.122 13.8644 64.922 14.0848C64.7219 14.3052 64.478 14.4814 64.2059 14.6019C63.9338 14.7224 63.6394 14.7847 63.3418 14.7847C63.0442 14.7847 62.7498 14.7224 62.4777 14.6019C62.2056 14.4814 61.9616 14.3052 61.7616 14.0848C61.5616 13.8644 61.4099 13.6046 61.3163 13.3221C61.2227 13.0396 61.1892 12.7406 61.218 12.4444ZM64.551 12.4444C64.551 11.4683 64.1125 10.8975 63.343 10.8975C62.5706 10.8975 62.136 11.4683 62.136 12.4444C62.136 13.4283 62.5706 13.9947 63.343 13.9947C64.1125 13.9946 64.551 13.4243 64.551 12.4444Z" fill="white"/>
                                <path d="M66.4011 13.4243C66.4011 12.6138 67.0046 12.1465 68.0759 12.0801L69.2957 12.0098V11.6211C69.2957 11.1455 68.9812 10.877 68.3738 10.877C67.8777 10.877 67.5339 11.0591 67.4353 11.3775H66.575C66.6658 10.604 67.3933 10.1079 68.4148 10.1079C69.5437 10.1079 70.1804 10.6699 70.1804 11.6211V14.6978H69.325V14.065H69.2546C69.1119 14.292 68.9115 14.477 68.6739 14.6012C68.4363 14.7254 68.1699 14.7843 67.9021 14.772C67.7131 14.7916 67.522 14.7715 67.3413 14.7128C67.1605 14.6541 66.994 14.5581 66.8526 14.4312C66.7112 14.3042 66.598 14.149 66.5202 13.9756C66.4424 13.8022 66.4019 13.6144 66.4011 13.4243ZM69.2957 13.0396V12.6631L68.196 12.7334C67.5759 12.7749 67.2947 12.9859 67.2947 13.3828C67.2947 13.7881 67.6462 14.0239 68.1297 14.0239C68.2713 14.0383 68.4144 14.024 68.5504 13.9819C68.6864 13.9398 68.8126 13.8708 68.9213 13.7789C69.0301 13.6871 69.1193 13.5743 69.1836 13.4473C69.2479 13.3203 69.286 13.1816 69.2957 13.0396Z" fill="white"/>
                                <path d="M71.3484 12.4444C71.3484 11.0215 72.0798 10.1201 73.2175 10.1201C73.4989 10.1072 73.7782 10.1746 74.0228 10.3145C74.2673 10.4544 74.4669 10.661 74.5984 10.9101H74.6648V8.43701H75.5535V14.6978H74.7019V13.9863H74.6316C74.49 14.2338 74.2834 14.4378 74.0341 14.5763C73.7849 14.7148 73.5025 14.7825 73.2175 14.772C72.072 14.772 71.3484 13.8706 71.3484 12.4444ZM72.2664 12.4444C72.2664 13.3994 72.7166 13.9741 73.4695 13.9741C74.2185 13.9741 74.6814 13.3911 74.6814 12.4483C74.6814 11.5098 74.2137 10.9185 73.4695 10.9185C72.7214 10.9185 72.2664 11.4971 72.2664 12.4444Z" fill="white"/>
                                <path d="M79.2302 12.4444C79.2019 12.1484 79.2358 11.8499 79.3296 11.5678C79.4234 11.2857 79.5752 11.0264 79.7751 10.8064C79.9751 10.5864 80.2188 10.4107 80.4906 10.2904C80.7625 10.1701 81.0565 10.108 81.3538 10.108C81.651 10.108 81.945 10.1701 82.2169 10.2904C82.4887 10.4107 82.7324 10.5864 82.9324 10.8064C83.1323 11.0264 83.2841 11.2857 83.3779 11.5678C83.4717 11.8499 83.5056 12.1484 83.4773 12.4444C83.5061 12.7406 83.4727 13.0396 83.3791 13.3221C83.2855 13.6046 83.1338 13.8644 82.9338 14.0848C82.7339 14.3053 82.49 14.4814 82.2178 14.6019C81.9457 14.7225 81.6514 14.7847 81.3538 14.7847C81.0561 14.7847 80.7618 14.7225 80.4897 14.6019C80.2176 14.4814 79.9737 14.3053 79.7737 14.0848C79.5737 13.8644 79.422 13.6046 79.3284 13.3221C79.2348 13.0396 79.2014 12.7406 79.2302 12.4444ZM82.5632 12.4444C82.5632 11.4683 82.1247 10.8975 81.3552 10.8975C80.5828 10.8975 80.1482 11.4683 80.1482 12.4444C80.1482 13.4283 80.5828 13.9947 81.3552 13.9947C82.1248 13.9946 82.5632 13.4243 82.5632 12.4444Z" fill="white"/>
                                <path d="M84.6697 10.1948H85.5251V10.9102H85.5916C85.7042 10.6532 85.8942 10.4379 86.1351 10.2941C86.376 10.1503 86.6557 10.0852 86.9353 10.1079C87.1544 10.0914 87.3744 10.1245 87.579 10.2046C87.7836 10.2847 87.9676 10.4098 88.1172 10.5706C88.2669 10.7315 88.3785 10.9239 88.4437 11.1337C88.5089 11.3436 88.5261 11.5654 88.4939 11.7827V14.6977H87.6052V12.0059C87.6052 11.2822 87.2908 10.9224 86.6336 10.9224C86.4848 10.9154 86.3363 10.9408 86.1982 10.9966C86.0602 11.0524 85.9358 11.1374 85.8337 11.2458C85.7316 11.3542 85.6541 11.4834 85.6066 11.6245C85.559 11.7657 85.5426 11.9154 85.5583 12.0635V14.6978H84.6697V10.1948Z" fill="white"/>
                                <path d="M93.5154 9.07374V10.2153H94.491V10.9639H93.5154V13.2793C93.5154 13.751 93.7097 13.9575 94.1521 13.9575C94.2654 13.9572 94.3785 13.9503 94.491 13.937V14.6773C94.3314 14.7058 94.1697 14.721 94.0076 14.7227C93.0193 14.7227 92.6257 14.375 92.6257 13.5068V10.9638H91.9109V10.2153H92.6257V9.07374H93.5154Z" fill="white"/>
                                <path d="M95.7048 8.43701H96.5857V10.9185H96.656C96.7741 10.6591 96.9694 10.4425 97.2151 10.2982C97.4608 10.1539 97.745 10.0888 98.029 10.1118C98.247 10.1 98.4649 10.1364 98.6671 10.2184C98.8694 10.3004 99.0511 10.4261 99.1992 10.5864C99.3473 10.7468 99.4583 10.9378 99.524 11.146C99.5898 11.3541 99.6088 11.5742 99.5798 11.7905V14.6978H98.6902V12.0098C98.6902 11.2905 98.3552 10.9263 97.7273 10.9263C97.5746 10.9137 97.421 10.9347 97.2772 10.9878C97.1334 11.0408 97.003 11.1247 96.895 11.2334C96.787 11.3421 96.704 11.4732 96.652 11.6173C96.5999 11.7614 96.58 11.9152 96.5936 12.0679V14.6977H95.7049L95.7048 8.43701Z" fill="white"/>
                                <path d="M104.761 13.4819C104.641 13.8935 104.379 14.2495 104.022 14.4876C103.666 14.7258 103.237 14.8309 102.81 14.7847C102.514 14.7925 102.219 14.7357 101.946 14.6182C101.674 14.5006 101.43 14.3252 101.232 14.1041C101.034 13.8829 100.887 13.6214 100.8 13.3376C100.714 13.0537 100.69 12.7544 100.73 12.4605C100.691 12.1656 100.715 11.8656 100.802 11.581C100.888 11.2963 101.035 11.0335 101.232 10.8105C101.428 10.5874 101.671 10.4092 101.943 10.288C102.214 10.1668 102.509 10.1054 102.806 10.1079C104.059 10.1079 104.815 10.9639 104.815 12.3779V12.688H101.635V12.7378C101.622 12.9031 101.642 13.0694 101.696 13.2261C101.751 13.3829 101.837 13.5266 101.95 13.6481C102.063 13.7695 102.2 13.866 102.352 13.9314C102.505 13.9968 102.669 14.0297 102.835 14.0278C103.047 14.0533 103.263 14.0151 103.453 13.9178C103.644 13.8206 103.802 13.6689 103.906 13.4819L104.761 13.4819ZM101.635 12.0308H103.91C103.921 11.8796 103.901 11.7278 103.85 11.5851C103.799 11.4424 103.718 11.3119 103.614 11.2021C103.51 11.0922 103.383 11.0054 103.243 10.9472C103.104 10.8891 102.953 10.8608 102.801 10.8643C102.648 10.8623 102.495 10.8912 102.353 10.9491C102.211 11.0071 102.081 11.0929 101.973 11.2017C101.864 11.3104 101.778 11.4397 101.72 11.5821C101.662 11.7245 101.633 11.8771 101.635 12.0308Z" fill="white"/>
                                </svg>

                        </span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3">
                  <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-easing="linear"
                  >
                    <h3 class="footer-widget-title fw-bold mb-4">{{ __('translate.Service Categories') }}</h3>
                    <nav>
                      <ul class="footer-nav-list list-unstyled">
                        @foreach ($footer_categories as $category)


                        <li class="footer-nav-list-item py-1">
                          <a
                            href="{{ route('services', ['category' => $category->slug]) }}"
                            class="footer-nav-link d-flex gap-2 align-items-center"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="13"
                              height="10"
                              viewBox="0 0 13 10"
                              fill="none"
                            >
                              <path
                                d="M8.57894 9L12.2456 5M12.2456 5L8.57894 0.999999M12.2456 5L1.24561 5"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            {{ $category->name }}
                          </a>
                        </li>
                        @endforeach

                      </ul>
                    </nav>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3">
                  <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-easing="linear"
                  >
                    <h3 class="footer-widget-title fw-bold mb-4">{{ __('translate.Blog Categories') }}</h3>
                    <nav>
                      <ul class="footer-nav-list list-unstyled">
                        @foreach ($footer_blog_categories as $blog_category)
                        <li class="footer-nav-list-item py-1">
                          <a
                            href="{{ route('blogs', ['category' => $blog_category->id]) }}"
                            class="footer-nav-link d-flex gap-2 align-items-center"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="13"
                              height="10"
                              viewBox="0 0 13 10"
                              fill="none"
                            >
                              <path
                                d="M8.57894 9L12.2456 5M12.2456 5L8.57894 0.999999M12.2456 5L1.24561 5"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            {{ $blog_category->name }}
                          </a>
                        </li>
                        @endforeach

                      </ul>
                    </nav>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3">
                  <div
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    data-aos-easing="linear"
                  >
                    <h3 class="footer-widget-title fw-bold mb-4">
                      {{ __('translate.Important Links') }}
                    </h3>
                    <nav>
                      <ul class="footer-nav-list list-unstyled">
                        <li class="footer-nav-list-item py-1">
                          <a
                            href="{{ route('terms-conditions') }}"
                            class="footer-nav-link d-flex gap-2 align-items-center"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="13"
                              height="10"
                              viewBox="0 0 13 10"
                              fill="none"
                            >
                              <path
                                d="M8.57894 9L12.2456 5M12.2456 5L8.57894 0.999999M12.2456 5L1.24561 5"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            {{ __('translate.Terms & Conditions') }}
                          </a>
                        </li>
                        <li class="footer-nav-list-item py-2">
                          <a
                            href="{{ route('privacy-policy') }}"
                            class="footer-nav-link d-flex gap-2 align-items-center"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="13"
                              height="10"
                              viewBox="0 0 13 10"
                              fill="none"
                            >
                              <path
                                d="M8.57894 9L12.2456 5M12.2456 5L8.57894 0.999999M12.2456 5L1.24561 5"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            {{ __('translate.Privacy Policy') }}
                          </a>
                        </li>
                        <li class="footer-nav-list-item py-2">
                          <a
                            href="{{ route('about-us') }}"
                            class="footer-nav-link d-flex gap-2 align-items-center"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="13"
                              height="10"
                              viewBox="0 0 13 10"
                              fill="none"
                            >
                              <path
                                d="M8.57894 9L12.2456 5M12.2456 5L8.57894 0.999999M12.2456 5L1.24561 5"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>

                            {{ __('translate.About Us') }}
                          </a>
                        </li>
                        <li class="footer-nav-list-item py-2">
                          <a
                            href="{{ route('contact-us') }}"
                            class="footer-nav-link d-flex gap-2 align-items-center"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="13"
                              height="10"
                              viewBox="0 0 13 10"
                              fill="none"
                            >
                              <path
                                d="M8.57894 9L12.2456 5M12.2456 5L8.57894 0.999999M12.2456 5L1.24561 5"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            {{ __('translate.Contact Us') }}
                          </a>
                        </li>
                        <li class="footer-nav-list-item py-2">

                            @guest('web')
                                <a href="{{ route('buyer.dashboard') }}" class="footer-nav-link d-flex gap-2 align-items-center">
                            @else
                                @if(Auth::guard('web')->user()->is_seller == 1)
                                    <a href="{{ route('seller.dashboard') }}" class="footer-nav-link d-flex gap-2 align-items-center">
                                @else
                                    <a href="{{ route('buyer.dashboard') }}" class="footer-nav-link d-flex gap-2 align-items-center">
                                @endif
                            @endguest
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="13"
                              height="10"
                              viewBox="0 0 13 10"
                              fill="none"
                            >
                              <path
                                d="M8.57894 9L12.2456 5M12.2456 5L8.57894 0.999999M12.2456 5L1.24561 5"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            {{ __('translate.My Dashboard') }}
                          </a>
                        </li>

                        <li class="footer-nav-list-item py-2">
                          <a
                            href="{{ route('faq') }}"
                            class="footer-nav-link d-flex gap-2 align-items-center"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="13"
                              height="10"
                              viewBox="0 0 13 10"
                              fill="none"
                            >
                              <path
                                d="M8.57894 9L12.2456 5M12.2456 5L8.57894 0.999999M12.2456 5L1.24561 5"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            {{ __('translate.FAQ') }}
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-copyright py-4">
          <div class="container">
            <div class="row row-gap-4 justify-content-between">
              <div class="col-auto">
                <div>
                  <p class="text-white">
                    {{ $footer->copyright }}
                  </p>
                </div>
              </div>
              <div class="col-auto">
                <div class="footer-social d-flex align-items-center gap-4">
                  <a
                    href="{{ $footer->facebook }}"
                    class="footer-social-link"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                    >
                      <path
                        d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4688H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3438 4.92188 17.3438 4.92188V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4688H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z"
                        fill="currentColor"
                      />
                    </svg> </a
                  ><a
                    href="{{ $footer->twitter }}"
                    class="footer-social-link"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                    >
                      <path
                        d="M12 0C5.37281 0 0 5.37281 0 12C0 18.6272 5.37281 24 12 24C18.6272 24 24 18.6272 24 12C24 5.37281 18.6272 0 12 0Z"
                        fill="currentColor"
                      />
                      <path
                        d="M13.313 10.9143L18.45 4.94287H17.2327L12.7722 10.1278L9.20961 4.94287H5.10059L10.4879 12.7833L5.10059 19.0453H6.31797L11.0284 13.5699L14.7907 19.0453H18.8998L13.3127 10.9143H13.313ZM6.75661 5.85931H8.62643L17.2333 18.1705H15.3634L6.75661 5.85931Z"
                        fill="#22323F"
                      />
                    </svg> </a
                  ><a
                    href="{{ $footer->instagram }}"
                    class="footer-social-link"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                    >
                      <path
                        d="M12 14.52C13.3917 14.52 14.52 13.3917 14.52 12C14.52 10.6082 13.3917 9.47998 12 9.47998C10.6082 9.47998 9.47998 10.6082 9.47998 12C9.47998 13.3917 10.6082 14.52 12 14.52Z"
                        fill="currentColor"
                      />
                      <path
                        d="M12 0C5.37259 0 0 5.37259 0 12C0 18.6274 5.37259 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37259 18.6274 0 12 0ZM19.414 15.0499C19.3564 16.1908 19.0358 17.3158 18.2044 18.1384C17.3649 18.9688 16.2346 19.2782 15.0827 19.3352H8.91734C7.76534 19.2782 6.63514 18.969 5.79566 18.1384C4.96421 17.3158 4.64366 16.1908 4.58606 15.0499V8.95008C4.64366 7.80922 4.96426 6.68419 5.79566 5.86157C6.63514 5.03117 7.76549 4.72176 8.91734 4.66478H15.0827C16.2347 4.72176 17.3649 5.03102 18.2043 5.86157C19.0358 6.68419 19.3563 7.80922 19.4139 8.95008L19.414 15.0499Z"
                        fill="currentColor"
                      />
                      <path
                        d="M15.0047 6.05433C13.503 6.01314 10.4973 6.01314 8.99553 6.05433C8.21404 6.07578 7.3281 6.27033 6.7713 6.86505C6.19271 7.48324 5.97407 8.23012 5.95189 9.06565C5.91292 10.5321 5.95189 14.9337 5.95189 14.9337C5.97728 15.7692 6.19271 16.5162 6.7713 17.1344C7.3281 17.7293 8.21404 17.9236 8.99553 17.9451C10.4973 17.9863 13.503 17.9863 15.0047 17.9451C15.7862 17.9236 16.6722 17.7291 17.229 17.1344C17.8076 16.5162 18.0262 15.7693 18.0484 14.9337V9.06565C18.0262 8.23012 17.8076 7.48324 17.229 6.86505C16.672 6.27013 15.786 6.07578 15.0047 6.05433ZM11.9999 15.9057C11.2274 15.9057 10.4722 15.6766 9.82988 15.2474C9.18755 14.8182 8.6869 14.2082 8.39127 13.4945C8.09563 12.7807 8.01828 11.9954 8.16899 11.2377C8.31971 10.48 8.69172 9.78401 9.23798 9.23774C9.78425 8.69148 10.4802 8.31947 11.2379 8.16875C11.9956 8.01804 12.781 8.09539 13.4947 8.39103C14.2084 8.68666 14.8185 9.18731 15.2477 9.82964C15.6769 10.472 15.9059 11.2272 15.9059 11.9997C15.9059 13.0356 15.4944 14.0291 14.7619 14.7617C14.0294 15.4942 13.0359 15.9057 11.9999 15.9057ZM15.9225 8.89996C15.7681 8.89992 15.617 8.85407 15.4886 8.76821C15.3601 8.68235 15.26 8.56033 15.201 8.41758C15.1419 8.27483 15.1264 8.11776 15.1566 7.96624C15.1867 7.81471 15.2612 7.67553 15.3704 7.5663C15.4797 7.45706 15.6189 7.38268 15.7704 7.35255C15.9219 7.32243 16.079 7.33791 16.2217 7.39704C16.3645 7.45617 16.4865 7.5563 16.5723 7.68477C16.6581 7.81323 16.7039 7.96426 16.7039 8.11876C16.7039 8.22136 16.6837 8.32296 16.6445 8.41775C16.6052 8.51255 16.5476 8.59867 16.4751 8.67122C16.4025 8.74376 16.3164 8.8013 16.2216 8.84055C16.1268 8.87979 16.0252 8.89998 15.9225 8.89996Z"
                        fill="currentColor"
                      />
                    </svg> </a
                  ><a
                    href="{{ $footer->linkedin }}"
                    class="footer-social-link"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                    >
                      <path
                        d="M12 0C5.3736 0 0 5.3736 0 12C0 18.6264 5.3736 24 12 24C18.6264 24 24 18.6264 24 12C24 5.3736 18.6264 0 12 0ZM8.51294 18.1406H5.59039V9.34808H8.51294V18.1406ZM7.05176 8.14746H7.03271C6.052 8.14746 5.41772 7.47235 5.41772 6.6286C5.41772 5.76581 6.07141 5.10938 7.07117 5.10938C8.07092 5.10938 8.68616 5.76581 8.7052 6.6286C8.7052 7.47235 8.07092 8.14746 7.05176 8.14746ZM19.051 18.1406H16.1288V13.4368C16.1288 12.2547 15.7057 11.4485 14.6483 11.4485C13.8409 11.4485 13.3601 11.9923 13.1488 12.5173C13.0715 12.7051 13.0527 12.9677 13.0527 13.2305V18.1406H10.1303C10.1303 18.1406 10.1686 10.173 10.1303 9.34808H13.0527V10.593C13.441 9.9939 14.1359 9.14172 15.6865 9.14172C17.6093 9.14172 19.051 10.3984 19.051 13.099V18.1406Z"
                        fill="currentColor"
                      />
                    </svg> </a
                  >

                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <!-- Category Modal -->
      <div class="modal fade categor" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-header px-5 py-4 d-flex justify-content-between items-placeholder border-bottom">
              <div>
                <h3 class="text-dark-300 fw-bold text-24">{{ __('translate.All Categories') }}</h3>
              </div>
              <div>
                <button type="button" data-bs-dismiss="modal" aria-label="Close">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="16" cy="16" r="16" fill="#FF3838" />
                    <path d="M22.2188 9.77759L8.88614 23.1109" stroke="white" stroke-width="1.8" stroke-linecap="round" />
                    <path d="M22.2188 23.1099L8.88614 9.77654" stroke="white" stroke-width="1.8" stroke-linecap="round" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="modal-body px-5 py-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                    @php
                    $categories = Modules\Category\Entities\Category::with('subcategories')
                                            ->has('subcategories')
                                            ->get();
                    @endphp
                    @foreach($categories as $category)
                        <div class="col-lg-3 mb-4">
                        <div>
                            <h4 class="text-18 fw-semibold text-dark-300 mb-2">{{$category->translate->name}} </h4>
                            <nav class="category-nav">
                                <ul>
                                    @foreach($category->subcategories as $subcategory)
                                    <li>
                                        <a href="{{ route('services', ['category' =>$category->slug ,'sub_category' => $subcategory->slug]) }}"> {{ $subcategory->translate->name }} </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal End -->

      <button id="toTopBtn" class='toTopBtn' title="Go to top">
        <svg width="39" height="75" viewBox="0 0 39 75" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.235 75.0001L18.3095 74.9001C18.3095 74.8834 18.3144 74.8667 18.3168 74.85C18.0878 74.8262 17.8612 74.7834 17.6322 74.781C15.744 74.7738 13.9751 74.2427 12.2526 73.5521C8.50789 72.0493 5.51357 69.6273 3.26965 66.3312C1.58854 63.8591 0.51897 61.1417 0.192494 58.1886C0.0268193 56.6882 0.0195101 55.1687 0.0146374 53.6564C-0.00485375 47.2786 0.0073282 40.9007 1.90292e-05 34.5229C-0.00485375 30.6361 0.925847 27.0066 3.08205 23.72C5.88146 19.4546 9.78943 16.6515 14.7986 15.3655C16.9281 14.8201 19.0989 14.6224 21.3014 14.8606C27.6384 15.5465 32.5185 18.5496 36.0001 23.7534C37.4546 25.9278 38.3902 28.3212 38.7678 30.8957C38.9311 32.0151 38.9847 33.1582 38.9896 34.2918C39.0066 41.1365 38.9993 47.9788 38.992 54.8234C38.992 55.8499 39.0066 56.8835 38.9092 57.9028C38.7021 60.0652 38.0735 62.1205 37.0965 64.071C35.2741 67.7077 32.5843 70.5537 28.9809 72.5352C26.793 73.7402 24.4443 74.5214 21.9348 74.7857C21.4987 74.831 21.0553 74.8286 20.6119 74.8882C20.7386 74.9239 20.8653 74.962 20.9919 74.9977H17.2399L17.235 75.0001ZM3.08449 44.8375H3.08692C3.08692 48.3288 3.06743 51.8202 3.09911 55.3116C3.10885 56.3952 3.18925 57.486 3.3598 58.5553C3.7618 61.1107 4.80458 63.428 6.40772 65.4714C9.05851 68.8532 12.5133 70.9848 16.8355 71.6968C18.8869 72.035 20.9432 72.0207 22.9654 71.5754C26.8271 70.7228 30.0236 68.7866 32.4649 65.7119C34.8891 62.6588 36.0001 59.1864 35.9831 55.3188C35.9489 48.2193 35.9684 41.1174 35.9757 34.0156C35.9757 32.7534 35.8344 31.5078 35.5372 30.286C34.7015 26.8566 32.94 23.9653 30.1698 21.6957C26.1522 18.402 21.5401 17.1802 16.3994 18.121C12.8374 18.7735 9.82841 20.4716 7.38959 23.1294C4.53901 26.235 3.12103 29.8764 3.09423 34.037C3.07231 37.638 3.08936 41.2365 3.08936 44.8375H3.08449Z" fill="#22BE0D"/>
        <path d="M11.0364 8.95451C10.9997 8.54541 11.2855 8.24485 11.5541 7.94116C13.5504 5.68071 15.5488 3.42338 17.5473 1.16501C17.7576 0.927071 17.9582 0.68078 18.1815 0.455361C18.7973 -0.167673 19.5609 -0.150976 20.1411 0.503367C22.4113 3.06229 24.6773 5.62435 26.941 8.18954C27.4328 8.74683 27.4005 9.4857 26.8839 9.91462C26.3349 10.3696 25.6479 10.3133 25.1238 9.72573C23.2677 7.64686 21.4234 5.5586 19.577 3.47243C19.1327 2.97046 19.1402 2.9715 18.6765 3.49748C16.8808 5.53251 15.0808 7.56546 13.2829 9.6005C12.9896 9.93237 12.6563 10.1693 12.1764 10.1453C11.5196 10.114 11.0364 9.62972 11.0364 8.95451Z" fill="#22BE0D"/>
        <path d="M16.0442 34.8729C16.0442 34.0631 16.0004 33.2486 16.054 32.4413C16.1612 30.798 17.5231 29.481 19.2042 29.4429C20.9609 29.4024 22.2668 30.6122 22.5275 32.0769C22.6079 32.5318 22.6395 33.001 22.6395 33.463C22.6395 34.7371 22.6517 36.0136 22.5908 37.2878C22.508 38.9835 21.0242 40.3195 19.3187 40.3076C17.5694 40.2957 16.1417 38.9716 16.0589 37.2449C16.0223 36.4566 16.0515 35.6636 16.0515 34.8729C16.0515 34.8729 16.0491 34.8729 16.0467 34.8729H16.0442Z" fill="#22BE0D"/>
        </svg>

      </button>
      <!-- Footer End -->

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

      <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>

        <script>
            @if(Session::has('message'))
            var type="{{Session::get('alert-type','info') }}"
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
            @endif


            @if(Session::has('demo_mode'))
                toastr.warning("{{ __('translate.All Language keywords are not implemented in the demo mode') }}");
                toastr.info("{{ __('translate.Admin can translate every word from the admin panel') }}");
            @endif
        </script>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    toastr.error('{{ $error }}');
                </script>
            @endforeach
        @endif

        @stack('js_section')


    <script>
        (function($) {
            "use strict"
            $(document).ready(function () {
                $(".beforeLogin").on("click",function(e){
                    toastr.error("{{ __('translate.Please login first') }}")
                })

                $(".beforeLoginForChat").on("click",function(e){
                    toastr.error("{{ __('translate.Please login as a buyer') }}")
                })

                $("#language_dropdown").on("change", function(){
                    $("#language_form").submit()
                })

                $("#currency_dropdown").on("change", function(){
                    $("#currency_form").submit()
                })

                $('.cookie_consent_close_btn').on('click', function(){
                    $('.cookie_consent_modal').addClass('d-none');
                });

                $('.cookie_consent_accept_btn').on('click',function() {
                    localStorage.setItem('workzone-cookie','1');
                    $('.cookie_consent_modal').addClass('d-none');
                });


            });
        })(jQuery);

        if (localStorage.getItem('workzone-cookie') != '1') {
            $('.cookie_consent_modal').removeClass('d-none');
        }

        function addToWishlist(item_id){
            var appMODE = "{{ env('APP_MODE') }}"
            if(appMODE == 'DEMO'){
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }


            $.ajax({
                type:"post",
                data: { _token : '{{ csrf_token() }}', item_id },
                url:"{{ route('buyer.wishlist.store') }}",
                success:function(response){
                    toastr.success(response.message)
                },
                error:function(err){
                    if(err.status == 401){
                        toastr.error("{{ __('translate.Please Login First') }}")
                    }

                    if(err.status == 403){
                        toastr.error(err.responseJSON.message)
                    }

                }
            })
        }

    </script>

    </body>
  </html>
