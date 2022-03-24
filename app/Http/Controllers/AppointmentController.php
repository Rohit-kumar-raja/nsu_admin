<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
class AppointmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $appointment = DB::table('appointment_tbl')->paginate(10);
        return view('appointment.index', ['data' => $appointment,  'url' => $this->slider_url()]);
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

        $id =   DB::table('appointment_tbl')->insertGetId($request->except('_token'));

        if ($request->file('image_name') && $request->file('image_name1') && $request->file('image_name2')) {
            $header_image = $request->file('image_name');
            $image_name = $request->file('image_name1');
            $image_name1 = $request->file('image_name2');
            $destinationPath = 'upload/appointment/';
            $img_header = date('YmdHis') . '1' . "." . $header_image->getClientOriginalExtension();
            $img_name = date('YmdHis') . '2' . "." . $image_name->getClientOriginalExtension();
            $img_name1 = date('YmdHis') . '3' . "." . $image_name1->getClientOriginalExtension();
            $header_image->move($destinationPath, $img_header);
            $image_name->move($destinationPath, $img_name);
            $image_name1->move($destinationPath, $img_name1);

            DB::table('appointment_tbl')
                ->where('id', $id)
                ->update(['image_name' => $img_header, 'image_name1' => $img_name, 'image_name2' => $img_name1]);
            return redirect()->back()->with('store', 'Data successfully Added');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status =  DB::table('appointment_tbl')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('appointment_tbl')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('appointment_tbl')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('appointment_tbl')->find($id);
        return view('appointment.update', ["data" => $data, 'url' => $this->slider_url()]);
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
            $appointment_image = DB::table('appointment_tbl')->find($id);
            $appointment_image = $appointment_image->image_name;
            $image = $request->file('image_name');
            
            $destinationPath = 'upload/appointment/';
            $image->move($destinationPath, $appointment_image);
        }

        if ($request->file('image_name1')) {
            $appointment_image = DB::table('appointment_tbl')->find($id);
            $appointment_image = $appointment_image->image_name1;
            $image = $request->file('image_name1');
            $destinationPath = 'upload/appointment/';
            $image->move($destinationPath, $appointment_image);
        }
        if ($request->file('image_name2')) {
            $appointment_image = DB::table('appointment_tbl')->find($id);
            $appointment_image = $appointment_image->image_name2;
            $image = $request->file('image_name2');
            $destinationPath = 'upload/appointment/';
            $image->move($destinationPath, $appointment_image);
        }


        $result = DB::table('appointment_tbl')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'image_name', 'image_name1', 'image_name2']));
        return redirect('appointment')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *appointment
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment_image = DB::table('appointment_tbl')->find($id);
        $image_name = $appointment_image->image_name;
        $image_name1 = $appointment_image->image_name1;
        $image_name2 = $appointment_image->image_name2;

        if (file_exists(public_path('upload/appointment/' . $image_name2))) {
            unlink(public_path('upload/appointment/' . $image_name2));
        }
        if (file_exists(public_path('upload/appointment/' . $image_name))) {
            unlink(public_path('upload/appointment/' . $image_name));
        }
        if (file_exists(public_path('upload/appointment/' . $image_name1))) {
            unlink(public_path('upload/appointment/' . $image_name1));
        }
        DB::table('appointment_tbl')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }

    function searchData(Request $request)
    {
        $input =  $request->data;
        $data = DB::table('appointment_tbl')->orWhere('course', 'like', '%' . $input . '%')->orWhere('title', 'like', '%' . $input . '%')->orWhere('sub_title', 'like', '%' . $input . '%')->orWhere('description', 'like', '%' . $input . '%')->get();
        $i = 1;
        foreach ($data as $appointment) {
?>
            <tr>


                <td> <?php echo $i;  ?> </td>

                <td> <?php echo $appointment->title ?> </td>
                <td> <?php echo $appointment->sub_title ?> </td>

                <td><img width="100" src="<?php echo  asset('upload/appointment/' . $appointment->image_name) ?>">
                </td>

                <td><img width="100" src="<?php echo asset('upload/appointment/' . $appointment->image_name1) ?>">
                </td>
                <td><img width="100" src="<?php echo  asset('upload/appointment/' . $appointment->image_name2) ?>">
                </td>

                <td><a href="<?php echo route('appointment') ?>/update/<?php echo $appointment->id ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                </td>
                <td><a href="<?php echo route('appointment') ?>/delete/<?php echo $appointment->id ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
                <td><a href="<?php echo route('appointment') ?>/status/<?php echo $appointment->id ?>" class="btn <?php if ($appointment->is_deleted == 1) { ?> btn-success <?php } else { ?> btn-secondary <?php } ?> btn-sm">
                        <?php if ($appointment->is_deleted == 1) echo 'Active';
                        else  echo 'Deactive';  ?> </a>
                </td>
            </tr>
<?php
            $i++;
        }
    }
}
