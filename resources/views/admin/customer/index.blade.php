@extends('admin.layouts.app')
@section('title', 'Customers')
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
                                Customers
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('customer.create')}}" class="btn m-btn--pill    btn-success">
												<span>
													<span>New customer</span>
												</span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item">
                                 <a href="{{route('export-customers')}}" class="btn m-btn--pill    btn-outline-info">
                                                <span>
                                                    <span>Export Customer Sheet</span>
                                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address1</th>
                            <th>Address2</th>
                            <th>Address3</th>
                            <th>Address4</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr class="gradeX">
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->mobile}}</td>
                                <td>{{$customer->address1}}</td>
                                <td>{{$customer->address2}}</td>
                                <td>{{$customer->address3}}</td>
                                <td>{{$customer->address4}}</td>
                                <td>{{$customer->state->state_name}}</td>
                                <td>{{$customer->city->city_name}}</td>
                                <td class="center">
                                    <a title="Edit" href="{{route('customer.edit', $customer->id)}}" class="btn m-btn--air btn-primary custom-padding"><i class=" flaticon-edit-1 fa-fw"></i></a>
                                    <button title="Delete" data-catid="{{$customer->id}}" type="button" class="btn custom-button deleteCat custom-padding" data-toggle="modal" data-target="#{{$customer->id}}"><i class="flaticon-delete-1 fa-fw"></i></button>
                                </td>
                            </tr>
                            <!--begin::Modal-->
                                <div class="modal fade" id="{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete customer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <p>Are you sure to delete this customer? If yes, It will delete all customer's orders</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                <form style="display: inline-block" action="{{route('customer.destroy', 1)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="DELETE" name="_method">
                                                    <input type="hidden" value="{{$customer->id}}" name="customerId" id="catID">
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

                <!--begin::Modal-->
               <!-- <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure to delete this customer? If yes, It will delete all customer's orders</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                <form style="display: inline-block" action="{{route('customer.destroy', 1)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method">
                                    <input type="hidden" value="" name="customerId" id="catID">
                                    <button title="Delete" type="submit" class="btn custom-button">Yes, delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!--end::Modal-->

        </div>
    </div>
@endsection