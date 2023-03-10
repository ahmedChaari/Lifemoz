<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\Create\companyRequest;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Requests\Company\Update2CompanyRequest;
use App\Models\Company;
use App\Models\Historic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function createCompany(CreateCompanyRequest $request){
        $user = Auth::user()->id;
        $name = 'Create company';

        $company = Company::create([
            'name'          => $request->name,
            'activite'      => $request->activite,
            'date_creation' => $request->date_creation,
            'gerant'        => $request->gerant,
            'email'         => $request->email,
            'ville'         => $request->ville,
            'pays'          => $request->pays,
            'adresse'       => $request->adresse,
            'tel'           => $request->tel,
            'tel_mobile'    => $request->tel_mobile,
            'fax'           => $request->fax,
            'registre_commerce'=> $request->registre_commerce,
            'fiscale'       => $request->fiscale,
            'ICE'           => $request->ICE,
            'patent'        => $request->patent,
            'web'           => $request->web,
            //'logo'        => $request->logo,
        ]);
        dd($company);

        $user = User::find($user)->first();
       // $user->update([
         //   'company_id'     => $company->id,
      //  ]);
            Historic::create([
                'name'        => $name,
                'company_id'  => $company->id,
                'user_id'     => $user->id,
            ]);
       // return  view('company.create2');
        return  redirect(route('user.list'));
    }
    //update company
    public function updateCompany(Update2CompanyRequest $request,Company $company){

        $user = Auth::user()->id;
        $name = 'Update company';

        $company->update([
            'gerant'     => $request->gerant,
            'adresse'    => $request->adresse,
            'ville'      => $request->ville,
            'paye'       => $request->paye,
        ]);

    Historic::create([
        'name'        => $name,
        'company_id'  => $company->id,
        'user_id'     => $user,
    ]);
    return  view('company.create3');
    }


    public function step1(){

        return view('company.step1');
    }






    public function create()
    {
        return view('company.create');
    }
}
