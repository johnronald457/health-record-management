

  <div class="border p-4">
    <h2>Diagnostics</h2>
    <form>
      <div class="form-group mb-4">
        <label for="symptoms" class="fw-bold">What are the Symptoms of the Patient:</label>
        <textarea class="form-control" id="symptoms" rows="3" placeholder="Enter symptoms here..."></textarea>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="bloodPressure" class="fw-bold">Blood Pressure:</label>
          <input type="text" class="form-control" id="bloodPressure" placeholder="Enter BP">
        </div>
        <div class="col-md-6">
          <label for="temperature" class="fw-bold">Temperature:</label>
          <input type="text" class="form-control" id="temperature" placeholder="Enter temperature">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="pulseRate" class="fw-bold">Pulse Rate:</label>
          <input type="text" class="form-control" id="pulseRate" placeholder="Enter pulse rate">
        </div>
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-dark">Submit for AI Diagnosis</button>
      </div>

      <hr>
      <div class="form-group mb-4">
        <label for="diagnosisSuggestions" class="fw-bold">Diagnosis Suggestions:</label>
        <textarea class="form-control" id="diagnosisSuggestions" rows="2" placeholder="Enter diagnosis suggestions here..."></textarea>
      </div>

      <div class="form-group mb-4">
        <label for="recommendedTests" class="fw-bold">Recommended Tests:</label>
        <textarea class="form-control" id="recommendedTests" rows="2" placeholder="Enter recommended tests here..."></textarea>
      </div>

      <div class="form-group mb-4">
        <label for="recommendedTreatment" class="fw-bold">Recommended Treatment:</label>
        <textarea class="form-control" id="recommendedTreatment" rows="2" placeholder="Enter recommended treatment here..."></textarea>
      </div>

    </form>
  </div>
