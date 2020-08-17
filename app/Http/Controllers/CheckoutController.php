<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Contact;
use App\About;
use App\Product;
use App\Cart;
use App\Customer;
use App\Order;
use App\OrderProduct;
use App\Wishlist;
use App\State;
use App\City;
use App\Coupons;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Mails;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (session()->exists('current')) {
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $cart = Cart::where('current',session('current'))->get();
            $totalPrice = $cart->sum('totalprice');
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            $states = State::all();
            $city =    City::all();
            $title = 'Bubblzz Checkout';
            if(Auth::check()){

        $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
        }else{
            $wishlist = null;
        }
            return view('website.checkout',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice,'wishlist'=>$wishlist,'states'=>$states,'cities'=>$city]);
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
            $states = State::all();
            $city =    City::all();
            if(Auth::check()){

        $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
        }else{
            $wishlist = null;
        }
            $title = 'Bubblzz Checkout';
            return view('website.checkout',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice,'wishlist'=>$wishlist,'states'=>$states,'cities'=>$city]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        if(Auth::check())
        {
            
            if($request->has('anotheraddress'))
            {
                $rules = [
                    'shipaddress'   => 'required|string|max:255',
                    'state_id'      => 'required|integer|exists:states,state_id',
                    'city_id'       => 'required|integer|exists:cities,city_id',  
                    ];
                $other=$this->validate(request(),$rules,[],[
                               'shipaddress'    =>  'Other Address',
                               'state_id'       =>  'State',
                               'city_id'        =>  'City',
                             ]);


            }
            
                
                $data=[
                    'customer_id'       =>  auth()->user()->id,
                    'name'              =>  auth()->user()->name,
                    'email'             =>  auth()->user()->email,
                    'mobile'            =>  auth()->user()->mobile,
                    'address'           =>  auth()->user()->address1,
                    'state_id'          =>  auth()->user()->state_id,
                    'state_name'        =>  auth()->user()->state->state_name,
                    'city_name'         =>  auth()->user()->city->city_name,
                    'city_id'           =>  auth()->user()->city->city_id,
                    'session_id'        =>  session('current'),
                    'city_shippingPrice'=>  auth()->user()->city->city_shippingPrice,
                    'status'            =>  1,
                ];
                $products = Cart::where('current',session('current'))->get();
                if($request->has('anotheraddress'))
                { 
                    
                    $city = City::findOrFail($other['city_id']);
                    $data['address']    =   $other['shipaddress'];
                    $data['city_id']    =   $city->city_id;
                    $data['city_name']  =   $city->city_name;
                    $data['city_shippingPrice'] = $city->city_shippingPrice;
                    $data['state_id']   =   $city->state->state_id;
                    $data['state_name'] =   $city->state->state_name;
                }
                $data['subtotal'] = $products->sum('totalprice');
                $data['totalPrice'] = $products->sum('totalprice')+$data['city_shippingPrice'];
                if($request->has('code'))
                {
                    $coupon = Coupons::where('code','like',$request->code)->where('status','approved')->first();
                    if(isset($coupon))
                    {
                        $data['coupon'] = $coupon->code;
                        $data['coupon_value']   =    $coupon->code_value;
                        $data['totalPrice'] = $data['totalPrice'] - ($data['totalPrice'] * (int) $coupon->code_value /100);

                    }
                }
                $order = Order::create($data);
                foreach ($products as $product) {
                    $orderPro =['order_id'=>$order->id,
                                'quantity'=>$product->quantity,
                                'product_id'=>$product->product_id];

                    $last = OrderProduct::create($orderPro);
                }
                $delId = Cart::select('id')->where('current',session('current'))->get();
                $sessionDestroy = Cart::whereIn('id',$delId)->delete();
                $mailData = [
                            'email'=>auth()->user()->email,
                            'name'  =>auth()->user()->name
                        ];
                $ordermail = Mails::where('type','order')->first();
                if(isset($ordermail))
                {
                     $mailData['subject'] = $ordermail->subject;
                     $mailData['body'] = $ordermail->body;
                   
                    $mail = Mail::to(auth()->user()->email);
                    if ($ordermail->bcc !== null) 
                    {
                        dd($ordermail->bcc);
                        $mail->bcc($ordermail->bcc);
                    }else{
                        dd("test");
                    }
                    $mail->send(new OrderMail($mailData));
                }
                return back()->withErrors(['message'=>"Your order has been made successfully.<a href='".url('/')."''> Continue shopping</a>"]);
                
            
            

        }else{

            $rule = [
                'name'              =>  'required|string|max:100',
                'order_email'       =>  'required|string|email|max:255',
                'mobile'            =>  'required|numeric|digits:11',
                'state'             => 'required|integer|exists:states,state_id',
                'city'              => 'required|integer|exists:cities,city_id',
                'address'              =>  'required|string|max:255',
            ];
            $name = [
            'name'              =>  'Full Name',
            'order_email'       =>  'E-mail',
            'mobile'            =>  'Phone Number',
            'state'             =>  'State',
            'city'              =>  'City',
            'account_password'  =>  'Password',
            'address'           =>  'Address'
            ];
            if($request->has('account'))
            {
                $rule['order_email']        =  'required|string|email|unique:customers,email|max:255';
                $rule['account_password']   =  'required|string|min:6|confirmed';
            }else{
                $rule['order_email']  =  'required|string|email|max:255';
            }
            $data = $this->validate(request(),$rule,[],$name);
            if($request->has('account'))
            {
                $user   =   Customer::create([
                                            'name'      =>  $data['name'],
                                            'email'     =>  $data['order_email'],
                                            'mobile'    =>  $data['mobile'],
                                            'address1'  =>  $data['address'],
                                            'state_id'  =>  $data['state'],
                                            'city_id'   =>  $data['city'],
                                            'password'  =>  bcrypt($data['account_password'])
                                        ]);
            }
            $city = City::findOrFail($data['city']);
            $data['city_id']    =$city->city_id; 
            $data['city_shippingPrice'] = $city->city_shippingPrice;
            $data['city_name']    =$city->city_name; 
            $data['state_name']    =$city->state->state_name; 
            $data['state_id']    =$city->state->state_id; 
            $products = Cart::where('current',session('current'))->get();
            $data['session_id']= session('current');
            $data['subtotal'] = $products->sum('totalprice');
            $data['totalPrice'] = $products->sum('totalprice')+$city->city_shippingPrice;
            $data['status'] = 1;
            $data['email'] = $data['order_email'];
            if($request->has('code'))
                {
                    $coupon = Coupons::where('code','like',$request->code)->where('status','approved')->first();
                    if(isset($coupon))
                    {
                        $data['coupon'] = $coupon->code;
                        $data['coupon_value']   =    $coupon->code_value;
                        $data['totalPrice'] = $data['totalPrice'] - ($data['totalPrice'] * (int) $coupon->code_value /100);

                    }
                }
            $order = Order::create($data);
            foreach ($products as $product) {
                $orderPro =['order_id'=>$order->id,
                            'quantity'=>$product->quantity,
                            'product_id'=>$product->product_id];

                $last = OrderProduct::create($orderPro);
            }
            $delId = Cart::select('id')->where('current',session('current'))->get();
            $sessionDestroy = Cart::whereIn('id',$delId)->delete();
            $mailData = [
                            'email'=>$data['order_email'],
                            'name'  =>$data['name']
                        ];
            $mail = Mails::where('type','order')->first();
                if(isset($mail))
                {
                     $mailData['subject'] = $mail->subject;
                     $mailData['body'] = $mail->body;
                   
                    $mail = Mail::to($data['email']);
                    if (isset($mail->bcc)) 
                    {
                                $mail->bcc($mail->bcc);
                    }
                    $mail->send(new OrderMail($mailData));
                }
            return back()->withErrors(['message'=>"Your order has been made successfully.<a href='".url('/')."''> Continue shopping</a>"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return back();
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        //
    }
  /*  public function LogixERP(Request $request)
    {
        //API Url
        $url = 'http://webservice.logixerp.com/webservice/v1/CreateDocket';
 
        //Initiate cURL.
        $ch = curl_init($url);
 
        //The JSON data.
        $requestDataArray =  array( 
                "SecureKey" =>  "XXXXXXXXXXXXX",
                "FromOU" =>  "",
                "DocketNumber" =>  "",
                "DeliveryDate" =>  "",
                "CustomerCode" =>  "",
                "ConsigneeCode" =>  "",
                "ConsigneeAddress" =>  "",
                "ConsigneeCountry" =>  "",
                "ConsigneeState" =>  "",
                "ConsigneeCity" =>  "",
                "ConsigneePincode" =>  "",
                "ConsigneeName" =>  "",
                "ConsigneePhone" =>  "",
                "ConsigneeWhat3Words" => "",
                "StartLocation" =>  "",
                "EndLocation" =>  "",
                "ClientCode" =>  "",
                "NumberOfPackages" =>  "",
                "ActualWeight" =>  "",
                "ChargedWeight" =>  "",
                "CargoValue" =>  "",
                "ReferenceNumber" =>  "",
                "InvoiceNumber" =>  "",
                "PaymentMode" =>  "", 
                "ServiceCode" =>  "",
                "WeightUnitType" =>  "",
                "ConsingmentType" =>  "",
                "Description" =>  "",
                "COD" =>  "",
                "CODPaymentMode" =>  "",
                "PackageDetails" =>  "",
            ) 
        );
 
        //Format the array to HTTP Payload.
        $postFormattedData = http_build_query($requestDataArray);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFormattedData);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER,array (
           "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
        ));

        //Execute the request
        $result = curl_exec($ch);

        print $result;
    }*/
}

/*##################################
########### Comments Code ##########
###################################*/
/*if($request->ajax())
            {
                if(request('sameaddress'))
                {
                    $products = Cart::where('current',session('current'))->get();
                    $customer = Customer::where('id',auth()->user()->id)->update(['shipaddress'=>auth()->user()->address1]);
                    $orders['customer_id'] = auth()->user()->id;
                    $orders['status'] = 1;
                    $orders['session_id']= session('current');
                    $orders['totalPrice'] = $products->sum('totalprice');
                    $order = Order::create($orders);
                    $count = $products->count();
                    foreach ($products as $product) {
                        $orderPro =['order_id'=>$order->id,
                                    'quantity'=>$product->quantity,
                                    'product_id'=>$product->product_id];

                        $last = OrderProduct::create($orderPro);
                    }
                    $delId = Cart::select('id')->where('current',session('current'))->get();
                    $sessionDestroy = Cart::whereIn('id',$delId)->delete();
                    $total = 0;
                    $count = 0;
                    return response([
                                        'status' => true,
                                        'id'     => $delId,
                                        'total'  => $total,
                                        'count'  => $count

                                        ]);
                }else{
                    $rules = ['shipaddress' => 'required'];
                    $data=$this->validate(request(),$rules,[],[
                                    'shipaddress'=>'Other Address',
                             ]);
                    $products = Cart::where('current',session('current'))->get();
                    $customer = Customer::where('id',auth()->user()->id)->update(['shipaddress'=>$data['shipaddress']]);
                    $orders['customer_id'] = auth()->user()->id;
                    $orders['status'] = 1;
                    $orders['session_id']= session('current');
                    $orders['totalPrice'] = $products->sum('totalprice');
                    $order = Order::create($orders);
                    
                    $count = $products->count();
                    foreach ($products as $product) {
                        $orderPro =['order_id'=>$order->id,
                                    'quantity'=>$product->quantity,
                                    'product_id'=>$product->product_id];

                        $last = OrderProduct::create($orderPro);
                    }
                    $delId = Cart::select('id')->where('current',session('current'))->get();
                    $sessionDestroy = Cart::whereIn('id',$delId)->delete();
                    $total = 0;
                    $count = 0;
                    return response([
                                        'status' => true,
                                        'id'     => $delId,
                                        'total'  => $total,
                                        'count'  => $count

                                        ]);

                }
            }*/