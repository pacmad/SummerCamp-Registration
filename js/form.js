/*Gandikota ramesh, Sujan    Account :  jadrn018 
            CS545, Fall 2015
            Project #3 */


    function isEmpty(fieldValue) {
        return $.trim(fieldValue).length == 0;    
        } 
        
    function isValidState(state) {                                
        var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY");
        for(var i=0; i < stateList.length; i++) 
            if(stateList[i] == $.trim(state))
                return true;
        return false;
        }  


    function isValidEmail(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
        }                
            
 
      
    function isValidDate() {
        var day = $("#date").val();
        var month = $("#month").val();
        var year = $("#year").val();
    
        var Date_test = new Date(year, month-1, day);    
        var Day_test = Date_test.getDate();
        var Month_test = Date_test.getMonth()+1;
        var Year_test = Date_test.getFullYear();
    
        if(day == Day_test && month == Month_test && year == Year_test)
            return true;
        else
            return false;
    }

$(document).ready( function() {
    var errorStatusHandle = $('#message_line');
    var elementHandle = new Array(20);
    elementHandle[0] = $('[name="fname"]');
    elementHandle[1] = $('[name="lname"]');
    elementHandle[3] = $('[name="address"]');
    elementHandle[4] = $('[name="city"]');
    elementHandle[5] = $('[name="state"]');
    elementHandle[6] = $('[name="zip"]');
    elementHandle[7] = $('[name="area_phone"]');
    elementHandle[8] = $('[name="prefix_phone"]');
    elementHandle[9] = $('[name="phone"]');
    elementHandle[10] = $('[name="email"]');
    elementHandle[11] = $('[name="cfname"]');
    elementHandle[12] = $('[name="clname"]');
    elementHandle[13] = $('[name="profile_pic"]');
    elementHandle[15] = $('[name="month"]');
    elementHandle[16] = $('[name="date"]');
    elementHandle[17] = $('[name="year"]');
    elementHandle[18] = $('[name="emergency_contact"]');
    elementHandle[19] = $('[name="emergency_area_phone"]');
    elementHandle[20] = $('[name="emergency_prefix_phone"]');
    elementHandle[21] = $('[name="emergency_phone"]');

         
    function isValidData() {
        if(isEmpty(elementHandle[0].val())) {
            elementHandle[0].addClass("error");
            errorStatusHandle.text("Please enter your first name");
            elementHandle[0].focus();
            return false;
            }
        if(isEmpty(elementHandle[1].val())) {
            elementHandle[1].addClass("error");
            errorStatusHandle.text("Please enter your last name");
            elementHandle[1].focus();            
            return false;
            }
        if(isEmpty(elementHandle[2].val())) {
            elementHandle[2].addClass("error");
            errorStatusHandle.text("Please enter your relationship to the child");
            elementHandle[2].focus();            
            return false;
            }
        if(isEmpty(elementHandle[3].val())) {
            elementHandle[3].addClass("error");
            errorStatusHandle.text("Please enter your address");
            elementHandle[3].focus();            
            return false;
            }
        if(isEmpty(elementHandle[4].val())) {
            elementHandle[4].addClass("error");
            errorStatusHandle.text("Please enter your city");
            elementHandle[4].focus();            
            return false;
            }
        if(isEmpty(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("Please enter your state");
            elementHandle[5].focus();            
            return false;
            }
        if(!isValidState(elementHandle[5].val())) {
            elementHandle[5].addClass("error");
            errorStatusHandle.text("The state appears to be invalid, "+
            "please use the two letter state abbreviation");
            elementHandle[5].focus();            
            return false;
            }
        if(isEmpty(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("Please enter your zip code");
            elementHandle[6].focus();            
            return false;
            }
        if(!$.isNumeric(elementHandle[6].val())) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The zip code appears to be invalid, "+
            "numbers only please. ");
            elementHandle[6].focus();            
            return false;
            }
        if(elementHandle[6].val().length != 5) {
            elementHandle[6].addClass("error");
            errorStatusHandle.text("The zip code must have exactly five digits")
            elementHandle[6].focus();            
            return false;
            }
        if(isEmpty(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("Please enter your area code");
            elementHandle[7].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[7].val())) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The area code appears to be invalid, "+
            "numbers only please. ");
            elementHandle[7].focus();            
            return false;
            }
        if(elementHandle[7].val().length != 3) {
            elementHandle[7].addClass("error");
            errorStatusHandle.text("The area code must have exactly three digits")
            elementHandle[7].focus();            
            return false;
            }   
        if(isEmpty(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("Please enter your phone number prefix");
            elementHandle[8].focus();            
            return false;
            }           
        if(!$.isNumeric(elementHandle[8].val())) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number prefix appears to be invalid, "+
            "numbers only please. ");
            elementHandle[8].focus();            
            return false;
            }
        if(elementHandle[8].val().length != 3) {
            elementHandle[8].addClass("error");
            errorStatusHandle.text("The phone number prefix must have exactly three digits")
            elementHandle[8].focus();            
            return false;
            }
        if(isEmpty(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("Please enter your phone number");
            elementHandle[9].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[9].val())) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("The phone number appears to be invalid, "+
            "numbers only please. ");
            elementHandle[9].focus();            
            return false;
            }
        if(elementHandle[9].val().length != 4) {
            elementHandle[9].addClass("error");
            errorStatusHandle.text("The phone number must have exactly four digits")
            elementHandle[9].focus();            
            return false;
            }  
        if(isEmpty(elementHandle[10].val())) {
            elementHandle[10].addClass("error");
            errorStatusHandle.text("Please enter your email address");
            elementHandle[10].focus();            
            return false;
            }            
        if(!isValidEmail(elementHandle[10].val())) {
            elementHandle[10].addClass("error");
            errorStatusHandle.text("The email address appears to be invalid,");
            elementHandle[10].focus();            
            return false;
            }   
        if(isEmpty(elementHandle[11].val())) {
            elementHandle[11].addClass("error");
            errorStatusHandle.text("Please enter child's first name");
            elementHandle[11].focus();
            return false;
            }
        if(isEmpty(elementHandle[12].val())) {
            elementHandle[12].addClass("error");
            errorStatusHandle.text("Please enter child's last name");
            elementHandle[12].focus();            
            return false;   
            }     
        if(isEmpty(elementHandle[13].val())) {
            elementHandle[13].addClass("error");
            errorStatusHandle.text("Please upload picture of the child");
            elementHandle[13].focus();            
            return false;   
            }    
        if(isEmpty(elementHandle[14].val())) {
            elementHandle[14].addClass("error");
            errorStatusHandle.text("Please enter Gender of the child");
            elementHandle[14].focus();            
            return false;
            }
        if(isEmpty(elementHandle[15].val())) {
            elementHandle[15].addClass("error");
            errorStatusHandle.text("Please enter Month");
            elementHandle[15].focus();            
            return false;
            }  
        if(!$.isNumeric(elementHandle[15].val())) {
            elementHandle[15].addClass("error");
            errorStatusHandle.text("Please Enter number for month");
            elementHandle[15].focus();            
            return false;
            }
        if(isEmpty(elementHandle[16].val())) {
            elementHandle[16].addClass("error");
            errorStatusHandle.text("Please enter Day");
            elementHandle[16].focus();            
            return false;
            } 
        if(!$.isNumeric(elementHandle[16].val())) {
            elementHandle[16].addClass("error");
            errorStatusHandle.text("Please Enter number for Day");
            elementHandle[16].focus();            
            return false;
            }
        if(isEmpty(elementHandle[17].val())) {
            elementHandle[17].addClass("error");
            errorStatusHandle.text("Please enter Year");
            elementHandle[17].focus();            
            return false;
            } 
        if(!$.isNumeric(elementHandle[17].val())) {
            elementHandle[17].addClass("error");
            errorStatusHandle.text("Please Enter number for year");
            elementHandle[17].focus();            
            return false;
            }
        var isValidDOB = true;
        if(!isValidDate()){
            $('[name="month"]').addClass("error");
            $('[name="date"]').addClass("error");
            $('[name="year"]').addClass("error");
            errorStatusHandle.text("Please Insert a valid date");
            return false;
            isValidDOB = false;
        }
        if(isValidDOB){
            var date_of_birth = new Date();
            date_of_birth.setMonth($('[name="month"]').val());
            date_of_birth.setDate($('[name="date"]').val());
            date_of_birth.setFullYear($('[name="year"]').val());
        
            var Compare_date = new Date("June 1, 2016");
            var years = Compare_date.getFullYear() - date_of_birth.getFullYear();
            var months = Compare_date.getMonth() - date_of_birth.getMonth();
            var days = Compare_date.getDate() - date_of_birth.getDate();
        
        if(years > 16 || (years == 16 && months > 0) || (years == 16 && months == 0 && days > 0)) {
                $('[name="month"]').addClass("error");
                $('[name="date"]').addClass("error");
                $('[name="year"]').addClass("error");
                errorStatusHandle.text("Child age should be less than 16yr");
                return false;
            }
        if(years < 7 || (years == 7 && months < 0) || (years==7 && months == 0 && days < 0)) {
                $('[name="month"]').addClass("error");
                $('[name="date"]').addClass("error");
                $('[name="year"]').addClass("error");
                errorStatusHandle.text("Child must be atleast 7 years old");
                return false;
            }
        } 
        if(isEmpty(elementHandle[18].val())) {
            elementHandle[18].addClass("error");
            errorStatusHandle.text("Please enter your Emergency contact name");
            elementHandle[18].focus();
            return false;
            }    
        if(isEmpty(elementHandle[19].val())) {
            elementHandle[19].addClass("error");
            errorStatusHandle.text("Please enter your area code");
            elementHandle[19].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[19].val())) {
            elementHandle[19].addClass("error");
            errorStatusHandle.text("The area code appears to be invalid, "+
            "numbers only please. ");
            elementHandle[19].focus();            
            return false;
            }
        if(elementHandle[19].val().length != 3) {
            elementHandle[19].addClass("error");
            errorStatusHandle.text("The area code must have exactly three digits")
            elementHandle[19].focus();            
            return false;
            }   
        if(isEmpty(elementHandle[20].val())) {
            elementHandle[20].addClass("error");
            errorStatusHandle.text("Please enter your phone number prefix");
            elementHandle[20].focus();            
            return false;
            }           
        if(!$.isNumeric(elementHandle[20].val())) {
            elementHandle[20].addClass("error");
            errorStatusHandle.text("The phone number prefix appears to be invalid, "+
            "numbers only please. ");
            elementHandle[20].focus();            
            return false;
            }
        if(elementHandle[20].val().length != 3) {
            elementHandle[20].addClass("error");
            errorStatusHandle.text("The phone number prefix must have exactly three digits")
            elementHandle[20].focus();            
            return false;
            }
        if(isEmpty(elementHandle[21].val())) {
            elementHandle[21].addClass("error");
            errorStatusHandle.text("Please enter your phone number");
            elementHandle[21].focus();            
            return false;
            }            
        if(!$.isNumeric(elementHandle[21].val())) {
            elementHandle[21].addClass("error");
            errorStatusHandle.text("The phone number appears to be invalid, "+
            "numbers only please. ");
            elementHandle[21].focus();            
            return false;
            }
        if(elementHandle[21].val().length != 4) {
            elementHandle[21].addClass("error");
            errorStatusHandle.text("The phone number must have exactly four digits")
            elementHandle[21].focus();            
            return false; 
            }     
        if($("input[type='checkbox']:checked").length < 1){
            errorStatusHandle.text("Please select Atleast one Camp");
            return false;
        }    
        return true;
        }       

   elementHandle[0].focus();
   
   

    elementHandle[0].on('blur', function() {
        if(isEmpty(elementHandle[0].val()))
            return;
        $(this).removeClass("error");
        errorStatusHandle.text("");
        });
        
    elementHandle[10].on('blur', function() {
        if(isEmpty(elementHandle[10].val()))
            return;
        if(isValidEmail(elementHandle[10].val())) {
            $(this).removeClass("error");
            errorStatusHandle.text("");
            }
        });        
