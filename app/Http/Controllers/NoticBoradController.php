<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NoticBoradController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticeboard = DB::table('noticeboard')->paginate(10);
        return view('noticeboard.index', ['data' => $noticeboard, 'url' => $this->slider_url()]);
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
            $destinationPath = 'upload/noticeboard';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
        }
        // dd($name);

        $id = DB::table('noticeboard')->insertGetId($request->except('_token'));
        $result = DB::table('noticeboard')
            ->where('id', $id)
            ->update(['images' => $image_name]);
        return redirect()->back()->with('store','Data successfully Added');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status =  DB::table('noticeboard')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('noticeboard')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('noticeboard')->where('id', $id)->update(['is_deleted' => '1']);
        }
        return redirect()->back()->with('status','Status changed successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('noticeboard')->find($id);
        return view('noticeboard.update', ["data" => $data, 'url' => $this->slider_url()]);
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
            $image_name = DB::table('noticeboard')->find($id);
            $image_name = $image_name->images;
            $image = $request->file('images');
            $destinationPath = 'upload/noticeboard';
            $image->move($destinationPath, $image_name);
        }
        $result = DB::table('noticeboard')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'images']));
        return redirect('noticeboard')->with('update','Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = DB::table('noticeboard')->find($id);
        $image_name = $image_name->images;
        unlink(public_path('upload/noticeboard/' . $image_name));
        DB::table('noticeboard')->delete($id);
        return redirect()->back()->with('delete','Data successfully delete');
    }
}
