<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Edit User</h1>
    <form method="post" action="update?id=<?= $user['id'] ?>">
        <input type="text" name="Fname" placeholder="first name" value="<?= $user['Fname'] ?>" required>
        <input type="text" name="Lname" placeholder="last name" value="<?= $user['Lname'] ?>" required>
        <input type="date" name="birthday"  value="<?= $user['birthday'] ?>" required>
        <button type="submit">Update User</button>
    </form>
</body>
</html>