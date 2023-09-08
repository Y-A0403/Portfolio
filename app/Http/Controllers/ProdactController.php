<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdactRequest;
use App\Http\Requests\UpdateProdactRequest;
use App\Models\Prodact;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



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

    
    public function show(Prodact $prodact)
    {
        // dd($prodact);
        return Inertia::render('Prodacts/Show',[
            'prodact' => $prodact
        ]);
    }
}