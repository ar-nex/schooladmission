<style>
    body{
        background-color: #eee;
    }
    .form-group .checkbox label, .form-group .radio label, .form-group label{color: black;}
    .form-group{margin: 5px 0 0 0;}

</style>
<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header"><span class="glyphicon glyphicon-edit"></span> Edit Student's data</h1>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            
                <div class="form-group">
                    <label for="formno" class="control-label">Form No.</label>
                    <input type="text" class="form-control" id="formno" required>
                </div>
                <div class="form-group">
                    <label for="category" class="control-label">Category</label>
                    <select class="form-control" id="category" required>
                        <option value="">-select category-</option>
                        <option value="personal">Personal</option>
                        <option value="contact">Address & Contact</option>
                        <option value="lastclass">About Qualifying Exam</option>
                        <option value="xi">Class XI</option>
                        <option value="bank">Bank</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="particular" class="control-label">Particular</label>
                    <select class="form-control" id="particular" required>
                        
                    </select>
                </div>
                
            <button class="btn btn-raised btn-primary" id="btn-edit-get" type="submit">Get</button>
                <img src="<?php echo site_url('asset/images/ajax-loader.gif'); ?>" id="get-loader" class="hideIt">
            
        </div>
        <div class="col-md-6">
            
                <div class="form-group">
                    <label for="oldval" class="control-label">Old Value</label>
                    <input type="text" class="form-control" id="oldval" readonly>
                </div>
                <div class="form-group">
                    <label for="newval" class="control-label">New Value</label>
                    <input type="text" class="form-control" id="newval" style="text-transform: uppercase;">
                </div>
                <ul>
                    <li>Date should be in <strong>YYYY-MM-DD</strong> format</li>
                    <li>For Yes No value : <strong>Yes = Y/1 and No = N/0 </strong> according to old value</li>
                    <li>For Gender : <strong>Male = M and Female = F </strong> format</li>
                    <li>For Religion : <strong>only ISLAM, HINDU, CHRISTIAN, OTHER </strong> as value</li>
                </ul>
                
                <button class="btn btn-raised btn-danger" id="btn-edit-set" type="submit">Update</button>
                <img src="<?php echo site_url('asset/images/ajax-loader.gif'); ?>" id="set-loader" class="hideIt">
           
        </div>
    </div>
</div>