<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Services</title>
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

        /* Add some basic styles */
        .service-table {
            width: 100%;
            border-collapse: collapse;
        }

        .service-table th, .service-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            font-size: 16px;
        }

        .service-table th {
            background-color: #f4f4f4;
        }

        .button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #218838;
        }

        .heading h1 {
            color: #8e44ad; /* Change color here (Tomato red) */
            font-size: 2.5em; /* Optional: Adjust size */
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
            <a href="viewServices">Services</a>
            <a href="contactuspannel">ContactUs</a>
            <a href="report">Report</a>
            <a href="logout">Logout</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>

<div class="heading">
    <h1>Manage Services</h1>
</div>

<div class="content">
    <table class="service-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th>Service Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Details</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->category }}</td>
                    <td>₹{{ $service->price }}</td>
                    <td>{{ $service->details }}</td>
                    <td>
                        @if($service->image)
                            <img src="{{ asset('storage/services/' . basename($service->image)) }}" alt="{{ $service->name }}" width="100">
                        @else
                            No image available
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="button">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" onclick="return confirm('Are you sure you want to delete this service?');">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <a href="{{ route('admin.services.create') }}" class="button">Add New Service</a> --}}
</div>

</body>
</html>
