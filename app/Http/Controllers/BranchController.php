<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
class BranchController extends Controller
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
        $branchs = Branch::all();
        return view('admin.branch.index',['branchs'=>$branchs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch.create');
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
                
                'branch_address'     => 'required|string',
                ];
         if($request->branch_name !== null)
         {
            $rule['branch_name'] = 'required|string';
         }       
        if($request->branch_number !== null)
        {
            $rule['branch_number'] = 'numeric';
        }
        if($request->branch_other_number !== null)
        {
            $rule['branch_other_number'] = 'numeric';
        }  
        $name = [
        'branch_name'           => 'Branch Name',
        'branch_address'        => 'Branch Address',
        'branch_number'         => 'Branch Number',
        'branch_other_number'   => 'Branch Other Number',
        ];
        $data = $this->validate(request(),$rule,[],$name);
        $branch = Branch::create($data);
         return redirect()->route('branch.index')->with('success', 'The new Branch has been added');
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
        $branch = Branch::findorfail($id);
        return view('admin.branch.edit',['branch'=>$branch]);
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
                
                'branch_address'     => 'required|string',
                ];
         if($request->branch_name !== null)
         {
            $rule['branch_name'] = 'required|string';
         }       
        if($request->branch_number !== null)
        {
            $rule['branch_number'] = 'numeric';
        }
        if($request->branch_other_number !== null)
        {
            $rule['branch_other_number'] = 'numeric';
        }  
        $name = [
        'branch_name'           => 'Branch Name',
        'branch_address'        => 'Branch Address',
        'branch_number'         => 'Branch Number',
        'branch_other_number'   => 'Branch Other Number',
        ];
        $data = $this->validate(request(),$rule,[],$name);
        if($request->branch_name === null)
         {
            $data['branch_name'] = null;
         }       
        if($request->branch_number === null)
        {
            $data['branch_number'] = null;
        }
        if($request->branch_other_number === null)
        {
            $data['branch_other_number'] = null;
        }  
        $branch = Branch::where('id',$id)->update($data);
         return redirect()->route('branch.index')->with('success', 'The new Branch has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
         return redirect()->route('branch.index')->with('success', 'The new Branch has been deleted');
    }
}
