// function for adding subject combination
 var sci_subjects = ["PHYSICS", "CHEMISTRY", "MATHEMATICS", "BIOLOGY"];
 var art_subjects = ["GEOGRAPHY", "HISTORY", "POL. SC", "PHILOSOPHY", "ECONOMICS", "ARABIC", "SOCIOLOG", "EDUCATION"];
 
 $("select[name='stream']").change(function(){
	 if($(this).val() === "SCIENCE"){
		 $("#el-1").empty();
		 $("<option value=' '>Elective 1</option>").appendTo($("#el-1"));
		 
		 $("#el-2").empty();
		 $("<option value=' '>Elective 2</option>").appendTo($("#el-2"));
		 
		 $("#el-3").empty();
		 $("<option value=' '>Elective 3</option>").appendTo($("#el-3"));
		 
		 $("#adl").empty();
		 $("<option value=' '>Additional</option>").appendTo($("#adl"));
		 
		 for(var i in sci_subjects){
			 $("<option value='"+sci_subjects[i]+"'>"+sci_subjects[i]+"</option>").appendTo($("#el-1"));
		 }
		 
	 }else if($(this).val() === "ARTS"){
		 $("#el-1").empty();
		 $("<option value=' '>Elective 1</option>").appendTo($("#el-1"));
		 
		 $("#el-2").empty();
		 $("<option value=' '>Elective 2</option>").appendTo($("#el-2"));
		 
		 $("#el-3").empty();
		 $("<option value=' '>Elective 3</option>").appendTo($("#el-3"));
		 
		 $("#adl").empty();
		 $("<option value=' '>Additional</option>").appendTo($("#adl"));
		 
		 for(var i in art_subjects){
			 $("<option value='"+art_subjects[i]+"'>"+art_subjects[i]+"</option>").appendTo($("#el-1"));
		 }
	 }
 });
 
 // Function for populating el-2 while el-1 changes
 $("#el-1").change(function(){
	 
	 if($("select[name='stream']").val() === "SCIENCE"){
		 

		 var el_sb_1 = sci_subjects.concat();
		 var indx = el_sb_1.indexOf($(this).val());
		 el_sb_1.splice(indx, 1);	
		 $("#el-2").empty();
		 $("<option value=' '>Elective 2</option>").appendTo($("#el-2"));
		 
		 $("#el-3").empty();
		 $("<option value=' '>Elective 3</option>").appendTo($("#el-3"));
		 
		 $("#adl").empty();
		 $("<option value=' '>Additional</option>").appendTo($("#adl"));
		 
		 for(var i in el_sb_1){
			 $("<option value='"+el_sb_1[i]+"'>"+el_sb_1[i]+"</option>").appendTo($("#el-2"));
		 }
	
	 } else if($("select[name='stream']").val() === "ARTS"){
		 
		 var el_sb_1 = art_subjects.concat();
		 var current_sub = $(this).val();

		 //if economics or arabic remove both
		 if(current_sub === "ECONOMICS" || current_sub === "ARABIC"){
			 var remv1 = el_sb_1.indexOf("ECONOMICS");
			 
			 el_sb_1.splice(remv1, 1);
			 var remv2 = el_sb_1.indexOf("ARABIC");
			 el_sb_1.splice(remv2, 1);
			 
		 }else{
			 var indx = el_sb_1.indexOf($(this).val());
			 el_sb_1.splice(indx, 1);		  
		 }
		 
		 $("#el-2").empty();
		 $("<option value=' '>Elective 2</option>").appendTo($("#el-2"));
		 
		 $("#el-3").empty();
		 $("<option value=' '>Elective 3</option>").appendTo($("#el-3"));
		 
		 $("#adl").empty();
		 $("<option value=' '>Additional</option>").appendTo($("#adl"));
		 
		 for(var i in el_sb_1){
			 $("<option value='"+el_sb_1[i]+"'>"+el_sb_1[i]+"</option>").appendTo($("#el-2"));
		 }
		 
	 }
 });
 
 
 
