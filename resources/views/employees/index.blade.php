@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">
                    <div class="text-right mb-4">
                        <a class="btn btn-success" href="{{ route('employees.create') }}">Create new employee</a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">Employees list</div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($employees as $employee)
                                        <tr>
                                            <td class="text-center">{{ $employee->id }}</td>
                                            <td>{{ $employee->firstname }}</td>
                                            <td>{{ $employee->lastname }}</td>
                                            <td>{{ $employee->company->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phonenumber }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info btn-sm" href="{{ route('employees.show', $employee->id) }}">View</a>
                                                <a class="btn btn-secondary btn-sm" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                                <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type='submit' class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Oops! Nothing to show.</td>
                                        </tr>
                                    @endforelse
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item {{ $employees->previousPageUrl() ? '' : 'disabled' }}">
                                                <a class="page-link" href="{{ $employees->previousPageUrl() }}">Previous</a>
                                            </li>

                                            @if ($employees->currentPage() > 1)
                                                <li class="page-item"><a class="page-link" href="{{ $employees->url(1) }}">1</a></li>
                                                @if ($employees->currentPage() > 2)
                                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                                @endif
                                            @endif

                                            <li class="page-item active"><span class="page-link">{{ $employees->currentPage() }}</span></li>

                                            @if ($employees->currentPage() < $employees->lastPage())
                                                @if ($employees->currentPage() < $employees->lastPage() - 1)
                                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                                @endif
                                                <li class="page-item"><a class="page-link" href="{{ $employees->url($employees->lastPage()) }}">{{ $employees->lastPage() }}</a></li>
                                            @endif

                                            <li class="page-item {{ $employees->nextPageUrl() ? '' : 'disabled' }}">
                                                <a class="page-link" href="{{ $employees->nextPageUrl() }}">Next</a>
                                            </li>
                                        </ul>
                                    </nav>



                                </tbody>
                            </table>

                            <div class="float-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
