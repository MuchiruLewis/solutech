<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // all Suppliers
    public function index()
    {
        $suppliers = Supplier::all()->toArray();
        return array_reverse($b);
    }

    // add Suppliers
    public function add(Request $request)
    {
        $supplier = new Supplier([
            'name' => $request->name,
            
        ]);
        $supplier->save();

        return response()->json('The Suppliers is successfully added');
    }

    // edit 
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    // update 
    public function update($id, Request $request)
    {
        $supplier = Supplier::find($id);
        $supplier->update($request->all());

        return response()->json('The Suppliers is successfully updated');
    }

    // delete Suppliers
    public function delete($id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();

        return response()->json('The Suppliers is successfully deleted');
    }
}
