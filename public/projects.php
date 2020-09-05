
<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<header>  
<?php include(TEMPLATE_FRONT . DS . "navbar.php") ?>
        
 </header>

  <!--Projects sections-->
  <section class="projects">
    <div class="projects__container">
		<h2 class="projects__title">My projects<span class="theme_color">.</span></h2>
		<div class="projects__wrapper">
        <?php display_projects() ?>
        </div>
    </div>
</section>
<!--End Projects-->
<?php include(TEMPLATE_FRONT . DS . "call.php") ?>
<?php include(TEMPLATE_FRONT . DS . "tetimonial.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>