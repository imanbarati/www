				<span class = "rateButtons">
					<?php
					for($i = 1; $i <= 5; $i ++){
						echo "<a href = 'rateProduct.php?id={$row['id']}&vote={$i}' class = 'btn fa-star";
						if($vote >= $i) echo ' fas voted';
						else echo ' far';
						echo "'></a>\n";
					}			
					?>
				</span>