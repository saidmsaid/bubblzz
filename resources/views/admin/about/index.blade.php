@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/uniform.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-media.css')}}" />
@endsection
@section('title', 'About')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                About
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form>
                    <div class="control-group">
                        <div class="row custom-padding">
                            <label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4 controls">
                                <p>{!! $about->title !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="row custom-padding">
                            <label class="col-sm-2 control-label">Arabic Title</label>
                            <div class="col-sm-4 controls">
                                <p>{!! $about->title_ar !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="row custom-padding">
                            <label class="col-sm-2 control-label">About</label>
                            <div class="col-sm-4 controls">
                                <p>{!! $about->about !!} </p>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="row custom-padding">
                            <label class="col-sm-2 control-label">Arabic About</label>
                            <div class="col-sm-4 controls">
                                <p>{!! $about->about_ar !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="row custom-padding">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-4 controls">
                                <img src="/storage/about/{{$about->image}}" alt="About Image" style="max-width: 100px; max-height: 100px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <a class="btn m-btn--air btn-primary" href="{{route('about.edit', 1)}}">Edit</a>
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