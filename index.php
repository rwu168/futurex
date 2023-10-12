<!DOCTYPE html>
<html>
<head>

<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 16px;}</style>
<!link rel="stylesheet" type="text/css" href="css/basic.css" />
<body style="font-family: Arial, Helvetica, sans-serif; color: Blue; background-color: white;">
<form id="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<!h2 style="background-color: white; "</h2>
<title>HTML <td> bgcolor Attribute</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/510/fabric.min.js"></script>

<style>
form { 
  display: block;
  margin-top: 0em;
  margin-left: 0em;
}
.login {
  position: fixed;
  width: 30px;
  margin: auto;
  height: 200px;
  width: 30%;
  top: 120px;
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}

.tot {
  position: fixed;
  width: 60px;
  left: 5px;
  height: 40px;
  width: 28%;
  top: 330px;
  border: 3px solid #73AD21;
  color: black;
  
}

.data {
  position: fixed;
  width: 300px;
  left: 5px;
  height: 20px;
  width: 50%;
  top: 420px;
  background-color: lightyellow;
  border: 3px solid #73AD21;
  color: black;
  
}

</style>

<body>


	<canvas id="canvas"></canvas>
	<script>
		// Initiate a canvas instance
		var canvas = new fabric.Canvas("canvas");
		canvas.setWidth(document.body.scrollWidth);
		canvas.setHeight(350);

		// Initiate a textbox object
		var textbox = new fabric.Textbox("We're the wizards behind the curtains, crafting groundbreaking ALGO future index trading software that takes the trading game to a whole new level of excitement and profit... like to test it out?  No credit card or money needed.  It's free to test - just sign up!", 
        {
			width: 800,
			left: 500,
			top: 40,
			fill: "orange",
			strokeWidth: 2,
			stroke: "green",
		});

		// Add it to the canvas
		canvas.add(textbox);
	</script>

    <canvas id1="canvas1"></canvas>
	<script>
		// Initiate a canvas instance
		var canvas1 = new fabric.Canvas("canvas1");
		canvas1.setWidth(document.body.scrollWidth);
		canvas1.setHeight(250);

		// Initiate a textbox object
		var textbox = new fabric.Textbox("Xtrade Investment", 
        {
			width: 550,
			left: 100,
			top: 40,
			fill: "red",
			strokeWidth: 2,
			stroke: "red",
		});

		// Add it to the canvas
		canvas.add(textbox);
	</script>

   
	

<!//opacity=transparency>
<!div id="button" class="fourth" onmouseover="this.style.opacity='0.4';this.style.width='140px'" 
onmouseout="this.style.opacity='1';this.style.width='120px';
<!//calling function
Onclick=topaction();">



<img id="firstimg" src="logox.png"; style="position:absolute;top:5px;left:20px;height:100px;width:100px;border-radius:90px;";/>




