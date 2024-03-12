<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $drug_model = new Drug();
        $drugs = $drug_model->drugList();

        return view('drug.drug', ["bladeDrugs" => $drugs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('drug.drug_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["drug_name" => "required", "drug_amt" => "required|numeric|min:0", "drug_amt_unit" => "required", "drug_stock" => "required|numeric|min:0", "drug_price" => "required|numeric|min:0"]);

        $drug_model = new Drug();
        $drug_model->addDrug($request->all());

        Log::info("A new drug, $request->drug_name, is added", ["drug name" => $request->drug_name]);
        return redirect('/drug');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $drug_model = new Drug();
        $drug = $drug_model->findDrug($id);
        return view('drug.drug_edit', ["drug" => $drug]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $drug_model = new Drug();
        $drug_model->deleteDrug($id);

        return redirect('/drug');
    }
}
