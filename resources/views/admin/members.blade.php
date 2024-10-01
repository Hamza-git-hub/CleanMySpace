<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        .team-members-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .team-member {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 280px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 4px solid #28a745;
        }

        .team-member h3 {
            margin: 10px 0;
            font-size: 20px;
            color: #333;
        }

        .team-member p {
            margin-bottom: 10px;
            font-size: 14px;
            color: #666;
        }

        .team-member .role {
            font-weight: bold;
            color: #28a745;
        }

        @media screen and (max-width: 768px) {
            .team-members-container {
                flex-direction: column;
                align-items: center;
            }

            .team-member {
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

<!-- Team Members Section -->
<div class="team-members-container">
    @foreach($teamMembers as $member)
        <div class="team-member">
            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
            <h3>{{ $member->name }}</h3>
            <p class="role">{{ $member->role }}</p>
            <p>{{ $member->details }}</p>

            <!-- Update Button -->
            <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-primary">Update</a>

            <!-- Delete Button (Form to trigger delete action) -->
            <form action="{{ route('admin.team.delete', $member->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this team member?');">Delete</button>
            </form>
        </div>
    @endforeach
</div>


<script src="js/script.js"></script>
</body>
</html>