//Function for populating el-3 while el-2 changes
 $("#el-2").change(function(){
	 
	 if($("select[name='stream']").val() === "SCIENCE"){
		
		 var el_sb_2 = sci_subjects.concat();
		 var indx1 = el_sb_2.indexOf($("#el-1").val());
		 el_sb_2.splice(indx1, 1);
		 
		 var indx2 = el_sb_2.indexOf($(this).val());
		 el_sb_2.splice(indx2, 1);
		 
		 $("#el-3").empty();
		 $("<option value=' '>Elective 3</option>").appendTo($("#el-3"));
		 
		 $("#adl").empty();
		 $("<option value=' '>Additional</option>").appendTo($("#adl"));
		 
		 for(var i in el_sb_2){
			 $("<option value='"+el_sb_2[i]+"'>"+el_sb_2[i]+"</option>").appendTo($("#el-3"));
		 }
	
	 } else if($("select[name='stream']").val() === "ARTS"){
		 var el_sb_2 = art_subjects.concat();
		
		 //if arabic or economics in #el-1
		 var el1_sub = $("#el-1").val();
		 if(el1_sub === "ECONOMICS" || el1_sub === "ARABIC"){
			 var remv1 = el_sb_2.indexOf("ECONOMICS");
			 el_sb_2.splice(remv1, 1);
			 var remv2 = el_sb_2.indexOf("ARABIC");
			 el_sb_2.splice(remv2, 1);
			 
		 }else{
			 var indx1 = el_sb_2.indexOf($("#el-1").val());
			 el_sb_2.splice(indx1, 1);	  
		 }
		 
		 
		 
		 // if arabic or econ on el-1 and el-2
		 var current_sub = $(this).val();
		 if(current_sub === "ECONOMICS" || current_sub === "ARABIC"){
			 var remv1 = el_sb_2.indexOf("ECONOMICS");
			 el_sb_2.splice(remv1, 1);
			 var remv2 = el_sb_2.indexOf("ARABIC");
			 el_sb_2.splice(remv2, 1);
			 
		 }else{
			 var indx2 = el_sb_2.indexOf($(this).val());
			 el_sb_2.splice(indx2, 1);
		 }
		 
		 $("#el-3").empty();
		 $("<option value=' '>Elective 3</option>").appendTo($("#el-3"));
		 
		 $("#adl").empty();
		 $("<option value=' '>Additional</option>").appendTo($("#adl"));
		 
		 for(var i in el_sb_2){
			 $("<option value='"+el_sb_2[i]+"'>"+el_sb_2[i]+"</option>").appendTo($("#el-3"));
		 }
		 
	 }
 });
 
 
 
 
//Function for populating addl while el-3 changes
 $("#el-3").change(function(){
	 
	 if($("select[name='stream']").val() === "SCIENCE"){
		
		 var el_sb_3 = sci_subjects.concat();
		 var indx1 = el_sb_3.indexOf($("#el-1").val());
		 el_sb_3.splice(indx1, 1);
		 
		 var indx2 = el_sb_3.indexOf($("#el-2").val());
		 el_sb_3.splice(indx2, 1);
		 
		 var indx3 = el_sb_3.indexOf($(this).val());
		 el_sb_3.splice(indx3, 1);
		 
		 $("#adl").empty();
		 $("<option value=' '>Additional</option>").appendTo($("#adl"));
		 
		 for(var i in el_sb_3){
			 $("<option value='"+el_sb_3[i]+"'>"+el_sb_3[i]+"</option>").appendTo($("#adl"));
		 }
	
	 } else if($("select[name='stream']").val() === "ARTS"){
		 var el_sb_3 = art_subjects.concat();
		 
		 //if arabic or economics in #el-1
		 var el1_sub = $("#el-1").val();
		 if(el1_sub === "ECONOMICS" || el1_sub === "ARABIC"){
			 var remv1 = el_sb_3.indexOf("ECONOMICS");
			 el_sb_3.splice(remv1, 1);
			 var remv2 = el_sb_3.indexOf("ARABIC");
			 el_sb_3.splice(remv2, 1);
			 
		 }else{
			 var indx1 = el_sb_3.indexOf($("#el-1").val());
			 el_sb_3.splice(indx1, 1);
		 }
		 
		 
		 
		//if arabic or economics in #el-2
		 var el2_sub = $("#el-2").val();
		 if(el2_sub === "ECONOMICS" || el2_sub === "ARABIC"){
			 var remv1 = el_sb_3.indexOf("ECONOMICS");
			 el_sb_3.splice(remv1, 1);
			 var remv2 = el_sb_3.indexOf("ARABIC");
			 el_sb_3.splice(remv2, 1);
			 
		 }else{
			 var indx2 = el_sb_3.indexOf($("#el-2").val());
			 el_sb_3.splice(indx2, 1);
		 }
		 
		 
		
		 var current_sub = $("#el-3").val();
		 if(current_sub === "ECONOMICS" || current_sub === "ARABIC"){
			 var remv1 = el_sb_3.indexOf("ECONOMICS");
			 el_sb_3.splice(remv1, 1);
			 var remv2 = el_sb_3.indexOf("ARABIC");
			 el_sb_3.splice(remv2, 1);
			 
		 }else{
			 var indx3 = el_sb_3.indexOf($(this).val());
			 el_sb_3.splice(indx3, 1);
			 
		 }
		 
		 $("#adl").empty();
		 $("<option value=' '>Additional</option>").appendTo($("#adl"));
		 
		 for(var i in el_sb_3){
			 $("<option value='"+el_sb_3[i]+"'>"+el_sb_3[i]+"</option>").appendTo($("#adl"));
		 }
		 
	 }
 });