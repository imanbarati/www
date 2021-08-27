<?php
echo "
	<article class = 'col-xl-4 col-sm-6 col-12 card-deck'>
		<section class = 'card container-fluid'>
			<img src = '{$uploadBrowserPath}{$row['imgSrc']}' class = 'card-img-top'>
			<section class = 'card-body'>
				<h4 class = 'card-title'>
					<a href = 'productDetails.php?id={$row['id']}' class = 'card-link'>
						نام دوره: {$row['name']}
					</a>
				</h4>
				<section class = 'card-text'>
					<p>
						<span class = 'font-weight-bold'>قیمت:</span> "
						. number_format( $row['price'] ) . " تومان<br>
						<span class = 'font-weight-bold'>توضیحات:</span> "
						. mobtani_truncate( $row['description'] ) . "
					</p>
					<h5>زمان تشکیل</h5>
					<p>
						روزهای {$row['weekday']} 
						از {$row['timeFrom']} تا {$row['timeTo']}
					</p>
				</section>
			</section>
			<footer class = 'card-footer row'>
				<span class = 'col'>
";
				if( $aaa -> can('Product', 'Edit') )
					echo "
					<a href = 'editProduct.php?id={$row['id']}' class = 'btn btn-primary'>ویرایش</a>";
				if( $aaa -> can('Product', 'Delete') )
					echo "
					<a href = 'deleteProduct.php?id={$row['id']}' class = 'btn btn-danger'>حذف</a>";
echo "
				</span>
				<span class = 'col-4 text-left'>
					<a href = 'likeProduct.php?id={$row['id']}' class = 'btn fas fa-heart'></a>
					<a href = 'saveProduct.php?id={$row['id']}' class = 'btn far fa-bookmark'></a>					
				</span>
			</footer>
		</section>
	</article>
";
?>