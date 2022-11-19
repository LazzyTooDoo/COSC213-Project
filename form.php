<a href="index.html">Go To Home</a><br>
<?php
$mysqli = mysqli_connect("localhost", "laztodo", "malazaris", "testDB");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
    $sql = "SELECT * FROM Users;";
    $res = mysqli_query($mysqli, $sql)or die (mysqli_error($mysqli));

    if (mysqli_num_rows($res) > 0) {
        ?>
        <table style="border: 1px solid black">
            <tr>
                <th><h2>First Name</h2></th>
                <th><h2>Last Name</h2></th>
                <th><h2>Email</h2></th>
                <th><h2>Phone Number</h2></th>
            </tr>

        <?php
        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $firstName  = $newArray['fname'];
            $lastName = $newArray['lname'];
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