<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admission = DB::table('pages')->where('page_type', 'admission')->paginate(10);
        return view('admission.index', ['data' => $admission,  'url' => $this->slider_url()]);
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

        $id =   DB::table('pages')->insertGetId($request->except('_token'));

        if ($request->file('header_image') && $request->file('image_name') && $request->file('image_name1')) {
            $header_image = $request->file('header_image');
            $image_name = $request->file('image_name');
            $image_name1 = $request->file('image_name1');
            $destinationPath = 'upload/admission/';
            $img_header = date('YmdHis') . '1' . "." . $header_image->getClientOriginalExtension();
            $img_name = date('YmdHis') . '2' . "." . $image_name->getClientOriginalExtension();
            $img_name1 = date('YmdHis') . '3' . "." . $image_name1->getClientOriginalExtension();
            $header_image->move($destinationPath, $img_header);
            $image_name->move($destinationPath, $img_name);
            $image_name1->move($destinationPath, $img_name1);

            DB::table('pages')
                ->where('id', $id)
                ->update(['header_image' => $img_header, 'image_name' => $img_name, 'image_name1' => $img_name1]);
                return redirect()->back()->with('store', 'Data successfully Added');        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status =  DB::table('pages')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('pages')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('pages')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('pages')->find($id);
        return view('admission.update', ["data" => $data, 'url' => $this->slider_url()]);
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
        if ($request->file('header_image')) {
            $admission_image = DB::table('pages')->find($id);
            $admission_image = $admission_image->header_image;
            $image = $request->file('header_image');
            $destinationPath = 'upload/admission/';
            $image->move($destinationPath, $admission_image);
        }

        if ($request->file('image_name')) {
            $admission_image = DB::table('pages')->find($id);
            $admission_image = $admission_image->image_name;
            $image = $request->file('image_name');
            $destinationPath = 'upload/admission/';
            $image->move($destinationPath, $admission_image);
        }
        if ($request->file('image_name1')) {
            $admission_image = DB::table('pages')->find($id);
            $admission_image = $admission_image->image_name1;
            $image = $request->file('image_name1');
            $destinationPath = 'upload/admission/';
            $image->move($destinationPath, $admission_image);
        }

        
        $result = DB::table('pages')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'header_image','image_name','image_name1']));
        return redirect('admission')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *admission
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admission_image = DB::table('pages')->find($id);
        $image_name = $admission_image->image_name;
        $image_name1 = $admission_image->image_name1;
        $header_image = $admission_image->header_image;

        if (file_exists(public_path('upload/admission/' . $header_image))) {
            unlink(public_path('upload/admission/' . $header_image));
        }
        if (file_exists(public_path('upload/admission/' . $image_name))) {
            unlink(public_path('upload/admission/' . $image_name));
        }
        if (file_exists(public_path('upload/admission/' . $image_name1))) {
            unlink(public_path('upload/admission/' . $image_name1));
        }
        DB::table('pages')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }}
