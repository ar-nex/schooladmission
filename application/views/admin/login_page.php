<div class="container">
    <?php
    $form_attr = array('class' => 'form-horizontal', 'id' => 'login-form');
    echo form_open('admin/login', $form_attr);
    ?>
  <fieldset>
    <legend>Admin login</legend>
    <div class="form-group">
      <label for="inputUserName" class="col-md-2 control-label">User name</label>

      <div class="col-md-6">
          <input type="text" name="userid" class="form-control" id="inputUserName" placeholder="User name" autofocus required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-md-2 control-label">Password</label>

      <div class="col-md-6">
          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
      </div>
    </div>
  
    <div class="form-group">
      <div class="col-md-6 col-md-offset-2">
          <?php
          if (isset($failed_msg)) {
              echo '<p class="in-error">' . $failed_msg . '</p>';
          }
          ?>
        <button type="submit" class="btn btn-raised btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
<!--</form>-->
</div>