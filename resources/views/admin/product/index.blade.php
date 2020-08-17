@extends('admin.layouts.app')
@section('title', 'Product')
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
                                Products
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('product.create')}}" class="btn m-btn--pill    btn-success">
												<span>
													<span>New Product</span>
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
                            <th>Name</th>
                            <th>Small Description</th>
                            <th>Price</th>
                            <th>Offer</th>
                            <th>Category</th>
                           
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr class="gradeX">
                                <td>{{$product->name}}</td>
                                <td>{!! $product->small_description !!}</td>
                                <td>{{$product->price}}</td>
                                <td>@if($product->offer == 0){{'No Offer'}} @else {{$product->offer}}@endif</td>
                                <td>{{$product->Category->name}}</td>
                               
                                <td class="center text-center">
                                    <a title="Edit" href="{{route('product.edit', $product->id)}}" class="btn m-btn--air btn-primary custom-padding"><i class=" flaticon-edit-1"></i></a>
                                  <a title="Edit Images" href="{{route('product.editImages', $product->id)}}" class="btn m-btn--air btn-success custom-padding"><i class="fas fa-camera"></i></a>
                                   <a title="Reviews" href="{{route('product.reviews', $product->id)}}" class="btn m-btn--air btn-info custom-padding"><i class="fas fa-comments"></i></a>
                                    <button title="Delete" data-catid="{{$product->id}}" type="button" class="btn custom-button deleteCat custom-padding" data-toggle="modal" data-target="#{{$product->id}}"><i class="flaticon-delete-1"></i></button>
                                </td>
                            </tr>
                            <!--begin::Modal-->
                                <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form style="display: inline-block" action="{{route('product.destroy', 1)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="DELETE" name="_method">
                                                    <input type="hidden" value="{{$product->id}}" name="productId" id="catID">
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
                <!--<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form style="display: inline-block" action="{{route('product.destroy', 1)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method">
                                    <input type="hidden" value="" name="productId" id="catID">
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