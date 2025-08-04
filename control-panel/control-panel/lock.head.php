<?php include_once "blade.header.php" ?>
<?php include_once "blade.header.enlist.php"; ?>
<?php include_once "blade.navbar.php"; ?>

    <div class="wrapper" style="overflow: auto">
      <?php include_once "blade.navbar.sidebar.php"; ?>
      <div class="main-container" id="application_canvas" style="overflow: visible"><?php include_once dirname(__FILE__)."/wiseman-serverside/app_pages/signin.page.htm" ?></div>
    </div>
  </div>

  <script>
    <?php #_script("implementation.js") ?>
  </script>
</body>

</html>