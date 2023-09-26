<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::searchCustomers($request->search)
        ->select('id','customername','tel','postcode','address')
        ->paginate(20);

        return Inertia::render('Customers/Index',[
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Customers/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create([
            'customername' => $request->customername,
            'tel' => $request->tel,
            'postcode' => $request->postcode,
            'address' => $request->address,
            ]);

        return to_route('customers.index')
            ->with([
                'message' => '登録しました。',
                'status' => 'success'
                  ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return Inertia::render('Customers/Show',['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return Inertia::render('Customers/Edit',['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->customername = $request->customername;
        $customer->tel = $request->tel;
        $customer->postcode = $request->postcode;
        $customer->address = $request->address;
        $customer->save();

        return to_route('customers.index')
    ->with([
        'message' => '更新しました。',
        'status' => 'success'
          ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return to_route('customers.index')
    ->with([
            'message' => '削除しました。',
            'status' => 'denger'
          ]);
    }
}
