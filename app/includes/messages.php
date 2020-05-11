<?php if (isset($_SESSION["message"])): ?>
  <div class="msg <?php echo $_SESSION["type"]; ?>">
    <li><?php echo $_SESSION["message"]; ?></li>
    <!-- below direct php code makes the pop up message to disappear after page reload -->
    <?php
     unset($_SESSION["message"]);
     unset($_SESSION["type"]);
    ?>
  </div>
<?php endif; ?>
