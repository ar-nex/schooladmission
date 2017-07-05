
$(".drop1-btn").click(function (){
        var dr_btn = $(this);
        var fNo = dr_btn.val();
        var fno_holder = $("input[name='fno_holder_inp']");
        fno_holder.val(fNo.toString());
        var mdl_label = $("#myModalLabel");
        mdl_label.text("Drop form no: "+fNo+"?");
        var glyId = "#rf".concat(fNo);
        $(glyId).removeClass("glyphicon-trash");
        $(glyId).addClass("glyphicon-repeat gl-spin");
        
});

 $("#drop-btn").click(function(){
        
        var fno = $("input[name='fno_holder_inp']").val();
        var dr_msg = $("#drop-reason").val();
        
        var prtcl = "http://";
        var site_domain = document.domain;
        var contr = "/overview/drop";
      //  var contr = "/schooladmission/overview/drop";

        var s_url = prtcl.concat(site_domain, contr);
        
         
        
        $.ajax({
            method: "POST",
            url: s_url,
            data: {fid : fno, r : dr_msg}
        })
        .done(function (msg_d){
            if(msg_d == 1){
//                var t_id = "#drop-"+fno;
//                $(t_id).parent().remove();
                var ov_id = "#ov-"+fno;
               
                $(ov_id).remove();
                $("#myModal").modal("toggle");
             
               
                
            }else{
                alert(msg_d);
            }
         })
                 .always(function (msg_d){
                   console.log(msg_d);
                 });
        
        
        
    });