<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManagementRequest;
use App\Http\Requests\UpdateManagementRequest;
use App\Models\Management;
use App\Models\Prodact;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prodacts = Prodact::searchProdacts($request->search)
        ->select('id','name','order_by','deadline','is_selling')
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
        return Inertia::render('Managements/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManagementRequest $request)
    {
        Prodact::create([
            'name' => $request->name,
            'customer' => $request->customer,
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
    public function show($id)
    {
        $data = Prodact::where('id',$id)->first();

        return Inertia::render('Managements/Show',['prodact' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Prodact::where('id',$id)->first();

        return Inertia::render('Managements/edit',['prodact' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Modelsでprodactsテーブルに接続するようにしてるから繋がる
    public function update(UpdateManagementRequest $request, Management $management)
    {
        $management->name = $request->name;
        $management->customer = $request->customer;
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
