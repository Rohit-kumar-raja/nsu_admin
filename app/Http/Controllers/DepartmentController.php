<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Throwable;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = DB::table('course_tbl')->paginate(10);
        return view('department.index', ['data' => $department, 'url' => $this->slider_url()]);
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
            $destinationPath = 'upload/department/';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
        }
        // dd($name);

        $id = DB::table('course_tbl')->insertGetId($request->except('_token'));
        $result = DB::table('course_tbl')
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
        $status =  DB::table('course_tbl')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('course_tbl')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('course_tbl')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('course_tbl')->find($id);
        return view('department.update', ["data" => $data, 'url' => $this->slider_url()]);
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
            $image_name = DB::table('course_tbl')->find($id);
            $image_name = $image_name->images;
            $image = $request->file('images');
            $destinationPath = 'upload/department/';
            $image->move($destinationPath, $image_name);
        }
        $result = DB::table('course_tbl')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'images']));
        return redirect('department')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = DB::table('course_tbl')->find($id);
        $image_name = $image_name->images;
        try {
            unlink(public_path('upload/course_tbl/' . $image_name));
            DB::table('course_tbl')->delete($id);
        } catch (Throwable $e) {
            DB::table('course_tbl')->delete($id);
        }
        return redirect()->back()->with('delete', 'Data successfully delete');
    }

    // course or department details page start from here
    public function editDetails($id)
    {
        $data = DB::table('course_details')->where('course_id', $id)->get();
        if ($data->count() > 0) {
            return view('department.course_details', ["data" => $data[0], 'id' => $id]);
        }
        return view('department.course_details', ['id' => $id, 'data' => 'null']);
    }
    public function storeDetails(Request $request)
    {
        $destinationPath = 'upload/CourseDetails/';
        $image_name1 = '';
        $image_name2 = '';
        $image_name3 = '';
        $image_name4 = '';

        // insert the data if data not available into the databases
        if ($request->id == '') {
            if (!empty($request->file('syllabus'))) {
                $image = $request->file('syllabus');
                $image_name1 = date('YmdHis') . "1." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $image_name1);
               

            } else {
                $image_name1 = date('YmdHis') . "1.pdf";
               
            }
            if (!empty($request->file('fee_schedule'))) {
                $image = $request->file('fee_schedule');
                $image_name2 = date('YmdHis') . "2." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $image_name2);
            } else {
                $image_name2 = date('YmdHis') . "2.pdf";
            }
            if (!empty($request->file('guidelines'))) {
                $image = $request->file('guidelines');
                $image_name3 = date('YmdHis') . "3." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $image_name3);
            } else {
                $image_name3 = date('YmdHis') . "3.pdf";
            }
            if (!empty($request->file('syllabus1'))) {
                $image = $request->file('syllabus1');
                $image_name4 = date('YmdHis') . "3." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $image_name3);
            } else {
                $image_name4 = date('YmdHis') . "4.pdf";
            }
            try {
                $id = DB::table('course_details')->insertGetId($request->except('_token'));

                DB::table('course_details')
                    ->where('id', $id)
                    ->update(['syllabus' => $image_name1, 'fee_schedule' => $image_name2, 'guidelines' => $image_name3, 'syllabus1' => $image_name4]);
                return redirect()->back()->with('store', 'Data successfully Saved into the database');
            } catch (Throwable $e) {
                return redirect()->back()->with('error', 'Please fill the all Required Field properly');
            }

            // update the data if data is available into the databases
        } else {

            $image_name = DB::table('course_details')->find($request->id);
            $image_name1 = $image_name->syllabus;
            $image_name2 = $image_name->fee_schedule;
            $image_name3 = $image_name->guidelines;
            $image_name4 = $image_name->syllabus1;


            if ($request->file('syllabus')) {
                $image = $request->file('syllabus');
                $image->move($destinationPath, $image_name1);
            }
            if ($request->file('fee_schedule')) {
                $image = $request->file('fee_schedule');
                $image->move($destinationPath, $image_name2);
            }
            if ($request->file('guidelines')) {
                $image = $request->file('guidelines');
                $image->move($destinationPath, $image_name3);
            }
            if ($request->file('syllabus1')) {
                $image = $request->file('syllabus1');
                $image->move($destinationPath, $image_name4);
            }
            try {
                $result = DB::table('course_details')
                    ->where('id', $request->id)
                    ->update($request->except(['_token', 'id', 'syllabus', 'fee_schedule', 'guidelines', 'syllabus1']));
                return redirect()->back()->with('update', 'Course successfully updated');
            } catch (Throwable $e) {
                return redirect()->back()->with('error', 'Please fill the all Required Field properly');
            }
        }
    }

    function searchData(Request $request)
    {
        $input =  $request->data;
        $data = DB::table('course_tbl')->orWhere('course', 'like', '%' . $input . '%')->orWhere('program', 'like', '%' . $input . '%')->orWhere('discipline', 'like', '%' . $input . '%')->orWhere('fee', 'like', '%' . $input . '%')->get();
        $i = 1;
        foreach ($data as $department) {
?>
            <tr>


                <td> <?php echo $i;  ?> </td>

                <td> <?php echo $department->course ?> </td>
                <td> <?php echo $department->program ?> </td>
                <td> <?php echo $department->fee ?> </td>

                <td>
                    <img width="100" src="<?php echo asset('upload/department/' . $department->images) ?>" alt="lol" />

                </td>

                <td><a href="<?php echo route('department.details', $department->id) ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                </td>
                <td><a href="<?php echo route('department') ?>/update/<?php echo $department->id ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                </td>
                <td><a href="<?php echo route('department') ?>/delete/<?php echo $department->id ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
                <td><a href="<?php echo route('department') ?>/status/<?php echo $department->id ?>" class="btn <?php if ($department->is_deleted == 1) { ?> btn-success <?php } else { ?> btn-secondary <?php } ?> btn-sm">
                        <?php if ($department->is_deleted == 1) echo 'Active';
                        else  echo 'Deactive';  ?> </a>
                </td>
            </tr>
<?php
            $i++;
        }
    }
}
