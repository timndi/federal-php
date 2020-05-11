<?php include("app/includes/adminHeader.php");
// include(ROOT_PATH . "/app/controllers/users.php");
?>
<?php
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
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/post.php' ?>">Manage Post</a>
     </div>

     <div class="content">
         <h2 class="page-title">Manage Posts</h2>
            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
         <table>
           <head>
             <th>SN</th>
             <th>Title</th>
             <th>Author</th>
             <th colspan="3">Actions</th>
          </head>
             <tbody>
               <?php foreach ($posts as $key => $post): ?>
                     <tr>
                       <td><?php echo $key + 1; ?></td>
                       <td><?php echo $post["title"] ?></td>
                       <td>Timothy</td>
                       <td><a href="postEdit.php?id=<?php echo $post["id"]; ?>" class="edit">edit</a></td>
                       <td><a href="postEdit.php?delete_id=<?php echo $post["id"]; ?>" class="delete">delete</a></td>
                       <?php if ($post["published"]): ?>
                         <td><a href="postEdit.php?published=0&p_id=<?php echo $post["id"] ?>" class="unpublish">unpublish</a></td>
                       <?php else: ?>
                         <td><a href="postEdit.php?published=1&p_id=<?php echo $post["id"] ?>" class="publish">publish</a></td>
                       <?php endif; ?>
                     </tr>
               <?php endforeach; ?>


             </tbody>

         </table>
     </div>
    </div>

</div>




<?php include("app/includes/adminFooter.php"); ?>
