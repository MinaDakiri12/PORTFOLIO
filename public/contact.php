<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<header>  
<?php include(TEMPLATE_FRONT . DS . "navbar.php") ?>
    <div class="header">
      
        
 </header>

 <section class="contact">
    <div class="contact__formule">
            <h1 class="contact__title">Have Any  Questions<span>?</span></h1>
            <h3 class="contact__subtitle">Fell Free To Ask </h3>
           

            <form action="">
                <input type="text" id="fullname" name="fullname" placeholder="Full name" required>
                <input type="text" id="subject" name="subject" placeholder="Subject" required>
                <input type="email" id="email" name="email" placeholder="Email Address" required>
                <input type="tel" id="phone" name="phone" placeholder="Phone number">
                <textarea id="message" name="message" placeholder="Message" required></textarea>
                <input id="send" type="submit" value="Send">

            </form>
    </div>
    <div class="contact__informations">
        <div class="contact__informations--bottom">
        <i class="fab fa-linkedin-in"></i>
        <h1>Linkdedin</h1>
        <a href="">Mina Dakiri</a>
        
       </div>
        <div class="contact__informations--bottom">
                <i class="fas fa-envelope"></i>
                <h1>Email</h1>
                <a class="email" href="mailto:minadakiri7@gmail.com">minadakiri7@gmail.com</a>
                
        </div>
        <div class="contact__informations--bottom">
                <i class="fas fa-phone-alt"></i>
                <h1>Phone</h1>
                <a href="tel:+212 772 596 608 ">+212 772 596 608</a>
        </div> 
    </div>
</section>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

