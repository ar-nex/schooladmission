/*
 * Same gurdian name and present address
 */
$("#chk-grdn").change(function(){
     $("input[name='sts_gname']").next("p").remove();
	if($(this).is(':checked')){
		var gname = $("input[name='sts_fname']").val();
		$("input[name='sts_gname']").val(gname);
                $("input[name='sts_grel']").val("FATHER");
	}else{
		$("input[name='sts_gname']").val("");
                $("input[name='sts_grel']").val("");
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
$("input[name='sts_email']").focusin(function(){
  $(this).next("p").remove();  
});

$("input[type='text']").focusin(function(){
    $(this).next("p").remove();
});

// sex
$("input[name='sts_sex']").change(function(){
    $("#rad-x").next("p").remove();
});

//ph and bpl
$("input[name='sts_ph']").change(function(){
	var ph_val = $("input[name='sts_ph']:checked").val();
	
	if(ph_val === "N"){
		$("input[name='ph_type']").val(" ");
		$("#field-ph-type").attr('disabled', true);
	}else if(ph_val === "Y"){
		$("#field-ph-type").attr('disabled', false);
	}
});

$("input[name='sts_bpl']").change(function(){
	var bpl_val = $("input[name='sts_bpl']:checked").val();
	
	if(bpl_val === "N"){
		$("input[name='sts_bpl_no']").val(" ");
		$("#field-bpl-no").attr('disabled', true);
	}else if(bpl_val === "Y"){
		$("#field-bpl-no").attr('disabled', false);
	}
});

//$("select[name='yy']").change(function(){
//    var yr = $(this).val();
//    if(yr == 2007)
//    {
//        $("#mm option[value='04']").remove();
//        $("#mm option[value='05']").remove();
//        $("#mm option[value='06']").remove();
//        $("#mm option[value='07']").remove();
//        $("#mm option[value='08']").remove();
//        $("#mm option[value='09']").remove();
//        $("#mm option[value='10']").remove();
//        $("#mm option[value='11']").remove();
//        $("#mm option[value='12']").remove();
//    } 
//    else if(yr == 2006)
//    {
//        if($("#mm option[value='04']").length)
//        {
//
//        }
//        else
//        {
//            $("#mm").append('<option value="04">Apr</option>');
//            $("#mm").append('<option value="05">May</option>');
//            $("#mm").append('<option value="06">June</option>');
//            $("#mm").append('<option value="07">July</option>');
//            $("#mm").append('<option value="08">Aug</option>');
//            $("#mm").append('<option value="09">Sept</option>');
//            $("#mm").append('<option value="10">Oct</option>');
//            $("#mm").append('<option value="11">Nov</option>');
//            $("#mm").append('<option value="12">Dec</option>');
//        }
//    }
//});



// category
$("select[name='sts_cat']").change(function(){
    $(this).next("p").remove();
});

$("select[name='dd']").change(function(){
    $("#dob-error").next("p").remove();
});

$("select[name='mm']").change(function(){
    $("#dob-error").next("p").remove();
});

$("select[name='yy']").change(function(){
    $("#dob-error").next("p").remove();
});

$("select[name='sts_religion']").change(function(){
    $(this).next("p").remove();
});

$("input[type='checkbox']").change(function(){
    $("#declr").next("p").remove();
});

// school
$("input[name='sts_school']").focusin(function(){
    $(this).next("p").remove();
});

$("input[name='sts_psyear']").focusin(function(){
    $(this).next("p").remove();
});
$("input[name='ascap']").focusin(function(){
    $(this).next("p").remove();
});
$("input[name='sts_acc']").focusin(function(){
    $(this).next("p").remove();
});

$("input[name='sts_bank']").focusin(function(){
    $(this).next("p").remove();
});

$("input[name='sts_bank_branch']").focusin(function(){
    $(this).next("p").remove();
});

$("input[name='sts_ifsc']").focusin(function(){
    $(this).next("p").remove();
});






$("#btn-preview").click(function(){
    var mname = $("input[name='sts_name']").val() +" "+ $("input[name='sts_name2']").val() +" "+ $("input[name='sts_name3']").val()
    $("#m-name").text(mname);
    $("#m-fname").text($("input[name='sts_fname']").val());
    $("#m-mname").text($("input[name='sts_mname']").val());
    $("#m-gname").text($("input[name='sts_gname']").val());
    $("#m-grel").text($("input[name='sts_grel']").val());
    var mdob = $("select[name='dd']").val() + "-" + $("select[name='mm']").val() + "-" + $("select[name='yy']").val();
    $("#m-dob").text(mdob);
    var msex = $("input[name='sts_sex']:checked").val();
    if(msex === "M")
    { $("#m-sex").text("Boy");}
    else if(msex === "F")
    { $("#m-sex").text("Girl");}
    $("#m-goccu").text($("input[name='sts_groccu']").val());
    var misph = $("input[name='sts_ph']:checked").val();
    if(misph === "Y")
    {$("#m-isph").text("Yes");}
    else if(misph === "N")
    {$("#m-isph").text("No");}
    $("#m-phdetail").text($("input[name='ph_type']").val());
    $("#m-cat").text($("select[name='sts_cat']").val());
    $("#m-religion").text($("select[name='sts_religion']").val());
    var mbpl = $("input[name='sts_bpl']:checked").val();
    if(mbpl === "Y")
    {$("#m-isbpl").text("Yes");}
    else if(mbpl === "N")
    {$("#m-isbpl").text("No");}
    $("#m-bplno").text($("input[name='sts_bpl_no']").val());
    $("#m-aadhar").text($("input[name='sts_adhr']").val());
    $("#m-aadhar-grd").text($("input[name='grd_adhr']").val());
    $("#m-epic").text($("input[name='grd_epic']").val());

    $("#m-addr1a").text($("input[name='sts_add1_a']").val());
    $("#m-addr1").text($("input[name='sts_add1']").val());
    $("#m-addr2").text($("input[name='sts_add2']").val());
    $("#m-ps").text($("input[name='sts_ps']").val());
    $("#m-dist").text($("input[name='sts_dist']").val());
    $("#m-pin").text($("input[name='sts_pin']").val());
    
    $("#mp-addr1a").text($("input[name='prm_add1_a']").val());
    $("#mp-addr1").text($("input[name='prm_add1']").val());
    $("#mp-addr2").text($("input[name='prm_add2']").val());
    $("#mp-ps").text($("input[name='prm_ps']").val());
    $("#mp-dist").text($("input[name='prm_dist']").val());
    $("#mp-pin").text($("input[name='prm_pin']").val());
    
    $("#m-mobile").text($("input[name='sts_mobile']").val());
    $("#m-email").text($("input[name='sts_email']").val());
    
    $("#m-account").text($("input[name='sts_acc']").val());
    $("#m-mbank").text($("input[name='sts_bank']").val());
    $("#m-branch").text($("input[name='sts_bank_branch']").val());
    $("#m-ifsc").text($("input[name='sts_ifsc']").val());

    $("#m-lschool").text($("input[name='sts_school']").val());
    $("#m-cand-type").text($("input[name='sts_type']:checked").val());
    $("#m-board").text($("input[name='sts_board']").val());
    $("#m-pyear").text($("input[name='sts_psyear']").val());
    $("#m-tot-obtained").text($("input[name='tot_obt']").val());
    $("#m-full-mark").text($("input[name='tot']").val());
    $("#m-percn").text($("input[name='prcnt']").val());
    $("#m-bng").html($("input[name='bng']").val());
    $("#m-eng").html($("input[name='eng']").val());
    $("#m-mth").html($("input[name='mth']").val());
    $("#m-psc").html($("input[name='psc']").val());
    $("#m-lsc").html($("input[name='lsc']").val());
    $("#m-geo").html($("input[name='geo']").val());
    $("#m-his").html($("input[name='hst']").val());
    
    $("#m-stream").html($("select[name='stream']").val());
    $("#m-compl1").html($("select[name='el1']").val());
    $("#m-compl2").html($("select[name='el2']").val());
    $("#m-compl3").html($("select[name='el3']").val());
    $("#m-adl").html($("select[name='adl']").val());
    
    if($("input[name='chk_declr']").is(':checked'))
    {$("#m-declare").text("The particulars given above are correct and we shall abide by the rules and regulation of the school and board.")}
});


$("#modal-ok").click(function () {
    var error = [];
    var errorRad = [];

   console.log("Here");
    
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
    if(sel_cat.val() === ""){
    	error.push(sel_cat);
    }

    var sel_dd = $("select[name='dd']");
    if(sel_dd.val() === ""){
        error.push(sel_dd);
    }

    var sel_mm = $("select[name='mm']");
    if(sel_mm.val() === ""){
        error.push(sel_mm);
    }

    var sel_yy = $("select[name='yy']");
    if(sel_yy.val() === ""){
        error.push(sel_yy);
    }
    
    var sel_rel = $("select[name='sts_religion']");
    if(sel_rel.val() === ""){
    	error.push(sel_rel);
    }
    
    
    var txtb_declr = $("input[type='checkbox']:checked");
    if(typeof(txtb_declr.val()) === "undefined"){
        var chk_elm = $("#declr");
        errorRad.push(chk_elm);
    }
    
    // temporary for admin
    var txtb_cap = $("input[name='ascap']");
    if (hasErrorInTbox(txtb_cap, "captcha")) {
        error.push(txtb_cap);
    }
    
   var txtb_scl = $("input[name='sts_school']");
    if(hasErrorInTbox(txtb_scl, "address")){
   	error.push(txtb_scl);
   }

   var txtb_py = $("input[name='sts_psyear']");
   if(hasErrorInTbox(txtb_py, "passyear")){
	   error.push(txtb_py);
   }

//    var txtb_acc = $("input[name='sts_acc']");
//    if(hasErrorInTbox(txtb_acc, "address")){
//    error.push(txtb_acc);
//   }
//
//    var txtb_bank = $("input[name='sts_bank']");
//    if(hasErrorInTbox(txtb_bank, "address")){
//    error.push(txtb_bank);
//   }
//
//    var txtb_branch = $("input[name='sts_bank_branch']");
//    if(hasErrorInTbox(txtb_branch, "address")){
//    error.push(txtb_branch);
//   }
//
//    var txtb_ifsc = $("input[name='sts_ifsc']");
//    if(hasErrorInTbox(txtb_ifsc, "address")){
//    error.push(txtb_ifsc);
//   }

    



    
   // determine preventDefault or not
      
    if ((error.length > 0) || (errorRad.length > 0)) {
       // event.preventDefault();

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
       $("#btn-edit").trigger("click");
    } else if ($("#unique-aadhar").val() == 0) {
        var adhr = $("input[name='sts_adhr']");
        adhr.next("h5").remove();
        adhr.after('<h5 class="in-error" id="focus-me">Aadhar number already used.</h5>');
         $("#btn-edit").trigger("click");
        adhr.focus();
       
    }else if(!hasValidPercentage())  
    {
        $("#btn-edit").trigger("click"); 
        $(".less60-msg").text("Sorry! You have less than allowed percentage in class X. You are not eligible to fill online form.");
    }
    else {
        $("#main-form").submit();
    }
   

});




$("#main-form").submit(function (event){
    if (!hasValidPercentage()) {
        $(".less60-msg").text("Sorry! You have less than allowed percentage in class X. You are not eligible to fill &amp; submit online form.");
        event.preventDefault();
    }
});
 
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
        	if(year >= 2015 && year <=2017){
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

         case "sts_mobile":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid 10 digit mobile no.</p>");
             break;
             
         case "sts_cat":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please select category.</p>");
             break;
         case "dd":
             $("#dob-error").next("p").remove();
             $("#dob-error").after("<p class='in-error'>Please select date.</p>");
             break;
         case "mm":
             $("#dob-error").next("p").remove();
             $("#dob-error").after("<p class='in-error'>Please select date.</p>");
             break;       
         case "yy":
             $("#dob-error").next("p").remove();
             $("#dob-error").after("<p class='in-error'>Please select date.</p>");
             break;    
        case "sts_religion":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please select religion.</p>");
             break;  

         case "sts_email":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter a valid email id.</p>");
             break;
         case "sts_school":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter school name.</p>");
             break;
          case "sts_psyear":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter class IV passing year.</p>");
             break;
             case "sts_acc":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter student's bank account number</p>");
             break;
             case "sts_bank":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter bank name.</p>");
             break; 
             case "sts_bank_branch":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter bank branch name.</p>");
             break; 
             case "sts_ifsc":
             errorElement.next("p").remove();
             errorElement.after("<p class='in-error'>Please enter branch's IFSC code.</p>");
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



$(document).ready(function(){
	$("#field-ph-type").attr('disabled', true);
        $("#field-bpl-no").attr('disabled', true);
});


$("#modal-ok1").click(function(){
    $("#main-submit").prop('disabled', false);
    $("#btn-dismiss").trigger("click");
});

$("#btn-edit").click(function(){
    $("#main-submit").prop('disabled', true);
});


/*
 * Ajax for captcha reload
 */
 $("#btn-cap-reload").click(function () {
     var glyId = $("#span-cap-reload");
        glyId.removeClass("glyphicon-refresh");
        glyId.addClass("glyphicon-repeat gl-spin");
       
     
     
    var prtcl = "http://";
    var site_domain = document.domain;
   // var contr = "/form/creload";
    var contr = "/schooladmission/form/creload";
    // 9m should be replaced with actual folder name.
    var aj_url = prtcl.concat(site_domain, contr);
    $.ajax(aj_url).done(function (imgname) {
        $("#cap-img").children("img").remove();
        $("#cap-img").prepend(imgname);
        
        glyId.removeClass("glyphicon-repeat gl-spin");
        glyId.addClass("glyphicon-refresh");
    })
            .fail(function (imgname) {
                console.log(imgname);
            })
            .always(function() {
    glyId.removeClass("glyphicon-repeat gl-spin");
        glyId.addClass("glyphicon-refresh");
  });
});



$("input[name='sts_adhr']").focusin(function(){
    
       
     //  var pat = /^\d+$/;
     //   if (pat.test(txt)) {
        
});

//ajax for checking unique aadhar


$("input[name='sts_adhr']").focusout(function(){
   val = $(this).val().trim();
    if (val === "") {
        var adhr = $("input[name='sts_adhr']");
        adhr.next("h5").remove();
        return;
    }else
    {
     var pat = /^\d{12}/;
     if(pat.test(val))
     {
           var prtcl = "http://";
           var site_domain = document.domain;
           var contr = "/form/aadhar";
          // var contr = "/nmhsv/form/aadhar";
           var aj_url = prtcl.concat(site_domain, contr);
           var uq_aadhar = $("#unique-aadhar");
           uq_aadhar.val("1");
           var adhr = $("input[name='sts_adhr']");
           adhr.next("h5").remove();
           $.ajax({
           method: "POST",
           url: aj_url,
           data: {a: val}
        }).done(function(msg){
            if(msg != 0){
                uq_aadhar.val("0");
                adhr.after('<h5 class="in-error" id="focus-me">This aadhar number already used.</h5>');
                adhr.focus();            
            }
        });
     }else{
         alert("Wrong aadhar number");
     }
    }
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



function hasValidPercentage(){
    
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
                var po_str = $("input[name='geo']").val();
                var po = parseInt(po_str);
		hasValidS =  isMore(po, pm) && hasValidPerAoutG(tp);
		return hasValidS;
	}else if(tp === "EXTERNAL"){
		var pm = $("input[name='hid_xartG_pr']").val();
		var pm = parseFloat(pm);
		var po = getObtPercentage();
                var po_str = $("input[name='geo']").val();
                var po = parseInt(po_str);
		hasValidS =  isMore(po, pm) && hasValidPerAoutG(tp);
		return hasValidS;
	}else{
		return hasValidS;
	}
}


function hasValidPerAoutG(tp){
	var isValid;
	if(tp==="INTERNAL"){
		var pm = $("input[name='hid_art_pr']").val();
	    pm = parseFloat(pm);
		var po = getObtPercentage();
        isValid = isMore(po, pm);  
	}else if(tp === "EXTERNAL"){
		var pm = $("input[name='hid_xart_pr']").val();
	    pm = parseFloat(pm);
		var po = getObtPercentage();
		isValid = isMore(po, pm);
	}
    return isValid;
}




function getObtPercentage(){
	var bm = parseInt($("input[name='bng']").val());
	var em = parseInt($("input[name='eng']").val());
	var mm = parseInt($("input[name='mth']").val());
	var pm = parseInt($("input[name='psc']").val());
	var lm = parseInt($("input[name='lsc']").val());
	var gm = parseInt($("input[name='geo']").val());
	var hm = parseInt($("input[name='hst']").val());
	var ar = parseInt($("input[name='arb']").val());
	if(isNaN(ar)){
	    ar = 0;
	}
	var Tm = bm + em + mm + pm + lm + gm + hm + ar;
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






//$("input[name='sts_acc']").focusout(function(){
//   val = $(this).val().trim();
//    if (val === "") {
//        var acc = $("input[name='sts_acc']");
//        acc.next("h5").remove();
//        return;
//    }else
//    {
//     var pat = /^(\d)+$/;
//     if(pat.test(val))
//     {
//           var prtcl = "http://";
//           var site_domain = document.domain;
//           var contr = "/form/bankacc";
//           //var contr = "/nmhsv/form/bankacc";
//           var aj_url = prtcl.concat(site_domain, contr);
//           var uq_acc = $("#unique-acc");
//           uq_acc.val("1");
//           var acc = $("input[name='sts_acc']");
//           acc.next("h5").remove();
//           $.ajax({
//           method: "POST",
//           url: aj_url,
//           data: {b: val}
//        }).done(function(msg){
//            if(msg != 0){
//                uq_acc.val("0");
//                acc.after('<h5 class="in-error" id="focus-me">This bank account number already used.</h5>');
//                acc.focus();            
//            }
//        });
//     }else{
//         alert("Wrong account number");
//     }
//    }
//});



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
