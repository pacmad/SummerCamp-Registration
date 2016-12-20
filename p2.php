

<?php
/* Gandikota Ramesh, Sujan    Account :  jadrn018
                CS545, Fall 2015    project #3  */

// function validate_data($params) {
//     $msg = "";
//     if(strlen($params[0]) == 0)
//         $msg .= "Please enter First name<br />";  
//     if(strlen($params[2]) == 0)
//         $msg .= "Please enter the Last name<br />"; 
//     if(strlen($params[3]) == 0)
//         $msg .= "Please enter relationship<br />";
//     if(strlen($params[4]) == 0)
//         $msg .= "Please enter the address<br />";
//     if(strlen($params[6]) == 0)
//         $msg .= "Please enter city<br />";
//     if(strlen($params[7]) == 0)
//         $msg .= "Please enter the state<br />";
//     if(strlen($params[8]) == 0)
//         $msg .= "Please enter the zip code<br />";
//     elseif(!is_numeric($params[8])) 
//         $msg .= "Zip code may contain only numeric digits<br />";
//     if(strlen($params[12) == 0)
//         $msg .= "Please enter area code<br />";
//     elseif(!is_numeric($params[12])) 
//         $msg .= "phone number may contain only numeric digits<br />";
//     if(strlen($params[13) == 0)
//         $msg .= "Please enter prefix number<br />";
//     elseif(!is_numeric($params[13])) 
//         $msg .= "phone number may contain only numeric digits<br />";
//     if(strlen($params[14) == 0)
//         $msg .= "Please enter phone number<br />";
//     elseif(!is_numeric($params[14])) 
//         $msg .= "phone number may contain only numeric digits<br />";
//     if(strlen($params[15]) == 0)
//         $msg .= "Please enter email<br />";
//     elseif(!filter_var($params[15], FILTER_VALIDATE_EMAIL))
//         $msg .= "Your email appears to be invalid<br/>";
//     if(strlen($params[16]) == 0)
//         $msg .= "Please enter child first name<br />";
//     if(strlen($params[18]) == 0)
//         $msg .= "Please enter child last name<br />"; 
//     if(strlen($params[20]) == 0)
//         $msg .= "Please upload picture<br />";
//     if(strlen($params[21]) == 0)
//         $msg .= "Please enter the gender<br />";
//     if(strlen($params[22]) == 0)
//         $msg .= "Please enter month<br />";
//     if(strlen($params[23]) == 0)
//         $msg .= "Please enter date<br />";
//     if(strlen($params[24]) == 0)
//         $msg .= "Please enter year<br />";
//     if(strlen($params[27]) == 0)
//         $msg .= "Please enter Emergency contact name<br />";                        
//     if(strlen($params[28]) == 0)
//         $msg .= "Please enter emergency area code<br />";
//     elseif(!is_numeric($params[28])) 
//         $msg .= "Phone number may contain only digits<br />"; 
//     if(strlen($params[29]) == 0)
//         $msg .= "Please enter emergency prefix<br />";
//     elseif(!is_numeric($params[29])) 
//         $msg .= "Phone number may contain only digits<br />"; 
//     if(strlen($params[30]) == 0)
//         $msg .= "Please enter emergency phone<br />";
//     elseif(!is_numeric($params[30])) 
//         $msg .= "Phone number may contain only digits<br />"; 
//     if(strlen($params[31]) == 0)
//         $msg .= "Please select atleat one program<br />";      
//     if($msg) {
//         write_form_error_page($msg);
//         exit;
//         }
//     }

function photo_upload(){
    $UPLOAD_DIR = 'image_pic/';
    $fname = $_FILES['profile_pic']['name'];
    

    if(file_exists("$UPLOAD_DIR".$fname))  {
        echo "<b>Error, the file $fname already exists on the server</b><br />\n";
        return false;
        }
    elseif($_FILES['profile_pic']['error'] > 0) {
        $err = $_FILES['profile_pic']['error'];    
        echo "Error Code: $err ";
        return false;
    if($err == 1)
        echo "The file was too big to upload, the limit is 2MB<br />";
    return false;
        } 
    elseif(exif_imagetype($_FILES['profile_pic']['tmp_name']) != IMAGETYPE_JPEG) {
        echo "ERROR, not a jpg file<br />"; 
        return false;  
        }
## file is valid, copy from /tmp to your directory.        
    else { 
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], "$UPLOAD_DIR".$fname);
         } 
         return true;
}
  
function write_form_error_page($msg) {
    //write_header();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
   // write_form();
   // write_footer();
    }  
function write_form() {
    print <<<ENDBLOCK
	<fieldset>
	<legend>Personal Information</legend>
        <form  
        name="customer"
        method="post" 
        action="process_request.php">
            <label for="name">Name:</label>
            <label for="address">Address:</label>
            <label for="city">City:</label>
            <label for="state">State:</label>
            <label for="zip">Zipcode:</label>                                                
            <label for="email">Email:</label> 

            <input type="text" name="name" value="$_POST[name]" size="30" id="name" /><br />
            <input type="text" name="address" value="$_POST[address]"  size="50" id="address" /><br />
            <input type="text" name="city" value="$_POST[city]"  size="20" id="city"/><br />
            <input type="text" name="state" value="$_POST[state]"  size="5" id="state"/><br />
            <input type="text" name="zip" value="$_POST[zip]"  size="10" id="zip"/><br />
            <input type="text" name="email" value="$_POST[email]"  size="20" id="email"/><br />            
            <div class="buttons">
            <input type="reset" />
            <input type="submit" value="Submit" />
            </div>        
        </form>   
	</fieldset> 
ENDBLOCK;
}                        

