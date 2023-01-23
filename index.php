<?php

include_once "config.php";
$kac_var = $db->query("SELECT COUNT(mutluluk_ip) as mi FROM mutluluk_dileyenler")->fetch(PDO::FETCH_ASSOC);

$tarih1 = new DateTime("2018-08-28");
$tarih2 = new DateTime(date("Y-m-d"));
$interval = $tarih1->diff($tarih2);
?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>AyCan ❤️ <?php echo $interval->days ?> </title>
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>

<div class="container h-100">
    <div class="row h-100">
        <div class="col-md-12 d-flex align-items-center justify-content-center">
            <div class="ay">
                    <div class="row p-0 m-0 h-100 text-white text-center ">
                        <div class="col-md-12 text-white text-center">
                            <img src="img/love.svg" alt="" class="img-fluid aycan-img" >
                            <p class="lead" id="mesaj"><?php echo $kac_var['mi'] ?> Kişi Mutluluklar Diledi 😊 </p>
                            <form action="" method="post">
                                <button type="submit" name="mutluluk" id="dilekgonder" class="btn btn-aycan">Mutluluklar dile</button>
                            </form>
                        </div>
                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <?php
                        $gun_cikar=($interval->days+2)-4;
                        for ($i=$gun_cikar;$i<=$gun_cikar+4;$i++){
                            if ($i == $interval->days){
                                echo '<span class="gun bugun">'.$i.'</span>';
                            }
                            elseif ($i > $interval->days){
                                echo '<span class="gun text-muted">'.$i.'</span>';
                            }
                            else{
                                echo '<span class="gun">'.$i.'</span>';
                            }
                        }
                        ?>
                        </div>
                        <div class="col-md-12 col-md-12 d-flex align-items-center justify-content-center">
                            <h3><span class="badge badge-warning"><?php echo $interval->y == 0 ? "":$interval->y." YIL " ;?> <?php echo $interval->m == 0 ? "":$interval->m." AY " ;?> <?php echo $interval->d;?> GÜN</span> </h3>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

 <script type="text/javascript">
     $("#dilekgonder").on("click", function (event) {
         event.preventDefault();
         $.ajax({
             url: "ajax.php?islem=ekle",
             type: "POST",
             success: function (cevap) {
                 $('#mesaj').html( "<p class='lead'> Mutluluklar dileyen <span class='badge badge-danger'>" + cevap + "</span> . Kişisin 😍 <br> 🙈 Teşekkürler </p>");
             }
         });
     });
 </script>
</body>
</html>
