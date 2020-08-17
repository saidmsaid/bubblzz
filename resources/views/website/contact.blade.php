@extends('website.website')

@section('content')
 <!-- CONTENT START -->
        <div class="page-content">
          
            <!-- BREADCRUMB ROW -->                            
            <div class="bg-gray-light p-tb20">
            	<div class="container">
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        <li><a href="javascript:void(0);"><i class="fa fa-home"></i> Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
            <!-- BREADCRUMB ROW END -->
             
            <!-- SECTION CONTENTG START -->
            <div class="section-full p-t80 p-b50">
                <div class="container">
                              <!-- CONTACT DETAIL BLOCK -->
                    <div class="section-content ">
                        <div class="row">
                            <div class="wt-box text-center  col-md-12">
                                <h4 class="text-uppercase">Contact Us </h4>
                                <div class="wt-separator-outer m-b30"><div class="wt-separator bg-primary"></div></div>
                                <div class="row">
                                
                                    <div class="col-md-4 col-sm-12 m-b30">
                                        <div class="wt-icon-box-wraper center p-a30 bdr-2 bdr-gray-light">
                                            <div class="wt-icon-box-sm text-primary bg-white radius bdr-2 m-b20"><span class="icon-cell"><i class="fa fa-phone"></i></span></div>
                                            <div class="icon-content">
                                                <h5>Phone</h5>
                                                <p>{{$contact->number}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 m-b30">
                                        <div class="wt-icon-box-wraper center p-a30 bdr-2 bdr-gray-light">
                                            <div class="wt-icon-box-sm text-primary bg-white radius bdr-2 m-b20"><span class="icon-cell"><i class="fa fa-envelope"></i></span></div>
                                            <div class="icon-content">
                                                <h6>Email</h6>
                                                <p>{{$contact->mail}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 m-b30">
                                        <div class="wt-icon-box-wraper center p-a30 bdr-2 bdr-gray-light">
                                            <div class="wt-icon-box-sm text-primary bg-white radius bdr-2 m-b20"><span class="icon-cell"><i class="fa fa-map-marker"></i></span></div>
                                            <div class="icon-content">
                                                <h5>Address</h5>
                                                <p>{{$contact->address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-content m-b50 ">
                        <div class="row">
                        
                        	<!-- LOCATION BLOCK-->
                            <div class="wt-box text-center col-md-12">
                                <h4 class="text-uppercase">Where To Find Us</h4>
                               <div class="wt-separator-outer m-b30"><div class="wt-separator bg-primary"></div></div>
                                <div class="section-content no-col-gap">
                           
                         
                            <div class="row">
                    
                           
                               @foreach($branchs as $branch)
                            <!-- COLUMNS 1 -->
                            <div class="col-md-4 col-sm-6 animate_line">
                                <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                    <div class="icon-md text-primary m-b20">
                                        <a href="#" class="icon-cell"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="icon-content">
                                        <h5 class="wt-tilte text-capitalize">{{$branch->branch_name}}</h5>
                                        <p>{{$branch->branch_address}}

                                    <ul >
                                       
                                       @if($branch->branch_number !== null) <li>{{$branch->branch_number}}</li>@endif
                                        @if($branch->branch_other_number)<li>{{$branch->branch_other_number}}</li>@endif
                                        
                                    </ul>
                             
                                         </p>
                                        

                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                        </div>
                     
                          
                            
                            </div>
                            </div>
                            </div>
                            <div class="section-content m-b50 ">
                            <div class="row">
                            <!-- CONTACT FORM-->
                            <div class="wt-box text-center col-md-12">
                                <h4 class="text-uppercase">GET IN TOUCH </h4>
                               <div class="wt-separator-outer m-b30"><div class="wt-separator bg-primary"></div></div>
                                
                                <form class="cons-contact-form" method="post" action="{{route('contact.submit')}}">
                      
                                        {{csrf_field()}}
                                                                            {{method_field('POST')}}

                                    <div class="row">
                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                   
                                                     <input name="name" type="text" required="" class="form-control" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                    <input name="email" type="email" class="form-control" required="" placeholder="Email">
                                                </div>
                                            </div>
        
                                        </div>
                                       <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                    <input name="subject" type="text" class="form-control" required="" placeholder="Subject">
                                                </div>
                                            </div>
        
                                        </div>
        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon v-align-m"><i class="fa fa-pencil"></i></span>
                                                    <textarea name="message" class="form-control" rows="4" placeholder="message"></textarea>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="col-md-12 text-right">
                                            <button name="submit" type="submit" value="Submit" class="site-button  m-r15">Submit </button>
                                           
                                        </div>
        
                                    </div>

                        		</form>
                        
                            </div>
                            
                        </div>
                    </div>
                    
      
                    
                </div>
           </div>
            <!-- SECTION CONTENT END -->
            
        </div>
        <!-- CONTENT END -->

        <!-- FOOTER START -->
        <footer class="site-footer footer-dark">
            <!-- COLL-TO ACTION START -->
@endsection