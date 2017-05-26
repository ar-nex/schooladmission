<style>
    body{background-color: antiquewhite;}    
</style>
<div class="container">
    <h1 class="text-center" style="text-decoration: underline;">Photo upload</h1>
    <h3 class="text-center">Part 2 of 2</h3>
    <p style="font-size: 125%;" class="text-center">Please select a photo of the student for uploading. Please Note:</p>
    <ul style="font-size: 110%; list-style: none;" class="text-center">
        <li><span class="text-danger glyphicon glyphicon-hand-right"></span> Photo should <strong>not be greater than 150 KB.</strong><span class="glyphicon" id="msg-size"></span></li>
        <li><span class="text-danger glyphicon glyphicon-hand-right"></span> Photo should have<strong> .jpg, .jpeg or .png format.</strong><span class="glyphicon" id="msg-format"></span></li>
    </ul>
    <div class="text-center">
       <?php echo $error;?>
		<?php 
		$form_attr = array (
				'id' => 'form-pic' 
		);
		echo form_open_multipart('form/photo', $form_attr);?>
       
            <script>
                 function previewFile(){var e=document.querySelector("#std-photo"),r=document.querySelector("input[type=file]").files[0],n=new FileReader;n.onloadend=function(){e.src=n.result},r?n.readAsDataURL(r):e.src=""}
            </script>
            <label class="btn btn-raised btn-primary btn-lg btn-file" id="button-container">
                <i class="fa fa-file-photo-o"></i> Select a photo<input type="file" name="userfile" accept="image/*" onchange="previewFile()" style="display: none;">
            </label>
            <div id="img-holder-toggle" class="hideIt">
                <img src="" height="150" alt="image preview" id="std-photo" class="img-gray">
                <br>
                <button type="submit" class="btn btn-raised btn-primary btn-lg" id="btn-upload"><i class="fa fa-upload"></i> upload</button>
                <br>
                <img src="<?php echo site_url('asset/images/ajax-loader.gif'); ?>" class="hideIt" id="sending-gif">
            </div>
        </form>
    </div>

</div>

<script>
</script>