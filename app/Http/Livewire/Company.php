<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\City;
use App\Models\CompanyCreate;
use App\Models\Country;
use App\Models\Depot;
use App\Models\Historic;
use App\Models\Pays;
use App\Models\Service;
use App\Models\Unity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Company extends Component
{

    public $currentStep = 1;
    public $name, $activite, $date_creation, $email , $pays , $fullName ,
     $ville, $adresse, $tel, $password ;
    public $successMessage = '';

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {

            $cities = City::orderBy('ville', 'ASC')->get();
            $countries  = Country::get();
        return view('livewire.company')->with('cities', $cities)->with('countries', $countries);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'name'          => 'required|unique:companies',
            'activite'      => 'required',
            'pays'          => 'required',
            'ville'         => 'required',
            'adresse'       => 'required',
            'date_creation' => 'required',
        ]);

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'fullName' => 'required',
            'tel'      => 'required',
            'email'    => 'required|unique:users',
            'password' => 'required',
        ]);

        $this->currentStep = 3;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
      $company =  CompanyCreate::create([
            'name' => $this->name,
            'activite' => $this->activite,
            'date_creation' => $this->date_creation,
            'email' => $this->email,
            'tel' => $this->tel,
            'pays' => $this->pays,
            'ville' => $this->ville,
            'adresse' => $this->adresse,
        ]);

      $user =  User::create([
            'fullName' => $this->fullName,
            'email' => $this->email,
            'tel' => $this->tel,
            'password'   => Hash::make($this->password),
            'company_id' => $company->id,
            'fonction'   => 'administrateur',
            'role_id' => 1,
            'active' => 0,
        ]);

        $serviceId = Service::create(['company_id'  => $company->id, 'name' => 'Rabat siège',]);
        Depot::create(['company_id'    => $company->id, 'name' => 'Depot prinsipale',]);
        Category::create(['company_id' => $company->id, 'name' => 'Plastique',]);
        Unity::create(['company_id'    => $company->id, 'name' => 'kilograme',]);

      $user = User::where('id',$user->id)->first();
                $user->update([
                        'service_id' => $serviceId->id,
                    ]);



        $this->successMessage = 'Product Created Successfully.';

        $this->clearForm();

       // $this->currentStep = 1;

       return redirect(route('home'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->name = '';
        $this->activite = '';
        $this->date_creation = '';
        $this->email = '';
        $this->pays = '';
        $this->ville = '';
        $this->adresse = '';
        $this->tel = '';
        $this->password = '';
        $this->fullName = '';
    }

}
