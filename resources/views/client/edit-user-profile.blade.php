@auth
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
                    <h1><i class="fas fa-user-circle"></i> Edit Account</h1>
                    <p>Update your personal information</p>
                </div>
            </div>

            <div class="account-content">
                <form method="POST" action="{{ route('auth.user.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="profile-section">
                        <div class="basic-info">
                            <h2>{{ Auth::user()->name }}</h2>
                            <p class="user-id">User Id: {{ Auth::user()->id }}</p>
                            <div class="account-status">
                                <span class="status-badge active"><i class="fas fa-check-circle"></i> Active</span>
                                <span class="member-since">Member since:
                                    {{ Auth::user()->created_at->format('F d, Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="details-section">
                        <div class="details-grid">
                            <div class="detail-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name"
                                    value="{{ Auth::user()->first_name }}" required>
                            </div>

                            <div class="detail-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}"
                                    required>
                            </div>

                            <div class="detail-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                                    required>
                            </div>

                            <div class="detail-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" id="phone_number" name="phone_number"
                                    value="{{ Auth::user()->phone_number }}" required>
                            </div>

                            <div class="detail-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" required>
                                    <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                    <option value="prefer_not_to_say"
                                        {{ Auth::user()->gender == 'other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>

                            <div class="detail-group">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" id="birth_date" name="birth_date"
                                    value="{{ \Carbon\Carbon::parse(Auth::user()->birth_date)->format('Y-m-d') }}"
                                    required>
                            </div>

                            <div class="detail-group">
                                <label for="experience">Experienced with Pets</label>
                                <select id="experience" name="experience" required>
                                    <option value="yes" {{ Auth::user()->experience == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ Auth::user()->experience == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>

                            <div class="detail-group full-width">
                                <label for="home_address">Home Address</label>
                                <input type="text" id="home_address" name="home_address"
                                    value="{{ Auth::user()->home_address }}" required>
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
        </div>
    </body>

    </html>
@endauth
