
<div class="container createPost">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>/profile">User Profile</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create Post</li>
          </ol>
        </nav>
      </div>
    </div>
	<div class="row">
	    <div class="col-md-12">
	 		<h4 class="mt-3">Create Post</h4>
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
    		<form action="<?php echo base_url()?>/save-post" method="POST">
    		    <div class="form-group mt-3">
    		        <label for="title">Title <span style="color:red">*</span></label>
    		        <input type="text" required class="form-control" name="title" />
    		    </div>
    		    <div class="form-group mt-5">
    		        <label for="description">Description <span style="color:red">*</span></label></label>
    		        <textarea rows="5" required class="form-control" name="description" ></textarea>
    		    </div>
    		  
    		    <div class="form-group mt-5">
    		        <button type="submit" class="btn btn-primary loginBtn">
    		            Create
    		        </button>
    		        <a href="<?php echo base_url()?>/profile"><button type="button" class="btn btn-default">
    		            Cancel
    		        </button></a>
    		    </div>
    		</form>
		</div>
	</div>
</div>