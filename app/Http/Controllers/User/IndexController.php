<?php

namespace App\Http\Controllers\User;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $value = "Sailor-Page";
        $value1 = "Sailor-Page1";
        //query builder
        $students = DB::table('students')->get();
        $arrs = array("Red","Green","Blue","Yellow");
        //return view('user.welcome')->with(['siteName' => $value]);
//company

       $companies = Company::all();
       $companies1 = Company::where('name','Infinity')->first();

        return view('user.welcome',compact('companies1','value','value1','arrs','students','companies'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact(){
        return "Sukanta";
    }
}
