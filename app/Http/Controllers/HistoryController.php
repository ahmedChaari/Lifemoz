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

    public function show($id){
        $user = Historic::find($id)
                ->with('users')
                ->first();
        return view('history.show', compact('history', 'users'));
    }
}
