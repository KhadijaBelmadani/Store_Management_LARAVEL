<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');

        $orders=Order::when($request->date !=null, function ($q) use ($request) {

            return  $q->whereDate('created_at', $request->date);

        }, function ($q) use ($todayDate) {

            return  $q ->whereDate('created_at', $todayDate);
        })
                         ->when($request->status !=null, function ($q) use ($request) {

                             return  $q->where('Status_message', $request->status);

                         })

                        ->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order=Order::where('id', $orderId)->first();
        if($order) {
            return view('admin.orders.view', compact('order'));
        } else {
            return redirect('admin/orders')->with('message', 'Id Commande pas trouvé ');

        }

    }
    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order=Order::where('id', $orderId)->first();
        if($order) {
            $order->update([
                'Status_message' => $request->status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message', 'La commande est mise à jour');
        } else {
            return redirect('admin/orders/'.$orderId)->with('message', 'Id Commande pas trouvé ');

        }

    }
    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }
    public function generateInvoice(int $orderId)
    {
        $todayDate=Carbon::now()->format('d-m-Y');
        $order = Order::findOrFail($orderId);
        $data=['order'=>$order];

        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        return $pdf->download('Facture-'.$orderId.'-'.$todayDate.'.pdf');
        // ini_set('max_execution_time', 3600); // 3600 seconds = 60 minutes
        // set_time_limit(3600);

    }
}
