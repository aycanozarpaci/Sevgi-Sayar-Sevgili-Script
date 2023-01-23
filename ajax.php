<?php
include_once "config.php";



if($_GET['islem']=="ekle"){

        $ip_a=$_SERVER['REMOTE_ADDR'];
        $tarih_db=date('Y-m-d H.i.s');
        $bir_mi = $db->query("SELECT count(mutluluk_ip) as sayac FROM mutluluk_dileyenler WHERE mutluluk_ip='$ip_a'")->fetch(PDO::FETCH_ASSOC);
        if($bir_mi['sayac'] >=1){
            $kac_var = $db->query("SELECT mutluluk_id as mi FROM mutluluk_dileyenler WHERE mutluluk_ip='$ip_a'")->fetch(PDO::FETCH_ASSOC);
            echo $kac_var['mi'];
            echo "<script>swal(
              '😉',
              'Tekrar Tekrar Mutluluklar Dilediğine göre düğünde bir çeyrek takarsın artık 😂',
              'success'
            )</script>";
        }
        else{
            $mutluluk_ekle = $db->prepare("INSERT INTO mutluluk_dileyenler SET  mutluluk_ip=:ip,  mutluluk_tarih=:mt");
            $ekle= $mutluluk_ekle->execute(array(
                "ip" =>$ip_a,
                "mt" =>$tarih_db,
            ));
            if ( $ekle ){
                $kac_var = $db->query("SELECT mutluluk_id as mi FROM mutluluk_dileyenler WHERE mutluluk_ip='$ip_a'")->fetch(PDO::FETCH_ASSOC);
                $last_id = $db->lastInsertId();
                echo $kac_var['mi'];
                echo "<script>swal(
              '💝',
              'Mutluluğumuzu Paylaştığın İçin Teşekkürler',
              'success'
            )</script>";
            }
        }

}

?>