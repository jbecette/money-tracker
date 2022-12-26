@extends('adminlte::page')

@section('title','Money Tracker | Transaction Types')

@section('content_header')
<h1>Transaction Types</h1>
@endsection

@section('content')
    <?php 
        // dump($transaction_types); 
    ?>

    <div class="col-md-12">
        <div class="card">

            <div class="card-body p-0">
                <table class="table">
                <thead>
                    <tr>
                        <th class='w-50'>Description</th>
                        <th class='w-25'>Debit or credit</th>
                        <th class='w-25'>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($transaction_types as $item)
                        <tr>
                            <td>
                                {{$item->description}}
                            </td>
                            <td>
                                @if ($item->bookkeeping == 'debit')
                                    <p class="text-danger">{{ucfirst($item->bookkeeping)}}</p>
                                @elseif ($item->bookkeeping == 'credit')
                                    <p class="text-success">{{ucfirst($item->bookkeeping)}}</p>
                                @endif
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
                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add New</button>
            </div>
        <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
@endsection