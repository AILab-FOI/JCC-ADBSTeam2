<?php
session_start();
require('header.php');


?>


<?php
//Get variable from prev page Using GET
$var_post_id = $_GET['var_post_id'];
//$var_post_id = 100015;

//echo $var_post_id;



$response = pg_query($conn, "select user_name,lifespan, post_title, Post_description, Substr(cast(date_edited as text),3,10) from post p
where post_id = $var_post_id;");

while ($row = pg_fetch_row($response)) {
   // echo "$row[0] \n" . "</br>";
    $created = substr($row[1], 2, 10);
   // echo "$created" . "</br>";
   // echo "$row[2] \n" . "</br>";
    //echo "$row[3] \n" . "</br>";
   // echo "$row[4] \n" . "</br>";

    $user_name =$row[0];
    $lifespan=$created;
    $edited =$row[4];
    $post_title =$row[2];
    $text =$row[3];
}

?>
    <link rel="stylesheet" type="text/css" href="single_post_css.css">

    <div class="box">

        <div class="box-content1" >
            <div class="box-text">
                <div class="wrap">

                    <?php
                    echo ' Created by '. $user_name;
                    ?>

                </div>
            </div>

        </div>

        <div class="box-content2" >
            <div class="box-text" >
                <div class="wrap" >
                    <?php
                    echo 'created on '. $lifespan;
                    ?>
                </div>
            </div>

        </div>

    </div>

    <div class="box">
        <div class="box-content2" >
            <div class="box-text" >
                <div class="wrap" >
                    <?php
                    if (isset($edited))
                    echo 'Edited on ' . $edited;
                    ?>
                </div>
            </div>

        </div>

    </div>

    <h1>
        <?php echo $post_title ?>
    </h1>

    <p>
    <?php echo $text ?>
    </p>

    <div class="box">
        <div class="box-content1" >
            <div class="box-text">
                <div class="wrap">
                    <p class="edit">Edit</p>
                </div>
            </div>
        </div>

        <div class="box-content2" >
            <div class="box-text" >
                <div class="wrap" >
                   <p class="report">Report <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 15 15"  cursor="pointer" onclick="openPopup()">
                           <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                       </svg>
                   </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="popup" id="popup">
            <h2>Select reason</h2>
            <form id="u13" name="u13" action="insert/insertReport.php" method="post" >
                <label for="reportID"></label>
                <?php
                $response = pg_query($conn, "SELECT * FROM report_code");
                echo"<select id='reportDesc' name='reportDesc'>";
                while ($row = pg_fetch_row($response)) {
                    echo "<option value='" . $row['1'] . "'>" . $row['1']  . "</option> ";
                }
                echo "</select>";
                ?>
                <input type="hidden" name="postID" value="<?php echo $var_post_id; ?>">
                <br>
            </form>
            <button class="dropbtn" type="submit" onclick="loadDoc13(); closePopup()" value="Submit" >Send report </button>
            <button class="dropbtn2" onclick="closePopup()"  >Close report </button>
            <script>
                function loadDoc13() {
                    var form = $('#u13');
                    var actionUrl = form.attr('action');

                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: form.serialize(), // serializes the form's elements.
                        success: function(data)
                        {
                            document.getElementById('tablet13').innerHTML = data;
                        }
                    });
                }
            </script>
            <!-- Debugg
            <div class="DivHrnaica"  id="fixed-content" >
                <table id="tablet13">
                    <tr>
                        <th>Result:</th>
                    </tr>
                </table>
                -->
            </div>

        </div>
    </div>
<script>
let popup = document.getElementById("popup");
function openPopup()
{
popup.classList.add("open-popup")
}
function closePopup()
{
    popup.classList.remove("open-popup")
}

</script>
<?php require('footer.php');?>