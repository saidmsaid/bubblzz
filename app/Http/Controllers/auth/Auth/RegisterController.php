<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Contact;
use App\About;
use App\Cart;
use App\Product;
use App\Customer;
use App\State;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function showRegistrationForm()
    {
        if (session()->exists('current')) {
            $session_cart = Cart::select('product_id')->where('current',session('current'))->get();
            $cartpro = Product::whereIn('id',$session_cart)->get();
            $totalPrice = $cartpro->sum('price');
            $cart = Cart::where('current',session('current'))->get();
            $category = Category::whereNull('parent_id')->orderBy('id','asc')->limit(9)->get();
            $contact = Contact::first();
            $about = About::first();
            $state =    State::all();
            $city =    City::all();
            
            $title = 'Bubblzz Register';
            return view('website.register',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice,'states'=>$state,'cities'=>$city]);
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
            $state =    State::all();
            $city =    City::all();
          
            $title = 'Bubblzz Register';
            return view('website.register',['title' => $title,'category' => $category,'contact' => $contact,'about' => $about,'cart'=> $cart,'total'=> $totalPrice,'states'=>$state,'cities'=>$city]);
        }
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string',
            'mobile' => 'required|numeric',
            'state' => 'required|integer|exists:states,state_id',
            'city' => 'required|integer|exists:cities,city_id',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address1'  => $data['address'],
            'mobile'   => $data['mobile'],
            'state_id'  => $data['state'],
            'city_id'  => $data['city'],
            'password' => bcrypt($data['password']),
            
        ]);
    }
}
