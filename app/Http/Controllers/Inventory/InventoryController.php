<?php

namespace App\Http\Controllers\Inventory;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\InventoryItem;

class InventoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Inventory/Index');
    }

    public function current()
    {
        $supplies = InventoryItem::with('inventory')->with('supplier')->get();
        //return $supplies;
        return Inertia::render('Inventory/Current')->with(compact('supplies'));
    }
}
