@auth
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Details - Pawmilya</title>
        @vite(['resources/css/user-account.css'])
        <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    </head>

    <body>
        <div class="account-container">
            {{-- Move message wrapper HERE --}}
            <div class="account-header"
                style="display: flex; justify-content: space-between; align-items: center; position: relative;">
                <div>
                    <h1><i class="fas fa-user-circle"></i> Account Details</h1>
                    <p>View and manage your personal information</p>
                </div>
                <div class="header-actions" style="display: flex; gap: 10px;">
                    <a href="{{ route('client.home') }}" class="header-link">Home</a>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="header-link"
                            style="border: none; background-color: rgb(255, 255, 255);">Logout</button>
                    </form>
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
                            <img id="profile-image" src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image">
                        </div>

                        <div class="upload-actions">
                            <form id="upload-form" action="{{ route('auth.updateImage') }}" method="POST"
                                enctype="multipart/form-data" style="display: flex; gap: 10px; align-items: center;">
                                @csrf
                                @method('PUT')

                                <input type="file" name="image" id="file-input" accept="image/*"
                                    style="display: none;">
                                <button type="button" class="btn-upload" id="trigger-upload"><i class="fas fa-upload"></i>
                                    Upload New</button>
                                <button type="submit" class="btn-upload" id="confirm-upload" style="display: none;"><i
                                        class="fas fa-check"></i> Confirm Upload</button>
                            </form>

                            <form action="{{ route('auth.removeImage') }}" method="POST" style="margin-left: 10px;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-remove" type="submit"><i class="fas fa-trash"></i> Remove</button>
                            </form>
                        </div>
                    </div>


                    <div class="basic-info">
                        <h2>{{ Auth::user()->name }}</h2>
                        <p class="user-id">User Id: {{ Auth::user()->id }}</p>
                        <div class="account-status">
                            <span class="status-badge active"><i class="fas fa-check-circle"></i> Active</span>
                            <span class="member-since">Member since: {{ Auth::user()->created_at->format('F d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="details-section">
                    <div class="details-grid">
                        <div class="detail-group">
                            <label>First Name</label>
                            <div class="detail-value">{{ Auth::user()->first_name }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Last Name</label>
                            <div class="detail-value">{{ Auth::user()->last_name }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Email Address</label>
                            <div class="detail-value">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Phone Number</label>
                            <div class="detail-value">{{ Auth::user()->phone_number }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Gender</label>
                            <div class="detail-value">{{ ucfirst(Auth::user()->gender) }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Birth Date</label>
                            <div class="detail-value">
                                {{ \Carbon\Carbon::parse(Auth::user()->birth_date)->format('F d, Y') }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Experienced with Pets</label>
                            <div class="detail-value">{{ ucfirst(Auth::user()->experience) }}</div>
                        </div>

                        <div class="detail-group full-width">
                            <label>Home Address</label>
                            <div class="detail-value">{{ Auth::user()->home_address }}</div>
                        </div>


                    </div>
                </div>

                <div class="account-actions">
                    <a href="{{ route('auth.user.edit') }}" style="text-decoration: none;">
                        <button class="btn btn-edit"><i class="fas fa-edit"></i> Edit Profile</button>
                    </a>

                    <form action="{{ route('auth.user.delete') }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-settings" type="submit"><i class="fas fa-cog"></i> Delete
                            Account</button>
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


            <
            script >
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
@endauth
