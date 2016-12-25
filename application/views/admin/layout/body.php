  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_header; ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <?php
          $c = count($b_crumb);
          $i = 1;
          foreach ($b_crumb as $key => $value) {
        ?>
            <li class="<?php if($i == $c) echo "active"; ?>">
              <?php
                if ($i < $c) {
                  echo "<a href='" .$key ."'>";
                }
              ?>
              <?php echo $value; ?>
              <?php
                if ($i < $c) {
                  echo "</a>";
                }
              ?>
            </li>
        <?php
            $i++;
          }
        ?>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if (is_array($__content)) {
          foreach ($__content as $value) {
            echo $value;
          }
        }else echo $__content;
      ?>
    </section>
    <!-- /.content -->
  </div>