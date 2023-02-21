<div class="container" style="background-color: #eee; ">
<div class="userLogin" >
<h2 class="mt-2">Register User</h2>
    <?php if(isset($validation)):?>
    <div class="alert alert-warning">
        <?= $validation->listErrors() ?>
    </div>
    <?php endif;?>
    <?php if(isset($success)): ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> <?php echo $success; ?>.
    </div>
<?php endif; ?>
<form action="<?php echo base_url(); ?>/create-user" method="post">
  <!-- Text input -->
 <div class="form-outline mb-4">
    <input type="text" name="first_name" id="firstName" class="form-control" />
    <label class="form-label" for="form2Example1">First Name</label>
  </div>  

  <div class="form-outline mb-4">
    <input type="text" name="last_name" id="lastName" class="form-control" />
    <label class="form-label" for="form2Example1">Last Name</label>
  </div>  
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" name="email" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="password" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>
  <div class="form-outline mb-4">
    <input type="password" name="confirm_password" id="confirm_password" class="form-control" />
    <label class="form-label" for="form2Example2">Confirm Password</label>
  </div>
  <button type="submit" class="btn btn-primary btn-block mb-4 loginBtn">Sign Up</button>
</form>
<div class="text-center mb-1">
    <p>Already Member? <a href="<?php echo base_url(); ?>/">Sign In</a></p>
</div>
</div>
</div>