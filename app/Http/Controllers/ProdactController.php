<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdactRequest;
use App\Http\Requests\UpdateProdactRequest;
use App\Models\Prodact;
use Inertia\Inertia;


class ProdactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        return Inertia::render('Prodacts/Index',[
            'prodacts' => Prodact::select('id','name','customer','order_by','deadline','manager')
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Prodacts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdactRequest $request)
    {
        // dd($request->all());
        Prodact::create([
            'name' => $request->name,
            'customer' => $request->customer,
            'order_by' => $request->order_by,
            'deadline' => $request->deadline,
            'manager' => $request->manager,
        ]);
        

        return to_route('prodacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodact $prodact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodact $prodact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdactRequest $request, Prodact $prodact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodact $prodact)
    {
        //
    }
}
