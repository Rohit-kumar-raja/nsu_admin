<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Monolog\Handler\FingersCrossedHandler;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = DB::table('tbl_seo')->paginate(10);

        return view('seo.index', ['data' => $seo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('tbl_seo')->find($id);
        return view('seo.show', ["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tbl_seo')->insert($request->except('_token'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $is_deleted =  DB::table('tbl_seo')->find($id);
        if ($is_deleted->is_deleted == 1) {
            DB::table('tbl_seo')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('tbl_seo')->where('id', $id)->update(['is_deleted' => '1']);
        }
        return redirect('seo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('tbl_seo')->find($id);
        return view('seo.update', ["data" => $data]);
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

        $result = DB::table('tbl_seo')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id']));
        return redirect('seo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_seo')->delete($id);
        return redirect()->back();
    }
}
