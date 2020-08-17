@extends('admin.layouts.app')
@section('title', 'Orders')
@section('content')


    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session('success')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session('error')}}
                </div>
            @endif
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Orders
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('order.create')}}" class="btn m-btn--pill    btn-success">
												<span>
													<span>New Order</span>
												</span>
                                </a>
                            </li>
                             
                            @if(Route::current()->getName() == 'order.index')
                             <li class="m-portlet__nav-item">
                                 <a href="{{route('export-orders')}}" class="btn m-btn--pill    btn-outline-info">
                                                <span>
                                                    <span>Export Order Sheet</span>
                                                </span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="order_table">
                        <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Customer Name</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Order Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="gradeX">
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->mobile}}</td>
                                <td>
                               
                                {{$order->address}}
                               
                                </td>
                                <td>{{date('M j, Y H:i:s A', strtotime($order->created_at))}}</td>
                                <td>{{$order->totalPrice}} L.E</td>
                                <td>{{$order->status}}</td>
                                <td class="center text-center">
                                    @if($order->status == 1)
                                        <a title="Edit" href="{{route('order.edit', $order->id)}}" class="btn m-btn--air btn-primary custom-padding"><i class=" flaticon-edit-1"></i></a>
                                        <button title="Shipped" data-orderid="{{$order->id}}" data-orderstatus="3" type="button" class="btn m-btn--air custom-padding changeOrderStatus order-shipped" data-toggle="modal" data-target="#m_modal_2"><i class="fas fa-truck"></i></button>
                                        <button title="Delivered" data-orderid="{{$order->id}}" data-orderstatus="2" type="button" class="btn m-btn--air custom-padding changeOrderStatus order-delivered" data-toggle="modal" data-target="#m_modal_2"><i class="fas fa-check"></i></button>
                                        <button title="Canceled" data-orderid="{{$order->id}}" data-orderstatus="5" type="button" class="btn m-btn--air custom-padding changeOrderStatus custom-button" data-toggle="modal" data-target="#m_modal_2"><i class="fas fa-ban"></i></button>
                                       {{-- <button title="Returned" data-orderid="{{$order->id}}" data-orderstatus="4" type="button" class="btn m-btn--air custom-padding changeOrderStatus order-returned" data-toggle="modal" data-target="#m_modal_2"><i class="fas fa-reply"></i></button>--}}
                                        @elseif($order->status == 2)
                                       {{-- <button title="Returned" data-orderid="{{$order->id}}" data-orderstatus="4" type="button" class="btn m-btn--air custom-padding changeOrderStatus order-returned" data-toggle="modal" data-target="#m_modal_2"><i class="fas fa-reply"></i></button>--}}
                                    @elseif($order->status == 3)
                                        <button title="Delivered" data-orderid="{{$order->id}}" data-orderstatus="2" type="button" class="btn m-btn--air custom-padding changeOrderStatus order-delivered" data-toggle="modal" data-target="#m_modal_2"><i class="fas fa-check"></i></button>
                                        <button title="Canceled" data-orderid="{{$order->id}}" data-orderstatus="5" type="button" class="btn m-btn--air custom-padding changeOrderStatus custom-button" data-toggle="modal" data-target="#m_modal_2"><i class="fas fa-ban"></i></button>
                                        {{--<button title="Returned" data-orderid="{{$order->id}}" data-orderstatus="4" type="button" class="btn m-btn--air custom-padding changeOrderStatus order-returned" data-toggle="modal" data-target="#m_modal_2"><i class="fas fa-reply"></i></button>--}}

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

                <!--begin::Modal-->
                <div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Order Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure to change the order status?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                <form style="display: inline-block" action="{{route('order.changeOrderStatus', 1)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="PUT" name="_method">
                                    <input type="hidden" value="" name="status" id="orderStatus">
                                    <input type="hidden" value="" name="orderID" id="orderID">
                                    <button title="Delete" type="submit" class="btn btn-success">Yes, Change</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Modal-->


        </div>
    </div>
@endsection