<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\Create\companyRequest;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\Update2CompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Historic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    //update company
    public function updateCompany(Update2CompanyRequest $request,Company $company){

        $user = Auth::user()->id;
        $name = 'Update company';

        $company->update([
            'name'           => $request->name,
            'activite'       => $request->activite,
            'date_creation'  => $request->date_creation,
            'adresse'        => $request->adresse,
            'ville'          => $request->ville,
            'pays'           => $request->pays,
        ]);

    Historic::create([
        'name'        => $name,
        'company_id'  => $company->id,
        'user_id'     => $user,
    ]);
        return redirect()->back();
    }

    public function editCompany(Company $company) {

        $company = Auth::user()->company_id;
        $cities = City::orderBy('ville', 'ASC')->get();
        $countries  = Country::get();

            $company = Company::where('id' , $company)->first();

         return view('company.create' , compact('company'))
         ->with('cities', $cities)
         ->with('countries', $countries);
    }
}
