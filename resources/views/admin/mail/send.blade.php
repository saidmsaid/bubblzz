@extends('admin.layouts.app')
@section('title', 'Create Mail')
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
                                Create New Mail
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('mails.send')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Mail Subject</label>
                        <div class="controls">
                            <input class="custom-input" type="text" name="subject"  value="{{old('subject')}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mail Body</label>
                        <div class="controls">
                          
                            <textarea class="custom-input ckeditor" name="body"> {!! old('body') !!}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mail Bcc</label>
                        <div class="controls">
                            <input class="custom-input" type="email" name="bcc"  value="{{old('bcc')}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Customers</label>
                        <div class="controls">
                           <!--  <select class="form-control m-select2" id="m_select2_3" name="param" multiple="multiple"></select> -->
                            <select class="custom-selectBox m-select2" id="customers_id" name="customers_id[]"  multiple="multiple">
                                @foreach($customers as $customer )
                                <option value="{{$customer->id}}">{{$customer->name . " ($customer->email)"}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Send" class="btn m-btn--air btn-success">
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
    <script type="text/javascript">
    $("#customers_id").select2({ placeholder:"Select Customers",width: '100%',});
</script>
@endsection