<body>

    
    <?php
        /* =========Color and letter size=======================*/
		$sec = date('s');
		$colorArray = array('blue', 'green', 'red', 'maroon', 'gray');
		$colorIndex = $sec % 1;

		/*print '<h1 style="color: '.$colorArray[$colorIndex].';">Hello World</h1>';*/
	?>

    
    <?php
        /*=================date & time function=========================*/
        function DateTime()
        {   
            global $today;
		    $today = date('Y-m-d');
		    print "<p><b>Today is $today </b></p>";

		    $time = date('h:g:s');
		    echo "<p><b>and the Time is $time </b></p>";

        }
	?>

    <?php
        /*======================validateion function===============================*/
        function ValEntry()
        { 
            global $name,$comments;

            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {

                $name = $_POST['firstname'];
                if (empty($name)) 
                {
                    echo "Name is empty";
                } 
                else 
                {
                    echo $name;
                }
                $comments = $_POST['comments'];
		        print "<p>Congratulations $name</p>";
		        print $comments;
            }
        }
    ?>
    
    <?php
    /*====================open postgresql database================================*/
        function RemoteDb()
        {
            global $conn;

            $conn = pg_connect("host=oregon-postgres.render.com    
                port=5432    
                dbname=mydb_b5au  
                user=fx168  
                password=r09HYhQd3CHwtulMkftyd504K5941Jyk"); 
            if (!$conn) 
            {
	            die('Could not connect to Cloud server! ');
            }
        }

    ?>

    
     <?php
    /*=================Display detail of trading activities==================================*/
        function disp_detail($data)
        {
    ?>
                <table  class="data" bgcolor="lightblue" width="20px" height="10px" color="red">

                 <tr>
                            <th>Date & time</th>
                            <th>Profit % in this trade</th>
                            <th>Sold at</th>
                            <th>Brought at</th>
                            <th>MES Position sold</th>
                           
                            
                </tr>

                <?php
                    $max_columns=5;
                    $record_id=0;
                    while(True)
                    {
                        for ($columns=0;$columns<$max_columns;$columns++)
                        {
                            if (!isset($data[$record_id]))
                            {
                                return;
                            }
                    
                            if ($columns==0)
                            {
                                echo "<tr>";
                            }
                    
                ?>

                    <td valign="top" bgcolor="lightblue" width="20px" height="10px" color="red" >
                         
                        <?php echo $data[$record_id] ?>
                    </td>
                    <?php
                        
                        if ($columns==$max_columns)
                        {
                            echo "<tr>";
                        }
                        $record_id++;
                    ?>

        <?php
               

                }
            }
           
        ?>
    </table>
    <?php
    }
           
    ?>




    <?php
        /*=======================login validation=========================*/

        function LogIn($conn)
        {

            global $userid,$password;
            
            if (isset($_POST['userid']))
            {
	            $userid = $_POST['userid'];
            } 
            else 
            {
	            $userid = '';
            }

            if (isset($_POST['password']))
            {
	            $password = $_POST['password'];
            } 
            else 
            {
	            $password = '';
            }


            if (isset($_POST['userid']))
            {
	            print "<input type='hidden' name='userid' size='11' value='".$userid."' /><br /> ";
	            print "<input type='hidden' name='password' size='11' value='".$password."' /><br /> ";
            }
            else 
            {
                /*print"<br><br><br>";*/
	            print "<h2>Enter Email/Phone# to Login: </h2>";

	            print "<table> ";

	            print "<tr> ";
	            print "<td>Email: </td><td><input type='text' name='userid' size='25' /><br /> ";
	            print "</tr> ";

	            print "<tr> ";
	            print "<td>Password: </td><td><input type='password' name='password' size='11' /></td> ";
	            print "</tr> ";

                /*
                print "<tr> ";
	            print "<td>Comments:</td><td><input type='textarea' name='comments' rows='7' cols='50' /></td> ";
	            print "</tr> ";
                */
	            print "</table> ";
                

	            print "<p><input type='submit' name='mysubmit' value='Login' /> ";
                
            }

            /*
            $userid='allcountywest@gmail.com';
            $password='6263533808';
            $sql_statement  = "SELECT bal,sys,email,ph ";
            $sql_statement .= "FROM control ";
            $sql_statement .= "WHERE email = '".$userid."' ";
            $sql_statement .= "AND ph = '".$password."' ";

            print $sql_statement;
            */

            /*$sql = "SELECT bal,sys FROM control WHERE email= '$userid' and ph='$password';"; */
            $sql = "SELECT bal,sys,email,ph FROM control WHERE email= '$userid' AND ph='$password';";
            $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
            $row=pg_fetch_row($rs);
            $rowcount= pg_num_rows($rs);
            echo "<br>";
            /*
            print $rowcount. "       ".  $row[2] ."<br>";
            $row=pg_fetch_row($rs);
            print $rowcount. "       ".  $row[2] ."<br>";
            */
            if ($rowcount<=0)
            {
                print 'UnSuccessfully selected!<br>';
            }
            else 
            {
                print 'Successfully selected!!!!<br>';
	        }
     
            $k=1;
            while ($k<=$rowcount)
            {
                echo "$row[0] &nbsp;&nbsp  $row[1] &nbsp  $row[2] &nbsp  $row[3]<br>";
                $bal[$k]=$row[0];
                $name[$k]=$row[1];
                $email[$k]=$row[2];
                $ph[$k]=$row[3];
                if ($row[2]==$userid)
                {
                    print("email found $userid");
                }
                $row=pg_fetch_row($rs);
                $k++;
 

            }
   


        }
    ?>


    <?php RemoteDb();  ?> 
 

    <h3 class="login";color:black;>Enter Email and Cell-phone to sign-in
 
        <?php
                
        if (isset($_POST['userid']))
            {
	            $userid = $_POST['userid'];
            } 
            else 
            {
	            $userid = '';
                print "Errro";
            }

            if (isset($_POST['password']))
            {
	            $password = $_POST['password'];
            } 
            else 
            {
	            $password = '';
            }
            
            

	            print "<table> ";

	            print "<tr> ";
	            print "<td>Email: </td><td><input type='text' name='userid' size='25' /><br /> ";
	            print "</tr> ";

	            print "<tr> ";
	            print "<td>Cell-phone: </td><td><input type='password' name='password' size='11' /></td> ";
	            print "</tr> ";

                /*
                print "<tr> ";
	            print "<td>Comments:</td><td><input type='textarea' name='comments' rows='7' cols='50' /></td> ";
	            print "</tr> ";
                */
	            print "</table> ";


	            print "<p><input type='submit' name='mysubmit' color: value='Login' /> ";
                print "<br>";
                print "No Account - signup for FREE!";
                print "<p><input type='submit' name='signup' value='Sign Up' /> ";
            
            /*
            $sql = "SELECT sys,email,ph FROM control WHERE email= '$userid' AND ph='$password';";
            
            */
            $sql = "SELECT sys,email,ph FROM control limit 4;";
          
            $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
            $row=pg_fetch_row($rs);
            $rowcount= pg_num_rows($rs);
           
            /*
            print $rowcount. "       ".  $row[2] ."<br>";
            $row=pg_fetch_row($rs);
            print $rowcount. "       ".  $row[2] ."<br>";
            */
            if ($rowcount<=0)
            {
                print 'Email and Phone not found - no account, sign up for FREE!<br>';
                echo '<a href="http://programminghead.com">
                <input type="submit" value="Return" />
                </a>';
                
            }
            

            $k=1;
            $data=array();
            while ($k<=$rowcount)
            {
                /*echo "$row[0] &nbsp;&nbsp  $row[1] &nbsp  $row[2] &nbsp <br>";*/
                $name[$k]=$row[0];
                $email[$k]=$row[1];
                $ph[$k]=$row[2];
                $data=array_merge($data,array($name[$k],$email[$k],$ph[$k],$ph[$k],$ph[$k]));

                if ($row[0]==$userid)
                {
                    print("email found $userid");
                }
                $row=pg_fetch_row($rs);
                $k++;
 

            }


          ?>
    </h3>


    <h3 class="tot"> 
    <?php

        $totpercent=50;
        $lastpercent=60;

        $data=array("10/11/2023 11:30am", "0.0078%","4430.25", "4410.50","1");
        print "<br>YTD Annual Return:  $totpercent%  &nbsp &nbsp Last Year: $lastpercent% <br>";
        print "Recent LIVE trading activits: ";
   

        disp_detail($data);
    ?>
    </h3>

    
    


    

    <?php


        /*LogIn($conn);*/

        /*
        $to="rwu168@gmail.com";
        $subject="Test";
        $body="testing";
        $from="rwu168@gmail.com";
        $rtnto="rwu168@gmail.com";
        mail($to, $subject, $body, $from, $rtnto);
        * neeeds to set sentmail_form in php.ini first*/

    ?>


</body>
</html>
