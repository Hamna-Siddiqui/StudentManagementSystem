@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Students Page</h2>
    </div>

    <div class="card-body">

        <!-- Success Message -->
        @if (session('flash_message'))
            <div class="alert alert-success">
                {{ session('flash_message') }}
            </div>
        @endif

        <a href="{{ url('/Students/create') }}" class="btn btn-success btn-sm" title="Add New Student">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/><br/>

        <!-- Table of Students -->
        @if($students->isEmpty())
            <p>No students found.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>E_mail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->mobile }}</td>
                            <td>{{ $item->e_mail }}</td>

                            <td>
                                <!-- View Student -->
                                <a href="{{ url('/Students/' . $item->id) }}" title="View Student">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                </a>

                                <!-- Edit Student -->
                                <a href="{{ url('/Students/' . $item->id . '/edit') }}" title="Edit Student">
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit" aria-hidden="true"></i> Edit
                                    </button>
                                </a>

                                <!-- Delete Student -->
                                <form method="POST" action="{{ url('/Students' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)">
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
                    <!-- {{ $students->links() }}
                    $posts->links('pagination::bootstrap-4') -->
                    {{ $students->links('pagination::bootstrap-5') }}

                </div>
            </div>
        @endif

    </div>
</div>

@endsection
