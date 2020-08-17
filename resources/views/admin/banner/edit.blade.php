@extends('admin.layouts.app')
@section('title', 'Edit Banner')
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
                                Edit {{$banner->banner_position}} banner
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('banner.update',$banner->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Banner link</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="banner_link"  value="{{$banner->banner_link}}">
                        </div>
                    </div>
                   <div class="control-group">
                        <label class="control-label">@if($banner->id !== 3) Image @else Video @endif</label>
                        <div class="controls">
                        @if($banner->id !== 3)
                            <img  src="{{asset('storage/public/banner/'.$banner->banner_path)}}" alt="Banner Image" class="thumb">
                            @else
                             <video class="bottomBanner" style=" max-height: 100px" autoplay muted loop playsinline id="my_video" data-bgfit="cover"  data-bgposition="center center" controls="true">
                                            <source src="{{asset('storage/public/banner/'.$banner->banner_path)}}" type="video/mp4">
                                        </video>
                            @endif
                            <input type="file" name="banner_path">
                        </div>
                    </div>
                   
                    <div class="form-actions">
                        <input type="hidden" value="PUT" name="_method">
                        <input type="submit" value="Update" class="btn m-btn--air btn-success">
                        <a class="btn custom-button" href="{{route('banner.index')}}">Cancel</a>
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