<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts Index</title>
</head>
<body>

    <h1>Welcome to the Posts Index</h1>


    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">User:</label>
        <input type="text" id="2" value="" name="user_id" required>
        <br>
        <label for="content">Email:</label>
        <textarea id="email" name="email" required></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
