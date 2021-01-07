<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($users):
            foreach($users as $user):
                echo $user['id'];
                echo $user['title'];
            endforeach;
        endif;
    ?>
</body>
</html>