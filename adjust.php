<!DOCTYPE html>
<html>
<head>
<body>

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


.login1 {
  position: fixed;
  width: 500px;
  margin: auto;
  height: 200px;
  width: 70%;
  top: 5px;
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}


.data {
  position: fixed;
  width: 300px;
  left: 5px;
  height: 40px;
  width: 30%;
  top: 250px;
  background-color: lightgrey;
  border: 3px solid #73AD21;
  color: black;
}
</style>

<body>

	<?php
        error_reporting(0);
        global $today,$day,$time,$cm,$cy,$today1;

        /*=================date & time function=========================*/
        function DateTime()
        {   
           global $today,$day,$time,$cm,$cy,$today1,$td;


		    $today = date('Y-m-d');
            $day=date('l', strtotime($today));
            $cm=date('m');
            $cy=date('Y');
            $today1=date('Y-m-1');

            //$td1=date("$cy-$cm-1"); 

		    //print "<p><b>Today is $today1 </b></p>";
            //print "===" .$td1 ."my date";
		    $time = date('h:g:s');
		    //echo "<p><b>and the Time is $time </b></p>";

        }


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
    /*=================Display detail of trading activities==================================*/
        function disp_detail($conn,$name)
        {
				//print $name ."===";
                $sql = "select name,level,tprice,qty from cost where name='$name' order by level desc;";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
                $k=1;
                $data=array();
                $tot=0;
                while ($k<=$rowcount)
                {
                        $data=array_merge($data,array($row[0],$row[1],$row[2],$row[3]));
                        $row=pg_fetch_row($rs);
                        $k++;
                }
                
    ?>
                <table  class="data" bgcolor="lightyellow" width="20px" height="10px">

                 <tr>
                            <th>name</th>
                            <th>Level</th>
							<th>Price</th>
							<th>Qty</th>
                            
                           
                            
                </tr>

                <?php
                    $max_columns=4;
                    $record_id=0;
                    //$data=array(1,2,3,4);
                    //$data=array_merge($data,array(1,2,3,4));
                    //print $data[0] .$data[1] .$data[2] ."===<br>";

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
                                if ($columns==1 or $columns==2 or $columns==3)
                                {
                                    //$usd = $fmt->formatCurrency($data[$record_id], "USD");
                                    $usd = $data[$record_id];
                                    echo $usd;
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


	<?php 

				RemoteDb();
                DateTime();
				session_start(); 
				if(isset($_POST['name'])) 
				{ 
					$_SESSION['name'] = serialize($_POST['name']);
					$name=$_POST['name'];
				} 
				if(isset($_SESSION['name'])) 
				{ 
				    $name = unserialize($_SESSION['name']); 
				} 

				disp_detail($conn,$name);
					
	?>

				<h3 class="login1";color:black;">
				<form action="menu.php" method="post" top="120px">

                    <input hidden type="text" size=10 name="today1" value="<?=$today1?>">
                    <input hidden type="text" size=10 name="cm" value="<?=$cm?>">
                    <input hidden type="text" size=10 name="cy" value="<?=$cy?>">
				
					Name: <input readonly type="text" size=10 name="name" value="<?=$name?>"><br><br>

					Update/Insert: 
					Level:  <input type="text" size=5 name="level" value="">	
                    Price:  <input type="text" size=5 name="price" value="">	
					Qty: <input type="text" size=2 name="qty" value=""><br>

                    Adjustment: 
					Amount:  <input type="text" size=5 name="amt" value="">	
                    Month:  <input type="text" size=5 name="cm" value="<?=$cm?>">	
					Year: <input type="text" size=2 name="cy" value="<?=$cy?>"><br>

                    Rollover Qty:  <input type="text" size=5 name="qty1" value="">	
                    From level:  <input type="text" size=5 name="fm" >	
					To: <input type="text" size=2 name="to" ><br>
                    Ins Reset Name:  <input type="text" size=5 name="name1" value=""><br><br>
                    
					Delete(Enter yes and delete all left level=blank):
					<input type="text" size=5 name="del" value="">
					Level <input type="text" size=2 name="dellevel" value=""><br><br>


						<input type="submit"> <input type="submit" name="quit" value="Return">
			</form>
			<br>



    <?php
    if (isset($_POST['quit']) )
	{
            //print "sdsdssd";
			$url="menu.php";
            header("Location: $url");
	}

	//if (isset($_POST['level']) or isset($_POST['del']) or isset($_POST['amt']) or isset($_POST['qty1']))
    if (isset($_POST['name']) )
    {
		$name=$_POST['name'];
        $cm=$_POST['cm'];
        $cy=$_POST['cy'];
        $td=date("$cy-$cm-1");
		$level=$_POST['level'];
		$price=$_POST['price'];
		$qty=$_POST['qty'];
        $del=$_POST['del'];
        $amt=floatval($_POST['amt']);
        $dellevel=$_POST['dellevel'];
        $qty1=intval($_POST['qty1']);
        $fm=intval($_POST['fm']);
        $to=intval($_POST['to']);
        $name1=$_POST['name1'];


        
        //print $amt .$td .$cm .$cy ."==2==<br>";
        if ($level>0 and $price>0 and $qty>0) //Update and insert level
		{
                //print $level ."==1==<br>";
                $sql = "delete from cost where name='$name' and level='$level';";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 

                $sql = "insert into cost(name,level,tprice,qty) values('$name',$level,$price,$qty);";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
		        pg_query("COMMIT") or die("Transaction commit failed\n");

        }

        if (($amt >0 or $amt<0) and $cm !="" and $cy !="") //make adjust to p/l
        {
                //print $amt .$td ."==2==<br>";
                $sql = "update profit set pl=pl+$amt where name='$name' and cdate=date('$td') and adjust=1;";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $count=pg_affected_rows($rs);
                if ($count<1)
                {
                    $sql = "insert into profit(name,cdate,pl,adjust) values('$name',date('$today1'),$amt,1);";
                    $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                }
                pg_query("COMMIT") or die("Transaction commit failed\n");
                $amt=0;
        }
        
        if ($qty1>0 and $fm>0 and $to>0) //Move level QTY
		{
                //print $level ."==3==<br>";
                $sql = "update cost set qty=qty-$qty1 where name='$name' and level=$fm;";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $sql = "update cost set qty=qty+$qty1 where name='$name' and level=$to;";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 

                
		        pg_query("COMMIT") or die("Transaction commit failed\n");
                $qty1=0;
        }

		if ($del =="yes") //delete level
        {
                 //print $dellevel ."==4==<br>";
                if ($dellevel>0)
                {
                        $sql = "delete from cost where name='$name' and level='$dellevel';";
                        $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
		                pg_query("COMMIT") or die("Transaction commit failed\n");
                }
                else
                {
                        $sql = "delete from cost where name='$name';";
                        $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 

                        $sql = "update control set secbuy=0,m2k=-2,qty=0,rty=0  WHERE sys = '$name';";
                        $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                }
                pg_query("COMMIT") or die("Transaction commit failed\n");

        }
       
        if ($name1 != '') //reset INS QTY
        {
                $sql = "update control set ym=0,seccont=0,seccontqty=0,ym1=0,seccont1=0,seccont1qty=0 WHERE sys = '$name1';";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                pg_query("COMMIT") or die("Transaction commit failed\n");

        }
		disp_detail($conn,$name);
	}

	
	?>
	

	</h3>
	</body>
	</html>
	