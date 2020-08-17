<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Customer;
use App\Message;
use App\Order;
use App\OrderProduct;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use function MongoDB\BSON\toJSON;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderForChart = Order::where('created_at', '>=', Carbon::now()->subMonth())->get();

        $output[] = ['Day', 'Sales'];
        $inArray = '';

        foreach ($orderForChart as $item){
            $date = date('d',strtotime($item->created_at));
            $day = date('Y-m-d', strtotime($item->created_at));

            if($inArray != $date){
                $allRecordsInDay = Order::where('created_at', 'like',  $day . '%')->get();
                $sales = 0;
                foreach ($allRecordsInDay as $record){
                    $sales += $record->totalPrice;
                }
                $output []= [$date, $sales];
            }

            $inArray = $date;


        }
        $orders = Order::all();
        $messages = Message::all();
        $customers = Customer::all();
        $totalSales = 0;
        foreach ($orders as $order){
            $totalSales += $order->totalPrice;
//            $product = Product::find($item->product_id);
//            if($product->offer != 0){
//                $totalSales += $item->quantity * $product->offer;
//            }else{
//                $totalSales += $item->quantity * $product->price;
//            }
        }
        $data = [
            'orders' => $orders,
            'customers' => $customers,
            'messages' => $messages,
            'totalSales' => $totalSales,
            'output' => json_encode($output),
        ];
        return view('admin.dashboard')->with($data);
    }

    public function profile (){
        return view('admin.profile');
    }

    public function updateProfile(Request $request, $id) {
        $this->validate($request, [
           'name' => 'required',
           'username' => 'required',
           'image' => 'image|max:1999',
        ]);

        $updatedAdmin = Admin::find($id);
        $updatedAdmin->name = $request->input('name');
        $updatedAdmin->username = $request->input('username');
        if($request->input('password') != null){
            $updatedAdmin->password = Hash::make($request->input('password'));
        }

        if($request->hasFile('image')){
            $fileExt = $request->image->getClientOriginalExtension();
            $fileNameToStore = uniqid('', true) . '.' . $fileExt;
            $request->image->storeAs('public/admins', $fileNameToStore);
            if($updatedAdmin->image != 'noImage.png'){
                Storage::delete('public/admins/'. $updatedAdmin->image);
            }
            $updatedAdmin->image = $fileNameToStore;
        }
        $updatedAdmin->save();

        return redirect()->route('admin.profile')->with('success', 'Your personal date have been updated successful');

    }


    public function getMonthlyChart () {

        $orderForChart = Order::where('created_at', '>=', Carbon::now()->subYear())->get();

        $output[] = ['Month', 'Sales'];
        $inArray = '';

        foreach ($orderForChart as $item){
            $date = date('M',strtotime($item->created_at));
            $day = date('Y-m', strtotime($item->created_at));

            if($inArray != $date){
                $allRecordsInDay = Order::where('created_at', 'like',  $day . '%')->get();
                $sales = 0;
                foreach ($allRecordsInDay as $record){
                    $sales += $record->totalPrice;
                }
                $output []= [$date, $sales];
            }

            $inArray = $date;

        }

        $orders = Order::all();
        $messages = Message::all();
        $customers = Customer::all();
        $orderProducts = OrderProduct::all();
        $totalSales = 0;
        foreach ($orders as $order){
            $totalSales += $order->totalPrice;
//            $product = Product::find($item->product_id);
//            if($product->offer != 0){
//                $totalSales += $item->quantity * $product->offer;
//            }else{
//                $totalSales += $item->quantity * $product->price;
//            }
        }
        $data = [
            'orders' => $orders,
            'customers' => $customers,
            'messages' => $messages,
            'totalSales' => $totalSales,
            'output' => json_encode($output),
        ];
        return view('admin.dashboard')->with($data);

    }

    public function getYearlyChart()
    {
        $orderForChart = Order::where('created_at', '>=', Carbon::now()->subYear())->get();

        $output[] = ['Day', 'Sales'];
        $inArray = '';

        foreach ($orderForChart as $item){
            $date = date('Y',strtotime($item->created_at));
            $year = date('Y', strtotime($item->created_at));

            if($inArray != $date){
                $allRecordsInDay = Order::where('created_at', 'like',  $year . '%')->get();
                $sales = 0;
                foreach ($allRecordsInDay as $record){
                    $sales += $record->totalPrice;
                }
                $output []= [$date, $sales];
            }

            $inArray = $date;

        }
        $orders = Order::all();
        $messages = Message::all();
        $customers = Customer::all();
        $totalSales = 0;
        foreach ($orders as $order){
            $totalSales += $order->totalPrice;
//            $product = Product::find($item->product_id);
//            if($product->offer != 0){
//                $totalSales += $item->quantity * $product->offer;
//            }else{
//                $totalSales += $item->quantity * $product->price;
//            }
        }
        $data = [
            'orders' => $orders,
            'customers' => $customers,
            'messages' => $messages,
            'totalSales' => $totalSales,
            'output' => json_encode($output),
        ];
        return view('admin.dashboard')->with($data);
    }

}
