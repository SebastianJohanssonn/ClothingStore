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
</body>

</html>

