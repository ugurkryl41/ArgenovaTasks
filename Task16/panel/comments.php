<?php include ("../db.php");  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 16</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
</head>

<body>
    <div class="container">
        <div class="jumbotron" style="margin-top: 15vh;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">PostID</th>
                        <th scope="col">Author</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Date</th>
                        <th scope="col">Text</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query  = $db->query("SELECT * FROM comments ORDER BY cdate DESC",PDO::FETCH_ASSOC);
                        while($row = $query->fetch(PDO::FETCH_ASSOC))
                        {
                            $commentid=$row["Id"];
                            $commentpostid = $row["postid"];
                            $commentname= $row["vname"];
                            $commentmail = $row["mail"];
                            $commenttext = $row["ctext"];
                            $commentdate = $row["cdate"];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $commentid ?></th>
                        <td><?php echo $commentpostid ?></td>
                        <td><?php echo $commentname ?></td>
                        <td><?php echo $commentmail ?></td>
                        <td><?php echo $commentdate ?></td>
                        <td style="width: 50%"><?php echo $commenttext ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>