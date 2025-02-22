@extends('layout.app')

@section('content')
    <div class="shadow mb-4 w-full py-3 p-1 p-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <h2>Add Comments</h2>
                    <form action="{{ route('admin.comments.store') }}" method="POST">
                        <div class="form-group mb-4">
                            <label for="symptoms" class="fw-bold">Interpretations:</label>
                            <textarea class="form-control" id="symptoms" rows="3" placeholder="Enter interpretations here..."></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="diagnosisSuggestions" class="fw-bold">Recommendations:</label>
                            <textarea class="form-control" id="diagnosisSuggestions" rows="2" placeholder="Enter recommendations here..."></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="recommendedTests" class="fw-bold">Prescriptions:</label>
                            <textarea class="form-control" id="recommendedTests" rows="2" placeholder="Enter prescriptions here..."></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="recommendedTreatment" class="fw-bold">Result Summary:</label>
                            <textarea class="form-control" id="recommendedTreatment" rows="2" placeholder="Enter result summary here..."></textarea>
                        </div>

                        <div class="d-flex float-end">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary float-end me-2">Go Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
