<?php
    /*
     Template Name: Contact Us
    */
?>
<?php get_header()?>

<div class="contact">
<div class="about-title">
        <h2>Contact Us</h2>
    </div>
    <div class="contact-crumb">
        <a href="<?php echo site_url()?>">Home</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <a href="<?php echo site_url('/home/help')?>">Help</a>
        <p> <i class="fa-solid fa-chevron-right"></i> </p>
        <p>Contact Us</p>
    </div>
    <div class="contact-main">
        <div class="contact-main-title">
            <h2>Get in touch for enquiry or send us your feedback.</h2>
        </div>
        <div class="contact-main-note">
            <p>* Marked Fields are Required.</p>
        </div>
        <form action="" method="post">
            <div class="contact-main-form-name">
                <div>
                    <label for="firstname"> First name*</label>
                    <input name="firstname" id="firstname" type="text">
                </div>
                <div>
                    <label for="lastname">Last Name*</label>
                    <input type="text" name="lastname" id="lastname">
                </div>
            </div>
            <div class="contact-main-form-contact">
            <div>
                    <label for="email">E-mail*</label>
                    <input name="email" id="email" type="email">
                </div>
                <div>
                    <label for="telnum">Contact Number*</label>
                    <input type="tel" name="telnum" id="telnum">
                </div>
            </div>
            <div class="contact-main-form-textarea">
                <label for="comment">Your Message*</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>

            </div>

            <div class="contact-main-form-btn">
                <button type="submit" >Submit</button>
                <button type="reset" >Reset</button>
            </div>
        </form>
    </div>

    <div id="contact-map" class="contact-map">

    </div>
    
</div>

<?php get_footer()?>

