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
                <h1><i class="fas fa-user-circle"></i>Service Appointment Details</h1>
                <p>View appointment information</p>
            </div>
            <div class="header-actions" style="display: flex; gap: 10px;">
                <a href="{{ url()->previous() ?? route('fallback.route') }}" class="header-link">Back</a>

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
                <div class="basic-info">
                    <p class="user-id">Service Appointment ID: {{ $appointment->id }}</p>
                    <div class="account-status">
                        <span class="member-since">Date created: {{ $appointment->created_at }}</span>
                    </div>
                </div>
            </div>

            <div class="details-section">
                <div class="details-grid">
                    <h4>Service Information</h4>
                    <br>

                    <div class="detail-group">
                        <label>Service Name</label>
                        <div class="detail-value">{{ $appointment->service->name }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Duration</label>
                        <div class="detail-value">{{ $appointment->service->duration }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Cost</label>
                        <div class="detail-value">₱{{ number_format($appointment->service->price, 2) }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Schedule</label>
                        <div class="detail-value">{{ $appointment->service->schedule }}</div>
                    </div>

                    <div class="detail-group full-width">
                        <label>Description</label>
                        <div class="detail-value">{{ $appointment->service->description }}</div>
                    </div>

                    <h4>User Information</h4>
                    <br>

                    <div class="detail-group">
                        <label>Full Name</label>
                        <div class="detail-value">{{ $appointment->user->first_name }}
                            {{ $appointment->user->last_name }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Email</label>
                        <div class="detail-value">{{ $appointment->user->email }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Phone</label>
                        <div class="detail-value">{{ $appointment->user->phone_number }}</div>
                    </div>

                    <br>
                    <h4>Pet Information</h4>
                    <br>

                    <div class="detail-group">
                        <label>Pet's Name</label>
                        <div class="detail-value">{{ $appointment->pet_name }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Type</label>
                        <div class="detail-value">{{ ucfirst($appointment->pet_type) }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Breed</label>
                        <div class="detail-value">{{ $appointment->pet_breed }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Weight</label>
                        <div class="detail-value">{{ $appointment->pet_weight }} kg</div>
                    </div>

                    <div class="detail-group">
                        <label>Age</label>
                        <div class="detail-value">{{ $appointment->pet_age }} years</div>
                    </div>

                    <br>
                    <h4>Schedule Information</h4>
                    <br>

                    <div class="detail-group">
                        <label>Date</label>
                        <div class="detail-value">{{ \Carbon\Carbon::parse($appointment->date)->format('F d, Y') }}
                        </div>
                    </div>

                    <div class="detail-group">
                        <label>Time</label>
                        <div class="detail-value">{{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="account-actions">
                <a href="{{ route('admin.edit-service-appointment', ['id' => $appointment->id]) }}"
                    style="text-decoration: none;">
                    <button class="btn btn-edit"><i class="fas fa-edit"></i> Edit Appointment</button>
                </a>
                <form action="{{ route('admin.delete-service-appointment', $appointment->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this appointment? This cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-settings" type="submit"><i class="fas fa-cog"></i> Delete
                        Appointment</button>
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
