<?php
	require_once("document_root.php");
	require_once(get_document_root() . '/includes/ddb_connect.php');

	require_once(get_document_root() . "/includes/header.php");
	get_header('kaasch', 'kaasisbaas');
?>

	<header class="masthead text-center text-white d-flex">
		<div class="container"> 
			<div class="row">
				<div class="col-lg-10 mx-auto">
			  	<h1 class="text-uppercase">
						<strong>Kaasch Webshop</strong>
					</h1>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
			<div class="row product-overview pt-4">
					<div class="col-12 py-4">
						<h2>Newest products</h2>
					</div>
					<!-- <div class="col-3 product">
						<div class="product-image">
							<img src="<?php get_document_root(); ?>/images/kaas1.jpg" />
						</div>
						<div class="product-name">
							<h3>Cheese 1</h3>
						</div>
						<div class="product-description">
							<h4>Description:</h4>
							<p>Cheese 1 desc</p>
						</div>
						<div class="product-order">
							<span>Price: &euro;3,80</span>
							<button><i class="fas fa-shopping-cart"></i></button>
							<button>View</button>
						</div>
					</div> -->

					<?php
					$result = $mysqli->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 12;");

					if (mysqli_num_rows($result) > 0){
						$relative_root = get_relative_root();
						while($row = mysqli_fetch_assoc($result)) {
							
							//echo $row['name'] . " | " . $row['description']. " | " . $row['price']. " | " . $row['shelflife'];
							
							echo <<<EOT
							<div class="col-4">
								<div class="product">
									<div class="product-image">
										<img src="{$relative_root}/images/kaas1.jpg" />
									</div>
									<div class="product-name">
										<h3>{$row['name']}</h3>
									</div>
									<div class="product-description">
										<h4>Description:</h4>
										<p>{$row['description']}</p>
									</div>
									<div class="product-order">
										<span>Price: &euro;{$row['price']}</span>
										<button class="btn btn-secondary"><i class="fas fa-shopping-cart"></i></button>
										<button class="btn btn-secondary">View</button>
									</div>
								</div>
							</div>
EOT;

							
						}
					} else {
						echo "Error loading products from database";
					}


					?>

			</div>
	</div>

	<?php require_once(get_document_root() . "/includes/footer.php"); ?>
