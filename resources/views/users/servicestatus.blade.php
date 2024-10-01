<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Services Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Additional Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            margin-top: 30px;
            text-align: center;
        }
        h2 {
            margin-top: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 15px;
        }
        th {
            background-color: #f2f2f2;
        }

        .payment-status {
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 4px;
            color: white;
        }

        /* Status Colors */
        .status-approved {
            color: green;
        }
        .status-rejected {
            color: red;
        }

        /* Button Styles */
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <section class="header">
        <a href="home" class="logo">Clean My Space.</a>
        <nav class="navbar">
            <a href="dashboard">Home</a>
            <a href="package">Package</a>
            <a href="servicechart">Chart</a>
            <a href="team">Team</a>
            <a href="about">About</a>
            <a href="servicestatus">Status</a>
            <a href="contactus">ContactUs</a>
            <a href="logout">Logout</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>

<div class="container">
    <h1>User Services Status</h1>

    <h2>Classic Services</h2>
    <table>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Email</th>
                <th>Service Name</th>
                <th>Date</th>
                <th>Payment Status</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statusClassic as $classicService)
                <tr>
                    <td>{{ $classicService->firstname }}</td>
                    <td>{{ $classicService->email }}</td>
                    <td>{{ $classicService->service_type }}</td>
                    <td>{{ $classicService->date }}</td>
                    <td class="payment-status {{ $classicService->payment_status == 'approved' ? 'status-approved' : 'status-rejected' }}">
                        {{ $classicService->payment_status }}
                    </td>

                    <td class="@if($classicService->status == 'approved') status-approved @else status-rejected @endif">{{ $classicService->status }}</td>
                    <td>

                        <button class="delete-btn" onclick="deleteClassicService('{{ $classicService->id }}', {{ $classicService->payment_amount }})">Delete</button>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Premium Services</h2>
<table>
    <thead>
        <tr>
            <th>Firstname</th>
            <th>Email</th>
            <th>Service Name</th>
            <th>Date</th>
            <th>Payment Status</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($statusPremium as $premiumService)
        <tr>
            <td>{{ $premiumService->firstname }}</td>
            <td>{{ $premiumService->email }}</td>
            <td>{{ $premiumService->room }}</td>
            <td>{{ $premiumService->date }}</td>
            <td class="payment-status {{ $premiumService->status == 'approved' ? 'status-approved' : 'status-rejected' }}">
                {{ $premiumService->payment_status }}
            </td>
            <td class="@if($premiumService->status == 'approved') status-approved @else status-rejected @endif">
                {{ $premiumService->status }}
            </td>
            <td>

                <button class="delete-btn" onclick="deletePremiumService('{{ $premiumService->id }}', {{ $premiumService->payment_amount }})">Delete</button>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

<h2>Platinum Services</h2>
<table>
    <thead>
        <tr>
            <th>Firstname</th>
            <th>Email</th>
            <th>Service Name</th>
            <th>Date</th>
            <th>Payment Status</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($statusplatinum as $platinumService)
        <tr>
            <td>{{ $platinumService->firstname }}</td>
            <td>{{ $platinumService->email }}</td>
            <td>{{ $platinumService->room }}</td>
            <td>{{ $platinumService->date }}</td>
            <td class="payment-status {{ $platinumService->payment_status == 'approved' ? 'status-approved' : 'status-rejected' }}">
                {{ $platinumService->payment_status }}
            </td>
            <td class="@if($platinumService->status == 'approved') status-approved @else status-rejected @endif">{{ $platinumService->status }}</td>
            <td>

                <button class="delete-btn" onclick="deletePlatinumService('{{ $platinumService->id }}', {{ $platinumService->payment_amount }})">Delete</button>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
<script>
   function deleteClassicService(id, amount) {
    const fixedCharge = 350; // Fixed cancellation charge in rupees
    if (confirm('Are you sure you want to delete this classic service? A cancellation charge of ₹' + fixedCharge + ' will apply.')) {
        window.location.href = "{{ route('cancelservice', ['id' => ':id']) }}".replace(':id', id);
    }
}

function deletePremiumService(id, amount) {
    const fixedCharge = 600; // Fixed cancellation charge in rupees
    if (confirm('Are you sure you want to delete this premium service? A cancellation charge of ₹' + fixedCharge + ' will apply.')) {
        window.location.href = "{{ route('premiumcancel', ['id' => ':id']) }}".replace(':id', id);
    }
}

function deletePlatinumService(id, amount) {
    const fixedCharge = 800; // Fixed cancellation charge in rupees
    if (confirm('Are you sure you want to delete this platinum service? A cancellation charge of ₹' + fixedCharge + ' will apply.')) {
        window.location.href = "{{ route('platinumcancel', ['id' => ':id']) }}".replace(':id', id);
    }
}

</script>
</body>
</html>
