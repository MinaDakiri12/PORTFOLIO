
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
        <div class="projects__card" data-aos="flip-left" data-aos-duration="1200">
                <div class="projects__card--top">
                    <img class="cover" src="images/project3.png "alt="">
                </div>
                <div class="projects__card--lower">
                        <a href=""><h1>Ibtikar Arab Agency Website</h1></a>
                    <h2>GitHub:</h2>
                    <a class="projects__github" href="https://github.com/Zineb112/2AI-project">https://github.com/Zineb112/2AI-project</a>
                    <a class="projects__link" href="">website link</a>
                </div>
        </div>
        <div class="projects__card" data-aos="flip-left" data-aos-duration="1200">
                <div class="projects__card--top">
                    <img class="cover" src="images/project2.png" alt="">
                </div>
                <div class="projects__card--lower">
                        <a href=""><h1>Covid Test Website</h1></a>
                    <h2>GitHub:</h2>
                    <a class="projects__github" href="https://coronatest19.netlify.app/">https://github.com/MinaDakiri12/Project-Corona-</a>
                    <a class="projects__link" href="">website link</a>
                </div>
        </div>
        <div class="projects__card" data-aos="flip-left" data-aos-duration="1200">
                    <div class="projects__card--top">
                        <img class="cover" src="images/project 1.png" alt="">
                    </div>
                    <div class="projects__card--lower">
                            <a href=""><h1> Agency Nexter</h1></a>
                        <h2>GitHub:</h2>
                        <a class="projects__github" href="https://agence-immobilier.netlify.com/">https://github.com/Zineb112/Projects</a>
                        <a class="projects__link" href="">website link</a>
					</div>
        </div>
    </div>
    </div>
</section>
<!--End Projects-->
<?php include(TEMPLATE_FRONT . DS . "call.php") ?>
<?php include(TEMPLATE_FRONT . DS . "tetimonial.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>