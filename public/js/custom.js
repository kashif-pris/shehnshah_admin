function validateForm() {
    let business_title = document.forms["myForm"]["business_title"].value;
    if (business_title == "") {
        showDangerToast('Error','Business title must be filled out');
        return false;
    }
    let service_provissioning = document.forms["myForm"]["service_provissioning[]"].value;
    if (service_provissioning == "") {
        showDangerToast('Error','Service provissioning must be filled out');
        return false;
    }
    let service_id = document.forms["myForm"]["service_id"].value;
    if (service_id == "") {        
        showDangerToast('Error','Default Service must be filled out');
        return false;
    }
    let street = document.forms["myForm"]["street"].value;
    if (street == "") {
        showDangerToast('Error','Street   must be filled out');
        return false;
    }
    let area = document.forms["myForm"]["area"].value;
    if (area == "") {
        showDangerToast('Error','Area must be filled out');
        return false;
    }
    let city = document.forms["myForm"]["city"].value;
    if (city == "") {

        showDangerToast('Error','City  must be filled out');
        return false;
    }
    let country = document.forms["myForm"]["country"].value;
    if (country == "") {
     
        showDangerToast('Error','Country must be filled out');
        return false;
    }
    let lat = document.forms["myForm"]["lat"].value;
    if (lat == "") {
        showDangerToast('Error','Latitue must be filled out');
        return false;
    }
    let lng = document.forms["myForm"]["lng"].value;
    if (lng == "") {         
        showDangerToast('Error','Longitude must be filled out');
        return false;
    }
    let about = document.forms["myForm"]["about"].value;
    if (about == "") {          
            showDangerToast('Error','About must be filled out');
        return false;
    }
    // let start_time = document.forms["myForm"]["start_time[]"].value;
    // if (start_time == "") {             
    //       showDangerToast('Error','Business start time must be filled out');
    //     return false;
    // }
    // let end_time = document.forms["myForm"]["end_time[]"].value;
    // if (end_time == "") {             
    //       showDangerToast('Error','Business end time must be filled out');
    //     return false;
    // } 
    
    // let break_start_time = document.forms["myForm"]["break_start_time[]"].value;
    // if (break_start_time == "") {
     
    //       showDangerToast('Error','Business break start time must be filled out');
    //     return false;
    // } 
    // let break_end_time = document.forms["myForm"]["break_end_time[]"].value;
    // if (break_end_time == "") {
     
    //       showDangerToast('Error','Business break ebd time must be filled out');
    //     return false;
    // } 
}