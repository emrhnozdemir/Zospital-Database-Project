<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>Medicine Management Page</b></a></div>

    <div class="inner-page-top"><a><b>~ Medicine Records in the Database ~</b></a></br></div>

    <div class="item-list-contanier">
        <ul class="item-list-table">
            <li class="item-list-table-header">
                <div class="item-col item-col-10"><b>ID</b></div>
                <div class="item-col item-col-40"><b>Medicine Name</b></div>
                <div class="item-col item-col-30"><b>Cost</b></div>
            </li>

            <?php

            include "../config.php";


            $sql_statement = "SELECT * FROM Medicine";

            $result = mysqli_query($db, $sql_statement);

            while($row = mysqli_fetch_assoc($result)) {
                $mID = $row['mID'];
                $mName = $row['mName'];
                $mCost = $row['mCost'];
                echo "<li class=\"item-row\"><div class=\"item-col item-col-10\" data-label=\"ID\">" . $mID .
                "</div><div class=\"item-col item-col-40\" data-label=\"Medicine Name\">" . $mName .
                "</div><div class=\"item-col item-col-30\" data-label=\"Cost\">$" . $mCost . "</div></li>";
            }

            ?>
      </ul>
    </div>

    <div id="navigator">
        <h3>Navigation Menu:</h3>
        <div><a href="medicine_selection.php">Filter Medicine</a></div>
        <div><a href="medicine_deletion.php">Delete a Medicine</a></div>
        <div><a href="medicine_insertion.php">Insert a Medicine</a></div>
    </div>
</body>
