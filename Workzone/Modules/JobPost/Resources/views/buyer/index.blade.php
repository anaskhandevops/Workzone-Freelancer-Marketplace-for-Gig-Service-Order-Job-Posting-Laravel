@extends('buyer.layout')
@section('title')
    <title>{{ __('translate.Buyer || Job Post') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Header -->
      <div
        class="d-flex align-items-md-center flex-column flex-md-row gap-4 justify-content-between"
      >
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.My Jobs') }}</h3>
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
            <li class="text-lime-300 fs-6">{{ __('translate.My Jobs') }}</li>
          </ul>
        </div>
        <div>
          <a href="{{ route('buyer.jobpost.create') }}" class="w-btn-secondary-lg">
            {{ __('translate.Post a Job') }}</a
          >
        </div>
      </div>
      <!-- Content -->
      <div>
        <nav>
          <div
            class="d-flex flex-wrap gap-3 align-items-center"
            id="nav-tab"
            role="tablist"
          >
            <button
              class="dashboard-tab-btn active"
              id="nav-all-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-all"
              type="button"
              role="tab"
              aria-controls="nav-all"
              aria-selected="true"
            >
              {{ __('translate.All') }}({{ $job_posts->count() }})
            </button>
            <button
              class="dashboard-tab-btn"
              id="nav-active-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-active"
              type="button"
              role="tab"
              aria-controls="nav-active"
              aria-selected="false"
            >
            {{ __('translate.Awaiting') }}({{ $awaiting_job_posts->count() }})
            </button>
            <button
              class="dashboard-tab-btn"
              id="nav-empty-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-empty"
              type="button"
              role="tab"
              aria-controls="nav-empty"
              aria-selected="false"
            >
            {{ __('translate.Active') }}({{ $active_job_posts->count() }})</button
            ><button
              class="dashboard-tab-btn"
              id="nav-completed-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-completed"
              type="button"
              role="tab"
              aria-controls="nav-completed"
              aria-selected="false">
            {{ __('translate.Hired') }}({{ $hired_job_posts->count() }})</button
            >

          </div>
        </nav>
        <!-- Tab Content -->
        <div class="tab-content mt-4" id="nav-tabContent">
          <!-- All -->
          <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0" >
            @if ($job_posts->count() > 0)

            <!-- My Job -->
            <div class="overflow-x-auto">
              <div class="w-100">
                <table class="w-100 dashboard-table">
                  <thead class="pb-3">
                    <tr>
                      <th scope="col" class="ps-4">{{ __('translate.Job Post') }}</th>
                      <th scope="col">{{ __('translate.Amount') }}</th>
                      <th scope="col">{{ __('translate.Status') }}</th>
                      <th scope="col">{{ __('translate.Proposal') }}</th>
                      <th scope="col">{{ __('translate.Date') }}</th>
                      <th scope="col" class="pe-5 text-end">{{ __('translate.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($job_posts as $job_post)
                        <tr>
                        <td>
                            <div
                            class="d-flex gap-3 align-items-center project-name"
                            >
                            <div class="rounded-3 admin-job-icon">
                                <img
                                src="{{ asset($job_post->thumb_image) }}"
                                alt=""
                                />
                            </div>
                            <div>
                                <p class="text-dark-200">
                                {{ html_decode($job_post->title) }}
                                </p>
                            </div>
                            </div>
                        </td>
                        <td class="text-dark-200">{{ currency($job_post->regular_price) }}</td>
                        <td>

                            @if ($job_post->approved_by_admin == 'approved')
                                @if ($job_post->checkJobStatus($job_post->id) == 'approved')
                                    <span class="status-badge in-progress">{{ __('translate.Hired') }}</span>
                                @elseif ($job_post->checkJobStatus($job_post->id) == 'pending')
                                    <span class="status-badge in-progress">{{ __('translate.In-Progress') }}</span>
                                @else
                                    <span class="status-badge canceled">{{ __('translate.Rejected') }}</span>
                                @endif
                            @else
                                <span class="status-badge pending"> {{ __('translate.Awaiting') }} </span>
                            @endif



                        </td>
                        <td class="text-dark-200">
                            <a
                            href="{{ route('buyer.job-post-applicants', $job_post->id) }}"
                            class="applicant-link"
                            >
                            {{ $job_post->total_job_application }}
                            </a>
                        </td>
                        <td class="text-dark-200">{{ $job_post->created_at->format('d M, Y') }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-2">
                            <a
                                href="{{ route('buyer.jobpost.edit', ['jobpost' => $job_post->id, 'lang_code' => admin_lang()]) }}"
                                class="dashboard-action-btn"
                            >
                                <svg
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                    stroke="#5B5B5B"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                />
                                </svg>
                            </a>
                            <button class="dashboard-action-btn" onclick="deleteJobPost({{ $job_post->id }}, 'remove_listing')">
                                <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.77778 6.4V15.4C2.77778 17.3882 4.36965 19 6.33333 19H11.6667C13.6303 19 15.2222 17.3882 15.2222 15.4V6.4M10.7778 9.1V14.5M7.22222 9.1L7.22222 14.5M12.5556 3.7L11.3055 1.80154C10.9758 1.30078 10.4207 1 9.82634 1H8.17366C7.57925 1 7.02418 1.30078 6.69446 1.80154L5.44444 3.7M12.5556 3.7H5.44444M12.5556 3.7H17M5.44444 3.7H1" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

                            </button>

                            <form action="{{ route('buyer.jobpost.destroy', $job_post->id) }}" id="remove_listing_{{ $job_post->id }}" class="d-none" method="POST">
                                @csrf
                                @method('DELETE')

                            </form>

                            </div>
                        </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>

            @else
                <div class="row justify-content-center">
                    <div class="col-7">
                    <div>
                        <div
                        class="bg-white p-5 rounded-3 d-flex justify-content-center align-items-center"
                        >
                        <div class="d-flex flex-column align-items-center">
                            <img
                            src="{{ asset($general_setting->empty_image) }}"
                            class="img-fluid mb-5"
                            alt=""
                            />
                            <h3 class="text-24 fw-bold text-dark-300 m-2">
                            {{ __('translate.Job Post Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any job post') }}
                            <span class="text-dark-300">{{ __('translate.Thank you') }}</span>
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endif


          </div>

          <!-- Active -->
          <div class="tab-pane fade" id="nav-active" role="tabpanel" aria-labelledby="nav-active-tab" tabindex="0" >
            <div
              class="tab-pane fade show active"
              id="nav-all"
              role="tabpanel"
              aria-labelledby="nav-all-tab"
              tabindex="0"
            >


            @if ($awaiting_job_posts->count() > 0)
              <!-- My Job -->
              <div class="overflow-x-auto">
                <div class="w-100">
                    <table class="w-100 dashboard-table">
                        <thead class="pb-3">
                          <tr>
                            <th scope="col" class="ps-4">{{ __('translate.Job Post') }}</th>
                            <th scope="col">{{ __('translate.Amount') }}</th>
                            <th scope="col">{{ __('translate.Status') }}</th>
                            <th scope="col">{{ __('translate.Proposal') }}</th>
                            <th scope="col">{{ __('translate.Date') }}</th>
                            <th scope="col" class="pe-5 text-end">{{ __('translate.Action') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($awaiting_job_posts as $job_post)
                              <tr>
                              <td>
                                  <div
                                  class="d-flex gap-3 align-items-center project-name"
                                  >
                                  <div class="rounded-3 admin-job-icon">
                                      <img
                                      src="{{ asset($job_post->thumb_image) }}"
                                      alt=""
                                      />
                                  </div>
                                  <div>
                                      <p class="text-dark-200">
                                      {{ html_decode($job_post->title) }}
                                      </p>
                                  </div>
                                  </div>
                              </td>
                              <td class="text-dark-200">{{ currency($job_post->regular_price) }}</td>
                              <td>

                                  @if ($job_post->approved_by_admin == 'approved')
                                      @if ($job_post->checkJobStatus($job_post->id) == 'approved')
                                          <span class="status-badge in-progress">{{ __('translate.Hired') }}</span>
                                      @elseif ($job_post->checkJobStatus($job_post->id) == 'pending')
                                          <span class="status-badge pending">{{ __('translate.Pending') }}</span>
                                      @else
                                          <span class="status-badge canceled">{{ __('translate.Rejected') }}</span>
                                      @endif
                                  @else
                                      <span class="status-badge pending"> {{ __('translate.Awaiting') }} </span>
                                  @endif



                              </td>
                              <td class="text-dark-200">
                                  <a
                                  href="{{ route('buyer.job-post-applicants', $job_post->id) }}"
                                  class="applicant-link"
                                  >
                                  {{ $job_post->total_job_application }}
                                  </a>
                              </td>
                              <td class="text-dark-200">{{ $job_post->created_at->format('d M, Y') }}</td>
                              <td>
                                  <div class="d-flex justify-content-end gap-2">
                                  <a
                                      href="{{ route('buyer.jobpost.edit', ['jobpost' => $job_post->id, 'lang_code' => admin_lang()]) }}"
                                      class="dashboard-action-btn"
                                  >
                                      <svg
                                      width="20"
                                      height="20"
                                      viewBox="0 0 20 20"
                                      fill="none"
                                      xmlns="http://www.w3.org/2000/svg"
                                      >
                                      <path
                                          d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                          stroke="#5B5B5B"
                                          stroke-width="1.5"
                                          stroke-linecap="round"
                                      />
                                      </svg>
                                  </a>
                                  <button class="dashboard-action-btn" onclick="deleteJobPost({{ $job_post->id }}, 'remove_awaiting_listing')">
                                     <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.77778 6.4V15.4C2.77778 17.3882 4.36965 19 6.33333 19H11.6667C13.6303 19 15.2222 17.3882 15.2222 15.4V6.4M10.7778 9.1V14.5M7.22222 9.1L7.22222 14.5M12.5556 3.7L11.3055 1.80154C10.9758 1.30078 10.4207 1 9.82634 1H8.17366C7.57925 1 7.02418 1.30078 6.69446 1.80154L5.44444 3.7M12.5556 3.7H5.44444M12.5556 3.7H17M5.44444 3.7H1" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                  </button>

                                  <form action="{{ route('buyer.jobpost.destroy', $job_post->id) }}" id="remove_awaiting_listing_{{ $job_post->id }}" class="d-none" method="POST">
                                      @csrf
                                      @method('DELETE')

                                  </form>

                                  </div>
                              </td>
                              </tr>
                          @endforeach

                        </tbody>
                      </table>
                </div>
              </div>

            @else
                <div class="row justify-content-center">
                    <div class="col-7">
                    <div>
                        <div
                        class="bg-white p-5 rounded-3 d-flex justify-content-center align-items-center"
                        >
                        <div class="d-flex flex-column align-items-center">
                            <img
                            src="{{ asset($general_setting->empty_image) }}"
                            class="img-fluid mb-5"
                            alt=""
                            />
                            <h3 class="text-24 fw-bold text-dark-300 m-2">
                            {{ __('translate.Job Post Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any job post under the admin feedback') }}
                            <span class="text-dark-300">{{ __('translate.Thank you') }}</span>
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endif


            </div>
          </div>

          <!-- Empty -->
          <div class="tab-pane fade" id="nav-empty" role="tabpanel" aria-labelledby="nav-empty-tab" tabindex="0" >
            @if ($active_job_posts->count() > 0)
              <!-- My Job -->
              <div class="overflow-x-auto">
                <div class="w-100">
                    <table class="w-100 dashboard-table">
                        <thead class="pb-3">
                          <tr>
                            <th scope="col" class="ps-4">{{ __('translate.Job Post') }}</th>
                            <th scope="col">{{ __('translate.Amount') }}</th>
                            <th scope="col">{{ __('translate.Status') }}</th>
                            <th scope="col">{{ __('translate.Proposal') }}</th>
                            <th scope="col">{{ __('translate.Date') }}</th>
                            <th scope="col" class="pe-5 text-end">{{ __('translate.Action') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($active_job_posts as $job_post)
                              <tr>
                              <td>
                                  <div
                                  class="d-flex gap-3 align-items-center project-name"
                                  >
                                  <div class="rounded-3 admin-job-icon">
                                      <img
                                      src="{{ asset($job_post->thumb_image) }}"
                                      alt=""
                                      />
                                  </div>
                                  <div>
                                      <p class="text-dark-200">
                                      {{ html_decode($job_post->title) }}
                                      </p>
                                  </div>
                                  </div>
                              </td>
                              <td class="text-dark-200">{{ currency($job_post->regular_price) }}</td>
                              <td>

                                  @if ($job_post->approved_by_admin == 'approved')
                                      @if ($job_post->checkJobStatus($job_post->id) == 'approved')
                                          <span class="status-badge in-progress">{{ __('translate.Hired') }}</span>
                                      @elseif ($job_post->checkJobStatus($job_post->id) == 'pending')
                                          <span class="status-badge in-progress">{{ __('translate.In-Progress') }}</span>
                                      @else
                                          <span class="status-badge canceled">{{ __('translate.Rejected') }}</span>
                                      @endif
                                  @else
                                      <span class="status-badge pending"> {{ __('translate.Awaiting') }} </span>
                                  @endif



                              </td>
                              <td class="text-dark-200">
                                  <a
                                  href="{{ route('buyer.job-post-applicants', $job_post->id) }}"
                                  class="applicant-link"
                                  >
                                  {{ $job_post->total_job_application }}
                                  </a>
                              </td>
                              <td class="text-dark-200">{{ $job_post->created_at->format('d M, Y') }}</td>
                              <td>
                                  <div class="d-flex justify-content-end gap-2">
                                  <a
                                      href="{{ route('buyer.jobpost.edit', ['jobpost' => $job_post->id, 'lang_code' => admin_lang()]) }}"
                                      class="dashboard-action-btn"
                                  >
                                      <svg
                                      width="20"
                                      height="20"
                                      viewBox="0 0 20 20"
                                      fill="none"
                                      xmlns="http://www.w3.org/2000/svg"
                                      >
                                      <path
                                          d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                          stroke="#5B5B5B"
                                          stroke-width="1.5"
                                          stroke-linecap="round"
                                      />
                                      </svg>
                                  </a>
                                  <button class="dashboard-action-btn" onclick="deleteJobPost({{ $job_post->id }}, 'remove_active_listing')">
                                      <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.77778 6.4V15.4C2.77778 17.3882 4.36965 19 6.33333 19H11.6667C13.6303 19 15.2222 17.3882 15.2222 15.4V6.4M10.7778 9.1V14.5M7.22222 9.1L7.22222 14.5M12.5556 3.7L11.3055 1.80154C10.9758 1.30078 10.4207 1 9.82634 1H8.17366C7.57925 1 7.02418 1.30078 6.69446 1.80154L5.44444 3.7M12.5556 3.7H5.44444M12.5556 3.7H17M5.44444 3.7H1" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                  </button>

                                  <form action="{{ route('buyer.jobpost.destroy', $job_post->id) }}" id="remove_active_listing_{{ $job_post->id }}" class="d-none" method="POST">
                                      @csrf
                                      @method('DELETE')

                                  </form>

                                  </div>
                              </td>
                              </tr>
                          @endforeach

                        </tbody>
                      </table>
                </div>
              </div>

            @else
                <div class="row justify-content-center">
                    <div class="col-7">
                    <div>
                        <div
                        class="bg-white p-5 rounded-3 d-flex justify-content-center align-items-center"
                        >
                        <div class="d-flex flex-column align-items-center">
                            <img
                            src="{{ asset($general_setting->empty_image) }}"
                            class="img-fluid mb-5"
                            alt=""
                            />
                            <h3 class="text-24 fw-bold text-dark-300 m-2">
                            {{ __('translate.Job Post Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any active job post.') }}
                            <span class="text-dark-300">{{ __('translate.Thank you') }}</span>
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endif

          </div>
          <!-- Completed -->
          <div
            class="tab-pane fade"
            id="nav-completed"
            role="tabpanel"
            aria-labelledby="nav-completed-tab"
            tabindex="0"
          >

                @if ($hired_job_posts->count() > 0)
                <!-- My Job -->
                <div class="overflow-x-auto">
                    <div class="w-100">
                        <table class="w-100 dashboard-table">
                            <thead class="pb-3">
                            <tr>
                                <th scope="col" class="ps-4">{{ __('translate.Job Post') }}</th>
                                <th scope="col">{{ __('translate.Amount') }}</th>
                                <th scope="col">{{ __('translate.Status') }}</th>
                                <th scope="col">{{ __('translate.Proposal') }}</th>
                                <th scope="col">{{ __('translate.Date') }}</th>
                                <th scope="col" class="pe-5 text-end">{{ __('translate.Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($hired_job_posts as $job_post)
                                <tr>
                                <td>
                                    <div
                                    class="d-flex gap-3 align-items-center project-name"
                                    >
                                    <div class="rounded-3 admin-job-icon">
                                        <img
                                        src="{{ asset($job_post->thumb_image) }}"
                                        alt=""
                                        />
                                    </div>
                                    <div>
                                        <p class="text-dark-200">
                                        {{ html_decode($job_post->title) }}
                                        </p>
                                    </div>
                                    </div>
                                </td>
                                <td class="text-dark-200">{{ currency($job_post->regular_price) }}</td>
                                <td>

                                    @if ($job_post->approved_by_admin == 'approved')
                                        @if ($job_post->checkJobStatus($job_post->id) == 'approved')
                                            <span class="status-badge in-progress">{{ __('translate.Hired') }}</span>
                                        @elseif ($job_post->checkJobStatus($job_post->id) == 'pending')
                                            <span class="status-badge pending">{{ __('translate.Pending') }}</span>
                                        @else
                                            <span class="status-badge canceled">{{ __('translate.Rejected') }}</span>
                                        @endif
                                    @else
                                        <span class="status-badge pending"> {{ __('translate.Awaiting') }} </span>
                                    @endif



                                </td>
                                <td class="text-dark-200">
                                    <a
                                    href="{{ route('buyer.job-post-applicants', $job_post->id) }}"
                                    class="applicant-link"
                                    >
                                    {{ $job_post->total_job_application }}
                                    </a>
                                </td>
                                <td class="text-dark-200">{{ $job_post->created_at->format('d M, Y') }}</td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                    <a
                                        href="{{ route('buyer.jobpost.edit', ['jobpost' => $job_post->id, 'lang_code' => admin_lang()]) }}"
                                        class="dashboard-action-btn"
                                    >
                                        <svg
                                        width="20"
                                        height="20"
                                        viewBox="0 0 20 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <path
                                            d="M19 10V15.4C19 17.3882 17.3882 19 15.4 19H4.6C2.61177 19 1 17.3882 1 15.4V4.6C1 2.61177 2.61177 1 4.6 1H10M13.3177 2.82047C13.3177 2.82047 13.3177 4.10774 14.605 5.39501C15.8923 6.68228 17.1795 6.68228 17.1795 6.68228M7.43921 13.5906L10.1425 13.2044C10.5324 13.1487 10.8938 12.968 11.1723 12.6895L18.4668 5.39501C19.1777 4.68407 19.1777 3.53141 18.4668 2.82047L17.1795 1.5332C16.4686 0.822266 15.3159 0.822265 14.605 1.5332L7.31048 8.82772C7.03195 9.10624 6.85128 9.4676 6.79557 9.85753L6.40939 12.5608C6.32357 13.1615 6.83848 13.6764 7.43921 13.5906Z"
                                            stroke="#5B5B5B"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                        />
                                        </svg>
                                    </a>
                                    <button class="dashboard-action-btn" onclick="deleteJobPost({{ $job_post->id }}, 'remove_hired_listing')">

                                         <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.77778 6.4V15.4C2.77778 17.3882 4.36965 19 6.33333 19H11.6667C13.6303 19 15.2222 17.3882 15.2222 15.4V6.4M10.7778 9.1V14.5M7.22222 9.1L7.22222 14.5M12.5556 3.7L11.3055 1.80154C10.9758 1.30078 10.4207 1 9.82634 1H8.17366C7.57925 1 7.02418 1.30078 6.69446 1.80154L5.44444 3.7M12.5556 3.7H5.44444M12.5556 3.7H17M5.44444 3.7H1" stroke="#5B5B5B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                    </button>

                                    <form action="{{ route('buyer.jobpost.destroy', $job_post->id) }}" id="remove_hired_listing_{{ $job_post->id }}" class="d-none" method="POST">
                                        @csrf
                                        @method('DELETE')

                                    </form>

                                    </div>
                                </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                @else
                    <div class="row justify-content-center">
                        <div class="col-7">
                        <div>
                            <div
                            class="bg-white p-5 rounded-3 d-flex justify-content-center align-items-center"
                            >
                            <div class="d-flex flex-column align-items-center">
                                <img
                                src="{{ asset($general_setting->empty_image) }}"
                                class="img-fluid mb-5"
                                alt=""
                                />
                                <h3 class="text-24 fw-bold text-dark-300 m-2">
                                {{ __('translate.Job Post Empty') }}
                                </h3>
                                <p class="fs-6 text-dark-200 text-center">
                                {{ __('translate.You do not have any hired job post.') }}
                                <span class="text-dark-300">{{ __('translate.Thank you') }}</span>
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif

          </div>

        </div>
      </div>
    </div>
  </main>


@endsection




@push('js_section')
<script src="{{ asset('global/sweetalert/sweetalert2@11.js') }}"></script>


<script>
    "use strict";
        function deleteJobPost(id, form_id){
            Swal.fire({
                title: "{{ __('translate.Are you realy want to delete this item ?') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('translate.Yes, Delete It') }}",
                cancelButtonText: "{{ __('translate.Cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#${form_id}_${id}`).submit();
                }

            })
        }
    </script>


@endpush
