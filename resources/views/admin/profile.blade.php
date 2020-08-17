@extends('admin.layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">My Profile</h3>
                </div>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">

            @include('admin.includes.message')
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="m-portlet m-portlet--full-height  ">
                        <div class="m-portlet__body">
                            <div class="m-card-profile">
                                <div class="m-card-profile__title m--hide">
                                    Your Profile
                                </div>
                                <div class="m-card-profile__pic">
                                    <div class="m-card-profile__pic-wrapper">
                                        <img src="/storage/admins/{{auth()->user()->image}}" alt="Image Profile" />
                                    </div>
                                </div>
                                <div class="m-card-profile__details">
                                    <span class="m-card-profile__name">{{auth()->user()->name}}</span>
                                    <a href="{{route('admin.profile')}}" class="m-card-profile__email m-link">{{auth()->user()->email}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                            <i class="flaticon-share m--hide"></i>
                                            Update Profile
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_user_profile_tab_1">
                                <form enctype="multipart/form-data" action="{{route('admin.updateProfile', auth()->user()->id)}}" method="post" class="m-form m-form--fit m-form--label-align-right">
                                    @csrf
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                            <div class="col-7">
                                                <input name="name" class="form-control m-input" type="text" value="{{auth()->user()->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Username</label>
                                            <div class="col-7">
                                                <input name="username" class="form-control m-input" type="text" value="{{auth()->user()->username}}">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Password</label>
                                            <div class="col-7">
                                                <div class="password-parent">
                                                    <input name="password" class="form-control m-input" type="password">
                                                    <span class="toggle-password"><i class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Image Profile</label>
                                            <div class="col-7">
                                                <input class="m-input" type="file" name="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions">
                                            <div class="row">
                                                <div class="col-2">
                                                </div>
                                                <div class="col-7">
                                                    <button type="submit" class="btn m-btn--air btn-success">Save changes</button>&nbsp;&nbsp;
                                                    <button class="btn custom-button"><a href="{{url()->previous()}}">Cancel</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane " id="m_user_profile_tab_2">
                            </div>
                            <div class="tab-pane " id="m_user_profile_tab_3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection