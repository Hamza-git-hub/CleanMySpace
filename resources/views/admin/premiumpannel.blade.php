<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Data Pannel</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f9fa; /* Change the background color as needed */
        }

        .logo {
            font-size: 24px;
            text-decoration: none;
            color: #333; /* Change the color as needed */
        }

        .navbar {
            display: flex;
        }

        .navbar a {
            margin-left: 20px;
            text-decoration: none;
            color: #333; /* Change the color as needed */
        }
        caption {
        font-size: 25px; /* Adjust the font size as needed */
        font-weight: bold; /* Adjust the font weight as needed */
        padding: 10px; /* Adjust the padding as needed */
        background-color: #f8f9fa; /* Adjust the background color as needed */
        color: #333; /* Adjust the color as needed */
        caption-side: top; /* Position the caption at the top */
    }

        /* Styles for the table */
.table {
    width: 100%;
    border-collapse: collapse;
    font-family: sans-serif;
    font-size: 13px; /* Increase the font size as needed */
}

.table th,
.table td {
    padding: 8px;
    border: 1px solid #000000;
    font-family: sans-serif;
    font-size: 13px; /* Increase the font size as needed */
}


                /* Styles for the approve button */
.approve-btn {
    background-color: green;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    border-radius: 4px;
}

/* Styles for the reject button */
.reject-btn {
    background-color: red;
    color: white;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
    border-radius: 4px;
}
/* Existing styles remain the same */

/* Responsive Styles */
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
        font-size: 0.8em;
    }
}

/* Additional styles for Premium Data Panel */
.table {
    background-color: #f2f2f2; /* Change the background color as needed */
}

.table th {
    color: #333; /* Change the color as needed */
}

.table td {
    color: #555; /* Change the color as needed */
}

.approve-btn,
.reject-btn {
    margin: 4px; /* Adjust margin as needed */
}

    </style>

</head>
<body>

<!--header section start-->
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


<table class="table">
    <caption>PremiumService Data</caption>
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
        @foreach ($premium as $view)
        <tr>
            <td>{{ $view->id }}</td>
            <td>{{ $view->firstname }}</td>
            <td>{{ $view->lastname }}</td>
            <td>{{ $view->email }}</td>
            <td>{{ $view->phone }}</td>
            <td>{{ $view->address }}</td>
            <td>{{ $view->room }}</td>
            <td>{{ $view->date }}</td>
            <td>{{ $view->payment_amount }}</td>
            <td>{{ $view->payment_status }}</td>
            <td>{{ $view->status }}</td>
            <td>
                <a href="{{ route('approvePremiumService', ['id' => $view->id]) }}" class="approve-btn">Approve</a><br><br>
                <a href="{{ route('rejectPremiumService', ['id' => $view->id]) }}" class="reject-btn">Reject</a><br><br>
            </td>
            <td>
                <a href="{{ route('approve.payment', ['id' => $view->id, 'type' => 'premium']) }}" class="approve-btn">Approve</a><br><br>
                <a href="{{ route('reject.payment', ['id' => $view->id, 'type' => 'premium']) }}" class="reject-btn">Reject</a><br><br>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
