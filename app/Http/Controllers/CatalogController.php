<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class CatalogController extends Controller
{
    public function index()
    {
        return Inertia::render('Catalogs/Index');
    }

    public function about()
    {
        return Inertia::render('About', [
            'hello' => "hello world",
        ]);
    }

}
