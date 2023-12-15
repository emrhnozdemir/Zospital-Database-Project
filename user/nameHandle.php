<body>
<?php
    
    session_start();
    $URL = "https://cs306-step4-cc8af-default-rtdb.firebaseio.com/Users.json";
    $URL_chat = "https://cs306-step4-cc8af-default-rtdb.firebaseio.com/Chats.json";
    

    function getUsers(){
        global $URL;
        $ch = curl_init();
        curl_setopt_array($ch, [ CURLOPT_URL => $URL,
                                CURLOPT_POST => FALSE, // It will be a get request
                                CURLOPT_RETURNTRANSFER => true, ]);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    function setUser($name){
        global $URL;
        $ch = curl_init();
        $user_json = new stdClass();
        $user_json->name = $name;
        $encoded_json_obj = json_encode($user_json);
        curl_setopt_array($ch, array(CURLOPT_URL => $URL,
                                    CURLOPT_POST => TRUE,
                                    CURLOPT_RETURNTRANSFER => TRUE,
                                    CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                    CURLOPT_POSTFIELDS => $encoded_json_obj ));
        $response = curl_exec($ch);
        return $response;
    }

    function checkUser($name){
        $all_users_json = getUsers();
        $keys = array_keys($all_users_json);
        for ($i = 0; $i < count($keys); $i++){
            $user = $all_users_json[$keys[$i]];
            if($name == $user['name']){
                return true;
            }
        }
        return false;
    }
    
    function sendMessage($name){
        global $URL_chat;
        $issue = $_POST["issue"];
        $ch = curl_init();
        $auto_msg = new stdClass();
        $auto_msg->msg = "Hi " . $name . "!";
        if($issue == "I cannot make an appointment"){
            $auto_msg->msg = $auto_msg->msg . " I will help you to make your appointment. Please wait a minute for checking your information.";
        }
        if($issue == "I could not find a suitable time"){
            $auto_msg->msg = $auto_msg->msg . " I will help you to find a suitable time. Please wait a minute for checking your information.";
        }
        if($issue == "Suggestion"){
            $auto_msg->msg = $auto_msg->msg . " I cannot wait to hear your suggestions.";
        }
        $auto_msg->name = "admin";
        $auto_msg->toWho = $name;
        $auto_msg->time = date('H:i');
        $encoded_json_obj = json_encode($auto_msg);
        curl_setopt_array($ch, array(CURLOPT_URL => $URL_chat,
                                    CURLOPT_POST => TRUE,
                                    CURLOPT_RETURNTRANSFER => TRUE,
                                    CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                    CURLOPT_POSTFIELDS => $encoded_json_obj ));
        $response = curl_exec($ch);
        return $response;
    }

    if (!empty($_POST['Name'])){
        $tempName = $_POST['Name'];
        $_SESSION['Name'] = $tempName;
        if(!checkUser($tempName)){
            setUser($tempName);
        }
        sendMessage($tempName);
        header("Location: userPage.php");
        exit();
    }
    else
    {
        echo "<a>You did not enter a name.</a>";
    }

?>

<body>
