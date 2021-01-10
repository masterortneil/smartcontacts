<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Mail\CustomerCreated;
use App\Models\Customer;
use App\Models\Interest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with(['interests', 'language'])->get();
        return view('dashboard', compact('customers'));
    }

    public function edit(Customer $customer)
    {
        $languages = Language::all();
        $interests = Interest::all();

        return view('customer', compact('languages', 'interests', 'customer'));
    }

    public function create()
    {
        $languages = Language::all();
        $interests = Interest::all();

        return view('customer', compact('languages', 'interests'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back()->with(['status' => 'Customer Deleted']);
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'dob' => $request->dob,
                'id_number' => $request->id_number,
                'mobile_number' => $request->mobile_number,
                'language_id' => $request->language_id,
            ]
        );

        $message = "Customer Updated";
        if (! $request->id)
        {
            $message = "Customer Created";
            Mail::to($customer->email)->send(new CustomerCreated($customer));
        }



        $customer->interests()->sync($request->interests);

        return redirect()->route('customer.index')->with(['status' => $message]);
    }
}
