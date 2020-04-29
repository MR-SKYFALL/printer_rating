<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.css">
        <link rel="stylesheet" href="../ism/css/my-slider.css" />
        <script src="../ism/js/ism-2.2.min.js"></script>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript"  src="../jquery-3.3.1.js"></script>
        
</head>
<body>
    <?php
        $connect=new mysqli('localhost', 'root', '', 'drukarki');

        if($connect->connect_errno){
            // echo $connect->connect_errno;
            // echo $connect->connect_error;
        }
        else
        {
            
            $producent_new = $_POST['producent'];
            $model = $_POST['model'];
            $typ_new = $_POST['typ'];
            $szybkosc_kolor = $_POST['szybkosc_kolor'];
            $szybkosc_czarny = $_POST['szybkosc_czarny'];
            $gwarancja = $_POST['gwarancja'];
            $wifi = $_POST['wifi'];
            $duplex = $_POST['duplex'];
            $cena = $_POST['cena'];
            $ocena_eksperta = $_POST['ocena_eksperta'];
            $file = $_FILES['zdjecie']['name'];
            $nazwa = $_FILES['zdjecie']['tmp_name'];
            $ilosc_ocen = 0;
            //echo $nazwa;
           // echo "<br>";
            // OBSŁUGA ZDJECIA
            $pos_backslash = strrpos($nazwa, "\\");
            $pos_dot = strrpos($nazwa, ".");
            $name_length = $pos_dot - $pos_backslash;
            $photo_name = substr($nazwa,$pos_backslash+1,$name_length-1);
            $photo_ex = substr($file,strrpos($file, "."));

            if(!($photo_ex=='.jpg'))
            {
                echo "ZŁE ROZSZERZENIE ZDJECIA (WYMAGANE ROZSZERZENE TO .JPG)";
                
            }
            else
            {
            $photo_path = '../gfx/'.$photo_name.$photo_ex;
           // echo $photo_name;
           // echo $photo_path;
            move_uploaded_file($_FILES['zdjecie']['tmp_name'],$photo_path);
            $sciezka = $_FILES['zdjecie']['name'];
            //---------------------------------------------

            //-----SPRAWDZENIE CZY PRODUCENT ISTNIEJE
            $producent_id_integrity;
            $typ_id_integrity;
            if($producent_new!='')
            {
                $query_is_producer_exists = "SELECT * FROM producent WHERE producent='$producent_new'";
                $result_producent_exists=$connect->query($query_is_producer_exists);
                $producent_array = $result_producent_exists->fetch_assoc();
                $producent = $producent_array['producent'];
                //echo "<pre>",var_dump($producent_array),"<pre>"; // var dump słuszy do wyswieltania calej tablicy natomiast <pre></pre> jest po to aby talica nie zostala wyswietnoa w jeden lini 
                if($producent_array==NULL)
                {
                   // echo "nie ma takiego producenta";
                    $query_insert_new_producet ="INSERT INTO producent(producent) 
                    VALUES('$producent_new')";
                    $connect->query($query_insert_new_producet);

                    //POBRANIE ID NOWO DODANEGO TYPU
                    $query_is_producer_exists_2 = "SELECT * FROM producent WHERE producent='$producent_new'";
                    $result_producent_exists_2=$connect->query($query_is_producer_exists);
                    $producent_array_2 = $result_producent_exists_2->fetch_assoc();
                    $producent_id_integrity = $producent_array_2['producentID'];
                    //echo $producent_id_integrity;
                    //-----------------------------
                }
                else{
                    //echo "jest taki producent";
                    $producent_id_integrity = $producent_array['producentID'];
                    //echo $producent_id_integrity;
                    
                }
            }
            
            //--------------------------------------------------

            // SPRAWDZENIE CZY TAKI TYP DRUKARKI JUZ ISTNIEJE
            if($typ_new!='')
            {
                $query_is_type_exists = "SELECT * FROM typdrukarki WHERE typDrukarki='$typ_new'";
                $result_typ_exists=$connect->query($query_is_type_exists);
                $typ_array = $result_typ_exists->fetch_assoc();
                $typ = $typ_array['typDrukarki'];
               // echo "<pre>",var_dump($typ_array),"<pre>"; // var dump słuszy do wyswieltania calej tablicy natomiast <pre></pre> jest po to aby talica nie zostala wyswietnoa w jeden lini 
                if($typ_array==NULL)
                {
                   // echo "nie ma takiego typu";
                    $query_insert_new_typ ="INSERT INTO typdrukarki(typDrukarki) 
                    VALUES('$typ_new')";
                    $connect->query($query_insert_new_typ);
                    //POBRANIE ID NOWO DODANEGO TYPU
                    $query_is_type_exists_2 = "SELECT * FROM typdrukarki WHERE typDrukarki='$typ_new'";
                    $result_typ_exists_2=$connect->query($query_is_type_exists_2);
                    $typ_array_2 = $result_typ_exists_2->fetch_assoc();
                    $typ_id_integrity = $typ_array_2['typID'];
                   // echo $typ_id_integrity;
                    //-----------------------------
                }
                else{
                    //echo "jest taki typ";
                    $typ_id_integrity = $typ_array['typID'];
                    //echo $typ_id_integrity;
                }
            }
            //---------------------------------------------------
            //DODANIE POZOSTALYCH PARAMETOW
            $query_add_others_params ="INSERT INTO drukarka(model,szybkoscDrukuKolor,szybkoscDrukuCzarny,gwarancja,wifi,duplex,cena,ocenaEksperta,lokalizacja_zdjecia,producent_ID,typ_ID,ilosc_ocen) 
            VALUES('$model','$szybkosc_kolor','$szybkosc_czarny','$gwarancja','$wifi','$duplex','$cena','$ocena_eksperta','$photo_path','$producent_id_integrity','$typ_id_integrity','$ilosc_ocen')";
            $connect->query($query_add_others_params);
echo<<< HTML1
            <div id="head_bar" >

            <button type="button" style="width:  70%;" class="btn btn-primary btn-lg btn-block">Twoja nowa drukarka została dodana do bazy <br> Dziękujemy </button>

            </div>
           <div id='div_counter' ><h2 class='counter_style'>zostaniesz przeniesiony do strony głównej za <div class='counter_style'  id='counter' >3</div></h2></div>
HTML1;
            header("Refresh: 3; URL=../index.php");
            //  echo "<br>";
            //  echo  $producent_new;
            // echo "<br>";
            // echo  $model;
            // echo "<br>";
            // echo  $typ_new;
            // echo "<br>";
            // echo  $szybkosc_kolor;
            // echo "<br>";
            // echo  $szybkosc_czarny;
            // echo "<br>";
            // echo  $gwarancja;
            // echo "<br>";
            // echo  $wifi;
            // echo "<br>";
            // echo  $duplex;
            // echo "<br>";
            // echo  $cena;
            // echo "<br>";
            // echo  $ocena_eksperta;
            // echo "<br>";
            // echo  $file;
            // echo "<br>";
            // echo  $nazwa;
           
            // $query2 ="INSERT INTO pytaniatib(tresc,odpa,odpb,odpc,odpd,odpowiedz,kategoria,rok) 
            // VALUES('$tresc','$odpa','$odpb','$odpc','$odpd','$odpowiedz','$kategoria','$rok')";
            // $connect->query($query2);

            //-------------------------------------------------------------------------
        }
            }

            
    ?>
    <script src="./dodaj_animation.js"></script>
</body>
</html>