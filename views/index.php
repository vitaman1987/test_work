
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="title">
    <br><br>
    <input type="text" name="text">
    <input type="submit" name="Save">
</form>

<?php

    if(isset($_REQUEST['posts'])) {
        echo '<div>';
        foreach ($_REQUEST['posts'] as $post) {
            echo '<p>id: ' . $post['id'] . ', title: ' . $post['title'] . ', text : ' . $post['text'] . '</p>';
        }

        echo '</div>';
    }
?>


</body>
</html>
