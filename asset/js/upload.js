function hasValidFormat(){
	var fName = $("input[name='userfile']").val();
	var dotIndex = fName.lastIndexOf(".");
	var fFormat = fName.slice(dotIndex, fName.length);
	if(fFormat === ".jpg" || fFormat === ".jpeg" || fFormat === '.JPG' || fFormat === '.JPEG' || fFormat === ".png" || fFormat === ".PNG"){
		return 1;
	}else{
		return 0;
	}
}

function hasValidSize(){
	var f = document.querySelector("input[type=file]").files[0];
	var fSize = f['size']/1024;
	if(fSize < 151){
		return 1;
	}else{
		return 0;
	}
}    
    

$("input[name='userfile']").change(function(){
	// check if file is valid or not.
        $("#img-holder-toggle").removeClass("hideIt");
	var t = hasValidFormat();
	if(t){
            var mf = $("#msg-format");
	    mf.removeClass("glyphicon-ok fgreen");
            mf.removeClass("glyphicon-remove fred");
            mf.addClass("glyphicon-ok fgreen");
	}else{
            var mf = $("#msg-format");
	    mf.removeClass("glyphicon-ok fgreen");
            mf.removeClass("glyphicon-remove fred");
	    mf.addClass("glyphicon-remove fred");
	}

	var sz = hasValidSize();
	if(sz){
            var ms = $("#msg-size");
		ms.removeClass("glyphicon-ok fgreen");
		ms.removeClass("glyphicon-remove fred");
		ms.addClass("glyphicon-ok fgreen");
	}else{
            var ms = $("#msg-size");
		ms.removeClass("glyphicon-ok fgreen");
		ms.removeClass("glyphicon-remove fred");
		ms.addClass("glyphicon-remove fred");
	}        
        
});

$("#btn-upload").click(function(event){
   
    var t = hasValidFormat();
    var sz = hasValidSize();
    var validfile = t && sz;
    if(!validfile){
        alert("Please select a photo of valid size and valid format");
        event.preventDefault();
    }else{
         $("#sending-gif").removeClass("hideIt");
         $(this).addClass("disabled");
    }
});