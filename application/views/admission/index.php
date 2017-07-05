<div class="container" style="margin-top: 60px;">
    <h2 class="page-header">Admission statics</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th colspan="2">Category</th>
                    
                    <th>Arts without Geo</th>
                    <th>Arts with Geo</th>
                    <th>Science</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">Internal</td>
                    <td>Total applied</td>
                    <td><?php echo $tot_applied['art_int']; ?></td>
                    <td><?php echo $tot_applied['geo_int']; ?></td>
                    <td><?php echo $tot_applied['sci_int']; ?></td>
                    <?php 
                    $dis_art_int = ($tot_applied['art_int'] == 0) ? "disabled" : "";
                    $dis_geo_int = ($tot_applied['geo_int'] == 0) ? "disabled" : "";
                    $dis_sci_int = ($tot_applied['sci_int'] == 0) ? "disabled" : "";
                    ?>
                </tr>
                <tr>
                    <td>Total admitted</td>
                    <td><?php echo $tot_admitted['art_int']; ?></td>
                    <td><?php echo $tot_admitted['geo_int']; ?></td>
                    <td><?php echo $tot_admitted['sci_int']; ?></td>
                    
                </tr>
                <tr>
                    <td>Action</td>
                    <td><a href="<?php echo site_url('admission/action/internal/art'); ?>" class="btn btn-danger btn-raised <?php echo $dis_art_int; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/internal/art'); ?>" class="btn btn-success btn-raised <?php echo $dis_art_int; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admission/action/internal/geo'); ?>" class="btn btn-danger btn-raised <?php echo $dis_geo_int; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/internal/geo'); ?>" class="btn btn-success btn-raised <?php echo $dis_geo_int; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admission/action/internal/sci'); ?>" class="btn btn-danger btn-raised <?php echo $dis_sci_int; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/internal/sci'); ?>" class="btn btn-success btn-raised <?php echo $dis_sci_int; ?>">view</a></td>
                </tr>
                <tr>
                    <td rowspan="3">External</td>
                    <td>Total applied</td>
                    <td><?php echo $tot_applied['art_ext']; ?></td>
                    <td><?php echo $tot_applied['geo_ext']; ?></td>
                    <td><?php echo $tot_applied['sci_ext']; ?></td>
                    <?php 
                    $dis_art_ext = ($tot_applied['art_ext'] == 0) ? "disabled" : "";
                    $dis_geo_ext = ($tot_applied['geo_ext'] == 0) ? "disabled" : "";
                    $dis_sci_ext = ($tot_applied['sci_ext'] == 0) ? "disabled" : "";
                    ?>
                </tr>
                <tr>
                    <td>Total admitted</td>
                    <td><?php echo $tot_admitted['art_ext']; ?></td>
                    <td><?php echo $tot_admitted['geo_ext']; ?></td>
                    <td><?php echo $tot_admitted['sci_ext']; ?></td>
                </tr>
                <tr>
                    <td>Action</td>
                    <td><a href="<?php echo site_url('admission/action/external/art'); ?>" class="btn btn-danger btn-raised <?php echo $dis_art_ext; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/external/art'); ?>" class="btn btn-success btn-raised <?php echo $dis_art_ext; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admission/action/external/geo'); ?>" class="btn btn-danger btn-raised <?php echo $dis_geo_ext; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/external/geo'); ?>" class="btn btn-success btn-raised <?php echo $dis_geo_ext; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admission/action/external/sci'); ?>" class="btn btn-danger btn-raised <?php echo $dis_sci_ext; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/external/sci'); ?>" class="btn btn-success btn-raised <?php echo $dis_sci_ext; ?>">view</a></td>
                </tr>
                 <tr>
                    <td rowspan="3">Combined</td>
                    <td>Total applied</td>
                    <td><?php echo $tot_applied['art_ext']+$tot_applied['art_int']; ?></td>
                    <td><?php echo $tot_applied['geo_ext']+$tot_applied['geo_int']; ?></td>
                    <td><?php echo $tot_applied['sci_ext']+$tot_applied['sci_int']; ?></td>
                    <?php 
                    $dis_art_comb = (($tot_applied['art_ext'] + $tot_applied['art_int']) == 0) ? "disabled" : "";
                    $dis_geo_comb = (($tot_applied['geo_ext'] + $tot_applied['geo_int']) == 0) ? "disabled" : "";
                    $dis_sci_comb = (($tot_applied['sci_ext'] + $tot_applied['sci_int']) == 0) ? "disabled" : "";
                    ?>
                </tr>
                <tr>
                    <td>Total admitted</td>
                    <td><?php echo $tot_admitted['art_ext']+$tot_admitted['art_int']; ?></td>
                    <td><?php echo $tot_admitted['geo_ext']+$tot_admitted['geo_int']; ?></td>
                    <td><?php echo $tot_admitted['sci_ext']+$tot_admitted['sci_int']; ?></td>
                </tr>
                <tr>
                    <td>Action</td>
                    <td><a href="<?php echo site_url('admission/action/combined/art'); ?>" class="btn btn-danger btn-raised <?php echo $dis_art_comb; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/combined/art'); ?>" class="btn btn-success btn-raised <?php echo $dis_art_comb; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admission/action/combined/geo'); ?>" class="btn btn-danger btn-raised <?php echo $dis_geo_comb; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/combined/geo'); ?>" class="btn btn-success btn-raised <?php echo $dis_geo_comb; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admission/action/combined/sci'); ?>" class="btn btn-danger btn-raised <?php echo $dis_sci_comb; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/combined/sci'); ?>" class="btn btn-success btn-raised <?php echo $dis_sci_comb; ?>">view</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>