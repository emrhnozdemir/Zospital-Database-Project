<head>
    <link rel="stylesheet" href="styleIndex.css">
</head>

<body>
    <header>
        <h1><a href="index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Support Page</b></a></div>

    <div><form action="nameHandle.php" method="POST">
        <div class= "inputI"><a>Full Name:
        <input type="text" id="Name" name="Name"></a></div>
    
        <div class= "inputI">
        <div style="margin-bottom: 1em;"><a>Subject of the issue: </a></div>
        <select name="issue">
            <option value="I cannot make an appointment">I cannot make an appointment</option>
            <option value="I could not find a suitable time">I could not find a suitable time</option>
            <option value="Suggestion">Suggestion</option>
        </select></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

</body>


