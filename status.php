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


.data {
  position: fixed;
  width: 300px;
  left: 5px;
  height: 40px;
  width: 30%;
  top: 35px;
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
        /*=================date & time function=========================*/
        function DateTime()
        {   
           global $today,$day,$time,$datef,$datet;

            $today = date('Y-m-d');
  
            $cm=date('m');
            $cy=date('y');
		    $datef = date('Y-m-01', strtotime($today));
            $datet = date('Y-m-t', strtotime($today));

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
    /*=================Display detail of trading activities==================================*/
        function disp_detail($conn,$today)
        {
                global $tot, $totwu;

                $datef=date('Y-m-01', strtotime($today));
                $datet=date('Y-m-t', strtotime($today));
                //echo $datef ."iiiiii" .$datet ."<br>";

                $sql = "select mkt_cond,sprice,spriceselldown from config where symbol='trade';";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $mkt_cond=$row[0];
                $sprice=$row[1];
                $spriceselldown=$row[2];

                $sql = "Select sum(pl),sum(qty),name from profit where cdate>=date('$datef') and cdate<=date('$datet') group by name order by name;";

                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
                $k=1;
                $data=array();
                $tot=0;
                $totwu=0;
                while ($k<=$rowcount)
                {
                    $name=$row[2];
                    $pl=round($row[0],2);
                    $qty1=$row[1];
                    $pl=$pl-($qty1*6);

                    $sql1 = "Select qty,amt,bal,mkt_cond,mnq,rge,micro,contracts,seccont,spriceselldown,sprice,mmy from control where sys='$name';";
                    $rs1 = pg_query($conn, $sql1) or die("Cannot connect: $sql1<br>"); 
                    $row1=pg_fetch_row($rs1);
                    $rowcount1= pg_num_rows($rs1);
                    if ($rowcount1>0)
                    {
                        
	                    $qty=$row1[0];
                        $amt=$row1[1];
                        $bal=round($row1[2],2);
                        $mkt_cond1=$row1[3];
                        if ($mkt_cond1>0)
                        {
                            $mkt_cond=$mkt_cond1;
                        }
                        $rpl= round($bal - $amt + $pl);$per=round($pl*12/$amt,2);$micro=$row1[6];$contracts=$row1[7];$seccont=$row1[8];
                        if ($row1[4]=='') {$level=0;} else { $level=$row1[4];}
                        if ($row1[5]=='') {$rge=0;} else { $rge=round($row1[5]);}
                        if ($row1[9]>0) {$spriceselldown=round($row1[9]);}
                        if ($row1[10]>0) {$sprice=round($row1[10]);}
                        if ($row1[11]=='') {$myrate=0;} else { $myrate=$row1[11];}
                        $tot=$tot+$pl;
                        if ($name=="ts" or $name=="py" or $name=="rw2" or $name=="rw1" or $name=="tspy" or $name=="twrw")
                        {
                            $wu=$pl;
                        }
                        else
                        {
                            $wu=$pl * ($myrate / 100);
                        }

                        $totwu=$totwu + $wu;

                        //print $rge ."==!=<br>";
                        $data=array_merge($data,array($name,$pl,$rpl,$bal,$qty,$level,$mkt_cond,$rge,$micro,$contracts,$seccont,$spriceselldown,$sprice));
                    }
                    $row=pg_fetch_row($rs);
                    $k++;
 

                }
                //print $qty ."==!=<br>";
                
                
    ?>
                <table  class="data" bgcolor="lightyellow" width="20px" height="10px">

                 <tr>
                            <th>name</th>
                            <th>Profit</th>
                            <th>Unrealize</th>
                            <th>Balance</th>
                            <th>Qty</th>
                            <th>Level</th>
                            <th>Mkt</th>
                            <th>Rge</th>
                            <th>Micro</th>
                            <th>Q1</th>
                            <th>Q2</th>
                            <th>SellD</th>
                            <th>SP</th>
                           
                            
                </tr>

                <?php
                    $max_columns=13;
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

  

<h3 class="ask"> 
    <?php
        RemoteDb();
        DateTime();
        disp_detail($conn,$today);
        print "Total  $" .number_format($totwu,2) ."---------$" .number_format($tot,2);
    ?>
	
    
</h3>

    

</body>
</html>