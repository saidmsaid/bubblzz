@extends('admin.layouts.app')
@section('title', 'Create Subcategory')
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
                                Create New Subcategory
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('subcategory.store')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Subcategory Name</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="category_name" id="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Subcategory Arabic Name</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="category_name_ar" id="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Subcategory Description</label>
                        <div class="controls">
                            <textarea class="custom-input" name="category_description" id="url"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Subcategory Arabic Description</label>
                        <div class="controls">
                            <textarea class="custom-input" name="category_description_ar" id="url"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                            <label class="control-label">Category *</label>
                            <div class="controls">
                                <select class="form-control m-input custom-selectBox" name="category_id">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <span class="m-form__help">Please select an option.</span>
                            </div>
                        </div>
                    <div class="control-group">
                        <label class="control-label">Subcategory image</label>
                        <div class="controls">
                            <input type="file" name="image" ><br>
                            <small>Notice: Max Size 8 M ,<em>small size helps to perform better</em> </small>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Create" class="btn m-btn--air btn-success">
                        <a class="btn custom-button" href="{{route('subcategory.index')}}">Cancel</a>
                    </div>
                </form>
                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>


@endsection
@section('script')
    <script src="{{asset('assets/demo/demo12/custom/crud/forms/validation/form-controls.js')}}" type="text/javascript"></script>
@endsection