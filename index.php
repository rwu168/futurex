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
  height: 205px;
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


.ytd{
  position: fixed;
  width: 600px;
  left: 5px;
  height: 20px;
  width: 50%;
  top: 420px;
  background-color: lightyellow;
  border: 3px solid #73AD21;
  color: black;
}

.data {
  position: fixed;
  width: 300px;
  left: 5px;
  height: 20px;
  width: 50%;
  top: 500px;
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
		var textbox = new fabric.Textbox("We're the wizards behind the curtains, crafting groundbreaking algo future index trading software that takes the trading game to a whole new level of excitement and high profit return... like to test it out?  No credit card or money needed.  It's free to test - just sign up!", 
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
		var textbox = new fabric.Textbox("TradeXinvestment.com", 
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
    /*=================Display YTD P/L==================================*/
        function disp_ytd($conn)
        {
                /*
                $sql = "SELECT  FROM control limit 4;";
          
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
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
                        print("      Email Not found $userid");
                    }   
                    $row=pg_fetch_row($rs);
                    $k++;
 
                    
                }
                */
    ?>
                <table  class="ytd" bgcolor="lightblue" width="20px" height="10px" color="red">

                 <tr>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>May</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Aug</th>
                            <th>Sep</th>
                            <th>Oct</th>
                            <th>Nov</th>
                            <th>Dec</th>    
                           
                            
                </tr>

                <?php
                    $max_columns=12;
                    $record_id=0;
                    $data=array(1,2,3,4,5,6,7,8,9,10,11,12);
                    
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
                         
                            <?php echo $data[$record_id] .'%' ?>
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
    /*=================Display detail of trading activities==================================*/
        function disp_detail($conn)
        {
                $sql = "SELECT bal,sys,email,ph FROM control limit 4;";
          
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
                $k=1;
                while ($k<=$rowcount)
                {
                    /*echo "$row[0] &nbsp;&nbsp  $row[1] &nbsp  $row[2] &nbsp  $row[3]<br>";*/
                    $bal[$k]=$row[0];
                    $name[$k]=$row[1];
                    $email[$k]=$row[2];
                    $ph[$k]=$row[3];
                    $row=pg_fetch_row($rs);
                    $k++;
 

                }
                
    ?>
                <table  class="data" bgcolor="lightblue" width="20px" height="10px" color="red">

                 <tr>
                            <th>Date & time</th>
                            <th>Profit this trade</th>
                            <th>Sold at</th>
                            <th>Brought at</th>
                            <th>MES Position sold</th>
                           
                            
                </tr>

                <?php
                    $max_columns=5;
                    $record_id=0;
                    
                    $data=array("10/11/2023 11:30am", "0.0078%","4430.25", "4410.50","1");
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
                            print "<font color='red'>Real LIVE trading activities & APR below: </font>";
                        }
                        
    ?>
           
        ?>
    </table>
    <?php
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
	            print "<td>Email: </td><td><input type='email' name='userid' size='25' /><br /> ";
	            print "</tr> ";

	            print "<tr> ";
	            print "<td>Cell-phone: </td><td><input type='phone' name='password' size='11' /></td> ";
	            print "</tr> ";

                /*
                print "<tr> ";
	            print "<td>Comments:</td><td><input type='textarea' name='comments' rows='7' cols='50' /></td> ";
	            print "</tr> ";
                */
	            print "</table> ";


	            print "<p><input type='submit' name='mysubmit' color: value='Login' /> ";
                print "<br><br>";
                print "No Account - signup for FREE!";
                echo '<form <method="POST" action="form_input1.php">
                            <input type="submit" name="SignUp" value="SignUp"/>
                      </form>';
                /*
                echo '<a href="www.google.com">
                        <input type="submit"/>
                     </a>';
                */

            
            
            $sql = "SELECT email FROM control WHERE email= '$userid' AND ph='$password';";

            $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
            $row=pg_fetch_row($rs);
            $rowcount= pg_num_rows($rs);
           
            if ($rowcount<=0 and(!isset($row[$rowcount])))
            {
                print 'Email or Phone not found!';
            }

          ?>
    </h3>


    <h3 class="tot"> 
    <?php
        disp_ytd($conn);
        $totpercent=50;
        $lastpercent=60;

       
        print "<br>Last Year Annual Return:  $totpercent%  &nbsp &nbsp Last Year: $lastpercent% <br>";
        

        disp_detail($conn);
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
