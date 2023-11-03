<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data['customers'] = Customer::orderBy('id', 'desc')->paginate(5);

        return view('customers.index', $data);
    }


    public function create()
    {
        return view('customers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $company = new Customer;

        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;


        $company->save();


        return redirect()->route('customers.index')
            ->with('success', 'Customer has been created successfully.');
    }


    public function show(Customer $company)
    {
        return view('customers.show', compact('customers'));
    }


    public function edit(Customer $company)
    {
        return view('customers.edit', compact('customers'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $company = Customer::find($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;

        $company->save();

        return redirect()->route('customers.index')
            ->with('success', 'Customer Has Been updated successfully');
    }


    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company has been deleted successfully');
    }
}
