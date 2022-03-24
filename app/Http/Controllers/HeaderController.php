<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = DB::table('header')->get();
        return view('header.index', ['data' => $header]);
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
        $priority = $request->prarirty;
        DB::table('header')
            ->where('prarirty', $priority)
            ->update(['prarirty' => $priority + 1]);

        DB::table('header')->insert($request->except('_token'));
        // checking priority exits or not 



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
        $status =  DB::table('header')->find($id);
        if ($status->status == 1) {
            DB::table('header')->where('id', $id)->update(['status' => '0']);
        } else {

            DB::table('header')->where('id', $id)->update(['status' => '1']);
        }
        if ($status->status == 1) {
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
        $data = DB::table('header')->find($id);
        return view('header.update', ["data" => $data]);
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
        $priority = $request->prarirty;
        DB::table('header')
        ->where('prarirty', $priority)
        ->update(['prarirty' => $priority + 1]);


        $result = DB::table('header')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id']));
        return redirect('header')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('header')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }
}
