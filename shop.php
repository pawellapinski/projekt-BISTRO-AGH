<?php

	session_start();

	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bistro AGH</title>

		<!-- Bootstrap -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<style>
		body
		{
			background: url("restaurant_icons.png");
		}
			.simpleCart_shelfItem {
				padding: 20px;
				transition: all .4s;
				-webkit-transition: all .4s;
			}
			.simpleCart_shelfItem:hover {
				transform: scale(1.05);
				-ms-transform: scale(1.05);
				-webkit-transform: scale(1.05);
				box-shadow: 0 0 20px #888;
				background-color: #fff;
			}
		/* zmniejszenie obrazka w koszyku */
			.simpleCart_items img {
				max-width: 64px;
				max-height: 64px;
			}
			/* wyśrodkowanie ilości item */
			.item-quantity, .item-decrement, .item-increment {
				text-align: center;
			}
			/* wyswietlanie jednego elementu w zalezwnosci od posortowania */
			.mix {
				display: none;
			}
		</style>
	</head>
	<body>

<div class="container">
	<div class="row">
		<div class="col-sm-12">

			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">BISTRO AGH zamówienia ON-LINE</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">

	<?php
  echo '<li><a href="">Zalogowany jako: <b>'.$_SESSION['user'].'</b></a></li>';
                                  ?>
							<li class="koszyk"><a href="#" data-toggle="modal" data-target="#myModal">Koszyk (<span class="simpleCart_quantity"></span>)</a></li>
							<li><a href="logout.php">Wyloguj</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>


			<label>Rodzaj:</label>
			<div class="controls btn-group">
				<button class="filter btn btn-sm btn-success" data-filter="all">Wszystko</button>
				<button class="filter btn btn-sm btn-warning" data-filter=".Obiady">Obiady</button>
				<button class="filter btn btn-sm btn-warning" data-filter=".Dodatki">Dodatki</button>
				<button class="filter btn btn-sm btn-warning" data-filter=".Desery">Desery</button>
				<button class="filter btn btn-sm btn-warning" data-filter=".Napoje">Napoje</button>
				<button class="filter btn btn-sm btn-warning" data-filter=".Pizza">Pizza</button>

			</div>
			
			<div class="pull-right">
					<label>Cena:</label>
					<div class="controls btn-group">
						<button class="sort btn btn-sm btn-danger" data-sort="price:asc">Rosnąco</button>
						<button class="sort btn btn-sm btn-success" data-sort="price:desc">Malejąco</button>
					</div>
			</div>

			<p>&nbsp;</p>
		</div><!-- /col-sm-12 -->
	</div><!-- /row -->
</div><!-- /container -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Koszyk <span class="showIfEmpty">jest pusty</span></h4>
			</div>

			<div class="hideIfEmpty">

				<div class="modal-body">
					<div class="simpleCart_items"></div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Łącznie</th>
								<th>Koszty dostawy</th>
								<th>Do zapłaty</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><div class="simpleCart_total"></div></td>
								<td><div class="simpleCart_shipping"></div></td>
								<td><div class="simpleCart_grandTotal"></div></td>
							</tr>
						</tbody>
					</table>
				</div><!-- /modal-body -->

				<div class="modal-footer">
					<!-- button to empty the cart -->
					<a href="javascript:;" class="simpleCart_empty btn btn-default">Opróżnij koszyk</a>
					<!-- create a checkout button -->
					<a href="javascript:;" class="simpleCart_checkout btn btn-primary">Złóż zamówienie</a>
				</div><!-- /modal-footer -->

			</div><!-- /hideIfEmpty -->
		</div><!-- /modal-content -->
	</div><!-- /modal-dialog -->
</div><!-- /modal -->

