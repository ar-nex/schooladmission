
<div class="container" style="margin-top: 70px;">
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
        <li><a href="<?php echo site_url('overview'); ?>">Overview</a></li>
        <?php
        if (!isset($gn)) {
            echo '<li class="active">valid</li>';
        } else if ($gn == 'boys') {
//            $link = site_url('overview/valid');
//            echo '<li><a href="' . $link . '">valid</a></li>';
//            echo '<li class="active">boys</li>';
        } else {
            $link = site_url('overview/valid');
            echo '<li><a href="' . $link . '">valid</a></li>';
            echo '<li class="active">'.$gn.'</li>';
        }
        ?>

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
                            $src = site_url() . 'uploads/nmhsxi/' . $rows['img_name'];
                        }
                        ?>
                        <img class="media-object" src="<?php echo $src; ?>" alt="student photo">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading <?php if ($rows['is_muted'] == 1) echo "strike"; ?>"><?php echo $rows['name']; ?></h4>
     
                        <p class="<?php if ($rows['is_muted'] == 1) echo "strike"; ?>">Form no. : <?php echo $rows['form_id']; ?></p>

                         <?php 
                        $genClass;
                        $genToolTip;
                        if ($rows['sex'] === "M") {
                            $genClass = "fa fa-mars";
                            $genToolTip = "Male";
                        } else if($rows['sex']==="F")
                        {
                            $genClass = "fa fa-venus";
                            $genToolTip = "Female";
                        }
            
                        ?>
                        
                        <?php
                        $typeToolTip;
                        $typeIcon;
                        if ($rows['typ'] === "INTERNAL") {
                            $typeToolTip = "INTERNAL";
                            $typeIcon = "fa fa-dot-circle-o";
                        }
                        else if ($rows['typ']=== "EXTERNAL")
                        {
                            $typeToolTip = "EXTERNAL";
                            $typeIcon = "fa fa-circle-o";
                            
                        }
                        ?>
                        
                        <?php
                        $streamToolTip;
                        $streamIcon;
                        if ($rows['stream'] === "SCIENCE") {
                            $streamToolTip = "SCIENCE";
                            $streamIcon = "fa fa-flask";
                        }
                        else if ($rows['stream']=== "ARTS")
                        {
                            $streamToolTip = "ARTS";
                            $streamIcon = "fa fa-book";
                            
                        }
                        ?>
                        
                        <p class="overview-icon-holder">
                            <i class="<?php echo $genClass; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $genToolTip; ?>"></i>
                            <i class="<?php echo $typeIcon; ?>" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="<?php echo $typeToolTip; ?>"></i>
                            <i class="<?php echo $streamIcon; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $streamToolTip; ?>"></i>

                        </p>
                        
                        
                        <?php
                        $form_attr = array(
                            'id' => 'succ-form'
                        );
                        echo form_open('appliedform/view', $form_attr);
                        ?>

                        <input type="hidden" name="formno" value="<?php echo $rows['form_id']; ?>">
                        <input type="hidden" name="dob_v" value="<?php echo $rows['dob']; ?>">
                        <button type="submit" class="btn btn-sm btn-raised  btn-primary <?php if ($rows['is_muted'] == 1) echo "disabled"; ?>"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download form</button>
                        <a class="btn btn-raised btn-sm btn-primary <?php if ($rows['is_muted'] == 1) echo "disabled"; ?>" href="<?php echo site_url('overview/detail/' . $rows['form_id'] . '/' . $rows['dob']); ?>" target="_blank">Show detail</a>


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


        <nav class="text-center">
            <ul class="pagination">
                <?php
                if ($cPage != 1) {
                    if (isset($gn)) {
                        $link = 'overview/' . $gn . '/';
                    } else {
                        $link = 'overview/valid/';
                    }
                    $firstLink = site_url($link);
                    echo '<li><a href="' . $firstLink . '">First</a></li>';
                }
                if ($cPage > 1 && $cPage <= $tPage) {
                    $lPage = $cPage - 1;
                    if (isset($gn)) {
                        $link = site_url('overview/') . "/" . $gn . "/" . $lPage;
                    } else {
                        $link = site_url('overview/valid/') . "/" . $lPage;
                    }

                    echo '<li><a href="' . $link . '"><< Previous</a></li>';
                }
                if ($cPage < $tPage) {
                    $lPage = $cPage + 1;
                    if (isset($gn)) {
                        $link = site_url('overview/') . "/" . $gn . "/" . $lPage;
                    } else {
                        $link = site_url('overview/valid') . "/" . $lPage;
                    }

                    echo '<li><a href="' . $link . '">Next >></a></li>';
                }
                if ($cPage != $tPage) {
                    if (isset($gn)) {
                        $lparam = 'overview/' . $gn . '/' . $tPage;
                    } else {
                        $lparam = 'overview/valid/' . '/' . $tPage;
                    }

                    $lastLink = site_url($lparam);
                    echo '<li><a href="' . $lastLink . '">Last</a></li>';
                }
                ?>
            </ul>
        </nav>


    </div>
</div>