<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionType;

class PagesController extends Controller
{
    public function dashboard(){
 
        return view('dashboard');
 
    }

    public function transactionTypes(){
 
        $transaction_types = TransactionType::all();
        return view('transaction-types',compact('transaction_types'));
 
    }

    public function transactionTypesAdd(){
 
        // $transaction_types = TransactionType::all();
        // return view('transaction-types',compact('transaction_types'));
        return "Add New transaction type";

    }

    /* ... */
}
