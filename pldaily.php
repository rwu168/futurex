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

                $sql = "select name,pl from profit where cdate>=date('$today') and cdate<=date('$today') order by name;";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $rowcount= pg_num_rows($rs);
                $k=1;
                $data=array();
                $tot=0;
                while ($k<=$rowcount)
                {
                        $data=array_merge($data,array($row[0],$row[1]));
                        $row=pg_fetch_row($rs);
                        $k++;
                }
                
    ?>
                <table  class="data" bgcolor="lightyellow" width="20px" height="10px">

                 <tr>
                            <th>name</th>
                            <th>Date</th>
                            
                           
                            
                </tr>

                <?php
                    $max_columns=2;
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
       
    ?>
	
    
</h3>

    

</body>
</html>
