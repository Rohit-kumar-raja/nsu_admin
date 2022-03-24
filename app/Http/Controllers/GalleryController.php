<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $gallery = DB::table('gallery_tbl')->where('title', '!=', 'media')->orderBy('id', 'DESC')->paginate(10);
        return view('gallery.index', ['data' => $gallery]);
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
        $id =   DB::table('gallery_tbl')->insertGetId($request->except('_token'));

        if ($request->file('image_name')) {
            $image = $request->file('image_name');
            $destinationPath = 'upload/gallery/';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
        }
        DB::table('gallery_tbl')
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
        $status =  DB::table('gallery_tbl')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('gallery_tbl')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('gallery_tbl')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('gallery_tbl')->find($id);
        return view('gallery.update', ["data" => $data,]);
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
            $image_name = DB::table('gallery_tbl')->find($id);
            $image_name = $image_name->image_name;
            $image = $request->file('image_name');
            $destinationPath = 'upload/gallery/';
            echo  $image->move($destinationPath, $image_name);
        }
        $result = DB::table('gallery_tbl')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'image_name']));
        return redirect('gallery')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = DB::table('gallery_tbl')->find($id);
        $image_name = $image_name->image_name;
        if (file_exists(public_path('upload/gallery/' . $image_name))) {
            unlink(public_path('upload/gallery/' . $image_name));
        }
        DB::table('gallery_tbl')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }

    function searchData(Request $request)
    {
        $input =  $request->data;
        $data = DB::table('gallery_tbl')->orWhere('title', 'like', '%' . $input . '%')->orWhere('link', 'like', '%' . $input . '%')->orWhere('date', 'like', '%' . $input . '%')->where('title', '!=', 'media')->get();
        $i = 1;
        foreach ($data as $gallery) {
?>
            <tr>


                <td> <?php echo $i;  ?> </td>

                <td> <?php echo $gallery->title ?> </td>

                <td><img width="100" src="<?php echo  asset('upload/gallery/' . $gallery->image_name) ?>">
                </td>
                <td> <?php echo $gallery->link ?> </td>

                <td><a href="<?php echo route('gallery') ?>/update/<?php echo $gallery->id ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                </td>
                <td><a href="<?php echo route('gallery') ?>/delete/<?php echo $gallery->id ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
                <td><a href="<?php echo route('gallery') ?>/status/<?php echo $gallery->id ?>" class="btn <?php if ($gallery->is_deleted == 1) { ?> btn-success <?php } else { ?> btn-secondary <?php } ?> btn-sm">
                        <?php if ($gallery->is_deleted == 1) echo 'Active';
                        else  echo 'Deactive';  ?> </a>
                </td>
            </tr>
<?php
            $i++;
        }
    }
}
