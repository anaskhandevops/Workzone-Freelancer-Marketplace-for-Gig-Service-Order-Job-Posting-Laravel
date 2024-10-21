@extends('seller.layout')
@section('title')
    <title>{{ __('translate.Seller || My Job Applications') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Header -->
      <div
        class="d-flex gap-3 flex-column flex-md-row align-items-md-center justify-content-between"
      >
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.My Job Applications') }}</h3>
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
            <li class="text-lime-300 fs-6">{{ __('translate.My Job Applications') }}</li>
          </ul>
        </div>

      </div>
      <!-- Content -->
      <div>
        <!-- Tab Nav -->
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
              {{ __('translate.All') }}({{ $job_requests->count() }})
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
              {{ __('translate.Hired') }}({{ $hired_job_requests->count() }})
            </button>
            <button
              class="dashboard-tab-btn"
              id="nav-pending-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-pending"
              type="button"
              role="tab"
              aria-controls="nav-pending"
              aria-selected="false"
            >
              {{ __('translate.Pending') }}({{ $pending_job_requests->count() }})
            </button>
            <button
              class="dashboard-tab-btn"
              id="nav-completed-tab"
              data-bs-toggle="tab"
              data-bs-target="#nav-completed"
              type="button"
              role="tab"
              aria-controls="nav-completed"
              aria-selected="false"
            >
              {{ __('translate.Rejected') }}({{ $reject_job_requests->count() }})
            </button>
          </div>
        </nav>
        <!-- Tab Content -->
        <div class="tab-content mt-4" id="nav-tabContent">
          <!-- All -->
          <div
            class="tab-pane fade show active"
            id="nav-all"
            role="tabpanel"
            aria-labelledby="nav-all-tab"
            tabindex="0"
          >
            <div>

                @if ($job_requests->count() > 0)


              <div class="overflow-x-auto">
                <table class="w-100 dashboard-table">
                  <thead class="pb-3">
                    <tr>
                      <th scope="col" class="ps-4">{{ __('translate.Job Post') }}</th>
                      <th scope="col">{{ __('translate.Amount') }}</th>
                      <th scope="col">{{ __('translate.Status') }}</th>
                      <th scope="col">{{ __('translate.Date') }}</th>
                      <th scope="col" class="ps-5 text-center">{{ __('translate.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($job_requests as $index => $job_request)
                        <tr>
                        <td>
                            <div
                            class="d-flex gap-3 align-items-center project-name"
                            >
                            <div class="rounded-3 admin-job-icon">
                                <img
                                src="{{ asset($job_request?->job_post?->thumb_image) }}"
                                alt=""
                                />
                            </div>
                            <div>
                                <p class="text-dark-200">
                                    {{ html_decode($job_request?->job_post?->title) }}
                                </p>
                            </div>
                            </div>
                        </td>
                        <td class="text-dark-200">{{ currency($job_request?->job_post?->regular_price) }}</td>
                        <td>
                            @if ($job_request->status == 'approved')
                                <span class="status-badge in-progress">{{ __('translate.Hired') }}</span>
                            @elseif ($job_request->status == 'pending')
                                <span class="status-badge pending">{{ __('translate.Pending') }}</span>
                            @else
                                <span class="status-badge canceled">{{ __('translate.Rejected') }}</span>
                            @endif

                        </td>
                        <td class="text-dark-200">{{ $job_request->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-2">

                                <button data-bs-toggle="modal" data-bs-target="#applicationDetail{{ $job_request->id }}" class="dashboard-action-btn">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="48"
                                    height="48"
                                    viewBox="0 0 48 48"
                                    fill="none"
                                    >
                                    <circle
                                        cx="24"
                                        cy="24"
                                        r="24"
                                        fill="#EDEBE7"
                                    />
                                    <path
                                        d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                        stroke="#5B5B5B"
                                        stroke-width="1.5"
                                    />
                                    <circle
                                        cx="23.668"
                                        cy="24.167"
                                        r="3.5"
                                        stroke="#5B5B5B"
                                        stroke-width="1.5"
                                    />
                                    </svg>
                                </button>
                            </div>
                        </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- Pagination -->

              @if ($job_requests->hasPages())
                <div class="row justify-content-end mt-20">
                    <div class="col-auto">

                    {{ $job_requests->links('custom_pagination') }}
                    </div>
                </div>
              @endif

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
                        {{ __('translate.Job Application Empty') }}
                        </h3>
                        <p class="fs-6 text-dark-200 text-center">
                        {{ __('translate.You do not have any job application') }}
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
          <!-- Active -->
          <div
            class="tab-pane fade"
            id="nav-active"
            role="tabpanel"
            aria-labelledby="nav-active-tab"
            tabindex="0"
          >
            <div>

            @if ($hired_job_requests->count() > 0)

              <div class="overflow-x-auto">
                <table class="w-100 dashboard-table">
                    <thead class="pb-3">
                      <tr>
                        <th scope="col" class="ps-4">{{ __('translate.Job Post') }}</th>
                        <th scope="col">{{ __('translate.Amount') }}</th>
                        <th scope="col">{{ __('translate.Status') }}</th>
                        <th scope="col">{{ __('translate.Date') }}</th>
                        <th scope="col" class="ps-5 text-center">{{ __('translate.Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($hired_job_requests as $index => $job_request)
                          <tr>
                          <td>
                              <div
                              class="d-flex gap-3 align-items-center project-name"
                              >
                              <div class="rounded-3 admin-job-icon">
                                  <img
                                  src="{{ asset($job_request?->job_post?->thumb_image) }}"
                                  alt=""
                                  />
                              </div>
                              <div>
                                  <p class="text-dark-200">
                                      {{ html_decode($job_request?->job_post?->title) }}
                                  </p>
                              </div>
                              </div>
                          </td>
                          <td class="text-dark-200">{{ currency($job_request?->job_post?->regular_price) }}</td>
                          <td>
                              @if ($job_request->status == 'approved')
                                  <span class="status-badge in-progress">{{ __('translate.Hired') }}</span>
                              @elseif ($job_request->status == 'pending')
                                  <span class="status-badge pending">{{ __('translate.Pending') }}</span>
                              @else
                                  <span class="status-badge canceled">{{ __('translate.Rejected') }}</span>
                              @endif

                          </td>
                          <td class="text-dark-200">{{ $job_request->created_at->format('d M Y') }}</td>
                          <td>
                              <div class="d-flex justify-content-end gap-2">

                                  <button data-bs-toggle="modal" data-bs-target="#hiredApplicationDetail{{ $job_request->id }}" class="dashboard-action-btn">
                                      <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      width="48"
                                      height="48"
                                      viewBox="0 0 48 48"
                                      fill="none"
                                      >
                                      <circle
                                          cx="24"
                                          cy="24"
                                          r="24"
                                          fill="#EDEBE7"
                                      />
                                      <path
                                          d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                          stroke="#5B5B5B"
                                          stroke-width="1.5"
                                      />
                                      <circle
                                          cx="23.668"
                                          cy="24.167"
                                          r="3.5"
                                          stroke="#5B5B5B"
                                          stroke-width="1.5"
                                      />
                                      </svg>
                                  </button>
                              </div>
                          </td>
                          </tr>
                      @endforeach

                    </tbody>
                </table>
              </div>
              <!-- Pagination -->
              @if ($hired_job_requests->hasPages())
                <div class="row justify-content-end mt-20">
                    <div class="col-auto">

                    {{ $hired_job_requests->links('custom_pagination') }}
                    </div>
                </div>
              @endif

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
                            {{ __('translate.Job Application Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any hired job application') }}
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
          <!-- Pending -->
          <div
            class="tab-pane fade"
            id="nav-pending"
            role="tabpanel"
            aria-labelledby="nav-pending-tab"
            tabindex="0"
          >
            <div>
            @if ($pending_job_requests->count() > 0)
              <div class="overflow-x-auto">
                <table class="w-100 dashboard-table">
                    <thead class="pb-3">
                      <tr>
                        <th scope="col" class="ps-4">{{ __('translate.Job Post') }}</th>
                        <th scope="col">{{ __('translate.Amount') }}</th>
                        <th scope="col">{{ __('translate.Status') }}</th>
                        <th scope="col">{{ __('translate.Date') }}</th>
                        <th scope="col" class="ps-5 text-center">{{ __('translate.Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($pending_job_requests as $index => $job_request)
                          <tr>
                          <td>
                              <div
                              class="d-flex gap-3 align-items-center project-name"
                              >
                              <div class="rounded-3 admin-job-icon">
                                  <img
                                  src="{{ asset($job_request?->job_post?->thumb_image) }}"
                                  alt=""
                                  />
                              </div>
                              <div>
                                  <p class="text-dark-200">
                                      {{ html_decode($job_request?->job_post?->title) }}
                                  </p>
                              </div>
                              </div>
                          </td>
                          <td class="text-dark-200">{{ currency($job_request?->job_post?->regular_price) }}</td>
                          <td>
                              @if ($job_request->status == 'approved')
                                  <span class="status-badge in-progress">{{ __('translate.Hired') }}</span>
                              @elseif ($job_request->status == 'pending')
                                  <span class="status-badge pending">{{ __('translate.Pending') }}</span>
                              @else
                                  <span class="status-badge canceled">{{ __('translate.Rejected') }}</span>
                              @endif

                          </td>
                          <td class="text-dark-200">{{ $job_request->created_at->format('d M Y') }}</td>
                          <td>
                              <div class="d-flex justify-content-end gap-2">

                                  <button data-bs-toggle="modal" data-bs-target="#pendingApplicationDetail{{ $job_request->id }}" class="dashboard-action-btn">
                                      <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      width="48"
                                      height="48"
                                      viewBox="0 0 48 48"
                                      fill="none"
                                      >
                                      <circle
                                          cx="24"
                                          cy="24"
                                          r="24"
                                          fill="#EDEBE7"
                                      />
                                      <path
                                          d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                          stroke="#5B5B5B"
                                          stroke-width="1.5"
                                      />
                                      <circle
                                          cx="23.668"
                                          cy="24.167"
                                          r="3.5"
                                          stroke="#5B5B5B"
                                          stroke-width="1.5"
                                      />
                                      </svg>
                                  </button>
                              </div>
                          </td>
                          </tr>
                      @endforeach

                    </tbody>
                </table>
              </div>
              <!-- Pagination -->
              @if ($pending_job_requests->hasPages())
                <div class="row justify-content-end mt-20">
                    <div class="col-auto">

                    {{ $pending_job_requests->links('custom_pagination') }}
                    </div>
                </div>
              @endif

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
                            {{ __('translate.Job Application Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any pending job application') }}
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
          <!-- Complete -->
          <div
            class="tab-pane fade"
            id="nav-completed"
            role="tabpanel"
            aria-labelledby="nav-completed-tab"
            tabindex="0"
          >
            <div>

                @if ($reject_job_requests->count() > 0)


                <div class="overflow-x-auto">
                  <table class="w-100 dashboard-table">
                    <thead class="pb-3">
                      <tr>
                        <th scope="col" class="ps-4">{{ __('translate.Job Post') }}</th>
                        <th scope="col">{{ __('translate.Amount') }}</th>
                        <th scope="col">{{ __('translate.Status') }}</th>
                        <th scope="col">{{ __('translate.Date') }}</th>
                        <th scope="col" class="ps-5 text-center">{{ __('translate.Action') }}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($reject_job_requests as $index => $job_request)
                          <tr>
                          <td>
                              <div
                              class="d-flex gap-3 align-items-center project-name"
                              >
                              <div class="rounded-3 admin-job-icon">
                                  <img
                                  src="{{ asset($job_request?->job_post?->thumb_image) }}"
                                  alt=""
                                  />
                              </div>
                              <div>
                                  <p class="text-dark-200">
                                      {{ html_decode($job_request?->job_post?->title) }}
                                  </p>
                              </div>
                              </div>
                          </td>
                          <td class="text-dark-200">{{ currency($job_request?->job_post?->regular_price) }}</td>
                          <td>
                              @if ($job_request->status == 'approved')
                                  <span class="status-badge in-progress">{{ __('translate.Hired') }}</span>
                              @elseif ($job_request->status == 'pending')
                                  <span class="status-badge pending">{{ __('translate.Pending') }}</span>
                              @else
                                  <span class="status-badge canceled">{{ __('translate.Rejected') }}</span>
                              @endif

                          </td>
                          <td class="text-dark-200">{{ $job_request->created_at->format('d M Y') }}</td>
                          <td>
                              <div class="d-flex justify-content-end gap-2">

                                  <button data-bs-toggle="modal" data-bs-target="#rejectApplicationDetail{{ $job_request->id }}" class="dashboard-action-btn">
                                      <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      width="48"
                                      height="48"
                                      viewBox="0 0 48 48"
                                      fill="none"
                                      >
                                      <circle
                                          cx="24"
                                          cy="24"
                                          r="24"
                                          fill="#EDEBE7"
                                      />
                                      <path
                                          d="M34.3187 21.6619C35.6716 23.0854 35.6716 25.248 34.3187 26.6714C32.0369 29.0721 28.1181 32.3333 23.6667 32.3333C19.2152 32.3333 15.2964 29.0721 13.0147 26.6714C11.6618 25.248 11.6618 23.0854 13.0147 21.6619C15.2964 19.2612 19.2152 16 23.6667 16C28.1181 16 32.0369 19.2612 34.3187 21.6619Z"
                                          stroke="#5B5B5B"
                                          stroke-width="1.5"
                                      />
                                      <circle
                                          cx="23.668"
                                          cy="24.167"
                                          r="3.5"
                                          stroke="#5B5B5B"
                                          stroke-width="1.5"
                                      />
                                      </svg>
                                  </button>
                              </div>
                          </td>
                          </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- Pagination -->

                @if ($reject_job_requests->hasPages())
                  <div class="row justify-content-end mt-20">
                      <div class="col-auto">

                      {{ $reject_job_requests->links('custom_pagination') }}
                      </div>
                  </div>
                @endif

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
                            {{ __('translate.Job Application Empty') }}
                            </h3>
                            <p class="fs-6 text-dark-200 text-center">
                            {{ __('translate.You do not have any rejected job application') }}
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
    </div>
  </main>

  @foreach ($job_requests as $index => $job_request)
    <!-- Application detail Modal -->
    <div class="modal fade" id="applicationDetail{{ $job_request->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Application Details') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>{{ __('translate.Name') }}</td>
                                <td>{{ html_decode($job_request?->seller?->name) }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Phone') }}</td>
                                <td>{{ html_decode($job_request?->seller?->phone) }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Email') }}</td>
                                <td>{{ html_decode($job_request?->seller?->email) }}</td>
                            </tr>

                            <tr>
                                <td> {{ __('translate.Address') }}</td>
                                <td>{{ html_decode($job_request?->seller?->address) }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('translate.Apply Date') }}</td>
                                <td>{{ $job_request->created_at->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Message') }}</td>
                                <td>{!! clean(nl2br(html_decode($job_request->description))) !!}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Application detail Modal -->
    <div class="modal fade" id="hiredApplicationDetail{{ $job_request->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Application Details') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>{{ __('translate.Name') }}</td>
                                <td>{{ html_decode($job_request?->seller?->name) }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Phone') }}</td>
                                <td>{{ html_decode($job_request?->seller?->phone) }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Email') }}</td>
                                <td>{{ html_decode($job_request?->seller?->email) }}</td>
                            </tr>

                            <tr>
                                <td> {{ __('translate.Address') }}</td>
                                <td>{{ html_decode($job_request?->seller?->address) }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('translate.Apply Date') }}</td>
                                <td>{{ $job_request->created_at->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Message') }}</td>
                                <td>{!! clean(nl2br(html_decode($job_request->description))) !!}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="pendingApplicationDetail{{ $job_request->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Application Details') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>{{ __('translate.Name') }}</td>
                                <td>{{ html_decode($job_request?->seller?->name) }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Phone') }}</td>
                                <td>{{ html_decode($job_request?->seller?->phone) }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Email') }}</td>
                                <td>{{ html_decode($job_request?->seller?->email) }}</td>
                            </tr>

                            <tr>
                                <td> {{ __('translate.Address') }}</td>
                                <td>{{ html_decode($job_request?->seller?->address) }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('translate.Apply Date') }}</td>
                                <td>{{ $job_request->created_at->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Message') }}</td>
                                <td>{!! clean(nl2br(html_decode($job_request->description))) !!}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectApplicationDetail{{ $job_request->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Application Details') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>{{ __('translate.Name') }}</td>
                                <td>{{ html_decode($job_request?->seller?->name) }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Phone') }}</td>
                                <td>{{ html_decode($job_request?->seller?->phone) }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Email') }}</td>
                                <td>{{ html_decode($job_request?->seller?->email) }}</td>
                            </tr>

                            <tr>
                                <td> {{ __('translate.Address') }}</td>
                                <td>{{ html_decode($job_request?->seller?->address) }}</td>
                            </tr>

                            <tr>
                                <td>{{ __('translate.Apply Date') }}</td>
                                <td>{{ $job_request->created_at->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <td> {{ __('translate.Message') }}</td>
                                <td>{!! clean(nl2br(html_decode($job_request->description))) !!}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @endforeach


@endsection
