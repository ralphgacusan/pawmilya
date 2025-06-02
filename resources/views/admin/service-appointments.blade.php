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
                <li><a href="{{ route('admin.pet') }}"><i class="fas fa-paw"></i>Pet Management</a>
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
                <li><a href="{{ route('admin.service-appointments') }}" class="active"><i
                            class="fas fa-calendar-alt"></i>Service
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
                <h1>Service Appointments</h1>
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
                    <h2>All Appointments</h2>
                    <div class="table-actions">
                        {{-- <button class="btn btn-primary" id="add-pet-btn">
                            <i class="fas fa-plus"></i> Add New Pet
                        </button> --}}
                    </div>
                </div>
                <div class="filter-form">
                    <form action="{{ route('admin.service-appointments') }}" method="GET" class="filter-options">
                        <div class="filter-group">
                            <label for="search">Search (service name):</label>
                            <div class="search-box">
                                <i class="fas fa-search"></i>
                                <input type="text" id="search" name="search" class="form-control"
                                    placeholder="Search service..."
                                    value="{{ old('search', $filters['search'] ?? '') }}">
                            </div>
                        </div>


                        <div class="filter-group">
                            <label for="date-filter">Date Created:</label>
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

                <table class="table">
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Service Name</th>
                            <th>Owner Full Name</th>
                            <th>Pet Name</th>
                            <th>Pet Type</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->service ? $appointment->service->name : 'No service assigned' }}
                                </td>
                                <td>{{ $appointment->user->first_name }} {{ $appointment->user->last_name }}</td>
                                <td>{{ $appointment->pet_name }}</td>
                                <td>{{ $appointment->pet_type }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->date)->format('F d, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
                                <td>
                                    <a
                                        href="{{ route('admin.edit-service-appointment', ['id' => $appointment->id]) }}">
                                        <button class="action-btn edit-btn"><i class="fas fa-edit"></i></button>
                                    </a>

                                    <a href="{{ route('admin.appointment-details', $appointment->id) }}"> <button
                                            class="action-btn view-btn"><i class="fas fa-eye"></i></button>
                                    </a>
                                    <form action="{{ route('admin.delete-service-appointment', $appointment->id) }}"
                                        method="POST" style="display: inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No appointments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Pagination Links for Service Appointments -->
                @if ($appointments->hasPages())
                    <div class="pagination-container text-center mt-4">
                        <ul class="pagination justify-content-center">
                            {{-- Previous Page --}}
                            @if ($appointments->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $appointments->previousPageUrl() }}"
                                        aria-label="Previous">
                                        &laquo;
                                    </a>
                                </li>
                            @endif

                            {{-- Page Numbers --}}
                            @foreach ($appointments->getUrlRange(1, $appointments->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $appointments->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Next Page --}}
                            @if ($appointments->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $appointments->nextPageUrl() }}" aria-label="Next">
                                        &raquo;
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    </div>
                @endif






        </main>
    </div>

    <script>
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
