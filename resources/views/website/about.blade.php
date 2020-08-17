@extends('website.website')

@section('content')
        <!-- CONTENT START -->
        <div class="page-content">
            
            
                
            <!-- BREADCRUMB ROW -->                            
            <div class="bg-gray-light p-tb20">
                <div class="container">
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        <li><a href="javascript:void(0);"><i class="fa fa-home"></i> Home</a></li>
                        <li>About</li>
                    </ul>
                </div>
            </div>
            <!-- BREADCRUMB  ROW END --> 
            
                <!-- ABOUT COMPANY SECTION START -->
                <div class="section-full p-tb100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-6 col-xs-100pc">
                                <div >
                                    <img src="{{asset('storage/public/about/'.$about->image)}}" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-6 col-xs-100pc">
                                <div class="section-head text-left">
                                    <h3 class="text-uppercase">{{$about->title}} </h3>
                                    <div class="wt-separator-outer">
                                        <div class="wt-separator style-icon">
                                           
                                            <span class="separator-left bg-primary"></span>
                                            <span class="separator-right bg-primary"></span>
                                        </div>                            
                                    </div>
                                    <p>{{$about->about}} .
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>   
                <!-- ABOUT COMPANY SECTION END --> 
                 
                               
                                
                
                    
        </div>
        <!-- CONTENT END -->
        
        <!-- FOOTER START -->
        <footer class="site-footer footer-dark">
            <!-- COLL-TO ACTION START -->
          
@endsection('content')