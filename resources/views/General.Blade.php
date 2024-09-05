<form action="{{ route('upload') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="category" value="Certifications"> <!-- Pass Certifications category -->
    <a href="{{ ('/home') }}" class="btn btn-secondary">Home</a>
    <div>
        <label for="description">Description:</label>
        <input type="text" name="description" required>
    </div>
    
    <div>
        <label for="file">Choose a file:</label>
        <input type="file" name="file" required>
    </div>
    
    <button type="submit">Upload</button>
</form>

<!-- Check if there is a success message in the session -->
@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}  <!-- Show the success message -->
    </div>
@endif

<!-- Check if there is an error message in the session -->
@if(session('error'))
    <div style="color: red;">
        {{ session('error') }}  <!-- Show the error message -->
    </div>
@endif
