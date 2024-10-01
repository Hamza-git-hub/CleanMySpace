<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Team Member</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
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
    </style>
</head>
<body>

<div class="form-container">
    <form action="{{ route('admin.team.update', $member->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Spoofing PUT method -->

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $member->name }}" required>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" value="{{ $member->role }}" required>

        <label for="details">Details:</label>
        <textarea id="details" name="details" required>{{ $member->details }}</textarea>

        <label for="image">Upload New Image (optional):</label>
        <input type="file" id="image" name="image">

        <button type="submit">Update Team Member</button>
    </form>

    </div>

</body>
</html>
