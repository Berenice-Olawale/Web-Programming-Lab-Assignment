<h2>Contact ReNew Ltd.</h2>
<p>Send a message to the website owners. The message is validated with JavaScript and PHP, then stored in the database.</p>
<div 
    id="clientErrors">
</div>
<?php if(isset($contactMessage)) echo $contactMessage; ?>
<form id="contactForm" method="post" novalidate>
    <label>Name</label>
    <input type="text" name="sender_name" value="<?= htmlspecialchars($_POST['sender_name'] ?? '') ?>">
    <label>Email</label>
    <input type="text" name="sender_email" value="<?= htmlspecialchars($_POST['sender_email'] ?? '') ?>">
    <label>Subject</label>
    <input type="text" name="subject" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
    <label>Message</label>
    <textarea name="message"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
    <button class="btn" type="submit">Send message</button>
</form>
<section class="card map">
    <h3>Our showroom in Nowhereland capital</h3>
    <iframe src="https://www.google.com/maps?q=Budapest%20University%20of%20Technology%20and%20Economics&output=embed" allowfullscreen loading="lazy"></iframe>
</section>