function process_parameters() {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['fname']));          //0
    $params[] = trim(str_replace($bad_chars, "",$_POST['mname']));          //1 
    $params[] = trim(str_replace($bad_chars, "",$_POST['lname']));          //2
    $params[] = trim(str_replace($bad_chars, "",$_POST['relationship']));   //3
    $params[] = trim(str_replace($bad_chars, "",$_POST['address']));        //4
    $params[] = trim(str_replace($bad_chars, "",$_POST['address_line']));   //5
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));           //6
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));          //7
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));            //8
    $params[] = trim(str_replace($bad_chars, "",$_POST['home_area_phone']));    //9     
    $params[] = trim(str_replace($bad_chars, "",$_POST['home_prefix_phone']));  //10
    $params[] = trim(str_replace($bad_chars, "",$_POST['home_phone']));         //11
    $params[] = trim(str_replace($bad_chars, "",$_POST['area_phone']));         //12
    $params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone']));       //13
    $params[] = trim(str_replace($bad_chars, "",$_POST['phone']));              //14
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));                  //15
    $params[] = trim(str_replace($bad_chars, "",$_POST['cfname']));             //16
    $params[] = trim(str_replace($bad_chars, "",$_POST['cmname']));                 //17
    $params[] = trim(str_replace($bad_chars, "",$_POST['clname']));                 //18
    $params[] = trim(str_replace($bad_chars, "",$_POST['pname']));                  //19
    //$params[] = trim(str_replace($bad_chars, "",$_POST['profile_pic']));            
    $params[] = trim(str_replace($bad_chars, "",$_FILES['profile_pic']['name']));   //20
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));                 //21    
    $params[] = trim(str_replace($bad_chars, "",$_POST['month']));                  //22
    $params[] = trim(str_replace($bad_chars, "",$_POST['date']));                   //23
    $params[] = trim(str_replace($bad_chars, "",$_POST['year']));                   //24
    $params[] = trim(str_replace($bad_chars, "",$_POST['medical']));                    //25
    $params[] = trim(str_replace($bad_chars, "",$_POST['dietary']));                        //26    
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency_contact']));              //27
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency_area_phone']));               //28
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency_prefix_phone']));             //29
    $params[] = trim(str_replace($bad_chars, "",$_POST['emergency_phone']));                    //30
    $params[] = trim(str_replace($bad_chars, "",$_POST['program']));                    //31

    return $params;
    }
    
function store_data_in_db($params) {
    $db = get_db_handle();
        
    ### NOT A DUP
    $phone_number_home = "$params[9]"."$params[10]"."$params[11]";
    $phone_number = "$params[12]"."$params[13]"."$params[14]";

    $parent_id = 0;
    $sql = "SELECT id from parent where primary_phone='$phone_number';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $parent_id = $row[0];
        }
    else{
        $sql = "insert into parent(first_name,middle_name,last_name,address1,address2,city,state,zip,primary_phone,secondary_phone,email) values ('$params[0]','$params[1]','$params[2]','$params[4]','$params[5]','$params[6]','$params[7]','$params[8]','$phone_number','$phone_number_home','$params[15]');";
        mysqli_query($db,$sql);
        $how_many = mysqli_affected_rows($db);
        if($how_many != 1) {
            echo "A critical error occurred.";
            return false;
        }
        else 
        $parent_id = mysqli_insert_id($db);
    }

    $child_id = 0;
    $cname=$_POST['cfname'];
    $date_of_birth = "$params[22]"."/"."$params[23]"."/"."$params[24]";
    $emergency_phone_number = "$params[28]"."$params[29]"."$params[30]";
    $sql = "SELECT id from child where parent_id=$parent_id and first_name='$cname';";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) >0) {
        $row = mysqli_fetch_array($result);
        $child_id = $row[0];
        }

    else{
        $sql_child = "insert into child(parent_id,relation,first_name,middle_name,last_name,nickname,image_filename,gender,birthdate,conditions,diet,emergency_name,emergency_phone) ".   
           "values ('$parent_id','$params[3]','$params[16]','$params[17]','$params[18]','$params[19]','$params[20]','$params[21]',STR_TO_DATE('$date_of_birth', '%m/%d/%Y'),'$params[25]','$params[26]','$params[27]','$emergency_phone_number');";
        mysqli_query($db,$sql_child);
        $how_many = mysqli_affected_rows($db);
        if($how_many != 1) {
            echo "A critical error occurred.";
            return false;
        }
        else {
            $temp = photo_upload();
            if($temp == true){
                $child_id = mysqli_insert_id($db);   
            }
            else
                return false;
            }
        }

    $enrollment = 0;
    $program=$_POST['program'];
    for($i = 0; $i < count($program); $i++) {
       $camp_selected = intval($program[$i]);
       $sql_enrollment = "insert into enrollment values ('$camp_selected','$child_id');";
       mysqli_query($db,$sql_enrollment);
       $how_many = mysqli_affected_rows($db);
       if($how_many != 1) {
            echo "A critical error occurred in enrollment.";
            return false;
        }
    }
    mysqli_close($db);
return true;
}

   
?>   