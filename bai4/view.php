<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP2 - LAB1.4 - PC06110</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Bảng Người Dùng</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>UserType</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $i++?></td>
                        <td><?= $user['Username']?></td>
                        <td><?= $user['UserType']?></td>
                        <td><?= $user['Phone']?></td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>