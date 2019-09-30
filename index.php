<?php
include_once('inc/common.php');
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

        <div id="content">
            <p id="info">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt metus at justo gravida accumsan.
                Vestibulum suscipit lobortis elit, at tincidunt odio iaculis ut. Morbi in consequat sapien, eget elementum risus.
                In accumsan sit amet mi ut condimentum. Aliquam erat volutpat. Nulla nec est ac arcu suscipit fermentum.
                Integer luctus fermentum enim, nec egestas est pellentesque eget.

                Donec tincidunt ante eget ex semper, eu faucibus enim rhoncus. Quisque vulputate interdum turpis at ultrices.
                Etiam vitae lorem dapibus, fermentum nulla sit amet, aliquet nibh.
                Cras enim sem, tempor eget sagittis viverra, maximus sit amet dolor.
                Curabitur pharetra metus diam. Quisque vulputate turpis commodo velit convallis, eu dapibus massa gravida.
                Donec mollis leo in lorem fringilla mattis. Praesent eget libero malesuada, vehicula magna vel, ultricies urna.
                Curabitur consectetur condimentum lorem, in vestibulum orci sollicitudin vitae.
                Morbi libero nunc, malesuada vel sapien sit amet, tempor dictum elit.
                Maecenas laoreet mollis velit at auctor. Proin mollis lorem id risus euismod, eu cursus orci accumsan.
                Suspendisse varius enim tellus, non blandit augue porta at. Mauris tempor iaculis est, in sollicitudin mi tincidunt vel.
                Quisque aliquet lorem a urna ornare commodo. Sed facilisis vestibulum mi et finibus.
            </p>

            <div id="get-started-button" align="center">
                <form action="login.php">
                    <input id="get-started" type="submit" value="Get Started!" />
                </form>
            </div>
        </div>
<?php
        printFooter();
?>
    </body>
</html>
