<?php
session_start();

  if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
  {
    header('Location: shop.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bistro AGH</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <link href="style.css" rel="stylesheet">
 <!-- Linki do ikonek social-media -->
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
    <nav class="navbar-fixed-top navbar-inverse" >
  <div class="container">
    <!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" ariaexpanded="false">
        <span class="sr-only">Rozwiń nawigację</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        
      </button>
      <a class="navbar-brand" href="index.php"><img src="logo.jpg" alt="logo" class="img-circle" width="50" height="50" style="margin-top: -16px;" ></a>
    </div>

    <!-- Grupowanie elementów menu w celu lepszego wyświetlania na urządzeniach moblinych -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Strona Główna</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#googleMap">Jak dojechać ?</a></li>
        <li><a href="galeria.php">Galeria</a></li>
        <li><a href="#contact">Kontakt</a></li>
        <li><a href="#registration">Zamówienia Online</a></li>
        
      </ul>
  

<!-- /.logowanie  -->

<ul class="nav pull-right">
<li class="dropdown" id="menuLogin">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Zaloguj</a>
                            <div class="dropdown-menu" style="padding:17px;">
                                <form id="formLogin" class="form" action="zaloguj.php" method="post">
                                    <label>Panel Logowania</label>

    							    <input name="login" id="username" type="text" placeholder="login"  title="wpisz swoje imie" required="">
    							    <input name="haslo" id="password" type="password" placeholder="haslo" title="wpisz swoje haslo" required=""><br>
    							    <button type="submit" id="btnLogin" class="btn">Login</button>
    							</form>
                                <form><a href="registration.php" title="Szybka rejestracja i logowanie!" id="btnNewUser" data-toggle="collapse" data-target="#">Zarejestruj sie</a></form>

    							</form>
                                
                            </div>
                        </li>
                      </ul>

<?php
  if(isset($_SESSION['blad']))  echo $_SESSION['blad'];
?>

</nav>

<header>

  


      <div id="carouselID" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
          <li data-target="#carouselID" data-slide-to="0" class="active"></li>
          <li data-target="#carouselID" data-slide-to="1"></li>
          <li data-target="#carouselID" data-slide-to="2"></li>
          <li data-target="#carouselID" data-slide-to="3"></li>
          <li data-target="#carouselID" data-slide-to="4"></li>
        </ol>

      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="strawa1.jpg " style="height:100%;" alt="">
          <div class="container">
          <div class="carousel-caption">
          <h3> Pyszne dobrej jakości jedzenie</h3>
          <b>Bistro AGH przyciąga niepowtarzalnym klimatem i doskonałym jedzeniem.</b>
          </div>
          </div>
        </div>
        <div class="item">
          <img src="strawa2.jpg" style="height:100%;" alt="">
          <div class="carousel-caption"><h3>Zdrowe jedzenie</h3>
          <b>Wolne od konserwantów i sztucznych dodatków selekcjonowane potrawy</b>

          </div>
        </div>
        <div class="item">
          <img src="strawa3.jpg " style="height:100%;" alt="">
          <div class="carousel-caption"><h3> Uniwersalne miejsce na każdą okazję!</h3>
          <b>Bistro AGH to miejsce na dobry początek dnia, rodzinny obiad, spotkanie przy kawie czy dobrą kolację</b>
           </div>
        </div>
        <div class="item">
          <img src="strawa4.jpg " style="height:100%;" alt="">
          <div class="carousel-caption"> <h3> Szybkie dostawy na terenie Krakowa. </h3>
            <b>Dbamy o wygode naszych klientów prowadzimy usługi dostawy zamówien do domu.</b>
          </div>
        </div>
        <div class="item">
          <img src="strawa5.jpg " style="height:100%;" alt="">
          <div class="carousel-caption"><h3>Pizza z dowolnych składników</h3>
            <b>Duży wybór składników, najlepsze ciasto z orginalnej sekretnej Włoskiej receptury.</b>
          </div>
        </div>
      </div>


        <a class="left carousel-control" href="#carouselID" role="button" data-slide="prev">
           <span class="glyphicon glyphicon-chevron-left" ariahidden="true"></span>
           <span class="sr-only">Poprzedni</span>
        </a>

        <a class="right carousel-control" href="#carouselID" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" ariahidden="true"></span>
            <span class="sr-only">Następny</span>
        </a>


      </div>

</header>

<section>
<div   id="main-page2" class="container">
<h1><p> Wyśmienita różnorodność obiadów i śniadań! </p></h1></br>
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
      <img src="obiady1.jpg" class="img-circle" style="width: 70%">
<h3> Pyszne obiady</h3>
<p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <img src="obiady2.jpg" class="img-circle" style="width: 70%">
      <h3> Smaczne ciasta </h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pellentesque justo ante, et ultricies augue ultricies sed. Ut ac tortor.</p>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <img src="obiady3.jpg" class="img-circle" style="width: 70%">
      <h3>Lampka wina do obiadu</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pellentesque justo ante, et ultricies augue ultricies sed. Ut ac tortor.</p>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <img src="obiady4.jpg" class="img-circle" style="width: 70%">
<h3> Świeże śniadania </h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pellentesque justo ante, et ultricies augue ultricies sed. Ut ac tortor.</p>
    </div>
   </div>
 </div>
</section>


</div>

<div class="banner padd" id="menu">
        <div class="container">
          <!-- obrazek -->
          <img class="img-responsive" src="img/crown-white.png" alt="" />
          <!-- Nagłówek -->
          <h2 class="white">Menu</h2>
          
        </div>
      </div>


      <!-- Inner Content -->
      <div class="inner-page padd">

        <!-- Inner page menu start -->
        <div class="inner-menu">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <!-- Inner page menu list -->
                <div class="menu-list">
                  <!-- Menu item heading -->
                  <h3>Przystawki</h3>
                  <!-- Image for menu list -->
                  <img class="img-responsive" src="img/menu/menu1.jpg" alt="" />
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Przystawka 1</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">29 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Przystawka 2</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">39 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Przystawka 3</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">29 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Przystawka 4</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">22 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item border-zero">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Przystawka 5</h4>
                    <!-- Dish price -->
                    <span class="price pull-right"> 15 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <!-- Inner page menu list -->
                <div class="menu-list">
                  <!-- Menu item heading -->
                  <h3>Zestawy Obiadowe</h3>
                  <!-- Image for menu list -->
                  <img class="img-responsive" src="img/menu/menu2.jpg" alt="" />
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Obiad 1</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">35 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Obiad 2</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">25 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Obiad 3</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">20 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Obiad 4</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">15 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item border-zero">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Obiad 5</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">10 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <!-- Inner page menu list -->
                <div class="menu-list">
                  <!-- Menu item heading -->
                  <h3>Desery</h3>
                  <!-- Image for menu list -->
                  <img class="img-responsive" src="img/menu/menu3.jpg" alt="" />
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Deser 1</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">5 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Deser 2</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">7 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Deser 3</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">9 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Deser 4</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">14 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item border-zero">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Deser 5</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">19 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <!-- Inner page menu list -->
                <div class="menu-list">
                  <!-- Menu item heading -->
                  <h3>Napoje</h3>
                  <!-- Image for menu list -->
                  <img class="img-responsive" src="img/menu/menu4.jpg" alt="" />
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Napój 1</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">20 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Napój 2</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">10 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Napój 3</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">7 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Napój 4 </h4>
                    <!-- Dish price -->
                    <span class="price pull-right">9 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item border-zero">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Napój 5</h4>
                    <!-- Dish price -->
                    <span class="price pull-right"> 9 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <!-- Inner page menu list -->
                <div class="menu-list">
                  <!-- Menu item heading -->
                  <h3>Pizza</h3>
                  <!-- Image for menu list -->
                  <img class="img-responsive" src="img/menu/menu5.jpg" alt="" />
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Pizza 1</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">15 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Pizza 2</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">20 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Pizza 3</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">25 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Pizza 4</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">30 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item border-zero">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Pizza XXL 5</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">40 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <!-- Inner page menu list -->
                <div class="menu-list">
                  <!-- Menu item heading -->
                  <h3>Burgery</h3>
                  <!-- Image for menu list -->
                  <img class="img-responsive" src="img/menu/menu6.jpg" alt="" />
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Burger 1</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">10 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Burger 2</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">12 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Burger 3</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">15 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Burger 4</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">20 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Menu list items -->
                  <div class="menu-list-item border-zero">
                    <!-- Heading / Dish name -->
                    <h4 class="pull-left">Burger 5</h4>
                    <!-- Dish price -->
                    <span class="price pull-right">25 PLN</span>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Inner page menu end -->
         <!-- Sekcja z Parallaxa -->

        <section class="parallax parallax-1">
         
        <!-- <Parallaxa pierwsza> -->

       </section> 

          <div class="jumbotron" id="registration">
          <h1>Załóż konto!</h1>
          <h3><b> Załóż konto aby składać zamówienia On-line !!! Możliwość płatności PayPal zarejestruj się już teraz!</b></h3>
      
<p>Zamówienia przez internet stały się powszechne, zarządzający lokalami największych sieci restauracji już kilka lat temu zauważyli znaczący wzrost znaczenia internetu jako nowego kanału zamówień oferowanych produktów. Niegdyś służący głównie do prezentowania menu i danych kontaktowych internet przestaje służyć jedynie jako wizytówka lokalu, a staje się coraz bardziej znaczącym kanałem sprzedaży pozycji z menu restauracji. </br></br>

Klient ma możliwość złożenia zamówienia telefonicznego lub internetowego przez stronę Bistro AGH. Po zarejestrowaniu swojego konta może sie zalogować na stronę gdzie będzie mógł zamówić i zapłacić za poszczególne zamówienie. Wybrany produkt  zostaje przeniesiony do koszyka, który jest widoczny po kliknięciu na ikonę koszyka w pasku u góry strony. Wszystkie produkty znajdujące się w koszyku można edytować (usuwać, zmieniać ilość). Po wybraniu określonych produktów w koszyku należy kliknąć "złóż zamówienie" gdzie automatycznie zostaje przekierowanie do płatności w systemie PayPal.  <p>
              <p><a class="btn btn-primary btn-lg" href="registration.php" role="button">Zarejestruj się</a></p>
            </div>

<section class="parallax parallax-2">
         
        <!-- <Parallaxa druga> -->

       </section> 
        


       



        <!-- Sekcja kontaktowa -->

      <div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center"><b>Kontakt:</b></h2>
  <div class="row">
    <div class="col-sm-5">
      <b><span class="glyphicon glyphicon-time"></span> Godziny otwarcia: </b>
      <br/><br/>
            <p>Pn - Pt: 8:00 - 21:00</p>
            <p>Sobota: 9:00 - 22:00</p>
            <p>Niedziela: 11:00 - 21:00</p>
      <p>ADRES:<p>
        <p><span class="glyphicon glyphicon-map-marker"></span> Kraków, Nowa Huta os.Jakieśtam xx/xx</p>
        <p><span class="glyphicon glyphicon-phone"></span> +12 123 456 789</p>
        <p><span class="glyphicon glyphicon-envelope"></span> bistroAGH@agh.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">

        <div class="col-sm-6 form-group">
         <input class="form-control" id="name" name="from_name"  placeholder="Imię" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="from_email" placeholder="Email" type="email" required>
        </div>
        <div class="col-sm-12 form-group">
          <input class="form-control" name="mail_subject" placeholder="Temat wiadomości:" type="email" required>
        </div>
      </div>
      <textarea class="form-control" name="mail_body" placeholder="Treść wiadomości" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Wyślij</button>
        </div>
      </div>
    </div>
  </div>
</div>
 <!-- dodajemy google maps -->
<div id="googleMap" style="width:100%;height:400px;"></div>

<!-- Ikony z social media -->
<div class="social-media">
  <div class="container text-center">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-google-plus"></i></a>
    <a href="#"><i class="fa fa-skype"></i></a>
  </div>
</div>

<!-- Stopka -->

<footer>
  <div class="container">Stronę wykonał Paweł Łapiński w ramach pracy dyplomowej kierunku Programowanie Aplikacji Webowych.
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Polityka prywatności
    </button>© Wszelkie prawa zastrzeżone 
  </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">POLITYKA PRYWATNOŚCI</h4>
      </div>
      <div class="modal-body">
        <p>Serwis szanuje prywatność swoich użytkowników. Przeczytaj dokładnie poniższe informacje, aby lepiej zapoznać się z naszą polityką prywatności.
          <br><br><h4>Prawa autorskie</h4><br>
          Aplikacja została wykonana w ramach pracy dyplomowej na studiach kierunku "Programowanie Aplikacji Webowych".  Treści zawarte na tych stronach są przedmiotem praw autorskich przysługujących ich twórcy i podlegają ochronie zgodnie z prawem autorskim.
          <br><br><h4>Zastrzeżenia prawne i odpowiedzialność</h4><br>
          Wszelkie materiały zawarte w serwisie są bezpłatne. Użytkownicy oraz zespół serwisu nie odpowiadają za jakiekolwiek szkody wynikłe z ich korzystania. Serwis zastrzega sobie możliwość edycji i usuwania wpisów oraz blokowania użytkowników, którzy naruszają regulamin serwisu.
          <br><br><h4>Informacje logowania</h4><br>
          Podczas korzystania z serwisu Bistro AGH nasze serwery automatycznie rejestrują informacje przesyłane przez przeglądarkę użytkownika w trakcie wyświetlania witryny. Dzienniki serwera mogą zawierać takie informacje jak: żądanie sieciowe, adres IP, typ przeglądarki, język przeglądarki, data i godzina przesłania żądania oraz co najmniej jeden plik cookie.
          <br><br><h4>Cookies (ciasteczka)</h4><br>
          Pliki cookie to małe pliki tekstowe wykorzystywane do zapisywania pewnych informacji na Twoim komputerze. Cookies nie są szkodliwe ani dla Ciebie, ani dla Twojego komputera i danych, dlatego zalecamy niewyłączanie ich obsługi w przeglądarkach. Funkcja logowania w serwisie wymaga obsługi ciasteczek. Stosowanie cookies umożliwia podnoszenie jakości naszych usług oraz zwiększania zadowolenia naszych użytkowników dzięki przechowywaniu ich preferencji oraz śledzeniu trendów i sposobów poruszania się po serwisie.
        </p>
      </div>
      <div class="modal-footer">
        <p class="text-center">
        <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Zamknij</button>
        </p>
      </div>
    </div>
  </div>
</div>
</footer>

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(50.074230,20.046181),
    zoom:18,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYexilYA9tCS_u1G6I5Mnh5tp14MjcCF4&callback=myMap"></script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="www.googleapis.com/maps/api/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>

  </html>
