<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
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
        $contact = Contact::first();
        return view('admin.contact.index')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit')->with('contact', $contact);
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
        $contact = Contact::find($id);
        if($request->input('phone') == null){
            $contact->phone= '';
        }else
            $contact->phone = $request->input('phone');


        if( $request->input('mobile') == null){
            $contact->number = '';
        }else
            $contact->number = $request->input('mobile');


        if( $request->input('fax') == null){
            $contact->fax = '';
        }else
            $contact->fax = $request->input('fax');

        if( $request->input('fax') == null){
            $contact->hotLine = '';
        }else
            $contact->hotLine = $request->input('hotline');

        if( $request->input('long') == null){
            $contact->longitude = '';
        }else
            $contact->longitude = $request->input('long');


        if( $request->input('lat') == null){
            $contact->latitude = '';
        }else
            $contact->latitude = $request->input('lat');


        if( $request->input('lat') == null){
            $contact->facebook = '';
        }else
            $contact->facebook = $request->input('facebook');


        if( $request->input('twitter') == null){
            $contact->twitter = '';
        }else
            $contact->twitter = $request->input('twitter');


        if( $request->input('instagram') == null){
            $contact->instagram = '';
        }else
            $contact->instagram = $request->input('instagram');


        if( $request->input('address') == null){
            $contact->address = '';
        }else
            $contact->address = $request->input('address');


        if( $request->input('mail') == null){
            $contact->mail = '';
        }else
            $contact->mail = $request->input('mail');


        if( $request->input('website') == null){
            $contact->website = '';
        }else
            $contact->website = $request->input('website');


        if( $request->input('youtube') == null){
            $contact->youtube = '';
        }else
            $contact->youtube = $request->input('youtube');


        if( $request->input('linkedin') == null){
            $contact->linkedin = '';
        }else
            $contact->linkedin = $request->input('linkedin');

        if( $request->input('google') == null){
            $contact->google = '';
        }else
            $contact->google = $request->input('google');

        if( $request->input('facebook') == null){
            $contact->facebook = '';
        }else
            $contact->facebook = $request->input('facebook');


        $contact->save();
        return redirect()->route('contact.index')->with('success', 'The contact have been updated successful');
    }
}
