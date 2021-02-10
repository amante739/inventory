<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Location;
use App\Product;
use App\Stock;
use App\supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function productIn()
    {
        $suppliers=Supplier::all();
        $locations=Location::all();
        return view('admin.product.productIn.create',compact(['suppliers','locations']));

    }
    public function productInStore(Request $request)
    {
        $suppliers=Supplier::all();
        $locations=Location::all();
        $validator = Validator::make(request()->all(), [
            'po_no' => 'required',
            'po_date' => 'required',
            'qc_no' => 'required',
            'supplier_id' => 'required',
            'quantity' => 'required',
           // 'item_name'=>'required',
            //'item_id' => 'required',
           // 'location_id' => 'required',
            'challan_no' => 'required',
            'delivered_place' => 'required',
            'delivered_date' => 'required',
            'received_by' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $item_names = $request->item_name;
        $quantitys = $request->quantity;
        $item_location_id = $request->item_location_id;
        $product_name=$request->product_name;
        //dd($item_location_id );
      //  $podate=Carbon::createFromFormat('m/d/Y', $request->po_date)->format('Y-m-d');
        foreach ($item_names as $key => $item_name) {
           Inventory::create([
               // 'item_name' => $item_name,

                'po_no' => $request->po_no,
                'po_date' =>$request->po_date,
                'qc_no' => $request->qc_no,
                'supplier_id' => $request->supplier_id,
                'challan_no'=>$request->challan_no,
                'delivered_place'=>$request->delivered_place,
                'delivered_date'=>$request->delivered_date,
                'received_by'=>$request->received_by,
                'quantity' => $quantitys[$key],
                'item_id' =>$product_name[$key],
                'location_id' => $item_location_id[$key],
                'transaction_id'=>Carbon::now()->format('YmdHis'),
                'prepared_by'=>$request->prepared_by,
                'status' =>0
            ]);
            $stocks = Stock::where('item_id','like', '%'.$product_name[$key]."%")->get();



                //dd(empty($stocks));
              //  dd($stocks);
            if(count($stocks)>0) {
                foreach ($stocks as $stock) {


                    $qty = $stock->stock + $quantitys[$key];
                    $stock->update([

                        'stock' => $qty,
                        'item_id' => $product_name[$key]

                    ]);

                }
            }else {
                Stock::create([
                    'item_id' => $product_name[$key],
                    'stock' => $quantitys[$key]
                ]);
            }



        }
        return view('admin.product.productIn.create',compact(['suppliers','locations']));

    }
    public function productInView()
    {
       // $inventories=Inventory::all();
        $inventories=DB::table('inventories')
            ->leftjoin('items','items.id','=','inventories.item_id')
           // ->selectRaw('COUNT(*) as nbr', 'products.*')
            //->groupBy('products.id')
            ->get();

        return view('admin.product.productIn.index',compact(['inventories']));
    }


    public function productOut()
    {
        return view('admin.product.productOut.create');
    }
    public function productOutView()
    {
        return view('admin.product.productOut.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
