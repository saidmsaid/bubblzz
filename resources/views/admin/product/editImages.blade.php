@extends('admin.layouts.app')
@section('title', 'Product')
@section('content')


    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- END: Subheader -->
        <div class="m-content">
            @include('admin.includes.message')
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Edit Products Images
                            </h3>
                        </div>
                    </div>
                    <form enctype="multipart/form-data"  action="{{route('product.saveImage', $product_id)}}" method="post">
                        @csrf
                    <div class="m-portlet__head-tools">
                        <div class="m-portlet__nav">
                            <div class="m-portlet__nav-item"><input type="file" name="image"></div>
                            <div class="m-portlet__nav-item">
                                <input type="submit" value="Upload"  class="btn m-btn--pill    btn-success">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>Added Date</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                            <tr class="gradeX">
                                <td>{{date('M j, Y', strtotime($image->created_at))}}</td>
                                <td  class="text-center">
                                    <img src="/storage/products/{{$image->image_name}}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td class="center text-center">
                                    <button title="Delete" data-catid="{{$image->id}}" type="button" class="btn custom-button deleteCat" data-toggle="modal" data-target="#m_modal_1"><i class="flaticon-delete-1"></i></button>
                                </td>
                            </tr>
                               <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete this product?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <form style="display: inline-block" action="{{route('product.deleteImage', $product_id)}}" method="post">
                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                                <input type="hidden" value="{{$image->id}}" name="imageID" id="catID">
                                <button title="Delete" type="submit" class="btn custom-button">Yes, delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!--begin::Modal-->
         
            <!--end::Modal-->
        </div>

    </div>

@endsection