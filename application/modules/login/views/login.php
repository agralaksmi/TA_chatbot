<div class="login-box" >
  <div class="login-logo">
    <a href="<?php echo base_url('') ?>"><b>LOGIN</b></a>
  </div>
  <div class="login-box-body">
    <?php if ($this->session->flashdata('failed')): ?>
      <p class="alert alert-danger"><?php echo $this->session->flashdata('failed') ?></p>
    <?php endif; ?>
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo base_url('login/check') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="Username" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>
