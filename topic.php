<?php include("app/includes/adminHeader.php");
// include(ROOT_PATH . "/app/controllers/users.php");
?>
<?php
include(ROOT_PATH . "/app/controllers/topicController.php");
adminOnly();
?>

<div class="admin-wrapper">

    <div class="left-sidebar">
      <?php include("app/includes/sidebarAdmin.php"); ?>
    </div>

    <div class="admin-content">
     <div class="button-group">
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/topicCreate.php' ?>">Add Topic</a>
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/topic.php' ?>">Manage Topic</a>
     </div>

     <div class="content">
         <h2 class="page-title">Manage Topic</h2>
   <!-- include messages.php added here          -->
         <?php include("app/includes/messages.php"); ?>

         <table>
           <thead>
             <th>SN</th>
             <th>Name</th>
             <th colspan="2">Actions</th>
           </thead>
             <tbody>
               <?php foreach ($topics as $key => $topic): ?>
                 <tr>
                   <td><?php echo $key + 1; ?></td>
                   <td><?php echo $topic["name"]; ?></td>
                   <td><a href="topicEdit.php?id=<?php echo $topic["id"]; ?>" class="edit">edit</a></td>
                   <td><a href="topic.php?del_id=<?php echo $topic["id"]; ?>" class="delete">delete</a></td>
                 </tr>
               <?php endforeach; ?>

               <!-- <tr>
               <td>2</td>
               <td>Life Lessons</td>
               <td><a href="#" class="edit">edit</a></td>
               <td><a href="#" class="delete">delete</a></td>
             </tr> -->
            </tbody>
         </table>
     </div>
    </div>

</div>




<?php include("app/includes/adminFooter.php"); ?>
