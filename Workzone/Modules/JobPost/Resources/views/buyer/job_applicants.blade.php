@extends('buyer.layout')
@section('title')
    <title>{{ __('translate.Buyer || Job Applications') }}</title>
@endsection
@section('front-content')
<main class="dashboard-main min-vh-100">
    <div class="d-flex flex-column gap-4">
      <!-- Header -->
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <h3 class="text-24 fw-bold text-dark-300 mb-2">{{ __('translate.Job Applications') }}</h3>
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
            <li class="text-lime-300 fs-6">{{ __('translate.Job Applications') }}</li>
          </ul>
        </div>
      </div>
      <!-- Content -->
      <div>
        <!-- My Job -->
        <div class="overflow-x-auto">
          <div class="w-100">
            <table class="w-100 dashboard-table applicant-table">
              <thead class="pb-3">
                <tr>
                  <th scope="col">{{ __('translate.SN') }}</th>
                  <th scope="col">{{ __('translate.Name') }}</th>
                  <th scope="col">{{ __('translate.Status') }}</th>
                  <th scope="col" class="text-end">{{ __('translate.Actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($job_requests as $index => $job_request)
                    <tr>
                    <td class="text-dark-200">{{ ++$index }}</td>
                    <td>
                        <div
                        class="d-flex gap-3 align-items-center project-name"
                        >
                        <div class="rounded-3">
                            @if ($job_request?->seller->image)
                            <img
                            src="{{ asset($job_request?->seller->image) }}"
                            class="img-fluid rounded-3"
                            alt=""
                            />
                            @else
                            <img
                            src="{{ asset($general_setting->default_avatar) }}"
                            class="img-fluid rounded-3"
                            alt=""
                            />
                            @endif

                        </div>
                        <div>
                            <p class="text-dark-200">{{ html_decode($job_request?->seller?->name) }}</p>
                        </div>
                        </div>
                    </td>
                    <td>
                        @if ($job_request->status == 'approved')
                            <span class="status-badge in-progress">{{ __('translate.Hired') }}</span>
                        @elseif ($job_request->status == 'pending')
                            <span class="status-badge pending">{{ __('translate.Pending') }}</span>
                        @else
                            <span class="status-badge canceled">{{ __('translate.Rejected') }}</span>
                        @endif

                    </td>
                    <td class="text-end">
                        <div>
                        <div class="dropdown dropstart">
                            <button
                            class="dashboard-action-btn dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            >
                            <svg
                                width="4"
                                height="20"
                                viewBox="0 0 4 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <circle
                                cx="1.97917"
                                cy="1.97917"
                                r="1.97917"
                                fill="#5B5B5B"
                                />
                                <circle
                                cx="1.97917"
                                cy="9.89616"
                                r="1.97917"
                                fill="#5B5B5B"
                                />
                                <circle
                                cx="1.97917"
                                cy="17.8122"
                                r="1.97917"
                                fill="#5B5B5B"
                                />
                            </svg>
                            </button>
                            <ul class="dropdown-menu table-dropdown">

                            <li>
                                <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#applicationDetail{{ $job_request->id }}">{{ __('translate.See more') }}</a>
                            </li>

                            @if ($job_request->status == 'pending')
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#applicationApproval{{ $job_request->id }}" href="javascript:;">{{ __('translate.Approve') }}</a>
                            </li>
                            @endif
                            </ul>
                        </div>
                        </div>
                    </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
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
                                    <td>{{ $job_request->created_at->format('Y-m-d') }}</td>
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

        <!-- Job Approval Confirmation Modal -->
        <div class="modal fade" id="applicationApproval{{ $job_request->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Approval Confirmation') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('translate.Are you realy want to approve this item?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('buyer.job-application-approval', $job_request->id) }}" method="POST" class="delet_modal_form">
                            @csrf
                            @method('PUT')

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Approved') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection
