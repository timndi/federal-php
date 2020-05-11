<?php include("app/includes/adminHeader.php"); ?>
<?php
include(ROOT_PATH . "/app/controllers/users.php");
adminOnly();
?>

<div class="admin-wrapper">

    <div class="left-sidebar">
      <ul>
        <?php include("app/includes/sidebarAdmin.php"); ?>
    </div>

    <div class="admin-content">
     <div class="button-group">
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/userCreate.php' ?>">Add User</a>
       <a class="btn btn-lg btn-dark" href="<?php echo BASE_URL . '/userAdmin.php' ?>">Manage User</a>
     </div>

     <div class="content">
         <h2 class="page-title">Manage User</h2>
         <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

         <table>
           <head>
             <th>SN</th>
             <th>Username</th>
             <th>Email</th>
             <th colspan="2">Actions</th>
           </head>
             <tbody>

               <?php foreach ($admin_users as $key => $user): ?>
                 <tr>
                   <td><?php echo $key + 1; ?></td>
                   <td><?php echo $user["username"]; ?></td>
                   <td><?php echo $user["email"]; ?></td>
                   <td><a href="userEdit.php?id=<?php echo $user["id"]; ?>" class="edit">edit</a></td>
                   <td><a href="userAdmin.php?delete_id=<?php echo $user['id']; ?>" class="delete">delete</a></td>
                 </tr>
               <?php endforeach; ?>


             </tbody>
         </table>
     </div>
    </div>

</div>


<?php include("app/includes/adminFooter.php"); ?>
