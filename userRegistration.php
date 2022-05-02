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
    }
?>