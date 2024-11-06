@extends('layout.app')

@section('content')
<div class="shadow mb-4 w-100 p-3 p-md-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-hover" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-light">
                                        <th>Name</th>
                                        <th>Individual</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Contact #</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr onclick="window.location='{{ route('patient.health-record-history') }}';" style="cursor: pointer;">
                                        <td>China Bea</td>
                                        <td>Student</td>
                                        <td>chinabea@gmail.com</td>
                                        <td>Calamba Laguna</td>
                                        <td>09968537599</td>
                                    </tr>
                                    <!-- Additional rows can go here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
