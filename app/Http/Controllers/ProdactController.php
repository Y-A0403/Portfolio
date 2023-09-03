<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdactRequest;
use App\Http\Requests\UpdateProdactRequest;
use App\Models\Prodact;
use Inertia\Inertia;
use Illuminate\Http\Request;


class ProdactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prodacts = Prodact::searchProdacts($request->search)
        ->select('id','name','order_by','deadline','is_selling')
        ->paginate(20);

        // $pagiprodacts = Prodact::searchProdacts($request->search)
        // ->select('id','name','order_by','deadline','is_selling')
        // ->paginate(50);

        // dd($prodacts,$pagiprodacts);

        return Inertia::render('Prodacts/Index',[
            'prodacts' => $prodacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return Inertia::render('Prodacts/Create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreProdactRequest $request)
    // {
    //     // // dd($request->all());
    //     // Prodact::create([
    //     //     'name' => $request->name,
    //     //     'customer' => $request->customer,
    //     //     'order_by' => $request->order_by,
    //     //     'deadline' => $request->deadline,
    //     //     'manager' => $request->manager,
    //     //     'memo'    => $request->memo,
    //     // ]);
        

    //     return to_route('prodacts.index')
    //     ->with([
    //         'message' => '登録しました。',
    //         'status' => 'success'
    //     ]);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Prodact $prodact)
    {
        // dd($prodact);
        return Inertia::render('Prodacts/Show',[
            'prodact' => $prodact
        ]);
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
