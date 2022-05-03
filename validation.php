<?php
    $userID;
    $name;
    

    function allSet(){
        return isset($_POST['mail'])&&isset($_POST['password']);
    }

    function checkMail($mail, $password){
        $strJsonFileContents = file_get_contents("./JSON/users.json");
        $array = json_decode($strJsonFileContents, true);
        foreach($array as $data){
            
            if($data['mail']==$mail&&password_verify($password, $data['password'])){
                $GLOBALS['userID'] = $data['userID'];
                $GLOBALS['name'] = $data['firstName']." ".$data['lastName'];
                return true;
            }
        }
        return false;
    }  
    
    if(allSet()&&checkMail($_POST['mail'], $_POST['password'])){
        if(isset($_POST['remember'])){
            setcookie('ID', $userID, time()+60*60*7);
            session_start();
            $_SESSION['name']=$name;
            header("location: welcome.php");
        }
    }

    /*
    {
        "id": 1381926042,
        "firstName": "Gevorg",
        "lastName": "Alaverdyan",
        "mail": "afd@gmail.com",
        "password": "$2y$10$EslMKDFSxqNUW.p9YpwNmeQY\/RnDTqre9IMhYcsvbDjpDw2KAq8Ly",-> a
        "isAdmin": "false"
    }
    */
?>