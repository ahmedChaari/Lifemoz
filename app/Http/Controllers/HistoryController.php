<?php

namespace App\Http\Controllers;

use App\Models\Historic;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function listHistories(){

        $histories = Historic::paginate(10);
        return view('history.list' , compact('histories'));

    }
}
