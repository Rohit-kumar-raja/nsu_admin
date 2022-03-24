<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoriesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = DB::table('categorie')->orderBy('id','desc')->get();
        return view('program.index', ['data' => $program, 'url' => $this->slider_url()]);
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
        $image_name = '';
        $id =   DB::table('categorie')->insertGetId($request->except('_token'));

        if ($request->file('image_name')) {
            $image = $request->file('image_name');
            $destinationPath = 'upload/program/';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
        }
        DB::table('categorie')
            ->where('id', $id)
            ->update(['image_name' => $image_name]);
        return redirect()->back()->with('store', 'Data successfully Added');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status =  DB::table('categorie')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('categorie')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('categorie')->where('id', $id)->update(['is_deleted' => '1']);
        }
        if ($status->is_deleted == 1) {
            return redirect()->back()->with('status', 'Status Deactivated successfully');
        } else {
            return redirect()->back()->with('status1', 'Status activated successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('categorie')->find($id);
        return view('program.update', ["data" => $data, 'url' => $this->slider_url()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        if ($request->file('image_name')) {
            $image_name = DB::table('categorie')->find($id);
            $image_name = $image_name->image_name;
            $image = $request->file('image_name');
            $destinationPath = 'upload/program/';
            echo  $image->move($destinationPath, $image_name);
        }
        $result = DB::table('categorie')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'image_name']));
        return redirect('program')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = DB::table('categorie')->find($id);
        $image_name = $image_name->image_name;
        if (file_exists(public_path('upload/program/' . $image_name))) {
            unlink(public_path('upload/program/' . $image_name));
        }
        DB::table('categorie')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }

 
}
