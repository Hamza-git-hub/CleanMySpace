<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Team Member</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f9fa;
        }

        .logo {
            font-size: 24px;
            text-decoration: none;
            color: #333;
        }

        .navbar {
            display: flex;
        }

        .navbar a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
        }

        /* Form container styling */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px;
            background-color: #f4f4f9;
            height: 100vh;
            flex-direction: column;
        }

        form {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        /* Success message styling */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }

        @media screen and (max-width: 768px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<!-- Header Section -->
<section class="header">
    <a href="home" class="logo">Clean My Space.</a>
    <div class="content" style="font-size: 1.5rem;"></div>
    <nav class="navbar">
        <a href="adminhomepage">Classic</a>
        <a href="platinumpannel">Platinum</a>
        <a href="premiumpannel">Premium</a>
        <a href="addTeamMember">AddTeam</a>
        <a href="addService">AddServices</a>
        <a href="members">Members</a>
        <a href="contactuspannel">ContactUs</a>
        <a href="report">Report</a>
        <a href="logout">Logout</a>
    </nav>
      <div id="menu-btn" class="fas fa-bars"></div>
</section>

<!-- Form Section -->
<div class="form-container">

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required>

        <label for="details">Details:</label>
        <textarea id="details" name="details" required></textarea>

        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" required>

        <button type="submit">Add Team Member</button>
    </form>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.content');

    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        content.classList.toggle('open');
    });
</script>

</body>
</html>