<div id="Container" class="container">
	<div class="row">

		<div class="col-md-4 text-center mix Obiady" data-price="39.99">
			<div class="simpleCart_shelfItem">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="item_name">Obiad</h2>
						<img class="item_thumb" src="img/obiad.jpg" alt="">
					</div>
				</div><!-- /row -->
				<div class="row">
						<div class="col-xs-12">
							<h2 class="item_price">39.99 zł</h2>  
						</div>
				</div><!-- /row -->
				<div class="row">
					<div class="col-xs-4">
						
					</div>
					<div class="col-xs-3">
						<input type="text" value="1" class="item_Quantity form-control" placeholder="ilość">
					</div>
					<div class="col-xs-5">
						<input type="button" class="item_add btn btn-primary" value="Do koszyka">
					</div>   
				</div><!-- /row -->
			</div><!-- /simpleCart_shelfItem -->
		</div><!-- /col-md-4 -->

		<div class="col-md-4 text-center mix Desery" data-price="15.99">
			<div class="simpleCart_shelfItem">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="item_name">Deser</h2>
						<img class="item_thumb" src="img/deser.jpg" alt="">
					</div>
				</div><!-- /row -->
				<div class="row">
						<div class="col-xs-12">
							<h2 class="item_price">15.99 zł</h2>  
						</div>
				</div><!-- /row -->
				<div class="row">
					<div class="col-xs-4">
						
					</div>
					<div class="col-xs-3">
						<input type="text" value="1" class="item_Quantity form-control" placeholder="ilość">
					</div>
					<div class="col-xs-5">
						<input type="button" class="item_add btn btn-primary" value="Do koszyka">
					</div>   
				</div><!-- /row -->
			</div><!-- /simpleCart_shelfItem -->
		</div><!-- /col-md-4 -->

		<div class="col-md-4 text-center mix Pizza" data-price="29.99">
			<div class="simpleCart_shelfItem">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="item_name">Pizza</h2>
						<img class="item_thumb" src="img/pizza.jpg" alt="">
					</div>
				</div><!-- /row -->
				<div class="row">
						<div class="col-xs-12">
							<h2 class="item_price">29.99 zł</h2>  
						</div>
				</div><!-- /row -->
				<div class="row">
					<div class="col-xs-4">
						
					</div>
					<div class="col-xs-3">
						<input type="text" value="1" class="item_Quantity form-control" placeholder="ilość">
					</div>
					<div class="col-xs-5">
						<input type="button" class="item_add btn btn-primary" value="Do koszyka">
					</div>   
				</div><!-- /row -->
			</div><!-- /simpleCart_shelfItem -->
		</div><!-- /col-md-4 -->

		<div class="col-md-4 text-center mix Dodatki" data-price="9.99">
			<div class="simpleCart_shelfItem">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="item_name">Zupa</h2>
						<img class="item_thumb" src="img/zupa.jpg" alt="">
					</div>
				</div><!-- /row -->
				<div class="row">
						<div class="col-xs-12">
							<h2 class="item_price">9.99 zł</h2>  
						</div>
				</div><!-- /row -->
				<div class="row">
					<div class="col-xs-4">
						
					</div>
					<div class="col-xs-3">
						<input type="text" value="1" class="item_Quantity form-control" placeholder="ilość">
					</div>
					<div class="col-xs-5">
						<input type="button" class="item_add btn btn-primary" value="Do koszyka">
					</div>   
				</div><!-- /row -->
			</div><!-- /simpleCart_shelfItem -->
		</div><!-- /col-md-4 -->

		<div class="col-md-4 text-center mix Napoje" data-price="5.99">
			<div class="simpleCart_shelfItem">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="item_name">Kawa</h2>
						<img class="item_thumb" src="img/kawa.jpg" alt="">
					</div>
				</div><!-- /row -->
				<div class="row">
						<div class="col-xs-12">
							<h2 class="item_price">5.99 zł</h2>  
						</div>
				</div><!-- /row -->
				<div class="row">
					<div class="col-xs-4">
						
					</div>
					<div class="col-xs-3">
						<input type="text" value="1" class="item_Quantity form-control" placeholder="ilość">
					</div>
					<div class="col-xs-5">
						<input type="button" class="item_add btn btn-primary" value="Do koszyka">
					</div>   
				</div><!-- /row -->
			</div><!-- /simpleCart_shelfItem -->
		</div><!-- /col-md-4 -->

		<div class="col-md-4 text-center mix Dodatki" data-price="14.99">
			<div class="simpleCart_shelfItem">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="item_name">Makaron</h2>
						<img class="item_thumb" src="img/makaron.jpg" alt="">
					</div>
				</div><!-- /row -->
				<div class="row">
						<div class="col-xs-12">
							<h2 class="item_price">14.99 zł</h2>  
						</div>
				</div><!-- /row -->

				<div class="row">
					<div class="col-xs-4">
						
					</div>
					<div class="col-xs-3">
						<input type="text" value="1" class="item_Quantity form-control" placeholder="ilość">
					</div>
					<div class="col-xs-5">
						<input type="button" class="item_add btn btn-primary" value="Do koszyka">
					</div>   
				</div><!-- /row -->
			</div><!-- /simpleCart_shelfItem -->
		</div><!-- /col-md-4 -->

	</div><!-- /row -->
