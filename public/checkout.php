<?php 

require '../vendor/autoload.php';

session_start();

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
						<li><a href="#"><i class="fa fa-envelope-o"></i> diegosilvaf.dev@email.com</a></li>
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
						<li class="active"><a href="http://localhost/LojaVirtual/public/index2.php">Inicio</a></li>
						
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Pagamento</h3>
						<ul class="breadcrumb-tree">
							<li><a href="http://localhost/LojaVirtual/public/index2.php">inicio</a></li>
							<li class="active">Pagamento</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Dados de entrega</h3>
							</div>
							<div class="form-group">
								<input require class="input" type="text" name="first-name" placeholder="Nome">
							</div>
							<div class="form-group">
								<input require class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input require class="input" type="text" name="address" placeholder="Endereço">
							</div>
							<div class="form-group">
								<input require class="input" type="number" name="tel" placeholder="Telefone">
							</div>
							
						</div>
						<!-- /Billing Details -->

						
						
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Lista de produtos</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUTO</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
              
							<div class="order-products">
              <?php

                $productsSession = $_SESSION['cart']['products'] ?? [];
                
                $totalPrice = $_SESSION['cart']['total'] ?? 0;

                foreach($productsSession as $product){
                  $total = $product->getPrice() * $product->getQuantity();
                  
                  
                ?>

								<div class="order-col">
									<div> <?php echo $product->getQuantity(); ?> x <?php echo $product->getName();?></div>
									<div><?php echo number_format($total, 2, ',', '.')?> </div>
								</div>
                <?php } ?>
							
							</div>
							<div class="order-col">
								<div>FRETE</div>
								<div><strong>GRÁTIS</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">R$ <?php echo number_format($totalPrice, 2, ',', '.')?></strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Boleto bancário
								</label>
								<div class="caption">
									<p>Boleto pode demorar até 3 dias uteis.</p>
								</div>
							</div>
						
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								Estou de acordo com os termos de serviços 
							</label>
						</div>
						
						<!-- <a href="#" class="primary-btn order-submit">FINALIZAR PEDIDO</a> -->
						<script>
								function funcao1()
								{
								alert("Seu pedido foi realizado com sucesso");
								}
								</script>
								</head>
								<body>

								<input style="width:200;height:200" class="primary-btn order-submit" type="button" onclick="funcao1()" value="FINALIZAR PEDIDO" />

					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		
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

