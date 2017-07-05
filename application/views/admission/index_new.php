<div class="container" style="margin-top: 60px;">
    <h2 class="page-header">Admission statics</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th colspan="2" rowspan="2">Phase</th>

                    <th colspan="2" style="text-align:center;">Arts without Geo</th>

                    <th colspan="2" style="text-align:center;">Arts with Geo</th>

                    <th colspan="2" style="text-align:center;">Science</th>
                </tr>
                <tr>
                    <th>Boys</th>
                    <th>Girls</th>
                    <th>Boys</th>
                    <th>Girls</th>
                    <th>Boys</th>
                    <th>Girls</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">Phase 1</td> 
                    <td>Total applied</td>
                    <td><?php echo $tot_applied['art_b'] ?></td>
                    <td><?php echo $tot_applied['art_g'] ?></td>
                    <td><?php echo $tot_applied['geo_b'] ?></td>
                    <td><?php echo $tot_applied['geo_g'] ?></td>
                    <td><?php echo $tot_applied['sci_b'] ?></td>
                    <td><?php echo $tot_applied['sci_g'] ?></td>
                    <?php 
                    $dis_art_b = ($tot_applied['art_b'] == 0) ? "disabled" : "";
                    $dis_geo_b = ($tot_applied['geo_b'] == 0) ? "disabled" : "";
                    $dis_sci_b = ($tot_applied['sci_b'] == 0) ? "disabled" : "";
                    $dis_art_g = ($tot_applied['art_g'] == 0) ? "disabled" : "";
                    $dis_geo_g = ($tot_applied['geo_g'] == 0) ? "disabled" : "";
                    $dis_sci_g = ($tot_applied['sci_g'] == 0) ? "disabled" : "";
                    ?>
                </tr>
                <tr>
                    <td>Total admitted</td>
                    <td><?php echo $tot_admitted['art_b'] ?></td>
                    <td><?php echo $tot_admitted['art_g'] ?></td>
                    <td><?php echo $tot_admitted['geo_b'] ?></td>
                    <td><?php echo $tot_admitted['geo_g'] ?></td>
                    <td><?php echo $tot_admitted['sci_b'] ?></td>
                    <td><?php echo $tot_admitted['sci_g'] ?></td>
                </tr>
                <tr>
                    <td>Action</td>
                    <td><a href="<?php echo site_url('admissionnew/action/art/b'); ?>" class="btn btn-danger btn-sm btn-raised <?php echo $dis_art_b; ?>">action page</a> <a href="<?php echo site_url('admissionnew/view/art/b'); ?>" class="btn btn-success btn-sm btn-raised <?php echo $dis_art_b; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admissionnew/action/art/g'); ?>" class="btn btn-danger btn-sm btn-raised <?php echo $dis_art_g; ?>">action page</a> <a href="<?php echo site_url('admissionnew/view/art/g'); ?>" class="btn btn-success btn-sm btn-raised <?php echo $dis_art_g; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admissionnew/action/geo/b'); ?>" class="btn btn-danger btn-sm btn-raised <?php echo $dis_geo_b; ?>">action page</a> <a href="<?php echo site_url('admissionnew/view/geo/b'); ?>" class="btn btn-success btn-sm btn-raised <?php echo $dis_geo_b; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admissionnew/action/geo/g'); ?>" class="btn btn-danger btn-sm btn-raised <?php echo $dis_geo_g; ?>">action page</a> <a href="<?php echo site_url('admissionnew/view/geo/g'); ?>" class="btn btn-success btn-sm btn-raised <?php echo $dis_geo_g; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admissionnew/action/sci/b'); ?>" class="btn btn-danger btn-sm btn-raised <?php echo $dis_sci_b; ?>">action page</a> <a href="<?php echo site_url('admissionnew/view/sci/b'); ?>" class="btn btn-success btn-sm btn-raised <?php echo $dis_sci_b; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admissionnew/action/sci/g'); ?>" class="btn btn-danger btn-sm btn-raised <?php echo $dis_sci_g; ?>">action page</a> <a href="<?php echo site_url('admissionnew/view/sci/g'); ?>" class="btn btn-success btn-sm btn-raised <?php echo $dis_sci_g; ?>">view</a></td>

                </tr>
                <tr>
                    <td rowspan="3">Phase 2</td> 
                    <td>Total applied</td>
                </tr>
                <tr>
                    <td>Total admitted</td>
                </tr>
                <tr>
                    <td>Action</td>
                </tr>
            </tbody>
<!--            <tbody>
                <tr>
                    <td rowspan="3">Phase 1</td>
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
                    <td><?php echo $tot_applied['art_ext'] + $tot_applied['art_int']; ?></td>
                    <td><?php echo $tot_applied['geo_ext'] + $tot_applied['geo_int']; ?></td>
                    <td><?php echo $tot_applied['sci_ext'] + $tot_applied['sci_int']; ?></td>
            <?php
            $dis_art_comb = (($tot_applied['art_ext'] + $tot_applied['art_int']) == 0) ? "disabled" : "";
            $dis_geo_comb = (($tot_applied['geo_ext'] + $tot_applied['geo_int']) == 0) ? "disabled" : "";
            $dis_sci_comb = (($tot_applied['sci_ext'] + $tot_applied['sci_int']) == 0) ? "disabled" : "";
            ?>
                </tr>
                <tr>
                    <td>Total admitted</td>
                    <td><?php echo $tot_admitted['art_ext'] + $tot_admitted['art_int']; ?></td>
                    <td><?php echo $tot_admitted['geo_ext'] + $tot_admitted['geo_int']; ?></td>
                    <td><?php echo $tot_admitted['sci_ext'] + $tot_admitted['sci_int']; ?></td>
                </tr>
                <tr>
                    <td>Action</td>
                    <td><a href="<?php echo site_url('admission/action/combined/art'); ?>" class="btn btn-danger btn-raised <?php echo $dis_art_comb; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/combined/art'); ?>" class="btn btn-success btn-raised <?php echo $dis_art_comb; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admission/action/combined/geo'); ?>" class="btn btn-danger btn-raised <?php echo $dis_geo_comb; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/combined/geo'); ?>" class="btn btn-success btn-raised <?php echo $dis_geo_comb; ?>">view</a></td>
                    <td><a href="<?php echo site_url('admission/action/combined/sci'); ?>" class="btn btn-danger btn-raised <?php echo $dis_sci_comb; ?>">Go to action page</a> <a href="<?php echo site_url('admission/view/combined/sci'); ?>" class="btn btn-success btn-raised <?php echo $dis_sci_comb; ?>">view</a></td>
                </tr>
            </tbody>-->
        </table>
    </div>
</div>