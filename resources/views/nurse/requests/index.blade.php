@extends('layout.app')

@section('content')

<div class="shadow mb-4 w-full p-5">
    <div class="card-header">
        <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <h1 class="display-6 fw-bolder text-uppercase">Requests</h1>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $requests->count() }}</div>

                </div>
                <div class="col-auto">
                    <i class="fas fa-solid fa-user-gear fa-4x text-gray-500 pr-3"></i>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table  px-1">
                <table class="table table-striped table-hover" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-secondary">
                            <!-- <th>Patient ID</th> -->
                            <th>Name</th>
                            <th>Reason</th>
                            <th>Preffered Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                            <tr style="cursor: pointer;">
                                <td>{{ $request->patient->firstname }} {{ $request->patient->lastname }}</td>
                                <td>{{ $request->notes }}</td>
                                <td>{{ $request->preferred_date }}</td>
                                <td class="text-middle">
                                <form class="mb-3">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-success btn-sm" data-target="#approveModal{{ $request->id }}">
                                            <span class="icon text-light">
                                                Approved
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4z"/></svg>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $request->id }}">
                                            <span class="icon text-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m5 19l7-7m0 0l7-7m-7 7L5 5m7 7l7 7"/></svg>
                                            </span>
                                        </button>
                                    </div>

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
@include('admin.requests.ConfirmationApproveModal')
@include('admin.requests.ConfirmationDeleteModal')
@endsection
