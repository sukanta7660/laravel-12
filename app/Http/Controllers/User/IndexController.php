<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $value = "Sailor-Page";
        $value1 = "Sailor-Page1";
        //query builder
       return $students = DB::table('students')->get();
        $arrs = array("Red","Green","Blue","Yellow");
        //return view('user.welcome')->with(['siteName' => $value]);
        return view('user.welcome',compact('value','value1','arrs','students'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact(){
        return "Sukanta";
    }
}
