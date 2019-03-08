<<<<<<< HEAD
<?php
function ClothingStore($startYear) {
    $currentYear = date('Y');
    if ($startYear < $currentYear) {
        $currentYear = date('y');
        return "&copy; $startYear&ndash;$currentYear";
    } else {
        return "&copy; $startYear";
    }
}

?>

<footer>
    <ul>
        <li>info@cs.com</li>
        <li id=footerYear> <?php echo ClothingStore(2018); ?></li>
        <li>01 23 456 789</li>
    </ul>
</footer>

</html>

=======
<?php
function ClothingStore($startYear) {
    $currentYear = date('Y');
    if ($startYear < $currentYear) {
        $currentYear = date('y');
        return "&copy; $startYear&ndash;$currentYear";
    } else {
        return "&copy; $startYear";
    }
}

?>

<footer>
    <ul>
        <li>info@cs.com</li>
        <li id=footerYear> <?php echo ClothingStore(2018); ?></li>
        <li>01 23 456 789</li>
        <div id="newsletterform">
            <div class="wrap">
                <h3>Get newsletter</h3>
                <form action="send.php" method="post" id="newsletter" name="newsletter">
                    <input type="name" name="signup-name" id="signup-name" value="" placeholder="Insert name here" />
                    <input type="email" name="signup-email" id="signup-email" value="" placeholder="Insert email here" />
                    <input type="submit" value="Subscribe" name="signup-button" id="signup-button">
                    <span class="arrow"></span>
                </form>
                <div id="response"></div>
            </div>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="assets/js/lib.js"></script>
        </div>
    </ul>
</footer>

</html>

>>>>>>> master
