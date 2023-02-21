<div class="container" style="background-color: #eee; ">
<div class="userLogin">
<h2 class="mt-2">Login User</h2>
<form action="<?php echo base_url(); ?>/user-login" method="post">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" name="email" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>
    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>
  <!-- 2 column grid layout for inline styling -->
  <button type="submit" class="btn btn-primary btn-block mb-4 loginBtn">Sign in</button>
</form>
<div class="text-center mb-1">
    <p>Not a member? <a href="<?php echo base_url(); ?>/signup">Register</a></p>
  </div>
</div>
</div>