<style>
    body{background-color: antiquewhite;}    
</style>
<div class="container">
    <h2 class="text-center" style="color: #599914;">Congratulation <?php echo $applicantName?>!</h2>
    <div class="text-center">
        <img class="img-circle" src="<?php echo site_url('uploads/nmhsxi/').'/'.$form['photo']; ?>">
    </div>
    <p style="font-size: 125%;" class="text-center">You have successfully applied for admission in class XI at Naimouza High School.</p>
    <h4 style="color: red;">Please Note:</h4>
    <ul style="font-size: 110%;">
        <li>Your form number is <strong><?php echo $form['id']?></strong>. Please write it down.</li>
        <li>Click on the "download form" button to get your filled form.</li>
        <li>You may get confirmation sms on entered mobile or email on your entered email id.</li>
        <li>Applying for admission is not mean getting admission. For admission please keep yourself informed about school's notifications.</li>
        <li>If you get selected for admission then please bring the followings into the school on the day of admission.
            <ol>
                
            </ol>
        </li>
    </ul>
</div>




<div class="text-center">
    <?php
			$form_attr = array (
			
			'id' => 'succ-form' 
			);
			echo form_open ( 'appliedform/view', $form_attr );
		?>

		<input type="hidden" name="formno" value="<?php echo $form['id']; ?>">
		<input type="hidden" name="dob_v" value="<?php echo $form['dob']; ?>">
                <button style="margin: 20;" type="submit" class="btn btn-raised btn-primary btn-lg"><span class="glyphicon glyphicon-download-alt"></span> Download form</button>
                <a class="btn btn-raised btn-default" style="margin: 20" href="<?php echo site_url(); ?>">Home page</a>
		</form>
</div>



