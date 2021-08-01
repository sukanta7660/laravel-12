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
        // return $dd->image->extension();
        // dd($dd->all());
        $dd->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        //dd($dd->all());
        //query builder
        $title = $dd->title;
        $description = $dd->description;
        $image = $dd->image;
        /*DB::table('services')->insert([
            'title' => $title,
            'decription' => $description
        ]);*/

        //eloquent
        $service = new Service();
        $service->title = $title;
        $service->decription = $description;

        if ($dd->has('image')) {
            $extension = $image->extension();
            $imageName = 'IMG_'.md5(date('d-m-Y H:i:s'));
            $imageName = $imageName.'.'.$extension;

            $service->image = $imageName;

            $path = public_path('uploads/services');

            $image->move($path,$imageName);

        }

        $service->save();

        //return redirect()->back()->with('message','Success!');
        return redirect()->to('admin/services')->with('message','Success!');
    }

    public function delete($id)
    {
        $service = Service::findOrFail($id);


        //$path = public_path('uploads/services/'.$service->image);
        $this->deleteFile('services', $service->image);
        $service->image()->delete();

//        if (file_exists($path)) {
//            unlink($path);
//        }

        $service->delete();

        return back()->with('message','Success!');
    }

    public function update_page($id)
    {
        $service = Service::findOrFail($id);
        if($service){
            return view('admin.service.update',compact('service'));
        }
        abort(404);

    }

    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $service = Service::findOrFail($request->id);
        $service->title = $request->title;
        $service->decription = $request->description;

        if ($request->has('image')) {

            $path = public_path('uploads/services/'.$service->image);

            if (file_exists($path)) {
                unlink($path);
            }

            $extension = $request->image->extension();
            $imageName = 'IMG_'.md5(date('d-m-Y H:i:s'));
            $imageName = $imageName.'.'.$extension;

            $service->image = $imageName;

            $path = public_path('uploads/services');

            $request->image->move($path,$imageName);

        }

        $service->save();

        return redirect()->to('admin/services')->with('message','Success!');

    }
}
