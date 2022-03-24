<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentPdfControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentpdf = DB::table('pdf')->where('type','studentpdf')->paginate(10);
        return view('studentpdf.index', ['data' => $studentpdf, 'url' => $this->slider_url()]);
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
        if ($request->file('images')) {
            $image = $request->file('images');
            $destinationPath = 'upload/pdf';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
        }
        // dd($name);

        $id = DB::table('pdf')->insertGetId($request->except('_token'));
        $result = DB::table('pdf')
            ->where('id', $id)
            ->update(['images' => $image_name]);
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
        $status =  DB::table('pdf')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('pdf')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('pdf')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('pdf')->find($id);
        return view('studentpdf.update', ["data" => $data, 'url' => $this->slider_url()]);
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


        $id =  $request->id;
        if ($request->file('images')) {
            $image_name = DB::table('pdf')->find($id);
            $image_name = $image_name->images;
            $image = $request->file('images');
            $destinationPath = 'upload/pdf';
            $image->move($destinationPath, $image_name);
        }
        $result = DB::table('pdf')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'images']));
        return redirect('studentpdf')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = DB::table('pdf')->find($id);
        $image_name = $image_name->images;
        unlink(public_path('upload/pdf/' . $image_name));
        DB::table('pdf')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }
}
