<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use phpDocumentor\Reflection\Types\Object_;
use App\Exports\OrderExport;
use Excel;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('status',1)->get();
        return view('admin.order.index')->with('orders', $order);
    }
    public function shippied()
    {
        $order = Order::where('status',3)->get();
        return view('admin.order.index')->with('orders', $order);
    }
    public function ordered()
    {
        $order =Order::where('status',2)->get();
        return view('admin.order.index')->with('orders', $order);
    }
    public function canceled()
    {
        $order =Order::where('status',5)->get();
        return view('admin.order.index')->with('orders', $order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['customers' => Customer::all(), 'products' => Product::all()];
        return view('admin.order.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
        ]);
//        dd($request->request);

        $order = new Order;
        $order->customer_id = $request->input('customer_id');
        $order->totalPrice = $request->input('totalPrice');
        $order->status = 1;
        $order->save();
        $lastOrder = Order::orderBy('created_at', 'desc')->first();
        $inArray = '';
        $result = [];
        foreach ($request->except('_token', 'name', 'customer_id','table-data_length', 'totalPrice') as $key => $value){
            $arr = explode('_', $key);
            if(!in_array($inArray, $arr)){
                $result []= end($arr);
                $inArray = end($arr);
            }
        }
//        dd($result);
        for($i = 0; $i < count($result); $i++ ){
            $orderProduct = new OrderProduct;
            $orderProduct->order_id = $lastOrder->id;
            $productId = $request->input("product_" .$result[$i]);
            $productQuantity = $request->input("quantity_" .$result[$i]);
//            dd($productId);
            $orderProduct->product_id = $productId;
            $product = Product::find($productId);
            $product->sold = $product->sold + $productQuantity;
//            dd($productQuantity);
            $product->save();
            $orderProduct->quantity = $productQuantity ;
            $orderProduct->save();
        }

        Session::remove('productToFind');
        return redirect()->route('order.index')->with('success', 'The order have been added');
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
        $order = Order::find($id);
        $data = ['order' => Order::find($id), 'orderProducts' => OrderProduct::where('order_id', '=', $order->id)->get()];
//dd($data['orderProducts']);
        return view('admin.order.edit')->with($data);
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
        $this->validate($request, [
            'name' => 'required',
        ]);
        //dd($request->request);

        $order = Order::find($id);
        $orderProduct = OrderProduct::where('order_id', '=', $order->id)->get();
        foreach ($orderProduct as $item){
            $item->delete();
        }
//        $order->customer_id = $request->input('customer');
        $order->status = $request->input('status');
        $order->totalPrice = $request->input('totalPrice');
        $order->save();

        $inArray = '';
        $result = [];
        foreach ($request->except('_token', 'name', 'customer_id', 'status', '_method', 'table-data_length', 'totalPrice') as $key => $value){
            $arr = explode('_', $key);
            if(!in_array($inArray, $arr)){
                $result []= end($arr);
                $inArray = end($arr);
            }
        }

//dd($result);
        for($i = 0; $i < count($result); $i++ ){
            $orderProduct = new OrderProduct;
            $orderProduct->order_id = $order->id;
            $productId = $request->input("product_" .$result[$i]);
            $productQuantity = $request->input("quantity_" .$result[$i]);
//            dd($productId);
            $orderProduct->product_id = $productId;
            $product = Product::find($productId);
            $product->sold = $product->sold + $productQuantity;
//            dd($productQuantity);
            $product->save();
            $orderProduct->quantity = $productQuantity ;
            $orderProduct->save();
        }

        Session::remove('productToFind');
        return redirect()->route('order.index')->with('success', 'The order have been updated');
    }

    public function findCustomer (Request $request) {
        if($request->ajax()){
            $output = [];
            $customerName =  $request->get('customerName');
            $customerNumber =  $request->get('customerNumber');
            $number = preg_replace('/^[0]/','', $customerNumber);

            if($customerName == '' && $customerNumber != ''){
                $customer = Customer::where('mobile', '=', $number)->first();
            }else if($customerNumber == '' && $customerName != ''){
                $customer = Customer::where('name', 'like', '%'.$customerName.'%')->first();
            }else if($customerName != '' && $customerNumber != ''){
                $customer =  Customer::where([['name', 'like', '%'.$customerName.'%'], ['mobile', '=', $number]])->first();
            }
            if($customer != null){
                $output =[
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'mobile' => $customer->mobile,
                    'address' => $customer->address1,
                    'country' => $customer->country,
                    'city' => $customer->city,
                ];
            }else
                $output = ['error' => 'Can\'t find customer'];

            echo json_encode($output);
        }
    }

    public function findProduct (Request $request) {
        if($request->ajax()){
            $output = '';
            $productName = $request->get('productName');
            $orderID = $request->get('orderID');
            $rowCountInTable = $request->get('rowCountInTable');
            $totalPriceValue = $request->get('totalPriceValue');
            if($productName != ''){
                $data = Product::where('name', 'like', '%'. $productName . '%')->orWhere('name_ar', 'like', '%'. $productName . '%')->get();
            }
//            $countProductOrder = OrderProduct::where('order_id', '=', $orderID)->count();

            $total_row = $data->count();
            $dataToAddToSession = [];

            if(!session()->has('productToFind')){
                Session::get('productToFind')[0] = [];
                $countEleInSession = 0;
            }else{
                $dataToAddToSession[0] = Session::get('productToFind')[0];
                $countEleInSession = count(Session::get('productToFind')[0]);
            }

            $priceInSession = Session::get('productToFind')[1];
            $totalPrice = 0;
            if($total_row > 0) {
                for($i = 0 + $rowCountInTable; $i < $total_row + $rowCountInTable;  $i++)
                {
                    $price = $data[$i - $rowCountInTable]->offer != 0 ? $data[$i - $rowCountInTable]->offer : $data[$i - $rowCountInTable]->price;
                    $output .= '<tr>
                             <td class="test-center">'.$data[$i - $rowCountInTable]->name.'</td>
                             <td class="test-center">'.$data[$i - $rowCountInTable]->name_ar.'</td>
                             <td class="test-center">
                                <input id="editQuantity" min="1" style="width: 70px" type="number" value="1" name="quantity_'. $i . '">
                                <input id="productID" type="hidden" name="product_'. $i .'" value="'. $data[$i - $rowCountInTable]->id .'">
                             </td>
                             <td class="text-center editPrice">'. $price .'</td>
                             <td class="text-center"><button data-row="'.$i.'" type="button" class="btn custom-button deleteProduct" data-toggle="modal" data-target="#m_modal_1"><i class="flaticon-delete-1"></i></button></td>
                            </tr>
                    ';




                    $dataToAddToSession[0][$data[$i - $rowCountInTable]->id] = [
                        'name' => $data[$i - $rowCountInTable]->name,
                        'name_ar' => $data[$i - $rowCountInTable]->name_ar,
//                        'quantity' => 1,
                        'data' => '
                                <input id="editQuantity" min="1" style="width: 70px" type="number" value="1" name="quantity_'. $i . '">
                                <input id="productID" type="hidden" name="product_'. $i .'" value="'. $data[$i - $rowCountInTable]->id .'">
                                ',
                        'price' => $price,
                        'deleteButton' => '<button data-row="'.$i.'" type="button" class="btn custom-button deleteProduct" data-toggle="modal" data-target="#m_modal_1"><i class="flaticon-delete-1"></i></button>'
                    ];

                    $totalPrice += $data[$i - $rowCountInTable]->offer != 0 ? $data[$i - $rowCountInTable]->offer : $data[$i - $rowCountInTable]->price;
                }
            } else {
                $output = '
                       <tr class="odd">
                        <td valign="top" colspan="5" class="text-center" >No Data Found</td>
                       </tr>
                ';
            }

            $dataToAddToSession[1] = $totalPrice + $priceInSession;
            Session::put('productToFind', $dataToAddToSession);
            $data = array(
                'table_data'  => $output,
                'totalPrice'  => $totalPrice + $totalPriceValue,
            );

            echo json_encode($data);

        }else{
            $data = array(
                'table_data'  => '',
            );
            echo json_encode($data);
        }

    }

    public function updatePrice (Request $request) {
        if($request->all()){
            $quantity = $request->get('quantity');
            $productID = $request->get('productID');
            $values = $request->get('values');
            $product = Product::find($productID);
            $price = 0;
            if($product->offer != 0){
                $price = $product->offer * $quantity;
            }else{
                $price = $product->price * $quantity;
            }

            $totalPrice = 0;

            foreach ($values as $value){
                $pID = $value[1];
                $getProduct = Product::find($pID);
                if($getProduct->offer != 0){
                    $totalPrice += $getProduct->offer * $value[0];
                }else{
                    $totalPrice += $getProduct->price * $value[0];
                }

            }


            $dataInSession = Session::get('productToFind')[0];

//            $priceInSessiokn = Session::get('productToFind')[1];

            $editedData = preg_replace('/(value="[0-9]+")/', 'value="'.$quantity.'"', $dataInSession[$productID]['data'], 1);

            $dataInSession[$productID]['data'] = $editedData;
            $dataInSession[$productID]['price'] = $price;

            $data = [
                0 => $dataInSession,
                1 => $totalPrice
            ];

            session()->put('productToFind', $data);

            $data = [
                'price' => $price,
                'totalPrice' => $totalPrice,
                'output' => session()->get('productToFind')
            ];


            echo json_encode($data);
        }
    }

    public function changeOrderStatus (Request $request) {
//dd($request->request);
        // $orderID = $request->orderID;
        $order = Order::find($request->orderID);
        // dd($request->status);
        $order->update(['status'=>$request->status]);
        // $order->status = $request->status;
        // $order->save();
        return redirect()->route('order.index')->with('success', 'The order has been updated successfully');
    }



//    For delete from session

    public function deleteSession (Request $request) {
        if($request->ajax()){
            $id = $request->get('productID');

            $dataInSession = Session::get('productToFind')[0];

            $priceInSession = Session::get('productToFind')[1] - $dataInSession[$id]['price'];

            unset($dataInSession[$id]);

            $data = [
                0 => $dataInSession,
                1 => $priceInSession
            ];
            session()->put('productToFind', $data);

            $output = [
                'totalPrice' => $priceInSession
            ];

            echo json_encode($output);

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order_id = $request->input('orderId');
        $order = Order::find($order_id);
        $orderProduct = OrderProduct::where('order_id',  '=' , $order->id)->get();
        foreach ($orderProduct as $item){
            $item->delete();
        }
        $order->delete();
        return redirect()->route('order.index')->with('success', 'The order deleted successfully');
    }
    public function export()
    {
       return Excel::download(new OrderExport, 'orders.xlsx');
    }
}
