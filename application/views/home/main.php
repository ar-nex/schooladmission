<style>
    body{background-color: #eee;}
</style>
<div class="nmhs-header">
    <h1 class="text-center">Naimouza High School Admission</h1>
</div>
<div class="jumbotron jmb-hm">
    <div class="container mrgtop">
        <h3 class="jmb-bottom">Online application for class XI</h3>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <marquee><h3 style="margin-top: 0px;">Online applying starts on <?php echo date_format(date_create($dt['start_date']), "d-m-Y"); ?>  and closes on <?php echo date_format(date_create($dt['end_date']), "d-m-Y"); ?></h3></marquee>
        </div>
        <div class="col-md-4">
            <a href="<?php echo site_url('appliedform/view'); ?>" class="btn btn-raised btn-success btn-sm"><i class="fa fa-download"></i> Re-download form</a>
           
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
         <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">School Notice</h3>
                </div>
                 <div class="panel-body">
                    <img class="img-responsive" src="<?php echo site_url('asset/images/notice/formfillup.jpg'); ?>">
                </div>
            </div>
            <h2>Form fill up instruction</h2>
            <div class="list-group">
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="material-icons">star</i>
                    </div>
                    <div class="row-content">

                        <h4 class="list-group-item-heading">Only Two Steps.</h4>

                        <p class="list-group-item-text">The whole procedure is divided into two steps. First step is for entering information and second step is for uploading picture of the candidate.</p>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="material-icons">star</i>
                    </div>
                    <div class="row-content">

                        <h4 class="list-group-item-heading">Preview &amp; Re edit</h4>

                        <p class="list-group-item-text">After entering information of the candidate, a preview will be shown. You can edit that from there if there is any wrong entry before final submission.</p>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="material-icons">star</i>
                    </div>
                    <div class="row-content">

                        <h4 class="list-group-item-heading">Image upload</h4>

                        <p class="list-group-item-text">Image should have the format only <b>.jpg or .jpeg or .png </b> &amp; should have size <b>less than 150 KB.</b></p>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="material-icons">star</i>
                    </div>
                    <div class="row-content">

                        <h4 class="list-group-item-heading">Form number</h4>

                        <p class="list-group-item-text">On successful submission, a form number. will be given. Please write down this form number for future reference. This form number might be sent to entered valid mobile number by sms and to the entered valid email address. If it is not in the inbox in your email then please check it in spam folder.</p>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="material-icons">star</i>
                    </div>
                    <div class="row-content">

                        <h4 class="list-group-item-heading">Download the form</h4>

                        <p class="list-group-item-text">After successful submission, you will be prompted to download the generated pdf form. Within valid time period, you can download your form at any time with your form number and date of birth.</p>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item">
                    <div class="row-action-primary">
                        <i class="material-icons">star</i>
                    </div>
                    <div class="row-content">

                        <h4 class="list-group-item-heading">Printout the Form</h4>

                        <p class="list-group-item-text">After printed out the form, the guardian and the candidate have to sign there in the form and at the day of admission candidate have to bring the printed out form along with all relevant original and xerox copies. For merit list, admission date etc. info please keep contact with school.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Minimum percentages</h3>
                </div>
                 <div class="panel-body">
                    <dl>
                        <dt>Internal (passed MP from this school)</dt>
                        <dd>Science : <?php echo $percentage['int_sci'].' %'; ?></dd>
                        <dd>Arts : <?php echo $percentage['int_arts'].' %'; ?></dd>
                        <dd>Arts with Geography : Min. Marks in Geography <?php echo $percentage['int_arts_geo']; ?></dd>
                        
                    </dl>
                    <dl>
                        <dt>External (passed MP from other school)</dt>
                        <dd>Science : <?php echo $percentage['ext_sci'].' %'; ?></dd>
                        <dd>Arts : <?php echo $percentage['ext_arts'].' %'; ?></dd>
                        <dd>Arts with Geography : Min. Marks in Geography <?php echo $percentage['ext_arts_geo']; ?></dd>
                        
                    </dl>
                </div>
            </div>

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Important dates</h3>
                </div>
                <div class="panel-body">
                    <h4 style="margin-bottom: 0px;">Starts on :</h4>
                <span class="date-style" id="startdate"> <?php echo date_format(date_create($dt['start_date']), "d-M-Y"); ?></span>

                <h4 style="margin-bottom: 0px;">Closes on :</h4> 
                <span class="date-style" id="enddate"> <?php echo date_format(date_create($dt['end_date']), "d-M-Y"); ?></span>
                <br>
                </div>
            </div>

            <div class="alert alert-dismissible alert-warning">
                
                <h4>Warning!</h4>

                <p>Any wrong information entered by the candidate may lead to the cancellation of the form.</p>
            </div>
            
            <a href="<?php echo site_url('form'); ?>" class="btn btn-raised btn-primary"><i class="material-icons">description</i> Apply online</a>
        </div>
    </div>
</div>