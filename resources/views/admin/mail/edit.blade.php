@extends('admin.layouts.app')
@section('title', 'Edit Mail')
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
                                Edit Mail
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('mails.update',$mail->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Mail Subject</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="subject"  value="{{$mail->subject}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mail Body</label>
                        <div class="controls">
                          
                            <textarea class="custom-input ckeditor" name="body"> {!! $mail->body !!}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mail Bcc</label>
                        <div class="controls">
                            <input class="custom-input" type="email" name="bcc"  value="{{$mail->bcc}}">
                        </div>
                    </div>
                 
                   
                   
                    <div class="form-actions">
                        <input type="hidden" value="PUT" name="_method">
                        <input type="submit" value="Update" class="btn m-btn--air btn-success">
                        <a class="btn custom-button" href="{{route('mails.index')}}">Cancel</a>
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