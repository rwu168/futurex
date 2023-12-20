<?php 
                datetime();
                if ($day=="Saturday")
                {
                    $ask="Market Closed";

                }
                else if ( $day=="Sunday" and $time<"15:00:00")
                {
                    $ask="Market Closed";
                }
                else if ( $day=="Friday" and $time>"15:00:00")
                {
                    $ask="Market Closed";
                }
                else
                {
                        header("refresh: 120");
                }
?>


<!DOCTYPE html>
<html>
<head>

<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 15px;}</style>
<!link rel="stylesheet" type="text/css" href="css/basic.css" />
<body style="font-family: Arial, Helvetica, sans-serif; color: Blue; background-color: white;">
<form id="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<!h2 style="background-color: white; "</h2>
<title>HTML <td> bgcolor Attribute</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/510/fabric.min.js"></script>



<style>

 //   body {
 // background-image: url("htech1.png");
 // background-color: lightgrey;
}


form { 
  display: block;
  margin-top: 0em;
  margin-left: 0em;
}
.login {
  position: fixed;
  width: 30px;
  margin: auto;
  height: 210px;
  width: 30%;
  top: 120px;
  background-image: url("htech1.png");
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}

.login1 {
  position: fixed;
  width: 30px;
  margin: auto;
  height: 210px;
  width: 27%;
  top: 120px;
  background-image: url("htech1.png");
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}

.tot {
  position: fixed;
  width: 60px;
  left: 5px;
  height: 40px;
  width: 25%;
  top: 375px;
  border: 3px solid #73AD21;
  color: black;
  background-color:yellow;
}

.ask {
  position: fixed;
  width: 60px;
  left: 5px;
  height: 40px;
  width: 30%;
  top: 320px;
  color: green;
}


.ytd{
  position: fixed;
  width: 600px;
  left: 5px;
  width: 50%;
  top: 440px;
  border: 3px solid #73AD21;
  color: black;
}

