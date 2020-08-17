@extends('admin.layouts.app')
@section('title', 'Edit Orders')
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

        @include('admin.includes.message')
        <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Edit Order
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('order.update', $order->id)}}" name="basic_validate"    novalidate="novalidate">
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
                        @if($order->customer_id !==null)
                            <input id="customerGetName" class="custom-input" type="text" name="name" value="{{$order->customer->name}}" disabled="disabled">
                            <input id="customerGetId" class="custom-input" type="hidden" name="customer_id"  value="{{$order->customer->id}}">
                        @else
                            <input id="customerGetName" class="custom-input" type="text" name="name" value="{{$order->name}}" disabled="disabled">
                        @endif    
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email </label>
                        <div class="controls">
                        @if($order->customer_id !==null)
                            <input id="customerGetEmail" class="custom-input" type="text"  value="{{$order->customer->email}}" disabled="disabled">
                        @else
                            <input id="customerGetEmail" class="custom-input" type="text"  value="{{$order->email}}" disabled="disabled">
                        @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mobile </label>
                        <div class="controls">
                        @if($order->customer_id !==null)
                            <input id="customerGetMobile" class="custom-input" type="text"  value="{{$order->customer->mobile}}" disabled="disabled">
                        @else
                            <input id="customerGetMobile" class="custom-input" type="text"  value="{{$order->mobile}}" disabled="disabled">
                        @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                         @if($order->customer_id !==null)
                            <input id="customerGetAddress" class="custom-input" type="text" value="{{$order->customer->address1}}" disabled="disabled">
                        @else
                           
                            <textarea id="customerGetAddress" class="custom-input" disabled="disabled"> {{$order->address}}
                            </textarea>
                        @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Country </label>
                        <div class="controls">
                        @if($order->customer_id !==null)
                            <input id="customerGetCountry" class="custom-input" type="text"  value="{{$order->customer->country}}" disabled="disabled">
                        @else
                            <input id="customerGetCountry" class="custom-input" type="text"  value="{{$order->state_name}}" disabled="disabled">

                        @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">City </label>
                        <div class="controls">
                        @if($order->customer_id !== null)
                            <input id="customerGetCity" class="custom-input" type="text"  value="{{$order->customer->city}}" disabled="disabled">
                        @else
                            <input id="customerGetCity" class="custom-input" type="text"  value="{{$order->city_name}}" disabled="disabled">

                        @endif
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Status</label>
                        <div class="controls">
                            <select class="custom-selectBox" name="status">
                                <option value="1" @if($order->status == 1) {{'selected'}} @endif>Ordered</option>
                                <option value="3" @if($order->status == 3) {{'selected'}} @endif>Shipped</option>
                                <option value="2" @if($order->status == 2) {{'selected'}} @endif>Delivered</option>
                                <option value="5" @if($order->status == 5) {{'selected'}} @endif>Canceled</option>
                                <option value="4" @if($order->status == 4) {{'selected'}} @endif>Returned</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Search products</label>
                        <div class="controls">
                            <input id="search-product" class="custom-input" type="text">
                            <input id="order-id" value="{{$order->id}}" type="hidden">
                            <button id="find-product" type="button" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <!--begin: Datatable -->
                            <table id="table-data" class="table table-striped- table-bordered table-hover table-checkable" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i < $order->products->count(); $i++)
                                        <tr>
                                            <td>{{$order->products{$i}->name}}</td>
                                            <td><img src="{{asset('storage/public/products/'.$order->products{$i}->default_image)}}" class="thumb"></td>
                                            <td>
                                                {{--@foreach($orderProducts as $item)@if($order->products{$i}->id != $item->product_id){{str_replace(' ', '', $item->quantity)}}@endif @endforeach--}}
                                                <!-- <input id="editQuantity" style="width: 70px" type="number" min="1" value="@foreach($orderProducts as $item)@if($order->products{$i}->id == $item->product_id){{$item->quantity}}@endif{{""}}@endforeach" name="quantity_{{$i}}">
                                                <input type="hidden" name="product_{{$i}}" value="{{$order->products{$i}->id}}"> -->
                                                 @foreach($orderProducts as $item)@if($order->products{$i}->id == $item->product_id){{$item->quantity}}@endif{{""}}@endforeach
                                            </td>
                                            <td class="text-center editPrice">
                                                @foreach($orderProducts as $item)
                                                    @if($order->products{$i}->id == $item->product_id)
                                                        @if($order->products{$i}->offer != 0)
                                                            {{$order->products{$i}->offer * $item->quantity}}
                                                        @else
                                                            {{$order->products{$i}->price * $item->quantity}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center"><button data-row="{{$i}}" type="button" class="btn custom-button deleteProduct" data-toggle="modal" data-target="#m_modal_1"><i class="flaticon-delete-1"></i></button></td>
                                        </tr>

                                    @endfor
                                </tbody>
                            </table>
                            <div id="totalPrice">
                                <span>Total Price: </span> <span id="outputPrice">{{$order->totalPrice}} L.E</span>
                                <input id="totalPriceValue" type="hidden" value="{{$order->totalPrice}}" name="totalPrice">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Submit Order" class="btn m-btn--air btn-success">
                        <input type="hidden" value="PUT" name="_method">
                        <a class="btn custom-button" href="{{route('order.index')}}">Cancel</a>
                    </div>
                </form>
                <!--end::Form-->
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

            <!--end::Portlet-->
        </div>
    </div>


@endsection
@section('script')
    <script src="{{asset('assets/demo/demo12/custom/crud/forms/validation/form-controls.js')}}" type="text/javascript"></script>
@endsection