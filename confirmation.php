<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title>Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/table.css" /> 
    </head>
    <body>
        <?php
        /* Gandikota Ramesh, Sujan    Account :  jadrn018
                CS545, Fall 2015    project #3  */
        $program=$_POST['program'];
        $camp = "";
        for($i = 0; $i < count($program); $i++) {
        if ($program[$i]=="1"){
            $camp.="BasketBall Camp".",";
        }elseif($program[$i]=="2"){
            $camp.="Baseball Camp".",";
        }elseif($program[$i]=="3"){
            $camp.="Physical Education".",";
        }elseif($program[$i]=="4"){
            $camp.="Band camp".",";
        }elseif($program[$i]=="5"){
            $camp.="Swimming".",";
        }elseif($program[$i]=="6"){
            $camp.="Nature Discovery".",";
        }
    }
        $camp = substr($camp,0,strlen($camp)-1);
        ?>
    
<h1>Hello <?=$params[0]?>, thank you for registering your child!.</h1>

    <table border="1px solid black" >
    
    <tr><td>Last Name</td>
        <td><?=$params[2] ?></td>
    </tr>

    <tr><td>Middle name</td>
        <td><?=$params[1]?></td>
    </tr>

    <tr>
        <td>Relationship</td>
        <td><?=$params[3] ?></td>
    </tr>

    <tr>                 
        <td>Address Line 1</td>
        <td><?=$params[4] ?></td>
    </tr>

    <tr>                 
        <td>Address Line2</td>
        <td><?=$params[5] ?></td>
    </tr>

    <tr>                 
        <td>City</td>
        <td><?=$params[6] ?></td>
    </tr>

    <tr>                 
        <td>State</td>
        <td><?=$params[7] ?></td>
    </tr>

    <tr>                 
        <td>Zip Code</td>
        <td><?=$params[8] ?></td>
    </tr>

    <tr>                 
        <td>Home Phone</td>
        <td><?=$params[9].$params[10].$params[11] ?></td>
    </tr>

    <tr>                 
        <td>Cell Phone</td>
        <td><?=$params[12].$params[13].$params[14] ?></td>
    </tr>

    <tr>                 
        <td>Email</td>
        <td><?=$params[15] ?></td>
    </tr>

    <tr>                 
    <td>Child Name</td>
    <td><?=$params[16]." ".$params[17]." ".$params[18]?> </td>
    </tr>

    <tr>                 
        <td>Child Nickname</td>
        <td><?=$params[19] ?></td>
    </tr>

    <tr>                 
        <td>Child's Picture</td>
        <td><?php
            $UPLOAD_DIR = 'image_pic';
            $COMPUTER_DIR = '/home/jadrn018/public_html/proj3/image_pic/';    
            $d = dir($COMPUTER_DIR.'/');
            while($fname = $d->read()) {
                $data[$fname] = $fname;
            }
            foreach($data as $fname => $fvalue) {
                if($fname == "." || $fname == "..") {
                    ;
                }
            else if($fname== $params[20]){
                echo "<img src=\"$UPLOAD_DIR/$fname\""." width='100px' />\n";
                }
            }    
            ?>
        </td>
    </tr>

    <tr>                 
        <td>Gender</td>
        <td><?=$params[21] ?></td>
    </tr>

    <tr>                 
        <td>Date of Birth</td>
        <td><?=$params[22]."/".$params[23]."/".$params[24] ?></td>
    </tr>

    <tr>                 
        <td>Medical Conditions</td>
        <td><?=$params[25] ?></td>
    </tr>

    <tr>                 
        <td>Dietary requirements</td>
        <td><?=$params[26] ?></td>
    </tr>

    <tr>                 
        <td>Emergency Contact Name</td>
        <td><?=$params[27]?></td>
    </tr>

    <tr>                 
        <td>Emergency Contact Number</td>
        <td><?=$params[28].$params[29].$params[30] ?></td>
    </tr>

    <tr><td>Programs Selected</td>
        <td><?=$camp ?></td>
    </tr> 
    </table>   




    </body>
</html>