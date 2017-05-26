<div class="container">
	<div class="col-md-offset-4 col-md-4">
	<h1 class="page-header">Enter form number<span class="small"> and date of birth to retrieve the form</span></h1>
     
      <?php
		$form_attr = array (
			
			'id' => 'adms-form' 
		);
		echo form_open ( 'appliedform/view', $form_attr );		
	?>
	<div class="form-group">
    	<label for="formno">Form No.</label>
    	<input type="text" name="formno" class="form-control" id="fomrno" placeholder="form number">
    	<?php echo form_error('formno'); ?>
     </div>
     
     <div class="form-group">
    	<label for="dob">Date of birth</label>
    	<script>
	                    webshims.setOptions('forms-ext', {types: 'date'});
		                    webshims.polyfill('forms forms-ext');
                		</script>
  	<input type="date" name ="dob_v" class="form-control" id="dob">
        
    	<?php echo form_error('dob_v'); ?>
  	</div>
	<input type="submit" value="Submit">
	</form>
     </div>
</div>