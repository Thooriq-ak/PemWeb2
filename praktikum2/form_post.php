<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Login</h1>
        <form action="submit_post.php" method="POST">
            <div>
                <label for="">User Name</label>
                <input type="text" name="user_name" id="user_name" required>
            </div><br>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div><br>
            <button type="submit">Register</button>
        </form>
</body>
</html>