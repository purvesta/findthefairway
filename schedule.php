<?php
include_once('inc/common.php');

function fetchCourses(){
    $conn = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'bdedb0104703bc', 'fc12bbf3', 'heroku_b23ba24edddfeb3');
    if ($conn->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conn->connect_error;
    }

    $result = $conn->query('SELECT name FROM courses');

    if ($result->num_rows > 0) {

        $conn->close();

        return $result;

    } else {

        $_SESSION['err'] = 'Could not fetch courses.';
        $conn->close();

        return null;
    }
}

if(($_SESSION['loggedIn'])) {
    ?>
    <!DOCTYPE html>
    <html>
<?php
    printHead();
?>
    <body>
        <script>
            $(function () {
                $("#datepicker").datepicker();
            });
        </script>
    <?php
    printHeader();
    ?>

    <div id="content" align="center" class="scheduleContent">
        <h2 align="center">Schedule</h2>
        <form id="schedule">
            <div id="courses" class="courses">
                <select id="course-select">
                    <?php
                        $result = fetchCourses();

                        if($result != null){
                            $i = 0;
                            while($row = $result->fetch_assoc()){
                                echo "<option value=\"c$i\">".$row['name'].'</option>';
                                $i++;
                            }
                            $result->close();
                        }
                    ?>
                </select>
            </div>
            <div align="center">
                <div align="center">
                    <label id="date-label">Date:</label>
                    <input type="text" id="datepicker">
                </div>
                <div id="tee-times-div">
                    <textarea rows="4" cols="50"
                              id="tee-times">Tee times will eventually show here after using ajax.</textarea>
                </div>
            </div>
            <input type="submit" id="schedule-submit" class="loginButton" name="submit" value="Schedule Tee Time">
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
