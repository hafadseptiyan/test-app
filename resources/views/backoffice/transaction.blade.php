@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Transaction</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            @if(session()->get('success'))
                                <div class="alert alert-success alert-close">
                                    {{ session()->get('success') }}
                                </div><br />
                            @endif
                            <table id="example1" class="table align-items-center" >
                                <thead style="background-color: #0da5c0;color: #fff">
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($transaction as $row)
                                    <tr>
                                        <td>{{$row->transaction_id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->category}}</td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->qty}}</td>
                                        <td>

                                            <a href="{{ route('transactions.edit',$row->transaction_id)}}"><button class="btn btn-icon btn-sm btn-info" type="button">
                                                    <span class="btn-inner--icon"><i class="ni ni-bold-right"></i></span>
                                                    <span class="btn-inner--text">Ubah</span>
                                                </button>
                                            </a>
                                            <form action="{{ route('transactions.destroy', $row->transaction_id)}}" method="post" style="width:82px;margin-top:4%">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="return confirm('Are you sure?')"><button class="btn btn-icon btn-sm btn-danger" type="submit">
                                                        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                                        <span class="btn-inner--text">Delete</span>
                                                    </button></a><br>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
