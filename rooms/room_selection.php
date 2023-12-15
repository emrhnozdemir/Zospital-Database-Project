<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Room Management Page</b></a></div>
    
    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Room Filtering ~</b></a></br></div>
    <div style="margin-bottom: 1.5em;"><a>Choose room type to be displayed:</a></div>
        <form action="select_room.php" method="POST">
            <div><select name="rooms">
                <option value="Doctor Room">Doctor Room</option>
                <option value="Stuff Room">Stuff Room</option>
                <option value="Intensive Care Unit">Intensive Care Unit</option>
                <option value="Double Patient Room">Double Patient Room</option>
                <option value="VIP Patient Room">VIP Patient Room</option>
            </select></div>
            <div><button class="button">SUBMIT</button></div>
        </form>

<div id="navigator" style="padding-top:5em;">
    <h3>Navigation Menu:</h3>
    <div><a href="index.php">Return to Room Page</a></div>
    <div><a href="room_insertion.php">Insert a Room</a></div>
    <div><a href="room_deletion.php">Delete a Room</a></div>
</div>
</body>
