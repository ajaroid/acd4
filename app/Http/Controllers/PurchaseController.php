<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        $data = [
            'purchases' => $purchases
        ];
        return view('purchases.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();

        $data = [
            'suppliers' => $suppliers,
            'products' => $products
        ];

        return view('purchases.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        $items = collect($request->items)->filter(function ($item) {
            return isset($item['product_id']);
        });

        if ($items->count() <= 0) {
            return back()->with('error_message', 'Item tidak boleh kosong');
        }

        DB::transaction(function () use ($items, $request) {

            $items = $items->map(function ($item) {
                $product = Product::find($item['product_id']);

                $purchaseItem = new PurchaseItem();
                $purchaseItem->quantity = $item['quantity'];
                $purchaseItem->product_id = $item['product_id'];
                $purchaseItem->subtotal = $item['quantity'] * $product->purchase_price;

                return $purchaseItem;
            });

            $purchase = new Purchase();
            $purchase->total = $items->sum('subtotal');
            $purchase->supplier_id = $request->supplier_id;
            $purchase->save();

            $purchase->purchaseItems()->saveMany($items);
        });

        return redirect('/purchases')->with('success_message', 'item berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }
}
