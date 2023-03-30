<?php
$root = $_SERVER['DOCUMENT_ROOT'];

include $root."/components/head.htm";
include $root."/components/header.htm";

echo "<main>";

include $root."/components/chapters/chapter-1/lesson-1.htm";

echo "</main>";

include $root."/components/footer.htm";
?>