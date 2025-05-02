<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Pet Adoption Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/admin/dashboard.css'])

</head>

<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>PetAdopt Admin</h2>
                <p>Administration Panel</p>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="manage.html"><i class="fas fa-paw"></i> Pets Management</a></li>
                <li><a href="user.html"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="application.html"><i class="fas fa-file-alt"></i> Applications</a></li>
                <li><a href="rehomeadmin.html"><i class="fas fa-home"></i> Rehoming Requests</a></li>
                <li><a href="appointment.html"><i class="fas fa-calendar-alt"></i> Appointments</a></li>
                <li><a href="message.html"><i class="fas fa-envelope"></i> Messages</a></li>
                <li><a href="report.html"><i class="fas fa-chart-bar"></i> Reports</a></li>
                <li><a href="setting.html"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </aside>


        <main class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
                <div class="user-info">
                    <img src="https://via.placeholder.com/40" alt="Admin User">
                    <span>Admin User</span>
                </div>
            </div>


            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>Total Pets</h3>
                            <h2>142</h2>
                            <p>+12 this week</p>
                        </div>
                        <div class="card-icon pets">
                            <i class="fas fa-paw"></i>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>Registered Users</h3>
                            <h2>356</h2>
                            <p>+8 this week</p>
                        </div>
                        <div class="card-icon users">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>Adoption Applications</h3>
                            <h2>84</h2>
                            <p>5 pending review</p>
                        </div>
                        <div class="card-icon applications">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>Rehoming Requests</h3>
                            <h2>23</h2>
                            <p>3 new today</p>
                        </div>
                        <div class="card-icon reports">
                            <i class="fas fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Applications Table -->
            <div class="table-container">
                <div class="table-header">
                    <h2>Recent Adoption Applications</h2>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search...">
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pet</th>
                            <th>Applicant</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#AD-2023-001</td>
                            <td>Max (Dog)</td>
                            <td>Sarah Johnson</td>
                            <td>2023-06-15</td>
                            <td><span class="status pending">Pending</span></td>
                            <td>
                                <button class="action-btn view-btn">View</button>
                                <button class="action-btn edit-btn">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#AD-2023-002</td>
                            <td>Whiskers (Cat)</td>
                            <td>Michael Brown</td>
                            <td>2023-06-14</td>
                            <td><span class="status approved">Approved</span></td>
                            <td>
                                <button class="action-btn view-btn">View</button>
                                <button class="action-btn edit-btn">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#AD-2023-003</td>
                            <td>Buddy (Dog)</td>
                            <td>Emily Davis</td>
                            <td>2023-06-13</td>
                            <td><span class="status rejected">Rejected</span></td>
                            <td>
                                <button class="action-btn view-btn">View</button>
                                <button class="action-btn edit-btn">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#AD-2023-004</td>
                            <td>Luna (Cat)</td>
                            <td>David Wilson</td>
                            <td>2023-06-12</td>
                            <td><span class="status pending">Pending</span></td>
                            <td>
                                <button class="action-btn view-btn">View</button>
                                <button class="action-btn edit-btn">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#AD-2023-005</td>
                            <td>Rocky (Dog)</td>
                            <td>Jennifer Lee</td>
                            <td>2023-06-11</td>
                            <td><span class="status approved">Approved</span></td>
                            <td>
                                <button class="action-btn view-btn">View</button>
                                <button class="action-btn edit-btn">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Add New Pet Form -->
            <div class="form-container">
                <h2>Add New Pet</h2>
                <form>
                    <div class="form-group">
                        <label for="pet-name">Pet Name</label>
                        <input type="text" id="pet-name" class="form-control" placeholder="Enter pet name">
                    </div>
                    <div class="form-group">
                        <label for="pet-type">Type</label>
                        <select id="pet-type" class="form-control">
                            <option value="">Select pet type</option>
                            <option value="dog">Dog</option>
                            <option value="cat">Cat</option>
                            <option value="bird">Bird</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pet-breed">Breed</label>
                        <input type="text" id="pet-breed" class="form-control" placeholder="Enter breed">
                    </div>
                    <div class="form-group">
                        <label for="pet-age">Age</label>
                        <input type="number" id="pet-age" class="form-control" placeholder="Enter age">
                    </div>
                    <div class="form-group">
                        <label for="pet-description">Description</label>
                        <textarea id="pet-description" class="form-control" rows="3" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pet-image">Upload Image</label>
                        <input type="file" id="pet-image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Pet</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
