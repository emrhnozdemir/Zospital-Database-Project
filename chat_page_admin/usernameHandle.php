<body>
<?php
    
    session_start();
    
    if (!empty($_POST['name'])){
        $tempName = $_POST['name'];
        $_SESSION['aName'] = $tempName;
        header("Location: adminPage.php");
        exit();
    }
    else {
        echo "<a>You did not enter a name.</a>";
    }

?>

<body>

