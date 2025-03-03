@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-4  border-bottom">Medical Result</h2>
            
            <div class="d-flex justify-content-between align-items-center border-bottom">
                <div>
                    <strong>REONTOLOGY1</strong>
                    <div class="text-muted">x-ray</div>
                </div>
                <img
    id="imagePreview"
    class="image-preview"
    src="https://images.unsplash.com/photo-1616012480717-fd9867059ca0?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8eCUyMHJheXxlbnwwfHwwfHx8MA%3D%3D"
    alt="Image Preview"
    style="display: none;"
/>

                <button class="btn btn-dark btn-sm" onclick="printImage()">
                    View
                </button>
            </div>
            
            <!-- <div class="d-flex justify-content-between align-items-center border-bottom py-3">
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
            </div> -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
    // Function to print the image and X-ray report
    function printImage() {
        var image = document.getElementById("imagePreview"); // Get the image element
        var printWindow = window.open("", "", "height=600,width=800"); // Open a new window for printing

        // Write HTML to the print window
        printWindow.document.write("<html><head><title>Print Image and Report</title></head><body>");
        
        // Write the image to the print window
        printWindow.document.write('<img src="' + image.src + '" style="max-width:100%; height:auto; margin-bottom:20px;">');

        // Write the X-ray report to the print window
        printWindow.document.write(`
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title">X-ray Report</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Patient Information</h5>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Patient Name:</strong> John Doe</li>
                                    <li class="list-group-item"><strong>Age:</strong> 45</li>
                                    <li class="list-group-item"><strong>Gender:</strong> Male</li>
                                    <li class="list-group-item"><strong>Date of X-ray:</strong> March 2, 2025</li>
                                </ul>

                                <h5 class="card-title mt-4">Findings</h5>
                                <p>The lung fields are clear with no signs of consolidation, effusion, or masses. The cardiac silhouette is normal in size and shape. No fractures or dislocations noted in the ribs, spine, or clavicles. No abnormal calcifications present.</p>

                                <h5 class="card-title mt-4">Recommendation</h5>
                                <ul class="list-group">
                                    <li class="list-group-item">Follow-up is not necessary at this time unless new symptoms arise.</li>
                                    <li class="list-group-item">Continue routine health check-ups to monitor lung health.</li>
                                    <li class="list-group-item">If any respiratory symptoms persist, consult with your healthcare provider.</li>
                                </ul>

                                <h5 class="card-title mt-4">AI Analysis and Recommendations</h5>
                                <ul class="list-group">
                                    <li class="list-group-item">No abnormalities detected by AI system in the images.</li>
                                    <li class="list-group-item">Ensure images are clear and free of motion artifacts for future scans.</li>
                                    <li class="list-group-item">AI suggests continued monitoring due to patient's history of respiratory conditions.</li>
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-light">
                                <p>&copy; 2025 Medical Imaging Center. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);

        // Close the document and initiate printing
        printWindow.document.write("</body></html>");
        printWindow.document.close();
        printWindow.print();
    }
</script>

@endsection

