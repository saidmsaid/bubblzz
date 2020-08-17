@extends('admin.layouts.app')
@section('title', 'Create Product')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">

        @include('admin.includes.message')
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Create New Product
                            </h3>
                        </div>
                    </div>
                </div>

                <form enctype="multipart/form-data" action="{{route('product.store')}}" class="m-form m-form--state m-form--fit m-form--label-align-right" id="m_form_2" method="post">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Name *</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Category *</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <select class="form-control m-input custom-selectBox" name="category_id">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        @if($category->children->count() > 0  ) 
                                         <optgroup label="{{$category->name}}">
                                         @foreach($category->children as $child)
                                            <option value="{{$child->id}}">{{$child->name}}</option>
                                         @endforeach
                                         </optgroup>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="m-form__help">Please select an option.</span>
                            </div>
                        </div>
                        
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Arabic Name </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="name_ar"  value="{{old('name_ar')}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Small Description </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="small_description"  value="{{old('small_description')}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Arabic Small Description </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="small_description_ar" value="{{old('small_description_ar')}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Full Description </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <textarea class="form-control m-input custom-input" name="full_description">{{old('full_description')}}</textarea>
                            </div>
                        </div>
                       
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Arabic Full Description </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <textarea class="form-control m-input custom-input" name="full_description_ar">{{old('full_description_ar')}}</textarea>
                            </div>
                        </div>
                         <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Product Directions </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <textarea class="form-control m-input custom-input" name="product_directions">{{old('product_directions')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Product Ingredients </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <textarea class="form-control m-input custom-input" name="product_Ingredients">{{old('product_Ingredients')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Price </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="price" >
                            </div>
                        </div>

                        {{--<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space"></div>--}}
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Has offer</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="m-checkbox-inline">
                                    <label class="m-checkbox">
                                        <input type="checkbox" name="checkbox" id="offer"> Tick me
                                        <span></span>
                                    </label>
                                </div>
                                <span class="m-form__help">Please tick the checkbox if the product has an offer</span>
                            </div>
                        </div>
                        <div class="offer-none">
                            <div class="form-group m-form__group row ">
                                <label class="col-form-label col-lg-3 col-sm-12">Offer Price</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input class="form-control m-input custom-input" name="offer" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Video Link </label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" type="text" name="youtube_link" value="{{old('youtube_link')}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Product Code</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" type="text" name="product_code" value="{{old('product_code')}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Location </label>
                            <div class="m-checkbox-inline">
                                <label class="m-checkbox">
                                    <input type="checkbox" name="featured" value="1"> Featured
                                    <span></span>
                                </label>
                                <label class="m-checkbox">
                                    <input type="checkbox" name="special" value="1"> Special
                                    <span></span>
                                </label>
                                <label class="m-checkbox">
                                    <input type="checkbox" name="recent" value="1"> Recent
                                    <span></span>
                                </label>
                                <label class="m-checkbox">
                                    <input type="checkbox" name="sold" value="1"> Sold
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Default Image </label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <input type="file" name="product_image"><br>
                            <small>Notice: Max Size 8 M ,<em>small size helps to perform better</em> </small>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <button type="submit" class="btn m-btn--air btn-success">Create</button>
                                    <a class="btn custom-button" href="{{route('product.index')}}">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!--end::Portlet-->
        </div>
    </div>


@endsection
@section('script')
    <script src="{{asset('assets/demo/demo12/custom/crud/forms/validation/form-controls.js')}}" type="text/javascript"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
    </script>
@endsection