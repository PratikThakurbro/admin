<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background image */
        body {
            background-image: url('https://images.unsplash.com/photo-1732901384029-70545c0cc23e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDQ2fF9oYi1kbDRRLTRVfHxlbnwwfHx8fHw%3D'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
        }

        .container {
            height: 100vh; /* Full screen height */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 100%;  /* Full width on smaller screens */
            max-width: 450px; /* Fixed max-width on larger screens */
            background-color: rgba(255, 255, 255, 0.9); /* Transparent white background for the card */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #007BFF;
        }

        .form-label, .form-control, .btn {
            margin-bottom: 20px;
        }

        .btn {
            font-size: 1.1rem;
            font-weight: 500;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
            cursor: pointer;
        }
        .error-message{
            color: red;
        }
        .text-center {
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        /* Responsive design for smaller devices */
        @media (max-width: 767px) {
            .card {
                width: 90%; /* For smaller screens, card takes 90% of the screen width */
            }
        }
    </style>
</head>
<body>
<?php
session_start(); // Start session to access the error message
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <!-- Login Form -->
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                
                <!-- Display error message if set in session -->
                <div class="mb-3">
                    <?php
                    // Check if error message is set in session
                    if (isset($_SESSION['error_message'])) {
                        echo '<p class="text-danger">' . $_SESSION['error_message'] . '</p>';
                        // Clear error message after displaying
                        unset($_SESSION['error_message']);
                    }
                    ?>
                </div>
                
                <button type="submit" class="btn w-100">Login</button>
            </form>
            
            <!-- Register Link -->
            <div class="text-center">
                <small>Don't have an account? <a href="register.php" style="color: #007BFF;">Sign up</a></small>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
