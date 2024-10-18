@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Batches Page</h2>
    </div>

    <div class="card-body">

        <!-- Success Message -->
        @if (session('flash_message'))
            <div class="alert alert-success">
                {{ session('flash_message') }}
            </div>
        @endif

        <a href="{{ url('/Batches/create') }}" class="btn btn-success btn-sm" title="Add New Batch">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/><br/>

        <!-- Table of Batches -->
        @if($batches->isEmpty())
            <p>No batches found.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Batch Name</th>
                            <th>Course Name</th>
                            <th>Start Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($batches as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->course->name }}</td>
                            <td>{{ $item->start_date }}</td>

                            <td>
                                <!-- View Batch -->
                                <a href="{{ url('/Batches/' . $item->id) }}" title="View Batch">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                </a>

                                <!-- Edit Batch -->
                                <a href="{{ url('/Batches/' . $item->id . '/edit') }}" title="Edit Batch">
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit" aria-hidden="true"></i> Edit
                                    </button>
                                </a>

                                <!-- Delete Batch -->
                                <form method="POST" action="{{ url('/Batches/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Batch" onclick="return confirm(&quot;Confirm delete?&quot;)">
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
                    {{ $batches->links('pagination::bootstrap-5') }}
                </div>
            </div>
        @endif

    </div>
</div>

@endsection
