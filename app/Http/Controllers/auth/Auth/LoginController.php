<?php

namespace App\Http\Controllers\Auth;

use App\About;
use App\Cart;
use App\Category;
use App\Contact;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'userLogout');
        if(url()->previous() !== url('/account'))
        {
           $this->redirectTo = url()->previous();
        }
    }

    public function userLogout () {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
    public function showLoginForm()
    {
         
        
        if (session()->exists('current')) {
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $totalPrice = $cartpro->sum('price');
            $cart = Cart::where('current',session('current'))->get();
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            $title = 'Bubblzz Login';
            return view('website.account',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice]);
        }else{
            $test =str_random(60);
            session()->put('current',$test);
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $totalPrice = $cartpro->sum('price');
            $cart = Cart::where('current',session('current'))->get();
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            $title = 'Bubblzz Login';
            return view('website.account',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice]);
        }
    }
    

}
