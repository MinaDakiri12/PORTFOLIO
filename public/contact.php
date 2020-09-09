<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<header>  
<?php include(TEMPLATE_FRONT . DS . "navbar.php") ?>
    <div class="header">
      
        
 </header>
  <?php send_mail_php() ?>

 <section class="contact">
    <div class="contact__formule">
            <h1 class="contact__title">Have Any  Questions<span>?</span></h1>
            <h3 class="contact__subtitle">Fell Free To Ask </h3>
           

            <form method="POST"   action="contact.php">
                <input type="text" id="fullname" name="fullname" placeholder="Full name" required>
                <p class="contactForm__alertmsg"><?php if(isset($name_error)) echo $name_error; ?></p>
                <input type="text" id="subject" name="subject" placeholder="Subject" required>
                <p class="contactForm__alertmsg"><?php if(isset($subject_error)) echo $subject_error; ?></p>
                <input type="email" id="email" name="email" placeholder="Email Address" required>
                <p class="contactForm__alertmsg"><?php if(isset($email_error)) echo $email_error; ?></p>
                <input type="tel" id="phone" name="phone" placeholder="Phone number">
                <textarea id="message" name="message" placeholder="Message" required></textarea>
                <p class="contactForm__alertmsg"><?php if(isset($message_error)) echo $message_error; ?></p>
                <input type="submit" id="submit" name="submit"  value="Envoyer"/>
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

