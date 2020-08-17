 @extends('website.website')

@section('content')
 <!-- CONTENT START -->
        <div class="page-content">
        
          
            
            
            <!-- BREADCRUMB ROW -->                            
            <div class="bg-gray-light p-tb20">
            	<div class="container">
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li>{{$title}} </li>
                    </ul>
                </div>
            </div>
            <!-- BREADCRUMB ROW END -->                   
            
            <!-- SECTION CONTENT -->
            <div class="section-full p-t80 p-b50">
            
            	<div class="container">
                	<div class="row">
                        <div class="col-md-12">
                        
                            <!-- TITLE  START -->
                            <div class="p-b30">
                                <h3 class="text-uppercase">{{$terms->shipping_title}}</h3>
                                <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                            </div>
                            <!-- TITLE START -->
                            
                            <!-- ACCORDION START -->
                            <div class="wt-accordion acc-bg-gray" id="accordion5">
                            
                                <div class="panel wt-panel">
                                   
                                        <div class="acod-content p-tb15">
                                       {{$terms->shipping_text}}
                                        </div>
                                    </div>
                               
                                
                                
                            </div>
                            <!-- ACCORDION END -->                                        
                            
                            <!-- TITLE  START -->
                              <div class="p-b30">
                                <h3 class="text-uppercase">{{$terms->policies_title}}</h3>
                                <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                            </div>
                            <!-- TITLE  END -->
                            
                            <!-- TOOGLE START -->
                            <div class="wt-accordion acc-bg-gray">
                                
                                <div class="panel wt-panel">
                                   
                                        <div class="acod-content p-tb15">{{$terms->policies_text}}</div>
                                   
                                </div>
                                
                               
                                                                 
                                    
                            </div>
                            <!-- TOOGLE END -->
                        
                        </div>

                        
                    </div>
                </div>
                
            </div>
            <!-- SECTION CONTENT END -->
        
        </div>
        <!-- CONTENT END -->
        @endsection