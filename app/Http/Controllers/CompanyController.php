<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\Create\companyRequest;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\Update2CompanyRequest;
use App\Http\Requests\company\UpdateCommCompanyRequest;
use App\Http\Requests\company\UpdateParamCompanyRequest;
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
//update company updateParamCompany
public function updateParamCompany(UpdateParamCompanyRequest $request,Company $company){

    $user = Auth::user()->id;
    $name = 'Update parametre company';

    $company->update([
        'email'       => $request->email,
        'tel'         => $request->tel,
        'tel_mobile'  => $request->tel_mobile,
        'fax'         => $request->fax,
    ]);

Historic::create([
    'name'        => $name,
    'company_id'  => $company->id,
    'user_id'     => $user,
]);
    return redirect()->back();
}

//update company updateCommCompany
public function updateCommCompany(UpdateCommCompanyRequest $request,Company $company){

    $user = Auth::user()->id;
    $name = 'Update commercial company';

    $company->update([
        'ICE'                => $request->ICE,
        'fiscale'            => $request->fiscale,
        'registre_commerce'  => $request->registre_commerce,
        'patent'             => $request->patent,
    ]);

        Historic::create([
            'name'        => $name,
            'company_id'  => $company->id,
            'user_id'     => $user,
        ]);
            return redirect()->back();
}

//update company updateCommCompany
public function updatelogoCompany(Request $request,Company $company){

    $user = Auth::user()->id;
    $name = 'Update logo & web site company';

    $request->validate([
        'logo' => 'nullable',
        'web'  => 'nullable'
      //  'logo' => 'image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($request->hasfile('logo')){
        $file = $request->file('logo');
        $extension = $file->getClientOriginalExtension();
        $filename = md5(time()).'.'.$extension;
        $file->move(public_path().'\images\logo',$filename);
       $company->update([
        'logo'            => $filename,
        'web'             => $request->web,
    ]);
    } else {
        $company->update([
            'web'             => $request->web,
        ]);
        dd($company);
    }

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
