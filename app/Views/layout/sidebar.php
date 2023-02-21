<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>/">Posts</a>
  </li>
  <?php if (!session()->get('isLoggedIn')):?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>/login">Login</a>
  </li>
  <?php endif?>
  <?php if (session()->get('isLoggedIn')):?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?php echo session()->get('name');?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
           <li><a class="dropdown-item" href="<?php echo base_url();?>/profile">Profile</a></li>
           <li><a class="dropdown-item" href="<?php base_url()?>/logout">Logout</a></li>
          </ul>
        </li>
   <?php endif ?>   
</ul>
