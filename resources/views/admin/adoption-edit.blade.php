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
                <h1><i class="fas fa-user-circle"></i>Edit Adoption Application</h1>
                <p>Update Adoption Information</p>
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
            <form action="{{ route('admin.update-adoption', ['adoption' => $adoption->adoption_id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="profile-section">
                    <div class="basic-info">
                        <p class="user-id">Adoption Id: {{ $adoption->adoption_id }}</p>
                        <div class="account-status">
                            <span class="status-badge active"><i class="fas fa-check-circle"></i>
                                {{ ucfirst($adoption->status) }}
                            </span>
                            <span class="member-since">Date created: {{ $adoption->created_at }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="details-section">
                    <div class="details-grid">
                        <h4>User Information</h4>
                        <br>

                        <!-- User Information Section -->
                        <div class="detail-group">
                            <label>Applicant Full Name</label>
                            <div class="detail-value">{{ $adoption->user->first_name }}
                                {{ $adoption->user->last_name }}
                            </div>
                        </div>

                        <div class="detail-group">
                            <label>Email</label>
                            <div class="detail-value">{{ $adoption->user->email }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Phone</label>
                            <div class="detail-value">{{ $adoption->user->phone_number }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Address</label>
                            <div class="detail-value">{{ $adoption->user->home_address }}</div>
                        </div>

                        <h4>Pet Information</h4>
                        <br>

                        <!-- Pet Information Section -->
                        <div class="detail-group">
                            <label>Pet's Name</label>
                            <div class="detail-value">{{ $adoption->pet->name }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Pet Type</label>
                            <div class="detail-value">{{ ucfirst($adoption->pet->type) }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Breed/Mix</label>
                            <div class="detail-value">{{ $adoption->pet->breed }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Age</label>
                            <div class="detail-value">{{ \Carbon\Carbon::parse($adoption->pet->birth_date)->age }}
                                years
                                old</div>
                        </div>

                        <div class="detail-group">
                            <label>Gender</label>
                            <div class="detail-value">{{ ucfirst($adoption->pet->gender) }}</div>
                        </div>

                        <div class="detail-group">
                            <label>Height</label>
                            <div class="detail-value">{{ $adoption->pet->height }} cm</div>
                        </div>

                        <div class="detail-group">
                            <label>Weight</label>
                            <div class="detail-value">{{ $adoption->pet->weight }} lbs</div>
                        </div>

                        <div class="detail-group full-width">
                            <label>Description</label>
                            <div class="detail-value">{{ $adoption->pet->description }}</div>
                        </div>


                        <h4>Schedule Information</h4>
                        <br>

                        <!-- Meet Up Date -->
                        <div class="detail-group">
                            <label for="meetupDate">Meet Up Date</label>
                            <div class="detail-value">
                                <input type="date" id="meetupDate" name="meet_up_date" class="form-input" required
                                    value="{{ old('meet_up_date', $adoption->meet_up_date) }}"
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
                                <input type="text" id="meetupTime" name="meet_up_time" class="form-input" required
                                    placeholder="HH:MM AM/PM"
                                    value="{{ old('meet_up_time', \Carbon\Carbon::parse($adoption->meet_up_time)->format('h:i A')) }}">
                                <span class="input-icon"><i class="icon-clock"></i></span>
                                @error('meet_up_time')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <h4>Status</h4>
                        <br>

                        <div class="detail-group">
                            <label for="status">Adoption Status</label>
                            <select id="status" name="status" required>
                                <option value="pending" {{ $adoption->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="approved" {{ $adoption->status == 'approved' ? 'selected' : '' }}>
                                    Approved
                                </option>
                                <option value="rejected" {{ $adoption->status == 'rejected' ? 'selected' : '' }}>
                                    Rejected
                                </option>
                                <option value="completed" {{ $adoption->status == 'completed' ? 'selected' : '' }}>
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
