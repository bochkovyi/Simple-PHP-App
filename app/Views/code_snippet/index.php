<?php

$string = <<< EOF

<?php
// 1. To display into console
echo shell_exec('cat ' . __FILE__);

// 2. To dispaly into browser (without highlighting)
echo "<pre>" . htmlspecialchars(shell_exec('cat ' . __FILE__)) . "</pre>";

// 3. To dispaly into browser (with highlighting)
highlight_file(__FILE__);
?>
EOF;
?>
<h2>Example file that one can use to actually display the PHP page from PHP</h2>
<?php precho(htmlspecialchars($string)); ?>

<h2>Contents of this file run by second command</h2>

<?php echo "<pre>" . htmlspecialchars(shell_exec('cat ' . __FILE__)) . "</pre>"; ?>

<h2>Contents of this file - with highlighting</h2>

<?php highlight_file(__FILE__); ?>

