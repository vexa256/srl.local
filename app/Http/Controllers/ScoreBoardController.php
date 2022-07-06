<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use Auth;
use DB;

class ScoreBoardController extends Controller
{

    public function RunScoreTotal()
    {

        $UserID = Auth::user()->UserID;

        $CourseAppliedFor = DB::table('courses AS C')->where('C.CID', Auth::user()->CID)->first();

        $CID = $CourseAppliedFor->CID;

        $TotalPracticals = DB::table('practical_tests')
            ->where('CID', $CID)
            ->count();

        $TotalModular = DB::table('modular_tests')
            ->where('CID', $CID)
            ->count();

        $TotalModular = DB::table('post_tests')
            ->where('CID', $CID)
            ->count();

        $Modular = DB::table('attempt_modular_tests')
            ->where('UserID', $UserID)->sum('Score');

        $Practical = DB::table('attempt_practical_tests')
            ->where('UserID', $UserID)->sum('Score');

        $Post = DB::table('attempt_post_tests')
            ->where('UserID', $UserID)->sum('Score');

        $ModulaScore    = ($Modular / 100) * 10;
        $PracticalScore = ($Practical / 100) * 20;
        $PostScore      = ($Post / 100) * 50;
        $Attendance     = (100 / 100) * 20;

        $data = [
            'Page'           => 'Scoreboard.Scoreboard',
            'Title'          => 'Student Scoreboard',
            'Desc'           => 'SRL Uganda Assessments',
            // 'Course' => $Course,
            'ModulaScore'    => $ModulaScore,
            'PracticalScore' => $PracticalScore,
            'PostScore'      => $PostScore,
            'Attendance'     => $Attendance,
            'CourseName'     => $CourseAppliedFor->CourseName,
            'TotalScore'     => $PostScore + $Attendance + $PracticalScore + $Modular,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);

    }

    public function Certify()
    {
        $UserID = Auth::user()->UserID;

        $CourseAppliedFor = DB::table('courses AS C')->where('C.CID', Auth::user()->CID)->first();

        $CID = $CourseAppliedFor->CID;

        $Modules         = DB::table('modules')->where('CID', $CID)->get();
        $TotalPracticals = DB::table('practical_tests')
            ->where('CID', $CID)
            ->count();

        $TotalModular = DB::table('modular_tests')
            ->where('CID', $CID)
            ->count();

        $TotalModular = DB::table('post_tests')
            ->where('CID', $CID)
            ->count();

        $Modular = DB::table('attempt_modular_tests')
            ->where('UserID', $UserID)->sum('Score');

        $Practical = DB::table('attempt_practical_tests')
            ->where('UserID', $UserID)->sum('Score');

        $Post = DB::table('attempt_post_tests')
            ->where('UserID', $UserID)->sum('Score');

        $ModulaScore    = ($Modular / 100) * 10;
        $PracticalScore = ($Practical / 100) * 20;
        $PostScore      = ($Post / 100) * 50;
        $Attendance     = (100 / 100) * 20;
        $Total          = $PostScore + $Attendance + $PracticalScore + $Modular;

        if ($Total < 40) {

            return redirect()
                ->back()
                ->with('error_a', 'You scored below the required pass-mark');

        }
        $data = [
            'Page'           => 'Scoreboard.Cert',
            'Title'          => 'Student Scoreboard',
            'Desc'           => 'SRL Uganda Assessments',
            // 'Course' => $Course,
            'ModulaScore'    => $ModulaScore,
            'PrintCert'      => 'true',
            'PracticalScore' => $PracticalScore,
            'Modules'        => $Modules,
            'PostScore'      => $PostScore,
            'Attendance'     => $Attendance,
            'CourseName'     => $CourseAppliedFor->CourseName,
            'TotalScore'     => $Total,
            // "rem" => $rem,
            // "Form" => $FormEngine->Form('courses'),
        ];

        return view('scrn', $data);

    }

}
