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
    <h2>Report</h2>
    <?php
    /* Gandikota Ramesh, Sujan    Account :  jadrn018
                CS545, Fall 2015    project #3  */
    include('helpers.php');
    $db = get_db_handle();

    $sql = "select c.last_name,c.first_name,c.nickname,c.image_filename,floor((DATEDIFF(CURDATE(),c.birthdate))/365) AS age,p.last_name,p.first_name,p.primary_phone,c.emergency_name,c.emergency_phone,pr.description from child c,parent p,enrollment e,program pr where e.child_id=c.id and c.parent_id=p.id and pr.id=e.program_id group by e.program_id,e.child_id;";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        // $row = mysqli_fetch_array($result);
    }
    ?>
    <table>
    	<tr>
    		<th>Child Last name</th>
    		<th>Child name</th>
    		<th>Child's Nickname</th>
    		<th>Child's Picture</th>
  			<th>Child's Age</th>
   			<th>Parent Last name</th>
    		<th>Parent name</th>
    		<th>Primary Phone</th>
    		<th>Emergency name</th>
   			<th>Emergency contact information</th>
   			<th>Description</th>
    	</tr>
    	<?php
    		while($row = mysqli_fetch_array($result)) {
    	?>
    		<tr>
    			<td><?=$row[0]; ?></td>
    			<td><?=$row[1]; ?></td>
    			<td><?=$row[2]; ?></td>
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
        				else if($fname== $row[3]){
           					echo "<img src=\"$UPLOAD_DIR/$fname\""." width='100px' />\n";
        				}
    				}
    				?>		
    			</td>
    			<td><?=$row[4]; ?></td>
    			<td><?=$row[5]; ?></td>
    			<td><?=$row[6]; ?></td>
    			<td><?=$row[7]; ?></td>
    			<td><?=$row[8]; ?></td>
    			<td><?=$row[9]; ?></td>
    			<td><?=$row[10]; ?></td>
    		</tr>
    		<?php
    	}
    		?>


    	</table>
    </body>
 </html>

