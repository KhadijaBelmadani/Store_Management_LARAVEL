<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Brands;
use App\Models\Product;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $totprod = Product::count();
        $totcat = categorie::count();
        $totbrands =Brands::count();

        $totUsers = User::count();
        $totuser = User::where('role_as', '0')->count();
        $totadmin = User::where('role_as', '1')->count();

        $totDate = Carbon::now()->format('d-m-Y');
        $thisMonth =Carbon::now()->format('m');
        $thisyear=Carbon::now()->format('Y');

        $totorder = Order::count();
        $todorder = Order::whereDate('created_at', $totDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisyearOrder = Order::whereYear('created_at', $thisyear)->count();

        return view('admin.dashboard', compact(
            'totprod',
            'totcat',
            'totbrands',
            'totUsers',
            'totuser',
            'totorder',
            'todorder',
            'thisMonthOrder',
            'thisyearOrder',
            'totadmin'
        ));
    }
}
