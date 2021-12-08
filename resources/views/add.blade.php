@extends('master')
@section('content')
    <br><br>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card">

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        <div class="card-header">Add Customer</div>
                        <div class="card-body">
                            <form id="itemFrom" role="form" method="POST" action="{{ route('customer.store') }}">
                                @csrf

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="type">Company</label>
                                        <select class="form-control" name="company_id" id="">
                                            @if($companies)
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Name</label>
                                        <input class="form-control" type="text" name="name" value="{{old('name', '')}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Last Name</label>
                                        <input class="form-control" type="text" name="last_name" value="{{old('last_name', '')}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Identification Number</label>
                                        <input class="form-control" type="text" name="identification_number" minlength="11" maxlength="11" value="{{old('identification_number', '')}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Year of Birth</label>
                                        <input class="form-control" type="text" name="year_of_birth" minlength="4" maxlength="4"  value="{{old('year_of_birth', '')}}" required>
                                    </div>

                                    <button type="submit" class="btn btn-success float-right">
                                        <i class="fas fa-plus-circle"></i>
                                        <span> Add Customer </span>
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

