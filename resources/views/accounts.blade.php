@extends('adminlte::page')

@section('title','Money Tracker | Accounts')

@section('content_header')
<h1>Accounts</h1>
@endsection

@section('content')
    {{-- @foreach ($accounts as $object)
        {{ $object->name }}
        <br>
    @endforeach --}}

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
                        <th class="text-left">Name</th>
                        <th class="text-left">Description</th>
                        <th class="text-left">Created</th>
                        <th class="text-left">Updated</th>
                        <th class='text-center w-25' colspan='2'>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($accounts as $item)
                        <tr>
                            <td class="text-left">
                                {{$item->name}}
                            </td>
                            
                            <td class="text-left">
                                {{$item->description}}
                            </td>
                            <td class="text-left">
                                {{$item->created_at}}
                            </td>
                            <td class="text-left">
                                {{$item->updated_at}}
                            </td>
                            <td class='text-center'>
                                <a href="{{route('accounts_update_form', $item->id)}}">
                                    <button type="submit" class="btn btn-primary float-right">Edit</button>
                                </a>
                            </td>
                            <td class='text-center'>
                                <form action="{{ route('accounts_delete', $item->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-primary float-left">Delete
                                    </button>
                                </form>

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