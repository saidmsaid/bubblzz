@extends('admin.layouts.app')
@section('title', 'Create Orders')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/uniform.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-media.css')}}" />
@endsection
@section('content')


    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
        {{--{{preg_match('/(value="1")/', Session::get('productToFind')[0][1]['data'], $hey)}}--}}
                {{--{{$hey[1]}}--}}
{{--            {{var_dump(Session::remove('productToFind'))}}--}}
{{--            {{dd(Session::get('productToFind'))}}--}}
        @include('admin.includes.message')
        <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                New Order
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('order.store')}}" name="basic_validate" id="order_validate" novalidate="novalidate">
                    @csrf
                    <div style="padding: 10px;" class="control-group">
                        <div class="row">
                            <div class="col col-xs-12">
                                <label style="margin-left: 12px;">Name:</label>
                                <input style="width: 150px;" id="customerName" class="custom-input" type="text" >
                                <label style="margin-left: 12px;">Mobile:</label>
                                <input style="width: 150px;" id="customerNumber" class="custom-input" type="text">
                                <button  style="margin-left: 12px;" type="button" id="find-customer" class="btn m-btn--air btn-primary">Find</button>

                            </div>
                        </div>

                    </div>
                    <div class="alert alert-danger text-center hidden">
                        <span id="customerNotFound"></span>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> Name</label>
                        <div class="controls">
                            <input id="customerGetName" class="custom-input" type="text" value="" disabled>
                            <input type="hidden" name="name" id="testName" value="">
                            <input id="customerGetId" class="custom-input" type="hidden" name="customer_id" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email </label>
                        <div class="controls">
                            <input id="customerGetEmail" class="custom-input" type="text"  disabled="disabled">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mobile </label>
                        <div class="controls">
                            <input id="customerGetMobile" class="custom-input" type="text" disabled="disabled">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <input id="customerGetAddress" class="custom-input" type="text" disabled="disabled">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Country </label>
                        <div class="controls">
                            <input id="customerGetCountry" class="custom-input" type="text" disabled="disabled">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">City </label>
                        <div class="controls">
                            <input id="customerGetCity" class="custom-input" type="text" disabled="disabled">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Search Product</label>
                        <div class="controls">
                            <input id="search-product" class="custom-input" type="text" required>
                            <input id="order-id" value="0" type="hidden">
                            <button id="find-product" type="button" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <!--begin: Datatable -->
                            <table id="table-data" class="table table-striped- table-bordered table-hover table-checkable" >
                                <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Arabic Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total Price</th>
                                    <th class="text-center" >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(session()->has('productToFind'))
                                        @foreach(Session::get('productToFind')[0] as  $product)
                                            <tr>
                                                <td class="text-center">{{$product['name']}}</td>
                                                <td class="text-center">{{$product['name_ar']}}</td>
                                                <td class="text-center">{!! $product['data'] !!}</td>
                                                <td class="text-center">{!! $product['price'] !!}</td>
                                                <td class="text-center">{!! $product['deleteButton'] !!}</td>

                                            </tr>
                                        @endforeach

                                    @endif
                                </tbody>
                            </table>
                            <div id="totalPrice">
                                <span>Total Price: </span> <span id="outputPrice">@if(session()->has('productToFind')) {{Session::get('productToFind')[1]}} L.E @endif</span>
                                <input id="totalPriceValue" type="hidden" value="@if(session()->has('productToFind')){{Session::get('productToFind')[1]}}@else 0 @endif" name="totalPrice">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Submit Order" class="btn m-btn--air btn-success">
                        <a class="btn custom-button" href="{{route('order.index')}}">Cancel</a>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
            <!--begin::Modal-->
            <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete this product?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button id="productRow" type="button" class="btn custom-button" data-dismiss="modal">Yes, delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Modal-->
        </div>
    </div>



@endsection
@section('script')
    <script src="{{asset('assets/demo/demo12/custom/crud/forms/validation/form-controls.js')}}" type="text/javascript"></script>
@endsection