<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruiters = DB::table('recruiters_tbl')->paginate(10);
        return view('recruiters.index', ['data' => $recruiters, 'url' => $this->slider_url()]);
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
        $id =   DB::table('recruiters_tbl')->insertGetId($request->except('_token'));

        if ($request->file('image_name')) {
            $image = $request->file('image_name');
            $destinationPath = 'upload/recruiters/';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
        }
        DB::table('recruiters_tbl')
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
        $status =  DB::table('recruiters_tbl')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('recruiters_tbl')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('recruiters_tbl')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('recruiters_tbl')->find($id);
        return view('recruiters.update', ["data" => $data, 'url' => $this->slider_url()]);
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
            $image_name = DB::table('recruiters_tbl')->find($id);
            $image_name = $image_name->image_name;
            $image = $request->file('image_name');
            $destinationPath = 'upload/recruiters/';
            echo  $image->move($destinationPath, $image_name);
        }
        $result = DB::table('recruiters_tbl')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'image_name']));
        return redirect('recruiters')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = DB::table('recruiters_tbl')->find($id);
        $image_name = $image_name->image_name;
        if (file_exists(public_path('upload/recruiters/' . $image_name))) {
            unlink(public_path('upload/recruiters/' . $image_name));
        }
        DB::table('recruiters_tbl')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }

    function searchData(Request $request)
    {
        $input =  $request->data;
        $data = DB::table('recruiters_tbl')->orWhere('title', 'like', '%' . $input . '%')->orWhere('sub_title', 'like', '%' . $input . '%')->orWhere('description', 'like', '%' . $input . '%')->get();
        $i = 1;
        foreach ($data as $recruiters) {
?>
            <tr>


                <td> <?php echo $i;  ?> </td>

                <td> <?php echo $recruiters->title ?> </td>
                <td> <?php echo $recruiters->sub_title ?> </td>
                <td> <?php echo $recruiters->virtual_image_name ?> </td>

                <td><img width="100" src="<?php echo  asset('upload/recruiters/' . $recruiters->image_name) ?>">
                </td>

              

                <td><a href="<?php echo route('recruiters') ?>/update/<?php echo $recruiters->id ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                </td>
                <td><a href="<?php echo route('recruiters') ?>/delete/<?php echo $recruiters->id ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
                <td><a href="<?php echo route('recruiters') ?>/status/<?php echo $recruiters->id ?>" class="btn <?php if ($recruiters->is_deleted == 1) { ?> btn-success <?php } else { ?> btn-secondary <?php } ?> btn-sm">
                        <?php if ($recruiters->is_deleted == 1) echo 'Active';
                        else  echo 'Deactive';  ?> </a>
                </td>
            </tr>
<?php
            $i++;
        }
    }
}
