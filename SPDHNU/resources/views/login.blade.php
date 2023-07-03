<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
</head>
<body>
    <form method="post">
        @csrf
        <label for="email">Username</label>
        <input type="email" name="email" id="usernmae">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">LOGIN</button>
    </form>
</body>
</html>
