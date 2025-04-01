@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title mb-4  border-bottom">Medical Result</h2>

                @foreach ($medicalResult->filter() as $medical)
                    @if (is_object($medical) && property_exists($medical, 'file_path'))
                        <div class="col-md-6 text-center">
                            <a href="{{ asset($medical->file_path) }}" target="_blank">
                                <img src="{{ asset($medical->file_path) }}" alt="Patient Picture"
                                    class="img-fluid rounded shadow-sm"
                                    style="width: 100%; max-width: 350px; height: auto; transition: transform 0.2s;"
                                    onmouseover="this.style.transform='scale(1.1)';"
                                    onmouseout="this.style.transform='scale(1)';">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
