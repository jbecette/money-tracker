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
{{-- <?php dump(get_defined_vars()); ?> --}}

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
                    {{-- <form method="POST" action="{{route('accounts_new_insert')}}"> --}}
                        {{-- @csrf --}}
                        <input name="id_user" type="hidden" value="{{auth()->user()->id;}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="radio1">Transaction Type</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1">
                                <label class="form-check-label">Income</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" checked="">
                                <label class="form-check-label">Expense</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Amount</label>
                                <input type="text" class="form-control  w-auto numeric" id="name" name="name" placeholder="Amount"  autofocus="autofocus">
                            </div>
                            <div class="form-group">
                                <label for="transaction_comments">Comments</label>
                                <input type="text" class="form-control w-50" id="transaction_comments" name="transaction_comments" placeholder="Comments">
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
                    {{-- </form> --}}
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