<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class InventoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Inventory/Index');
    }

    public function about()
    {
        return Inertia::render('About', [
            'hello' => "hello world",
        ]);
    }
}