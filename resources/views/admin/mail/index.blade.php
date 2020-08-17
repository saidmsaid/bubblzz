@extends('admin.layouts.app')
@section('title', 'Mails')
@section('css')
  <link rel="stylesheet" href="{{asset('css/select2.css')}}" />
@endsection
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
                                Mails
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('mails.create')}}" class="btn m-btn--pill    btn-success">
												<span>
													<span>New Mail</span>
												</span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item">
                                 <a href="{{route('mails.send')}}" class="btn m-btn--pill    btn-primary">
                                                <span>
                                                    <span>Send Mail</span>
                                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>
                            <th>Mail Subject</th>
                            <th>Mail Body</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mails as $mail)
                            <tr class="gradeX">
                                <td class="text-center">{{$mail->subject}}</td>
                                <td class="text-center">{!! $mail->body !!}</td>
                                <td class="text-center">{{$mail->type}}</td>
                                
                                <td class="center text-center">
                                    <a title="Edit" href="{{route('mails.edit', $mail->id)}}" class="btn m-btn--air btn-primary custom-padding"><i class=" flaticon-edit-1"></i></a>
                                    @if($mail->type !== 'order')
                                    <button title="Delete" data-catid="{{$mail->id}}" type="button" class="btn custom-button deleteCat custom-padding" data-toggle="modal" data-target="#{{$mail->id}}"><i class="flaticon-delete-1"></i></button>
                                    <button title="Send" data-catid="{{$mail->id}}" type="button" class="btn  btn-success deleteCat custom-padding" data-toggle="modal" data-target="#mail_{{$mail->id}}"><i class="flaticon-mail"></i></button>
                                    @endif
                                </td>
                            </tr>
                             <!--begin::Modal-->
                             @if($mail->type !== 'order')
                                <div class="modal fade" id="{{$mail->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete mail</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                             <p>Are you sure to delete this mail? If yes, It will delete mail</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                <form style="display: inline-block" action="{{route('mails.destroy', $mail->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="DELETE" name="_method">
                                                    <input type="hidden" value="{{$mail->id}}" name="catId" id="catID">
                                                    <button title="Delete" type="submit" class="btn custom-button">Yes, delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="mail_{{$mail->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Send mail</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                             <em>*Mail Start With Hello CLient Name,*</em>
                                                <form  action="{{route('mails.send')}}" method="post" id="send_{{$mail->id}}">
                                                    @csrf
                                                    <input type="hidden" value="POST" name="_method">
                                                    <input type="hidden" value="{{$mail->id}}" name="mail_id" id="mail_id">
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
                                                    
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                <button title="Send" type="submit" class="btn  btn-success" onclick="$('#send_{{$mail->id}}').submit();">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 @endif
                            <!--end::Modal-->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $("#customers_id").select2({ placeholder:"Select Customers",width: '100%',});
</script>
@endsection