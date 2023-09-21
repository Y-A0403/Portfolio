<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdactRequest;
use App\Http\Requests\UpdateProdactRequest;
use App\Models\Prodact;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class ProdactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prodacts = Order::searchOrders($request->search)
        ->select('id','itemname','order_by','deadline','is_selling')
        ->paginate(20);

        return Inertia::render('Prodacts/Index',
        [
            'prodacts' => $prodacts
        ]);
    }

    public function show(Order $prodact)
    {
        return Inertia::render('Prodacts/Show',
        [
            'prodact' => $prodact
        ]);
    }
}
