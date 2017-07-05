// var env = "production";
 var env = "published";

// array for student personal fields
var ar_personal = [
    'Student Name',
    'Father Name',
    'Mother Name',
    'Guardian Name',
    'Relation with Guardian',
    'Date of Birth',
    'Sex',
    'Is Physically Challenged',
    'Physically Ch. Type',
    'Guardian Occupation',
    'Social Category',
    'Is BPL',
    'Aadhaar Number',
    'Guardian Aadhaar',
    'Religion',
    'BPL No.',
    'Guardian Voter No.'
];

var ar_bank = [
    'Account Number',
    'Bank Name',
    'Bank Branch',
    'IFSC Code'
];

var ar_contact = [
    'Para / House No.',
    'Vilage / Street',
    'Post Office',
    'Police station',
    'District',
    'PIN',
    'Permanent Para / House No.',
    'Permanent Vilage / Street',
    'Permanent Post Office',
    'Permanent Police Station',
    'Permanent District',
    'Permanent PIN'
];

var ar_lastclass = [
    'Last School',
    'Last Board',
    'Passing Year'
];

var ar_classXI = [
  'Section',
  'Roll'
];


// change the particular list according to category
$("#category").change(function () {
    var cat = $(this).val();
    switch (cat) {
        case "personal":
            $("#particular").empty();
            $("<option value=''>-select-</option>").appendTo($("#particular"));
            for (var i = 0; i < ar_personal.length; i++) {
                var j = i +1;
               $("<option value='s"+j+"'>"+ar_personal[i]+"</option>").appendTo($("#particular")); 
            }
            break;
        case "contact":
            $("#particular").empty();
            $("<option value=''>-select-</option>").appendTo($("#particular"));
            for (var k = 0; k < ar_contact.length; k++) {
                var l = k +1;
               $("<option value='c"+l+"'>"+ar_contact[k]+"</option>").appendTo($("#particular")); 
            }
            break;
        case "lastclass":
            $("#particular").empty();
            $("<option value=''>-select-</option>").appendTo($("#particular"));
            for (var m = 0; m < ar_lastclass.length; m++) {
                var n = m+1;
               $("<option value='l"+n+"'>"+ar_lastclass[m]+"</option>").appendTo($("#particular")); 
            }
            break;
        case "bank":
            $("#particular").empty();
            $("<option value=''>-select-</option>").appendTo($("#particular"));
            for (var p = 0; p < ar_bank.length; p++) {
                var q = p+1;
               $("<option value='b"+q+"'>"+ar_bank[p]+"</option>").appendTo($("#particular")); 
            }
            break;
        case "xi":
            $("#particular").empty();
            $("<option value=''>-select-</option>").appendTo($("#particular"));
            for (var s = 0; s < ar_classXI.length; s++) {
                var t = s+1;
               $("<option value='e"+t+"'>"+ar_classXI[s]+"</option>").appendTo($("#particular")); 
            }
            break;
        default:
            $("#particular").empty();
            $("<option value=''>-select-</option>").appendTo($("#particular"));
            break;
    }
});


$("#btn-edit-get").click(function(){
    var fno = $("#formno").val().trim();
    var category = $("#category").val();
    var colCode = $("#particular").val();
    if (isNaN(fno) || fno==="") {
        alert("Please Valid Number");
        return;
    }
    else if(category === "")
    { 
        alert("Please select category");
        return;   
    }
    else if(colCode ==="")
    {
        alert("Please select particular");
        return;  
    }
    else
    {
        
        var prtcl = "http://";
        var site_domain = document.domain;
        if (env === "production") {
           var contr = "/schooladmission/edit/listenget";
        }else{
           var contr = "/edit/listenget"; 
        }
        
        console.log(colCode);
        var s_url = prtcl.concat(site_domain, contr);
        $("#get-loader").removeClass("hideIt");
       
        $.ajax({
            method: "POST",
            url: s_url,
            data: {fid: fno, c: colCode}
        }).done(function(msg){
            if (msg === "no_record") {
                $("#oldval").val("");
                alert("There is no such form number.");
            }else
            {
                $("#oldval").val(msg);
            }
            
        }).always(function(){
            $("#get-loader").addClass("hideIt");
        });
    }
});


$("#btn-edit-set").click(function(){
    var fno = $("#formno").val().trim();
    var colCode = $("#particular").val();
    var newvalue = $("#newval").val().trim().toUpperCase();
    var oldvalue = $("#oldval").val().trim();
    if ((isNaN(fno) || fno==="") || (colCode ==="") || (newvalue === "")) {
        return;
    } else {
        var prtcl = "http://";
        var site_domain = document.domain;
        if (env === "production") {
           var contr = "/schooladmission/edit/listenset";
        }else{
           var contr = "/edit/listenset"; 
        }
        
        
        var s_url = prtcl.concat(site_domain, contr);
        $("#set-loader").removeClass("hideIt");
        
         $.ajax({
            method: "POST",
            url: s_url,
            data: {fid: fno, c: colCode, v:newvalue}
        }).done(function(msg){
            console.log(msg);
            if (msg == 1) {
                $("#set-loader").addClass("hideIt");
                $("#oldval").val("");
                $("#newval").val("");
            }else
            {
                
            }
            
        });
    }
});