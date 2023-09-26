<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManagementRequest;
use App\Http\Requests\UpdateManagementRequest;
use App\Models\Management;
use App\Models\Prodact;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Customer;
use App\Models\Order;


class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     // items,customers,prodactsテーブルをJOINしたOrderモデルを使う
        $prodacts = Order::searchOrders($request->search)
        ->select('id','itemname','order_by','deadline','is_selling')
        ->paginate(20);

        return Inertia::render('Managements/Index',[
            'prodacts' => $prodacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::select('id','itemname')->get();

        $customers = Customer::select('id','customername')->get();
        
        return Inertia::render('Managements/Create',[
            'items' => $items,
            'customers' => $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManagementRequest $request)
    {
        Prodact::create([
            'item_id' => $request->item_id,
            'customer_id' => $request->customer_id,
            'order_by' => $request->order_by,
            'deadline' => $request->deadline,
            'manager' => $request->manager,
            'memo'    => $request->memo,
            ]);

    return to_route('managements.index')
        ->with([
            'message' => '登録しました。',
            'status' => 'success'
              ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $management)
    {
        return Inertia::render('Managements/Show',['prodact' => $management]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $management)
    {
        return Inertia::render('Managements/Edit',
        [
            'prodact' => $management,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Modelsでprodactsテーブルに接続するようにしてるから繋がる
    public function update(UpdateManagementRequest $request, Management $management)
    {
        $management->order_by = $request->order_by;
        $management->deadline = $request->deadline;
        $management->manager = $request->manager;
        $management->is_selling = $request->is_selling;
        $management->memo = $request->memo;
        $management->save();

        return to_route('managements.index')
     ->with([
            'message' => '更新しました。',
            'status' => 'success'
           ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Management $management)
    {
        $management->delete();

        return to_route('managements.index')
    ->with([
            'message' => '削除しました。',
            'status' => 'denger'
          ]);
    }
}
