<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User View</title>
    </head>
    <body>
        <h1>
            <?php

                // echo $results;
                foreach($results as $res)
                {
                    echo $res->username . '<br>';
                }
            ?>
        </h1>
    </body>
</html>