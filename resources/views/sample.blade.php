<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Button</title>
<style>
.upload-btn {
  border-radius: 30%;
  border: 2px solid #ccc;
  padding: 10px 20px;
  cursor: pointer;
  background-color: #f0f0f0;
  color: #333;
  font-size: 16px;
}

.upload-btn:hover {
  background-color: #e0e0e0;
}

.file-input {
  display: none;
}

.file-preview {
  margin-top: 10px;
  font-size: 14px;
  color: #666;
}
</style>
</head>
<body>

<label for="file-upload" class="upload-btn">Upload File</label>
<input id="file-upload" class="file-input" type="file" onchange="previewFile()">
<div id="file-preview" class="file-preview"></div>

<script>
function previewFile() {
  const preview = document.getElementById('file-preview');
  const fileInput = document.querySelector('input[type=file]');
  const file = fileInput.files[0];
  const reader = new FileReader();

  reader.onloadend = function() {
    preview.textContent = file.name;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.textContent = '';
  }
}
</script>

</body>
</html>
