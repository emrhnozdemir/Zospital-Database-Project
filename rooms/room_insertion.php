<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Room Management Page</b></a></div>

    <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ Room Insertion ~</b></a></br></div>
    <div><form action="insert_room.php" method="POST">
        <div class= "inputI"><a>Room Block:
        <input type="text" id="rBlock" name="rBlock"></a></div>
        <div class= "inputI"><a>Room Floor:
        <input type="text" id="rFloor" name="rFloor"></a></div>
        <div class= "inputI"><a>Room Code:
        <input type="text" id="rCode" name="rCode"></a></div>
        <div class= "inputI"><a>Room Cost:
        <input type="text" id="rCost" name="rCost" placeholder="in US$"></a></div>
        <div class= "inputI">
        <div style="margin-bottom: 1em;"><a>Room Type:</a></div>
        <select name="rType">
            <option value="Doctor Room">Doctor Room</option>
            <option value="Stuff Room">Stuff Room</option>
            <option value="Intensive Care Unit">Intensive Care Unit</option>
            <option value="Double Patient Room">Double Patient Room</option>
            <option value="VIP Patient Room">VIP Patient Room</option>
        </select></div>
        <div style="margin-bottom: 1em;"><a>Availability:</a></div>
        <select name="availability">
            <option value="1">Available</option>
            <option value="0">Not Available</option>
        </select></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Room Page</a></div>
        <div><a href="room_selection.php">Filter Rooms</a></div>
        <div><a href="room_deletion.php">Delete a Room</a></div>
    </div>
</body>
