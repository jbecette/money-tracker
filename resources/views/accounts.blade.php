@extends('adminlte::page')

@section('title','Money Tracker | Accounts')

@section('content_header')
<h1>Accounts</h1>
@endsection

@section('content')
    <?php 
        // dump($transaction_types); 
    ?>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('accounts_new') }}">
                    <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add New</button>
                </a>
            </div>
            <div class="card-body p-0">
                <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Creation Date</th>
                        <th class='w-25'>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($accounts as $item)
                        <tr>
                            <td>
                                {{$item->name}}
                            </td>
                            
                            <td>
                                {{$item->description}}
                            </td>
                            <td>
                                {{$item->created_at}}
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-primary">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $accounts->links() }}            
            </div>
        <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
@endsection