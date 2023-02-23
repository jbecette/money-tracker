<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionType;
use App\Models\Account;
use App\Models\Transaction;
use App\Http\Requests\AccountAddRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Requests\TransactionAddRequest;
use Illuminate\Support\Facades\DB;

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

    public function transactions($id = null){
        
        $user_id = auth()->user()->id;
        
        // User's accounts for selector
        $accounts = Account::where('id_user', '=', $user_id)->get();
        
        // If an account has been received, get all transactions and balance
        if ($id != null) {
            
            // Transactions
            $transactions = DB::table('transactions')
                            -> select('transactions.id', 
                                      'transaction_types.description AS transaction_type',
                                      'transactions.amount',
                                      'transactions.comments',
                                      'transaction_types.bookkeeping',
                                      'transactions.created_at',
                                      'transactions.updated_at')
                            -> leftJoin('transaction_types','transaction_types.id','=','transactions.id_transaction_type')
                            -> leftJoin('accounts','accounts.id','=','transactions.id_account')
                            -> where([
                                     ['transactions.id_account', '=', $id],
                                     ['accounts.id_user', '=', $user_id] // Users can only see their own accounts transactions
                                     ])
                            -> orderByDesc('transactions.created_at')
                            -> paginate(8);

            // Balance
            $account_balance = DB::table('transactions')
                               -> select(DB::raw('SUM(amount) as balance'))
                               -> leftJoin('transaction_types','transaction_types.id','=','transactions.id_transaction_type')
                               -> leftJoin('accounts','accounts.id','=','transactions.id_account')
                               -> where([
                                        ['transactions.id_account', '=', $id],
                                        ['accounts.id_user', '=', $user_id] // Users can only see their own accounts transactions
                                        ])
                               -> get();

            return view('transactions',compact('accounts','transactions','account_balance'));
            
        } else {

            // No account in particular has been received, we just pass the user's accounts
            return view('transactions',compact('accounts'));

        }
        
    }

    public function transactionsNew(){

        $user_id = auth()->user()->id;
        
        // User's accounts for selector
        $accounts = Account::where('id_user', '=', $user_id)->get();
        
        $transaction_types = TransactionType::get();
        
        return view('transactions_new',compact('transaction_types','accounts'));
    }

    public function transactionsNewInsert(TransactionAddRequest $request){

        $id_account = request('id_account');

        Transaction::create($request->validated());

        return redirect(route('transactions',$id_account));

    }

    public function transactionDelete($id) {

        $transaction_delete = Transaction::findOrFail($id);
        $id_account = $transaction_delete->id_account;
        
        $transaction_delete->delete();
        
        return redirect(route('transactions',$id_account));

    }

    public function transactionsUpdateView($id) {
        $user_id = auth()->user()->id;

        // Get and pass to the view the user's accounts, transaction types and transaction to update
        $accounts = Account::where('id_user', '=', $user_id)
                            -> orderByDesc('description')
                            -> get();

        $transaction_types = TransactionType::get();
                            
        $transaction = DB::table('transactions')
                       -> select('transactions.id',
                                 'transactions.id_account',
                                 'transactions.id_transaction_type',
                                 'transaction_types.bookkeeping',
                                 'transaction_types.description AS transaction_type_description',
                                 'transactions.amount',
                                 'transactions.comments',
                                 'transactions.created_at',
                                 'transactions.updated_at')
                       -> leftJoin('transaction_types','transaction_types.id','=','transactions.id_transaction_type')          
                       -> where([
                                    ['transactions.id', '=', $id]
                                ])
                       ->first();

        $formatted_amount = "$".' '.number_format(ABS($transaction->amount),2);

        return view('transaction_update_form',compact('accounts','transaction_types','transaction','formatted_amount'));
        
    }

}
