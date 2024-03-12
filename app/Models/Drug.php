<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Drug extends Model
{
    use HasFactory;

    /**
     * To return list of drugs,
     * used in dashboard
     */
    public function drugListDashboard()
    {
        // Eloquent
        return Drug::where('del_flg', 0)->orderByDesc('created_at')->limit(4)->get();

        // Query Builder
        // return DB::table('drugs')->where('del_flg', 0)->orderByDesc('created_at')->limit(4)->get();
    }

    /**
     * Returns the full list of drugs,
     */
    public function drugList()
    {
        return Drug::where('del_flg', 0)->paginate('10');
    }

    /**
     * Logically deletes a drug from the database
     */
    public function deleteDrug($id)
    {
        return Drug::where('id', $id)->update(["del_flg" => 1]);
    }

    /**
     * Returns the number of drugs
     * used in the sidebar, (in middleware)
     */
    public static function numOfDrug()
    {
        return self::where('del_flg', 0)->count();
    }

    /**
     * Adding a new drug
     */
    public function addDrug($dataToBeAdded)
    {
        // Query Builder
        // DB::table('drugs')->insert(["drug_name" => $dataToBeAdded["drug_name"], "drug_price" => $dataToBeAdded["drug_price"]]);

        // Eloquent ORM
        $drug = new Drug();
        $drug->drug_name = $dataToBeAdded["drug_name"];
        $drug->drug_price = $dataToBeAdded["drug_price"];
        $drug->drug_amt = $dataToBeAdded["drug_amt"];
        $drug->drug_amt_unit = $dataToBeAdded["drug_amt_unit"];
        $drug->drug_stock = $dataToBeAdded["drug_stock"];
        $drug->drug_price = $dataToBeAdded["drug_price"];
        $drug->save();
    }

    /**
     * return the specific drug
     * used for the edit page
     */
    public function findDrug($id)
    {
        return Drug::find($id);
    }
}
