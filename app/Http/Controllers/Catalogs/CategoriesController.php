<?php

namespace App\Http\Controllers\Catalogs;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return Inertia::render('Catalogs/Suppliers/Index')->with(compact('suppliers'));
    }


    public function create()
    {
        return Inertia::render('Catalogs/Suppliers/Create');
    }

    public function store(Request $request){
        
        $supplier = new Supplier();
        $supplier->name = $request->name;        
        $supplier->address = $request->address;        
        $supplier->responsable = $request->responsable;
        $supplier->phone_number = $request->phone_number;
        
        $supplier->is_active = true;
        $supplier->save();
        return redirect('admin/catalogs/suppliers');
    }
}
