<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

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

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            margin-top: 30px;
        }

        .credit {
            color: #333;
        }

        @media screen and (max-width: 768px) {
            h1 {
                font-size: 24px;
            }
            button {
                width: 100%;
            }
        }

        form {
    display: flex;
    flex-direction: column;
    max-width: 400px;
    margin: auto;
}

label {
    margin: 10px 0 5px;
    font-weight: bold;
}

input[type="text"], select, input[type="file"], textarea {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

textarea {
    resize: none; /* Disable manual resizing */
}

button {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
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

    <div class="container">
        <h1>Add New Service</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('services.storeservice') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="category">Category:</label>
            <select name="category" required>
                <option value="">Select Category</option>
                <option value="Classic">Classic</option>
                <option value="Premium">Premium</option>
                <option value="Platinum">Platinum</option>
                <option value="Other">Other Services</option>
            </select>

            <label for="name">Service Name:</label>
            <input type="text" name="name" required>

            <label for="price">Price:</label>
            <input type="text" name="price" required>

            <label for="image">Image:</label>
            <input type="file" name="image" required>

            <label for="details">Service Details:</label>
            <textarea name="details" rows="4" placeholder="Enter service details here..." required></textarea>

            <button type="submit">Add Service</button>
        </form>

        <a href="{{ route('services.create') }}" style="display: block; margin-top: 20px; text-align: center; color: #007bff;">Back to Services List</a>
    </div>

    <footer>
        <div class="credit"> Created By <span>Mr. Hamza Momin & Mr. Shadan Ansari</span> | All Rights Reserved! </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
