<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactUs Data Pannel</title>

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


        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .table th,
            .table td {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 576px) {
            .table th,
            .table td {
                font-size: 12px;
            }
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
    <caption>ContactUs Data</caption>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
    </thead>
    <td>
        @foreach ($contactus as $message)
        <tr>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->message }}</td>
        </tr>
        @endforeach
    </td>
    <tbody>

    </tbody>
</table>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
