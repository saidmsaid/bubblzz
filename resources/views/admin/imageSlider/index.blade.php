@extends('admin.layouts.app')
@section('title', 'Home Images')
@section('content')


    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session('success')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session('error')}}
                </div>
            @endif
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Home images
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('imageslider.create')}}" class="btn m-btn--pill    btn-success">
												<span>
													<span>New Image</span>
												</span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item"></li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>Text</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($imageSliders as $imageSlider)
                            <tr class="gradeX">
                                <td>{{$imageSlider->text}}</td>
                                <td>{{strlen($imageSlider->description) > 30 ? substr($imageSlider->description, 0, 30). "...": $imageSlider->description}}</td>
                                <td><img style="max-width: 100px; max-height: 100px" src="/storage/imageSlider/{{$imageSlider->image}}" alt="Image Slider"></td>
                                <td>{{$imageSlider->order}}</td>
                                <td class="center">
                                    <a title="Edit" href="{{route('imageslider.edit', $imageSlider->id)}}" class="btn m-btn--air btn-primary custom-padding"><i class=" flaticon-edit-1"></i></a>
                                    <form style="display: inline-block" action="{{route('imageslider.destroy', $imageSlider->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button title="Delete" type="submit" class="btn custom-button custom-padding"><i class="flaticon-delete-1"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection