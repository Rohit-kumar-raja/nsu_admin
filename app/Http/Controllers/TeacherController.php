<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // for($i=0;$i<=200;$i++){
        //     DB::table('categorie')->where('id',$i)->update(['image_name'=>'76587465847'.$i.'.jpg']);
        // }

        $teacher = DB::table('faculty_tbl')->paginate(10);
        return view('teacher.index', ['data' => $teacher,  'url' => $this->slider_url()]);
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

        $id =   DB::table('faculty_tbl')->insertGetId($request->except('_token'));

        if ($request->file('image_name') && $request->file('resume')) {
            $header_image = $request->file('image_name');
            $image_name = $request->file('resume');

            $destinationPath = 'upload/teacher/';
            $img_header = date('YmdHis') . '1' . "." . $header_image->getClientOriginalExtension();
            $img_name = date('YmdHis') . '2' . "." . $image_name->getClientOriginalExtension();
            $header_image->move($destinationPath, $img_header);
            $image_name->move($destinationPath, $img_name);

            DB::table('faculty_tbl')
                ->where('id', $id)
                ->update(['image_name' => $img_header, 'resume' => $img_name]);
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
        $status =  DB::table('faculty_tbl')->find($id);
        if ($status->is_deleted == 1) {
            DB::table('faculty_tbl')->where('id', $id)->update(['is_deleted' => '0']);
        } else {

            DB::table('faculty_tbl')->where('id', $id)->update(['is_deleted' => '1']);
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
        $data = DB::table('faculty_tbl')->find($id);
        return view('teacher.update', ["data" => $data, 'url' => $this->slider_url()]);
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
            $teacher_image = DB::table('faculty_tbl')->find($id);
            $teacher_image = $teacher_image->image_name;
            $image = $request->file('image_name');
            $destinationPath = 'upload/teacher/';
            $image->move($destinationPath, $teacher_image);
        }

        if ($request->file('resume')) {
            $teacher_image = DB::table('faculty_tbl')->find($id);
            $teacher_image = $teacher_image->resume;
            $image = $request->file('resume');
            $destinationPath = 'upload/teacher/';
            $image->move($destinationPath, $teacher_image);
        }

        $result = DB::table('faculty_tbl')
            ->where('id', $request->id)
            ->update($request->except(['_token', 'id', 'image_name', 'resume']));
        return redirect('teacher')->with('update', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *teacher
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher_image = DB::table('faculty_tbl')->find($id);
        $image_name = $teacher_image->image_name;
        $image_name1 = $teacher_image->resume;


        if (file_exists(public_path('upload/teacher/' . $image_name))) {
            unlink(public_path('upload/teacher/' . $image_name));
        }
        if (file_exists(public_path('upload/teacher/' . $image_name1))) {
            unlink(public_path('upload/teacher/' . $image_name1));
        }
        DB::table('faculty_tbl')->delete($id);
        return redirect()->back()->with('delete', 'Data successfully delete');
    }

    function searchData(Request $request)
    {
        $input =  $request->data;
        $data = DB::table('faculty_tbl')->orWhere('name', 'like', '%' . $input . '%')->orWhere('designation', 'like', '%' . $input . '%')->orWhere('emailid', 'like', '%' . $input . '%')->orWhere('description', 'like', '%' . $input . '%')->get();
        $i = 1;
        foreach ($data as $teacher) {
?>
            <tr>


                <td> <?php echo $i;  ?> </td>

                <td> <?php echo $teacher->name ?> </td>
                <td> <?php echo $teacher->designation ?> </td>
                <td> <?php echo $teacher->emailid ?> </td>
                <td> <a href="<?php echo  asset('upload/teacher/' . $teacher->resume)  ?>" target="_blank">
                        <object data="<?php echo  asset('upload/teacher/' . $teacher->resume)  ?>" type="application/pdf" width="100" height="100">

                        </object></a></td>
                <td>
                    <img width="100" src="<?php echo asset('upload/teacher/' . $teacher->image_name) ?>" alt="lol" />

                </td>

                <td><a href="<?php echo route('social', $teacher->id) ?>" class="btn btn-info btn-sm"><i class="fas fa-share-alt"></i></a>
                </td>
                <td><a href="<?php echo route('teacher') ?>/update/<?php echo $teacher->id ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                </td>
                <td><a href="<?php echo route('teacher') ?>/delete/<?php echo $teacher->id ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
                <td><a href="<?php echo route('teacher') ?>/status/<?php echo $teacher->id ?>" class="btn <?php if ($teacher->is_deleted == 1) { ?> btn-success <?php } else { ?> btn-secondary <?php } ?> btn-sm">
                        <?php if ($teacher->is_deleted == 1) echo 'Active';
                        else  echo 'Deactive';  ?> </a>
                </td>
            </tr>
<?php
            $i++;
        }
    }
}
