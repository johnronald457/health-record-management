@extends('layout.app')

@section('content')
    <div class="shadow mb-4 w-full py-3 p-1 p-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <h2>Add Doctor Comments</h2>
                    <form action="{{ route('admin.comments.store') }}" method="POST">
                        @csrf
                        <select name="treatment_id" id="treatment_id" class="form-control" required hidden>
                            @foreach ($treatments as $treatment)
                                <option value="{{ $treatment->id }}">
                                    {{ $treatment->user->firstname }} {{ $treatment->user->lastname }} -
                                    {{ $treatment->id }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-group mb-4">
                            <label for="interpretations" class="fw-bold">Interpretations:</label>
                            <textarea class="form-control" id="interpretations" name="interpretation_comments" rows="3"
                                placeholder="Enter interpretations here..."></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="recommendations" class="fw-bold">Recommendations:</label>
                            <textarea class="form-control" id="recommendations" name="recommendations" rows="2"
                                placeholder="Enter recommendations here..."></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="prescriptions" class="fw-bold">Prescriptions:</label>
                            <textarea class="form-control" id="prescriptions" name="prescriptions" rows="2"
                                placeholder="Enter prescriptions here..."></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="result_summary" class="fw-bold">Result Summary:</label>
                            <textarea class="form-control" id="result_summary" name="result_summary" rows="2"
                                placeholder="Enter result summary here..."></textarea>
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
