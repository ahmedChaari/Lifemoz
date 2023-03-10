<?php

namespace App\Http\Livewire;

use App\Models\Historic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Company extends Component
{


    public $step = 1;
    public $is_finished = false;
    public $name, $activite,
     $date_creation, $gerant , $ville, $pays ,$adresse,$email, $tel ,
     $tel_mobile,$fax ,$ICE ,$fiscale ,$registre_commerce,$patent,$web,
     $logo,$has_activated;
    public $successMessage = '';
    

    public function render()
    {
        return view('livewire.company');
    }


      /**
     * Write code on Method
     *
     * @return response()
     */
    public function step1()
    {
        $validatedData = $this->validate([
            'name'          => 'required',
            'activite'      => 'required',
            'date_creation' => 'required|date',
        ]);

        $this->step++;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function step2()
    {
        $validatedData = $this->validate([
            'email'   => 'required',
            'ville'   => 'required',
            'pays'    => 'required',
            'adresse' => 'required',
        ]);

        $this->step++;
    }

    public function step3()
    {
        $validatedData = $this->validate([
            'tel' => 'required',
            'tel_mobile' => 'required',
            'fax' => 'required',
        ]);

        $this->step++;
    }
    public function step4()
    {
        $validatedData = $this->validate([

            'fiscale' => 'required',
            'registre_commerce' => 'required',
            'patent' => 'required',
        ]);

        $this->step++;
    }
    public function step5()
    {
        $validatedData = $this->validate([
            'web' => 'required',
            // 'logo' => 'required',
        ]);
        $this->storeCompany();

        $this->step++;
        $this->is_finished = true;
    }

    public function stepBack() {
        $this->step--;
    }



    public function createCompany(){
      
        $name = 'Create company';

        $company = Company::create([
            'name'          => $this->name,
            'activite'      => $this->activite,
            'date_creation' => $this->date_creation,
            'gerant'        => $this->gerant,
            'email'         => $this->email,
            'ville'         => $this->ville,
            'pays'          => $this->pays,
            'adresse'       => $this->adresse,
            'tel'           => $this->tel,
            'tel_mobile'    => $this->tel_mobile,
            'fax'           => $this->fax,
            'registre_commerce'=> $this->registre_commerce,
            'fiscale'       => $this->fiscale,
            'ICE'           => $this->ICE,
            'patent'        => $this->patent,
            'web'           => $this->web,
            //'logo'        => $request->logo,
        ]);
        
      
       // $user->update([
         //   'company_id'     => $company->id,
      //  ]);
            // Historic::create([
            //     'name'        => $name,
            //     'company_id'  => $company->id,
               
            // ]);
       // return  view('company.create2');
       return view('auth.login');
    }










    //  /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function submitForm()
    // {
    //     Company::create([
    //         'name' => $this->name,
    //         'amount' => $this->amount,
    //         'description' => $this->description,
    //         'stock' => $this->stock,
    //         'status' => $this->status,
    //     ]);

    //     $this->successMessage = 'Product Created Successfully.';

    //     $this->clearForm();

    //     $this->currentStep = 1;
    // }

    //     /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function back($step)
    // {
    //     $this->currentStep = $step;
    // }


    //  /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */
    // public function clearForm()
    // {
    //     $this->name = '';
    //     $this->amount = '';
    //     $this->description = '';
    //     $this->stock = '';
    //     $this->status = 1;
    // }

}
