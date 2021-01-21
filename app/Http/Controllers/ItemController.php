<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Stock;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        $categories = Category::all();
        $units = Unit::all();
        return view('admin.item.index', compact(['items', 'categories', 'units']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('admin.item.create', compact(['categories', 'units']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'item_name' => 'required|unique:items,item_name',
            'category_id' => 'required',
            'item_code' => 'required',
            'item_unit_id' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item_names = $request->item_name;
        $item_code = $request->item_code;
        $item_unit_id = $request->item_unit_id;
        foreach ($item_names as $key => $item_name) {
            $item_id = Item::create([
                'item_name' => $item_name,
                'category_id' => $request->category_id,
                'item_code' => $item_code[$key],
                'item_unit_id' => $item_unit_id[$key],
                'item_status' => 0
            ])->id;

            Stock::create([
                'item_id' => $item_id,
                'stock' => 0
            ]);
        }
        return redirect()->route('items.index')->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::all();
        $categories = Category::all();
        $units = Unit::all();

        $items = $items->find($id);
        //$user = User::with(['Organization', 'Profile'])->findOrFail(Auth::id());


        //
        //  return view('item.edit',compact('product'));
        return view('admin.item.edit', compact(['items', 'categories', 'units']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $items = Item::find($id);
        $items->update([
            'item_name' => $request->input('item_name'),
            'category_id' => $request->input('category_id'),
            'item_code' => $request->input('item_code'),
            'item_unit_id' => $request->input('item_unit_id')

        ]);
        return redirect()->route('items.index')->with('success', 'Item Updated successfully');

        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $items = Item::find($id);
        $items->delete();
        return redirect()->route('items.index')->with('success', 'Item Deleted successfully');
    }
}
