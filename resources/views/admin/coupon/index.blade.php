@extends('admin.layouts.app')
@section('title', 'Coupons')
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
                                Coupons
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('coupon.create')}}" class="btn m-btn--pill    btn-success">
												<span>
													<span>New Coupon</span>
												</span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item"></li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>Coupon Code</th>
                            <th>Coupon Percentage</th>
                            <th>Coupon Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr class="gradeX">
                                <td class="text-center">{{$coupon->code}}</td>
                                <td class="text-center">{{$coupon->code_value}}</td>
                                <td class="text-center">{{$coupon->status}}</td>
                                
                                <td class="center text-center">
                                    <a title="Edit" href="{{route('coupon.edit', $coupon->id)}}" class="btn m-btn--air btn-primary custom-padding"><i class=" flaticon-edit-1"></i></a>
                                    <button title="Delete" data-catid="{{$coupon->id}}" type="button" class="btn custom-button deleteCat custom-padding" data-toggle="modal" data-target="#{{$coupon->id}}"><i class="flaticon-delete-1"></i></button>
                                </td>
                            </tr>
                             <!--begin::Modal-->
                                <div class="modal fade" id="{{$coupon->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete coupon</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                             <p>Are you sure to delete this coupon? If yes, It will delete coupon</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                <form style="display: inline-block" action="{{route('coupon.destroy', $coupon->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="DELETE" name="_method">
                                                    <input type="hidden" value="{{$coupon->id}}" name="catId" id="catID">
                                                    <button title="Delete" type="submit" class="btn custom-button">Yes, delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--end::Modal-->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>
@endsection