@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title mb-4 border-bottom">Medical Result</h2>
                @if($medicals->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        No records found.
                    </div>
                @else
                @foreach ($medicals as $medical)
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <div>
                            <strong>{{ $medical->request_type }}</strong>
                            <div class="text-muted">{{ $medical->test_date }}</div>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary btn-sm ml-2" data-bs-toggle="modal"
                                data-bs-target="#medicalResultModal"
                                data-image-url="{{ route('view.medical-result', ['id' => $medical->id]) }}">
                                View
                            </button>
                            <a href="{{ route('print.medical-result', ['id' => $medical->id]) }}"
                                class="btn btn-dark btn-sm">
                                Generate PDF
                            </a>
                        </div>
                    </div>

                    {{-- Modal --}}
                    <div class="modal fade" id="medicalResultModal" tabindex="-1" aria-labelledby="medicalResultModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content border-0 ">
                                <div class="modal-header border-0 pb-0">

                                    <button type="button" class="btn p-0 custom-close-btn float-end ms-auto"
                                        style="font-size: 1.5em;" data-bs-dismiss="modal" aria-label="Close">
                                        ×
                                    </button>
                                </div>

                                <!-- Image-focused body -->
                                <div class="modal-body p-0 h-64 text-center mb-5">
                                    @if ($medical->file_path)
                                        <a href="{{ asset($medical->file_path) }}" target="_blank">
                                            <img src="{{ asset($medical->file_path) }}" alt="Medical Result"
                                                class="img-fluid mw-100 blurred-image" id="medicalResultImage">
                                        </a>
                                    @else
                                        <div class="empty-state py-5">
                                            <i class="far fa-file-image fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">No image available</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .custom-close-btn {
                            filter: brightness(0) saturate(100%) invert(27%) sepia(51%) saturate(2878%) hue-rotate(346deg) brightness(104%) contrast(97%);
                            opacity: 1;
                            transform: scale(1.3);
                        }

                        .custom-close-btn:hover {
                            filter: brightness(0) saturate(100%) invert(27%) sepia(51%) saturate(2878%) hue-rotate(346deg) brightness(104%) contrast(97%);
                            opacity: 1;
                        }

                        .blurred-image {
                            filter: blur(10px);
                            transition: filter 0.3s ease;
                            cursor: pointer;
                        }

                        .blurred-image:hover {
                            filter: blur(5px);
                        }

                        .blurred-image.clicked {
                            filter: none;
                        }

                        .empty-state {
                            background-color: #f8f9fa;
                            border-radius: 8px;
                        }

                        .btn-outline-secondary {
                            border-color: #dee2e6;
                        }
                    </style>
                @endforeach

            </div>
        </div>
    </div>
            @endif
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var medicalResultModal = document.getElementById('medicalResultModal');

            medicalResultModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var imageUrl = button.getAttribute('data-image-url');

                var modalImage = document.getElementById('medicalResultImage');
                modalImage.src = imageUrl;

                modalImage.addEventListener('click', function() {
                    modalImage.classList.toggle('clicked');
                });
            });
        });
    </script>
@endpush
