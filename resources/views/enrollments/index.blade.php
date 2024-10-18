@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Enrollments Page</h2>
    </div>

    <div class="card-body">

        <!-- Success Message -->
        @if (session('flash_message'))
            <div class="alert alert-success">
                {{ session('flash_message') }}
            </div>
        @endif

        <a href="{{ url('/Enrollments/create') }}" class="btn btn-success btn-sm" title="Add New Enrollment">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/><br/>

        <!-- Table of Enrollments -->
        @if($enrollments->isEmpty())
            <p>No enrollments found.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Enroll No</th>
                            <th>Batch</th>
                            <th>Student</th>
                            <th>Join Date</th>
                            <th>Fee</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($enrollments as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->enroll_no }}</td>
                            <td>{{ $item->batch->name }}</td>
                            <td>{{ $item->student->name }}</td>
                            <td>{{ $item->join_date }}</td>
                            <td>{{ $item->fee }}</td>

                            <td>
                                <!-- View Enrollment -->
                                <a href="{{ url('/Enrollments/' . $item->id) }}" title="View Enrollment">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                </a>

                                <!-- Edit Enrollment -->
                                <a href="{{ url('/Enrollments/' . $item->id . '/edit') }}" title="Edit Enrollment">
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit" aria-hidden="true"></i> Edit
                                    </button>
                                </a>

                                <!-- Delete Enrollment -->
                                <form method="POST" action="{{ url('/Enrollments/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Enrollment" onclick="return confirm('Confirm delete?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="pagination-wrapper">
                    {{ $enrollments->links('pagination::bootstrap-5') }}
                </div>
            </div>
        @endif

    </div>
</div>

@endsection
