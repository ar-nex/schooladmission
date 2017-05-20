$("#btn-dt-change").click(function () {
    var sd = $("input[name='startdate']").val().trim();
    var ed = $("input[name='enddate']").val().trim();

    var prtcl = "http://";
    var site_domain = document.domain;
   // var contr = "/adminajax/setdate";
    var contr = "/schooladmission/adminajax/setdate";
    var targetUrl = prtcl.concat(site_domain, contr);


    $("#loader").removeClass("hideIt");
    $.ajax({
        method: "POST",
        url: targetUrl,
        data: {s: sd, e: ed}
    }).done(function (msg) {
    console.log(msg);    
    if (msg == 1) {
            $("#startdate").text(getFormatDate(sd));
            $("#enddate").text(getFormatDate(ed));
            $("#close").trigger("click");
            $("#loader").addClass("hideIt");
        }
        

    });
});



$("#btn-pr-change").click(function () {
    var i_sci = $("#int_sci").val().trim();
    var i_arg = $("#int_arts_geo").val().trim();
    var i_art = $("#int_arts").val().trim();
    var e_sci = $("#ext_sci").val().trim();
    var e_arg = $("#ext_arts_geo").val().trim();
    var e_art = $("#ext_arts").val().trim();

console.log(i_sci);
    var prtcl = "http://";
    var site_domain = document.domain;
   // var contr = "/adminajax/setPercentage";
    var contr = "/schooladmission/adminajax/setPercentage";
    var targetUrl = prtcl.concat(site_domain, contr);


    $("#loader").removeClass("hideIt");
    $.ajax({
        method: "POST",
        url: targetUrl,
        data: {isci: i_sci, iarg: i_arg, iart : i_art, esci: e_sci, earg: e_arg, eart : e_art,}
    }).done(function (msg) {
    console.log(msg);    
    if (msg == 1) {
            $("#ip-s").text(i_sci);
            $("#ip-g").text(i_arg);
            $("#ip-a").text(i_art);
            $("#ep-s").text(e_sci);
            $("#ep-g").text(e_arg);
            $("#ep-a").text(e_art);
            $("#close-pr").trigger("click");
            $("#loader-pr").addClass("hideIt");
        }
        

    });
});

function getFormatDate(dt) {
    var d = new Date(dt);
    return d.getDate() + "-" + (d.getMonth() + 1) + "-" + d.getFullYear();
}

function setCounter_tot() {
    var limit_tot = $("#h-tot-count").val();
    var vl1 = 0;
    var cl1 = setInterval(function () {
        if (vl1 >= limit_tot) {
            clearInterval(cl1);
            return;
        }
        $("#p-tot-count").text(++vl1);
    }, 10);
}

function setCounter_valid() {
    var limit_valid = $("#h-valid-count").val();
    var vl2 = 0;
    var cl2 = setInterval(function () {
        if (vl2 >= limit_valid) {
            clearInterval(cl2);
            return;
        }
        $("#p-valid-count").text(++vl2);
    }, 10);
}

function setCounter_invalid() {
    var limit_invalid = $("#h-invalid-count").val();
    var vl3 = 0;
    var cl3 = setInterval(function () {
        if (vl3 >= limit_invalid) {
            clearInterval(cl3);
            return;
        }
        $("#p-invalid-count").text(++vl3);
    }, 100);
}

function setCounter_gender() {
    var limit_gender = $("#h-tot-gender").val();
    var vl4 = 0;
    var cl4 = setInterval(function () {
        if (vl4 >= limit_gender) {
            clearInterval(cl4);
            return;
        }
        $("#p-tot-gender").text(++vl4);
    }, 10);
}

function setCounter_boys() {
    var limit_boys = $("#h-boys-count").val();
    var vl5 = 0;
    var cl5 = setInterval(function () {
        if (vl5 >= limit_boys) {
            clearInterval(cl5);
            return;
        }
        $("#p-boys-count").text(++vl5);
    }, 20);
}

function setCounter_girls() {
    var limit_girls = $("#h-girls-count").val();
    var vl6 = 0;
    var cl6 = setInterval(function () {
        if (vl6 >= limit_girls) {
            clearInterval(cl6);
            return;
        }
        $("#p-girls-count").text(++vl6);
    }, 20);
}


function drawgraph() {
    var prtcl = "http://";
    var site_domain = document.domain;
    var contr = "/adminajax/getStatics";
   // var contr = "/nmhsv/adminajax/getStatics";
    var targetUrl = prtcl.concat(site_domain, contr);
    $.ajax({
        method: "POST",
        url: targetUrl,
        data: {}
    }).done(function (msg) {
        var obj_data = JSON.parse(msg);
        var data_array = [];
        var len = obj_data.length;
        var i;
        for (i = 0; i < len; i++) {
            var temp_arr = [];
            var date = new Date(obj_data[i].date);
            var day = date.getDate();
           
            temp_arr.push(parseInt(day));
            temp_arr.push(parseInt(obj_data[i].count));
            data_array.push(temp_arr);
        }
      
        var h_date = [
            [3, "3 Dec"],
            [4, "4 Dec"],
            [5, "5 Dec"],
            [6, "6 Dec"],
            [7, "7 Dec"],
            [8, "8 Dec"],
            [9, "9 Dec"],
            [10, "10 Dec"],
            [11, "11 Dec"],
            [12, "12 Dec"],
            [13, "13 Dec"],
            [14, "14 Dec"],
            [15, "15 Dec"],
            [16, "16 Dec"],
            [17, "17 Dec"],
            [18, "18 Dec"],
            [19, "19 Dec"],
            [20, "20 Dec"],
            
        ];
        
        Flotr.draw(
                document.getElementById("chart"),
                [{data: data_array, lines: {show: true}}],{
                    yaxis : {min: 0, tickDecimals : 0},
                    xaxis : {ticks : h_date}
                }
                );

    });
}






//$(document).ready(function () {
//    setCounter_tot();
//    setCounter_valid();
//    setCounter_invalid();
//    setCounter_gender();
//    setCounter_boys();
//    setCounter_girls();
//    
//});

//$(window).load(function(){
//    drawgraph();
//});