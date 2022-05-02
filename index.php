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
            <form action="index.php" method="post">
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
        <?php
            function allSet(){
                return (
                    isset($_POST['firstName'])&&
                    isset($_POST['lastName'])&&
                    isset($_POST['mail'])&&
                    isset($_POST['password'])&&
                    isset($_POST['confirm-password'])&&
                    ($_POST['password']===$_POST['confirm-password'])
                );
            }

            if(allSet()){
                $userID= rand();
                $new_message = array(
                    "id" => $userID,
                    "firstName" => $_POST['firstName'],
                    "lastName" => $_POST['lastName'],
                    "mail" => $_POST['mail'],
                    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    "isAdmin" => "false"
                );
                //$isPasswordCorrect = password_verify($_POST['password'], $existingHashFromDb);  for checking
                if(filesize("./JSON/users.json") == 0){
                    $first_record = array($new_message);
                    $data_to_save = $first_record;
                }else{

                    $old_records = json_decode(file_get_contents("./JSON/users.json"));

                    array_push($old_records, $new_message);
                    $data_to_save = $old_records;

                }

                $encoded_data = json_encode($data_to_save, JSON_PRETTY_PRINT);

                if(!file_put_contents("./JSON/users.json", $encoded_data, LOCK_EX)){

                    echo '<script>alert("signup ERROR")</script>';

                }else{
                   setcookie("userID", $userID, time() + (86400 * 30));
                }
            }else{
                echo '<script>window.alert("PASSWORDS NOT MATCHING");</script>';
            }
        ?>
    </body>
</html>