</div><!-- /container -->

<!-- Stopka -->

<footer>
  <div class="container" style="background-color: black; color: white; text-align: center;">Stronę wykonał Paweł Łapiński w ramach pracy dyplomowej kierunku Programowanie Aplikacji Webowych. © Wszelkie prawa zastrzeżone.
    
  </div>

</footer>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<script src="js/simpleCart.js"></script>
		<script src="http://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js?v=2.1.2"></script>
		<script>
simpleCart({
	// array representing the format and columns of the cart,
	// see the cart columns documentation
	cartColumns: [
		{ attr: "name", label: "Produkt"},
		{ view:'image' , attr:'thumb', label: false},
		{ view: "currency", attr: "price", label: "Cena"},
		{ view: "decrement", label: false, text: '<span class="glyphicon glyphicon-minus"></span>'},
		{ attr: "quantity", label: "Ilość"},
		{ view: "increment", label: false, text: '<span class="glyphicon glyphicon-plus"></span>'},
		{ view: "currency", attr: "total", label: "Razem" },
		{ view: "remove", text: '<span class="glyphicon glyphicon-remove"></span>', label: false}
	],

	// "div" or "table" - builds the cart as a 
	// table or collection of divs
	cartStyle: "table", 

	// how simpleCart should checkout, see the 
	// checkout reference for more info 
	checkout: { 
		type: "PayPal" , 
		email: "pawel540@o2.pl" 
	},

	// set the currency, see the currency 
	// reference for more info
	currency: "PLN",

	// collection of arbitrary data you may want to store 
	// with the cart, such as customer info
	data: {},

	// set the cart langauge 
	// (may be used for checkout)
	language: "english-us",

	// array of item fields that will not be 
	// sent to checkout
	excludeFromCheckout: [],

	// custom function to add shipping cost
	shippingCustom: null,

	// flat rate shipping option
	shippingFlatRate: 10,

	// added shipping based on this value 
	// multiplied by the cart quantity
	shippingQuantityRate: 0,

	// added shipping based on this value 
	// multiplied by the cart subtotal
	shippingTotalRate: 0,

	// tax rate applied to cart subtotal
	taxRate: 0,

	// true if tax should be applied to shipping
	taxShipping: false,

	// event callbacks 
	beforeAdd     : null,
	afterAdd      : null,
	load        : null,
	beforeSave    : null,
	afterSave     : null,
	update      : null,
	ready     : null,
	checkoutSuccess : null,
	checkoutFail    : null,
	beforeCheckout    : null,
				beforeRemove           : null
});

// basic callback example
simpleCart.bind( "afterAdd" , function(){
	$( ".koszyk" ).fadeOut(500).fadeIn(500);
});

simpleCart.bind( 'update' , function(){
	if (simpleCart.quantity() == 0)
	{
		$( ".hideIfEmpty" ).hide();
		$( ".showIfEmpty" ).show();
	}
	else
	{
		$( ".hideIfEmpty" ).show();
		$( ".showIfEmpty" ).hide();    
	}
});

$(function(){
	$('#Container').mixItUp();
});
</script>

	</body>
</html>