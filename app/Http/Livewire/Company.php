<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Company extends Component
{


    public $currentStep = 1;
    public $name, $amount, $description, $status = 1, $stock;
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

        $this->currentStep = 2;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function step2()
    {
        $validatedData = $this->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function step3()
    {
        $validatedData = $this->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);

        $this->currentStep = 4;
    }
    public function step4()
    {
        $validatedData = $this->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);

        $this->currentStep = 5;
    }
    public function step5()
    {
        $validatedData = $this->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);

        $this->currentStep = 6;
    }













     /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        Company::create([
            'name' => $this->name,
            'amount' => $this->amount,
            'description' => $this->description,
            'stock' => $this->stock,
            'status' => $this->status,
        ]);

        $this->successMessage = 'Product Created Successfully.';

        $this->clearForm();

        $this->currentStep = 1;
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
        $this->amount = '';
        $this->description = '';
        $this->stock = '';
        $this->status = 1;
    }

}