/////////////////////////////////////////////////////////////////        

    elementHandle[5].on('keyup', function() {
        elementHandle[5].val(elementHandle[5].val().toUpperCase());
        });
        
    elementHandle[7].on('keyup', function() {
        if(elementHandle[7].val().length == 3)
            elementHandle[8].focus();
            });
            
    elementHandle[8].on('keyup', function() {
        if(elementHandle[8].val().length == 3)
            elementHandle[9].focus();
            });      

    elementHandle[19].on('keyup', function() {
        if(elementHandle[19].val().length == 3)
            elementHandle[20].focus();
            });
            
    elementHandle[20].on('keyup', function() {
        if(elementHandle[20].val().length == 3)
            elementHandle[21].focus();
            });       

   
function handleData(response){
  //  $('#busy_wait').css('visibility','hidden');
    
    
    if(response.startsWith("DUP")) 
        $('#status').text("This record appears to be a duplicate.");
        
    else if(response.startsWith("OK")) {
        $('#status').text("This record is OK, not a duplicate."); 
       $('#signup').serialize();
       $('#signup').submit();
//         var confirm = response.split("||");
//         $('body').html(confirm[1]);                
        }

    }        



    $('#send_data').on('click', function() {
        elementHandle[2] = $('[name="relationship"]:checked');
        elementHandle[14] = $('[name="gender"]:checked');

        for(var i=0; i < 22; i++)
            elementHandle[i].removeClass("error");
            errorStatusHandle.text("");
            var flag = isValidData();
            if(flag){
               // $('#signup').submit();
               var data = $('#signup').serialize();
               $.post("duplicate_check.php",data,handleData);
            }
            else false;
        });
        
    $(':reset').on('click', function() {
        for(var i=0; i < 22; i++)
            elementHandle[i].removeClass("error");
            errorStatusHandle.text("");
        });                                       
});