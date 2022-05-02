<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>input</title>
        <link rel="stylesheet" href="./style/style.css">
    </head>

    <body>
        <main>
            <h1>SIGN UP</h1>
            <form action="userRegistration.php" method="post">
                <label for="name">
                    FIRST NAME:
                    <input type="text" name="firstName" id="firstName" pattern="[a-zA-Z_]+" required>
                </label>

                <label for="lastName">
                    LAST NAME:
                    <input type="text" name="lastName" id="lastName" pattern="[a-zA-Z_]+" required>
                </label>
                
                <label for="mail">
                    MAIL:
                    <input type="email" name="mail" id="mail" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required>
                </label>
                
                <label for="password">
                    PASSWORD:
                    <input type="password" name="password" id="password" required>
                </label>

                <label for="confirm-password">
                    CONFIRM PASSWORD:
                    <input type="password" name="confirm-password" id="confirm-password" required>
                </label>

                <input type="submit" value="SUBMIT" id="submit">
            </form>
        </main>

        <script src="./js/main.js"></script>

    </body>
</html>