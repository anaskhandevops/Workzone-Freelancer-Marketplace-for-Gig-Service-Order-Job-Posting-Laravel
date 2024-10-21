@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Rejected Orders') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Rejected Orders') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Orders') }} >> {{ __('translate.Rejected Orders') }}</p>
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
                                            <h4 class="crancy-product-card__title">{{ __('translate.Rejected Orders') }}</h4>
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
                                                    {{ __('translate.Service') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Buyer') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Seller') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting" >
                                                    {{ __('translate.Amount') }}
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
                                            @foreach ($orders as $index => $order)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            <a target="_blank" href="{{ route('service', $order?->listing?->slug) }}">
                                                                {{ html_decode($order?->listing?->title) }}
                                                            </a>
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a href="{{ route('admin.user-show', $order->buyer_id) }}">{{ html_decode($order?->buyer?->name) }}</a></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title"><a href="{{ route('admin.user-show', $order->seller) }}">{{ html_decode($order?->seller?->name) }}</a></h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ currency($order->total_amount) }}
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($order->approved_by_seller == 'approved')
                                                            @if ($order->order_status == 'approved_by_seller')
                                                                <span class="badge bg-success">
                                                                    {{ __('translate.In-Progress') }}
                                                                </span>
                                                            @elseif($order->completed_by_buyer == 'complete')
                                                                <span class="badge bg-success">
                                                                    {{ __('translate.Complete') }}
                                                                </span>
                                                            @elseif($order->order_status == 'cancel_by_seller')
                                                                <span class="badge bg-danger">
                                                                    {{ __('translate.Cancel by Seller') }}
                                                                </span>
                                                            @elseif($order->order_status == 'cancel_by_buyer')
                                                                <span class="badge bg-danger">
                                                                    {{ __('translate.Cancel by Buyer') }}
                                                                </span>

                                                            @endif

                                                        @elseif ($order->approved_by_seller == 'rejected')
                                                            <span class="badge bg-danger">
                                                                {{ __('translate.Rejected by Seller') }}
                                                            </span>
                                                        @elseif ($order->order_status == 'cancel_by_buyer')
                                                            <span class="badge bg-danger">
                                                                {{ __('translate.Cancel by Buyer') }}
                                                            </span>
                                                        @else
                                                            <span class="badge bg-danger">
                                                                {{ __('translate.Awaiting for Approval') }}
                                                            </span>
                                                        @endif
                                                    </td>



                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <div class="dropdown">
                                                            <button class="crancy-btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{ __('translate.Action') }}
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                                <li>
                                                                    <a href="{{ route('admin.order', $order->order_id) }}" class=" dropdown-item"><i class="fas fa-eye"></i> {{ __('translate.Show') }}</a>

                                                                </li>

                                                                <li>
                                                                    <a onclick="itemDeleteConfrimation({{ $order->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item"><i class="fas fa-trash"></i> {{ __('translate.Delete') }}</a>
                                                                </li>

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
            $("#item_delect_confirmation").attr("action",'{{ url("admin/order-delete/") }}'+"/"+id)
        }
    </script>
@endpush
