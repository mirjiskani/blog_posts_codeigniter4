
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>/">Posts</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">Post Detail</a></li>
          </ol>
        </nav>
      </div>
    </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-12">
       
          <h3 class="mt-3">Posts Detail</h3>
            <div class="card mb-4 mt-3 mb-md-0">
              <div class="card-body">
                <span><strong style="color:#0d6efd"> <a href="<?php echo base_url()?>/post-detail/<?php echo $post['postId'];?>" style="text-decoration:none"><?php echo $post['post_title'];?></a></strong></span>
                <p><?php echo $post['postContent'];?></p>
              </div>
            </div>

            <h3 class="mt-3">Comments</h3>
            
            <!-- comments section  -->
                <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-8 col-lg-10">
                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                    <div class="card-body p-4">
                        <div class="form-outline mb-4">
                          <input type="text" id="addANote" class="form-control" placeholder="Type comment..." />
                          <button type="button" style="margin-left:85%; margin-right:0%" class="btn btn-primary mt-3" onclick="postComment(<?php echo $post['postId']?>)">Post Comment</button>
                        </div>
                            <div class="alert alert-warning alert-dismissible" style="display:none">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Failure!</strong><p class="failureMsg"></p>
                            </div>
                            <div class="alert alert-success alert-dismissible"  style="display:none">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Success!</strong> <p class="successMsg"></p>
                            </div>
                        
                        <?php if(count($comments) > 0):?>
                        <?php foreach($comments as $comment):?>  
                        <div class="comment-card">      
                        <div class="card mb-4">
                            <div class="card-body">
                                <p><?php echo $comment['comment']; ?></p>

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25"
                                        height="25" />
                                        <p class="small mb-0 ms-2"><?php echo $comment['first_name'].' '.$comment['last_name']; ?></p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0">Commented On: <?php echo $comment['createdAt']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php endforeach?>
                        <?php else:?>
                            <div class="comment-card">
                                    <h5 class="mt-2  nocomments" style="margin-left:20px;">No Comments found !</h5>
                           </div>
                        <?php endif ?>
                      </div>
                    </div>
                </div>
                </div>
            <!-- end of comments section  -->
            <div class="pagination">
            <?=  $pager->links('default','default_full'); ?>
            </div>
          </div>
        </div>
     </div>
</section>
<script>
 function postComment(postid){
    let logginStatus ="<?php echo session()->get('isLoggedIn');?>";
    if(logginStatus ==="FALSE" || logginStatus ==''){
        window.location.href = '<?php echo base_url();?>/login'
    }
    let userName = "<?php if(session()->get('isLoggedIn'))echo session()->get('name');?>"
    if($('#addANote').val() ==''){
        alert('Please write comment first');
     }else{
        $.ajax({  
            url:"<?php echo base_url(); ?>/postComment",
            type: 'post',
            dataType:'json',
            data:{postId:postid,comment:$('#addANote').val()},
            success:function(data){
                if(data.code==200){
                  $('.alert-success').css({'display':'block'})
                  $('.successMsg').text(data.message)
                  $('.nocomments').css({'display':'none'})
                   var currentdate = new Date();
                   var datetime = currentdate.getFullYear() + "-"+(currentdate.getMonth()+1) 
                    + "-" + currentdate.getDate() + "  " 
                    + currentdate.getHours() + ":" 
                    + currentdate.getMinutes() + ":" + currentdate.getSeconds();
                    let commentContent =`
                              <div class="card  mb-4">
                                <div class="card-body">
                                <p>`+ $('#addANote').val() +`</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25"
                                        height="25" />
                                        <p class="small mb-0 ms-2">`+ userName +`</p>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="small text-muted mb-0">Commented On: `+ datetime +`</p>
                                    </div>
                                </div>
                                </div>
                                </div>`;
                        $('.comment-card').append(commentContent);   
                        $('#addANote').val('')     
                }else{
                    $('.alert-warning').css({'display':'block'})
                    $('.failureMsg').text(data.message)    
                }
            }  
        });//end ajax
    }// end else
   }; // end click function
</script>