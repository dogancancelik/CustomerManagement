@extends('master')
@section('content')
    <br><br>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Customer List</div>
                    <div>
                        <a class="btn btn-success" href="{{ route('customer.create') }}" style="float:right; margin-right:10px;margin-top:10px;">Add Customer</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-inverse">
                            <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Year of Birth</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($customers) >0)
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $customer['identification_number'] }}</td>
                                            <td>{{ $customer['name'] }}</td>
                                            <td>{{ $customer['last_name'] }}</td>
                                            <td>{{ $customer['year_of_birth'] }}</td>
                                            <td>{{ $customer['company'] }}</td>
                                            <td>
                                                <a href="{{ route('customer.edit',$customer['id']) }}" class="btn btn-info" style="color:#fff">Edit</a>
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('customer.destroy',$customer['id']) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th colspan="7">No records found</th>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