.data {
  position: fixed;
  width: 300px;
  left: 5px;
  height: 20px;
  width: 50%;
  top: 510px;
  background-color: lightgrey;
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
		canvas.setHeight(500);


		// Initiate a textbox object
		var textbox = new fabric.Textbox("We're the wizards behind the curtains, crafting groundbreaking algo future index trading software that takes the trading game to a whole new level of excitement and high profit return... \n\nLike to test it out?  No credit card or money needed and cancel any time.  It's free to test - just sign up!  Any questions, please contact us at futurex168168@gmail.com", 
        {
			width: 750,
			left: 500,
			top: 70,
			fill: "orange",
			strokeWidth: 2,
            fontSize: 31,
			stroke: "green",
		});

		// Add it to the canvas
		canvas.add(textbox);
	</script>

    <img id="firstimg" src="logox.png"; style="position:absolute;top:5px;left:20px;height:100px;width:100px;border-radius:90px;";/>
    <canvas id1="canvas1"></canvas>
	<script>
		// Initiate a canvas instance
		var canvas1 = new fabric.Canvas("canvas1");
		canvas1.setWidth(document.body.scrollWidth);
		canvas1.setHeight(250);

		// Initiate a textbox object
		var textbox = new fabric.Textbox("AlgoXinvestment.com", 
        {
			width: 550,
			left: 90,
			top: 45,
			fill: "red",
			strokeWidth: 2,
			stroke: "red",
		});

		// Add it to the canvas
		canvas.add(textbox);
	</script>


    
    <?php
                DateTime();
                //print "<br><br> <br>dsfsdfsdddddddddddddddddddddddddddddddddddddddddddddddddddddfdfsdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff" .$day;
                RemoteDb(); 
                //get ask price
                //$day="Saturday";
                if ($day=="Saturday")
                {
                    $ask="Market Closed";

                }
                else if ( $day=="Sunday" and $time<"15:00:00")
                {
                    $ask="Market Closed";
                }
                else if ( $day=="Friday" and $time>"15:00:00")
                {
                    $ask="Market Closed";
                }
                else
                {
                    $sql = "SELECT cost from config where symbol='trade';";
                    $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                    $row=pg_fetch_row($rs);
                    $ask=$row[0];
                }
                
    ?>

    
    <?php
        function msg() //for testing only
        {
                                $id='acw';
                                //$url="http://localhost:8080/futurexweb/";
                                $url=$url ."client.php?name=$id";
                                header("Location: $url");
          
        }
	?>

    
    <?php
        /*=================date & time function=========================*/
        function DateTime()
        {   
           global $today,$day,$time,$cm,$cy;


		    $today = date('Y-m-d');
            $day=date('l', strtotime($today));
            $cm=date('m');
            $cy=date('y');
            //print "<br><br> <br>dsfsdfsdddddddddddddddddddddddddddddddddddddddddddddddddddddfdfsdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff" .$day;

		    //print "<p><b>Today is $today </b></p>";

		    $time = date('h:g:s');
		    //echo "<p><b>and the Time is $time </b></p>";

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

            $conn = pg_connect("host=db-postgresql-sfo3-13662-do-user-8718724-0.b.db.ondigitalocean.com  
                port=25060
                dbname=defaultdb
                user=doadmin  
                password=daezjaybtk964jyw"); 
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
                global $data;


                $sql = "SELECT  jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec FROM plapr where name='acw';";
          
                //$sql = "SELECT bal,sys,email,password FROM control limit 4;";
          
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
                $k=1;

                //print "testttttttt" .$row[9];

       
                while ($k<=$rowcount)
                {
                    //$data=array(round($row[0],2),round($row[1],2),round($row[2],2),round($row[3],2),round($row[4],2),round($row[5],2),round($row[6],2),round($row[7],2),round($row[8],2),round($row[9],2),round($row[10],2),round($row[11],2),);
                    $data=array(21,22,36,29,25.20,25.20,24.40,16.80,4.33,round($row[9],2),round($row[10],2),round($row[11],2),);

                    $row=pg_fetch_row($rs);
                    $k++;
                    
                }
                
    ?>
                <table  class="ytd" width="20px" height="5px"  bgcolor="lightgreen" >

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
                    //$data=array(1,2,3,4,5,6,7,8,round($data[9],5),10,11,12);
                    //print "test...." .$data[0] . " second...." .round($data[9],3);
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

                            <td valign="top" bgcolor="yellow" width="30px" height="30px" color="red" >
                         
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
        function disp_detail($conn,$ask)
        {
                $user_id='acw';
                $sql = "SELECT dnt,per,sellp,buyp,qty FROM plper where name='$user_id' order by dnt desc limit 3;";

                //$sql = "SELECT bal,sys,email,password FROM control where sys='py' limit 4;";

                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
                $k=1;
                $data=array();
                //print "testttttttt" .$row[0];
                while ($k<=$rowcount)
                {
                    $data=array_merge($data,array($row[0],round($row[1],5),$row[2],$row[3],$row[4]));
                    $row=pg_fetch_row($rs);
                    $k++;
 

                }
                
    ?>
                <table  class="data" bgcolor="lightyellow" width="20px" height="10px">

                 <tr>
                            <th>Date & time</th>
                            <th>Profit this trade</th>
                            <th>Sold at</th>
                            <th>Brought at</th>
                            <th>Positions</th>
                           
                            
                </tr>

                <?php
                    $max_columns=5;
                    $record_id=0;
                    
                    //$data=array("10/11/2023 11:30am", "0.0078%","4430.25", "4410.50","1");
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

                            <td valign="top" bgcolor="white" width="10px" height="5px">
                         
                            <?php 
                                if ($columns==1)
                                {
                                    echo $data[$record_id] ."%";
                                }
                                else 
                                {
                                        echo $data[$record_id]; 
                                }
                                ?>

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



    <h3 class="login";color:black;>
 
        <?php
                
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
            
            

	            print "<table> ";

	            print "<tr> ";
	            print "<td>Email: </td><td><input type='email' name='userid' size='25' /><br /> ";
	            print "</tr> ";

	            print "<tr> ";
	            print "<td>Password: </td><td><input type='text' name='password' size='25' /></td> ";
                print "<tr> ";
	            
	            //print "</tr> ";

                /*
                print "<tr> ";
	            print "<td>Comments:</td><td><input type='textarea' name='comments' rows='7' cols='50' /></td> ";
	            print "</tr> ";
                */
	            print "</table> ";


	            print "<p><input type='submit' name='login' float-right value='Login' /> ";
                print "<br><br>";
                print "No Account - Just enter email & password then click signup for FREE!!";
               

                ?>

                <form action="submit" method="post">
                    <input type="submit" name="signup" value="SignUp">
                </form>

        <?php

                       
  //===========================signup clients=========================================================
                        if (array_key_exists('signup',$_POST))
                        {

                                $userid=$_POST['userid'];
                                $password=$_POST['password'];
                                $ecode=strval(rand(1000,9999));
                                if ($userid !='' and $password !='')
                                {
                                    $sql = "SELECT sys FROM control WHERE email= '$userid';";

                                    $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                                    $row=pg_fetch_row($rs);
                                    $rowcount= pg_num_rows($rs);

                                    if ($rowcount>0 and(!isset($row[$rowcount])))
                                    {
                                        //print  $ecode .$password .$userid  ."<br>";
                                        print "Email alreaady exist - please just sign-in";
                                    }
                                    else
                                    {
                                        $sql = "INSERT INTO signup (email,code) values('$userid','$ecode');";
                                        $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                                        pg_query("COMMIT") or die("Transaction commit failed\n");
                                        $url="signup.php?ecode=$ecode&email=$userid&pw=$password";
                                        header("Location: $url");
                                        
                                        
        ?>
  </h3>

  <h3 class="login1";color:black;
  <?php
                                                       

                                    }

                                }
                                else
                                {
                                    print "Please enter valid email and new password #";
                                }
                        }
                            
                        
//=============================Login start here ===========================================================
                        if (array_key_exists('login',$_POST))
                        {
                            $sql = "SELECT sys FROM control WHERE email= '$userid' AND pw='$password';";

                            $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                            $row=pg_fetch_row($rs);
                            $rowcount= pg_num_rows($rs);
                            //print($rowcount .$userid);
                            if ($rowcount<=0 and(!isset($row[$rowcount])))
                            {
                                print 'Email or Password not found!';
           
              
                            }
                            else if ($rowcount>0 and $userid !='')
                            {

                                $id=$row[0];
                                
                                //$url="http://localhost:8080/futurexweb/";

                                $url="client.php?name=$id";
                                header("Location: $url");

                            }
                        }
                    
 ?>

    </h3>

    <h3 class="ask">
      <?php
        print "<font color='black'>LIVE - ES current price:</font> $ask";
      ?>
    </h3>


    <h3 class="tot"> 
    <?php
        disp_ytd($conn);
        $lastyearper=35;

        print "<br>Last Year Annual Return:  $lastyearper%<br>";
        disp_detail($conn,$ask);
    ?>
    </h3>

</body>
</html>
