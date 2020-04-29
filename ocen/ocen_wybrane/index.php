<html lang="pl">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="../../bootstrap-4.2.1-dist/css/bootstrap.css">
        
        <script src="../../ism/js/ism-2.2.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript"  src="../../jquery-3.3.1.js"></script>

    </head>

    <body>


        <div id='powrot' >
                    <a href="../../index.php">
                        <div class="basicBox">
                            Powrót
                            <svg width="130" height="65" viewBox="0 0 130 65" >
                                <rect x='0' y='0' fill='none' width='130' height='65'/>
                            </svg>
                        </div>
                    </a>
                    

        </div>

        <?php
        
            $connect=new mysqli('localhost', 'root', '', 'drukarki');

            if($connect->connect_errno){
                echo $connect->connect_errno;
                echo $connect->connect_error;
            }
            else
            {
                //pobieranie producenta -----------------------------------
                        $query_producent="SELECT * FROM producent";
                        $result_producent=$connect->query($query_producent);
                        $producenci = array();
                        while($row=$result_producent->fetch_assoc())
                        {
                        
                            $producent = $row['producent'];  
                            array_push($producenci,$producent);
                            
                        }
                    // print_r($producenci);
            //-----------------------------------------------------------

            // pobiernaie typu -------------------------------------
                        $query_typ="SELECT * FROM typdrukarki";
                        $result_typ=$connect->query($query_typ);
                        $typy = array();
                        while($row2=$result_typ->fetch_assoc())
                        {
                        
                            $typ = $row2['typDrukarki'];  
                            array_push($typy,$typ);
                            
                        }
                    //print_r($typy);
            //------------------------------------

            //pobieranie ustawionych wczesniej wartosci drukarki

                $wybrane_id = $_POST['id_modyfikuj'];
               
                $query_wartosci_do_modyfikacji="SELECT * FROM drukarka WHERE drukarkaID=$wybrane_id";
                $result_wartosci_do_modyfikacji = $connect->query($query_wartosci_do_modyfikacji);        
                $row_wartosci=$result_wartosci_do_modyfikacji->fetch_assoc();
            
                $model = $row_wartosci['model'];
                $szybkosc_kolor = $row_wartosci['szybkoscDrukuKolor'];
                $szybkosc_czarny = $row_wartosci['szybkoscDrukuCzarny'];
                    // edycja $wifi pod selecta
                    $wifi = $row_wartosci['wifi'];
                    
                    //--------------------------------
                    //edycja duplexa dla selecta
                        $duplex = $row_wartosci['duplex'];
                        
                        
                    //---------------------------------
                $gwarancja = $row_wartosci['gwarancja'];
                $cena = $row_wartosci['cena'];
                $ocena_eksperta = $row_wartosci['ocenaEksperta'];
                $ocena_spolecznoci = $row_wartosci['ocenaSpolecznosci'];
                $lokalizacja_zdjecia = $row_wartosci['lokalizacja_zdjecia'];
                $lokalizacja_zdjecia = $lokalizacja_zdjecia;
            

                $producenct_id = $row_wartosci['producent_ID'];
                //sieganie po producenta do modyfikacji
                        $query_producent_mod="SELECT * FROM producent WHERE producentID=$producenct_id";
                        $result_producent_mod=$connect->query($query_producent_mod);
                        $producent_row_mod=$result_producent_mod->fetch_assoc();

                        $producent_mod = $producent_row_mod['producent'] ;//<----- pobrany producent
                        
                //---------------------------------
                $typ_id = $row_wartosci['typ_ID'];
                //sieganie po typ drukarki do modyfikcaji
                        $query_typ_mod="SELECT * FROM typdrukarki WHERE typID=$typ_id";
                        $result_typ_mod=$connect->query($query_typ_mod);
                        $typ_row_mod=$result_typ_mod->fetch_assoc();

                        $typ_mod = $typ_row_mod['typDrukarki'] ; // <----- pobrany typ druakarki
                       

                //----------------------------------------

            //-----------------------------------------

                        
            
        
        echo<<<HTML4

        <div id="head_bar" >

            <button type="button"  class="btn btn-primary btn-lg btn-block">Witaj <br> Powiedz nam co myślisz o drukarce</button>

        </div>
    <div id='main' >
        <div id='content'>
                <div id="parametry" >
                    <div><h3>Producent drukarki:</h3></div>
                    <div><h3>Model drukarki:</h3></div>
                    <div><h3>Typ drukarki:</h3></div>
                    <div><h3>Szybkość wydruku stron kolorowych:</h3></div>
                    <div><h3>Szybkość wydruku stron czarno-białych:</h3></div>
                    <div><h3>Czy obsługuje wi-fi:</h3></div>
                    <div><h3>Czy obsługuje duplex:</h3></div>
                    <div><h3>Długość gwarancji:</h3></div>
                    <div><h3>Cena:</h3></div>
                    <div><h3>Ocena Eksperta:</h3></div>
                    <div><h3>Ocena Społeczności:</h3></div>
                
                </div>
                <div id="wartosci" >
                    <div><h3>$producent_mod</h3></div>
                    <div><h3>$model</h3></div>
                    <div><h3>$typ_mod</h3></div>
                    <div><h3>$szybkosc_kolor</h3></div>
                    <div><h3>$szybkosc_czarny</h3></div>
                    <div><h3>$wifi</h3></div>
                    <div><h3>$duplex</h3></div>
                    <div><h3>$gwarancja</h3></div>
                    <div><h3>$cena</h3></div>
                    <div><h3>$ocena_eksperta</h3></div>
                    <div><h3>$ocena_spolecznoci</h3></div>
                </div>
                <div id='photo_div' ><img id='photo' src='../$lokalizacja_zdjecia' ></div>
        </div>

        <div id='main_grade' >
            <div  ><h1 id='jak_oceniasz' >Jak oceniasz drukarke</h1></div>
            
            
            <div id='grade' >
                <div class="wrapper">
                <form action="mod_wybrane.php"  method='POST' >
                <span class="rating">
                    <input type='hidden' value='$wybrane_id' name='id' >
                    <input id="rating10" type="radio" name="rating" value="10">
                    <label for="rating10">10</label>
                    <input id="rating9" type="radio" name="rating" value="9">
                    <label for="rating9">9</label>
                    <input id="rating8" type="radio" name="rating" value="8">
                    <label for="rating8">8</label>
                    <input id="rating7" type="radio" name="rating" value="7">
                    <label for="rating7">7</label>
                    <input id="rating6" type="radio" name="rating" value="6">
                    <label for="rating6">6</label>
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3">
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
                </div>
               <button type="submit" style="width: 100px"class="btn btn-outline-primary">oceń</button>
               </form>
        </div>
    </div>

        
        
        
    

        

        
HTML4;
                    }
?>
        <script>
            
                var producenci =  <?php  echo  json_encode ( $producenci ); ?> ;
                var typy =  <?php  echo  json_encode ( $typy ); ?> ;
                
        </script>
        
        <script src='autocomplete_typ.js' ></script>
        <script src='autocomplete_producent.js' ></script>
        <script src='animation.js'></script>
        <script src='next_params.js' ></script>
        <script src='validation_cena.js' ></script>
        
        
<div id='margin' ></div>
    </body>
</html>

