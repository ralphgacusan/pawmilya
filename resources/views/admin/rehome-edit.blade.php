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
        <div class="account-header"
            style="display: flex; justify-content: space-between; align-items: center; position: relative;">
            <div>
                <h1><i class="fas fa-user-circle"></i>Edit Rehome Application</h1>
                <p>Update Rehome Information</p>
            </div>
            <div class="header-actions" style="display: flex; gap: 10px;">
                <a href="{{ route('admin.rehome-application') }}" class="header-link">Back</a>
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
            <form action="{{ route('admin.update-rehome', ['rehome' => $rehome->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="profile-section">


                    <div class="basic-info">
                        <p class="user-id">Rehome Id: {{ $rehome->id }}</p>
                        <div class="account-status">
                            <span class="status-badge active"><i class="fas fa-check-circle"></i>
                                {{ ucfirst($rehome->status) }}
                            </span>
                            <span class="member-since">Date created: {{ $rehome->created_at }}</span>
                        </div>
                    </div>
                </div>

                <div class="details-section">
                    <div class="details-grid">
                        <h4>User Information</h4>
                        <br>

                        <div class="detail-group">
                            <label>Applicant Full Name</label>
                            <div class="detail-value">{{ $rehome->user->first_name }} {{ $rehome->user->last_name }}
                            </div>
                        </div>

                        <div class="detail-group">
                            <label>Email</label>
                            <div class="detail-value">{{ $rehome->user->email }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Phone</label>
                            <div class="detail-value">{{ $rehome->user->phone_number }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Address</label>
                            <div class="detail-value">{{ $rehome->user->home_address }}</div>
                        </div>

                        <h4>Pet Information</h4>
                        <br>

                        <!-- Pet's Name -->
                        <div class="detail-group">
                            <label for="petName">Pet's Name*</label>
                            <input type="text" id="petName" name="name" required
                                value="{{ old('name', $rehome->rehomePet->name) }}"
                                placeholder="Enter your pet's name">
                            @error('name')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Pet Type -->
                        <div class="detail-group">
                            <label for="petType">Pet Type*</label>
                            <select id="petType" name="type" required>
                                <option value="" disabled>Select Pet Type</option>
                                @php
                                    $types = [
                                        'dog' => 'Dog',
                                        'cat' => 'Cat',
                                        'exotic' => 'Exotic',
                                        'special_needs' => 'Special Needs',
                                        'others' => 'Others',
                                    ];
                                @endphp
                                @foreach ($types as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ old('type', $rehome->rehomePet->type) == $key ? 'selected' : '' }}>
                                        {{ $label }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Breed -->
                        <div class="detail-group">
                            <label for="petBreed">Breed/Mix*</label>
                            <input type="text" id="petBreed" name="breed" required
                                value="{{ old('breed', $rehome->rehomePet->breed) }}" placeholder="Enter breed or mix">
                            @error('breed')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Birth Date -->
                        <div class="detail-group">
                            <label for="birthDate">Birth Date*</label>
                            <input type="date" id="birthDate" name="birth_date" required
                                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                value="{{ old('birth_date', $rehome->rehomePet->birth_date) }}">
                            @error('birth_date')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="detail-group">
                            <label for="gender">Gender*</label>
                            <select id="gender" name="gender" required>
                                <option value="" disabled>Select Gender</option>
                                <option value="male"
                                    {{ old('gender', $rehome->rehomePet->gender) == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female"
                                    {{ old('gender', $rehome->rehomePet->gender) == 'female' ? 'selected' : '' }}>
                                    Female</option>
                            </select>
                            @error('gender')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Height -->
                        <div class="detail-group">
                            <label for="height">Height in cm*</label>
                            <input type="text" id="height" name="height" required
                                value="{{ old('height', $rehome->rehomePet->height) }}"
                                placeholder="Enter pet's height">
                            @error('height')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Weight -->
                        <div class="detail-group">
                            <label for="weight">Weight in lbs*</label>
                            <input type="text" id="weight" name="weight" required
                                value="{{ old('weight', $rehome->rehomePet->weight) }}"
                                placeholder="Enter pet's weight">
                            @error('weight')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Temperament -->
                        <div class="detail-group">
                            <label for="temperament">Temperament</label>
                            <input type="text" id="temperament" name="temperament"
                                value="{{ old('temperament', $rehome->rehomePet->temperament) }}"
                                placeholder="e.g., Calm, Energetic">
                            @error('temperament')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Good With -->
                        <div class="detail-group">
                            <label for="good_with">Good With</label>
                            <input type="text" id="good_with" name="good_with"
                                value="{{ old('good_with', $rehome->rehomePet->good_with) }}"
                                placeholder="e.g., Kids, Cats, Dogs">
                            @error('good_with')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Spayed/Neutered -->
                        <div class="detail-group">
                            <label for="spayed_neutered_status">Spayed/Neutered*</label>
                            <select id="spayed_neutered_status" name="spayed_neutered_status" required>
                                <option value="" disabled>Select Status</option>
                                <option value="yes"
                                    {{ old('spayed_neutered_status', $rehome->rehomePet->spayed_neutered_status) == 'yes' ? 'selected' : '' }}>
                                    Yes</option>
                                <option value="no"
                                    {{ old('spayed_neutered_status', $rehome->rehomePet->spayed_neutered_status) == 'no' ? 'selected' : '' }}>
                                    No</option>
                            </select>
                            @error('spayed_neutered_status')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Vaccination Status -->
                        <div class="detail-group">
                            <label for="vaccination_status">Vaccination Status*</label>
                            <select id="vaccination_status" name="vaccination_status" required>
                                <option value="" disabled>Select Status</option>
                                <option value="yes"
                                    {{ old('vaccination_status', $rehome->rehomePet->vaccination_status) == 'yes' ? 'selected' : '' }}>
                                    Yes</option>
                                <option value="no"
                                    {{ old('vaccination_status', $rehome->rehomePet->vaccination_status) == 'no' ? 'selected' : '' }}>
                                    No</option>
                            </select>
                            @error('vaccination_status')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Existing Conditions -->
                        <div class="detail-group">
                            <label for="existing_conditions">Existing Conditions</label>
                            <input type="text" id="existing_conditions" name="existing_conditions"
                                placeholder="Mention any medical condition"
                                value="{{ old('existing_conditions', $rehome->rehomePet->existing_conditions) }}">
                            @error('existing_conditions')
                                <small style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="detail-group full-width">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description"
                                value="{{ old('description', $rehome->rehomePet->description) }}">
                        </div>



                        <h4>Schedule Information</h4>
                        <br>

                        <!-- Meet Up Date -->
                        <div class="detail-group">
                            <label for="meetupDate">Meet Up Date</label>
                            <div class="detail-value">
                                <input type="date" id="meetupDate" name="meet_up_date" class="form-input"
                                    required value="{{ old('meet_up_date', $rehome->meet_up_date) }}"
                                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                <span class="input-icon"><i class="icon-calendar"></i></span>
                                @error('meet_up_date')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Meet Up Time -->
                        <div class="detail-group">
                            <label for="meetupTime">Meet Up Time</label>
                            <div class="detail-value">
                                <input type="text" id="meetupTime" name="meet_up_time" class="form-input"
                                    required placeholder="HH:MM AM/PM"
                                    value="{{ old('meet_up_time', \Carbon\Carbon::parse($rehome->meet_up_time)->format('h:i A')) }}">
                                <span class="input-icon"><i class="icon-clock"></i></span>
                                @error('meet_up_time')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <h4>Status</h4>
                        <br>

                        <div class="detail-group">
                            <label for="status">Rehome Status</label>
                            <select id="status" name="status" required>
                                <option value="pending" {{ $rehome->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="approved" {{ $rehome->status == 'approved' ? 'selected' : '' }}>
                                    Approved
                                </option>
                                <option value="rejected" {{ $rehome->status == 'rejected' ? 'selected' : '' }}>
                                    Rejected
                                </option>
                                <option value="completed" {{ $rehome->status == 'completed' ? 'selected' : '' }}>
                                    Completed</option>
                            </select>
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
