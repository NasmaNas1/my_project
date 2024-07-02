<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Hello User</h1>
    
    <table border="3">
          
            <?php foreach ($users as $user) { ?>
                <tr>
                <td> <?=  $user['id']?>    </td>
                <td> <?=  $user['Fname']?> </td>
                <td> <?=  $user['Lname']?> </td>
                <td> <?=  $user['birthday']?></td>            
               <td> <a href="edit?id=<?= $user['id'] ?>">Edit</a> </td>
                <td> <a href="delete?id=<?= $user['id'] ?>">Delete</a> </td>
                </tr>
                <?php } ?>
            
    </table>
    <h2>Add User</h2>
    <form method="post" action="add">
        <input type="text" name="Fname" placeholder="first name" required>
        <input type="text" name="Lname" placeholder="last name" required>
        <input type="date" name="birthday" required>
        <button type="submit">Add User</button>
    </form>
</body>
</html>