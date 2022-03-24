<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index()
    {
        $faculty_tbl = DB::table('faculty_tbl')->count();
        $course_tbl = DB::table('course_tbl')->count();
        $appointment_tbl = DB::table('appointment_tbl')->count();
        $routes = DB::table('routes')->count();

        $month = array();
        $enquiry = array();
        $year = date('Y');
        for ($i = 1; $i <= date('m'); $i++) {
            array_push($month, date("F", mktime(0, 0, 0, $i, 10)));
            if($i<10){
                $montly_enquiry = Db::table('get_start')->where('created_at', 'like', $year . '-0' . $i . '-% %:%:%')->count();
            }
            else{
                $montly_enquiry = Db::table('get_start')->where('created_at', 'like', $year . '-' . $i . '-% %:%:%')->count();

            }
            array_push($enquiry, $montly_enquiry);
        }
        return view('index', ['teacher' => $faculty_tbl, 'course' => $course_tbl, 'placement' => $appointment_tbl, 'bus' => $routes ,'monthly'=>$month,'enquiry'=>json_encode($enquiry)]);
    }
}
