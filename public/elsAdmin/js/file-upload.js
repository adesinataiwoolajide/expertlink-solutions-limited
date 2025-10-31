// Image preview functionality
document.getElementById('imageUpload').addEventListener('change', function (e) {
  const preview = document.getElementById('imagePreview');
  preview.innerHTML = '';

  if (this.files && this.files[0]) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const img = document.createElement('img');
      img.src = e.target.result;
      img.className = 'img-fluid img-thumbnail';
      img.style.maxHeight = '200px';
      preview.appendChild(img);
    }
    reader.readAsDataURL(this.files[0]);
  }
});

// File size validation
document.getElementById('fileUploadSize').addEventListener('change', function (e) {
  const sizeError = document.getElementById('sizeError');
  sizeError.textContent = '';

  if (this.files && this.files[0]) {
    const fileSize = this.files[0].size / 1024 / 1024; // in MB
    if (fileSize > 5) {
      sizeError.textContent = 'File size exceeds 5MB limit. Please choose a smaller file.';
      this.value = '';
    }
  }
});

// Drag & Drop functionality
const dropzone = document.getElementById('dropzone');
const dropzoneInput = document.getElementById('dropzoneInput');
const dropzonePreview = document.getElementById('dropzonePreview');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropzone.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
  e.preventDefault();
  e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
  dropzone.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
  dropzone.addEventListener(eventName, unhighlight, false);
});

function highlight() {
  dropzone.classList.add('border-primary');
}

function unhighlight() {
  dropzone.classList.remove('border-primary');
}

dropzone.addEventListener('drop', handleDrop, false);
dropzoneInput.addEventListener('change', handleFiles, false);

function handleDrop(e) {
  const dt = e.dataTransfer;
  const files = dt.files;
  handleFiles({ target: { files: files } });
}

function handleFiles(e) {
  const files = e.target.files;
  dropzonePreview.innerHTML = '';

  if (files.length > 0) {
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      if (file.size / 1024 / 1024 > 10) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'alert alert-danger mt-2';
        errorDiv.textContent = `${file.name} exceeds the 10MB size limit`;
        dropzonePreview.appendChild(errorDiv);
        continue;
      }

      const fileItem = document.createElement('div');
      fileItem.className = 'd-flex align-items-center p-2 border rounded mb-2';

      const iconClass = file.type.startsWith('image/') ? 'ri-image-line' :
        file.type.startsWith('video/') ? 'ri-video-line' :
          file.type.includes('pdf') ? 'ri-file-pdf-line' : 'ri-file-line';

      fileItem.innerHTML = `
                      <i class="${iconClass} fs-4 me-2 text-primary"></i>
                      <div class="flex-grow-1">
                        <div class="fw-semibold">${file.name}</div>
                        <small class="text-muted">${(file.size / 1024).toFixed(2)} KB</small>
                      </div>
                    `;
      dropzonePreview.appendChild(fileItem);
    }
  }
}

// Upload with progress simulation
document.getElementById('uploadBtn').addEventListener('click', function () {
  const fileInput = document.getElementById('progressUpload');
  const progressBar = document.getElementById('uploadProgress');
  const progressIndicator = progressBar.querySelector('.progress-bar');

  if (fileInput.files.length === 0) {
    alert('Please select a file to upload');
    return;
  }

  progressBar.classList.remove('d-none');
  progressIndicator.style.width = '0%';

  // Simulate upload progress
  let width = 0;
  const interval = setInterval(() => {
    if (width >= 100) {
      clearInterval(interval);
      setTimeout(() => {
        alert('Upload completed successfully!');
        fileInput.value = '';
        progressBar.classList.add('d-none');
      }, 500);
    } else {
      width += 5;
      progressIndicator.style.width = width + '%';
      progressIndicator.setAttribute('aria-valuenow', width);
    }
  }, 200);
});
