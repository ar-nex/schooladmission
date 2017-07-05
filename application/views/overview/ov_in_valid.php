
<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
        <li class="active">Invalid</li>
    </ol>
    <div class="col-md-10 col-md-offset-1">
        <?php foreach ($d as $rows) : ?>
            <div class="ov-wrapper" id="ov-<?php echo $rows['form_id']; ?>">
                <div class="media" id="id-media">
                    <div class="media-left">
                        <?php
                        if ($rows['is_muted'] == 1) {
                            $src = site_url('asset/images/deleted.jpg');
                        } else {
                            $src = site_url() . 'uploads/nmhs/' . $rows['img_name'];
                        }
                        ?>
                        <img class="media-object" src="<?php echo $src; ?>" alt="student photo">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading <?php if ($rows['is_muted'] == 1) echo "strike"; ?>"><?php echo $rows['name']; ?></h4>
                        <p>Gender : <?php echo $rows['sex']; ?></p>
                        <p class="<?php if ($rows['is_muted'] == 1) echo "strike"; ?>">Form no. : <?php echo $rows['form_id']; ?></p>

                        <?php
                        $form_attr = array(
                            'id' => 'succ-form'
                        );
                        echo form_open('appliedform/view', $form_attr);
                        ?>

                        <input type="hidden" name="formno" value="<?php echo $rows['form_id']; ?>">
                        <input type="hidden" name="dob_v" value="<?php echo $rows['dob']; ?>">
                        <button type="submit" class="btn btn-raised btn-primary <?php //if ($rows['is_muted'] == 1) echo "disabled"; ?>">Download form</button>
                        <a class="btn btn-raised btn-primary <?php //if ($rows['is_muted'] == 1) echo "disabled"; ?>" href="<?php echo site_url('overview/detail/' . $rows['form_id'] . '/' . $rows['dob']); ?>" target="_blank">Show detail</a>


                        </form>


                    </div>
                </div>
                <!--      <div class="ovr-status">
                <?php
                $str = "";
                if ($rows['has_fSubmitted'] == 1) {
                    $str = $str . '<p>Status : Submitted <span class="glyphicon glyphicon-ok fgreen"></span>';
                } else {
                    $str = $str . '<p>Status : Submitted <span class="glyphicon glyphicon-remove fred1"></span>';
                }

                if ($rows['has_fVerified'] == 1) {
                    $str = $str . ' | Verified <span class="glyphicon glyphicon-ok fgreen"></span></p>';
                } else {
                    $str = $str . ' | Verified <span class="glyphicon glyphicon-remove fred1"></span></p>';
                }
                echo $str;
                ?>
                        
                      </div>-->
            </div>
        <?php endforeach; ?>


        

    </div>
</div>