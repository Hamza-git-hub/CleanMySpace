<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

   <link rel="stylesheet" href="css/style2.css">

   <style>
      body {
         font-family: 'Arial', sans-serif;
         background-color: #f8f9fa;
         margin: 0;
         padding: 20px;
      }

      h1 {
         text-align: center;
         color: #007bff;
      }

      table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
      }

      th, td {
         border: 1px solid #ced4da;
         padding: 10px;
         text-align: left;
      }

      th {
         background-color: #007bff;
         color: #fff;
      }

      a {
         text-decoration: none;
         color: #007bff;
         display: block;
         text-align: center;
         margin-top: 10px;
      }
   </style>

</head>
<body>

    <h1>Dashboard</h1>
    <hr>
    <table class="table">
        <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </thead>
        <tbody>
            <td>{{$data->firstname}}</td>
            <td>{{$data->lastname}}</td>
            <td>{{$data->email}}</td>
            <td><a href="logout">Logout</a></td>
        </tbody>
    </table>

</body>
</html>
