<style>
    body{
        background-color: #eee;
    }
    .form-group .checkbox label, .form-group .radio label, .form-group label{color: black;}
    .form-group{margin: 5px 0 0 0;}

</style>

<!--
<div class="jumbotron" style="margin-top: -20px; background-color: teal;">
    <div class="container">
        <h1 class="text-center" style="margin-bottom: 0px;">Naimouza High School (H.S.)</h1>
        <div class="text-center">
            <h2 class="jmb-form-class">Application form for class XI</h2>
        </div>
        <h2 class="text-center text-uppercase" style="margin: 0px auto;">Session : 2017</h2>
    </div>
</div>-->

<div class="container">
    <div class="col-md-12">
        <ul style="font-size: 1.5em;">
            <li>Please fill up all the mandatory fields.</li>
            <li>If you did not have Arabic in 10th class then leave it blank.</li>
            <li>Mandatory fields are marked by <span class="mandatory">*</span></li>
        </ul>
        <?php
        if (isset($error_x['invalid_prcnt'])) {
            echo $error_x['invalid_prcnt'];
        }
         if (isset($error_x['invalid_combi'])) {
            echo $error_x['invalid_combi'];
        }
         if (isset($error_x['invalid_addl'])) {
            echo $error_x['invalid_addl'];
        }
        ?>
    </div>
    <div class="col-md-12">
        <p style="background-color: #2c3e50; padding: 6px; display: inline-block; border-radius: 15px; color: white; font-size: 1.2em; border-left: 2px solid black;">Applying multiple times for the same candidate is not allowed. Please <strong>re-check</strong> entered information before submit.</p>
        <?php
        if (isset($unique_msg)) {
            echo '<p class="in-error">' . $unique_msg . '</p>';
        }
        ?>
    </div>


    <div class="col-md-12">
        <h3 class="text-center">Part 1 of 2</h3>
    </div>
    <div class="row">
        <h2 class="page-header header-cst">
            <span class="glyphicon glyphicon-user"></span> Personal info
        </h2>

        <?php
        $form_attr = array(
            'class' => 'form-horizontal',
            'id' => 'main-form'
        );
        echo form_open('form', $form_attr);
        ?>
        <div class="form-group">

            <label for="sts_name" class="col-md-4 control-label" >Name <span class="mandatory">*</span> </label>
            <div class="col-md-2">
                <input type="text" maxlength="13" name="sts_name"
                       value="<?php
                       if (isset($session ['sts_name'])) {
                           echo $session ['sts_name'];
                       } else {
                           echo set_value('sts_name');
                       }
                       ?>"
                       class="form-control pers-name up-case" id="sts_name" placeholder="First name" required>
                       <?php echo form_error('sts_name'); ?>
            </div>
            <div class="col-md-2">
                <input type="text" maxlength="13" name="sts_name2"
                       value="<?php
                       if (isset($session ['sts_name2'])) {
                           echo $session ['sts_name2'];
                       } else {
                           echo set_value('sts_name2');
                       }
                       ?>"
                       class="form-control pers-name up-case" id="sts_name2" placeholder="Middle name">
                       <?php echo form_error('sts_name2'); ?>
            </div>
            <div class="col-md-2">
                <input type="text" maxlength="13" name="sts_name3"
                       value="<?php
                       if (isset($session ['sts_name3'])) {
                           echo $session ['sts_name3'];
                       } else {
                           echo set_value('sts_name3');
                       }
                       ?>"
                       class="form-control pers-name up-case" id="sts_name3" placeholder="Last / Surname">
                       <?php echo form_error('sts_name3'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_fname" class="col-md-4 control-label">Father's name <span class="mandatory">*</span>
            </label>
            <div class="col-md-4">
                <input type="text" maxlength="35" name="sts_fname"
                       value="<?php
                       if (isset($session ['sts_fname'])) {
                           echo $session ['sts_fname'];
                       } else {
                           echo set_value('sts_fname');
                       }
                       ?>"
                       class="form-control pers-name up-case" id="sts_fname" required>
                       <?php echo form_error('sts_fname'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_mname" class="col-md-4 control-label">Mother's name <span class="mandatory">*</span>
            </label>
            <div class="col-md-4">
                <input type="text" maxlength="35" name="sts_mname"
                       value="<?php
                       if (isset($session ['sts_mname'])) {
                           echo $session ['sts_mname'];
                       } else {
                           echo set_value('sts_mname');
                       }
                       ?>"
                       class="form-control pers-name up-case" id="sts_mname" required>
                       <?php echo form_error('sts_mname'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_gname" class="col-md-4 control-label">Guardian's name <span class="mandatory">*</span>
            </label>
            <div class="col-md-3">
                <input type="text" maxlength="35" name="sts_gname"
                       value="<?php
                       if (isset($session ['sts_gname'])) {
                           echo $session ['sts_gname'];
                       } else {
                           echo set_value('sts_gname');
                       }
                       ?>"
                       class="form-control pers-name up-case" id="sts_gname" required>
                       <?php echo form_error('sts_gname'); ?>
            </div>
            <div class="col-md-3">
                <div class="checkbox">
                    <label> <input type="checkbox" name="chk_grdian" id="chk-grdn"> Same as father's name
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="sts_grel" class="col-md-4 control-label">Relation with Guardian <span class="mandatory">*</span>
            </label>
            <div class="col-md-3">
                <input type="text" maxlength="35" name="sts_grel"
                       value="<?php
                       if (isset($session ['sts_grel'])) {
                           echo $session ['sts_grel'];
                       } else {
                           echo set_value('sts_grel');
                       }
                       ?>"
                       class="form-control pers-name up-case" id="sts_grel" required>
                       <?php echo form_error('sts_grel'); ?>
            </div>

        </div>

        <div class="form-group">
            <label for="sts_dob" class="col-md-4 control-label">Date of birth <i class="fa fa-calendar"></i> <span class="mandatory">*</span> </label>

            <div class="col-md-1 cls-dob" style="padding-right: 0px;">
                <select name="dd" class="form-control" required>
                    <option value="">DD</option>
                    <option value="01" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '01')) || (set_value('dd') === '01')) {
                        echo "selected";
                    }
                    ?>>01</option>
                    <option value="02" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '02')) || (set_value('dd') === '02')) {
                        echo "selected";
                    }
                    ?>>02</option>
                    <option value="03" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '03')) || (set_value('dd') === '03')) {
                        echo "selected";
                    }
                    ?>>03</option>
                    <option value="04" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '04')) || (set_value('dd') === '04')) {
                        echo "selected";
                    }
                    ?>>04</option>
                    <option value="05" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '05')) || (set_value('dd') === '05')) {
                        echo "selected";
                    }
                    ?>>05</option>
                    <option value="06" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '06')) || (set_value('dd') === '06')) {
                        echo "selected";
                    }
                    ?>>06</option>
                    <option value="07" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '07')) || (set_value('dd') === '07')) {
                        echo "selected";
                    }
                    ?>>07</option>
                    <option value="08" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '08')) || (set_value('dd') === '08')) {
                        echo "selected";
                    }
                    ?>>08</option>
                    <option value="09" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '09')) || (set_value('dd') === '09')) {
                        echo "selected";
                    }
                    ?>>09</option>
                    <option value="10" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '10')) || (set_value('dd') === '10')) {
                        echo "selected";
                    }
                    ?>>10</option>
                    <option value="11" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '11')) || (set_value('dd') === '11')) {
                        echo "selected";
                    }
                    ?>>11</option>
                    <option value="12" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '12')) || (set_value('dd') === '12')) {
                        echo "selected";
                    }
                    ?>>12</option>
                    <option value="13 <?php
                    if ((isset($session['dd']) && ($session['dd'] === '13')) || (set_value('dd') === '13')) {
                        echo "selected";
                    }
                    ?>">13</option>
                    <option value="14" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '14')) || (set_value('dd') === '14')) {
                        echo "selected";
                    }
                    ?>>14</option>
                    <option value="15" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '15')) || (set_value('dd') === '15')) {
                        echo "selected";
                    }
                    ?>>15</option>
                    <option value="16" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '16')) || (set_value('dd') === '16')) {
                        echo "selected";
                    }
                    ?>>16</option>
                    <option value="17" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '17')) || (set_value('dd') === '17')) {
                        echo "selected";
                    }
                    ?>>17</option>
                    <option value="18" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '18')) || (set_value('dd') === '18')) {
                        echo "selected";
                    }
                    ?>>18</option>
                    <option value="19" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '19')) || (set_value('dd') === '19')) {
                        echo "selected";
                    }
                    ?>>19</option>
                    <option value="20" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '20')) || (set_value('dd') === '20')) {
                        echo "selected";
                    }
                    ?>>20</option>
                    <option value="21" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '21')) || (set_value('dd') === '21')) {
                        echo "selected";
                    }
                    ?>>21</option>
                    <option value="22" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '22')) || (set_value('dd') === '22')) {
                        echo "selected";
                    }
                    ?>>22</option>
                    <option value="23" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '23')) || (set_value('dd') === '23')) {
                        echo "selected";
                    }
                    ?>>23</option>
                    <option value="24" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '24')) || (set_value('dd') === '24')) {
                        echo "selected";
                    }
                    ?>>24</option>
                    <option value="25" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '25')) || (set_value('dd') === '25')) {
                        echo "selected";
                    }
                    ?>>25</option>
                    <option value="26" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '26')) || (set_value('dd') === '26')) {
                        echo "selected";
                    }
                    ?>>26</option>
                    <option value="27" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '27')) || (set_value('dd') === '27')) {
                        echo "selected";
                    }
                    ?>>27</option>
                    <option value="28" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '28')) || (set_value('dd') === '28')) {
                        echo "selected";
                    }
                    ?>>28</option>
                    <option value="29" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '29')) || (set_value('dd') === '29')) {
                        echo "selected";
                    }
                    ?>>29</option>
                    <option value="30" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '30')) || (set_value('dd') === '30')) {
                        echo "selected";
                    }
                    ?>>30</option>
                    <option value="31" <?php
                    if ((isset($session['dd']) && ($session['dd'] === '31')) || (set_value('dd') === '31')) {
                        echo "selected";
                    }
                    ?>>31</option>
                </select>


            </div>


            <div class="col-md-1 cls-dob" style="padding-right: 0px;">
                <select name="mm" class="form-control" id="mm" required>
                    <option value="">MM</option>
                    <option value="01" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '01')) || (set_value('mm') === '01')) {
                        echo "selected";
                    }
                    ?>>Jan</option>
                    <option value="02" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '02')) || (set_value('mm') === '02')) {
                        echo "selected";
                    }
                    ?>>Feb</option>
                    <option value="03" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '03')) || (set_value('mm') === '03')) {
                        echo "selected";
                    }
                    ?>>Mar</option>
                    <option value="04" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '04')) || (set_value('mm') === '04')) {
                        echo "selected";
                    }
                    ?>>Apr</option>
                    <option value="05" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '05')) || (set_value('mm') === '05')) {
                        echo "selected";
                    }
                    ?>>May</option>
                    <option value="06" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '06')) || (set_value('mm') === '06')) {
                        echo "selected";
                    }
                    ?>>June</option>
                    <option value="07" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '07')) || (set_value('mm') === '07')) {
                        echo "selected";
                    }
                    ?>>July</option>
                    <option value="08" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '08')) || (set_value('mm') === '08')) {
                        echo "selected";
                    }
                    ?>>Aug</option>
                    <option value="09" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '09')) || (set_value('mm') === '09')) {
                        echo "selected";
                    }
                    ?>>Sept</option>
                    <option value="10" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '10')) || (set_value('mm') === '10')) {
                        echo "selected";
                    }
                    ?>>Oct</option>
                    <option value="11" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '11')) || (set_value('mm') === '11')) {
                        echo "selected";
                    }
                    ?>>Nov</option>
                    <option value="12" <?php
                    if ((isset($session['mm']) && ($session['mm'] === '12')) || (set_value('mm') === '12')) {
                        echo "selected";
                    }
                    ?>>Dec</option>
                </select>



            </div>

            <div class="col-md-1" style="padding-right: 0px;">
                <select name="yy" class="form-control" required>
                    <option value="">YY</option>

                    <option value="1998" <?php
                    if ((isset($session['yy']) && ($session['yy'] === '1998')) || (set_value('yy') === '1998')) {
                        echo "selected";
                    }
                    ?>>1998</option>
                    <option value="1999" <?php
                    if ((isset($session['yy']) && ($session['yy'] === '1999')) || (set_value('yy') === '1999')) {
                        echo "selected";
                    }
                    ?>>1999</option>
                    <option value="2000" <?php
                    if ((isset($session['yy']) && ($session['yy'] === '2000')) || (set_value('yy') === '2000')) {
                        echo "selected";
                    }
                    ?>>2000</option>


                    <option value="2001" <?php
                    if ((isset($session['yy']) && ($session['yy'] === '2001')) || (set_value('yy') === '2001')) {
                        echo "selected";
                    }
                    ?>>2001</option>

                    <option value="2002" <?php
                    if ((isset($session['yy']) && ($session['yy'] === '2002')) || (set_value('yy') === '2002')) {
                        echo "selected";
                    }
                    ?>>2002</option>

                    <option value="2003" <?php
                    if ((isset($session['yy']) && ($session['yy'] === '2003')) || (set_value('yy') === '2003')) {
                        echo "selected";
                    }
                    ?>>2003</option>

                    <option value="2004" <?php
                    if ((isset($session['yy']) && ($session['yy'] === '2004')) || (set_value('yy') === '2004')) {
                        echo "selected";
                    }
                    ?>>2004</option>

                    <option value="2005" <?php
                    if ((isset($session['yy']) && ($session['yy'] === '2005')) || (set_value('yy') === '2005')) {
                        echo "selected";
                    }
                    ?>>2005</option>
                    <option value="2006" <?php
                    if ((isset($session['yy']) && ($session['yy'] === '2006')) || (set_value('yy') === '2006')) {
                        echo "selected";
                    }
                    ?>>2006</option>
                    
                </select>

            </div>








            <div class="col-md-3">
                <div id="dob-error">

                </div>
                <?php
                if (isset($error_x['dd'])) {
                    echo '<p class="in-error" id="dob-d">' . $error_x['dd'] . '</p>';
                }

                if (isset($error_x['mm'])) {
                    echo '<p class="in-error" id="dob-m">' . $error_x['mm'] . '</p>';
                }

                if (isset($error_x['yy'])) {
                    echo '<p class="in-error" id="dob-y">' . $error_x['yy'] . '</p>';
                }
                ?>
            </div>
        </div>


        <div class="form-group">
            <label for="sts_sex" class="col-md-4 control-label">Gender <span class="mandatory">*</span> </label>

            <div class="col-md-4">
                <!--                <div id="rad-x">-->


                <?php
                $check_male = "";
                $check_female = "";

