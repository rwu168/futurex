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

            date_default_timezone_set('America/Los_Angeles');
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

                $sql = "select mkt_cond,sprice,spriceselldown,cost,cost1,buyl3 from config where symbol='trade';";
                $rs = pg_query($conn, $sql) or die("Cannot connect: $sql<br>"); 
                $row=pg_fetch_row($rs);
                $mkt_cond=$row[0];
                $sprice=$row[1];
                $spriceselldown=$row[2];
                $ask1=$row[3];
                $ask2=$row[4];
                $time_stop=$row[5];

                
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
                    //print($name);
                    $sql1 = "Select qty,amt,bal,mkt_cond,mnq,rge,micro,contracts,rty,spriceselldown,sprice,mmy,secbuy,s1,f1,seccont,seccont1,ym,ym1,flag2,secbuy,s2,rpl,seccontqty,reserve,ramt,m2k,buyl3,smscode,selll3,i1,updn from control where sys='$name';";
                    $rs1 = pg_query($conn, $sql1) or die("Cannot connect: $sql1<br>"); 
                    $row1=pg_fetch_row($rs1);
                    $rowcount1= pg_num_rows($rs1);
                    pg_query("COMMIT") or die("Transaction commit failed\n");
                    $bal=$row1[2];
                    $micro=$row1[7];
                    if (strval($row1[9]==""))
                    {
                        $hedgecap=0;
                    }
                    else 
                    {
                        $hedgecap=$row1[9];
                    }

                    $tsymbol=$row1[13];$urper=round($row1[14],2);$seccont=$row1[15];$seccont1=$row1[16];$ym=$row1[17];$ym1=$row1[18];$tradeclass=$row1[19];$secbuy=$row1[20];$s2=$row1[21];$pivotqty=$row1[22];$seccontqty=$row1[23];$reserve=$row1[24];$ramt1=$row1[25];$m2k=$row1[26];
                    $avgcost=$row1[27];$smscode=$row1[28];$selll3=$row1[29];$i1=$row1[30];$updn=$row1[31];
                    if (strval($seccont)==""){$seccont=0;}if (strval($ym1)==""){$ym1=0;}if (strval($seccont1)==""){$seccont1=0;}
                    if (strval($selll3)=='') {$selll3=0;}
                    if (strval($i1)=='') {$i1=0;}
                    if (strval($updn)=='') {$updn=0;}
                    if (strval($seccont1)=="")
                    {
                        $seccont1=0;
                    }
                    else
                    {
                        $seccont1=$row1[16];
                    }
                    
                    //echo $name .$bal ,"==" .$hedgecap;
                    if ($rowcount1>0)
                    {
                        $micro=$row1[6];

                        if ($tsymbol=="NQ" and $tradeclass !=5)
                        {
                                $ask=$ask2;
                                $mul=20;
                        }
                        else
                        {
                                $ask=$ask1;
                                $mul=50;
                        }
                        $rty=$row1[8];
                        $sql2 = "Select tprice,qty,insqty,insprice from cost where name='$name';";
                        $rs2 = pg_query($conn, $sql2) or die("Cannot connect: $sql2<br>"); 
                        $row2=pg_fetch_row($rs2);
                        pg_query("COMMIT") or die("Transaction commit failed\n");
                        $rowcount2= pg_num_rows($rs2);
                        $url=0;
                        $k2=0;
                        
                        while ($k2<$rowcount2)
                        {
                            //if ($name=="fx3394") {print $name .$ask .$tsymbol .$ask2 ."|" .$row2[0] ."|" .$row2[1] .$mul ."===";}
                            if ($tsymbol=="ES")
                            {
                                $ask=$ask1;
                                $mul=50;
                            }
                            else 
                            {
                                $ask=$ask2;
                                $mul=20;
                            }

                            if ($micro=="y")
                            {
                                $qty=intval($row2[1])/10;
                            }
                            else
                            {
                                $qty=intval($row2[1]);
                            }
                            $insqty=intval($row2[2]);
                            $insprice=floatval($row2[3]);

                            $url1=($ask-floatval($row2[0]))*($qty+$insqty)*intval($mul);
                            $url2=($ask-$insprice)*$insqty*intval($mul);
                            $url=$url+$url1+$url2;
                            //if ($name=="test") {print $name .$url1  .$qty .$mul ."==!=<br>";}
                            $row2=pg_fetch_row($rs2);
                            $k2++;
                            

                        }
                       
	                    $qty=$row1[0];
                        $amt=$row1[1];
                        $mkt_cond=$row1[3];
                        $contracts=$row1[7];$rty=$row1[8];                     
                        
                        if ($row1[2]<=0)
                        { 

                            $bal=$amt+$url+$pl;
                            $rpl=$url;
                            if ($url==0){$bal=$amt+$pl;}
                            
                        }
                        else
                        {
                            $bal=round($row1[2]+$rty,2);
                            $rpl= round($bal - ($amt + $pl+$rty));
                            //if ($url==0){$bal=$bal+$pl;}
                            
                        }
                        
                        //echo $name ."=" .$bal;
                        //$per=round($pl*12.0/$amt,2);
                        //$urper=round((($rpl)/$amt)*-100,2);

                        if ($row1[4]=='') {$level=0;} else { $level=$row1[4];}
                        if ($row1[5]=='') {$rge=0;} else { $rge=round($row1[5]);}
                        if ($row1[9]>0) {$spriceselldown=round($row1[9]);}
                        if ($row1[10]>0) {$sprice=round($row1[10]);}
                        if ($row1[11]=='') {$myrate=0;} else { $myrate=$row1[11];$secbuy=$row1[12];}
                        
                        $tot=$tot+$pl;
                        if ($name=="ts" or $name=="ts1" or $name=="py" or $name=="rw2" or $name=="rw1" or $name=="tspy" or $name=="tspy1" or $name=="twrw" or $name=="twrw1")
                        {
                            $wu=$pl;
                        }
                        else if ($name=="kiet")
                        {
                            $wu=$pl * (($myrate-10) / 100);
                        }
                        else
                        {
                            $wu=$pl * ($myrate / 100);
                        }

                        $totwu=$totwu + $wu;

                       
                        
                        /*
                        if ($name=="twrw1")
                        {
                                print $name .$bal . $row1[2] .$pl ."==<br>";
                        }
                       
                        if ($tradeclass>2 and $row1[2]>0)
                        {
                            $bal=$row1[2];
                        }
                        */

                        $per=round(($pl*12/($amt+$rty))*100,2);
                        /*
                        if ($tradeclass>2 and $seccont1<0)
                        {
                            $rge=0;
                            $qty=$seccont1;
                        }
                        */

                        //print $name .$ask .$ym1 ."==!=<br>";
                        if (strval($level)==""){$level=0;}if (strval($qty)==""){$qty=0;}
                        if ($tradeclass>5 and $tradeclass<=8){$rge=0;}
                        if ($ym>0 and $tradeclass !=6)
                        {
                             if ($tradeclass=="5" or $tsymbol=="ES") {$ask=$ask1;$mul=50;} else {$ask=$ask2;$mul=20;}
                             //if ($name=="test") {print $name .$ym  .$ask1 .$mul ."==!=<br>";}
                             if ($tradeclass=="5") {$rge1=(($ask1-$ym)*-$mul)*$seccont*-1;} else {$rge1=(($ask-$ym)*-$mul)*$seccont;}

                        }
                        else if ($ym1>0 and $tradeclass !=6)
                        {
                            $rge1=$ask2-$ym1;
                        }
                        else
                        {
                            $rge1=0;
                        }
                        $sql3 = "Select tprice,level from cost where name='$name' order by level desc;";
                        $rs3 = pg_query($conn, $sql3) or die("Cannot connect: $sql2<br>"); 
                        $row3=pg_fetch_row($rs3);
                        pg_query("COMMIT") or die("Transaction commit failed\n");
                        $rowcount3= pg_num_rows($rs3);
                        //if ($name=="funky"){print $name .$row3[1] ."==!=<br>";}
                        //if (strval($row3[1])==""){$level=0;} else {$level=$row3[1];
                        if ($rowcount3>0 and $tradeclass<4)
                        {
                            $tprice=$row3[0];
                            $rge=$ask-$tprice;
                            $level=$row3[1];
                            //print $name .$ask1 .$tprice ."==!=<br>";
                            if ($s2=="w"){$rge1=(($ask1-$ym)*$seccont*50)/10;}
                        }
                        else if ($ym1>0 and $tradeclass==4)
                        {
                            $rge=$ask-$ym1;
                            $level=0;
                        }
                        else if ($rowcount3>0 and $tradeclass==5)
                        {
                            $tprice=$row3[0];
                            $rge=$ask1-$tprice;
                            $level=$row3[1];
                            //print $name .$ask2 .$tprice ."==!=<br>";
                        }
                        else { $rge=0;}
                        $rge=round($rge);

                        //Calculate repair total qty=====================
                        
                        $r_totqty=0;
                        $r_closs=0;
                        $sql3 = "Select tprice,qty from cost_rep where name='$name';";
                        $rs3 = pg_query($conn, $sql3) or die("Cannot connect: $sql3<br>"); 
                        $row4=pg_fetch_row($rs3);
                        pg_query("COMMIT") or die("Transaction commit failed\n");
                        $rowcount4= pg_num_rows($rs3);
                        //if ($name=="aaron"){print $name .$ask1 .$row4[0] ."==!=<br>";}

                        if ($rowcount4>0 and $s2=="w")
                        {
                            $r_tprice=$row4[0];
                            $r_qty=$row4[1];
                            $r_rge1=$ask1-$r_tprice;
                            $r_totqty=$r_totqty+$r_qty;
                            $r_closs=$r_closs+$r_rge1*($r_qty/10)*50;
                            //print $name .$ask1 .$tprice ."==!=<br>";

                        }


                        //Calculate wave range=====================
                        $sql3 = "Select tprice,level from cost_ins where name='$name' order by level desc;";
                        $rs3 = pg_query($conn, $sql3) or die("Cannot connect: $sql3<br>"); 
                        $row4=pg_fetch_row($rs3);
                        pg_query("COMMIT") or die("Transaction commit failed\n");
                        $rowcount4= pg_num_rows($rs3);
                        //if ($name=="funky"){print $name .$row3[1] ."==!=<br>";}
                        //if (strval($row3[1])==""){$level=0;} else {$level=$row3[1];
                        if ($rowcount4>0 and $s2=="w")
                        {
                            $w_tprice=$row4[0];
                            $rge1=$ask1-$w_tprice;
                            $w_level=$row4[1];
                            //print $name .$ask1 .$tprice ."==!=<br>";

                        }
                        
                        $tot_inv=$bal-$reserve-$r_closs;


                        //print $name .$ask .$tprice ."==!=<br>";
                        $data=array_merge($data,array($name,$pl,$rpl,$bal,$per,$qty,$level,$mkt_cond,$m2k,$rge,$avgcost,$contracts,$ramt1,$urper,$sprice,$seccont,$ym,$r_totqty,$secbuy,$seccont1,$ym1,$i1,$selll3,$s2,$smscode,$rge1,$pivotqty,$tot_inv,$hedgecap*-1,$updn,$r_closs));
                    }
                    $row=pg_fetch_row($rs);
                    $k++;
 

                }
                //print $qty ."==!=<br>";
               
                
    ?>
                <table  class="data" bgcolor="lightgrey" width="20px" height="10px">
                 
                 <tr>
                            <th>name</th>
                            <th>Profit</th>
                            <th>Investories</th>
                            <th>Balance</th>
                            <th>%</th>
                            <th>Qty</th>
                            <th>Level</th>
                            <th>Mkt</th>
                            <th>Auto</th>
                            <th>Rge</th>
                            <th>Avg</th>
                            <th>Ct</th>
                            <th>Resve</th>
                            <th>%</th>
                            <th>SP</th>
                            <th>WveQty</th>
                            <th>AvgPts</th>
                            <th>Rqty</th>
                            <th>Try#</th>
                            <th>HedgeQty</th>
                            <th>Cost</th>
                            <th>Buy</th>
                            <th>Sell</th>
                            <th>Wve</th>
                            <th>Mkt</th>
                            <th>Rge</th>
                            <th>Qty</th>
                            <th>TotValue</th>
                            <th>Loss</th>
                            <th>C/L</th>
                            <th>C/P</th>



                           
                            
                </tr>

                <?php
                    $max_columns=31;
                    $record_id=0;
                    $line=0;
                    //$data=array(1,2,3,4);
                    //$data=array_merge($data,array(1,2,3,4));

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
                                
                                if ($columns==1 or $columns==2 or $columns==3 or $columns==12 or $columns==27 or $columns==28 or $columns==29 or $columns==30)
                                {
                                    //$usd = $fmt->formatCurrency($data[$record_id], "USD");
                                    $usd = number_format($data[$record_id],0);

                                    //print '<bgcolor="' . $row_color[$columns % 2] . '">';
                                    //print '<color="black">';
                                    //echo "<td>$s2</td>";
                                    //print $data[20];

                                    if ($line%2==0)
                                    {
                                        echo "$" .$usd; 
                                    }
                                    else
                                    {
                                        echo '<font color="green">' ."$" .$usd; ; 
                                    }
                                    
                                    
                                }
                                else 
                                {
                                        if ($line%2==0)
                                        {
                                            echo  $data[$record_id]; 
                                        }
                                        else
                                        {
                                            echo  '<font color="green">' .$data[$record_id]; 
                                        }
                                }
                                ?>

                                </td>
                             <?php
                        
                             if ($columns==$max_columns)
                             {
                                    echo  "<tr>";
                                    
                             }
                             $record_id++;
                             ?>

        <?php
               
                        
                            }
                            $line++;
                            
                     }
                     //print '</table>';
                     

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
