<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LatestNewsController extends Controller
{
 
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestnews = DB::table('latestnews_tbls')->paginate(10);
        return view('latestnews.index', ['data' => $latestnews, 'url' => $this->slider_url()]);
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
        $images = '';
        $id =   DB::table('latestnews_tbls')->insertGetId($request->except('_token'));

        if ($request->file('images')) {
            $image = $request->file('images');
            $destinationPath = 'upload/latestnews/';
            $images = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $images);
        }
        DB::table('latestnews_tbls')
            ->where('id', $id)
            ->update(['images' => $images]);
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
        $status =  DB::table('latestnews_tbls')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('latestnews_tbls')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('latestnews_tbls')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('latestnews_tbls')->find($id);
        return view('latestnews.update', ["data" => $data, 'url' => $this->slider_url()]);
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
        if ($request->file('images')) {
            $images = DB::table('latestnews_tbls')->find($id);
            $images = $images->images;
            $image = $request->file('images');
            $destinationPath = 'upload/latestnews/';
            $image->move($destinationPath, $images);
        }
        $result = DB::table('latestnews_tbls')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'images']));
        return redirect('latestnews')->with('update', 'Data successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *latestnews
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = DB::table('latestnews_tbls')->find($id);
        $images = $images->images;
        if (file_exists(public_path('upload/latestnews/' . $images))) {
            unlink(public_path('upload/latestnews/' . $images));
        }
        DB::table('latestnews_tbls')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }
}
