<style>
    body{
        background-color: #eee;
    }
    .form-group .checkbox label, .form-group .radio label, .form-group label{color: black;}
    .form-group{margin: 5px 0 0 0;}

</style>
<div class="container"style="margin-top: 70px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header"><span class="glyphicon glyphicon-edit"></span> Update Subject Combo</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Old Subjects</h3>
            <div class="form-group">
                <label for="formno" class="control-label">Form No.</label>
                <input type="number" class="form-control" id="formno" required>
            </div>
            <button class="btn btn-raised btn-primary" id="btn-editcombo-get" type="submit">Get</button>
            <img src="<?php echo site_url('asset/images/ajax-loader.gif'); ?>" id="get-loader" class="hideIt">
            <dl>
                <dt>Stream</dt>
                <dd id="dd-stream"> </dd>
            </dl>
            <h4>compulsory subjects </h4>
            <ul id="comp-sub">
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <h4>Additional Subject</h4>
            <ul id="adl-sub">
                <li></li>
            </ul>
        </div>
        <div class="col-md-6">
            <h3>New Subjects</h3>
           
            <div class="form-group">
                <label for="el-1" class="control-label">Sub 1</label>
                <select class="form-control" id="el-1">
                    <option value="">-please select-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="el-2" class="control-label">Sub 2</label>
                <select class="form-control" id="el-2">
                    <option value="">-please select-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="el-3" class="control-label">Sub 3</label>
                <select class="form-control" id="el-3">
                    <option value="">-please select-</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="adl" class="control-label">Adl</label>
                <select class="form-control" id="adl">
                    <option value="">-please select-</option>
                </select>
            </div>
            <button class="btn btn-raised btn-danger" id="btn-update-combo">Update</button>
            <img src="<?php echo site_url('asset/images/ajax-loader.gif'); ?>" id="update-loader" class="hideIt">
        </div>
    </div>
</div>