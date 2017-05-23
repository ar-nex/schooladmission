


/*
 * Uppercase/Camelcase the letter on inputed Name and checking for any number
 * @param: 
 * @return: string of camelcase name
 */
$(".pers-name").focusout(function(){
    var txt_name = $(this).val();
   // txt_name = txt_name.toUpperCase();
    // follwoing commented code for making First letter capital.
//    txt_name = txt_name.toLowerCase().replace(/\b[a-z]/g, function(letter){
//        return letter.toUpperCase();
//    });
    $(this).val(txt_name);
    
    var wrongchar = /[0-9!@#$%^&*()+=|{}\\\[\]]/g;
    var res = $(this).val().match(wrongchar);
    if(res !== null){
        $(this).after("<p class='in-error'>Digit or illegal charecter not allowed.</p>");
    }
});

/*
 * removing error p element
 * @param: 
 * @return:
 */

$(".pers-name").focusin(function(){
    $(this).next("p").remove();
});








/*
 * Same gurdian name and present address
 */
$("#chk-grdn").change(function(){
     $("input[name='sts_gname']").next("p").remove();
	if($(this).is(':checked')){
		var gname = $("input[name='sts_fname']").val();
		$("input[name='sts_gname']").val(gname);
	}else{
		$("input[name='sts_gname']").val("");
	}
	
});

$("#chk-prm").change(function(){
    removePAEMsg();
	if($(this).is(':checked')){
		$("input[name='prm_add1_a']").val($("input[name='sts_add1_a']").val());
		$("input[name='prm_add1']").val($("input[name='sts_add1']").val());
		$("input[name='prm_add2']").val($("input[name='sts_add2']").val());
		$("input[name='prm_ps']").val($("input[name='sts_ps']").val());
		$("input[name='prm_dist']").val($("input[name='sts_dist']").val());
		$("input[name='prm_pin']").val($("input[name='sts_pin']").val());
	}else{
		$("input[name='prm_add1_a']").val("");
		$("input[name='prm_add1']").val("");
		$("input[name='prm_add2']").val("");
		$("input[name='prm_ps']").val("");
		$("input[name='prm_dist']").val("");
		$("input[name='prm_pin']").val("");
	}
});


function removePAEMsg() {
    $("input[name='prm_add1']").next("p").remove();
    $("input[name='prm_add2']").next("p").remove();
    $("input[name='prm_ps']").next("p").remove();
    $("input[name='prm_dist']").next("p").remove();
    $("input[name='prm_pin']").next("p").remove();
}


/*
 * Uppercase to all the textbox
 */

$("input[type='text']").focusout(function(){
	var txt_elem = $(this).val();
	$(this).val(txt_elem.toUpperCase());
});

/*
 * check for six digit PIN.
 * @param: 
 * @return:
 */

$("input[name='sts_pin']").focusout(function(){
    var txt_pin = $(this).val();
    if (txt_pin.length > 0){
        var allowed_patt = /^[0-9]+$/g;
        var result = txt_pin.match(allowed_patt);
        if(result===null){
            $(this).after("<p class='in-error'>Please enter numbers only.</p>");
           
        }else if((txt_pin.length>6 && result!==null)||(txt_pin.length<6 && result!==null)){
            $(this).after("<p class='in-error'>Please enter exactly 6 digits of PIN</p>");
            
        }   
    }
});

$("input[name='prm_pin']").focusout(function(){
    var txt_pin = $(this).val();
    if (txt_pin.length > 0){
        var allowed_patt = /^[0-9]+$/g;
        var result = txt_pin.match(allowed_patt);
        if(result===null){
            $(this).after("<p class='in-error'>Please enter numbers only.</p>");
           
        }else if((txt_pin.length>6 && result!==null)||(txt_pin.length<6 && result!==null)){
            $(this).after("<p class='in-error'>Please enter exactly 6 digits of PIN</p>");
            
        }   
    }
});

$("input[name='sts_pin']").focusin(function(){
    $(this).next("p").remove();
});

$("input[name='prm_pin']").focusin(function(){
    $(this).next("p").remove();
});



/*
 * Remove error p of dob
 */
$("select[name='dd']").focusin(function(){
	$("#dob-d").remove();
});

$("select[name='mm']").focusin(function(){
	$("#dob-m").remove();
});

$("select[name='yy']").focusin(function(){
	$("#dob-y").remove();
});




/*
 * Delete the p error warning just after pin text box
 * @param: 
 * @return: string of camelcase name
 */

//$("input[name='pin']").focusin(function(){
//    $(this).next("p").remove();
//    var pinno = $(this).val();
//    var allowed_patt = /^[0-9]+$/g;
//    var result = pinno.match(allowed_patt);
//    if(result === null || pinno.length !== 6){
//           $(this).val(""); 
//    }
//});


/*
 * Validation of Mobile number
 * @param: 
 * @return: 
 */


$("input[name='sts_mobile']").focusout(function(){
    var txt_mob = $(this).val();
    if (txt_mob.length > 0){
        var allowed_patt = /^[0-9]+$/g;
        var result = txt_mob.match(allowed_patt);
        if(result===null){
            $(this).after("<p class='in-error'>Please enter a valid numbers.</p>");
           
        }else if((txt_mob.length>10 && result!==null)||(txt_mob.length<10 && result!==null)){
            $(this).after("<p class='in-error'>Please enter exactly 10 digits of mobile no.</p>");
            
        }   
    }
});


/*
 * Delete the p error warning just after mobile no box
 * @param: 
 * @return: 
 */
$("input[name='sts_mobile']").focusin(function(){
    $(this).next("p").remove();
    var mobno = $(this).val();
    var allowed_patt = /^[0-9]+$/g;
    var result = mobno.match(allowed_patt);
    if(result === null || mobno.length !== 10){
           $(this).val(""); 
    }
});


/*
 * validation of uploaded picture
 * @param: 
 * @return: 
 */

$("input[type='file']").change(function(){
    var filename = $(this).val();
    var extension = filename.replace(/^.*\./, '');
    if(extension === filename){
        extension = "";
    }else{
        extension = extension.toLowerCase();
    }
    var valid_ext = ['jpg', 'jpeg', 'png'];
    if(valid_ext.indexOf(extension) === -1){
      $(this).after("<p class='in-error'>Please select a valid image.</p>");  
    }else{
        $(this).next("p").remove();
    }
});


/*
 * validation of email id
 * @param: 
 * @return: 
 */
$("input[name='sts_email']").focusout(function(){
    var id = $(this).val();
    if(id.length>0){
        if((id.indexOf('@') === -1)||(id.indexOf('@') === id.length-1)){
           $(this).after("<p class='in-error'>Please enter a valid email id.</p>"); 
        }
    }
});

$("input[name='sts_school']").focusout(function(){
    var school = $(this).val().toUpperCase();
    if(school !== ""){
        if(school === "NAIMOUZA HIGH SCHOOL" || school === "NAI MOUZA HIGH SCHOOL" || school === "N.M.H.S." || school === "N. M. H. S." || school === "NMHS" || school === "N.M.H.S" || school === "NAIMOUZA HIGH SCHOOL " || school === "NAI MOUZA HIGH SCHOOL "){
            var rd_type = $("input[value='INTERNAL']");
            rd_type.prop("checked", true);
        }else{
            var rd_type = $("input[value='EXTERNAL']");
            rd_type.prop("checked", true);
        }
    }
});
$("input[name='sts_type']").click(function(){
    return false;
});


/*
 * Delete the p error warning just after email id box
 * @param: 
 * @return: string of camelcase name
 */

$("input[name='sts_email']").focusin(function(){
    $(this).next("p").remove();
    var eid = $(this).val();
    if(eid.length>0){
      if((eid.indexOf('@') === -1)||(eid.indexOf('@') === eid.length-1)){
          $(this).val("");
      }
    }
});





// address Lane1 & 2
$("input[name='sts_add1']").focusin(function(){
    $(this).next("p").remove();
});
$("input[name='sts_add2']").focusin(function(){
    $(this).next("p").remove();
});

// police station
$("input[name='sts_ps']").focusin(function(){
    $(this).next("p").remove();
});

// district
$("input[name='sts_dist']").focusin(function(){
    $(this).next("p").remove();
});


// for permanent address

$("input[name='prm_add1']").focusin(function(){
    $(this).next("p").remove();
});
$("input[name='prm_add2']").focusin(function(){
    $(this).next("p").remove();
});

// police station
$("input[name='prm_ps']").focusin(function(){
    $(this).next("p").remove();
});

// district
$("input[name='prm_dist']").focusin(function(){
    $(this).next("p").remove();
});


// sex
$("input[name='sts_sex']").change(function(){
    $("#rad-x").next("p").remove();
});

//ph
$("input[name='sts_ph']").change(function(){
	var ph_val = $("input[name='sts_ph']:checked").val();
	
	if(ph_val === "N"){
		$("input[name='ph_type']").val(" ");
		$("#field-ph-type").attr('disabled', true);
	}else if(ph_val === "Y"){
		$("#field-ph-type").attr('disabled', false);
	}
});

$(document).ready(function(){
	$("#field-ph-type").attr('disabled', true);
});


//date
$("input[type='date']").change(function(){
    $(this).next("p").remove();
});

$("select").change(function(){
    $(this).next("p").remove();
});


// category
$("input[name='category']").change(function(){
    $("#rad-cat").next("p").remove();
});

$("input[type='checkbox']").change(function(){
    $("#declr").next("p").remove();
});

// school
$("input[name='sts_school']").focusin(function(){
    $(this).next("p").remove();
});

//board
$("input[name='sts_board']").focusin(function(){
    $(this).next("p").remove();
});


// passing year

$("input[name='sts_psyear']").focusin(function(){
    $(this).next("p").remove();
});


// count total mark
$("input[name='tot_obt']").focusin(function(){
	
	$(this).next("P").remove();
	var marks = $(".sb-mark");
	var mark_obt = 0;
	marks.each(function(i){
		var mrk = Number($(this).val());
		mark_obt = mark_obt + mrk;
	});
	$(this).val(mark_obt);
});

// count percentage
$("input[name='prcnt']").focusin(function(){
	
	$(this).next("P").remove();
	var mark_obtained = Number($("input[name='tot_obt']").val());
	var tot_mark = Number($("input[name='tot']").val());
	var prc = mark_obtained/tot_mark * 100;
	$(this).val(prc.toFixed(2));
});

$(".sb-mark").focusin(function(){
	$(this).next("P").remove();
});

// total mark
$("input[name='tot']").focusin(function(){
    $(this).next("p").remove();
});


//sbject and stream
$(".sb-select").focusin(function(){
	$(this).next("P").remove();
});



// captcha
$("input[name='ascap']").focusin(function(){
    $(this).next("p").remove();
});








$("#main-form").submit(function (event) {
    var error = [];
    var errorRad = [];

   
    
    var txtb_name = $("input[name='sts_name']");
    if (hasErrorInTbox(txtb_name, "name")) {
        error.push(txtb_name);
    }
    
 
    
    var txtb_fname = $("input[name='sts_fname']");
    if (hasErrorInTbox(txtb_fname, "name")) {
        error.push(txtb_fname);
    }
    
    

    
    var txtb_mname = $("input[name='sts_mname']");
    if (hasErrorInTbox(txtb_mname, "name")) {
        error.push(txtb_mname);
    }
    
    var txtb_gname = $("input[name='sts_gname']");
    if (hasErrorInTbox(txtb_gname, "name")) {
        error.push(txtb_gname);
    }
    
    
    var txtb_add = $("input[name='sts_add1']");
    if (hasErrorInTbox(txtb_add, "address")) {
        error.push(txtb_add);
    }
    
    var txtb_add = $("input[name='sts_add2']");
    if (hasErrorInTbox(txtb_add, "address")) {
        error.push(txtb_add);
    }
    
    
    var txtb_add = $("input[name='sts_ps']");
    if (hasErrorInTbox(txtb_add, "address")) {
        error.push(txtb_add);
    }
    
    var txtb_add = $("input[name='sts_dist']");
    if (hasErrorInTbox(txtb_add, "address")) {
        error.push(txtb_add);
    }

    var txtb_pin = $("input[name='sts_pin']");
    if (hasErrorInTbox(txtb_pin, "pin")) {
        error.push(txtb_pin);
    }
    
    
    
    
    //permanent address
     var txtb_add = $("input[name='prm_add1']");
    if (hasErrorInTbox(txtb_add, "address")) {
        error.push(txtb_add);
    }
    
    var txtb_add = $("input[name='prm_add2']");
    if (hasErrorInTbox(txtb_add, "address")) {
        error.push(txtb_add);
    }
    
    
    var txtb_add = $("input[name='prm_ps']");
    if (hasErrorInTbox(txtb_add, "address")) {
        error.push(txtb_add);
    }
    
    var txtb_add = $("input[name='prm_dist']");
    if (hasErrorInTbox(txtb_add, "address")) {
        error.push(txtb_add);
    }

    var txtb_pin = $("input[name='prm_pin']");
    if (hasErrorInTbox(txtb_pin, "pin")) {
        error.push(txtb_pin);
    }
    
    
    
    var txtb_sex = $("input[name='sts_sex']:checked");
   
    if(typeof(txtb_sex.val()) === "undefined"){
        var rad_elem = $("#rad-x");
        errorRad.push(rad_elem);
       
    }
    



    var txtb_mob = $("input[name='sts_mobile']");
    if (hasErrorInTbox(txtb_mob, "mobile")) {
        error.push(txtb_mob);
    }


    var txtb_email = $("input[name='sts_email']");
    
    if(txtb_email.val().length !== 0){
    	 if (hasErrorInTbox(txtb_email, "email")) {
    	        error.push(txtb_email);
    	    }
    }
    
   
    
    
    
//    var txtb_cat = $("select[name='sts_cat']");
//    if(typeof(txtb_cat.val()) === "undefined"){
//        var rad_elam1 = $("#rad-cat");
//        errorRad.push(rad_elam1);
//    }
    
    
    
    var sel_cat = $("select[name='sts_cat']");
    if(sel_cat.val() === " "){
    	error.push(sel_cat);
    }
    
    
    var txtb_declr = $("input[type='checkbox']:checked");
    if(typeof(txtb_declr.val()) === "undefined"){
        var chk_elm = $("#declr");
        errorRad.push(chk_elm);
    }
    
    // temporary for admin
//    var txtb_cap = $("input[name='ascap']");
//    if (hasErrorInTbox(txtb_cap, "captcha")) {
//        error.push(txtb_cap);
//    }
    
   var txtb_scl = $("input[name='sts_school']");
    if(hasErrorInTbox(txtb_scl, "address")){
   	error.push(txtb_scl);
   }
   
   var txtb_board = $("input[name='sts_board']");
   if(hasErrorInTbox(txtb_board, "address")){
   	error.push(txtb_board);
   	}    
   
   var txtb_py = $("input[name='sts_psyear']");
   if(hasErrorInTbox(txtb_py, "passyear")){
	   error.push(txtb_py);
   }
   
   var marks = $(".sb-mark");
   marks.each(function(i){
	   var obt_mark = Number($(this).val());
	   if(obt_mark <= 0 || obt_mark >= 100){
		   error.push($(this));
	   }
   });
  
   
   
   var marks = $(".tb-mark");
   marks.each(function(i){
	   var m = Number($(this).val());
	   if(m <= 0){
		   error.push($(this));
	   }
   });
   
   var sbj = $(".sb-select");
   sbj.each(function(i){
	   var s = $(this).val();
	   if(s === " "){
		   error.push($(this));
	   }
   });
   
   
   
   
    
   // determine preventDefault or not
      
    if ((error.length > 0) || (errorRad.length > 0)) {
        event.preventDefault();

        if (error.length > 0) {
            do {
                addErrorMsg(error.pop());
            } while (error.length > 0);
        }

        if (errorRad.length > 0) {
            do {
                console.log(errorRad);
                addErrorRadMsg(errorRad.pop());
            } while (errorRad.length > 0);
        }


    } else if (!hasValidPercentage()) {
        event.preventDefault();
        $(".less60-msg").text("Sorry! You have less than allowed percentage in class X. You are not eligible to fill online form.");
    }    
   

});


// percentage checking




function hasValidPercentage(){
    
    /*
     * temporarily disabled.
     * 
	var tp = $("input[name='sts_type']:checked").val();
	var isValid = false;
	if(tp === "INTERNAL"){
		isValid = hasValidPerInternal();
		return isValid;
	}else if(tp ==="EXTERNAL"){
		isValid = hasValidPerExternal();
                
		return isValid;
	}else{
		return isValid;
	}
     */
    return true;
}



function hasValidPerInternal(){
	var strm = $("select[name='stream']").val();
	var isValidI = false;
	var tp = "INTERNAL";
	if(strm === "SCIENCE"){
		isValidI = hasValidPerScience(tp);
		return isValidI;
	}else if(strm === "ARTS"){
		isValidI = hasValidPerArts(tp);
		return isValidI;
	}else{
		return isValidI;
	}
	
}



function hasValidPerExternal(){	
    var strm = $("select[name='stream']").val();
	var isValidI = false;
	var tp = "EXTERNAL";
	if(strm === "SCIENCE"){
		isValidI = hasValidPerScience(tp);
		return isValidI;
	}else if(strm === "ARTS"){
		isValidI = hasValidPerArts(tp);
		return isValidI;
	}else{
		return isValidI;
	}
}

function hasValidPerScience(tp){
	var hasValidS = false;
	if(tp==="INTERNAL"){
		var pm = $("input[name='hid_sci_pr']").val();
		var pm = parseFloat(pm);
		var po = getObtPercentage();
		hasValidS =  isMore(po, pm);
		return hasValidS;
	}else if(tp === "EXTERNAL"){
		var pm = $("input[name='hid_xsci_pr']").val();
		var pm = parseFloat(pm);
		var po = getObtPercentage();
		hasValidS =  isMore(po, pm);
		return hasValidS;
	}else{
		return hasValidS;
	}
}


function hasValidPerArts(tp){
	
	var isValidA = false;
	var el1 = $("select[name='el1']").val();
	var el2 = $("select[name='el2']").val();
	var el3 = $("select[name='el3']").val();
	var el4 = $("select[name='adl']").val();
	var subs = [el1, el2, el3, el4];
    var geo_index = subs.indexOf("GEOGRAPHY");
	if(geo_index === -1){
		isValidA = hasValidPerAoutG(tp);
		return isValidA;
	}else{
		isValidA = hasValidPerAwithG(tp);
		return isValidA;
	}
	
}


function hasValidPerAwithG(tp){
	var hasValidS = false;
	if(tp==="INTERNAL"){
		var pm = $("input[name='hid_artG_pr']").val();
		var pm = parseFloat(pm);
		var po = getObtPercentage();
		hasValidS =  isMore(po, pm);
		return hasValidS;
	}else if(tp === "EXTERNAL"){
		var pm = $("input[name='hid_xartG_pr']").val();
		var pm = parseFloat(pm);
		var po = getObtPercentage();
		hasValidS =  isMore(po, pm);
		return hasValidS;
	}else{
		return hasValidS;
	}
}


function hasValidPerAoutG(tp){
	var hasValidS = false;
	if(tp==="INTERNAL"){
		var pm = $("input[name='hid_art_pr']").val();
		var pm = parseFloat(pm);
		var po = getObtPercentage();
		hasValidS =  isMore(po, pm);
		return hasValidS;
	}else if(tp === "EXTERNAL"){
		var pm = $("input[name='hid_xart_pr']").val();
		var pm = parseFloat(pm);
		var po = getObtPercentage();
		hasValidS =  isMore(po, pm);
		return hasValidS;
	}else{
		return hasValidS;
	}
}




function getObtPercentage(){
	var bm = parseInt($("input[name='bng']").val());
	var em = parseInt($("input[name='eng']").val());
	var mm = parseInt($("input[name='mth']").val());
	var pm = parseInt($("input[name='psc']").val());
	var lm = parseInt($("input[name='lsc']").val());
	var gm = parseInt($("input[name='geo']").val());
	var hm = parseInt($("input[name='hst']").val());
	
	var Tm = bm + em + mm + pm + lm + gm + hm;
	var Fm = parseInt($("input[name='tot']").val());
	
	var prc = Tm/Fm*100;
	var prc = parseFloat(prc).toFixed(2);
	
	return prc;
	
}


function isMore(obt_perc, elig_per){
	if(obt_perc >= elig_per){
		return true;
	}else{
		return false;
	}
}
// **** End - Percentage checking *** 


// testing

function hasErrorInTbox(tbox, type) {

    var txtbox_str = tbox.val();
    switch (type) {

        case "name":
            // var name_patt = /^((([a-zA-Z])+((\.\s)|\s))+([a-zA-Z])+)+$/g;
            
            // just added (\s)* portion to allow space after name for zero or more times
          //  var name_patt = /^((([a-zA-Z])+((\.\s)|\s))+([a-zA-Z])+(\s)*)+$/g;
            
            //modified to allow single word names.
            var name_patt = /^[a-zA-Z]+(((\.\s)|\s)[a-zA-Z]*)*/g;
            return(hasMatched(txtbox_str, name_patt));
            break;

        case "address":
            var add_patt = /[^\s]/g;
            return(hasMatched(txtbox_str, add_patt));
            break;

        case "pin":
            var pin_patt = /^[1-9]\d{5}$/g;
            return(hasMatched(txtbox_str, pin_patt));
            break;
            
        case "date":
            // different
            if(txtbox_str === ""){
                return 1;
            }else{
                return 0;
            }
            
            break;
        case "mobile":
            var mob_patt = /^[1-9]\d{9}$/g;
            return(hasMatched(txtbox_str, mob_patt));
            break;

        case "email":
            var email_patt = /^[a-zA-Z0-9\-\._]+[@][a-zA-Z0-9]+(\.[a-zA-Z0-9]+){1,2}/g;
            return(hasMatched(txtbox_str, email_patt));
            break;
            
        case "passyear":
        	
        	var year = Number(txtbox_str);
        	if(year >= 2014 && year <=2016){
        		return 0;
        	}else{
        		return 1;
        	}
     	break;
     	
        case "captcha":
            var cap_patt = /[^\s]/g;
            return(hasMatched(txtbox_str, cap_patt));
            break;
        
        default:

            break;
    }
}
 
 
 function hasMatched(txts, pat){
     if(txts.match(pat) === null){
         return 1;
     }else{
         return 0;
     }
         
 }
 
 
 function addErrorMsg(errorElement){
     var el_name = errorElement.attr('name');
     
     switch(el_name){
         case "sts_name":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid name.</p>");
             break;
             
         case "sts_fname":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid name of father.</p>");
             break;
             
         case "sts_mname":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid name of mother.</p>");
             break;
             
         case "sts_gname":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid name of Guardian's name.</p>");
             break;
             
         case "sts_add1":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid address.</p>");
             break;
             
         case "sts_add2":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid address.</p>");
             break;
             
         case "sts_ps":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter valid police station.</p>");
             break;
             
         case "sts_dist":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter valid district.</p>");
             break;
         
         case "sts_pin":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid 6 digit PIN.</p>");
             break;
             
             
             
             
             case "prm_add1":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid address.</p>");
             break;
             
         case "prm_add2":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid address.</p>");
             break;
             
         case "prm_ps":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter valid police station.</p>");
             break;
             
         case "prm_dist":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter valid district.</p>");
             break;
         
         case "prm_pin":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid 6 digit PIN.</p>");
             break;
             
         case "sts_sex":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please select.</p>");
             break;
             
//         case "sts_dob":
//             errorElement.next("p").remove();
//             errorElement.after("<p class='in-error'>Please Select the appropriate date</p>");
//             break; 
//             
         case "class4addm":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please Select the class for admission</p>");
             break;
             
         case "sts_mobile":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid 10 digit mobile no.</p>");
             break;
             
         case "sts_cat":
        	 errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please select category.</p>");
        	 break;
             
         case "sts_email":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid email id.</p>");
             break;
         case "sts_school":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter school name.</p>");
             break;   
       
         case "sts_board":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter board name.</p>");
             break;
             
         case "sts_psyear":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Passing year should be in between 2014 & 2016.</p>");
        	 break;
         case "bng":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	 
         case "eng":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	 
         case "mth":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	 
         case "psc":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	 
         case "lsc":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	 
         case "geo":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	 
         case "hst":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	
         case "tot-obt":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	 
         case "tot":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	 
         case "prcnt":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Enter a valid number.</p>");
        	 break;
        	 
         case "stream":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Please select stream.</p>");
        	 break;
        	 
         case "el1":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Select Elective 1.</p>");
        	 break;
        	 
         case "el2":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Select Elective 2.</p>");
        	 break;
        	 
         case "el3":
        	 errorElement.next("p").remove();
        	 errorElement.after("<p class='in-error'>Select Elective 3.</p>");
        	 break;
        	 
         case "ascap":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Captcha shouldn't be left blank.</p>");
             break;
         
         default:
             
             break;
     }
 }
 
 function addErrorRadMsg(clx){
     var clxId = clx.attr("id");
     if((clxId === "rad-x")||(clxId === "rad-ph")){
        clx.next("p").remove();
        clx.after("<p class='in-error'>Please select correct one.</p>"); 
     }
     
     if(clxId === "declr"){
        clx.next("p").remove();
        clx.after("<p class='in-error'>You have to accept that by selecting the checkbox.</p>"); 
     }
     
     
 }
 

 
 
 
 
 
 
 
 
/*
 * Ajax for captcha reload
 */
 $("#btn-cap-reload").click(function () {
     var glyId = $("#span-cap-reload");
        glyId.removeClass("glyphicon-refresh");
        glyId.addClass("glyphicon-repeat gl-spin");
       
     
     
    var prtcl = "http://";
    var site_domain = document.domain;
    var contr = "/nmhs/onlineform/captchaReload";
    // 9m should be replaced with actual folder name.
    var aj_url = prtcl.concat(site_domain, contr);
    $.ajax(aj_url).done(function (imgname) {
        $("#cap-img").children("img").remove();
        $("#cap-img").prepend(imgname);
        
        glyId.removeClass("glyphicon-repeat gl-spin");
        glyId.addClass("glyphicon-refresh");
    })
            .fail(function (imgname) {
                alert("Error: code 1");
            })
            .always(function() {
    glyId.removeClass("glyphicon-repeat gl-spin");
        glyId.addClass("glyphicon-refresh");
  });
});