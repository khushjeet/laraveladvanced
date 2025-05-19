<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
</head>
<body>

<div>
<form action="{{ route('send.email') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
    </div>


    <button type="submit">Send Email</button>
</form>


</body>
</html>
