<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>/">Posts</a></li>
          </ol>
        </nav>
      </div>
    </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-12">
          <a href="<?php echo base_url()?>/create-post"><button type="button" class="btn btn-primary">Create Post</button> </a>
       
         <h3 class="mt-3">Posts Listing</h3>
            <?php foreach($posts as $post):?>
            <div class="card mb-4 mt-3 mb-md-0">
              <div class="card-body">
                <span><strong style="color:#0d6efd"> <a href="<?php echo base_url()?>/post-detail/<?php echo $post['postId'];?>" style="text-decoration:none"><?php echo $post['post_title'];?></a></strong></span>
                <p><?php echo $post['postContent'];?></p>
                 <div style="margin-left:60%;">   
                   <div  class="notifications"> 
                   <a href="<?php echo base_url()?>/post-detail/<?php echo $post['postId'];?>" style="text-decoration:none"><img src="<?php echo base_url()?>/icons/icons8-comments-25.png" alt=""><span class="num">4</span></a></img>
                   </div> 
                   
                   <span style="color:#0d6efd;margin-left: 34px;">Posted on: <?php echo($post['createdAt']);?></span>
                 </div>
            </div>
            </div>
             <?php endforeach ?>
            <div class="pagination">
            <?=  $pager->links('default','default_full'); ?>
            </div>
          </div>
        </div>
     </div>
</section>