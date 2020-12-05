<?php
echo "
<article class = 'row bg-light mb-1'>
	<section class = 'col-1 profile'>
		<img src = '{$row['imgSrc']}'>
	</section>
	<section class = 'col'>
		<span class = 'font-weight-bold'>{$row['firstname']} {$row['lastname']}</span><br>
		{$row['message']}
	</section>
</article>
";
?>