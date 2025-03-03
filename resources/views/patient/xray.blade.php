<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Image Preview and Print</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <style>
            .image-preview {
                max-width: 100%;
                height: auto;
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div
                class="d-flex justify-content-between align-items-center border-bottom py-3"
            >
                <div>
                    <strong>X-RAY</strong>
                    <div class="text-muted">blood</div>
                </div>
                <button class="btn btn-dark btn-sm" onclick="showImage()">
                    View
                </button>
            </div>

            <!-- Image preview container -->
            <div class="image-preview-container mt-4">
                <img
                    id="imagePreview"
                    class="image-preview"
                    src="https://images.unsplash.com/photo-1616012480717-fd9867059ca0?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8eCUyMHJheXxlbnwwfHwwfHx8MA%3D%3D"
                    alt="Image Preview"
                />
                <button class="btn btn-primary mt-3" onclick="printImage()">
                    Print
                </button>
            </div>
        </div>

        <script>
            // Function to show the image preview
            function showImage() {
                document.getElementById("imagePreview").style.display = "block";
            }

            // Function to print the image
            function printImage() {
                var image = document.getElementById("imagePreview");
                var printWindow = window.open("", "", "height=600,width=800");
                printWindow.document.write(
                    "<html><head><title>Print Image</title></head><body>"
                );
                printWindow.document.write(
                    '<img src="' +
                        image.src +
                        '" style="max-width:100%; height:auto;">'
                );
                printWindow.document.write("</body></html>");
                printWindow.document.close();
                printWindow.print();
            }
        </script>
    </body>
</html>
