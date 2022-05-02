<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOG IN</title>
        <link rel="stylesheet" href="./style/style.css">
    </head>

    <body>
        <main>
            <h1>LOG IN</h1>
            <form action="validate.php" method="post">
                <label for="mail">
                        MAIL:
                        <input type="email" name="mail" id="mail" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required>
                </label>

                <label for="password">
                        PASSWORD:
                        <input type="password" name="password" id="password" required>
                </label>
            
            </form>
        </main>
        
    </body>
</html>