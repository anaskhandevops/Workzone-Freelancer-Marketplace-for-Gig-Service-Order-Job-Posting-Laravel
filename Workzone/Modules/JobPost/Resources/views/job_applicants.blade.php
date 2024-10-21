@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Job Applications') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Job Applications') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Job Post') }} >> {{ __('translate.Job Applications') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Job Applications') }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Name') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Phone') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Email') }}
                                                </th>


                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Created at') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Status') }}
                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('translate.Action') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            @foreach ($job_requests as $index => $job_request)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                           {{ ++$index }}
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a href="{{ route('admin.seller-show', $job_request->seller_id) }}">{{ html_decode($job_request?->seller?->name) }}</a></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($job_request?->seller?->phone) }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($job_request?->seller?->email) }}</h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ $job_request->created_at->format('Y-m-d') }}
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($job_request->status == 'approved')
                                                            <span class="badge bg-success text-white">{{ __('translate.Hired') }}</span>
                                                        @elseif ($job_request->status == 'pending')
                                                            <span class="badge bg-danger text-white">{{ __('translate.Pending') }}</span>
                                                        @else
                                                            <span class="badge bg-danger text-white">{{ __('translate.Rejected') }}</span>
                                                        @endif
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        <div class="dropdown">
                                                            <button class="crancy-btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{ __('translate.Action') }}
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                                <li>
                                                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#applicationDetail{{ $job_request->id }}" class=" dropdown-item"><i class="fas fa-eye"></i> {{ __('translate.Show') }}</a>

                                                                </li>

                                                                <li>
                                                                    <a onclick="itemDeleteConfrimation({{ $job_request->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item"><i class="fas fa-trash"></i> {{ __('translate.Delete') }}</a>
                                                                </li>


                                                                @if ($job_request->status == 'pending')
                                                                <li>
                                                                    <a data-bs-toggle="modal" data-bs-target="#applicationApproval{{ $job_request->id }}" href="javascript:;" class=" dropdown-item"><i class="fas fa-check"></i> {{ __('translate.Approve') }}</a>

                                                                </li>
                                                                @endif

                                                            </ul>
                                                        </div>


                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <!-- End crancy Table Body -->
                                    </table>
                                </div>
                                <!-- End crancy Table -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->


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

                                @if ($job_request?->seller?->resume)
                                    <tr>
                                        <td>{{ __('translate.Resume') }} </td>
                                        <td>

                                            <a href="{{ route('download-resume', $job_request?->seller?->resume) }}" class="cv-button">
                                                <span>
                                                    <i class="fa-solid fa-file-pdf"></i>
                                                </span>
                                                {{ __('translate.Download') }}
                                            </a>

                                        </td>
                                    </tr>
                                @endif

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
                        <form action="{{ route('admin.job-application-approval', $job_request->id) }}" method="POST" class="delet_modal_form">
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


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Delete Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to delete this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Delete') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection


@push('js_section')
    <script>
        "use strict"
        function itemDeleteConfrimation(id){
            $("#item_delect_confirmation").attr("action",'{{ url("admin/jobpost/job-application-delete/") }}'+"/"+id)
        }
    </script>
@endpush
