@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-4">Medical Result</h2>
            
            <div class="d-flex justify-content-between align-items-center border-bottom">
                <div>
                    <strong>REONTOLOGY</strong>
                    <div class="text-muted">x-ray</div>
                </div>
                <button class="btn btn-dark btn-sm">View</button>
            </div>
            
            <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                <div>
                    <strong>HEMATOLOGY</strong>
                    <div class="text-muted">blood</div>
                </div>
                <button class="btn btn-dark btn-sm">View</button>
            </div>
            
            <div class="d-flex justify-content-between align-items-center py-3">
                <div>
                    <strong>URINALYSIS</strong>
                    <div class="text-muted">urine</div>
                </div>
                <button class="btn btn-dark btn-sm">View</button>
            </div>

            <div class="text-start mt-4">
                <button class="btn btn-dark">Print Medical</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



@endsection

