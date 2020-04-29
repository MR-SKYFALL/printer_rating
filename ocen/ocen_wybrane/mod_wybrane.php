<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="../../bootstrap-4.2.1-dist/css/bootstrap.css">
        
        <script src="../../ism/js/ism-2.2.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript"  src="../../jquery-3.3.1.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
        $connect=new mysqli('localhost', 'root', '', 'drukarki');

        if($connect->connect_errno){
            echo $connect->connect_errno;
            echo $connect->connect_error;
        }
        else
        {
            $id = $_POST['id'];
            $ocena = $_POST['rating'];
            $query="SELECT * FROM drukarka WHERE drukarkaID=$id";
            $result_drukarka=$connect->query($query);
            $row=$result_drukarka->fetch_assoc();
            $ocena_z_bazy = $row['ocenaSpolecznosci'];
            $ilosc_ocen = $row['ilosc_ocen'];
            $suma = $ocena_z_bazy*$ilosc_ocen;
            $suma=$suma+$ocena;
            $nowa_ocena = $suma/($ilosc_ocen+1);
            $nowa_ocena = number_format((float)$nowa_ocena, 2, '.', '');
           // echo $nowa_ocena;
            $ilosc_ocen=$ilosc_ocen+1;
            $query2 = "UPDATE drukarka SET ocenaSpolecznosci='$nowa_ocena' , ilosc_ocen='$ilosc_ocen' WHERE drukarkaID='$id' ";
            $result_ADD=$connect->query($query2);
            
     echo<<< HTML1
            <div id="head_bar" >

            <button type="button" style="width:  70%;" class="btn btn-primary btn-lg btn-block"> Dziękujemy za wystawienie oceny drukarce </button>

            </div>
           <div id='div_counter' ><h2 class='counter_style'>zostaniesz przeniesiony do strony głównej za <div class='counter_style'  id='counter' >3</div></h2></div>
HTML1;
            header("Refresh: 3; URL=../../index.php");
          
        }
    ?>
    <script src="./mod_animation.js"></script>
</body>
</html>