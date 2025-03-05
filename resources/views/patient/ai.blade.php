<div class="border p-3">
    <h2>AI Insights</h2>
    <form>
      <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
      <input type="hidden" id="findings" value="{{$medical->findings}}">
        <div class="form-group mb-3">
            <label for="symptoms" class="fw-bold">Analysis of the Patient's Result:</label>
            <textarea class="form-control" id="symptoms" rows="3" placeholder="AI generated here..."></textarea>
        </div>
        <div class="text-end">
            <!-- Placeholder button to fetch the result -->
            <button type="button" id="generate-btn" class="btn btn-dark">Generate</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('generate-btn').addEventListener('click', async function() {
        try {

            const csrfToken = document.getElementById('csrf-token').value;
            // Get the value from the hidden input (findings)
            const findings = document.getElementById('findings').value;

            // Concatenate the shortened prompt (or directly use the findings)
            const promptText = findings + " Provide a short recommendation.";

            // Perform a POST request to send the findings to the backend and retrieve the AI response data
            const response = await fetch('{{ route("admin.requests.generate") }}', {
                method: 'POST',  // Use POST request
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    findings: promptText  // Send the concatenated prompt in the body
                })
            });


            if (!response.ok) {
                throw new Error('Failed to fetch AI data');
            }
            // Parse the JSON response
            const data = await response.json();
         
            // Check if the response contains valid AI content
            if (data) {
                const aiContent = data.choices[0].message.content;

                // Set the content in the textarea
                document.getElementById('symptoms').value = aiContent;
            } else {
                // If no response from AI, set an error message in the textarea
                document.getElementById('symptoms').value = 'No AI response generated.';
            }
        } catch (error) {
            console.error('Error fetching AI data:', error);

            // If there's an error, display it in the textarea
            document.getElementById('symptoms').value = 'Error fetching AI data: ' + error.message;
        }
    });
</script>



