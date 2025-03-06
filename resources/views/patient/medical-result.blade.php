@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-4  border-bottom">Medical Result</h2>
            @foreach ($medicals as $medical)
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                <div>
                    <strong>{{$medical->request_type}}</strong>
                    <div class="text-muted">{{$medical->test_date}}</div>
                </div>
                <a href="{{ route('print.medical-result', ['id' => $medical->id]) }}" class="btn btn-dark btn-sm">
                    Generate PDF
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

