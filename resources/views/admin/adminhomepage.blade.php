<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Data Panel</title>

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

        caption {
            font-size: 30px;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            padding: 10px;
            background-color: #f8f9fa;
            color: #333;
            caption-side: top;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 13px;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #000000;
            font-family: sans-serif;
            font-size: 13px;
        }

        .approve-btn,
        .reject-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 4px 8px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px; /* Small font size */
            margin-right: 5px; /* Add margin for spacing */
        }

        .reject-btn {
            background-color: red;
        }

        @media screen and (max-width: 768px) {
            .table th,
            .table td {
                font-size: 14px;
            }
            caption {
                font-size: 1em;
            }
        }

        @media screen and (max-width: 576px) {
            .table th,
            .table td {
                font-size: 12px;
            }
            caption {
                font-size: 1em;
            }
        }
    </style></head>
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

<table class="table">
    <caption>ClassicService Data</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Services</th>
            <th>Date</th>
            <th>Payment Amount</th>
            <th>Payment Status</th>
            <th>Service Status</th>
            <th>Service Actions</th>
            <th>Payment Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($classics as $classicService)
        <tr>
            <td>{{ $classicService->id }}</td>
            <td>{{ $classicService->firstname }}</td>
            <td>{{ $classicService->lastname }}</td>
            <td>{{ $classicService->email }}</td>
            <td>{{ $classicService->phone }}</td>
            <td>{{ $classicService->address }}</td>
            <td>{{ $classicService->service_type }}</td>
            <td>{{ $classicService->date }}</td>
            <td>{{ $classicService->payment_amount }}</td>
            <td>{{ $classicService->payment_status }}</td>
            <td>{{ $classicService->status }}</td>
            <td>
                <a href="{{ route('approveClassicService', ['id' => $classicService->id]) }}" class="approve-btn">Approve</a><br><br>
                <a href="{{ route('rejectClassicService', ['id' => $classicService->id]) }}" class="reject-btn">Reject</a><br><br>
            </td>
            <td>
                <a href="{{ route('approve.payment', ['id' => $classicService->id, 'type' => 'classic']) }}" class="approve-btn">Approve</a><br><br>
                <a href="{{ route('reject.payment', ['id' => $classicService->id, 'type' => 'classic']) }}" class="reject-btn">Reject</a><br><br>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
