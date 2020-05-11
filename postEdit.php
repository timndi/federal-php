<?php include("app/includes/adminHeader.php"); ?>
<?php
// include(ROOT_PATH . "/app/controllers/users.php");
 include(ROOT_PATH . "/app/controllers/postController.php");
 adminOnly();
 ?>

<div class="admin-wrapper">

    <div class="left-sidebar">
      <?php include("app/includes/sidebarAdmin.php"); ?>
    </div>

    <div class="admin-content">
     <div class="button-group">
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/postCreate.php' ?>">Add Post</a>
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/post.php' ?>">Manage Posts</a>
     </div>

     <div class="content">
         <h2 class="page-title">Edit Post</h2>

         <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

         <form action="postEdit.php" method="post" enctype="multipart/form-data">
           <input type="hidden" name="id" value="<?php echo $id ?>" >
           <!-- copy from here -->
           <div class="">
             <label for="">Title</label>
             <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
           </div>
           <div class="">
             <label for="">Body</label>
             <textarea name="body" id="body" value=""><?php echo $body ?></textarea>
           </div>
           <div class="">
             <label>Image</label>
             <input type="file" name="image" class="text-input">
           </div>
           <div class="">
             <label>Topic</label>
             <select name="topic_id" class="text-input">
              <option value=""></option>
              <?php foreach ($topics as $key => $topic): ?>
                 <?php if (!empty($topic_id) && $topic_id ==$topic["id"]): ?>
                   <option selected value="<?php echo $topic["id"] ?>"><?php echo $topic["name"] ?></option>
                 <?php else: ?>
                   <option value="<?php echo $topic["id"] ?>"><?php echo $topic["name"] ?></option>
                 <?php endif; ?>

              <?php endforeach; ?>

             </select>
           </div>
           <div class="">

             <?php if (empty($published) && $published == 0): ?>
               <label for="">
                 <input type="checkbox" name="published">
                 Publish
               </label>
             <?php else: ?>
               <label for="">
                 <input type="checkbox" name="published" checked>
                 Publish
               </label>
             <?php endif; ?>

           </div>
           <div class="">
             <button type="submit" name="update-post" class="btn btn-lg btn-dark">Update Post</button>
           </div>
         </form>
     </div>
    </div>

</div>




<?php include("app/includes/adminFooter.php"); ?>
