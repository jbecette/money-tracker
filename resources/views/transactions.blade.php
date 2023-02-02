@extends('adminlte::page')

@section('title','Money Tracker | Transactions')

@section('content_header')
<h1>Transactions</h1>
    {{-- <p>Id del usuario: {{auth()->user()->id;}}</p> --}}
    
    {{-- @foreach ($accounts as $object)
        {{ $object->name }}
        <br>
    @endforeach --}}

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <label>Account</label>
                        <select class="custom-select rounded-0" id="exampleSelectRounded0">
                            @foreach ($accounts as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5 d-flex align-items-end justify-content-start">
                        <h5>Balance: $ 999,99 </h5>
                    </div>
                    <div class="col-md-3 d-flex align-items-end justify-content-end">
                        <a href="{{ route('accounts_new') }}">
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
                        <th class="text-left">Description</th>
                        <th class="text-left">Amount</th>
                        <th class="text-left">Type</th>
                        <th class="text-left">Created</th>
                        <th class="text-left">Updated</th>
                        <th class='text-center' colspan='2'>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- @foreach ($accounts as $item) --}}
                        <tr>
                            <td class="text-left">
                                {{-- {{$item->name}} --}}
                            </td>
                            
                            <td class="text-left">
                                {{-- {{$item->description}} --}}
                            </td>
                            <td class="text-left">
                                {{-- {{$item->created_at}} --}}
                            </td>
                            <td class='text-center'>
                                {{-- <a href="{{route('accounts_update', $item->id)}}">
                                    <button type="submit" class="btn btn-primary float-right">Edit</button>
                                </a> --}}
                            </td>
                            <td class='text-center'>
                                {{-- <form action="{{ route('accounts_delete', $item->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-primary float-left">Delete
                                    </button>
                                </form> --}}

                            </td>
                        </tr>
                    {{-- @endforeach --}}

                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{-- {{ $accounts->links() }}             --}}
            </div>
        <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>


@endsection

@section('content')
@endsection