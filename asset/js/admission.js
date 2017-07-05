
// var env = "production";
var env = "published";

$(".act-btn-adm").click(function(){
  var thisbtn = $(this);
  var fno = thisbtn.val();
  var s_nameId = "#std-name-"+fno;
  var stdName = $(s_nameId).text();
  $("input[name='fno_holder']").val(fno.toString());
  $("input[name='std_name']").val(stdName);
  var modLabel = stdName+" | Form No. : "+fno;
  $("#myModalLabel").html(modLabel);
  
});


$(".abs-btn").click(function(){
    var fid = $("input[name='fno_holder']").val();
    var s_img = $("#adm-img-st1");
    s_img.css("visibility", "visible");
    var prtcl = "http://";
    var site_domain = document.domain;
    if (env === "production") {
        var contr = "/schooladmission/admissionnew/ajax_abs";
    }else {
       var contr = "/admissionnew/ajax_abs"; 
    }
    var s_url = prtcl.concat(site_domain, contr);
    
    $.ajax({
        method : "POST",
        url : s_url,
        data : {fid : fid, fst : "ABS"}
    })
            .done( function(msg){
                if(msg == 1){
                   
                   var actbtnId = "#act-btn-"+fid;
                   $(actbtnId).addClass("disabled");
                   var stPId = "#stat-"+fid;
                   var iconId = "#fa-"+fid;
                   $(iconId).removeClass("fa-exclamation-circle");
                   $(iconId).addClass("fa-frown-o");
                   $(stPId).text("Absent");
                   var stW = "#act-sts-"+fid;
                   $(stW).addClass("act-absent");
                   $("input[name='last_submit']").val(fid);
                   retainlast(fid);
                   
                }else{
                    alert("Error Code : adm_day_absent/ajax");
                }
            })
            .fail(function(msg){
                   
            })
            .always(function(msg){
                   $("#actionModal").modal("toggle");  
                   s_img.css("visibility", "hidden");
            });
                        
                    
});

function retainlast(fid){
    var nm_acc = "bankacc_"+fid;
    var acc = $("input[name='"+nm_acc+"']").val();
    $("input[name='last_bank_acc']").val(acc);
    
    var nm_bank = "bank_"+fid;
    var bank = $("input[name='"+nm_bank+"']").val();
    $("input[name='last_bank']").val(bank);
    
    var nm_branch = "bankbranch_"+fid;
    var branch = $("input[name='"+nm_branch+"']").val();
    $("input[name='last_branch']").val(branch);
    
    var nm_ifsc = "ifsc_"+fid;
    var ifsc = $("input[name='"+nm_ifsc+"']").val();
    $("input[name='last_ifsc']").val(ifsc);
    
}



$("#drop-btn").click(function(){
    var fid = $("input[name='fno_holder']").val();
    var s_img = $("#adm-img-st1");
    s_img.css("visibility", "visible");
    var prtcl = "http://";
    var site_domain = document.domain;
    if (env === "production") {
        var contr = "/schooladmission/admissionnew/ajax_rej";
    }else{
       var contr = "/admissionnew/ajax_rej"; 
    }
    var s_url = prtcl.concat(site_domain, contr);
    var remark = $("#drop-reason").val();

    
    $.ajax({
        method : "POST",
        url : s_url,
        data : {fid : fid, fst : "REJ", r : remark}
    })
            .done( function(msg){
                if(msg == 1){
                   var actbtnId = "#act-btn-"+fid;
                   $(actbtnId).addClass("disabled");
                   var stPId = "#stat-"+fid;
                   var iconId = "#fa-"+fid;
                   $(iconId).removeClass("fa-exclamation-circle");
                   $(iconId).addClass("fa-ban");
                   $(stPId).text("Checked & Rejected");
                   var stW = "#act-sts-"+fid;
                   $(stW).addClass("act-rejected");
                   $("input[name='last_submit']").val(fid);
                   retainlast(fid);
                   
                }else{
                    alert(msg);
                }
            })
            .fail(function(msg){
                   
            })
            .always(function(msg){
                   $("#actionModal").modal("toggle");
                   $("#admissionModal").modal("toggle");
                   s_img.css("visibility", "hidden");
            });
                        
                    
});


$("#admFinal-btn").click(function(){
    var fid = $("input[name='fno_holder']").val();
    var s_img = $("#adm-img-st1");
    s_img.css("visibility", "visible");
    var prtcl = "http://";
    var site_domain = document.domain;
    if (env === "production") {
        var contr = "/schooladmission/admissionnew/ajax_adm";
    }else {
       var contr = "/admissionnew/ajax_adm"; 
   }
    var s_url = prtcl.concat(site_domain, contr);
    var roll = $("#rollno").val();
    var section = $("#section").val().toUpperCase();
    
    $.ajax({
        method : "POST",
        url : s_url,
        data : {fid : fid, fst : "ADM", r: roll, s: section}
    })
            .done( function(msg){
                if(msg == 1){
                   
                   var actbtnId = "#act-btn-"+fid;
                   $(actbtnId).addClass("disabled");
                   var stPId = "#stat-"+fid;
                   var iconId = "#fa-"+fid;
                   $(iconId).removeClass("fa-exclamation-circle");
                   $(iconId).addClass("fa-check-circle");
                   $(stPId).text('Admitted: '+section+'-'+roll);
                   var stW = "#act-sts-"+fid;
                   $(stW).addClass("act-admitted");
                   $("input[name='last_submit']").val(fid);
                   retainlast(fid);
                   var d = $("#cntr");
                   var n = parseInt(d.text());
                   n++;
                   d.text(n.toString());
                   console.log(n);
                   
                }else{
                    alert(msg);
                    console.log(msg);
                }
            })
            .fail(function(msg){
                   
            })
            .always(function(msg){
                   $("#actionModal").modal("toggle");
                   $("#admissionModal").modal("toggle");
                   s_img.css("visibility", "hidden");
            });
                        
                    
});



//$("#undo-btn").click(function(){
//    var fno = $("input[name='last_submit']").val();
//     
//    if(fno == ""){
//       
//        return ;
//    }
//    var prtcl = "http://";
//    var site_domain = document.domain;
//    var contr = "/9m/nmhs/admission_cntrl/ajaxL_undo";
//   // var contr = "/nmhs/admission_cntrl/ajaxL_undo";
//    var s_url = prtcl.concat(site_domain, contr);
//     $.ajax({
//        method : "POST",
//        url : s_url,
//        data : {fid : fno}
//    })
//            .done(function(msg){
//                 if(msg == 1){
//                      location.reload(true);
//                      $("input[name='last_submit']").val("")
//                 }else{
//                     alert("Error: undo");
//                 }
//
//            })
//                    .fail(function (msg){
//                        alert("failed");
//                    });
//                           
//});