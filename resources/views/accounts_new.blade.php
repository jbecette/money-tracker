@extends('adminlte::page')

{{-- Tab title --}}
@section('title', 'Accounts')

{{-- Page title --}}
@section('content_header')
<h1>Accounts</h1>
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
                        <h3 class="card-title">Add Account</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="POST" action="{{route('accounts_new_insert')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="account_name">Account Name</label>
                                <input type="text" class="form-control  w-auto" id="account_name" name="account_name" placeholder="Account Name"  autofocus="autofocus">
                            </div>
                            <div class="form-group">
                                <label for="account_description">Description</label>
                                <input type="text" class="form-control w-50" id="account_description" name="account_description" placeholder="Description">
                            </div>
                            
                        </div>
                        <!-- /.card-body -->
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-left w-auto mr-2" title="Return">Submit</button>
                            <a href="{{ route('accounts') }}">
                                <button type="button" class="btn btn-primary float-left w-auto" title="Return">Cancel</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->    
        </div>
        
        <!-- Validation -->
        {{-- @if ($errors->any())
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
        @endif --}}

    </div>
</div>
@endsection