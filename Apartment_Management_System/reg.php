<html>
    <head>
        <title>Registration</title>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
        <style>
        .SBoyyy{
        font-family: "Audiowide", sans-serif;
        /*font-size: 100%;*/
        font-style: italic;
        font-weight: bolder;
        color: white;
        
    }
    .SBoyyy2{
        font-family: "Audiowide", sans-serif;
        /*font-size: 100%;*/
        font-style: italic;
        font-weight: bolder;
        color: blue;
        
    }
     .SBoyyy1{
        font-family: "Audiowide", sans-serif;
        /*font-size: 100%;*/
        font-style: italic;
        font-weight: bolder;
        color: white;   
    }
    .submit{
        /* position: absolute; */
        top: 55%;
        left: 55%;
        width: 25%;
        height: 25px;
        border: 2px solid;
        background: #9932CC;
        border-radius: 25px;
        font-size: 15px;
        color: whitesmoke;
        font-weight: 700;
        cursor: pointer;
        outline: none;
    }
.submit:hover {color: 9932CC;}
.submit:hover {background: white}
.SBoyyy2:hover {color: 9932CC;}
.SBoyyy2:hover {background: white}
 </style>
 <style>   body {
  background-image: url("../photos/11.jpg");
  background-size: 100%;
  }
  .alert{
    color: red;

  }
</style>



    </head>
    <body>
        <center>
    <span class="SBoyyy" style="font-size:40px;color:green"><b>A</b></span><span class="SBoyyy" style="font-size:25px">partment Management 
System</span> &nbsp &nbsp &nbsp 
<br>
 <a class="SBoyyy2" href="PHome.php">  Back </a>  <a class="SBoyyy2" href="login.php"> |  | Logout </a>
 </center>






<?php
    $db_username = "APARTMENT";
    $db_password = "house";
    $connection_string="localhost/xe";
    $conn=oci_connect($db_username, $db_password, $connection_string);



    if($conn)
    {if(isset($_POST['submit']))

        {if(isset($_POST['MANAGER_ID']) && isset($_POST['MANAGER_NAME']) && isset($_POST['M_PHONE']) && isset($_POST['M_SAL']) && isset($_POST['PASSWORD']) && isset($_POST['BUILDING_ID']))

            {if($_POST['MANAGER_ID'] != "" && $_POST['MANAGER_NAME'] != "" && $_POST['M_PHONE'] != "" && $_POST['M_SAL'] != "" && $_POST['PASSWORD'] != "" && $_POST['BUILDING_ID'] != "")
                {
                    $MANAGER_ID = $_POST['MANAGER_ID'];
                    $MANAGER_NAME = $_POST['MANAGER_NAME'];
                    $M_PHONE = $_POST['M_PHONE'];
                    $M_SAL = $_POST['M_SAL'];
                    $PASSWORD = $_POST['PASSWORD'];
                    $BUILDING_ID = $_POST['BUILDING_ID'];

                    $MANAGER_ID = 1;

                    //generate new id
                    $query = "SELECT MANAGER_ID FROM manager order by MANAGER_ID desc";
                    $result = oci_parse($conn, $query);
                    oci_execute($result);
                    $row = oci_fetch_array($result, OCI_BOTH);
                    $num_rows = oci_num_rows($result);
                    if($num_rows == 1)
                    {
                        $MANAGER_ID = $row[0];
                        $MANAGER_ID = $MANAGER_ID + 5;
                    }
                    else
                    {
                        $MANAGER_ID = 1;
                    }

                    //insert into database
                    $query = "INSERT INTO MANAGER VALUES ('$MANAGER_ID', '$MANAGER_NAME', '$M_PHONE', '$M_SAL', $PASSWORD, '$BUILDING_ID')";
                    $result = oci_parse($conn, $query);
                    oci_execute($result);
                    if($result)
                    {
                        echo "<div class='alert'>Registration Successful!</div>";
                    }
                    else
                    {
                        echo "<div class='alert'>Registration Failed!</div>";
                    }
                }
                else
                {
                    echo "<div class='alert'>Please provide all fields!</div>";
                }
            }
            else
            {
                echo "<div class='alert'>Please provide all fields!</div>";
            }

            echo "<br><br>";
        }
    }
    else
    {
        echo "<div class='alert'>Connection Failed!</div>";
    }   
?>







 <form action="" method="POST">
            <fieldset>
               
                <legend class="SBoyyy">Manager Registration!</legend>

                <label class="SBoyyy" for="MANAGER_ID">ID</label><br>
                <input type="text" name="MANAGER_ID"><br><br>

                <label class="SBoyyy" for="MANAGER_NAME">MANAGER NAME</label><br>
                <input type="text" name="MANAGER_NAME"><br><br>

                <label class="SBoyyy" for="M_PHONE">Phone</label><br>
                <input type="text" name="M_PHONE"><br><br>

                <label class="SBoyyy" for="M_SAL">Salary</label><br>
                <input type="text" name="M_SAL"><br><br>

                <label class="SBoyyy" for="PASSWORD">Password</label><br>
                <input type="password" name="PASSWORD"><br><br>

                <label class="SBoyyy" for="BUILDING_ID">Building ID</label><br>
                <input type="text" name="BUILDING_ID"><br><br>

                <input class="submit" type="submit" name="submit" id="submit-btn" value="Register">
                <input class="submit" type="reset" name="reset" value="Reset"></td>

            </fieldset>
        </form>
        <tr height="50px" >
<td colspan="3"><Center> <li class="SBoyyy1"> CopyRight@Apartment Management 
System2022</li> </Center> </td>
</tr>
    </body>
</html>