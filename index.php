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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>AyCan ❤️ <?php echo $interval->days ?> </title>
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
                                <input type="text" hidden value="<?php echo $_SERVER["REMOTE_ADDR"] ?>" name="ip">
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
                            <h3><span class="badge badge-warning"><?php echo $interval->y ==0 ? "":$interval->y ;?><?php echo $interval->m;?> AY <?php echo $interval->d;?> GÜN</span> </h3>
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
         var data = $('input[name="ip"]').val();
         $.ajax({
             url: "ajax.php?islem=ekle",
             type: "POST",
             data: "deger="+data,
             success: function (cevap) {
                 $('#mesaj').html( "<p class='lead'> Mutluluklar dileyen <span class='badge badge-danger'>" + cevap + "</span> . Kişisin 😍 <br> 🙈 Teşekkürler </p>");
             }
         });
     });
 </script>
</body>
</html>
