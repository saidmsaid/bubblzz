@extends('admin.layouts.app')
@section('title', 'Edit Category')
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
                                Edit Category
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('category.update',$category->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="category_name" id="required" value="{{$category->name}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category Arabic Name</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="category_name_ar" id="required" value="{{$category->name_ar}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category Description</label>
                        <div class="controls">
                            <textarea class="custom-input" name="category_description" id="url">{{$category->description}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category Arabic Description</label>
                        <div class="controls">
                            <textarea class="custom-input" name="category_description_ar" id="url">{{$category->description_ar}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category image</label>
                        <div class="controls">
                            <input type="file" name="image" ><br>
                            <small>Notice: Max Size 8 M ,<em>small size helps to perform better</em> </small>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" value="PUT" name="_method">
                        <input type="submit" value="Update" class="btn m-btn--air btn-success">
                        <a class="btn custom-button" href="{{route('category.index')}}">Cancel</a>
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