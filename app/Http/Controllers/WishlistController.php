<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Contact;
use App\About;
use App\Product;
use App\Wishlist;
use App\Cart;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
           public function __construct()
    {
        $this->middleware('auth', ['only' => ['index']]);
       //$this->middleware('auth', ['except' => ['index']]);
    }
    public function index()
    {
  
        //
        if(Auth()->check())
        {
            $wishlist = Wishlist::where('customer_id',auth()->user()->id)->get();
           $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
             $cart = Cart::where('current',session('current'))->get();
             $totalPrice = $cart->sum('totalprice');
            $featuredProduct = Product::inRandomOrder()->paginate(4);
            $title = 'Bubblzz Wishlist';
            return view('website.wishlist',[
                                            'title' => $title,
                                            'category' => $category,
                                            'contact' => $contact,
                                            'about' => $about,
                                            'featured'=>$featuredProduct,
                                            'cart'=> $cart,
                                            'total'=> $totalPrice,
                                            'wishlist'=>$wishlist
                                            ]);
        }else{
            return redirect()->route('login');
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
     //if($request->ajax())
       // {
            if(Auth()->check()){
                $wishlist = Wishlist::where('customer_id',auth()->user()->id)->where('product_id',request('product_id'))->first();
                if($wishlist !== null){
                  
                   // return response(['status' => true,'same'=>$same,'exist' => $exist]);
                    //"{$wishlist->product()->first()->name} is already exist"
                    // session()->flash('error',"{$wishlist->product()->first()->name} is already exist");
                  
                    return back()->withErrors(['message'=>"{$wishlist->product()->first()->name} is already exist in your wishlist"]);
                }else{
                     $rules = ['product_id' => 'required'];
                    $data=$this->validate(request(),$rules,[],[
                                    'product_id'=>'Product',
                             ]);
                    $data['product_id'] =request('product_id');
                    $data['customer_id']=auth()->user()->id;
                     $wishlist = Wishlist::create($data);
                     return  back()->withErrors(['message'=>"{$wishlist->product()->first()->name} has been added to your wishlist."]);
                }
            }else{
                return back()->withErrors(['message'=>"You must be logged in to add products to your wish list  <a href='".route('login')."''>Click here to login.</a>"]);
            }
       //}
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
        return back();
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
        return back();
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
    public function destroy(Request $request,$id)
    {
        //
         if($request->ajax())
        {
            if (Auth()->check()) {
                $wishlist= Wishlist::findOrFail(request('product_id'));
                $wishlist->delete();
               
                return response(['status' => true]);
            }
        }
    }
}
