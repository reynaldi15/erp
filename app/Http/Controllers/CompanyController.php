<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // \Auth::user()->assignRole('writer', 'admin');
        // \Auth::user()->assignRole('Super Admin');
        $companies = Company::all();
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated =$request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:companies',
            'mobile' => 'required',
        ]);

        // dd($validated);
        Company::create($validated);
        return redirect(route('company.index'))->with('alert-success','Created Succesfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validated =$request->validate([
            'name' => 'required|min:4',
            'email' => [
                'required',
                'email',
                Rule::unique('companies')->ignore($company->id),
            ],
            'mobile' => 'required',
        ]);

        // dd($validated);
        $company->update($validated);
        return redirect(route('company.index'))->with('alert-success','Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect(route('company.index'))->with('alert-danger','Delete Succesfully');;
    }
}
