<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>

<header >
    <?php include(TEMPLATE_FRONT . DS . "navbar.php") ?>
    <div id="home" class="banner">
        <div class="banner__left">
            <div class="banner__left--content">

                <h1>Hello, I’m
                    <span>Mina</span></h1>
                <h2>Web Devloper</h2>
            </div>
        </div>

        <div class="banner__right">
            <div class="banner__right--picture">
                <img src="images/banner1.jpg" alt=""/></a>

        </div>

    </div>
</div>
</header>

<!-- About us Section -->
<div class="profile__btn">
<button class="profile__aboutBtn activeBtn">about</button>
<button class="profile__skillsBtn">skills</button>
</div>

<section id="about" class="profile">
<div class="profile__container">
    <div class="profile__container--left">
        <img
            src="images/about.png"
            alt=""
            data-aos="flip-left"
            data-aos-duration="1200">
    </div>
    <div class="profile__container--right">
        <h2>Hey
            <span>About me</span></h2>
        <p>
            I am a web developer, I enjoy turning complex problems into simple, beautiful
            and intuitive designs, As a graduate with one year of experience in web
            development. I'm good at working with others.
        </p>
        <a href="" class="upload">Download CV</a>
    </div>
</div>
</section>
<section class="skills">
<div class="skills__container">
    <div class="skills__card" data-aos="flip-down" data-aos-duration="1200">
        <img src="images/team.png" alt="Teamwork">
        <h1 class="skills__title">Teamwork</h1>
    </div>
    <div class="skills__card" data-aos="flip-down" data-aos-duration="1200">
        <img src="images/organisation (1).png" alt="organization">
        <h1 class="skills__title">Organization</h1>
    </div>
    <div class="skills__card" data-aos="flip-down" data-aos-duration="1200">
        <img src="images/knowledge.png" alt="Self-learning">
        <h1 class="skills__title">Self-learning</h1>
    </div>
    <div class="skills__card" data-aos="flip-down" data-aos-duration="1200">
        <img src="images/agile.png" alt="Agile">
        <h1 class="skills__title">Agile</h1>
    </div>
    <div class="skills__card" data-aos="flip-down" data-aos-duration="1200">
        <img src="images/project-management.png" alt="Project management">
        <h1 class="skills__title">Project management</h1>
    </div>
    <div class="skills__card" data-aos="flip-down" data-aos-duration="1200">
        <img src="images/flexibility.png" alt="Adaptability">
        <h1 class="skills__title">Adaptability</h1>
    </div>
</div>
</section>
<!-- End Profile Section -->
<!-- Services Section -->
<section id="services" class="services">
<!-- Sec Title -->
<div class="services__container">
    <h2 class="title">What I Do<span class="theme_color">.</span></h2>
</div>
<div class="services__block">
    <!-- Service Block -->
    <div class="services__block--card">
        <div class="inner-box">
            <div class="icon-box">
                <span class="icon"><img src="images/web design.png" alt="Web Design"/></span>
            </div>
            <h5>Web Design</h5>
            <p >I value simple content structure, clean design patterns, and thoughtful
                interactions.</p>
        </div>
    </div>

    <!-- Service Block -->
    <div class="services__block--card">
        <div class="inner-box">
            <div class="icon-box">
                <span class="icon"><img src="images/responsive.png" alt="Mobile-Friendly"/></span>
            </div>
            <h5>Mobile-Friendly</h5>
            <p >
                Responsive Design allows the site to be viewed in a suitable format from any
                device.</p>
        </div>
    </div>

    <!-- Service Block -->
    <div class="services__block--card">
        <div class="inner-box">
            <div class="icon-box">
                <span class="icon"><img src="images/devlopment.png" alt=""/></span>
            </div>
            <h5>Development</h5>
            <p>build websites and web applications using the best technologies that work hard</p>
        </div>
    </div>

</div>
</section>
<!-- End Services Section -->

<!--Projects sections-->
<section class="projects">
<div class="projects__container">
    <h2 class="projects__title">My projects<span class="theme_color">.</span></h2>
    <div
        class="projects__wrapper thm__owl-carousel testimonials__carousel owl-carousel"
        data-options='{
			"smartSpeed": 700, "autoplay": true, "autoplayHoverPause": true, "autoplayTimeout": 6000, "loop": true, "nav": false, "responsive": {
				"0": {"items": 1, "margin": 40},
				"767": {"items": 1, "margin": 40},
				"991": {"items": 2, "margin": 0},
				"1449": {"items": 3, "margin": 24}
			} }'>
       <?php  display_last_projects() ?>
    </div>
    <a href="projects.php" class="projects__all">See all</a>
</div>
</section>
<!--End Projects-->

<?php include(TEMPLATE_FRONT . DS . "call.php") ?>
<?php include(TEMPLATE_FRONT . DS . "testimonials.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>