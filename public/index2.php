<?php 

require '../vendor/autoload.php';

session_start();

use app\library\Cart;
use app\library\Product;

$products = Product::getProducts();

if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $productInfo = $products[$id];
    $product = new Product;
    $product->setId($productInfo['id']);
    $product->setName($productInfo['name']);
    $product->setPrice($productInfo['price']);
    $product->setQuantity($productInfo['quantity']);
    $product->setImage($productInfo['image']);
    
    $cart = new Cart;
    $cart->add($product);
  }

  if (isset($_GET['id']) && isset($_GET['removeItemCart'])){
    $id = strip_tags($_GET['id']);
    $cart->remove($id);
    header('Location: index2.php');
    
  }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Loja Virtual</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="../css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="../css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="../css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> 65 984626420 </a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> diegosilvaf.dev@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Cuiabá MT</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> BRL </a></li>
						<li><a href="http://localhost/LojaVirtual/public/index2.php"><i class="fa fa-user-o"></i> Minha Conta</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="http://localhost/LojaVirtual/public/index2.php" class="logo">
									<img src="../img/logodiego.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">Categorias</option>
										<option value="1">Informatica</option>
										<option value="1">Eletrônico</option>
									</select>
									<input class="input" placeholder="Pesquisar">
									<button class="search-btn">Pesquisar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span> Desejos</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Seu carrinho</span>
										<div class="qty"></div>
									
									</a>
									<div class="cart-dropdown"> 
										<div class="cart-list">
                                        <?php

                                             $productsSession = $_SESSION['cart']['products'] ?? [];

                                            $totalProducts = 0;
                                          
                                            $totalPrice = $_SESSION['cart']['total'] ?? 0;
                                            
                                             foreach($productsSession as $product){
                                                $totalProducts += $product->getQuantity();
                                                
                                        ?>

											<div class="product-widget">
												<div class="product-img">
													<img src="../img/<?php echo $product->getImage() ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#"><?php echo $product->getName();?></a></h3>
													<h4 class="product-price"><span class="qty"><?php $product->getQuantity(); ?>x</span>R$ <?php echo number_format($product->getPrice(), 2, ',', '.') ?></h4>
												</div>
                                                <a href="?id=<?php echo $product->getId(); ?>&removeItemCart=true">
												<button class="delete"><i class="fa fa-close"></i></button></a>
											</div>

										 <?php } ?>

										</div>
										<div class="cart-summary">
											<small><?php echo $totalProducts ?> Item(s) selecionados</small>
											<h5>SUBTOTAL: R$ <?php echo number_format($totalPrice, 2, ',', '.')?></h5>
										</div>
										<div class="cart-btns">
											
											<a style='width: 100%' href="checkout.php">Pagamento  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Inicio</a></li>
						<li><a href="#">Ofertas</a></li>
						<li><a href="#">Categorias</a></li>
						<li><a href="#">Notebooks</a></li>
						<li><a href="#">Celulares</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessorios</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Coleção<br>Notebook</h3>
								<a href="#" class="cta-btn">Compre agora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Coleção<br>Periféricos</h3>
								<a href="#" class="cta-btn">Compre agora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Coleção<br>Cameras</h3>
								<a href="#" class="cta-btn">Compre agora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Novos Produtos</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Notebooks</a></li>
									<!-- <li><a data-toggle="tab" href="#tab1">Celulares</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Periféricos</a></li> -->
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->


					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										
                                        <?php
                                            foreach($products as $product){
                                            
                                          ?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="../img/<?php echo $product['image']?>" alt="<?php echo $product['name'];?>">
												<div class="product-label">
													<span class="sale">-10%</span>
													<span class="new">NOVO</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $product['category']; ?></p>
												<h3 class="product-name"><a href="#"><?php echo $product['name']; ?></a></h3>
												<h4 class="product-price">R$ <?php echo number_format($product['price'], 2, ',', '.') ?> </h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar a lista de desejo</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar para comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visualizar</span></button>
												</div>
											</div>
											<div class="add-to-cart">
                                                <button class="add-to-cart-btn">
												<a href='?id=<?php echo $product['id'] ?>'><i class="fa fa-shopping-cart"></i> adicionar no carrinho</a></button>
											</div>
										</div>
                                        <?php } ?>
                                    
										<!-- /product -->

					
										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Dias</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Horas</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Minutos</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Segundos</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Ofertas da semana</h2>
							<p>Produtos com desconto</p>
							<a class="primary-btn cta-btn" href="#">Comprar agora</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Mais vendidos</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="../img/product06.png" alt="">
												<div class="product-label">
													<span class="sale">-10%</span>
													<span class="new">NOVO</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Informática</p>
												<h3 class="product-name"><a href="#">Notebook gamer</a></h3>
												<h4 class="product-price">R$ 5000,00 <del class="product-old-price">R$ 5500,00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar a lista de desejos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar para comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visualizar</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> adicionar no carrinho</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="../img/product07.png" alt="">
												<div class="product-label">
													<span class="new">NOVO</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Celulares</p>
												<h3 class="product-name"><a href="#">Samsumg 64 gb </a></h3>
												<h4 class="product-price">R$ 2500,00 <del class="product-old-price">R$ 2600,00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar a lista de desejos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar para comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visualizar</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> adicionar no carrinho</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="../img/product08.png" alt="">
												<div class="product-label">
													<span class="sale">-5%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Informática</p>
												<h3 class="product-name"><a href="#">Notebook Asus black</a></h3>
												<h4 class="product-price">R$ 4000,00 <del class="product-old-price">R$ 4200,00</del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar a lista de desejos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar para comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visualizar</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> adicionar no carrinho</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="../img/product09.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Cameras</p>
												<h3 class="product-name"><a href="#">Camera Rekam Full HD</a></h3>
												<h4 class="product-price">R$ 2000,00 <del class="product-old-price">R$ 2100,00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar a lista de desejos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar para comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visualizar</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> adicionar no carrinho</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="../img/product01.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Informática</p>
												<h3 class="product-name"><a href="#">Notebook Acer</a></h3>
												<h4 class="product-price">R$ 3500,00 <del class="product-old-price">R$ 3800,00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">adicionar a lista de desejos</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">adicionar para comparar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Visualizar</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> adicionar no carrinho</button>
											</div>
										</div>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				
								<!-- product widget -->
							</div>
						</div>
					
				
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Sobre</h3>
								<p>loja virtual de departamento de informatica</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Cuiabá - MT</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>(65) 984626420</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>diegosilvaf.dev@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Ofertas</a></li>
									<li><a href="#">Notebook</a></li>
									<li><a href="#">Celulares</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Acessorios</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Informações</h3>
								<ul class="footer-links">
									<li><a href="#">Sobre nós</a></li>
									<li><a href="#">Contatos</a></li>
									<li><a href="#">Politica de privacidade</a></li>
									<li><a href="#">Pedidos e devoluções</a></li>
									<li><a href="#">Termos e condições</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Serviços</h3>
								<ul class="footer-links">
									<li><a href="#">Minha Conta</a></li>
									<li><a href="#">Ver carrinho</a></li>
									<li><a href="#">Lista de desejos</a></li>
									<li><a href="#">Acompanhar meu pedido</a></li>
									<li><a href="#">Ajuda</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								
								Direitos autorais &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Diego Ferreira <i  aria-hidden="true"></i>  </a>
						
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/slick.min.js"></script>
		<script src="../js/nouislider.min.js"></script>
		<script src="../js/jquery.zoom.min.js"></script>
		<script src="../js/main.js"></script>

	</body>
</html>
