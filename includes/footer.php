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
                
                    <input type="name" name="signup-name" id="signup-name" value="" placeholder="Insert name here" />
                    <input type="email" name="signup-email" id="signup-email" value="" placeholder="Insert email here" />
                    <button id="signup-button" onclick=makeSubscriber()>Subscribe</button>
                    <span class="arrow"></span>
                
                <div id="response"></div>
            </div>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            
        </div>
    </ul>
</footer>

</html>

