
<div class="container-fluid full-hieght" style="margin-top: 75px;">
    <div class="col-md-2 sidebar">
        <aside>
            <ul>
<!--                <li><a href="<?php echo site_url('/duplicate'); ?>"><i class="fa fa-group"></i> &nbsp; Duplicate hunter</a></li>
                <li><a href="<?php echo site_url('/coupon'); ?>"><span class="glyphicon glyphicon-random"></span> &nbsp; Lottery coupons</a></li>
                <li><a href="<?php echo site_url('/lotteryentry'); ?>"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Lottery data entry</a></li>
                <li><a href="<?php echo site_url('/selected'); ?>"><span class="glyphicon glyphicon-check"></span> &nbsp; Selected Students</a></li>-->
                <li><a href="<?php echo site_url('/merit/arts'); ?>" target="_blank"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> &nbsp; Merit list ARTS</a></li>
                <li><a href="<?php echo site_url('/merit/science'); ?>" target="_blank"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i> &nbsp; Merit list SCIENCE</a></li>
              
              <li><a href="<?php echo site_url('/secondphase'); ?>" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></i> &nbsp; Merit list second</a></li>

                <li><a href="<?php echo site_url('/admission'); ?>"><span class="glyphicon glyphicon-list-alt"></span> &nbsp; Admission day</a></li>
                <li><a href="<?php echo site_url('/admissionnew'); ?>"><span class="glyphicon glyphicon-list-alt"></span> &nbsp; Admission new</a></li>
                <li><a href="<?php echo site_url('/edit'); ?>" target="_blank"><span class="glyphicon glyphicon-edit"></span> &nbsp; Edit</a></li>
                <li><a href="<?php echo site_url('/editcombo'); ?>" target="_blank"><i class="fa fa-refresh" aria-hidden="true"></i> &nbsp; Edit Subject Combo</a></li>
                <li><a href="<?php echo site_url('/download'); ?>" target="_blank"><span class="glyphicon glyphicon-list"></span> &nbsp; Stat &AMP; download</a></li>
            </ul>
        </aside>
    </div>
    <div class="col-md-7">
        <div class="strip">
            <div class="strip-inner text-center">
                <h3>Total Applied</h3>
                <input type="hidden" id="h-tot-count" value="<?php echo($tot_applied); ?>">
                <p id="p-tot-count"><?php echo($tot_applied); ?></p>
                <a class="btn btn-raised btn-sm btn-danger" href="<?php echo site_url('overview'); ?>">view</a>
            </div>
            <div class="strip-inner text-center">
                <h3>Valid</h3>
                <?php $valid = $tot_applied - $invalid; ?>
                <input type="hidden" id="h-valid-count" value="<?php echo $valid; ?>">
                <p id="p-valid-count"><?php echo $valid; ?></p>
                <a class="btn btn-raised btn-sm btn-primary" href="<?php echo site_url('overview/valid'); ?>">view</a>
            </div>
            <div class="strip-inner text-center" style="border-right:none;">
                <h3>Rejected</h3>
                <input type="hidden" id="h-invalid-count" value="<?php echo $invalid; ?>">
                <p id="p-invalid-count"><?php echo $invalid; ?></p>
                <a class="btn btn-raised btn-sm btn-primary" href="<?php echo site_url('overview/rejected'); ?>">view</a>
            </div>
        </div>

        <div class="strip">
            <div class="strip-inner text-center">
                
                <h3>Boys</h3>
                <input type="hidden" id="h-boys-count" value="<?php echo $boysCount; ?>">
                <p id="p-boys-count"><?php echo $boysCount; ?></p>
                <a class="btn btn-sm btn-raised btn-success" href="<?php echo site_url('overview/boys'); ?>">view</a>
               
            </div>
            <div class="strip-inner text-center">
                 <h3>Girls</h3>
                 <input type="hidden" id="h-girls-count" value="<?php echo $girlsCount; ?>">
                <p id="p-girls-count"><?php echo $girlsCount; ?></p>
                <a class="btn btn-sm btn-raised btn-success" href="<?php echo site_url('overview/girls'); ?>">view</a>
            </div>
            <div class="strip-inner text-center" style="border-right:none;">
               
                <h3>Internal</h3>
 
                 <input type="hidden" id="h-tot-gender" value="<?php echo $internalCount; ?>">
                <p id="p-tot-gender"><?php echo $internalCount; ?></p>
                <a class="btn btn-sm btn-raised btn-info"  href="<?php echo site_url('overview/internal'); ?>">view</a>
                
               
            </div>
        </div>
        
        <div class="strip">
            <div class="strip-inner text-center">
                <h3>External</h3>
                
                <input type="hidden" id="h-tot-external" value="<?php echo $externalCount; ?>">
                <p id="p-tot-external"><?php echo $externalCount; ?></p>
                <a class="btn btn-sm btn-raised btn-info"  href="<?php echo site_url('overview/external'); ?>">view</a>
            </div>
            <div class="strip-inner text-center">
                <h3>Science</h3>
                <input type="hidden" id="h-science-count" value="<?php echo $sciCount; ?>">
                <p id="p-science-count"><?php echo $sciCount; ?></p>
                <a class="btn btn-sm btn-raised btn-warning" href="<?php echo site_url('overview/science'); ?>">view</a>
            </div>
            <div class="strip-inner text-center" style="border-right:none;">
                <h3>Arts</h3>
                <input type="hidden" id="h-arts-count" value="<?php echo $artCount; ?>">
                <p id="p-arts-count"><?php echo $artCount; ?></p>
                <a class="btn btn-sm btn-raised btn-warning" href="<?php echo site_url('overview/arts'); ?>">view</a>
            </div>
        </div>
        
        <h3 class="page-header">View Students & Subjects</h3>
        <a class="btn btn-primary" href = <?php echo site_url('subject');?>>All</a>
        <a class="btn btn-primary" href = <?php echo site_url('subject/arts');?>>Arts without Geo</a>
        <a class="btn btn-primary" href = <?php echo site_url('subject/geo');?>>Arts with Geo</a>
        <a class="btn btn-primary" href = <?php echo site_url('subject/science');?>>Science</a>
        
        <h3 class="page-header">Daily form fill up statics</h3>
        <div id="chart" style="width: 100%; height: 200px; margin: 0 auto;">

        </div>


    </div>

    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Online applying date</h3>
            </div>
            <div class="panel-body">
                <h4 style="margin-bottom: 0px;">Starts on :</h4>
                <span class="date-style" id="startdate"> <?php echo date_format(date_create($date['start_date']), "d-m-Y"); ?></span>

                <h4 style="margin-bottom: 0px;">Closes on :</h4> 
                <span class="date-style" id="enddate"> <?php echo date_format(date_create($date['end_date']), "d-m-Y"); ?></span>
                <br>
                <button class="btn btn-raised btn-default" data-toggle="modal" data-target="#myModal"><i class="material-icons">swap_vert</i> Update date</button>


                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Change date</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sdate">Starting date: </label>
                                        <input type="date" name="startdate" value="<?php echo date_format(date_create($date['start_date']), "Y-m-d"); ?>" class="form-control" id="sdate">
                                        <script>
                                            webshims.setOptions('forms-ext', {types: 'date'});
                                            webshims.polyfill('forms forms-ext');
                                        </script>
                                    </div>

                                    <div class="form-group">
                                        <label for="edate">Closing date: </label>

                                        <input type="date" name="enddate" value="<?php echo date_format(date_create($date['end_date']), "Y-m-d"); ?>" class="form-control" id="edate">
                                        <script>
                                            webshims.setOptions('forms-ext', {types: 'date'});
                                            webshims.polyfill('forms forms-ext');
                                        </script>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <img id ="loader" class="hideIt" src="<?php echo site_url('asset/images/ajax-loader.gif'); ?>">
                                <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btn-dt-change">Save changes</button>
                                <script>
                                    webshims.setOptions('forms-ext', {types: 'date'});
                                    webshims.polyfill('forms forms-ext');
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!--            modal-->

            </div>
        </div>
        
         <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Minimum percentage</h3>
            </div>
            <div class="panel-body">
                <dl>
                    <dt>Internal</dt>
                    <dd>Science : <span id="ip-s"> <?php echo $percentage['int_sci'].' %'; ?></span></dd>
                    <dd>Arts : <span id="ip-a"> <?php echo $percentage['int_arts']. ' %'; ?></span></dd>
                    <dd>Arts with Geo : <span id="ip-g"> <?php echo $percentage['int_arts_geo'] ?></span></dd>
                    
                </dl>
               <dl>
                    <dt>External</dt>
                    <dd>Science : <span id="ep-s"> <?php echo $percentage['ext_sci']. ' %'; ?></span></dd>
                    <dd>Arts : <span id="ep-a"><?php echo $percentage['ext_arts']. ' %'; ?></span></dd>
                    <dd>Arts with Geo : <span id="ep-g"> <?php echo $percentage['ext_arts_geo'] ?></span></dd>
                    
                </dl>
                <button class="btn btn-raised btn-default" data-toggle="modal" data-target="#perModal"><i class="material-icons">swap_vert</i> Update percentage</button>


                <!-- Modal -->
                <div class="modal fade" id="perModal" tabindex="-1" role="dialog" aria-labelledby="perModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="perModalLabel">Change date</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <form class="form-horizontal">
                                    <h4>For internal students</h4>
                                    <div class="form-group form-group-percentage">
                                        <label for="int_sci" class="col-md-5 control-label">Science (percentage): </label>
                                        <div class="col-md-4">
                                            <input type="number" min="10" max="90" class="form-control" name="int_sci" value="<?php echo $percentage['int_sci']; ?>" class="form-control" id="int_sci">
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="form-group form-group-percentage">
                                        <label for="int_arts" class="col-md-5 control-label">Arts (percentage): </label>
                                        <div class="col-md-4">
                                            <input type="number" min="10" max="90" class="form-control" name="int_arts" value="<?php echo $percentage['int_arts']; ?>" class="form-control" id="int_arts">
                                        </div>
                                    </div>
                                    <div class="form-group form-group-percentage">
                                        <label for="int_arts_geo" class="col-md-5 control-label">Arts with Geo (Marks in Geo): </label>
                                        <div class="col-md-4">
                                            <input type="number" min="10" max="90" class="form-control" name="int_arts_geo" value="<?php echo $percentage['int_arts_geo']; ?>" class="form-control" id="int_arts_geo">
                                        </div>
                                    </div>
                                    <h4>For external students</h4>
                                    <div class="form-group form-group-percentage">
                                        <label for="ext_sci" class="col-md-5 control-label">Science (percentage): </label>
                                        <div class="col-md-4">
                                            <input type="number" min="10" max="90" class="form-control" name="ext_sci" value="<?php echo $percentage['ext_sci']; ?>" class="form-control" id="ext_sci">
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="form-group form-group-percentage">
                                        <label for="ext_arts" class="col-md-5 control-label">Arts (percentage): </label>
                                        <div class="col-md-4">
                                            <input type="number" min="10" max="90" class="form-control" name="ext_arts" value="<?php echo $percentage['ext_arts']; ?>" class="form-control" id="ext_arts">
                                        </div>
                                    </div>
                                    <div class="form-group form-group-percentage">
                                        <label for="ext_arts_geo" class="col-md-5 control-label">Arts with Geo (Marks in Geo): </label>
                                        <div class="col-md-4">
                                            <input type="number" min="10" max="90" class="form-control" name="ext_arts_geo" value="<?php echo $percentage['ext_arts_geo']; ?>" class="form-control" id="ext_arts_geo">
                                        </div>
                                    </div>
                                    </form>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <img id ="loader-pr" class="hideIt" src="<?php echo site_url('asset/images/ajax-loader.gif'); ?>">
                                <button type="button" class="btn btn-default" id="close-pr" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btn-pr-change">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--            modal-->

            </div>
        </div>
    </div>
</div>


