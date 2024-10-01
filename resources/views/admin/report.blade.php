<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            font-family: sans-serif;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px 15px;
            font-size: 15px;
            font-family: sans-serif;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .header {
            background-color: #f8f9fa;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: relative; /* Added for positioning menu button */
        }
        .logo {
            font-size: 1.5rem;
            color: #fff;
            text-decoration: none;
        }
        .navbar {
            display: flex;
            justify-content: center;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        .navbar a:hover {
            color: #ffd700;
        }
        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: center;
            }
            .navbar a {
                margin: 10px 0;
            }
        }
        @media only screen and (max-width: 768px) {
            table {
                overflow-x: auto;
            }
        }
        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
            table {
                font-size: 25px;
            }
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
        <h1>Approved and Rejected Services Report</h1>

        <table>
            <thead>
                <tr>
                    <th>Service Type</th>
                    <th>Approved</th>
                    <th>Rejected</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Classic Services</td>
                    <td>{{ $approvedClassicServices }}</td>
                    <td>{{ $rejectedClassicServices }}</td>
                </tr>
                <tr>
                    <td>Platinum Services</td>
                    <td>{{ $approvedPlatinumServices }}</td>
                    <td>{{ $rejectedPlatinumServices }}</td>
                </tr>
                <tr>
                    <td>Premium Services</td>
                    <td>{{ $approvedPremiumServices }}</td>
                    <td>{{ $rejectedPremiumServices }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <th>{{ $approvedTotal }}</th>
                    <th>{{ $rejectedTotal }}</th>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
