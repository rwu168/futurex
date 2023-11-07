<?php 
                datetime();
                if ($day=="Saturday")
                {
                    $ask1="Market Closed";

                }
                else if ( $day=="Sunday" and $time<"15:00:00")
                {
                    $ask1="Market Closed";
                }
                else if ( $day=="Friday" and $time>"15:00:00")
                {
                    $ask1="Market Closed";
                }
                else
                {
                        $ask1="o";
                        header("refresh: 120");
                }
?>

<!DOCTYPE html>
<html>
<head>

<style>body {font-family: Arial, Helvetica, sans-serif; font-size: 12px;}</style>
<!link rel="stylesheet" type="text/css" href="css/basic.css" />
<body style="font-family: Arial, Helvetica, sans-serif; color: red; background-color: white;">
<form id="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<!h2 style="background-color: white; "</h2>
<title>HTML <td> bgcolor Attribute</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/510/fabric.min.js"></script>

<style>
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
  width: 50px;
  height: 255px;
  margin: auto;
  width: 30%;
  top: 100px;
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}

.tot {
  position: fixed;
  width: 60px;
  left: 5px;
  height: 40px;
  width: 30%;
  top: 350px;
  background-color: white;
  #border: 3px solid #73AD21;
  color: black;
  
}


.ask {
  position: fixed;
  width: 60px;
  left: 5px;
  height: 40px;
  width: 25%;
  top: 370px;
  color: green;
}

.ytd{
  position: fixed;
  width: 600px;
  left: 5px;
  height: 20px;
  width: 30%;
  top: 400px;
  border: 3px solid #73AD21;
  color: black;
}

.data {
  position: fixed;
  width: 300px;
  left: 5px;
  height: 40px;
  width: 30%;
  top: 470px;
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  top:550px;
}
</style>

