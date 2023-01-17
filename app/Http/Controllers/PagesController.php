<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionType;
use App\Models\Account;

class PagesController extends Controller
{
    public function dashboard(){
 
        return view('dashboard');
 
    }

    public function transactionTypes(){
 
        $transaction_types = TransactionType::paginate(8);
        return view('transaction-types',compact('transaction_types'));
 
    }

    public function accounts(){
        
        $user_id = auth()->user()->id;
        $accounts = Account::where('id_user', '=', $user_id)->paginate(8);
        return view('accounts',compact('accounts'));
 
    }

    public function accountsNew(){
 
        return view('accounts_new');
        // return "Add New Account";

    }

    public function accountsNewInsert(){

        // return request();
        
        $user_id = auth()->user()->id;
        Account::create([
            'id_user' => $user_id,
            'name' => request('account_name'),
            'description' => request('account_description')
        ]);

        return redirect(route('accounts')); 

    }

    public function transactionTypesAdd(){
 
        // $transaction_types = TransactionType::all();
        // return view('transaction-types',compact('transaction_types'));
        return "Add New transaction type";

    }

    /* ... */
}
