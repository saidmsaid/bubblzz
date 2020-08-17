@extends('admin.layouts.app')
@section('title', 'Contact Page')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">

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

                <form class="m-form m-form--state m-form--fit m-form--label-align-right">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Address </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->address}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Phone </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <p>{{$contact->phone}}</p>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Mobile </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->number}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Email </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->mail}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Website </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->website}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Fax </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->fax}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Hotline </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->hotLine}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Longitude </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->longitude}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Latitude </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->latitude}}
                            </div>
                        </div>



                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Facebook </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->facebook}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">twitter </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->twitter}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">instagram </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->instagram}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Google + </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->google}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Youtube </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->youtube}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">Linkedin </label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                {{$contact->linkedin}}
                            </div>
                        </div>


                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <a class="btn m-btn--air btn-primary" href="{{route('contact.edit', 1)}}">Edit</a>
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