<body>

    <?php
                error_reporting(0);
                RemoteDb();
                //get account data
                $name=$_GET['name'];
                $sql = "SELECT qty, amt, flag2,micro,bal,active,s1 FROM control where sys='$name';";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);        
                $qty=$row[0];
                $amt=$row[1];
                $act1=$row[2];
                $micro=$row[3];
                $bal=$row[4];
                $active=$row[5];
                $tsymbol=$row[6];

                //get profit/los per month data
                $sql = "SELECT sum(jan1),sum(feb1),sum(mar1),sum(apr1),sum(may1),sum(jun1),sum(jul1),sum(aug1),sum(sep1),sum(oct1),sum(nov1),sum(dec1) FROM plapr where name='$name';";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $totpl=floatval($row[0])+floatval($row[1])+floatval($row[2])+floatval($row[3])+floatval($row[4])+floatval($row[5])+floatval($row[6])+floatval($row[7])+floatval($row[8])+floatval($row[9])+floatval($row[10])+floatval($row[11]);


                DateTime();
                //print "<br><br> <br>dsfsdfsdddddddddddddddddddddddddddddddddddddddddddddddddddddfdfsdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff" .$day;
                RemoteDb(); 
                //get ask price
                //$day="Saturday";
                $sql = "SELECT cost,cost1 from config where symbol='trade';";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $ask=floatval($row[0]);
                $ask2=floatval($row[1]);


                //get level buy data
                if ($tsymbol=="NQ")
                {
                    if ($micro=="y")
                    {
                        $mul=2;
                    }
                    else
                    {
                        $mul=20;
                    }
                }
                else
                {
                    if ($micro=="y")
                    {
                        $mul=5;
                    }
                    else
                    {
                        $mul=50;
                    }
                }

                $sql = "SELECT tprice,qty,level from cost where name='$name' order by level;";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs); 
                $urpl=0;
                for ($k=0;$k<$rowcount;$k++)
                { 
                    if ($tsymbol=="NQ")
                    {
                        $pl=(floatval($ask2)-$row[0]) * $row[1] *$mul ;
                    }
                    else
                    {
                        $pl=(floatval($ask)-$row[0]) * $row[1] *$mul ;
                    }

                    //print $pl ."|"  .$ask ."|" .$row[0] ."|".$row[1] ."|" .$row[2];  
                    
                    $urpl=$urpl+$pl;
                    $row=pg_fetch_row($rs);
                }
         
      

    ?>

    
	<canvas id="canvas"></canvas>
	<script>
		// Initiate a canvas instance
		var canvas = new fabric.Canvas("canvas");
		canvas.setWidth(document.body.scrollWidth);
		canvas.setHeight(900);

		// Initiate a textbox object
 
        var $act = "<?php echo"$act1"?>"; 
        if ($act == 0)
        {
            $status="Account in Live Trading and using the first-in/last-out accounting rule for P/L. \n\nDon't think of this trading like a traditional investment but treat it like you invest in a business operation - it allocated about 15-20% unrealized amount as operating cost (op/cost) to handle market corrections(5-10%) runs 1-3 times a year, and (25-30% major correction or market crash once 5-10 year).  This unrealized op/cost may go up or down from time to time - it normally goes up when we buy more positions during market down, and goes down when we sell positions for profit during market up.  Just like operating a business, you buy products when price are down and sell products when price are up for taking profit.  No need to worry about the allocated operating cost because it always within our allocated range - just keep eyes on the profit month after month...";

        }
        if ($act == 1)
        {
            $status="Congratulations!  Your Account is in live Paper Money trading and using the first-in/last-out accounting rule for P/L. \n\nDon't think of this trading like a traditional investment but treat it like you invest in a business operation - it allocated about 15-20% unrealized amount as operating cost (op/cost) to handle market corrections(5-10%) runs 1-3 times a year, and (25-30% major correction or market crash once 5-10 year).  This unrealized op/cost may go up or down from time to time - it normally goes up when we buy more positions during market down, and goes down when we sell positions for profit during market up.  Just like operating a business, you buy products when price are down and sell products when price are up for taking profit.  No need to worry about the allocated operating cost because it always within our allocated range - just keep eyes on the profit month after month... \n\nReady for Real Live Trade, Click Upgrade button - any questions, please contact us at futurex168168@gmail.com";
        }
        if ($act == 2)
        {
            $status="[STATUS]: Test Trading Expired .... any questions, please contact us at futurex168168@gmail.com";
        }
        if ($act == 3)
        {
            $status="[STATUS]: Invalid TD Ameritrade User name or Password - please contact us at futurex168168@gmail.com";
        }
        if ($act == 4)
        {
            $status="[STATUS]: Account missing secondary phone#.  Please add this #626-353-3808 to allow access - any questions, please contact us at futurex168168@gmail.com";
        }
        if ($act == 5)
        {
            $status="[STATUS]: Account waiting for Future Trading approve by TD Ameritrade (take 2-3 business days after your applied)  - Any questions,please contact us at futurex168168@gmail.com";
        }
        else if ($act>5)
        {
            $status="Testing....";
        }


		var textbox = new fabric.Textbox($status, 
        {
            width: 510,
			left: 600,
			top: 5,
			fill: "orange",
			strokeWidth: 1,
            fontSize: 19,
			stroke: "green",
		});
        canvas.add(textbox);

        if ($act==0) 
        {
            $status1="Disclosure: We are NOT licensed brokers and we are NOT directly or indirectly providing any financial advice and no guarantee of profit/principal. This is for you to test our Algo Trading in real money. Both sides may cancel the service at any time by notifying each other.";
		
            var textbox1 = new fabric.Textbox($status1, 
            {
                width: 510,
			    left: 600,
			    top: 410,
			    fill: "orange",
			    strokeWidth: 1,
                fontSize: 13,
			    stroke: "green",
		    });

		    // Add it to the canvas
		    canvas.add(textbox1);
        }
	</script>

    <img id="firstimg" src="logox.png";  style="position:fixed;top:5px;left:20px;height:100px;width:100px;border-radius:90px;";/>

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
			left: 100,
			top: 40,
			fill: "red",
			strokeWidth: 2,
			stroke: "red",
		});

		// Add it to the canvas
		canvas.add(textbox);
	</script>