//                if (isset($session['sts_sex'])) {
//                    if ($session['sts_sex'] === "M") {
//                        $check_female = "";
//                        $check_male = "checked";
//                    } else if ($session['sts_sex'] === "F") {
//                        $check_female = "checked";
//                        $check_male = "";
//                    }
//                } else {
//                    if (set_value('sts_sex') === "M") {
//                        $check_female = "";
//                        $check_male = "checked";
//                    } else if (set_value('sts_sex') === "F") {
//                        $check_female = "checked";
//                        $check_male = "";
//                    }
//                }
                ?>

                <?php
                if (((isset($session['sts_sex']) && ($session['sts_sex'] === "M")) || (set_value('sts_sex') === "M"))) {
                    $check_female = "";
                    $check_male = "checked";
                } else if (((isset($session['sts_sex']) && ($session['sts_sex'] === "F")) || (set_value('sts_sex') === "F"))) {

                    $check_female = "checked";
                    $check_male = "";
                }
                ?>
                <!--                    </div>-->
                <div>

                    <label>
                        <input type="radio" name="sts_sex" id="radioMale" required value="M" <?php echo $check_male; ?>>
                        <i class="fa fa-male"></i> Boy
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="sts_sex" id="radioFemale" value="F" <?php echo $check_female; ?>>
                        <i class="fa fa-female"></i> Girl
                    </label>
                </div>

                <?php
                if (isset($error_x['sts_sex'])) {
                    echo '<p class="in-error">' . $error_x['sts_sex'] . '</p>';
                }
                ?>

            </div>
        </div>


        <div class="form-group">
            <label for="sts_groccu" class="col-md-4 control-label">Guardian's
                occupation: </label>
            <div class="col-md-4">
                <input type="text" maxlength="40" name="sts_groccu"
                       value="<?php
                       if (isset($session ['sts_groccu'])) {
                           echo $session ['sts_groccu'];
                       } else {
                           echo set_value('sts_groccu');
                       }
                       ?>" class="form-control up-case"
                       id="sts_groccu">
                       <?php echo form_error('sts_groccu'); ?>
            </div>
        </div>


        <div class="form-group">
            <label for="sts_ph" class="col-md-4 control-label">Physically challenged <i class="fa fa-wheelchair"></i> <span class="mandatory">*</span> </label>
            <div class="col-md-4">
                <?php
                $check_yes = "";
                $check_no = "";

                if (isset($session['sts_ph'])) {
                    if ($session['sts_ph'] === "Y") {
                        $check_no = "";
                        $check_yes = "checked";
                    } else {
                        $check_no = "checked";
                        $check_yes = "";
                    }
                } else {
                    if (set_value('sts_ph') === "Y") {
                        $check_no = "";
                        $check_yes = "checked";
                    } else {
                        $check_no = "checked";
                        $check_yes = "";
                    }
                }
                ?>
                <!--                <div id="rad-ph">
                                   
                                </div>-->


                <div>

                    <label>
                        <input type="radio" name="sts_ph" id="radioPhYes" value="Y" required <?php echo $check_yes; ?>>
                        Yes
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="sts_ph" id="radioPhNo" value="N" <?php echo $check_no; ?>>
                        No
                    </label>
                </div>
                <?php
                if (isset($error_x['sts_ph'])) {
                    echo '<p class="in-error">' . $error_x['sts_ph'] . '</p>';
                }
                ?>
            </div>
        </div>

        <fieldset id="field-ph-type">
            <div class="form-group">
                <label class="col-md-4 control-label">If physically challenged then
                    mention type</label>
                <div class="col-md-4">
                    <input type="text" maxlength="40" name="ph_type"
                           value="<?php
                           if (isset($session ['ph_type'])) {
                               echo $session ['ph_type'];
                           } else {
                               echo set_value('ph_type');
                           }
                           ?>"
                           class="form-control up-case">
                </div>
            </div>
        </fieldset>

        <div class="form-group">
            <label for="sts_cat" class="col-md-4 control-label">Social category <span class="mandatory">*</span></label>
            <div class="col-md-4">
                <select name="sts_cat" class="form-control" required>
                    <option value="">Please Select</option>
                    <option value="General" <?php
                    if ((isset($session['sts_cat']) && ($session['sts_cat'] === 'General')) || (set_value('sts_cat') === 'General')) {
                        echo "selected";
                    }
                    ?>>General</option>
                    <option value="SC" <?php
                    if ((isset($session['sts_cat']) && ($session['sts_cat'] === 'SC')) || (set_value('sts_cat') === 'SC')) {
                        echo "selected";
                    }
                    ?>>SC</option>
                    <option value="ST" <?php
                    if ((isset($session['sts_cat']) && ($session['sts_cat'] === 'ST')) || (set_value('sts_cat') === 'ST')) {
                        echo "selected";
                    }
                    ?>>ST</option>
                    <option value="OBC-A" <?php
                    if ((isset($session['sts_cat']) && ($session['sts_cat'] === 'OBC-A')) || (set_value('sts_cat') === 'OBC-A')) {
                        echo "selected";
                    }
                    ?>>OBC-A</option>
                    <option value="OBC-B" <?php
                    if ((isset($session['sts_cat']) && ($session['sts_cat'] === 'OBC-B')) || (set_value('sts_cat') === 'OBC-B')) {
                        echo "selected";
                    }
                    ?>>OBC-B</option>

                </select>

                <?php
                if (isset($error_x['sts_cat'])) {
                    echo '<p class="in-error">' . $error_x['sts_cat'] . '</p>';
                }
                ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_bpl" class="col-md-4 control-label">Is BPL <span class="mandatory">*</span> </label>
            <div class="col-md-4">
                <?php
                $check_bpl_yes = "";
                $check_bpl_no = "";

                if (isset($session['sts_bpl'])) {
                    if ($session['sts_bpl'] === "Y") {
                        $check_bpl_no = "";
                        $check_bpl_yes = "checked";
                    } else {
                        $check_bpl_no = "checked";
                        $check_bpl_yes = "";
                    }
                } else {
                    if (set_value('sts_bpl') === "Y") {
                        $check_bpl_no = "";
                        $check_bpl_yes = "checked";
                    } else {
                        $check_bpl_no = "checked";
                        $check_bpl_yes = "";
                    }
                }
                ?>
                <!--                <div id="rad-bpl">

                                </div>-->
                <div>

                    <label>
                        <input type="radio" name="sts_bpl" id="radioPhYes" value="Y" required <?php echo $check_bpl_yes; ?>>
                        Yes
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="sts_bpl" id="radioPhNo" value="N" <?php echo $check_bpl_no; ?>>
                        No
                    </label>
                </div>
                <?php
                if (isset($error_x['sts_bpl'])) {
                    echo '<p class="in-error">' . $error_x['sts_bpl'] . '</p>';
                }
                ?>
            </div>
        </div>
        <fieldset id="field-bpl-no">
            <div class="form-group">
                <label class="col-md-4 control-label">BPL no.</label>
                <div class="col-md-4">
                    <input type="text" maxlength="20" name="sts_bpl_no"
                           value="<?php
                           if (isset($session ['sts_bpl_no'])) {
                               echo $session ['sts_bpl_no'];
                           } else {
                               echo set_value('sts_bpl_no');
                           }
                           ?>"
                           class="form-control up-case">
                </div>
            </div>
        </fieldset>

        <div class="form-group">
            <label for="sts_religion" class="col-md-4 control-label">Religion <span class="mandatory">*</span></label>
            <div class="col-md-2">
                <select name="sts_religion" class="form-control" required>
                    <option value="">Please Select</option>
                    <option value="ISLAM" <?php
                    if ((isset($session['sts_religion']) && ($session['sts_religion'] === 'ISLAM')) || (set_value('sts_religion') === 'ISLAM')) {
                        echo "selected";
                    }
                    ?>>Islam</option>
                    <option value="HINDU" <?php
                    if ((isset($session['sts_religion']) && ($session['sts_religion'] === 'HINDU')) || (set_value('sts_religion') === 'HINDU')) {
                        echo "selected";
                    }
                    ?>>Hindu</option>
                    <option value="CHRISTIAN" <?php
                    if ((isset($session['sts_religion']) && ($session['sts_religion'] === 'CHRISTIAN')) || (set_value('sts_religion') === 'CHRISTIAN')) {
                        echo "selected";
                    }
                    ?>>Christian</option>
                    <option value="OTHER" <?php
                    if ((isset($session['sts_religion']) && ($session['sts_religion'] === 'OTHER')) || (set_value('sts_religion') === 'OTHER')) {
                        echo "selected";
                    }
                    ?>>Other</option>
                </select>

                <?php
                if (isset($error_x['sts_religion'])) {
                    echo '<p class="in-error">' . $error_x['sts_religion'] . '</p>';
                }
                ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Citizen</label>
            <div class="col-md-2">
                <input type="text" maxlength="20" name="sts_citizen"
                       value="INDIAN" readonly
                       class="form-control up-case">
            </div>
        </div>




        <div class="form-group">
            <label class="col-md-4 control-label">Student's aadhar card no.</label>
            <div class="col-md-4">
                <input type="text" maxlength="12" placeholder="12 digit no. without space or dash" name="sts_adhr"
                       value="<?php
                       if (isset($session ['sts_adhr'])) {
                           echo $session ['sts_adhr'];
                       } else {
                           echo set_value('sts_adhr');
                       }
                       ?>"
                       class="form-control">

                <input type="hidden" id="unique-aadhar" value="1">
            </div>
            <input type="hidden" id="unique-aadhar" value="1">
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label">Guardian's aadhar card no.</label>
            <div class="col-md-4">
                <input type="text" maxlength="12" placeholder="12 digit no. without space or dash" name="grd_adhr"
                       value="<?php
                       if (isset($session ['grd_adhr'])) {
                           echo $session ['grd_adhr'];
                       } else {
                           echo set_value('grd_adhr');
                       }
                       ?>"
                       class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Guardian's epic (voter card) no.</label>
            <div class="col-md-4">
                <input type="text" maxlength="20" name="grd_epic"
                       value="<?php
                       if (isset($session ['grd_epic'])) {
                           echo $session ['grd_epic'];
                       } else {
                           echo set_value('grd_epic');
                       }
                       ?>"
                       class="form-control">
            </div>
        </div>

        <div class="col-md-12">
            <h2 class="page-header header-cst">
                <i class="fa fa-home"></i> Address &
                Contact info
            </h2>
            <div class="col-md-6">
                <h3 class="text-center">
                    <span class="label label-success">Present Address</span>
                </h3>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-6">
                        <label>
                            &nbsp;
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sts_add1_a" class="col-md-6 control-label">Para or House no. </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="sts_add1_a"
                               value="<?php
                               if (isset($session ['sts_add1_a'])) {
                                   echo $session ['sts_add1_a'];
                               } else {
                                   echo set_value('sts_add1_a');
                               }
                               ?>"
                               class="form-control addrs up-case" id="sts_add1_a"
                               placeholder="Para or house no.">
                               <?php echo form_error('sts_add1_a'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sts_add1" class="col-md-6 control-label">Vill. or Street <span class="mandatory">*</span> </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="sts_add1"
                               value="<?php
                               if (isset($session ['sts_add1'])) {
                                   echo $session ['sts_add1'];
                               } else {
                                   echo set_value('sts_add1');
                               }
                               ?>"
                               class="form-control addrs up-case" id="sts_add1" required
                               placeholder="Village or street name" list="vill_list">
                        <datalist id="vill_list">
                            <option value="Bakharpur"></option>
                            <option value="Bamongram"></option>
                            <option value="Chamagram"></option>
                            <option value="Chaspara"></option>
                            <option value="Goyeshbari"></option>
                            <option value="Harugram"></option>
                            <option value="Jalalpur"></option>
                            <option value="Mosimpur"></option>
                            <option value="Nazirpur"></option>
                            <option value="Paharpur"></option>
                            <option value="Sujapur"></option>
                        </datalist>
                        <?php echo form_error('sts_add1'); ?>
                    </div>
                </div>



                <div class="form-group">
                    <label for="sts_add2" class="col-md-6 control-label">Post office <span class="mandatory">*</span> </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="sts_add2" required
                               value="<?php
                               if (isset($session ['sts_add2'])) {
                                   echo $session ['sts_add2'];
                               } else {
                                   echo set_value('sts_add2');
                               }
                               ?>"
                               class="form-control addrs up-case" id="sts_add1" placeholder="Post office" list="post-list">
                        <datalist id="post-list">
                            <option value="Bakharpur"></option>
                            <option value="Baluachara"></option>
                            <option value="Bamongram"></option>
                            <option value="Chaspara"></option>
                            <option value="Chhoto Sujapur"></option>
                            <option value="Fatehkhani"></option>
                            <option value="Gayeshbari"></option>
                            <option value="Jalalpur"></option>
                            <option value="Jamirghata Sarkarpara"></option>
                            <option value="Madhugaht Filature Estate"></option>
                            <option value="Mosimpur"></option>
                            <option value="Sherpur"></option>
                            <option value="Sujapur"></option>
                        </datalist>
                        <?php echo form_error('sts_add2'); ?>
                    </div>
                </div>



                <div class="form-group">
                    <label for="sts_ps" class="col-md-6 control-label">Police station <span class="mandatory">*</span> </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="sts_ps" required
                               value="<?php
                               if (isset($session ['sts_ps'])) {
                                   echo $session ['sts_ps'];
                               } else {
                                   echo set_value('sts_ps');
                               }
                               ?>"
                               class="form-control addrs up-case" id="sts_ps" list="ps-list">
                        <datalist id="ps-list">
                            <option value="Kaliachak"></option>
                        </datalist>
                        <?php echo form_error('sts_ps'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sts_dist" class="col-md-6 control-label">District <span class="mandatory">*</span> </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="sts_dist"
                               value="<?php
                               if (isset($session ['sts_dist'])) {
                                   echo $session ['sts_dist'];
                               } else {
                                   echo set_value('sts_dist');
                               }
                               ?>"
                               class="form-control addrs up-case" required id="sts_dist" list="dist_list">
                        <datalist id="dist_list">
                            <option value="Malda"></option>
                        </datalist>
                        <?php echo form_error('sts_dist'); ?>
                    </div>
                </div>





                <div class="form-group">
                    <label for="sts_pin" class="col-md-6 control-label">PIN <span class="mandatory">*</span> </label>
                    <div class="col-md-4">
                        <input type="text" name="sts_pin" maxlength="6" pattern="^[1-9][0-9]{5}$"
                               value="<?php
                               if (isset($session ['sts_pin'])) {
                                   echo $session ['sts_pin'];
                               } else {
                                   echo set_value('sts_pin');
                               }
                               ?>" class="form-control up-case"
                               id="sts_pin" required placeholder="Exactly 6 digit no" list="pin-list">
                        <datalist id="pin-list">
                            <option value="732206"></option>
                        </datalist>
                        <?php echo form_error('sts_pin'); ?>
                    </div>
                </div>
            </div>
            <h3 class="text-center">
                <span class="label label-success">Permanent Address</span> 

            </h3>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-6">
                        <label>
                            <input type="checkbox" name="chk_prmnt_addr" id="chk-prm"> Same as present address
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <label for="sts_add1_a" class="col-md-6 control-label">Para or House no. </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="prm_add1_a"
                               value="<?php
                               if (isset($session ['prm_add1_a'])) {
                                   echo $session ['prm_add1_a'];
                               } else {
                                   echo set_value('prm_add1_a');
                               }
                               ?>"
                               class="form-control addrs up-case" id="prm_add1_a"
                               placeholder="Para or house no.">
                               <?php echo form_error('prm_add1_a'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <label for="sts_add1" class="col-md-6 control-label">Vill. or Street <span class="mandatory">*</span> </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="prm_add1"
                               value="<?php
                               if (isset($session ['prm_add1'])) {
                                   echo $session ['prm_add1'];
                               } else {
                                   echo set_value('prm_add1');
                               }
                               ?>"
                               class="form-control addrs up-case" id="prm_add1" required
                               placeholder="Village or street name">
                               <?php echo form_error('prm_add1'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sts_add2" class="col-md-6 control-label">Post office <span class="mandatory">*</span> </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="prm_add2"
                               value="<?php
                               if (isset($session ['prm_add2'])) {
                                   echo $session ['prm_add2'];
                               } else {
                                   echo set_value('prm_add2');
                               }
                               ?>"
                               class="form-control addrs up-case" required id="prm_add1" placeholder="Post office">
                               <?php echo form_error('prm_add2'); ?>
                    </div>
                </div>



                <div class="form-group">
                    <label for="sts_ps" class="col-md-6 control-label">Police station <span class="mandatory">*</span> </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="prm_ps"
                               value="<?php
                               if (isset($session ['prm_ps'])) {
                                   echo $session ['prm_ps'];
                               } else {
                                   echo set_value('prm_ps');
                               }
                               ?>"
                               class="form-control addrs up-case" id="prm_ps" required>
                               <?php echo form_error('prm_ps'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sts_dist" class="col-md-6 control-label">District <span class="mandatory">*</span> </label>
                    <div class="col-md-6">
                        <input type="text" maxlength="35" name="prm_dist"
                               value="<?php
                               if (isset($session ['prm_dist'])) {
                                   echo $session ['prm_dist'];
                               } else {
                                   echo set_value('prm_dist');
                               }
                               ?>"
                               class="form-control addrs up-case" id="prm_dist" required>
                               <?php echo form_error('prm_dist'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sts_pin" class="col-md-6 control-label">PIN <span class="mandatory">*</span> </label>
                    <div class="col-md-4">
                        <input type="text" name="prm_pin" maxlength="6" pattern="^[1-9][0-9]{5}$"
                               value="<?php
                               if (isset($session ['prm_pin'])) {
                                   echo $session ['prm_pin'];
                               } else {
                                   echo set_value('prm_pin');
                               }
                               ?>" class="form-control"
                               id="sts_pin" placeholder="Exactly 6 digit no" required>
                               <?php echo form_error('prm_pin'); ?>
                    </div>
                </div>

            </div>
        </div>
        <!--    col 12-->


        <h3>
            <span class="label label-success">Contact info</span>
        </h3>



        <div class="form-group">
            <label for="sts_mobile" class="col-md-4 control-label">Guardian's mobile number <i class="fa fa-mobile"></i> <span class="mandatory">*</span> </label>
            <div class="col-md-3">
                <div class="input-group">
                    <span class="input-group-addon">+91</span> <input type="tel" required
                                                                      name="sts_mobile" maxlength="10"
                                                                      value="<?php
                                                                      if (isset($session ['sts_mobile'])) {
                                                                          echo $session ['sts_mobile'];
                                                                      } else {
                                                                          echo set_value('sts_mobile');
                                                                      }
                                                                      ?>"
                                                                      class="form-control" id="sts_mobile"
                                                                      placeholder="Exactly 10 digit valid no">
                                                                      <?php echo form_error('sts_mobile'); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_email" class="col-md-4 control-label">Email </label>
            <div class="col-md-4">
                <input type="email" maxlength="70" name="sts_email"
                       value="<?php
                       if (isset($session ['sts_email'])) {
                           echo $session ['sts_email'];
                       } else {
                           echo set_value('sts_email');
                       }
                       ?>" class="form-control"
                       id="sts_email" placeholder="Enter valid email id">
                       <?php echo form_error('sts_email'); ?>
            </div>
        </div>
        <h2 class="page-header header-cst">
            <span class="glyphicon glyphicon-education"></span> Academic info
        </h2>
        <h3>
            <span class="label label-success">About class X</span>
        </h3>

        <div class="form-group">
            <label for="sts_school" class="col-md-4 control-label">Last school's name <span class="mandatory">*</span>
            </label>
            <div class="col-md-4">
                <input type="text" maxlength="82" name="sts_school" required
                       value="<?php
                       if (isset($session ['sts_school'])) {
                           echo $session ['sts_school'];
                       } else {
                           echo set_value('sts_school');
                       }
                       ?>" class="form-control up-case"
                       id="sts_school" placeholder="School from where passed class IV" list="school-list">
                <datalist id="school-list">
                    <option value="NAIMOUZA HIGH SCHOOL"></option>
                    <option value="NAIMOUZA SUBHANIA HIGH MADRASAH"></option>
                    <option value="BAMONGRAM H.M.A.M. HIGH SCHOOL"></option>
                    <option value="SUJAPUR HIGH SCHOOL"></option>
                </datalist>
                <?php echo form_error('sts_school'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_type" class="col-md-4 control-label">Type <span class="mandatory">*</span> </label>
            <div class="col-md-4">
                <?php
                $check_internal = "";
                $check_external = "";

                if (isset($session['sts_type'])) {
                    if ($session['sts_type'] === "INTERNAL") {
                        $check_external = "";
                        $check_internal = "checked";
                    } else {
                        $check_external = "checked";
                        $check_internal = "";
                    }
                } else {
                    if (set_value('sts_type') === "INTERNAL") {
                        $check_external = "";
                        $check_internal = "checked";
                    } else {
                        $check_external = "checked";
                        $check_internal = "";
                    }
                }
                ?>
                <!--                <div id="rad-bpl">

                                </div>-->
                <div>

                    <label>
                        <input type="radio" name="sts_type" id="radioInternal" value="INTERNAL" <?php echo $check_internal; ?>>
                        Internal <small>(passed MP exam from this school)</small>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="sts_type" id="radioExternal" value="EXTERNAL" <?php echo $check_external; ?>>
                        External <small>(passed MP exam from other school)</small>
                    </label>
                </div>
                <?php
                if (isset($error_x['sts_type'])) {
                    echo '<p class="in-error">' . $error_x['sts_type'] . '</p>';
                }
                ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_board" class="col-md-4 control-label">Board name <span class="mandatory">*</span>
            </label>
            <div class="col-md-4">
                <input type="text" maxlength="82" name="sts_board" required
                       value="<?php
                       if (isset($session ['sts_board'])) {
                           echo $session ['sts_board'];
                       } else {
                           echo set_value('sts_board');
                       }
                       ?>" class="form-control up-case"
                       id="sts_board" placeholder="Board under which passed Xth exam" list="board-list">
                <datalist id="board-list">
                    <option value="WBBSE"></option>
                    <option value="WBBME"></option>
                </datalist>
                <?php echo form_error('sts_board'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_psyear" class="col-md-4 control-label">Year of
                passing <span class="mandatory">*</span> </label>
            <div class="col-md-2">
                <input type="number" name="sts_psyear"
                       value="<?php
                       if (isset($session ['sts_psyear'])) {
                           echo $session ['sts_psyear'];
                       } else {
                           echo set_value('sts_psyear');
                       }
                       ?>" class="form-control"
                       id="sts_psyear" min="2016" max="2017" required>
                       <?php echo form_error('sts_psyear'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_psyear" class="col-md-4 control-label">Marks obtained at MP exam <span class="mandatory">*</span> </label>
            <div class="col-md-2">
                <div class="input-group">
                    <span class="input-group-addon">BNG</span> 
                    <input type="number" name="bng" 
                           value="<?php
                           if (isset($session ['bng'])) {
                               echo $session ['bng'];
                           } else {
                               echo set_value('bng');
                           }
                           ?>" 
                           min="10" max="100" required
                           class="form-control sb-mark">
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group">
                    <span class="input-group-addon">ENG</span> 
                    <input type="number" name="eng" 
                           value="<?php
                           if (isset($session ['eng'])) {
                               echo $session ['eng'];
                           } else {
                               echo set_value('eng');
                           }
                           ?>" 
                           min="10" max="100" required
                           class="form-control sb-mark">
                </div>
            </div>

            <div class="col-md-2">
                <div class="input-group">
                    <span class="input-group-addon">MATH</span> 
                    <input type="number" name="mth" 
                           value="<?php
                           if (isset($session ['mth'])) {
                               echo $session ['mth'];
                           } else {
                               echo set_value('mth');
                           }
                           ?>" 
                           min="10" max="100" required
                           class="form-control sb-mark">
                </div>
            </div>

            <div class="col-md-2">
                <div class="input-group">
                    <span class="input-group-addon">PSC</span> 
                    <input type="number" name="psc"
                           value="<?php
                           if (isset($session ['psc'])) {
                               echo $session ['psc'];
                           } else {
                               echo set_value('psc');
                           }
                           ?>" 
                           min="10" max="100" required
                           class="form-control sb-mark">
                </div>
            </div>
        </div>
        <div class="form-group">
            <!-- 				<label class="col-md-4 control-label"></label> -->

            <div class="col-md-2 col-md-offset-4">
                <div class="input-group">
                    <span class="input-group-addon">LSC</span> 
                    <input type="number" name="lsc" 
                           value="<?php
                           if (isset($session ['lsc'])) {
                               echo $session ['lsc'];
                           } else {
                               echo set_value('lsc');
                           }
                           ?>" 
                           min="10" max="100" required
                           class="form-control sb-mark">
                </div>
            </div>

           

            <div class="col-md-2">
                <div class="input-group">
                    <span class="input-group-addon">HST</span> 
                    <input type="number" name="hst" 
                           value="<?php
                           if (isset($session ['hst'])) {
                               echo $session ['hst'];
                           } else {
                               echo set_value('hst');
                           }
                           ?>" 
                           min="10" max="100" required
                           class="form-control sb-mark">
                </div>
            </div>

             <div class="col-md-2">
                <div class="input-group">
                    <span class="input-group-addon">GEO</span> 
                    <input type="number" name="geo" 
                           value="<?php
                           if (isset($session ['geo'])) {
                               echo $session ['geo'];
                           } else {
                               echo set_value('geo');
                           }
                           ?>" 
                           min="10" max="100" required
                           class="form-control sb-mark">
                </div>
            </div>

            <div class="col-md-2">
                <div class="input-group">
                    <span class="input-group-addon">ARB</span> 
                    <input type="number" name="arb" 
                           value="<?php
                           if (isset($session ['arb'])) {
                               echo $session ['arb'];
                           } else {
                               echo set_value('arb');
                           }
                           ?>" 
                           min="10" max="100"
                           class="form-control sb-mark">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Total marks obtained <span class="mandatory">*</span></label>
            <div class="col-md-2">
                <input type="number" name="tot_obt" required
                       value="<?php
                       if (isset($session ['tot_obt'])) {
                           echo $session ['tot_obt'];
                       } else {
                           echo set_value('tot_obt');
                       }
                       ?>"
                       class="form-control tb-mark">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Full marks <span class="mandatory">*</span></label>
            <div class="col-md-2">
                <input type="number" name="tot"
                       value="<?php
                       if (isset($session ['tot'])) {
                           echo $session ['tot'];
                       } else {
                           echo set_value('tot');
                       }
                       ?>" min="400" max="1500" step="10" required
                       class="form-control tb-mark">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Percentage of marks <span class="mandatory">*</span></label>
            <div class="col-md-2">
                <div class="input-group">

                    <input type="text" name="prcnt" readonly required
                           value="<?php
                           if (isset($session ['prcnt'])) {
                               echo $session ['prcnt'];
                           } else {
                               echo set_value('prcnt');
                           }
                           ?>"
                           class="form-control tb-mark"> <span
                           class="input-group-addon">%</span>

                </div>

            </div>
            <div class="col-md-6">
                <input type="hidden" name="hid_art_pr" value="<?php echo $ceilPer['int_arts']; ?>">
                <input type="hidden" name="hid_sci_pr" value="<?php echo $ceilPer['int_sci']; ?>">
                <input type="hidden" name="hid_artG_pr" value="<?php echo $ceilPer['int_arts_geo']; ?>">
                <input type="hidden" name="hid_xart_pr" value="<?php echo $ceilPer['ext_arts']; ?>">
                <input type="hidden" name="hid_xsci_pr" value="<?php echo $ceilPer['ext_sci']; ?>">
                <input type="hidden" name="hid_xartG_pr" value="<?php echo $ceilPer['ext_arts_geo']; ?>">
            </div>
        </div>

        <h3>
            <span class="label label-danger">For class XI</span>
        </h3>
        <div class="form-group">
            <label class="col-md-4 control-label">Stream for class XI <span class="mandatory">*</span></label>
            <div class="col-md-3">
                <select name="stream" class="form-control sb-select" required>
                    <option value="">Please select</option>
                    <option value="SCIENCE" >Science</option>
                    <option value="ARTS" >Arts</option>
                </select>

            </div>
        </div>

        <fieldset id="field-science">
            <div class="form-group">
                <label class="col-md-4 control-label">Choose 3 compulsory elective
                    subjects <span class="mandatory">*</span></label>
                <div class="col-md-2">
                    <select name="el1" class="form-control sb-select" id="el-1" required>
                        <option value="">Elective 1</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="el2" class="form-control sb-select" id="el-2" required>
                        <option value="">Elective 2</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="el3" class="form-control sb-select" id="el-3" required>
                        <option value="">Elective 3</option>
                    </select>
                </div>


            </div>
            <div class="col-md-offset-4">
            </div>



            <div class="form-group">
                <label class="col-md-4 control-label">Choose additional subject</label>
                <div class="col-md-2">
                    <select name="adl" class="form-control" id="adl">
                        <option value="">Additional</option>
                    </select>
                </div>
            </div>

        </fieldset>

        <fieldset id="field-arts"></fieldset>




        <h2 class="page-header header-cst">
            <i class="fa fa-bank"></i> Bank details
        </h2>


        <div class="form-group">
            <label for="sts_school" class="col-md-4 control-label">Student's bank a/c no.
            </label>
            <div class="col-md-3">
                <input type="text" maxlength="15" name="sts_acc"
                       value="<?php
                       if (isset($session ['sts_acc'])) {
                           echo $session ['sts_acc'];
                       } else {
                           echo set_value('sts_acc');
                       }
                       ?>" class="form-control up-case"
                       id="sts_acc">
                       <?php echo form_error('sts_acc'); ?>
            </div>
            <input type="hidden" value="1" id="unique-acc">
        </div>

        <div class="form-group">
            <label for="sts_school" class="col-md-4 control-label">Bank name
            </label>
            <div class="col-md-4">
                <input type="text" maxlength="40" name="sts_bank"
                       value="<?php
                       if (isset($session ['sts_bank'])) {
                           echo $session ['sts_bank'];
                       } else {
                           echo set_value('sts_bank');
                       }
                       ?>" class="form-control up-case"
                       id="sts_bank">
                       <?php echo form_error('sts_bank'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_school" class="col-md-4 control-label">Bank branch's name
            </label>
            <div class="col-md-4">
                <input type="text" maxlength="40" name="sts_bank_branch"
                       value="<?php
                       if (isset($session ['sts_bank_branch'])) {
                           echo $session ['sts_bank_branch'];
                       } else {
                           echo set_value('sts_bank_branch');
                       }
                       ?>" class="form-control up-case"
                       id="sts_bank_branch">
                       <?php echo form_error('sts_bank_branch'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="sts_school" class="col-md-4 control-label">Bank branch's IFSC code 
            </label>
            <div class="col-md-3">
                <input type="text" maxlength="15" name="sts_ifsc"
                       value="<?php
                       if (isset($session ['sts_ifsc'])) {
                           echo $session ['sts_ifsc'];
                       } else {
                           echo set_value('sts_ifsc');
                       }
                       ?>" class="form-control up-case"
                       id="sts_ifsc">
                       <?php echo form_error('sts_ifsc'); ?>
            </div>
        </div>

     


        <hr style=" border: 0; border-bottom: 1px dashed #ccc; background: #999;">
        <div class="form-group">
            <label class="col-md-4 control-label">Declaration <span class="mandatory">*</span></label>
            <div class="col-md-6">
                <div class="checkbox" id="declr">
                    <label style="text-align: left"> <input type="checkbox" name="chk_declr" required>The particulars given above are correct and we shall abide by the rules and regulations of the school and board.
                    </label>
                </div>
                <?php
                if (isset($error_x['chk_declr'])) {
                    echo '<p class="in-error">' . $error_x['chk_declr'] . '</p>';
                }
                ?>
            </div>
        </div>

        <div class="form-group">


            <div class="col-md-offset-4 col-md-8">
                <div id="cap-img">
                    <?php
                    echo $captcha['image'];
                    ?>

                    <button type="button" class="btn btn-primary btn-xs"
                            id="btn-cap-reload">
                        <span class="glyphicon glyphicon-refresh" id="span-cap-reload"></span> Reload captcha
                    </button>
                </div>

            </div>
            <label class="col-md-4 control-label">Enter text shown in the image <span class="mandatory">*</span></label>
            <div class="col-md-3">
                <input type="text" name="ascap" class="form-control" id="ascap" required
                       placeholder="Text are case sensitive">
                       <?php echo form_error('ascap'); ?>
                       <?php
                       if (isset($error_x['invalid_captcha'])) {
                           echo '<p class="in-error">' . $error_x['invalid_captcha'] . '</p>';
                       }
                       ?>
            </div>
        </div>
        <div class="col-md-offset-4" style="padding-left: 10px;">
            <button type="button" class="btn btn-raised btn-info" data-toggle="modal" data-target="#myModal1" id="btn-preview">
                <i class="fa fa-eye"></i> Preview
            </button>
            <button type="submit" class="btn btn-raised btn-primary" id="main-submit" disabled>submit</button>
        </div>

        <div class="col-md-offset-4">
            <h4 class="less60-msg"></h4>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Preview</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="personal-heading">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#personal-collapse" aria-expanded="true" aria-control="personal-collapse">
                                            Personal Info <i class="fa fa-sort-desc"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="personal-collapse" class="panle-collapse collapse in" role="tab-panel" aria-labelledby="personal-heading">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <ul style="padding-left: 3px;">
                                                <li>Name : <strong id="m-name"></strong></li>
                                                <li>Date of Birth : <strong id="m-dob"></strong></li>
                                                <li>Gender : <strong id="m-sex"></strong></li>

                                                <li>Is PH : <strong id="m-isph"></strong></li>
                                                <li>PH Detail : <strong id="m-phdetail"></strong></li>
                                                <li>Social category : <strong id="m-cat"></strong></li>
                                                <li>Religion : <strong id="m-religion"></strong></li>
                                                <li>Citizen : <strong>INDIAN</strong></li>
                                                <li>Is BPL : <strong id="m-isbpl"></strong></li>
                                                <li>BPL No: <strong id="m-bplno"></strong></li>
                                                <li>Student's Aadhaar No : <strong id="m-aadhar"></strong></li>                                             
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="parents-heading">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#parents-collapse" aria-expanded="true" aria-control="personal-collapse">
                                            Parents Info <i class="fa fa-sort-desc"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="parents-collapse" class="panle-collapse collapse" role="tab-panel" aria-labelledby="parents-heading">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <ul style="padding-left: 3px;">

                                                <li>Father's name : <strong id="m-fname"></strong></li>
                                                <li>Mother's name : <strong id="m-mname"></strong></li>
                                                <li>Guardian's Name : <strong id="m-gname"></strong></li>
                                                <li>Relation with Guardian : <strong id="m-grel"></strong></li>
                                                <li>Guardian's occupation : <strong id="m-goccu"></strong></li>                    
                                                <li>Guardian's Aadaahr No : <strong id="m-aadhar-grd"></strong></li>
                                                <li>Epic (Voter) No : <strong id="m-epic"></strong></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="addr-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#addr-collapse" aria-expanded="false" aria-control="addr-collapse">
                                            Address and Contact <i class="fa fa-sort-desc"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="addr-collapse" class="panle-collapse collapse" role="tab-panel" aria-labelledby="addr-heading">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <h4><u>Present Address</u></h4>
                                            <ul>
                                                <li>Para / House no. : <strong id="m-addr1a"></strong> </li>
                                                <li>Village / Street : <strong id="m-addr1"></strong> </li>
                                                <li>Post Office : <strong id="m-addr2"></strong> </li>
                                                <li>Police Station : <strong id="m-ps"></strong> </li>
                                                <li>District : <strong id="m-dist"></strong> </li>
                                                <li>PIN : <strong id="m-pin"></strong> </li>
                                            </ul>
                                            <h4><u>Permanent Address</u></h4>
                                            <ul>
                                                <li>Para / House no. : <strong id="mp-addr1a"></strong> </li>
                                                <li>Village / Street : <strong id="mp-addr1"></strong> </li>
                                                <li>Post Office : <strong id="mp-addr2"></strong> </li>
                                                <li>Police Station : <strong id="mp-ps"></strong> </li>
                                                <li>District : <strong id="mp-dist"></strong> </li>
                                                <li>PIN : <strong id="mp-pin"></strong> </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Mobile No. : <strong id="m-mobile"></strong></h4>
                                            <h4>Email : <strong id="m-email"></strong></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="bank-heading">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#bank-collapse" aria-expanded="true" aria-control="bank-collapse">
                                            Student's bank account <i class="fa fa-sort-desc"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="bank-collapse" class="panle-collapse collapse" role="tab-panel" aria-labelledby="bank-heading">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <ul style="padding-left: 3px;">
                                                <li>Account no. : <strong id="m-account"></strong></li>
                                                <li>Bank name : <strong id="m-mbank"></strong></li>
                                                <li>Branch name : <strong id="m-branch"></strong></li>
                                                <li>Branch IFSC code : <strong id="m-ifsc"></strong></li>

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>





                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="qlf-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ten-collapse" aria-expanded="false" aria-control="ten-collapse">
                                            Qualifying Examination & declaration <i class="fa fa-sort-desc"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="ten-collapse" class="panle-collapse collapse" role="tab-panel" aria-labelledby="qulify-heading">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <ul>
                                                <li>Last School attended : <strong id="m-lschool"></strong></li>
                                                <li>Candidate type : <strong id="m-cand-type"></strong></li>
                                                <li>Qualifying Year : <strong id="m-pyear"></strong></li>
                                                <li>Board Name : <string id="m-board"></string></li>
                                                <li>Total marks obtained : <strong id="m-tot-obtained"></strong></li>
                                                <li>Full marks : <strong id="m-full-mark"></strong></li>
                                                <li>Percentage : <strong id="m-percn"></strong></li>

                                            </ul>
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
                                                            <td id="m-bng"></td>
                                                            <td id="m-eng"></td>
                                                            <td id="m-mth"></td>
                                                            <td id="m-psc"></td>
                                                            <td id="m-lsc"></td>
                                                            <td id="m-geo"></td>
                                                            <td id="m-his"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-primary">
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
                                                <dd id="m-stream"></dd>
                                            </dl>
                                            <dl>
                                                <dt>Compulsory Subjects</dt>
                                                <dd id="m-compl1"></dd>
                                                <dd id="m-compl2"></dd>
                                                <dd id="m-compl3"></dd>
                                                <dt>Additional Subject</dt>
                                                <dd id="m-adl"></dd>
                                            </dl>
                                            <dl>
                                                <dt>Declaration</dt>
                                                <dd><strong id="m-declare"></strong></dd>
                                            </dl>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div> <!--  id  accordion-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default hideIt" data-dismiss="modal" id="btn-dismiss"><i class="fa fa-pencil-square-o"></i> Edit again</button>
                        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal" id="btn-edit"><i class="fa fa-pencil-square-o"></i> Edit again</button>
<!--                        <button type="button" id="modal-ok" class="btn btn-success"><i class="fa fa-send"></i> Submit</button>-->
                        <button type="button" id="modal-ok1" class="btn btn-raised btn-success"><i class="fa fa-check-square-o"></i> Everything Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!--modal-->
        </form>
    </div>
    <!--    row of form-->




</div>