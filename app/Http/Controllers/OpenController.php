<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormEngine;
use App\Http\Controllers\SystemController;
use Auth;
use DB;
use Illuminate\Http\Request;

class OpenController extends Controller
{

    public function __construct()
    {

    }

    public function ViewCourses(Type $var = null)
    {

        $SystemController = new SystemController();

        if (Auth::check()) {

            // dd('true');

            if (
                Auth::user()->role == 'PreTest'

            ) {
                return $SystemController->LoadPretestExam();

            } elseif (Auth::user()->role == 'Approve') {

                return redirect()->route('ApplicationStatus');

            } elseif (Auth::user()->role == 'admin') {

                return redirect()->route('MgtCourses');

            } elseif (Auth::user()->role == 'Instructor') {

                return redirect()->route('InstructorViewCourses');

            }
        }

        $rem = [
            'id',
            'created_at',
            'updated_at',
            'uuid',
            'CID',
            'MID',
            'ReasonsForJoining',
            'SpecialNeed',
            'Gender',
            'CV',
            'StudentID',
            'ApprovalStatus',
            'StartDate',
            'CourseDuration',
            'Comment',

        ];

        $FormEngine = new FormEngine();
        $Courses    = DB::table('courses')->get();
        $Students   = DB::table('students')->get();

        $data = [
            //"Page" => "users.MgtUsers",
            'Page'     => 'public.CourseView',
            'Title'    =>
            'SRL Uganda Course Catalog | Click View More To See More Details',
            'Desc'     => 'Select a course to enroll for',
            'Courses'  => $Courses,
            'Students' => $Students,
            'Policy'   => 'true',
            'rem'      => $rem,
            'Form'     => $FormEngine->Form('students'),
        ];

        return view('scrn', $data);
    }

    public function dashboard(Type $var = null)
    {

        $SystemController = new SystemController();

        if (Auth::check()) {

            // dd('true');

            if (
                Auth::user()->role == 'PreTest'

            ) {
                return $SystemController->LoadPretestExam();

            } elseif (Auth::user()->role == 'Approve') {

                return redirect()->route('ApplicationStatus');

            } elseif (Auth::user()->role == 'admin') {

                return redirect()->route('MgtCourses');

            } elseif (Auth::user()->role == 'Instructor') {

                return redirect()->route('InstructorViewCourses');

            }
        }

        $rem = [
            'id',
            'created_at',
            'updated_at',
            'uuid',
            'CID',
            'MID',
            'ReasonsForJoining',
            'SpecialNeed',
            'Gender',
            'CV',
            'StudentID',
            'ApprovalStatus',
            'StartDate',
            'CourseDuration',
            'Comment',

        ];

        $FormEngine = new FormEngine();
        $Courses    = DB::table('courses')->get();
        $Students   = DB::table('students')->get();

        $data = [
            //"Page" => "users.MgtUsers",
            'Page'     => 'public.CourseView',
            'Title'    =>
            'SRL Uganda Course Catalog | Click View More To See More Details',
            'Desc'     => 'Select a course to enroll for',
            'Courses'  => $Courses,
            'Students' => $Students,
            'Policy'   => 'true',
            'rem'      => $rem,
            'Form'     => $FormEngine->Form('students'),
        ];

        return view('scrn', $data);
    }
    public function NewStudent(Request $request)
    {
        $request->validate([
            '*'         => 'required',
            'CV'        => 'required|mimes:pdf|max:30048',
            'Email'     => 'required|unique:students',
            'StudentID' => 'required|mimes:pdf|max:30048',
        ]);

        $CV = time() . '.' . $request->CV->extension();
        $request->CV->move(public_path('assets/data'), $CV);

        $StudentID = time() . '.' . $request->StudentID->extension();
        $request->StudentID->move(public_path('assets/data'), $CV);

        DB::table($request->TableName)->insert(
            $request->except(['_token', 'TableName', 'id', 'files'])
        );

        DB::table('users')->insert([
            'UserID'            => $request->uuid,
            'password'          => \Hash::make($request->Email),
            'email'             => $request->Email,
            'role'              => 'PreTest',
            'phone'             => $request->MobileNumber,
            'name'              => $request->Name,
            'ApplicationLetter' => $request->ReasonsForJoining,
            'institution'       => $request->ParentOrganization,
            'nationality'       => $request->Nationality,
            'CID'               => $request->CID,
            'gender'            => $request->Gender,
        ]);

        DB::table($request->TableName)
            ->where('uuid', $request->uuid)
            ->update([
                'StudentID' => $StudentID,
                'CV'        => $CV,
            ]);

        return redirect()
            ->route('login')
            ->with(
                'status',
                'Your course application has been submitted successfully and is pending review, Login into your SRL E-learning account using the email ' .
                $request->Email .
                ' and the password ' .
                $request->Email .
                '. Remember to update your credentials upon login'
            );
    }

    public function ApproveStudentApps(Type $var = null)
    {
        $Apps = DB::table('students AS S')
            ->join('courses AS C', 'C.CID', 'S.CID')
            ->join('users AS U', 'U.UserID', 'S.uuid')
            ->where('U.role', 'Approve')
            ->select(
                'C.CourseName',
                'U.*',
                'C.CourseDescription',
                'S.*',
                'S.id AS ID',
                'U.id AS Uid'
            )
            ->get();
        $data = [
            'Page'  => 'public.ApproveApplication',
            'Title' => 'Approve Student Course Application',
            'Desc'  => 'Course Application Approval ',
            'Apps'  => $Apps,
        ];

        return view('scrn', $data);
    }

    public function ApplicationStatus(Type $var = null)
    {
        $Apps = DB::table('students AS S')
            ->join('courses AS C', 'C.CID', 'S.CID')
            ->join('users AS U', 'U.UserID', 'S.uuid')
            ->where('U.UserID', \Auth::user()->UserID)
            ->select(
                'C.CourseName',
                'U.*',
                'U.id AS USER_ID',
                'C.CourseDescription',
                'S.*',
                'U.id AS ID'
            )
            ->get();
        $data = [
            'Page'  => 'public.ApplicationStatus',
            'Title' => 'Your Course Application Dashboard',
            'Desc'  => 'Course Application ',
            'Apps'  => $Apps,
        ];

        return view('scrn', $data);
    }

    public function ApproveAppLogic(Request $request)
    {
        $request->validate([
            '*' => 'required',

        ]);

        DB::table('students')->where('id', '=', $request->id)
            ->update([

                "ApprovalStatus" => 'Approved',
                "StartDate"      => $request->StartDate,
                "CourseDuration" => $request->CourseDuration,
                "Comment"        => $request->Comment,

            ]);

        DB::table('users')->where('id', '=', $request->USER_ID)
            ->update([

                'role' => 'PreTest',
            ]);

        return redirect()
            ->back()
            ->with('status', 'The student application has been approved successfully');
    }
}
