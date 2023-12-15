<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>User Appointment Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Make Appointment ~</b></a></br></div>

    <?php

    include "../config.php";

    ?>

    <div><form action="insert_appointment.php" method="POST">
        <div class= "inputI"><a>Select the Doctor:</a></div>
        <div class= "inputI"><select name="dids">

        <?php

        $sql_command = "SELECT * FROM Doctors";

        $myresult = mysqli_query($db, $sql_command);

        while($id_rows = mysqli_fetch_assoc($myresult)) {
            $dID = $id_rows['dID'];
            $dName=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Employees WHERE eID = $dID"))["eName"];
            $dTitle=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Doctors WHERE dID=$dID"))["title"];
            echo "<option value=$dID>". $dName . " (". $dTitle . ")</option>";
        }

        ?>

        </select></div>
    
        <div class= "inputI"><a>Enter Your Name:
        <input type="text" id="pName" name="pName" placeholder=" Your Name"></a></div>
        <div class= "inputI">
        <div style="margin-bottom: 1em;"><a>Blood Type: </a></div>
        <select name="bloodType">
            <option value="0 Rh+">0 Rh+</option>
            <option value="0 Rh-">0 Rh-</option>
            <option value="A Rh+">A Rh+</option>
            <option value="A Rh-">A Rh-</option>
            <option value="B Rh+">B Rh+</option>
            <option value="B Rh-">B Rh-</option>
            <option value="AB Rh+">AB Rh+</option>
            <option value="AB Rh-">AB Rh-</option>
        </select></div>

        <div class= "inputI"><a>Age:
        <input type="text" id="age" name="age"></a></div>
        <div class= "inputI"><a>Weight:
        <input type="text" id="weight" name="weight" placeholder="in kg"></a></div>
        <div class= "inputI"><a>Height:
        <input type="text" id="height" name="height" placeholder="in cm"></a></div>
        <div class= "inputI"><a>Phone No:
        <input type="text" id="pPhoneNo" name="pPhoneNo"></a></div>
        <div class= "inputI"><a>Appointment Date:
        <input type="text" id="aDate" name="aDate" placeholder="YYYY-MM-DD"></a></div>
        <div class= "inputI"><a>Start Time:
        <input type="text" id="startTime" name="startTime" placeholder="hh:mm"></a></div>
        <div class= "inputI"><a>End Time:
        <input type="text" id="endTime" name="endTime" placeholder="hh:mm"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>
    <div id="navigator" style="margin-top:3em;">
        <div><a href="chat_welcome_page.php">Support Page</a></div>
    </div>
</body>
