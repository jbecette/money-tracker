<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionType;
use App\Models\Account;
use App\Http\Requests\AccountAddRequest;
use App\Http\Requests\AccountUpdateRequest;

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

    }

    public function accountsNewInsert(AccountAddRequest $request){

        Account::create($request->validated());
        return redirect(route('accounts')); 

    }

    public function accountsUpdateView($id){
 
        $account = Account::findOrFail($id);
        return view('account_update_form',compact('account'));
 
    }

    public function accountUpdate(AccountUpdateRequest $account, $id){
        
        // echo $id."<br>";
        // echo $account->id_user."<br>";
        // echo $account->name."<br>";
        // echo $account->description."<br>";

        $account_update = Account::findOrFail($id);
        $account_update->name = $account->name;
        $account_update->description = $account->description;
        $account_update->save();

        return redirect(route('accounts')); 
 
    }

    public function accountDelete($id) {

        $account_delete = Account::findOrFail($id);
        $account_delete->delete();
        
        return redirect(route('accounts')); 
        
    }

    public function transactions(){
        
        $user_id = auth()->user()->id;
        $accounts = Account::where('id_user', '=', $user_id)->get();
        return view('transactions',compact('accounts'));
 
    }



}
