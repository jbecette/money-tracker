@extends('adminlte::page')

{{-- Tab title --}}
@section('title', 'Transactions')

{{-- Page title --}}
@section('content_header')
<h1>Transactions</h1>
@endsection

<!-- Main content -->
@section('content')
{{-- Debug --}}
    {{-- <pre>
        <?php echo json_encode($transaction, JSON_PRETTY_PRINT); ?>
        <?php echo json_encode($formatted_amount, JSON_PRETTY_PRINT); ?>
    </pre> --}}

    <div class="content">
        <div class="container-fluid">
            <!-- Add Currency form -->
            <div class="row">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Transaction</h3>
                        </div>
                        <!-- /.card-header -->
                        
                        <!-- form start -->
                        <form method="POST" action="{{route('transaction_update', $transaction->id)}}">
                            @csrf @method('PUT')
                            <input name="id_user" type="hidden" value="{{auth()->user()->id;}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for='id_account'>Account</label>
                                    <br>
                                    <select class="custom-select rounded-0 ml-2" style="width: auto; width: 400px;" name='id_account'>
                                        @foreach ($accounts as $item)
                                        <option value="{{$item->id}}" 
                                            @if ($transaction->id_account == $item->id) selected
                                            @endif
                                        >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Transaction Type</label>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="transaction-type-radio" id="transaction-type-radio-income" value="income" onclick="transactionTypeSwitch();"
                                        @if ($transaction->bookkeeping == 'income') checked
                                        @endif>
                                        <label class="form-check-label">Income</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="transaction-type-radio" id="transaction-type-radio-expense" value="expense" onclick="transactionTypeSwitch();"
                                        @if ($transaction->bookkeeping == 'expense') checked
                                        @endif>
                                        <label class="form-check-label">Expense</label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    
                                    {{-- Select for transaction type: income --}}
                                    <select id="income-types-select" class="custom-select rounded-0 ml-2" style="width: auto; width: 250px; display:none;" onchange='transactionTypeSelect();'>
                                        @foreach ($transaction_types as $item)
                                            @if ($item->bookkeeping == "income")
                                                <option value="{{$item->id}}"
                                                    @if ($item->id == $transaction->id_transaction_type) selected @endif
                                                    >{{$item->description}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    
                                    {{-- Select for transaction type: expense --}}
                                    <select id="expense-types-select" class="custom-select rounded-0 ml-2" style="width: auto; width: 250px;" onchange='transactionTypeSelect();'>
                                        @foreach ($transaction_types as $item)
                                            @if ($item->bookkeeping == "expense")
                                                <option value="{{$item->id}}"
                                                    @if ($item->id == $transaction->id_transaction_type) selected @endif
                                                    >{{$item->description}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    <input type="hidden" class="form-control  w-auto numeric" id="id_transaction_type" name="id_transaction_type" placeholder="Transaction Type">
                                </div>
                                <div class="form-group">
                                    <label for="name">Amount</label>
                                    <input type="text" class="form-control  w-auto numeric text-right ml-2" id="amount" name="amount" placeholder="$ 0.00" autofocus="autofocus" maxlength="16" value="{{$formatted_amount}}">
                                </div>
                                <div class="form-group">
                                    <label for="transaction_comments">Comments</label>
                                    <input type="text" class="form-control w-50 ml-2" id="comments" name="comments" placeholder="Comments" value="{{$transaction->comments}}">
                                </div>
                                <div class="form-group">
                                </div>
                                
                                
                            </div>
                            <!-- /.card-body -->
                            
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-left w-auto mr-2" title="Return">Submit</button>
                                <a href="{{ route('transactions') }}">
                                    <button type="button" class="btn btn-primary float-left w-auto" title="Return">Cancel</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->    
            </div>
            
            <!-- Validation -->
            @if ($errors->any())
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible">
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Error</h5>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            
        </div>
    </div>
    @endsection
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    @section('plugins.maskMoney', true)
    
    <script>
        
        function transactionTypeSwitch(){
            
            if (document.getElementById('transaction-type-radio-income').checked) {
                
                document.getElementById('income-types-select').style.display  = "";
                document.getElementById('expense-types-select').style.display  = "none";
                
            } else if (document.getElementById('transaction-type-radio-expense').checked) {
                
                document.getElementById('income-types-select').style.display  = "none";
                document.getElementById('expense-types-select').style.display  = "";
                
            }
            
            transactionTypeSelect();
            
        }
        
        function transactionTypeSelect(){
            
            if (document.getElementById('transaction-type-radio-income').checked) {
                
                document.getElementById('id_transaction_type').value = document.getElementById('income-types-select').value;
                
            } else if (document.getElementById('transaction-type-radio-expense').checked) {
                
                document.getElementById('id_transaction_type').value = document.getElementById('expense-types-select').value;
                
            }
            
        }
        
        $(document).ready(function(){
            
            transactionTypeSelect();
            transactionTypeSwitch();
            $('#amount').maskMoney({thousands:',', decimal:'.', allowZero:true, prefix: '$ '});
            
        });
        
        
        
    </script>