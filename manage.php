<?php
include_once('inc/common.php');


function fetchTeeTimes(){
    $conn = new mysqli('localhost', 'root', 'root', 'ftf');
    if ($conn->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conn->connect_error;
    }

    $query = '
              SELECT u.fname AS fname, u.lname AS lname, c.name AS course, t.time AS time 
                FROM users AS u
                    JOIN teetimes AS t ON u.id=t.uid
                    JOIN courses AS c ON t.cid=c.id
               WHERE u.id = ? 
              ';

    $stmt = $conn->prepare($query);

    $stmt->bind_param('d', $_SESSION['id']);
    $stmt->execute();

    $result = $stmt->get_result();

//    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        $conn->close();

        return $result;

    } else {

        $_SESSION['err'] = 'Could not fetch tee times.';
        $conn->close();

        return null;
    }
}


if(($_SESSION['loggedIn'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>FindTheFairway</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <?php
        printActivePage();
        ?>
    </head>
    <body>
    <?php
    printHeader();
    ?>

    <div id="content" align="left" class="manageContent">
        <h2 align="center">Manage</h2>
        <div align="center">Select Tee Times to remove</div>
        <form id="manage">
            <!--
            SELECT u.fname AS fname, u.lname AS lname, c.name AS course, t.time AS time FROM users AS u JOIN teetimes AS t ON u.id=t.uid JOIN courses AS c ON t.cid=c.id;
            -->
            <table>
                <tr>
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Course</th>
                    <th>Time</th>
                </tr>
                <?php
                $result = fetchTeeTimes();

                if($result != null){
                    $i = 0;
                    while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo "    <td><input type=\"checkbox\" name=\"teeTime$i\" value=\"$i\"></td>";
                        echo '    <td>'.ucfirst($row['fname']).'</td>';
                        echo '    <td>'.ucfirst($row['lname']).'</td>';
                        echo '    <td>'.$row['course'].'</td>';
                        echo '    <td>'.$row['time'].'</td>';
                        echo '<tr>';
                        $i++;
                    }
                    $result->close();
                }
                ?>
            </table>
            <input type="submit" id="manage-submit" class="loginButton" name="submit" value="Delete Tee Times">
        </form>
    </div>
    <?php
    printFooter();
    ?>
    </body>
    </html>
    <?php
    echo $_SESSION['err'];
    $_SESSION['err'] = '';
}
else{
    header('Location: login.php');
}