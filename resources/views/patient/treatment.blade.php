@extends('layout.app')

@section('content')
<div class="shadow mb-4 w-full p-5">
    <div class="container">
        <div class="card">
            <h2>Treatment Details</h2>
            <div class="card-body">
                    <strong>Interpretation Comments</strong>
                    <p>{{ $treatment->interpretation_comments }}</p>

                    <strong>Recommendations</strong>
                    <p>{{ $treatment->recommendations }}</p>

                    <strong>Prescriptions</strong>
                    <p>{{ $treatment->prescriptions }}</p>
                    
                    <strong>Result Summary</strong>
                    <p>{{ $treatment->result_summary }}</p>
            </div>
        </div>
    </div> 
</div>

@endsection
