<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mails;
use App\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\RandomMail;
class MailController extends Controller
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
        $mails = Mails::all();
        $customers = Customer::select('id','email','name')->get();
        return view('admin.mail.index',['mails'=>$mails,'customers'=>$customers ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::select('id','email','name')->get();
        return view('admin.mail.create',['customers'=>$customers ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rule = [
            'subject'   =>  'required|string|max:255',
            'body'  =>  'required|string',
            'bcc'   =>  'nullable|email|max:255',
        ];
        $name = [
        'subject'           => 'Subject',
        'body'        => 'Body',
        'bcc'        => 'Bcc',
        ];
        $data = $this->validate(request(),$rule,[],$name);
        $mail = Mails::create($data);
        return redirect()->route('mails.index')->with('success', 'New mail has been added');
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
        $mail = Mails::findorfail($id);
        return view('admin.mail.edit',['mail'=>$mail]);
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
        $rule = [
            'subject'   =>  'required|string|max:255',
            'body'  =>  'required|string',
            'bcc'   =>  'nullable|email|max:255',
        ];
        $name = [
        'subject'           => 'Subject',
        'body'        => 'Body',
        'bcc'        => 'Bcc',
        ];
        $data = $this->validate(request(),$rule,[],$name);
        $mail = Mails::where('id',$id)->update($data);
         return redirect()->route('mails.index')->with('success', ' Mail has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $mail = Mails::findOrFail($id);
        $mail->delete();
         return redirect()->route('mails.index')->with('success', 'Mail has been deleted');
    }
    public function send_view()
    {
          $customers = Customer::select('id','email','name')->get();
        return view('admin.mail.send',['customers'=>$customers ]);
    }
    public function send_mail(Request $request)
    {
        $rules = [
            'customers_id'  =>  'required',
            'customers_id.*'  => 'required|integer|exists:customers,id',
        ];
        if($request->has('mail_id'))
        {
            $rules['mail_id']   =  'required|integer|exists:mails,id';
        }else{
            $rules['subject'] = 'required|string|max:255';
            $rules['body'] = 'required|string';
            $rules['bcc'] = 'nullable|email|max:255';
        }
        $name = [
        'customers_id.*'           => 'Customers',
        'subject'           => 'Subject',
        'body'        => 'Body',
        'bcc'        => 'Bcc',
        ];
        $data = $this->validate(request(),$rules,[],$name);
        $customers_ids = $request->customers_id;
        $customers = Customer::whereIn('id',$customers_ids)->get();
        if(isset($request->mail_id))
        {
             $mail = Mails::where('id',$request->mail_id)->first();
             $data=[
                'subject'   =>  $mail->subject,
                'body'   =>  $mail->body,
                'bcc'   =>  $mail->bcc,
             ];
        }else{
             $data=[
                'subject'   =>  $request->subject,
                'body'   =>  $request->body,
                'bcc'   =>  $request->bcc,
             ];
        }
        foreach($customers as $customer)
        {
            $mailData = [
                            // 'email'=>$customer->email,
                            'name'  =>$customer->name,
                            'subject'   =>  $data['subject'],
                            'body'   =>  $data['body'],
                            // 'bcc'   =>  $request->bcc,
                        ];
        $mail = Mail::to($customer->email);
        if (isset($data['bcc'])) {
            $mail->bcc($data['bcc']);
        }
        $mail->send(new RandomMail($mailData));
        }
         return redirect()->route('mails.index')->with('success', ' Mail Sent Successfully');
    }
}
