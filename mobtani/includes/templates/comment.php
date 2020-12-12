<?php
echo "
<article class = 'row bg-light mb-1'>
	<section class = 'col-1 profile'>
		<img src = '{$row['imgSrc']}'>
	</section>
	<section class = 'col'>
		<span class = 'font-weight-bold'>{$row['firstname']} {$row['lastname']}</span><br>
		{$row['message']}
		<footer>
			<button type = 'button' class = 'btn text-muted replyButton'>پاسخ</button>
			<button type = 'button' class = 'btn far fa-thumbs-up text-muted'> 2</button>
			<button type = 'button' class = 'btn far fa-thumbs-down text-muted'> 5</button>
		</footer>
		<section class = 'commentFormBlock container-fluid'>
			<form action = '#comments' method = 'post' class='form-inline row'>
				<textarea name = 'message' id = 'message' class='col' placeholder = 'نظر شما ...'></textarea>
				<input name = 'parentid' readonly type = 'hidden' value = '{$row['id']}'>
				<span class = 'col-3'>
					<input type = 'submit' name = 'submit' value = 'ثبت' class = 'btn btn-success '>
				</span>
			</form>
		</section>";
		if( $level < 5 ) showComments( $row['id'] , $level + 1);
echo '
	</section>		
</article>';
if( $level >= 5 ) showComments( $row['id'] , $level + 1);
?>