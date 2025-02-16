<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
    <h2>Submit Form</h2>
    <form action="{{ url('/submit') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter Name">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
