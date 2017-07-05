<div class="container" style="margin-top: 70px;"> 
     <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
        <li><a href="<?php echo site_url('admissionnew'); ?>">Admission Statics</a></li>
        <li class="active">Action</li>
    </ol>
<div class="col-md-8 col-md-offset-2">
        <h2 class="page-header">Rank wise student List : <?php echo $category; ?></h2>
        <ul class="merit-l-ul">
            <?php $i = 1 ?>
            <?php foreach ($d as $rows) : ?>
                <li>
                    <?php
                    $st = $rows['admission_status'];
                    if ($st === "ADM") {
                        $stCl = "act-admitted";
                        $faicon = "fa-check-circle";
                        $pText = 'Admitted: ' . $rows['section'] . '-' . $rows['roll'];
                        $actClass = "disabled";
                    } elseif ($st === "REJ") {
                        $stCl = "act-rejected";
                        $faicon = "fa-ban";
                        $pText = 'Checked and rejected';
                        $actClass = "disabled";
                    } elseif ($st === "ABS") {
                        $stCl = "act-absent";
                        $faicon = "fa-frown-o";
                        $pText = "Absent";
                        $actClass = "disabled";
                    } else {
                        $stCl = "act-no";
                        $faicon = "fa-exclamation-circle";
                        $pText = 'Remains to verify';
                        $actClass = "";
                    }
                    ?>

                    <div class="merit-wrapper">
                        <div class="rank pull-left text-center" style="margin-right: 5px;">
                    <?php echo '<span style="color: #999;">form no.</span><br><span style="font-size: 1.2em;">' . $rows['form_id'] . '</span>' ?>
                        </div>
                        <div class="r-det">
                            <p class="sname" id="std-name-<?php echo $rows['form_id']; ?>"><?php echo $i.") ".$rows['name']; ?></p>
                            <p class="p-dt <?php echo $stCl; ?>" id="act-sts-<?php echo $rows['form_id']; ?>">
                                STATUS : <i class="fa <?php echo $faicon; ?>" id="fa-<?php echo $rows['form_id']; ?>"></i> <span id="stat-<?php echo $rows['form_id']; ?>"> <?php echo $pText; ?></span>
                            </p>
                            <form class="pull-left" method="post" action="<?php echo site_url('appliedform/view'); ?>">
                                <input type="hidden" name="formno" value="<?php echo $rows['form_id']; ?>">
                                <input type="hidden" name="dob_v" value="<?php echo $rows['dob']; ?>">

                               


                                <button type="submit" class="btn btn-primary btn-raised btn-xs" href="#" style="margin-right: 3px;">detail pdf</button>
                            </form>

                            <a class="btn btn-primary btn-raised btn-xs" href="<?php echo site_url('overview/detail/' . $rows['form_id'] . '/' . $rows['dob']); ?>" target="_blank">detail</a>
                            <button type="button" class="btn btn-danger btn-raised btn-xs act-btn-adm <?php echo $actClass; ?>" value="<?php echo $rows['form_id']; ?>" id="<?php echo 'act-btn-' . $rows['form_id']; ?>" data-toggle="modal" data-target="#actionModal">Action</button>

                        </div>

                    </div>
    <?php $i++; ?>
                </li>

                <?php endforeach; ?>
            
        </ul>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="color: darkblue;"></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="hidden" name="fno_holder" value="">
                            <input type="hidden" name="std_name" value="">  
                        </div>
                    </form>
                    <button type="button" class="btn btn-success btn-sm btn-raised adm-btn" data-toggle="modal" data-target="#admissionModal"><span class="glyphicon glyphicon-ok"></span> Verified and admitted</button>
                    <button type="button" class="btn btn-danger btn-sm btn-raised rej-btn" data-toggle="modal" data-target="#rejectModal"><span class="glyphicon glyphicon-trash"></span> Checked and rejected</button>
                    <button type="button" class="btn btn-warning btn-sm btn-raised abs-btn"><span class="glyphicon glyphicon-remove"></span> Absent</button>
                </div>
                <div class="modal-footer">
                    <img src="<?php echo site_url('asset/images/382.gif'); ?>" class="pull-left" id="adm-img-st1">
                    <button type="button" class="btn btn-default btn-raised" data-dismiss="modal">Close</button>                
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="color: red;"></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
  <!--                        <input type="hidden" name="fno_holder" value=""> -->
                            <label for="recipient-name" class="control-label">Please write few words for dropping this form</label>
                            <input type="text" class="form-control" maxlength="50" id="drop-reason">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm btn-raised" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger btn-sm btn-raised" id="drop-btn"><span class="glyphicon glyphicon-trash"></span> Drop it</button>

                </div>
            </div>
        </div>
    </div>

    <!--added later-->
    <div class="modal fade" id="admissionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel1" style="color: red;"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
  <!--                       <input type="hidden" name="fno_holder" value=""> -->

                        <div class="form-group">

                            <label for="section" class="col-md-6 control-label">Section</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control up-case" maxlength="1" id="section" name="section-box">
                            </div>

                        </div>

                        <div class="form-group">

                            <label for="rollno" class="col-md-6 control-label">Roll no.</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" maxlength="50" id="rollno" name="roll-box">
                            </div>

                        </div>

                        

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm btn-sm btn-raised" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success btn-sm btn-sm btn-raised" id="admFinal-btn"><span class="glyphicon glyphicon-education"></span> Submit</button>

                </div>
            </div>
        </div>
    </div>
</div>
