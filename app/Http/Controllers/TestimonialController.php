<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = DB::table('testimonial_tbl')->orderBy('id','DESC')->get();
        return view('testimonial.index', ['data' => $testimonial, 'url' => $this->slider_url()]);
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
        $testimonial_image = '';
        $id =   DB::table('testimonial_tbl')->insertGetId($request->except('_token'));

        if ($request->file('testimonial_image')) {
            $image = $request->file('testimonial_image');
            $destinationPath = 'upload/testimonial/';
            $testimonial_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $testimonial_image);
        }
        DB::table('testimonial_tbl')
            ->where('id', $id)
            ->update(['testimonial_image' => $testimonial_image]);
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
        $status =  DB::table('testimonial_tbl')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('testimonial_tbl')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('testimonial_tbl')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('testimonial_tbl')->find($id);
        return view('testimonial.update', ["data" => $data, 'url' => $this->slider_url()]);
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
        if ($request->file('testimonial_image')) {
            $testimonial_image = DB::table('testimonial_tbl')->find($id);
            $testimonial_image = $testimonial_image->testimonial_image;
            $image = $request->file('testimonial_image');
            $destinationPath = 'upload/testimonial/';
            $image->move($destinationPath, $testimonial_image);
        }
        $result = DB::table('testimonial_tbl')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'testimonial_image']));
        return redirect('testimonial')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *testimonial
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial_image = DB::table('testimonial_tbl')->find($id);
        $testimonial_image = $testimonial_image->testimonial_image;
        if (file_exists(public_path('upload/testimonial/' . $testimonial_image))) {
            unlink(public_path('upload/testimonial/' . $testimonial_image));
        }
        DB::table('testimonial_tbl')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }
}
