@extends('admin.layouts.app')
@section('title', 'Branchs')
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
                                Branchs
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('branch.create')}}" class="btn m-btn--pill    btn-success">
												<span>
													<span>New Branch</span>
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
                            <th>Branch Name</th>
                            <th>Branch Address</th>
                            <th>Branch Phone Number</th>
                            <th>Branch Other Phone Number</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($branchs as $branch)
                            <tr class="gradeX">
                                <td class="text-center">{{$branch->branch_name}}</td>
                                <td class="text-center">{{strlen($branch->branch_address) > 30 ? substr($branch->branch_address, 0, 30). "...": $branch->branch_address}}</td>
                                <td class="text-center">{{$branch->branch_number}}</td>
                                <td class="text-center">{{$branch->branch_other_number}}</td>
                                <td class="center text-center">
                                    <a title="Edit" href="{{route('branch.edit', $branch->id)}}" class="btn m-btn--air btn-primary custom-padding"><i class=" flaticon-edit-1"></i></a>
                                    <button title="Delete" data-catid="{{$branch->id}}" type="button" class="btn custom-button deleteCat custom-padding" data-toggle="modal" data-target="#{{$branch->id}}"><i class="flaticon-delete-1"></i></button>
                                </td>
                            </tr>
                             <!--begin::Modal-->
                                <div class="modal fade" id="{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Branch</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                             <p>Are you sure to delete this branch? If yes, It will delete branch</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                <form style="display: inline-block" action="{{route('branch.destroy', $branch->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="DELETE" name="_method">
                                                    <input type="hidden" value="{{$branch->id}}" name="catId" id="catID">
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