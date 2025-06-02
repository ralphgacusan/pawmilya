<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details - Pawmilya</title>
    <link rel="stylesheet" href="{{ asset('css/user-account.css') }}">
    <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
                <a href="{{ route('admin.adopt-application') }}" class="header-link">Back</a>

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


            <form action="{{ route('admin.update-service-appointment', ['appointment' => $appointment->id]) }}"
                method="POST">
                @csrf
                @method('PUT')
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
                            <label for="pet_name">Pet's Name</label>
                            <input type="text" id="pet_name" name="pet_name"
                                value="{{ old('pet_name', $appointment->pet_name) }}" required>
                            @error('pet_name')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="detail-group">
                            <label for="pet_type">Type</label>
                            <input type="text" id="pet_type" name="pet_type"
                                value="{{ old('pet_type', $appointment->pet_type) }}" required>
                            @error('pet_type')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="detail-group">
                            <label for="pet_breed">Breed</label>
                            <input type="text" id="pet_breed" name="pet_breed"
                                value="{{ old('pet_breed', $appointment->pet_breed) }}" required>
                            @error('pet_breed')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="detail-group">
                            <label for="pet_weight">Weight in lbs</label>
                            <input type="text" id="pet_weight" name="pet_weight"
                                value="{{ old('pet_weight', $appointment->pet_weight) }}" required>
                            @error('pet_weight')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="detail-group">
                            <label for="pet_age">Age</label>
                            <input type="text" id="pet_age" name="pet_age"
                                value="{{ old('pet_age', $appointment->pet_age) }}" required>
                            @error('pet_age')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>



                        <br>
                        <h4>Schedule Information</h4>
                        <br>

                        <!-- Appointment Date -->
                        <div class="detail-group">
                            <label for="date">Appointment Date</label>
                            <div class="detail-value">
                                <input type="date" id="date" name="date" class="form-input" required
                                    value="{{ old('date', \Carbon\Carbon::parse($appointment->date)->format('Y-m-d')) }}"
                                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                <span class="input-icon"><i class="icon-calendar"></i></span>
                                @error('date')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <!-- Meet Up Time -->
                        <div class="detail-group">
                            <label for="meetupTime">Meet Up Time</label>
                            <div class="detail-value">
                                <input type="text" id="meetupTime" name="time" class="form-input" required
                                    placeholder="HH:MM AM/PM"
                                    value="{{ old('meet_up_time', \Carbon\Carbon::parse($appointment->time)->format('h:i A')) }}">
                                <span class="input-icon"><i class="icon-clock"></i></span>
                                @error('meet_up_time')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                    </div>
                </div>

                <div class="account-actions">
                    <a href="{{ url()->previous() }}" class="btn btn-cancel"
                        style="background-color: #ccc; color: #333; text-decoration: none; padding: 0.5rem 1rem; border-radius: 4px;">
                        <i class="fas fa-times"></i> Cancel
                    </a>

                    <button type="submit" class="btn btn-edit">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
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

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#meetupTime", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K", // 'h:i K' gives 12-hour format with AM/PM (e.g., 7:00 AM)
                time_24hr: false, // Use AM/PM format
                minTime: "07:00", // 7:00 AM
                maxTime: "17:00", // 5:00 PM
            });
        });
    </script>
</body>

</html>
