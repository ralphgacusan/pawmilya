    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Details - Pawmilya</title>
        <link rel="stylesheet" href="{{ asset('css/user-account.css') }}">
        <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    </head>

    <body>
        <div class="account-container">
            {{-- Move message wrapper HERE --}}
            <div class="account-header"
                style="display: flex; justify-content: space-between; align-items: center; position: relative;">
                <div>
                    <h1><i class="fas fa-user-circle"></i> Pet Details</h1>
                    <p>View and manage pet information</p>
                </div>
                <div class="header-actions" style="display: flex; gap: 10px;">
                    <a href="{{ route('admin.pet') }}" class="header-link">Back</a>

                </div>

                <!-- Message Overlay -->
                <div class="message-wrapper"
                    style="position: absolute; top: 10px; left: 50%; transform: translateX(-50%); width: 80%; z-index: 10; text-align: center;">
                    @if (session('success'))
                        <div class="alert alert-success"
                            style="display: inline-block; padding: 10px 20px; background-color: #d4edda; color: #155724; border-radius: 5px;">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger"
                            style="display: inline-block; padding: 10px 20px; background-color: #f8d7da; color: #721c24; border-radius: 5px;">
                            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger"
                            style="display: inline-block; padding: 10px 20px; background-color: #f8d7da; color: #721c24; border-radius: 5px;">
                            <ul style="list-style: none; margin: 0; padding: 0;">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                </div>
            </div>


            <div class="account-content">
                <div class="profile-section">
                    <div class="avatar-upload">
                        <div class="avatar-preview">
                            <img id="profile-image" src="{{ asset('storage/' . $pet->image) }}" alt="Profile Image">
                        </div>

                        <div class="upload-actions">
                            <form id="upload-form" action="{{ route('admin.pet.update-image', ['pet' => $pet->id]) }}"
                                method="POST" enctype="multipart/form-data"
                                style="display: flex; gap: 10px; align-items: center;">
                                @csrf
                                @method('PUT')

                                <input type="file" name="image" id="file-input" accept="image/*"
                                    style="display: none;">
                                <button type="button" class="btn-upload" id="trigger-upload"><i
                                        class="fas fa-upload"></i>
                                    Upload New</button>
                                <button type="submit" class="btn-upload" id="confirm-upload" style="display: none;"><i
                                        class="fas fa-check"></i> Confirm Upload</button>
                            </form>

                            <form action="{{ route('admin.pet.remove-image', ['pet' => $pet->id]) }}" method="POST"
                                style="margin-left: 10px;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-remove" type="submit"><i class="fas fa-trash"></i> Remove</button>
                            </form>
                        </div>
                    </div>


                    <div class="basic-info">
                        <h2>{{ $pet->name }}</h2>
                        <p class="user-id">Pet Id: {{ $pet->id }}</p>
                        <div class="account-status">
                            <span class="status-badge active"><i class="fas fa-check-circle"></i>
                                {{ ucfirst($pet->status) }}
                            </span>
                            <span class="member-since">Listed since: {{ $pet->created_at }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="details-section">
                    <div class="details-grid">

                        <div class="detail-group">
                            <label>Name</label>
                            <div class="detail-value">{{ $pet->name }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Birth Date</label>
                            <div class="detail-value">{{ \Carbon\Carbon::parse($pet->birth_date)->format('F d, Y') }}
                            </div>
                        </div>

                        <div class="detail-group">
                            <label>Type</label>
                            <div class="detail-value">{{ ucfirst($pet->type) }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Breed</label>
                            <div class="detail-value">{{ $pet->breed }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Gender</label>
                            <div class="detail-value">{{ ucfirst($pet->gender) }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Height</label>
                            <div class="detail-value">{{ $pet->height }} cm</div>
                        </div>

                        <div class="detail-group">
                            <label>Weight</label>
                            <div class="detail-value">{{ $pet->weight }} kg</div>
                        </div>

                        <div class="detail-group">
                            <label>Temperament</label>
                            <div class="detail-value">{{ ucfirst($pet->temperament) }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Good With</label>
                            <div class="detail-value">{{ ucfirst($pet->good_with) }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Spayed/Neutered Status</label>
                            <div class="detail-value">{{ ucfirst($pet->spayed_neutered_status) }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Vaccination Status</label>
                            <div class="detail-value">{{ ucfirst($pet->vaccination_status) }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Existing Conditions</label>
                            <div class="detail-value">{{ $pet->existing_conditions }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Status</label>
                            <div class="detail-value">{{ ucfirst($pet->status) }}</div>
                        </div>

                        <div class="detail-group full-width">
                            <label>Description</label>
                            <div class="detail-value">{{ $pet->description }}</div>
                        </div>


                    </div>
                </div>

                <div class="account-actions">
                    <a href="{{ route('admin.edit-pet', ['id' => $pet->id]) }}" style="text-decoration: none;">
                        <button class="btn btn-edit"><i class="fas fa-edit"></i> Edit Profile</button>
                    </a>

                    <form action="{{ route('client.delete-pet', $pet->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-settings" type="submit"><i class="fas fa-cog"></i> Remove
                            Pet</button>
                    </form>
                </div>



            </div>
        </div>

        <script>
            const triggerUploadBtn = document.getElementById('trigger-upload');
            const confirmUploadBtn = document.getElementById('confirm-upload');
            const fileInput = document.getElementById('file-input');
            const profileImage = document.getElementById('profile-image');

            triggerUploadBtn.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                const file = fileInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profileImage.src = e.target.result;
                        confirmUploadBtn.style.display = 'inline-block';
                        triggerUploadBtn.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            });




            // Auto-hide alert after 5 seconds
            setTimeout(() => {
                document.querySelectorAll('.alert').forEach(alert => {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500);
                });
            }, 5000);
        </script>

        </script>
    </body>

    </html>
