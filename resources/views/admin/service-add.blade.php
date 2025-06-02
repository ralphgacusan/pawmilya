    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Account - Pawmilya</title>
        <link rel="stylesheet" href="{{ asset('css/user-account.css') }}">
        <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>

    <body>
        <div class="account-container">
            <div class="account-header" style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h1><i class="fas fa-user-circle"></i> Add Service</h1>
                    <p>Add service information</p>
                </div>
            </div>

            <div class="account-content">
                <form method="POST" action="{{ route('admin.add-service') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="profile-section">
                        <div class="avatar-upload">
                            <div class="avatar-preview">
                                <img id="profile-image" src="" alt="Service Image">
                            </div>

                            <div class="upload-actions">
                                <!-- File input (hidden) -->
                                <input type="file" name="image" id="file-input" accept="image/*"
                                    style="display: none;" onchange="previewImage(event)">

                            </div>
                        </div>
                        <div class="basic-info">
                            <h2>Add New Service</h2>
                            <!-- Upload Button -->
                            <br>
                            <button type="button" class="btn-upload" id="trigger-upload"
                                onclick="document.getElementById('file-input').click();">
                                <i class="fas fa-upload"></i> Upload New
                            </button>
                        </div>
                    </div>

                    <div class="details-section">
                        <div class="details-grid">
                            <div class="detail-group">
                                <label for="name">Service Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Enter service name" required>
                            </div>

                            <div class="detail-group">
                                <label for="schedule">Schedule</label>
                                <input type="text" id="schedule" name="schedule" value="{{ old('schedule') }}"
                                    placeholder="Enter schedule (e.g. Mon-Fri, 9AM - 5PM)" required>
                            </div>

                            <div class="detail-group">
                                <label for="duration">Duration in minutes</label>
                                <input type="text" id="duration" name="duration" value="{{ old('duration') }}"
                                    placeholder="Enter duration in minutes" required>
                            </div>

                            <div class="detail-group">
                                <label for="price">Price (₱)</label>
                                <input type="text" id="price" name="price" value="{{ old('price') }}"
                                    placeholder="Enter price in PHP" required>
                            </div>

                            <div class="detail-group full-width">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description"
                                    value="{{ old('description') }}" placeholder="Enter service description" required>
                            </div>
                        </div>
                    </div>


                    <div class="account-actions">
                        <a href="{{ url()->previous() }}" class="btn btn-cancel"
                            style="background-color: #ccc; color: #333; text-decoration: none; padding: 0.5rem 1rem; border-radius: 4px;">
                            <i class="fas fa-times"></i> Cancel
                        </a>

                        <button type="submit" class="btn btn-edit">
                            <i class="fas fa-save"></i> Add New Service
                        </button>
                    </div>
                </form>




                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin: 0; padding-left: 1.2rem;">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>

            <script>
                function previewImage(event) {
                    // Get the selected file
                    var file = event.target.files[0];

                    // Check if the file is an image
                    if (file && file.type.startsWith('image/')) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            // Update the preview image
                            document.getElementById('profile-image').src = e.target.result;

                            // Show the Confirm Upload button
                            document.getElementById('confirm-upload').style.display = 'inline-block';
                        }

                        reader.readAsDataURL(file);
                    } else {
                        // Reset if not an image
                        alert('Please select a valid image file.');
                    }
                }
            </script>
        </div>
    </body>

    </html>
