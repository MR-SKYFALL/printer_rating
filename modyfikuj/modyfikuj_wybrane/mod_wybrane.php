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
            $wybrane_id = $_POST['wybrane_id'];
            //echo $wybrane_id;
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
            $poprzednia_sciezka_do_zdjecia = "../".$_POST['lokalizacja_zdjecia'];
           // echo $file;
            

            // pobiernaie nowo dodanego zdjecia
            
            $pos_backslash = strrpos($nazwa, "\\");
            $pos_dot = strrpos($nazwa, ".");
            $name_length = $pos_dot - $pos_backslash;
            $photo_name = substr($nazwa,$pos_backslash+1,$name_length-1);
            $photo_ex = substr($file,strrpos($file, "."));
            
            if(!($photo_ex=='.jpg'||$file==""))
            {

                echo "ZŁE ROZSZERZENIE ZDJECIA (WYMAGANE ROZSZERZENE TO .JPG)";
                
            }
            else
            {
                         $photo_path = '../gfx/'.$photo_name.$photo_ex;
            
            $sciezka = $_FILES['zdjecie']['name'];
            

            //KASOWANIE STAREGO ZDJECIA LUB NIE ( AKTUALIZACJA )
            if($sciezka=='')
            {
                $photo_path = $_POST['lokalizacja_zdjecia'];
            }
            else
            {
                 $usuwanie = unlink($poprzednia_sciezka_do_zdjecia);
                    if(!$usuwanie) 
                    {
                       // echo('Usunięcie nie było możliwe');
                    }
                    else {
                        //echo($usuwanie);
                       // echo("Plik $poprzednia_sciezka_do_zdjecia został usunięty pomyślnie");
                        move_uploaded_file($_FILES['zdjecie']['tmp_name'],"../".$photo_path);
                    }
                
            }

            //----------------------------------------------------------- <--- NIE ZAPOMNIJ O TYM

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
            //$query_add_others_params ="INSERT INTO drukarka(model,szybkoscDrukuKolor,szybkoscDrukuCzarny,gwarancja,wifi,duplex,cena,ocenaEksperta,lokalizacja_zdjecia,producent_ID,typ_ID) 
            //VALUES('$model','$szybkosc_kolor','$szybkosc_czarny','$gwarancja','$wifi','$duplex','$cena','$ocena_eksperta','$photo_path','$producent_id_integrity','$typ_id_integrity')";
          
            $query_update = "UPDATE drukarka SET model='$model' , szybkoscDrukuKolor='$szybkosc_kolor' , szybkoscDrukuCzarny='$szybkosc_czarny' , gwarancja='$gwarancja' , wifi='$wifi' , duplex='$duplex' , cena='$cena' , ocenaEksperta='$ocena_eksperta' , lokalizacja_zdjecia='$photo_path' , producent_ID='$producent_id_integrity' , typ_ID='$typ_id_integrity' WHERE drukarkaID='$wybrane_id' ";
            $result_query=$connect->query($query_update);
     echo<<< HTML1
            <div id="head_bar" >

            <button type="button" style="width:  70%;" class="btn btn-primary btn-lg btn-block">Twoja drukarka została zaktualizowana w bazie <br> Dziękujemy </button>

            </div>
           <div id='div_counter' ><h2 class='counter_style'>zostaniesz przeniesiony do strony głównej za <div class='counter_style'  id='counter' >3</div></h2></div>
HTML1;
            header("Refresh: 3; URL=../../index.php");
          
        
            }
        }
       
    ?>
    <script src="./mod_animation.js"></script>
</body>
</html>