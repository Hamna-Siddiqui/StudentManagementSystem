@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Payments Page</h2>
    </div>

    <div class="card-body">

        <!-- Success Message -->
        @if (session('flash_message'))
            <div class="alert alert-success">
                {{ session('flash_message') }}
            </div>
        @endif

        <!-- Add New Payment Button -->
        <a href="{{ url('/Payments/create') }}" class="btn btn-success btn-sm" title="Add New Payment">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br/><br/>

        <!-- Table of Payments -->
        @if($payments->isEmpty())
            <p>No payments found.</p>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Enrollment No</th>
                            <th>Paid Date</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($item->enrollment)
                                    {{ $item->enrollment->enroll_no }}
                                @else
                                    <span class="text-danger">Enrollment not found</span>
                                @endif
                            </td>
                            <td>{{ $item->paid_date }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>

                                <!-- View Payment -->
                                <a href="{{ url('/Payments/' . $item->id) }}" title="View Payment">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                </a>

                                <!-- Edit Payment -->
                                <a href="{{ url('/Payments/' . $item->id . '/edit') }}" title="Edit Payment">
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit" aria-hidden="true"></i> Edit
                                    </button>
                                </a>

                                <!-- Delete Payment -->
                                <form method="POST" action="{{ url('/Payments/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment" onclick="return confirm('Confirm delete?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </form>

                                <!-- Print Payment -->
                                <a href="{{ url('/report/report1/' . $item->id) }}" title="Print Payment">
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa fa-print" aria-hidden="true"></i> Print
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="pagination-wrapper">
                    {{ $payments->links('pagination::bootstrap-5') }}
                </div>
            </div>
        @endif

    </div>
</div>

@endsection
