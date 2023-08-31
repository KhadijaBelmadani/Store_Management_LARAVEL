<?php

namespace App\Http\Controllers\Frontend;

use App\Models\slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\categorie;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders=slider::where('Status', '0')->get();
        $trendingProducts = Product::where('Tendance', '1')->latest()->take(15)->get();
        $NewArrival =  Product::latest()->take(16)->get();
        $OffreDuJour =  Product::where('Offre', '1')->latest()->take(15)->get(); //16 bla trend w offre +10 ykono trend +15 ykono offre

        return view('frontend.index', compact('sliders', 'trendingProducts', 'NewArrival', 'OffreDuJour'));
    }

    public function NewArrival()
    {
        $NewArrival =  Product::latest()->take(16)->get();
        return view('frontend.pages.NewArrival', compact('NewArrival'));
    }
    public function OffreDuJour()
    {
        $OffreDuJour =  Product::where('Offre', '1')->latest()->get();
        return view('frontend.pages.OffreDuJour', compact('OffreDuJour'));
    }

    public function categories()
    {
        $categories = categorie::where('Status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = categorie::where('Slug', $category_slug)->first();
        if($category) {


            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = categorie::where('Slug', $category_slug)->first();
        if($category) {

            $product = $category->products()->where('Slug', $product_slug)->where('Status', '0')->first();
            if($product) {
                return view('frontend.collections.products.view', compact('product', 'category'));


            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }


    public function thankyou()
    {
        return view('frontend.thank-you');
    }

    public function searchProd(Request $request)
    {
        if ($request->search) {
            $searchProd = Product::where('Nom', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProd'));

        } else {
            return redirect()->back()->with('message', 'recherche vide');
        }
    }
}
