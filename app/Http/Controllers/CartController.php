<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Contact;
use App\About;
use App\Cart;
use Auth;
use App\Wishlist;
use App\Product;
class CartController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->exists('current')) {
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cart = Cart::where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $prcart = Cart::where('current',session('current'))->get();
            $totalPrice = $prcart->sum('totalprice');
            if(Auth::check()){

        $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
        }else{
            $wishlist = null;
        }
            $quantity = Cart::where('current',session('current'))->get();
            $featuredProduct = Product::inRandomOrder()->paginate(4);
            
           $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            $title = 'Bubblzz Cart';
            return view('website.shopping_cart',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about, 'cart'=> $cart,'total'=> $totalPrice,'quantity' => $quantity,'featured'=>$featuredProduct,'wishlist'=>$wishlist]);
        }else{
            $test =str_random(60);
            session()->put('current',$test);
            $cart = Cart::where('current',session('current'))->get();
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $prcart = Cart::where('current',session('current'))->get();
            $totalPrice = $prcart->sum('totalprice');
            $featuredProduct = Product::inRandomOrder()->limit(4);
            $quantity = Cart::where('current',session('current'))->get();
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            if(Auth::check()){

        $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
        }else{
            $wishlist = null;
        }
            $about = About::first();
            $title = 'Bubblzz Cart';
            return view('website.shopping_cart',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about, 'cart'=> $cart,'total'=> $totalPrice,'quantity' => $quantity,'featured'=>$featuredProduct]);
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

         return back();
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

        if($request->ajax())
        {

            if (session()->exists('current')) {
                $carts = Cart::where('current',session('current'))->where('product_id',request('product_id'))->first();
                
                if($carts !== null)
                {
                    //return response(['status' => true]);
                    $quantity = $carts->quantity + 1;
                    if( $carts->product()->first()->offer != 0)
                    {
                        $price = $carts->product()->first()->offer;
                    }else{
                        $price = $carts->product()->first()->price;
                    }
                    $total = $price * $quantity;
                    $cart = Cart::where('id',$carts->id)->update(['quantity'=>$quantity,'totalprice'=>$total]);
                    $mycart = Cart::where('current',session('current'))->where('product_id',request('product_id'))->first();

                    $cartpro = Product::where('id',$carts->product_id)->first();
                    $count = Cart::where('current',session('current'))->count();
                    
                    /*$carts = "<div class='nav-cart-item clearfix' id='". $mycart->id ."'>
                                    <div class='nav-cart-item-image'>
                                        <a href='".url('/product_detail/'.$mycart->product()->first()->id)."'><img src='".asset('storage/public/products/'.$mycart->product()->first()->default_image)."' alt='product'></a>
                                    </div>
                                     <div class='nav-cart-item-desc'>
                                        <a href='".url("/product_detail/".$mycart->id)."'>".$mycart->product()->first()->name."</a>
                                        <span class='nav-cart-item-price'><strong>".$mycart->quantity."</strong> x $ ".$price."</span>
                                        <form action='".route('cart.destroy',$mycart->id)."' method='post' id='delCart'>
                                            <input type='hidden' name='_method' value='DELETE'>
                                            <input type='hidden' name='_token' value='".csrf_token()."'>
                                            <button   class='nav-cart-item-quantity' id='cartDel' data-id='". $mycart->id ."' style='border:none;float: right;'>x</button>
                                        </form>
                                    </div>
                            </div>";*/
                    //$session_cart = Cart::select('product_id')->where('current',session('current'))->get();
                    $prcart = Cart::where('current',session('current'))->get();
                    $totalPrice = $prcart->sum('totalprice');
                    $quant = $mycart->quantity;
                    $same = 'same';
                    return response(['status' => true,'carts' => $carts,'count'=>$count,'total'=>$totalPrice,'same'=>$same,'quant' => $quant]);//    
                }else{

                    $rules = ['product_id' => 'required'];
                    $data=$this->validate(request(),$rules,[],[
                                    'product_id'=>'Product',
                             ]);
                    $data['product_id'] =request('product_id');
                    $product = Product::where('id',request('product_id'))->first();
                    if($product->offer != 0)
                    {
                        $price = $product->offer;
                    }else{
                        $price = $product->price;
                    }
                    
                    $data['totalprice']= $price * 1;
                    $data['current'] = session('current');

                    $cart = Cart::create($data);
                    

                    $cartpro = Product::where('id',$cart->product_id)->first();
                      $mycart = Cart::where('current',session('current'))->where('product_id',request('product_id'))->first();

                    $count = Cart::where('current',session('current'))->count();
                    $carts = "<div class='nav-cart-item clearfix' id='". $mycart->id ."'>
                                    <div class='nav-cart-item-image'>
                                        <a href='".url('/category/'.$mycart->product()->first()->category->category_slug.'/'.$mycart->product()->first()->product_slug)."'><img src='".asset('storage/public/products/'.$mycart->product()->first()->default_image)."' alt='product'></a>
                                    </div>
                                     <div class='nav-cart-item-desc'>
                                        <a href='".url('/category/'.$mycart->product()->first()->category->category_slug.'/'.$mycart->product()->first()->product_slug)."'>".$mycart->product()->first()->name."</a>
                                        <span class='nav-cart-item-price'><strong id='q".$mycart->product()->first()->id."'>".$mycart->quantity."</strong> x EGP ".$price."</span>
                                        <form action='".route('cart.destroy',$mycart->id)."' method='post' id='delCart'>
                                            <input type='hidden' name='_method' value='DELETE'>
                                            <input type='hidden' name='_token' value='".csrf_token()."'>
                                            <button   class='nav-cart-item-quantity' id='cartDel' data-id='". $mycart->id ."' style='border:none;float: right;color:#ff65ad'>x</button>
                                        </form>
                                    </div>
                            </div>";
                    //$session_cart = Cart::select('product_id')->where('current',session('current'))->get();
                    $prcart = Cart::where('current',session('current'))->get();
                    $totalPrice = $prcart->sum('totalprice');
                    return response(['status' => true,'carts' => $carts,'count'=>$count,'total'=>$totalPrice]);//
                }
            }else{
                $test =str_random(60);
                session()->put('current',$test);
                $rules = ['product_id' => 'required'];
                $data=$this->validate(request(),$rules,[],[
                                'product_id'=>' Product',
                         ]);
                 $product = Product::where('id',request('product_id'))->first();
                    if($product->offer != 0)
                    {
                        $price = $product->offer;
                    }else{
                        $price = $product->price;
                    }
                    
                $data['totalprice']= $price * 1;
                $data['current'] = session('current');
                $cart = Cart::create($data);
                    

                    $cartpro = Product::where('id',$cart->product_id)->first();
                  $mycart = Cart::where('current',session('current'))->where('product_id',request('product_id'))->first();

                    $count = Cart::where('current',session('current'))->count();
                    $carts = "<div class='nav-cart-item clearfix' id='". $mycart->id ."'>
                                    <div class='nav-cart-item-image'>
                                        <a href='".url('/category/'.$mycart->product()->first()->category->category_slug.'/'.$mycart->product()->first()->product_slug)."'><img src='".asset('storage/public/products/'.$mycart->product()->first()->default_image)."' alt='product'></a>
                                    </div>
                                     <div class='nav-cart-item-desc'>
                                        <a href='".url('/category/'.$mycart->product()->first()->category->category_slug.'/'.$mycart->product()->first()->product_slug)."'>".$mycart->product()->first()->name."</a>
                                        <span class='nav-cart-item-price'><strong id='q".$mycart->product()->first()->id."'>".$mycart->quantity."</strong> x EGP ".$price."</span>
                                        <form action='".route('cart.destroy',$mycart->id)."' method='post' id='delCart'>
                                            <input type='hidden' name='_method' value='DELETE'>
                                            <input type='hidden' name='_token' value='".csrf_token()."'>
                                            <button   class='nav-cart-item-quantity' id='cartDel' data-id='". $mycart->id ."' style='border:none;float: right;color:#ff65ad'>x</button>
                                        </form>
                                    </div>
                            </div>";
                            $test =$cart->quantity;
                    //$session_cart = Cart::select('product_id')->where('current',session('current'))->get();
                    $prcart = Cart::where('current',session('current'))->get();
                    $totalPrice = $prcart->sum('totalprice');
                    return response(['status' => true,'carts' => $carts,'count'=>$count,'total'=>$totalPrice,'test'=>$test]);
            }
        }else{
            if(session()->exists('current'))
            {
                $carts = Cart::where('current',session('current'))->where('product_id',request('product_id'))->first();
                if($carts !== null)
                {
                    $quantity = $carts->quantity + $request->demo_vertical2;
                    if( $carts->product()->first()->offer != 0)
                    {
                        $price = $carts->product()->first()->offer;
                    }else{
                        $price = $carts->product()->first()->price;
                    }
                    $total = $price * $quantity;
                    $cart = Cart::where('id',$carts->id)->update(['quantity'=>$quantity,'totalprice'=>$total]);
                    $mycart = Cart::where('current',session('current'))->where('product_id',request('product_id'))->first();

                    $cartpro = Product::where('id',$carts->product_id)->first();
                    $count = Cart::where('current',session('current'))->count();
                    
                    $prcart = Cart::where('current',session('current'))->get();
                    $totalPrice = $prcart->sum('totalprice');
                    $quant = $mycart->quantity;
                   
                    return  back()->withErrors(['message'=>"{$cartpro->name} has been added to your cart."]);   
                }else{
                    $rules = ['product_id' => 'required|integer','demo_vertical2' =>'required|numeric'];
                    $data=$this->validate(request(),$rules,[],[
                                    'product_id'        =>  'Product',
                                    'demo_vertical2'    =>  'Quantity'
                             ]);
                    $data['quantity']   =   $request->demo_vertical2;
                    $product = Product::where('id',request('product_id'))->first();
                    if($product->sold !== 0)
                    {
                         return  back()->withErrors(['message'=>"{$product->name}  is temporarily out of stock."]); 
                    }
                    if($product->offer != 0)
                    {
                        $price = $product->offer;
                    }else{
                        $price = $product->price;
                    }
                    
                    $data['totalprice']= $price * $request->demo_vertical2;
                    $data['current'] = session('current');

                    $cart = Cart::create($data);
                    

                    $cartpro = Product::where('id',$cart->product_id)->first();
                     return  back()->withErrors(['message'=>"{$cartpro->name} has been added to your cart."]); 
                     
                }
            }else{
                $test =str_random(60);
                session()->put('current',$test);
                 $rules = ['product_id' => 'required|integer','demo_vertical2' =>'required|numeric'];
                    $data=$this->validate(request(),$rules,[],[
                                    'product_id'        =>  'Product',
                                    'demo_vertical2'    =>  'Quantity'
                             ]);
                    $data['quantity']   =   $request->demo_vertical2;
                    $product = Product::where('id',request('product_id'))->first();
                    if($product->offer != 0)
                    {
                        $price = $product->offer;
                    }else{
                        $price = $product->price;
                    }
                    
                    $data['totalprice']= $price * $request->demo_vertical2;
                    $data['current'] = session('current');

                    $cart = Cart::create($data);
                    

                    $cartpro = Product::where('id',$cart->product_id)->first();
                     return  back()->withErrors(['message'=>"{$cartpro->name} has been added to your cart."]); 
                     
            }
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
        if($request->ajax())
        {
            if (session()->exists('current')) {
                $quantity=request('value');
                $carts = Cart::where('id',request('product_id'))->first();
                
                if( $carts->product->first()->offer != 0)
                    {
                        $price = $carts->product()->first()->offer;
                    }else{
                        $price = $carts->product()->first()->price;
                    }
                    $total = $price * $quantity;
                $cart = Cart::where('id',request('product_id'))->update(['quantity'=>$quantity,'totalprice'=>$total]);
                $prcart = Cart::where('current',session('current'))->get();
                $totalPrice = $prcart->sum('totalprice');
                return response(['status' => true,'total'=>$total,'subtotal'=>$totalPrice]);
            }else{
                $test =str_random(60);
                session()->put('current',$test);
                $quantity=request('value');
                $carts = Cart::where('id',request('product_id'))->first();
                if( $carts->product()->first()->offer != 0)
                    {
                        $price = $carts->product()->first()->offer;
                    }else{
                        $price = $carts->product()->first()->price;
                    }
                    $total = $price * $quantity;
                $cart = Cart::where('id',request('product_id'))->update(['quantity'=>$quantity,'totalprice'=>$total]);
                $prcart = Cart::where('current',session('current'))->get();
                $totalPrice = $prcart->sum('totalprice');
                return response(['status' => true,'total'=>$total,'subtotal'=>$totalPrice]);

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //

        if($request->ajax())
        {
            if (session()->exists('current')) {
                $cart= Cart::findOrFail(request('product_id'));
                $cart->delete();
                $count = Cart::where('current',session('current'))->count();
                $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
                $prcart = Cart::where('current',session('current'))->get();
                $totalPrice = $prcart->sum('totalprice');
                return response(['status' => true,'count'=>$count,'total'=>$totalPrice]);
            }
        }
    }
}
