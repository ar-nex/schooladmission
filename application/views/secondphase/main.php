<div class="container" style="margin-top: 70px;"> 
    <h3 class="page-header">Generate 2nd phase merit list for arts stream</h3>
    <p>The number of remaining candidates in second list is <strong><?php echo $count; ?>.</strong> Please enter the number equal to or less than that number.</p>
    <?php
    $form_attr = array(
        'class' => 'form-inline',
        'id' => 'main-form'
    );
    echo form_open('secondphase/merit', $form_attr);
    ?>

    <div class="form-group">
        <label for="exampleInputName2">Number of students for second phase merit list</label>
        <input type="number" class="form-control" id="exampleInputName2" name ="merit-count" required max="<?php echo $count; ?>">
    </div>
    <button type="submit" class="btn btn-primary btn-raised">Generate</button>
</form>
</div>