<body>
    
    <?php
        /*=================date & time function=========================*/
        function DateTime()
        {   
           global $today,$day,$time;


		    $today = date('Y-m-d');
            $day=date('l', strtotime($today));
            //print "<br><br> <br>dsfsdfsdddddddddddddddddddddddddddddddddddddddddddddddddddddfdfsdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff" .$day;

		    //print "<p><b>Today is $today </b></p>";

		    $time = date('h:g:s');
		    //echo "<p><b>and the Time is $time </b></p>";

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
        function disp_ytd($conn,$name)
        {
                global $data;

                //$fmt = new NumberFormatter("en_US",  NumberFormatter::CURRENCY);
                $sql = "SELECT  jan1,feb1,mar1,apr1,may1,jun1,jul1,aug1,sep1,oct1,nov1,dec1 FROM plapr where name='$name';";
          
                //$sql = "SELECT bal,sys,email,ph FROM control limit 4;";
          
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
                $k=1;

                //print "testttttttt" .$row[9];

       
                while ($k<=$rowcount)
                {
                    $data=array(round($row[0],5),round($row[1],5),round($row[2],5),round($row[3],5),round($row[4],5),round($row[5],5),round($row[6],5),round($row[7],5),round($row[8],5),round($row[9],5),round($row[10],5),round($row[11],5),);
                    //$data=array(21,22,36,21,25.20,25.20,20.40,16.80,4.33,round($row[9],5),round($row[10],5),round($row[11],5),);

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
                         
                            <?php 
                                //$usd = $fmt->formatCurrency($data[$record_id], "USD");
                                $usd = number_format($data[$record_id],2);
                                echo "$" .$usd ?>
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
        function disp_detail($conn,$name,$ask)
        {
                global $totpl;

                //$fmt = new NumberFormatter("en_US",  NumberFormatter::CURRENCY);
                $sql = "SELECT dnt,plamt,sellp,buyp,qty FROM plper where name='$name' order by dnt desc limit 3;";

                //$sql = "SELECT bal,sys,email,ph FROM control where sys='py' limit 4;";

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
                            <th>Position sold</th>
                           
                            
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

                            <td valign="top" bgcolor="white" width="20px" height="10px" >
                         
                            <?php 
                                if ($columns==1)
                                {
                                    //$usd = $fmt->formatCurrency($data[$record_id], "USD");
                                    $usd = number_format($data[$record_id],2);
                                    echo "$" .$usd;
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
           
        ?>
    </table>
    <?php
    }
           
    ?>

    
    
 
   
    <h2 class="login";color:black;>Real Time Acct Info
 
        <?php
                
                
  	            print "<table> ";

                //$fmt = new NumberFormatter("en_US",  NumberFormatter::CURRENCY);
	            print "<tr> ";
                    $usd = number_format($amt,2);
	                print "<td>Investment Amount :$ $usd <td> <size='25' /><br /> ";
	            print "</tr> ";

	            print "<tr> ";
                    //$usd = $fmt->formatCurrency($totpl, "USD");
                    $usd = number_format($totpl,2);
	                print "<td>Unajusted P/L MTD &nbsp:$ $usd <td> <size='25' /><br /> ";
	            print "</tr> ";

                print "<tr> ";
                    //$usd = $fmt->formatCurrency($urpl, "USD");
                    $usd = number_format($urpl,2);
	                print "<td>Unrealized Op/Cost &nbsp:$ <font color=green>$usd </font><td> <size='25' /><br /> ";
	            print "</tr> ";

                print "<tr> ";
	                print "<td>Holding Positions;&nbsp;&nbsp;&nbsp: $qty <td> <size='25' /><br /> ";
	            print "</tr> ";

                print "<tr> ";
      
                    $bal=$amt+$totpl;

                    if ($micro=='y')
                    {
                        $cash=$bal-$qty*1400;
                    }
                    else 
                    {
                        $cash=$bal-$qty*14000;
                    }
                    
                    //$usd = $fmt->formatCurrency($cash, "USD");
                    $usd = number_format($cash,2);
	                print "<td>Cash Buying Power:$ $usd <td> <size='25' /><br /> ";
	            print "</tr> ";

                print "<tr> ";
                    //$usd = $fmt->formatCurrency($bal, "USD");
                    $usd = number_format($bal,2);
	                print "<td>Account Balance &nbsp;&nbsp;&nbsp;&nbsp:$ $usd <td> <size='25' /><br /> ";                   
	            print "</tr> ";

               
?>
                <?php
                if ($act1>0)
                {?>
                    <button></button>
                    <!-- a href="www.tradexinvestment.com/form_input1.php" class="button">Upgrade to Live Tradeing</a> -->
                    <a href="trade.php" class="button">Upgrade to Live Trading</a>
                <?php
                }?>

<?php
                /*
                print "<tr> ";
	            print "<td>Comments:</td><td><input type='textarea' name='comments' rows='7' cols='50' /></td> ";
	            print "</tr> ";
                */
	            print "</table> ";




          ?>
    </h2>


<h3 class="ask">
      <?php
        if ($ask1=="o")
        {
            print "<font color='black'>LIVE - ES-NQ current price:</font> $ask  - $ask2";
        }
        else
        {
            print "<font color='black'>LIVE - ES current price:</font> Market Closed";
        }

      ?>
    </h3>

<h3 class="ask"> 
    <?php
     
        
        disp_ytd($conn,$name);
        disp_detail($conn,$name,$ask);
        exit;
    
 
        
    ?>
</h3>

    

</body>
</html>
