<?php
echo "
	<article class = 'col-4 card-deck'>
		<section class = 'card'>
			<img src = '{$row['imgSrc']}' class = 'card-img-top'>
			<section class = 'card-body'>
				<h4 class = 'card-title'>
					<a href = 'productDetails.php?id={$row['id']}' class = 'card-link'>
						نام دوره: {$row['name']}
					</a>
				</h4>
				<section class = 'card-text'>
					<p>
						قیمت: {$row['price']} تومان<br>
						توضیحات: {$row['description']}
					</p>
					<h5>زمان تشکیل</h5>
					<p>
						روزهای {$row['weekday']} 
						از {$row['timeFrom']} تا {$row['timeTo']}
					</p>
				</section>
			</section>
			<footer class = 'card-footer'>
				<a href = 'editProduct.php?id={$row['id']}' class = 'btn btn-primary'>ویرایش</a>
				<a href = 'deleteProduct.php?id={$row['id']}' class = 'btn btn-danger'>حذف</a>
			</footer>
		</section>
	</article>
";
?>