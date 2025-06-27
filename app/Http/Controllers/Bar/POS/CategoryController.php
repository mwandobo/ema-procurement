<?php

namespace App\Http\Controllers\Bar\POS;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bar\POS\Category;
use Brian2694\Toastr\Facades\Toastr;
use PDF;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $category=Category::where('added_by',auth()->user()->added_by)->where('disabled','0')->get();
       return view('bar.pos.items.category',compact('category'));
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
        
        $data['name']=$request->name;
        $data['description']=$request->description;
          
       $data['user_id']= auth()->user()->id;
        $data['added_by']= auth()->user()->added_by;

        $invoice = Category::create($data);
   
         Toastr::success('Created Successfully','Success');
        return redirect(route('category.index'));
        
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
        $data=Category::find($id);
       $category=Category::where('added_by',auth()->user()->added_by)->where('disabled','0')->get();
       return view('bar.pos.items.category',compact('category','data','id'));
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
        $invoice=Category::find($id);
        
       $data['name']=$request->name;
        $data['description']=$request->description;
          
    //   $data['user_id']= auth()->user()->id;
    //     $data['added_by']= auth()->user()->added_by;
    
            $invoice->update($data);
        



     Toastr::success('Updated Successfully','Success');
        return redirect(route('category.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $invoices = Category::find($id);

        $item->update(['disabled'=> '1']);

        Toastr::success('Deleted Successfully','Success');
        return redirect(route('category.index'));
    }

   

}
