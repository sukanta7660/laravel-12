<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.service.service',compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function add_service(Request $dd)
    {
        $dd->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        //dd($dd->all());
        //query builder
        $title = $dd->title;
        $description = $dd->description;
        /*DB::table('services')->insert([
            'title' => $title,
            'decription' => $description
        ]);*/

        //eloquent
        $service = new Service();
        $service->title = $title;
        $service->decription = $description;
        $service->save();

        //return redirect()->back()->with('message','Success!');
        return redirect()->to('admin/services')->with('message','Success!');
    }

    public function delete($id)
    {
        Service::findOrFail($id)->delete();
        return back()->with('message','Success!');
    }
}
