<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Galeria Bistro AGH</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="galeria.css">


</head>
<body>

<div class="container gallery-container">

    <h1>Galeria BISTRO AGH</h1>

    
        <p class="page-description text-center"><a href="index.php" type="button" class="btn btn-danger">Strona głowna</a></p>
    
    
    <div class="tz-gallery">

        <div class="row">

            <div class="col-sm-12 col-md-4">
                <a class="lightbox" href="./galeria/obrazek1.jpg">
                    <img src="./galeria/obrazek1.jpg" alt="Bistro AGH">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="./galeria/obrazek2.jpg">
                    <img src="./galeria/obrazek2.jpg" alt="Bistro AGH">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="./galeria/obrazek3.jpg">
                    <img src="./galeria/obrazek3.jpg" alt="Bistro AGH">
                </a>
            </div>
            <div class="col-sm-12 col-md-8">
                <a class="lightbox" href="./galeria/obrazek4.jpg">
                    <img src="./galeria/obrazek4.jpg" alt="Bistro AGH">
                </a>
            </div>
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="./galeria/obrazek5.jpg">
                    <img src="./galeria/obrazek5.jpg" alt="Bistro AGH">
                </a>
            </div> 
            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="./galeria/obrazek6.jpg">
                    <img src="./galeria/obrazek6.jpg" alt="Bistro AGH">
                </a>
            </div>

        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>