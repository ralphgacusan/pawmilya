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
                <h1><i class="fas fa-user-circle"></i>Donation Details</h1>
                <p>View and manage donation information</p>
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
                    <p class="user-id">Donation ID: {{ $donation->id }}</p>
                    <div class="account-status">
                        <span class="status-badge active">
                            <i class="fas fa-check-circle"></i> {{ ucfirst($donation->status) }}
                        </span>
                        <span class="member-since">Date created: {{ $donation->created_at }}</span>
                    </div>
                </div>
            </div>

            <div class="details-section">
                <div class="details-grid">
                    <h4>User Information</h4>
                    <br>

                    <!-- User Information -->
                    <div class="detail-group">
                        <label>Donor Full Name</label>
                        <div class="detail-value">{{ $donation->user->first_name }} {{ $donation->user->last_name }}
                        </div>
                    </div>

                    <div class="detail-group">
                        <label>Email</label>
                        <div class="detail-value">{{ $donation->user->email }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Phone</label>
                        <div class="detail-value">{{ $donation->user->phone_number }}</div>
                    </div>
                    <br>
                    <h4>Donation Information</h4>
                    <br>

                    <!-- Donation Details -->
                    <div class="detail-group">
                        <label>Donation Type</label>
                        <div class="detail-value">{{ ucfirst($donation->donation_type) }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Donation Amount</label>
                        <div class="detail-value">₱{{ number_format($donation->amount, 2) }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Beneficiary</label>
                        <div class="detail-value">{{ ucfirst($donation->beneficiary) }}</div>
                    </div>

                    <div class="detail-group">
                        <label>Donation Method</label>
                        <div class="detail-value">{{ ucfirst(str_replace('_', ' ', $donation->donation_method)) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="account-actions">

                <form action="{{ route('admin.delete-donation', $donation->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this donation? This cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-settings" type="submit"><i class="fas fa-trash-alt"></i> Delete
                        Donation</button>
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
