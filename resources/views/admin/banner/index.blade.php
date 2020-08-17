@extends('admin.layouts.app')
@section('title', 'Banners')
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
                                Banners
                            </h3>
                        </div>
                    </div>
                    {{--<div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('banner.create')}}" class="btn m-btn--pill    btn-success">
                                                <span>
                                                    <span>New Banner</span>
                                                </span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item"></li>
                        </ul>
                    </div>--}}
                </div>
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th class="text-center">Banner Position</th>
                            <th class="text-center">Banner link</th>
                            
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr class="gradeX">
                                <td class="text-center">{{$banner->banner_position}}</td>
                                <td class="text-center">{{strlen($banner->banner_link) > 30 ? substr($banner->banner_link, 0, 30). "...": $banner->banner_link}}</td>
                               
                                <td class="center text-center">
                                    <a title="Edit" href="{{route('banner.edit', $banner->id)}}" class="btn m-btn--air btn-primary custom-padding"><i class=" flaticon-edit-1"></i></a>
                                    @if($banner->banner_path !== null)
                                   <button title="Delete" data-catid="{{$banner->id}}" type="button" class="btn custom-button deleteCat custom-padding" data-toggle="modal" data-target="#{{$banner->id}}"><i class="flaticon-delete-1"></i></button>@endif
                                </td>
                            </tr>
                             <!--begin::Modal-->
                                <div class="modal fade" id="{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete banner image</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                             <p>Are you sure to delete this banner image? If yes, It will delete banner image</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                <form style="display: inline-block" action="{{route('banner.destroy',$banner->id )}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="DELETE" name="_method">
                                                    <input type="hidden" value="{{$banner->id}}" name="catId" id="catID">
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