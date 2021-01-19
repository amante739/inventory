<?php

namespace App\Http\Controllers;


use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        return view('admin.unit.index', compact('units'));
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
        $validator = Validator::make(request()->all(), [
            'unit_name' => 'required|unique:units,unit_name'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Unit::create([
            'unit_name' => $request->input('unit_name'),
            'unit_status' => 1
        ]);
        return redirect()->route('units.index')->with('success', 'Unit created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $units = Unit::all();
        $units =$units->find($id);
      //  $suppliers = Supplier::all();
      //  $suppliers = $suppliers->find($id);
      //  return view('admin.supplier.edit', compact('suppliers'));
        return view('admin.unit.edit', compact(['units']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $units=Unit::find($id);
        $validator = Validator::make(request()->all(), [
            'unit_name' => 'required|unique:units,unit_name'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $units->update([
            'unit_name' => $request->input('unit_name')
        ]);
        return redirect()->route('units.index')->with('success', 'Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $units = Unit::find($id);
        $units->delete();
        return redirect()->route('units.index')->with('success', 'Unit Deleted successfully');

    }
}
