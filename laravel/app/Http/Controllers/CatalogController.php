<?php

namespace App\Http\Controllers;
use App\Http\Requests\CatalogRequest;
use App\Http\Requests\CatalogStoreRequest;


class CatalogController extends Controller
{
    public function index(CatalogRequest $request)
    {
        return $request->getProducts();
    }


    public function store(CatalogStoreRequest $request)
    {
        return $request->saveProducts(); 
    }
}
