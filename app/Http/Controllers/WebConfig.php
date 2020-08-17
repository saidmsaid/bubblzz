<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Contact;
use App\About;
use App\Imageslider;
use App\Product;
use App\OrderProduct;
use App\image;
use App\Cart;
use App\Wishlist;
use App\Newsletter;
use App\Message;
use App\Review;
use App\Branch;
use App\Banner;
use App\City;
use App\ShippingAndPolicy;
use App\Coupons;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class WebConfig extends Controller
{
    //

    public function index(){
        
        if (session()->exists('current')) {
        $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
        $cart = Cart::where('current',session('current'))->get();
       
        if(Auth::check()){

        $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
        }else{
            $wishlist = null;
        }
        
        $totalPrice = $cart->sum('totalprice');

        $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
        $contact = Contact::first();
        $about = About::first();
        $slider = Imageslider::all();
        //$product = Product::orderBy('id','desc')->paginate(4);
        $product = Product::where('recent','<>',0)->orderBy('id','desc')->paginate();
        $order  = OrderProduct::select('product_id')->groupBy('product_id')->orderByRaw('COUNT(*) DESC')->limit(10)->get();
        $topSeller = Product::whereIn('id',$order)->get();
        $rightBanner = Banner::where('banner_position','right')->first();
        $leftBanner = Banner::where('banner_position','left')->first();
        $topBanner = Banner::where('banner_position','top')->first();
        $bottomBanner = Banner::where('banner_position','bottom')->first();

    
        $title = 'Bubblzz Home';
        return view('website.index',
                                        [ 'title'       => $title,
                                          'category'    => $category,
                                          'contact'     => $contact,
                                          'about'       => $about,
                                          'slider'      => $slider,
                                          'product'     => $product,
                                          'topSeller'   => $topSeller,
                                          'cart'        => $cart,
                                          'total'       => $totalPrice,
                                          'wishlist'    => $wishlist,
                                          'rightBanner' => $rightBanner,
                                          'leftBanner'  => $leftBanner,
                                          'topBanner'   => $topBanner,
                                          'bottomBanner'=> $bottomBanner,
                                       ]
              );
        }else{
            $test =str_random(60);
            session()->put('current',$test);
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice'); 
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            $slider = Imageslider::all();
            //$product = Product::orderBy('id','desc')->paginate(4);
            $product = Product::where('recent','<>',0)->orderBy('id','desc')->paginate(4);
            $order  = OrderProduct::select('product_id')->groupBy('product_id')->orderByRaw('COUNT(*) DESC')->limit(4)->get();
            if(Auth::check()){

            $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
        
            $topSeller = Product::whereIn('id',$order)->get();

 
            $title = 'Bubblzz Home';
            $rightBanner = Banner::where('banner_position','right')->first();
        $leftBanner = Banner::where('banner_position','left')->first();
        $topBanner = Banner::where('banner_position','top')->first();
        $bottomBanner = Banner::where('banner_position','bottom')->first();
            return view('website.index',
                                        [ 'title'       => $title,
                                          'category'    => $category,
                                          'contact'     => $contact,
                                          'about'       => $about,
                                          'slider'      => $slider,
                                          'product'     => $product,
                                          'topSeller'   => $topSeller,
                                          'cart'        => $cart,
                                          'total'       => $totalPrice,
                                           'wishlist'    =>  $wishlist,
                                          'rightBanner' => $rightBanner,
                                          'leftBanner'  => $leftBanner,
                                          'topBanner'   => $topBanner,
                                          'bottomBanner'=> $bottomBanner,
                                       ]
              );
        }
    }
    public function about()
    {
        if (session()->exists('current')) {
        $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
        $cart = Cart::where('current',session('current'))->get();
        $totalPrice = $cart->sum('totalprice');
        if(Auth::check()){
            $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
        }else{
            $wishlist = null;
        }
    	$category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
    	$contact = Contact::first();
    	$about = About::first();
    	$title = 'About Us';
    	return view('website.about',['title' => $title,
                                    'category' => $category
                                    ,'contact' => $contact,
                                    'about' => $about,
                                    'cart' => $cart,
                                    'total' => $totalPrice,
                                   'wishlist'    =>  $wishlist

                                    ]);
        }else{
            $test =str_random(60);
            session()->put('current',$test);
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice'); 
             if(Auth::check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            $title = 'About Us';
            return view('website.about',['title' => $title,
                                    'category' => $category
                                    ,'contact' => $contact,
                                    'about' => $about,
                                    'cart' => $cart,
                                    'total' => $totalPrice,
                                    'wishlist'    =>  $wishlist
                                      ]);
        }
    }
    public function contact()
    {
        if (session()->exists('current')) {
        $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
        $cartpro = Product::whereIn('id',$session_cart)->get();
        $cart = Cart::where('current',session('current'))->get();
        $totalPrice = $cart->sum('totalprice');
         if(Auth::check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
    	$category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
    	$contact = Contact::first();
        $branch = Branch::all();
    	$about = About::first();
    	$title = 'Contact Us';
    	return view('website.contact',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=>$cart,'total'=>$totalPrice,'wishlist'    =>  $wishlist,'branchs'=>$branch]);

        }else{
            $test =str_random(60);
            session()->put('current',$test);
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice');
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            if(Auth::check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
            $title = 'Contact Us';
            return view('website.contact',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=>$cart,'total'=>$totalPrice,'wishlist'=>$wishlist]);
        }
    }
    public function terms()
    {
        if (session()->exists('current')) {
        $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
        $cartpro = Product::whereIn('id',$session_cart)->get();
        $cart = Cart::where('current',session('current'))->get();
        $totalPrice = $cart->sum('totalprice');
         if(Auth::check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
        $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
        $terms = ShippingAndPolicy::first();
        $branch = Branch::all();
        $contact = Contact::first();
        $about = About::first();
        $title = 'Shipping & Policies';
        return view('website.terms',['title' => $title,'category' => $category,'terms' => $terms,'contact' => $contact,'about' => $about,'cart'=>$cart,'total'=>$totalPrice,'wishlist'    =>  $wishlist,'branchs'=>$branch]);

        }else{
            $test =str_random(60);
            session()->put('current',$test);
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice');
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
             $terms = ShippingAndPolicy::first();
             $contact = Contact::first();
            $about = About::first();
            if(Auth::check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
            $title = 'Shipping & Policies';
            return view('website.terms',['title' => $title,'category' => $category,'terms' => $terms,'contact' => $contact,'about' => $about,'cart'=>$cart,'total'=>$totalPrice,'wishlist'=>$wishlist]);
        }
    }
    public function category($category_slug)
    {
        if (session()->exists('current')) {
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice');
        	$category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
        	$contact = Contact::first();
        	$about = About::first();
        	// $currentCategory = Category::findOrFail($id);
            $currentCategory = Category::where('category_slug','like',$category_slug)->firstOrFail();
        	$categoryProduct = Product::where('category_id',$currentCategory->id)->paginate(12);
        	$featuredProduct = $categoryProduct->where('featured','<>',0);
            if(Auth::check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
        	$title = 'Bubblzz Category';
        	return view('website.category',
        									[	'title' 	=> $title,
        										'category' 	=> $category,
        										'contact' 	=> $contact,
        										'about' 	=> $about,
        										'current'	=> $currentCategory,
        										'products'	=> $categoryProduct,
        										'featured'	=> $featuredProduct,
                                                'cart'      => $cart,
                                                'total'     => $totalPrice,
                                                'wishlist'    =>  $wishlist
    										]
    					)->render();
       
        }else{
            $test =str_random(60);
            session()->put('current',$test);
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice');
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            // $currentCategory = Category::findOrFail($id);
            // $categoryProduct = Product::where('category_id',$id)->paginate(12);
            $currentCategory = Category::where('category_slug','like',$category_slug)->firstOrFail();
            $categoryProduct = Product::where('category_id',$currentCategory->id)->paginate(12);
            $featuredProduct = $categoryProduct->where('featured','<>',0);
             if(Auth::check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
            $title = 'Bubblzz Category';
            return view('website.category',
                                            [   'title'     => $title,
                                                'category'  => $category,
                                                'contact'   => $contact,
                                                'about'     => $about,
                                                'current'   => $currentCategory,
                                                'products'  => $categoryProduct,
                                                'featured'  => $featuredProduct,
                                                'cart'      => $cart,
                                                'total'     => $totalPrice,
                                                 'wishlist'    =>  $wishlist
                                            ]
                        )->render();
        }
    }
    public function product($category_slug,$product_slug)
    {
        if (session()->exists('current')) {
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice');
        	$category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
        	$contact = Contact::first();
        	$about = About::first();
        	$title = 'Bubblzz Product';
        	$currentCategory = Category::where('category_slug','like',$category_slug)->firstOrFail();
        	$currentProduct = Product::where('product_slug','like',$product_slug)->firstOrFail();
        	
        	$specialProduct = Product::where('category_id','<>',$currentProduct->category_id)->where('special','<>',0)->limit(4)->get();
        
            $images = image::where('product_id',$currentProduct->id)->get();
           $creview  = Review::select('rate')->where('commentable_id',$currentProduct->id)->groupBy('rate')->orderByRaw('COUNT(*) DESC')->limit(1)->first();
           /* $sumCreview  = Review::where('commentable_id',$id)->sum('rate');
        	
        	$reviewCount = Review::where('commentable_id',$id)->count();
        	if($sumCreview !== 0 && $reviewCount !==0)
        	{
        	    $creview = round($sumCreview / $reviewCount );
        	   
        	}else{
        	    $creview = 0;
        	}*/
        	
            if(Auth::check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
            $review = Review::where('commentable_id',$currentProduct->id)->get();
        	return view('website.product_detail',
        										[
        											'title' 			=> $title,
        											'category' 			=> $category,
        											'contact' 			=> $contact,
        											'about' 			=> $about,
        											'current' 			=> $currentProduct,
        											'currentCategory' 	=> $currentCategory,
        											'special'			=> $specialProduct,
                                                    'image'             => $images,
                                                    'cart'              => $cart,
                                                    'total'             => $totalPrice,
                                                    'review'            => $review,
                                                    'creview'           => $creview ,
                                                     'wishlist'         =>  $wishlist
        											]);
        }else{
            $test =str_random(60);
            session()->put('current',$test);
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice');
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            $title = 'Bubblzz Product';
            $currentCategory = Category::where('category_slug','like',$category_slug)->firstOrFail();
            $currentProduct = Product::where('product_slug','like',$product_slug)->firstOrFail();
            $specialProduct = Product::where('category_id','<>',$currentProduct->category_id)->where('special','<>',0)->limit(4)->get();
            $images = image::where('product_id',$currentProduct->id)->get();
            if(Auth::check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
            }else{
                $wishlist = null;
            }
            $creview  = Review::select('rate')->where('commentable_id',$currentProduct->id)->groupBy('rate')->orderByRaw('COUNT(*) DESC')->limit(1)->first();
$review = Review::where('commentable_id',$currentProduct->id)->get();
            return view('website.product_detail',
                                                [
                                                    'title'             => $title,
                                                    'category'          => $category,
                                                    'contact'           => $contact,
                                                    'about'             => $about,
                                                    'current'           => $currentProduct,
                                                    'currentCategory'   => $currentCategory,
                                                    'special'           => $specialProduct,
                                                    'image'             => $images,
                                                    'cart'              => $cart,
                                                    'total'             => $totalPrice,
                                                    'review'            => $review,
                                                    'creview'           => $creview ,
                                                    'wishlist'           =>  $wishlist
                                                    ]);
        }
    }
    /*public function cart()
    {
    	$category = Category::orderBy('id','asc')->paginate(9);
    	$contact = Contact::first();
    	$about = About::first();
    	$title = 'Bubblzz Cart';
    	return view('website.shopping_cart',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about]);
    }*/
    /*public function checkout()
    {
        if (session()->exists('current')) {
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice');
        	$category = Category::orderBy('id','asc')->paginate(9);
        	$contact = Contact::first();
        	$about = About::first();
        	$title = 'Bubblzz Checkout';
        	return view('website.checkout',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice]);
        }else{
            $test =str_random(60);
            session()->put('current',$test);
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice');
            $category = Category::orderBy('id','asc')->paginate(9);
            $contact = Contact::first();
            $about = About::first();
            $title = 'Bubblzz Checkout';
            return view('website.checkout',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice]);
        }
    }*/
    public function account()
    {
        if(!Auth()->check()){
            if (session()->exists('current')) {
                $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
                $cartpro = Product::whereIn('id',$session_cart)->get();
                $cart = Cart::where('current',session('current'))->get();
                $totalPrice = $cart->sum('totalprice');
                $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
                $contact = Contact::first();
                $about = About::first();
                if(Auth::check()){
                    $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
                }else{
                    $wishlist = null;
                }
                $title = 'Bubblzz Account';
                return view('website.account',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice,'wishlist' => $wishlist]);
            }else{
                $test =str_random(60);
                session()->put('current',$test);
                $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
                $cartpro = Product::whereIn('id',$session_cart)->get();
                $cart = Cart::where('current',session('current'))->get();
                $totalPrice = $cart->sum('totalprice');  
                $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
                $contact = Contact::first();
                $about = About::first();
                $title = 'Bubblzz Account';
                if(Auth::check()){
                    $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
                }else{
                    $wishlist = null;
                }
                return view('website.account',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice,'wishlist'=>$wishlist]);
            }
        }else{
            return back();
        }
    }
    public function newsletter(Request $request)
    {
        $rules = ['email' => 'required|string|email|max:255|unique:newsletters'];
        $data=$this->validate(request(),$rules,[],[
                                    'email'=>'Email',
                             ]);
        $newsletter = Newsletter::create($data);
        $success = 'Welcome To Our Newsletter';
        return response(['status'=>true,'success'=>$success]);
    }
    public function review(Request $request)
    {
        //dd(request('body'));
       // if(Auth::check())
       // {
           //  if($request->ajax())
            //{
                $rules = [  
                            'name'               => 'required|string',
                            'body'               => 'required|string',
                            'rate'               => 'required|integer',
                            'commentable_id'     => 'required',
                            
                        ];
                $data=$this->validate(request(),$rules,[],[
                                        'body'=>'Review',
                                        'rate'=>'Rate',
                                        'name'=> 'name'
                                 ]);
                $data['commentable_type'] = 'App\Product';
                $review = review::create($data);
                $success="Your review Will added successfully";
                return back()->with(['success'=>$success]);
            //}
        //}
    }
     function sendContactRequest (Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();
       

        
        return back()->withErrors(['success' => 'The message has been sent']);
    }
   /* public function contactmail(Request $request)
    {


        $rules = [
                    'name' =>  'required',
                    'email' =>  'required',
                    'phone' =>  'required',
                    'message' =>  'required',
        ];
        $validate = $this->validate(request(),$rules,[],[
                                                    'name'      =>  'Name',
                                                    'email'     =>  'Email',
                                                    'phone'     =>  'Mobile Number',
                                                    'message'   => 'Message'
                                                    ]);
        $data =[
                    'name'=>$request->name,
                    'message'=>$request->message,
                    
        ];

        Mail::to('info@bubblzzeg.com')->send(new ContactMail($data));
        return back();

    }*/
     public function getCity(Request $request)
    {
        if($request->ajax())
        {
            
            $state_id = $request->state_id;
            $value = $request->value;
            $cities = City::where('state_id',$value)->get();
            $output= "<option value=''>Choose Your City</option>";
            foreach ($cities as $city) {
              $output .= "<option value='$city->city_id' data-shipping='$city->city_shippingPrice'>$city->city_name</option>";
            }
            echo $output;
        }

       
    }
    public function promoActive(Request $request)
    {
        if($request->ajax())
        {
            if(isset($request->value))
            {
                $coupon = Coupons::where('code','like',$request->value)->where('status','approved')->first();
                if (isset($coupon)) {
                    $success = 'Coupon activated successfully';
                     
                    return response()->json(['status' => true,'coupon' => $coupon,'success'=>$success]);
                }else{
                    $success = 'Coupon not available';
                    return response()->json(['status' => false,'coupon' => [],'success'=>$success]);
                }
            }else{
                 $success = 'Please Enter Promo Code';
                return response()->json(['status' => false,'coupon' => [],'success'=>$success]);
            }
        }else{
            return abort('404');
        }

       
    }
    
}
