@extends('layout.app')

@section('content')
<div class="container">
    <h2>Create Medical Request</h2>
    <form action="{{ route('patient.medical-request.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="preferred_date" class="form-label">Preferred Date</label>
            <input type="date" class="form-control" id="preferred_date" name="preferred_date" value="{{ old('preferred_date') }}">
            @error('preferred_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="4">{{ old('notes') }}</textarea>
            @error('notes')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
