
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Student Management System</title>
    <style>
        /* Apply Nunito font to the whole document */
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa; 
            margin: 0;
            padding: 0;
        }

        /* The side navigation menu */
        .sidebar {
            margin: 5px;
            padding: 5px;
            width: 200px;
            background-color: lightgreen;
            position: fixed;
            height: 100%;
            overflow: auto;
            top: 0;
            left: 0;
        }

        /* Sidebar links */
        .sidebar a {
            display: block;
            color: black;
            padding: 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Active/current link */
        .sidebar a.active, .sidebar a.active:hover {
            background-color: #04AA6D;
            color: white;
        }

        /* Links on mouse-over */
        .sidebar a:hover:not(.active) {
            background-color: #04AA6D;
            color: white;
        }

        /* Page content */
        .content {
            margin-left: 200px;
            padding: 10px;
            min-height: 100vh;
        }

        /* Navbar styling */
        .header {
            margin-left: 200px;
            margin-bottom: 5px;
            position: relative;
            padding: 15px;
            background-color: #f8f9fa; /* Match the navbar color */
        }

        .header h2 {
            margin: 5px;
            font-size: 2rem;
            text-align: center;
            margin-right: 100px;
        }

        /* Logout button styling */
        .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #04AA6D;
            color: black;
            border: none;
            border-radius: 3px;
            padding: 5px 10px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .logout-button:hover {
            background-color: #037d55;
            text-decoration: none;
            color: white;
            transform: scale(1.05);
        }

        .logout-button:focus, .logout-button:active {
            outline: none;
            box-shadow: none;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {
                float: left;
            }
            .content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <header class="header">
            <h2>Student Management System</h2>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="logout-button">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </header>

        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                    <a class="{{ request()->routeIs('Students.*') ? 'active' : '' }}" href="{{ route('Students.index') }}">
                        <i class="fas fa-user-graduate"></i> Student
                    </a>
                    <a class="{{ request()->routeIs('Teachers.*') ? 'active' : '' }}" href="{{ route('Teachers.index') }}">
                        <i class="fas fa-chalkboard-teacher"></i> Teacher
                    </a>
                    <a class="{{ request()->routeIs('Courses.*') ? 'active' : '' }}" href="{{ route('Courses.index') }}">
                        <i class="fas fa-book-open"></i> Courses
                    </a>
                    <a class="{{ request()->routeIs('Batches.*') ? 'active' : '' }}" href="{{ route('Batches.index') }}">
                        <i class="fas fa-layer-group"></i> Batches
                    </a>
                    <a class="{{ request()->routeIs('Enrollments.*') ? 'active' : '' }}" href="{{ route('Enrollments.index') }}">
                        <i class="fas fa-user-plus"></i> Enrollment
                    </a>
                    <a class="{{ request()->routeIs('Payments.*') ? 'active' : '' }}" href="{{ route('Payments.index') }}">
                        <i class="fas fa-credit-card"></i> Payment
                    </a>
                </div>
            </div>

            <div class="col-md-10 content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/3X2m5oP4xJ7Ff19FkDoh4STU95hOBc6PaI7CCk" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-k5vS75mE6g5DHK7mP6K6uMIH9CZl5L1rkn2eD/GgF9JtXKq7J1yFQ8FzsmRk6pC" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8j4n5yxA3F4KXbJ6R/mbk+zT5P7/hmCkC1+40p7nSzmXIj8f" crossorigin="anonymous"></script>
</body>
</html>
