@extends('adminlte::page')

@section('title','Money Tracker | Transactions')

@section('content_header')
<h1>Transactions</h1>
@endsection
    {{-- Debug --}}
    {{-- @php
        dd($transactions);
    @endphp --}}

    {{-- @php
        dd($account_balance);
    @endphp --}}

    {{-- <p>Id del usuario: {{auth()->user()->id;}}</p> --}}
    
    {{-- @foreach ($accounts as $object)
        {{ $object->name }}
        <br>
    @endforeach --}}

    {{-- Id de la cuenta: {{ request()->id }} --}}

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <label>Account</label>
                        <select class="custom-select rounded-0 ml-2" onchange="window.location.href=this.options[this.selectedIndex].value;">
                            <option value=""><i> - Please choose an account -</i></option>
                            @foreach ($accounts as $item)
                            <option value="{{route('transactions',$item->id)}}" 
                                    @if (request()->id == $item->id) selected
                                    @endif
                                    >{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5 d-flex align-items-end justify-content-start ">
                        <h5>Balance:&nbsp; </h5>
                        @if (isset($account_balance))
                            <h5 class='
                                @if ($account_balance[0]->balance < 0)
                                    text-danger'> - $
                                @else
                                    text-success'> $
                                @endif

                                {{ number_format(ABS($account_balance[0]->balance), 2); }}
                            </h5>
                        @else
                            <h5>-</h5>
                        @endif
                    </div>
                    <div class="col-md-3 d-flex align-items-end justify-content-end">
                        <a href="{{ route('transactions_new') }}">
                            <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add New</button>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-0">
                <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th class="text-left">Transaction Type</th>
                        <th class="text-right">Amount</th>
                        <th class="text-left">Comments</th>
                        <th class="text-left">Created</th>
                        <th class="text-left">Updated</th>
                        <th class='text-center' colspan='2'>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @if(isset($transactions))
                        @foreach ($transactions as $transaction)
                        <tr>
                                <td>
                                    {{ $transaction->id }}
                                </td>
                                <td>
                                    {{ $transaction->transaction_type }}
                                </td>
                                <td class="text-right">
                                    <span class='
                                        @if ($transaction->bookkeeping == 'expense')
                                            text-danger'> - $
                                        @else
                                            text-success'> + $
                                        @endif

                                        {{ number_format(ABS($transaction->amount), 2); }}
                                     </span>
                                </td>
                                <td class="text-left">
                                    {{ $transaction->comments }}
                                </td>
                                <td>
                                    {{ $transaction->created_at }}
                                </td>
                                <td>
                                    @if ($transaction->updated_at == '')
                                        -
                                    @else
                                        {{ $transaction->updated_at }}
                                    @endif
                                </td>
                                <td class='text-center'>
                                    <a href="{{route('transactions_update_form', $transaction->id)}}">
                                        <button type="submit" class="btn btn-primary float-right">Edit</button>
                                    </a>
                                </td>
                                <td class='text-center'>
                                    <form action="{{ route('transaction_delete', $transaction->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-primary float-left">Delete
                                        </button>
                                    </form>
    
                                </td>
                            </tr>
                            
                        @endforeach
                    @endif

                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                @if (isset($transactions))
                {{ $transactions->links() }}
                @endif
            </div>
        <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
@endsection