@extends('admin.layouts.app')
@section('title', 'Edit Contact Page')
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
                                Contact
                            </h3>
                        </div>
                    </div>
                </div>

                <form enctype="multipart/form-data" action="{{route('contact.update', $contact->id)}}" class="m-form m-form--state m-form--fit m-form--label-align-right" id="m_form_4" method="post">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Address </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="address" value="{{$contact->address}}" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Phone </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="phone" value="{{$contact->phone}}">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Mobile </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="mobile" value="{{$contact->number}}" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Email </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="mail" value="{{$contact->mail}}" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Website </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="website" value="{{$contact->website}}" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Fax </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="fax"  value="{{$contact->fax}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Hotline </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="hotline"  value="{{$contact->hotLine}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Longitude </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="long"  value="{{$contact->longitude}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Latitude </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="lat"  value="{{$contact->latitude}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Facebook </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="facebook"  value="{{$contact->facebook}}">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">twitter </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="twitter" value="{{$contact->twitter}}" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">instagram </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="instagram" value="{{$contact->instagram}}" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Google + </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="google" value="{{$contact->google}}" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Youtube </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="youtube" value="{{$contact->youtube}}" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Linkedin </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control m-input custom-input" name="linkedin" value="{{$contact->linkedin}}" >
                            </div>
                        </div>

                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <input type="submit" class="btn m-btn--air btn-success" value="Save">
                                    <a class="btn custom-button" href="{{route('contact.index')}}">Cancel</a>
                                    <input type="hidden" value="Put" name="_method">
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

@endsection