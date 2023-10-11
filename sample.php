<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <!-- Include a CSS library for icons (Font Awesome in this case) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h1>Image Upload Form</h1>
    <form action="upload_image.php" method="POST" enctype="multipart/form-data">
        <!-- Input field for selecting an image file -->
        <div>
            <input type="file" name="image" id="image" accept="image/*" style="display: none;" onchange="displayFileName()">
            <label for="image" style="cursor: pointer;">
                <i class="fa fa-upload"></i> Upload Image
            </label>
            <!-- Display the selected file name -->
            <span id="file-name"></span>
        </div>
        <!-- Submit button to upload the selected image -->
        <div>
            <button type="submit">Upload</button>
        </div>
    </form>

    <script>
        // Function to display the selected file name
        function displayFileName() {
            const input = document.getElementById('image');
            const fileNameDisplay = document.getElementById('file-name');
            
            if (input.files.length > 0) {
                fileNameDisplay.textContent = input.files[0].name;
            } else {
                fileNameDisplay.textContent = '';
            }
        }
    </script>
</body>
</html>
