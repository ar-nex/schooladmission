<div class="container" style="margin-top: 70px;">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="personal-heading">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#personal-collapse" aria-expanded="true" aria-control="personal-collapse">
                        Personal Info
                    </a>
                </h4>
            </div>
            <div id="personal-collapse" class="panle-collapse collapse in" role="tab-panel" aria-labelledby="personal-heading">
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left media-middle">

                            <img class="media-object" src="<?php echo site_url() . 'uploads/nmhsxi/' . $fd['img_name']; ?>" alt="...">

                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $fd['name']; ?></h4>
                            <?php
                            if ($fd['is_muted'] == 1) {
                                echo '<h3 style="color: red;">Form rejected</h3>';
                                echo '<h4 style="color: red;">Reason: ' . $fd['mute_remark'] . '</h4>';
                            }
                            ?>
                            <div class="col-md-6">
                                <ul style="padding-left: 3px;">
                                    <li>Father's name : <strong><?php echo $fd['fname'] ?></strong></li>
                                    <li>Mother's name : <strong><?php echo $fd['mname'] ?></strong></li>
                                    <li>Guardian's Name : <strong><?php echo $fd['gname'] ?></strong></li>
                                    <li>Guardian's occupation : <strong><?php echo $fd['guardian_occu']; ?></strong></li>
                                    <li>Date of Birth : <strong><?php echo $fd['dob'] ?></strong></li>
                                    <li>Gender : <strong><?php $fd['sex'] === "M" ? $g = 'Male' : $g = 'Female';
                            echo $g;
                            ?></strong></li>
                                    <li>Citizen : <strong>INDIAN</strong></li>
                                    <li>Religion : <strong><?php echo $fd['religion'] ?></strong></li>
                                    <li>Aadhar No : <strong><?php echo $fd['aadhar_no']; ?></strong></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul style="padding-left: 3px;">
                                    <li>Form No. : <strong><?php echo $fd['form_id']; ?></strong></li>                                   
                                    <li>Category : <strong><?php echo $fd['category']; ?></strong></li>
                                    <li>Is PH : <strong><?php echo $fd['ph_challenged']; ?></strong></li>
                                    <li>PH Detail : <strong><?php echo $fd['ph_type']; ?></strong></li>
                                    <li>Is BPL : <strong><?php echo $fd['is_bpl']; ?></strong></li>
                                    <li>BPL no. : <strong><?php echo $fd['bpl_no']; ?></strong></li>
                                    <li>Guardian's aadhar : <strong><?php echo $fd['guardian_aadhar']; ?></strong></li>
                                    <li>Guardian's epic no. : <strong><?php echo $fd['epic_no']; ?></strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="qlf-heading">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ten-collapse" aria-expanded="false" aria-control="ten-collapse">
                        Qualifying Examination details
                    </a>
                </h4>
            </div>
            <div id="ten-collapse" class="panle-collapse collapse" role="tab-panel" aria-labelledby="qulify-heading">
                <div class="panel-body">
                    <div class="col-md-6">
                        <ul>

                            <li>Last School attended : <strong><?php echo $fd['last_school']; ?></strong></li>
                            <li>Board : <strong><?php echo $fd['last_board']; ?></strong></li>
                            <li>Qualifying exam: <strong><?php echo "Class X (default entry)"; ?></strong></li>

                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>

                            <li>Qualifying Year : <strong><?php echo $fd['passing_yr']; ?></strong></li>
                            <li>Total marks obtained : <strong><?php echo $fd['mark_obt']; ?></strong></li>
                            <li>Full marks : <strong><?php echo $fd['mark_tot']; ?></strong></li>
                            <li>Percentage : <strong><?php echo $fd['percentage']; ?></strong></li>

                        </ul>
                    </div>
                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered">
                                <caption>Marks in MP exam</caption>
                                <thead>
                                    <tr>
                                        <th>Bangla</th>
                                        <th>English</th>
                                        <th>Math</th>
                                        <th>Ph. Sci</th>
                                        <th>Life Sci</th>
                                        <th>Geography</th>
                                        <th>History</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fd['bng']; ?></td>
                                        <td><?php echo $fd['eng']; ?></td>
                                        <td><?php echo $fd['mth']; ?></td>
                                        <td><?php echo $fd['psc']; ?></td>
                                        <td><?php echo $fd['lsc']; ?></td>
                                        <td><?php echo $fd['geo']; ?></td>
                                        <td><?php echo $fd['his']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="subject-combo-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#subject0-combo-collapse" aria-expanded="true" aria-control="bank-collapse">
                            Subject combination for XI <i class="fa fa-sort-desc"></i>
                        </a>
                    </h4>
                </div>
                <div id="subject0-combo-collapse" class="panle-collapse collapse" role="tab-panel" aria-labelledby="subject-combo-heading">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <dl>
                                <dt>Stream :</dt>
                                <dd><?php echo $fd['stream']; ?></dd>
                            </dl>
                            <dl>
                                <dt>Compulsory Subjects</dt>
                                <dd><?php echo $fd['el1']; ?></dd>
                                <dd><?php echo $fd['el2']; ?></dd>
                                <dd><?php echo $fd['el3']; ?></dd>
                                <dt>Additional Subject</dt>
                                <dd><?php echo $fd['adl']; ?></dd>
                            </dl>
                        </div>

                    </div>
                </div>
            </div>




        </div>        
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="addr-heading">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#addr-collapse" aria-expanded="false" aria-control="addr-collapse">
                        Address and Contact
                    </a>
                </h4>
            </div>
            <div id="addr-collapse" class="panle-collapse collapse" role="tab-panel" aria-labelledby="addr-heading">
                <div class="panel-body">
                    <div class="col-md-6">
                        <h4><u>Present Address</u></h4>
                        <ul>
                            <li>Para / House no. : <strong><?php echo $fd['addresslane1a']; ?></strong> </li>
                            <li>Village / Street : <strong><?php echo $fd['addresslane1']; ?></strong> </li>
                            <li>Post Office : <strong><?php echo $fd['addresslane2']; ?></strong> </li>
                            <li>Police Station : <strong><?php echo $fd['ps']; ?></strong> </li>
                            <li>District : <strong><?php echo $fd['dist']; ?></strong> </li>
                            <li>PIN : <strong><?php echo $fd['pin']; ?></strong> </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4><u>Permanent Address</u></h4>
                        <ul>
                            <li>Para / House no. : <strong><?php echo $fd['p_addresslane1a']; ?></strong> </li>
                            <li>Village / Street : <strong><?php echo $fd['p_addresslane1']; ?></strong> </li>
                            <li>Post Office : <strong><?php echo $fd['p_addresslane2']; ?></strong> </li>
                            <li>Police Station : <strong><?php echo $fd['p_ps']; ?></strong> </li>
                            <li>District : <strong><?php echo $fd['p_dist']; ?></strong> </li>
                            <li>PIN : <strong><?php echo $fd['p_pin']; ?></strong> </li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h4>Mobile No. : <strong><?php echo $fd['mobile']; ?></strong></h4>
                        <h4>Email : <strong><?php echo $fd['email']; ?></strong></h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="bank-heading">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#bank-collapse" aria-expanded="false" aria-control="bank-collapse">
                        Bank Account Details
                    </a>
                </h4>
            </div>
            <div id="bank-collapse" class="panle-collapse collapse" role="tab-panel" aria-labelledby="bank-heading">
                <div class="panel-body">
                    <div class="col-md-6">
                        <ul>

                            <li>Bank account no. : <strong><?php echo $fd['bank_account']; ?></strong></li>
                            <li>Bank name : <strong><?php echo $fd['bank_name']; ?></strong></li>

                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>Branch name: <strong><?php echo $fd['bank_branch']; ?></strong></li>
                            <li>Branch IFSC : <strong><?php echo $fd['branch_ifsc']; ?></strong></li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>    



    </div>

    <div class="text-center">
        <a href="#" class="btn btn-raised btn-warning" onclick="close_window()"><span class="glyphicon glyphicon-remove"></span> Close it</a>
    </div>
    <script>
        function close_window() {
            window.close();
        }
    </script>
</div>