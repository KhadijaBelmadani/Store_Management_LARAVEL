<?php

namespace App\Http\Controllers\admin;

use App\Models\slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        $sliders=slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {

        return view('admin.slider.create');
    }
    public function store(SliderFormRequest $request)
    {
        $validatedData=$request->validated();

        if($request->hasFile('Image')) {
            $file = $request->file('Image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file ->move(public_path('uploads/slider/'), $filename);
            $validatedData['Image'] = 'uploads/slider/'.$filename;
        }
        $validatedData['Status']=$request->Status == true ? '1' : '0';
        slider::create([
            'Titre' => $validatedData['Titre'],
           'Description' => $validatedData['Description'],
           'Image' => $validatedData['Image'],
           'Status' => $validatedData['Status'],
        ]);





        return redirect('admin/sliders')->with('message', 'Un Slider est ajouté avec succés');

    }
    public function edit(slider $slider)
    {

        return view('admin.slider.edit', compact('slider'));
    }
    public function update(SliderFormRequest $request, slider $slider)
    {

        $validatedData = $request->validated();

        if($request->hasFile('Image')) {

            $destination = $slider->Image;
            if(File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('Image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['Image']= 'uploads/slider/'.$filename;
        }

        if(isset($validatedData['Image'])) {
            Slider::where('id', $slider->id)->update([
                'Titre'=>$validatedData['Titre'],
                'Description'=>$validatedData['Description'],
                'Status'=>$request->status == true ? '1' : '0',
                'Image'=>$validatedData['Image'],
            ]);
        } else {
            Slider::where('id', $slider->id)->update([
                'Titre'=>$validatedData['Titre'],
                'Description'=>$validatedData['Description'],
                'Status'=>$request->Status == true ? '1' : '0',
            ]);
        }



        return redirect('admin/sliders')->with('message', 'Un Slider est Modifié avec succés');
    }

    public function destroy(slider $slider)
    {
        if($slider->count()>0) {
            $destination = $slider->Image;
            if(File::exists($destination)) {
                File::delete($destination);
            }
            $slider->delete();
            return redirect('admin/sliders')->with('message', 'Un Slider est supprimé avec succés');


        }
        return redirect('admin/sliders')->with('message', 'Something Went Wrong');

    }

}
