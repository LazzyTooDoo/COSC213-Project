<a id="home" href="index.html">Go To Home</a><br><br>
<?php
$mysqli = mysqli_connect("localhost", "laztodo", "malazaris", "testDB");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
    if (!empty($_POST)) {
        $sql = "INSERT INTO Users VALUES ('".$_POST["fname"]."', '".$_POST["lname"]."', '".$_POST["email"]."', '".$_POST["phone"]."')";
        $res = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        if ($res === TRUE) {
            echo "A record has been inserted.";
        } else {
            printf("Could not insert record: %s\n", mysqli_error($mysqli));
        }
        mysqli_free_result($res);
    }
    $sql = "SELECT * FROM Users;";
    $res = mysqli_query($mysqli, $sql) or die (mysqli_error($mysqli));

    if (mysqli_num_rows($res) > 0) {
        ?>
        <table>
        <tr>
            <th><h2>First Name</h2></th>
            <th><h2>Last Name</h2></th>
            <th><h2>Email</h2></th>
            <th><h2>Phone Number</h2></th>
        </tr>

        <?php
        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $firstName = $newArray['first_name'];
            $lastName = $newArray['last_name'];
            $email = $newArray['email'];
            $phone = $newArray['phone'];
            ?>
            <tr>
                <td><?php echo $firstName ?></td>
                <td><?php echo $lastName ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $phone ?></td>
            </tr>
            <?php
        }
    } else {
        printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
    }

    mysqli_free_result($res);
    mysqli_close($mysqli);
}
?>