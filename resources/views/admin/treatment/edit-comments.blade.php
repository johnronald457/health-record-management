@extends('layout.app')

@section('content')
    <div class="container">
        <div class="shadow">
            <div class="card-body px-5 pt-5">
                <h1 class="mb-4">Edit Comments</h1>
            </div>
            <div class="card-body px-5 pb-5">
                <form action="{{ route('admin.update.comments', $treatment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="interpretation_comments" class="form-label">Interpretation Comments</label>
                        <textarea class="form-control" id="interpretation_comments" name="interpretation_comments" rows="3" required>{{ $treatment->interpretation_comments }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="recommendations" class="form-label">Recommendations</label>
                        <textarea class="form-control" id="recommendations" name="recommendations" rows="3" required>{{ $treatment->recommendations }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="prescriptions" class="form-label">Prescriptions</label>
                        <textarea class="form-control" id="prescriptions" name="prescriptions" rows="3" required>{{ $treatment->prescriptions }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="result_summary" class="form-label">Result Summary</label>
                        <textarea class="form-control" id="result_summary" name="result_summary" rows="3" required>{{ $treatment->result_summary }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-warning float-end">Update Comments</button>
                </form>
            </div>
        </div>
    </div>
@endsection
