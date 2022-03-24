<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = DB::table('event')->get();
        return view('events.index', ['data' => $events, 'url' => $this->slider_url()]);
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
            $destinationPath = 'upload/event';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
        }
        // dd($name);

        $id = DB::table('event')->insertGetId($request->except('_token'));
        $result = DB::table('event')
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
        $status =  DB::table('event')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('event')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('event')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('event')->find($id);
        return view('events.update', ["data" => $data, 'url' => $this->slider_url()]);
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
            $image_name = DB::table('event')->find($id);
            $image_name = $image_name->images;
            $image = $request->file('images');
            $destinationPath = 'upload/event';
            $image->move($destinationPath, $image_name);
        }
        $result = DB::table('event')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'images']));
        return redirect('events')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = DB::table('event')->find($id);
        $image_name = $image_name->images;
        unlink(public_path('upload/event/' . $image_name));
        DB::table('event')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }
}
