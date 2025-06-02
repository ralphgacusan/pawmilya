<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets | Pawmilya Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">

    <style>
        /* General Styles */
        :root {
            /* Color Palette */
            --primary: #E5A02D;
            --primary-dark: #C78B24;
            --primary-light: #F0B755;
            --secondary: #4A8FE7;
            --accent: #ffffff;
            --light: #F8F5F0;
            --dark: #2D2A26;
            --gray: #7D7D7D;
            --light-gray: #F0EDE8;
            --success: #4CAF50;
            --error: #F44336;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Layout */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            background-color: #2c3e50;
            color: white;
            width: 250px;
            padding: 20px 0;
        }


        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid var(--gray);
            margin-bottom: 20px;
        }

        .sidebar-header h2 {
            color: var(--primary);
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: var(--accent);
            transition: all 0.3s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: var(--primary);
            color: var(--dark);
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--light-gray);
        }

        .header h1 {
            color: var(--primary-dark);
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: var(--accent);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .card-icon.pets {
            background-color: rgba(229, 160, 45, 0.2);
            color: var(--primary);
        }

        .card-icon.users {
            background-color: rgba(74, 143, 231, 0.2);
            color: var(--secondary);
        }

        .card-icon.applications {
            background-color: rgba(76, 175, 80, 0.2);
            color: var(--success);
        }

        .card-icon.reports {
            background-color: rgba(244, 67, 54, 0.2);
            color: var(--error);
        }

        .card h3 {
            font-size: 14px;
            color: var(--gray);
            margin-bottom: 5px;
        }

        .card h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 12px;
            color: var(--gray);
        }

        /* Tables */
        .table-container {
            background-color: var(--accent);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-header h2 {
            color: var(--primary-dark);
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: var(--light-gray);
            padding: 8px 15px;
            border-radius: 20px;
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--light-gray);
        }

        th {
            background-color: var(--light-gray);
            color: var(--dark);
            font-weight: 600;
        }

        tr:hover {
            background-color: rgba(229, 160, 45, 0.05);
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status.pending {
            background-color: rgba(229, 160, 45, 0.2);
            color: var(--primary-dark);
        }

        .status.approved {
            background-color: rgba(76, 175, 80, 0.2);
            color: var(--success);
        }

        .status.rejected {
            background-color: rgba(244, 67, 54, 0.2);
            color: var(--error);
        }

        .action-btn {
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-right: 5px;
            font-size: 12px;
        }

        .edit-btn {
            background-color: var(--secondary);
            color: white;
        }

        .delete-btn {
            background-color: var(--error);
            color: white;
        }

        .view-btn {
            background-color: var(--primary);
            color: white;
        }

        /* Form Styles */
        .form-container {
            background-color: var(--accent);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--light-gray);
            border-radius: 4px;
            background-color: var(--light);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
            }

            .dashboard-cards {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }

        /* Pets Management Specific Styles */
        .table-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .filter-options {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-group label {
            font-size: 14px;
            color: var(--gray);
        }

        .pet-thumbnail {
            width: 50px;
            height: 50px;
            border-radius: 4px;
            object-fit: cover;
        }

        .status.available {
            background-color: rgba(76, 175, 80, 0.2);
            color: var(--success);
        }

        .status.pending {
            background-color: rgba(229, 160, 45, 0.2);
            color: var(--primary-dark);
        }

        .status.adopted {
            background-color: rgba(74, 143, 231, 0.2);
            color: var(--secondary);
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
        }



        /* Modal Styles */
        .modal {
            display: none;
            /* This hides it by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;

            /* Centering styles - keep these */
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: var(--accent);
            border-radius: 8px;
            width: 90%;
            max-width: 700px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--light-gray);
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--gray);
        }

        .modal-form .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .modal-form .form-row .form-group {
            flex: 1;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }


        @media (max-width: 768px) {
            .modal-form .form-row {
                flex-direction: column;
                gap: 15px;
            }

            .filter-options {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .pagination {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a {
            display: block;
            padding: 8px 15px;
            background-color: var(--primary-light);
            color: white;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .pagination a:hover {
            background-color: var(--primary-dark);
        }

        .pagination .active a {
            background-color: var(--primary);
            color: white;
        }

        .pagination .disabled {
            pointer-events: none;
            opacity: 0.5;
        }


        #notification-container {
            position: fixed;
            top: 70px;
            /* adjust depending on your navbar height */
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
        }

        .notification {
            min-width: 650px;
            max-width: 90%;
            margin: 10px auto;
            padding: 15px 20px;
            border-radius: 12px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            animation: slideDown 0.3s ease;
        }

        .notification.success {
            background-color: #FFA66D;
        }

        .notification.error {
            background-color: #f44336;
        }

        .notification .close-btn {
            cursor: pointer;
            font-weight: bold;
            padding-left: 15px;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px) translateX(-50%);
            }

            to {
                opacity: 1;
                transform: translateY(0) translateX(-50%);
            }
        }

        .user-info button {
            font-size: 1rem;
            color: #007bff;
            text-decoration: underline;
        }

        .user-info button:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Pawmilya</h2>
                <p>Administration Panel</p>
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.pet') }}" class="active"><i class="fas fa-paw"></i>Pet Management</a>
                </li>
                <li><a href="{{ route('admin.user') }}"><i class="fas fa-users"></i>User Management</a>
                </li>
                <li><a href="{{ route('admin.adopt-application') }}"><i class="fas fa-file-alt"></i>Adoption
                        Applications</a>
                </li>
                <li><a href="{{ route('admin.rehome-application') }}"><i class="fas fa-home"></i>Rehoming
                        Applications</a>
                </li>
                <li><a href="{{ route('admin.donation') }}"><i class="fas fa-hand-holding-heart"></i>Donations</a></li>
                <li><a href="{{ route('admin.service') }}"><i class="fas fa-concierge-bell"></i>Services</a></li>
                <li><a href="{{ route('admin.service-appointments') }}"><i class="fas fa-calendar-alt"></i>Service
                        Appointments</a>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Notification System -->
            <div id="notification-container"></div>

            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        showNotification(@json(session('success')), 'success');
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        showNotification(@json(session('error')), 'error');
                    });
                </script>
            @endif

            <div class="header">
                <h1>Pets Management</h1>
                <div class="user-info">


                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit"
                            style="text-decoration: none; font-weight: 500; font-size: 16px; color: #000; background: white; padding: 8px 12px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); transition: 0.3s ease; border: none; cursor: pointer;">
                            Logout
                        </button>
                    </form>


                </div>
            </div>

            <!-- Pets Filter and Search -->
            <div class="table-container">
                <div class="table-header">
                    <h2>All Pets</h2>
                    <div class="table-actions">
                        <button class="btn btn-primary" id="add-pet-btn">
                            <i class="fas fa-plus"></i> Add New Pet
                        </button>
                    </div>
                </div>
                <div class="filter-form">
                    <form action="{{ route('admin.pet') }}" method="GET" class="filter-options">
                        <div class="filter-group">
                            <label for="search">Search (name):</label>
                            <div class="search-box">
                                <i class="fas fa-search"></i>
                                <input type="text" id="search" name="search" class="form-control"
                                    placeholder="Search pets..." value="{{ old('search', $filters['search'] ?? '') }}">
                            </div>
                        </div>
                        <div class="filter-group">
                            <label for="pet-type-filter">Type:</label>
                            <select id="pet-type-filter" name="type" class="form-control">
                                <option value="all"
                                    {{ old('type', $filters['type'] ?? 'all') == 'all' ? 'selected' : '' }}>All Types
                                </option>
                                <option value="dog"
                                    {{ old('type', $filters['type'] ?? '') == 'dog' ? 'selected' : '' }}>Dog</option>
                                <option value="cat"
                                    {{ old('type', $filters['type'] ?? '') == 'cat' ? 'selected' : '' }}>Cat</option>
                                <option value="exotic"
                                    {{ old('type', $filters['type'] ?? '') == 'exotic' ? 'selected' : '' }}>Exotic
                                </option>
                                <option value="special_needs"
                                    {{ old('type', $filters['type'] ?? '') == 'special_needs' ? 'selected' : '' }}>
                                    Special Needs</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="pet-status-filter">Status:</label>
                            <select id="pet-status-filter" name="status" class="form-control">
                                <option value="all"
                                    {{ old('status', $filters['status'] ?? 'all') == 'all' ? 'selected' : '' }}>All
                                    Statuses</option>
                                <option value="available"
                                    {{ old('status', $filters['status'] ?? '') == 'available' ? 'selected' : '' }}>
                                    Available</option>
                                <option value="pending"
                                    {{ old('status', $filters['status'] ?? '') == 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="adopted"
                                    {{ old('status', $filters['status'] ?? '') == 'adopted' ? 'selected' : '' }}>
                                    Adopted</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="date-filter">Date Listed:</label>
                            <select id="date-filter" name="date" class="form-control">
                                <option value="newest"
                                    {{ old('date', $filters['date'] ?? '') == 'newest' ? 'selected' : '' }}>Newest
                                </option>
                                <option value="oldest"
                                    {{ old('date', $filters['date'] ?? '') == 'oldest' ? 'selected' : '' }}>Oldest
                                </option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>

                </div>

                <!-- Pets Table -->
                <table>
                    <thead>
                        <tr>
                            <th>Pet ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Type</th>
                            <th>Breed</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pets as $pet)
                            <tr>
                                <td>{{ $pet->id }}</td>
                                <td>
                                    @if ($pet->image)
                                        <img src="{{ asset('storage/' . $pet->image) ?? 'https://via.placeholder.com/50' }}"
                                            alt="{{ $pet->name }}" class="pet-thumbnail">
                                    @else
                                        <span>No Image</span>
                                    @endif

                                </td>
                                <td>{{ $pet->name }}</td>
                                <td>
                                    @php
                                        $age = (int) \Carbon\Carbon::parse($pet->birth_date)->diffInYears(
                                            \Carbon\Carbon::now(),
                                        );
                                    @endphp
                                    {{ $age }} {{ Str::plural('year', $age) }}
                                </td>
                                <td>{{ ucfirst($pet->type) }}</td>
                                <td>{{ ucfirst(str_replace('_', ' ', $pet->breed)) }}</td>
                                <td>
                                    <span class="status {{ strtolower($pet->status) }}">
                                        {{ ucfirst($pet->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.view-pet', ['id' => $pet->id]) }}">

                                        <button class="action-btn view-btn"><i class="fas fa-eye"></i></button>
                                    </a>

                                    <a href="{{ route('admin.edit-pet', ['id' => $pet->id]) }}"><button
                                            class="action-btn edit-btn"><i class="fas fa-edit"></i></button></a>

                                    <form action="{{ route('client.delete-pet', $pet->id) }}" method="POST"
                                        style="display: inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this pet?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination links -->
                @if ($pets->hasPages())
                    <div class="pagination-container">
                        <ul class="pagination">
                            @if ($pets->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $pets->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($pets->getUrlRange(1, $pets->lastPage()) as $page => $url)
                                <li class="{{ $page == $pets->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($pets->hasMorePages())
                                <li><a href="{{ $pets->nextPageUrl() }}">&raquo;</a></li>
                            @else
                                <li class="disabled"><span>&raquo;</span></li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>

            <!-- Add Pet Modal (hidden by default) -->
            <div class="modal" id="add-pet-modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Add New Pet</h2>
                        <button class="close-modal">&times;</button>
                    </div>
                    <form class="modal-form" action="{{ route('admin.add-pet') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ old('name') }}" required placeholder="Enter pet's name">
                                @error('name')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" id="birth_date" class="form-control" name="birth_date"
                                    value="{{ old('birth_date') }}" required>
                                @error('birth_date')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="form-group">
                                <label for="pet-type">Type</label>
                                <select id="petType" name="type" class="form-control" required>
                                    <option value="" disabled selected>Select Pet Type</option>
                                    <option value="dog" {{ old('type') == 'dog' ? 'selected' : '' }}>Dog</option>
                                    <option value="cat" {{ old('type') == 'cat' ? 'selected' : '' }}>Cat</option>
                                    <option value="exotic" {{ old('type') == 'exotic' ? 'selected' : '' }}>Exotic
                                    </option>
                                    <option value="special_needs"
                                        {{ old('type') == 'special_needs' ? 'selected' : '' }}>
                                        Special Needs</option>

                                </select>
                                @error('type')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pet-breed">Breed</label>
                                <select id="petBreed" name="breed" class="form-control" required>
                                    <option value="" disabled selected>Select Breed</option>

                                    <!-- Dog Breeds -->
                                    <option data-type="dog" value="labrador"
                                        {{ old('breed') == 'labrador' ? 'selected' : '' }}>Labrador</option>
                                    <option data-type="dog" value="poodle"
                                        {{ old('breed') == 'poodle' ? 'selected' : '' }}>Poodle</option>
                                    <option data-type="dog" value="beagle"
                                        {{ old('breed') == 'beagle' ? 'selected' : '' }}>Beagle</option>
                                    <option data-type="dog" value="bulldog"
                                        {{ old('breed') == 'bulldog' ? 'selected' : '' }}>Bulldog</option>
                                    <option data-type="dog" value="shih_tzu"
                                        {{ old('breed') == 'shih_tzu' ? 'selected' : '' }}>Shih Tzu</option>
                                    <option data-type="dog" value="german_shepherd"
                                        {{ old('breed') == 'german_shepherd' ? 'selected' : '' }}>German Shepherd
                                    </option>
                                    <option data-type="dog" value="golden_retriever"
                                        {{ old('breed') == 'golden_retriever' ? 'selected' : '' }}>Golden Retriever
                                    </option>

                                    <!-- Cat Breeds -->
                                    <option data-type="cat" value="persian"
                                        {{ old('breed') == 'persian' ? 'selected' : '' }}>Persian</option>
                                    <option data-type="cat" value="siamese"
                                        {{ old('breed') == 'siamese' ? 'selected' : '' }}>Siamese</option>
                                    <option data-type="cat" value="maine_coon"
                                        {{ old('breed') == 'maine_coon' ? 'selected' : '' }}>Maine Coon</option>
                                    <option data-type="cat" value="bengal"
                                        {{ old('breed') == 'bengal' ? 'selected' : '' }}>Bengal</option>
                                    <option data-type="cat" value="ragdoll"
                                        {{ old('breed') == 'ragdoll' ? 'selected' : '' }}>Ragdoll</option>
                                    <option data-type="cat" value="scottish_fold"
                                        {{ old('breed') == 'scottish_fold' ? 'selected' : '' }}>Scottish Fold</option>
                                    <option data-type="cat" value="british_shorthair"
                                        {{ old('breed') == 'british_shorthair' ? 'selected' : '' }}>British Shorthair
                                    </option>

                                    <!-- Exotic Breeds -->
                                    <option data-type="exotic" value="macaw"
                                        {{ old('breed') == 'macaw' ? 'selected' : '' }}>Macaw</option>
                                    <option data-type="exotic" value="ball_python"
                                        {{ old('breed') == 'ball_python' ? 'selected' : '' }}>Ball Python</option>
                                    <option data-type="exotic" value="leopard_gecko"
                                        {{ old('breed') == 'leopard_gecko' ? 'selected' : '' }}>Leopard Gecko</option>
                                    <option data-type="exotic" value="iguana"
                                        {{ old('breed') == 'iguana' ? 'selected' : '' }}>Iguana</option>
                                    <option data-type="exotic" value="chameleon"
                                        {{ old('breed') == 'chameleon' ? 'selected' : '' }}>Chameleon</option>
                                    <option data-type="exotic" value="hedgehog"
                                        {{ old('breed') == 'hedgehog' ? 'selected' : '' }}>Hedgehog</option>
                                    <option data-type="exotic" value="fennec_fox"
                                        {{ old('breed') == 'fennec_fox' ? 'selected' : '' }}>Fennec Fox</option>
                                    <option data-type="exotic" value="sugar_glider"
                                        {{ old('breed') == 'sugar_glider' ? 'selected' : '' }}>Sugar Glider</option>
                                    <option data-type="exotic" value="turtle"
                                        {{ old('breed') == 'turtle' ? 'selected' : '' }}>Turtle</option>
                                    <option data-type="exotic" value="axolotl"
                                        {{ old('breed') == 'axolotl' ? 'selected' : '' }}>Axolotl</option>
                                    <option data-type="exotic" value="african_grey-parrot"
                                        {{ old('breed') == 'african_grey-parrot' ? 'selected' : '' }}>African Grey
                                        Parrot
                                    </option>
                                    <option data-type="exotic" value="ferret"
                                        {{ old('breed') == 'ferret' ? 'selected' : '' }}>Ferret</option>
                                    <option data-type="exotic" value="exotic_fish"
                                        {{ old('breed') == 'exotic_fish' ? 'selected' : '' }}>Exotic Fish</option>

                                    <!-- Others -->

                                </select>
                                @error('breed')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Select
                                        Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                                @error('gender')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="height">Height</label>
                                <input type="text" id="height" class="form-control" name="height"
                                    value="{{ old('height') }}" placeholder="Enter pet's height" required>
                                @error('height')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="text" id="weight" class="form-control" name="weight"
                                    value="{{ old('weight') }}" placeholder="Enter pet's weight" required>
                                @error('weight')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="temperament">Temperament</label>
                                <input type="text" id="temperament" class="form-control" name="temperament"
                                    value="{{ old('temperament') }}" required placeholder="Enter pet's temperament">
                                @error('temperament')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group">
                                <label for="good-with">Good With</label>
                                <input type="text" id="good-with" class="form-control" name="good_with"
                                    value="{{ old('good_with') }}" required
                                    placeholder="Enter who the pet is good with">
                            </div>
                            <div class="form-group">
                                <label for="spayed-neutered-status">Spayed/Neutered Status</label>
                                <select id="spayed-neutered-status" name="spayed_neutered_status"
                                    class="form-control" required>
                                    <option value="" disabled
                                        {{ old('spayed_neutered_status') == '' ? 'selected' : '' }}>Select status
                                    </option>
                                    <option value="yes"
                                        {{ old('spayed_neutered_status') == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no"
                                        {{ old('spayed_neutered_status') == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                                @error('spayed_neutered_status')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group">
                                <label for="vaccination_status">Vaccination Status</label>
                                <select id="vaccination_status" name="vaccination_status" class="form-control"
                                    required>
                                    <option value="" disabled
                                        {{ old('vaccination_status') == '' ? 'selected' : '' }}>Select status</option>
                                    <option value="vaccinated"
                                        {{ old('vaccination_status') == 'vaccinated' ? 'selected' : '' }}>Vaccinated
                                    </option>
                                    <option value="not_vaccinated"
                                        {{ old('vaccination_status') == 'not_vaccinated' ? 'selected' : '' }}>Not
                                        Vaccinated</option>
                                </select>
                                @error('vaccination_status')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="existing_conditions">Existing Conditions</label>
                                <input type="text" id="existing_conditions" class="form-control"
                                    name="existing_conditions" value="{{ old('existing_conditions') }}" required
                                    placeholder="Enter pet's existing condition">
                                @error('existing_conditions')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" name="description" rows="3" required
                                    placeholder="Enter pet's existing condition">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="" disabled {{ old('status') == '' ? 'selected' : '' }}>
                                        Select
                                        status</option>
                                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>
                                        Available</option>
                                    <option value="adopted" {{ old('status') == 'adopted' ? 'selected' : '' }}>
                                        Adopted
                                    </option>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                </select>
                                @error('status')
                                    <small class="input-error" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" id="image" name="image" class="form-control" multiple
                                accept="image/*">
                            @error('image')
                                <small class="input-error" style="color: red;">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary close-modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Pet</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </div>

    <script>
        // Simple modal toggle functionality
        document.getElementById('add-pet-btn').addEventListener('click', function() {
            document.getElementById('add-pet-modal').style.display = 'flex';
        });


        document.querySelectorAll('.close-modal').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('add-pet-modal').style.display = 'none';
            });
        });

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('add-pet-modal')) {
                document.getElementById('add-pet-modal').style.display = 'none';
            }
        });


        function showNotification(message, type = 'success', duration = 6000) {
            const container = document.getElementById('notification-container');
            const notif = document.createElement('div');
            notif.className = `notification ${type}`;
            notif.innerHTML = `
                <span>${message}</span>
                <span class="close-btn" onclick="this.parentElement.remove()">×</span>
            `;

            container.appendChild(notif);

            setTimeout(() => {
                notif.remove();
            }, duration);
        }
    </script>
</body>

</html>
