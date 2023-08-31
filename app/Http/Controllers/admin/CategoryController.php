<?php

namespace App\Http\Controllers\admin;

use App\Models\categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)
    {
        $validatedData=$request->validated();
        $category = new categorie();
        $category->Nom = $validatedData['Nom'];
        $category->Slug = Str::Slug($validatedData['Slug']);
        $category->Description = $validatedData['Description'];

        $uploadPath='uploads/category/';
        if($request->hasFile('Image')) {
            $file = $request->file('Image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file ->move(public_path('uploads/category/'), $filename);
            $category->Image = $uploadPath.$filename;
        }

        $category->Status = $request->Status == true ? '1' : '0';
        $category->save();
        return redirect('admin/category')->with('message', 'Une catégorie est ajoutée avec succés');
    }
    public function edit(categorie $category)
    {
        // $category = categorie::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $request,$category)
    {
        $category = categorie::findOrFail($category);

        $validatedData=$request->validated();


        $category->Nom = $validatedData['Nom'];
        $category->Slug = Str::Slug($validatedData['Slug']);
        $category->Description = $validatedData['Description'];

        if($request->hasFile('Image')) {
            $uploadPath='uploads/category/';
            $path = 'uploads/category/'. $category->Image;
            if(File::exists($path )){
                File::delete($path);
            }

            $file = $request->file('Image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file ->move(public_path('uploads/category/'), $filename);
            $category->Image =$uploadPath.$filename;
        }

        $category->Status = $request->Status == true ? '1' : '0';
        $category->update();
        return redirect('admin/category')->with('message', 'Une catégorie est modifiée avec succés');
    }
}
