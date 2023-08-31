<?php

namespace App\Http\Controllers\admin;

use App\Models\Size;
use App\Models\Color;
use App\Models\Image;
use App\Models\Brands;
use App\Models\Product;
use App\Models\categorie;
use Illuminate\Support\Str;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories=categorie::all();
        $brands=Brands::all();
        $colors=Color::where('Status', '0')->get();
        $sizes=Size::where('Status', '0')->get();
        return view('admin.products.create', compact('categories', 'brands', 'colors', 'sizes'));
    }

    public function store(ProductFormRequest $request)
    {
        $validateData = $request->validated();
        $category = categorie::findOrFail($validateData['Id_Catégorie']);

        $product=$category->products()->create([
            'Id_Catégorie'=>$validateData['Id_Catégorie'],
            'Nom'=>$validateData['Nom'],
            'Slug'=>Str::slug($validateData['Slug']),
            'Marque'=>$validateData['Marque'],
            'Description'=>$validateData['Description'],
            'Prix_Original'=>$validateData['Prix_Original'],
            'Prix_vente'=>$validateData['Prix_vente'],
            'Quantité'=>$validateData['Quantité'],
            'Tendance'=>$request->Tendance == true ? '1' : '0',
            'Status'=>$request->Status == true ? '1' : '0',
            'Offre'=>$request->Offre == true ? '1' : '0',
        ]);

        if($request->hasFile('Image')) {
            $uploadPath = 'uploads/products/';
            $i=1;
            foreach($request->file('Image') as $imgFile) {

                $ext = $imgFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$ext;
                $imgFile->move($uploadPath, $fileName);
                $finalImagePathName = $uploadPath.$fileName;
                $product->productImages()->create([
                    'Id_Produit'=>$product->id,
                    'Image'=>$finalImagePathName,
                ]);
            }

        }
        if($request->colors) {
            foreach($request->colors as $key=> $color) {
                $product->productColors()->create([
                    'Id_Produit'=>$product->id,
                    'Id_Color'=>$color,
                    'Quantité'=>$request->CouleurQuantité[$key] ?? 0
                ]);
                if($request->sizes) {
                    foreach($request->sizes as $key=> $size) {
                        $product->productSizes()->create([
                            'Id_Produit'=>$product->id,
                            'Id_Size'=>$size,
                            'Quantité'=>$request->CouleurQuantité[$key] ?? 0
                        ]);
                    }
                }
            }
        }



        return  redirect('/admin/products')->with('message', 'Le produit est ajouté avec succés');
    }
    public function edit(int $prod_id)
    {
        $categories=categorie::all();
        $brands=Brands::all();
        $product=Product::findOrFail($prod_id);

        $product_color= $product->productColors->pluck('Id_Color')->toArray();
        $colors=Color::whereNotIn('id', $product_color)->get();

        $product_size= $product->productSizes->pluck('Id_Size')->toArray();
        $sizes=Size::whereNotIn('id', $product_size)->get();
        return view('admin.products.edit', compact('categories', 'brands', 'product', 'colors', 'sizes'));

    }
    public function update(ProductFormRequest $request, int $prod_id)
    {
        $validateData = $request->validated();
        $product=categorie::findOrFail($validateData['Id_Catégorie'])
        ->products()->where('id', $prod_id)->first();

        if($product) {
            $product->update([
                'Id_Catégorie'=>$validateData['Id_Catégorie'],
                'Nom'=>$validateData['Nom'],
                'Slug'=>Str::slug($validateData['Slug']),
                'Marque'=>$validateData['Marque'],
                'Description'=>$validateData['Description'],
                'Prix_Original'=>$validateData['Prix_Original'],
                'Prix_vente'=>$validateData['Prix_vente'],
                'Quantité'=>$validateData['Quantité'],
                'Tendance'=>$request->Tendance == true ? '1' : '0',
                'Status'=>$request->Status == true ? '1' : '0',
                'Offre'=>$request->Offre == true ? '1' : '0',
            ]);
            if($request->hasFile('Image')) {
                $uploadPath = 'uploads/products/';
                $i=1;
                foreach($request->file('Image') as $imgFile) {

                    $ext = $imgFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$ext;
                    $imgFile->move($uploadPath, $fileName);
                    $finalImagePathName = $uploadPath.$fileName;

                    $product->productImages()->create([
                        'Id_Produit'=>$product->id,
                        'Image'=>$finalImagePathName,
                    ]);
                }

            }
            if($request->colors) {
                foreach($request->colors as $key=> $color) {
                    $product->productColors()->create([
                        'Id_Produit'=>$product->id,
                        'Id_Color'=>$color,
                        'Quantité'=>$request->CouleurQuantité[$key] ?? 0
                    ]);

                }
            }

            return  redirect('/admin/products')->with('message', 'Le produit est modifié avec succés');


        } else {
            return redirect('admin/products')->with('message', 'Pas de produit de meme ID');
        }
    }
    public function destroyImage(int $product_image_id)
    {
        $productImage = Image::findOrFail($product_image_id);
        if(File::exists($productImage->Image)) {
            File::delete($productImage->Image);
        }
        $productImage->delete();
        return redirect('admin/products')->with('message', 'L image de produit est supprimée');
    }
    public function destroy(int $product_id)
    {
        $product= Product::findOrFail($product_id);

        if($product->productImages) {
            foreach($product->productImages as  $img) {
                if(File::exists($img->Image)) {
                    File::delete($img->Image);

                }

            }


        }
        $product->delete();
        return redirect()->back()->with('message', 'Le produit est supprimé avec ses images');
    }

    public function updateProductColorQty(Request $request, $prod_color_id)
    {
        $prodColoData=Product::findOrFail($request->product_id)
                                ->productColors()->where('id', $prod_color_id)->first();

        $prodColoData->update([
               'Quantité'=>$request->qty
        ]);
        return response()->json(['message'=>'la couleur et la quantité du produit sont modifiées']);
    }
    public function DeleteProdColorbtn($prod_color_id)
    {
        $prodColo=ProductColor::findOrFail($prod_color_id);

        $prodColo->delete();
        return response()->json(['message'=>'la couleur et la quantité du produit sont supprimées']);
    }
}
