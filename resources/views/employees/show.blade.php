@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employees - View ({{ $employee->firstname }})</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>First name</label>
                                    <input class="form-control" disabled value="{{ $employee->firstname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Last name</label>
                                    <input class="form-control" disabled value="{{ $employee->lastname }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Email</label>
                                    <input class="form-control" disabled value="{{ $employee->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Phone</label>
                                    <input class="form-control" disabled value="{{ $employee->phonenumber }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-group-default">
                                    <label>Company</label>
                                    <input class="form-control" disabled value="{{ $employee->company->name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
