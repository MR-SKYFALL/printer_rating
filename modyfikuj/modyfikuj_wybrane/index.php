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
                    if($wifi=='Nie')
                    {
                        $wifi = "<select name='wifi'  >
                            <option value='Nie' selected>Nie</option>
                            <option value='Tak'>Tak</option>
                        </select>";
                    }
                    else
                    {
                         $wifi = "<select name='wifi'  >
                            <option value='Nie'>Nie</option>
                            <option value='Tak' selected>Tak</option>
                        </select>";
                    }
                    //--------------------------------
                    //edycja duplexa dla selecta
                        $duplex = $row_wartosci['duplex'];
                        
                        if($duplex=='Nie')
                        {
                            $duplex = "<select name='duplex'  >
                                <option value='Nie' selected>Nie</option>
                                <option value='Tak'>Tak</option>
                            </select>";
                        }
                        else
                        {
                            $duplex = "<select name='duplex'  >
                                <option value='Nie' >Nie</option>
                                <option value='Tak' selected>Tak</option>
                            </select>";
                        }
                    //---------------------------------
                $gwarancja = $row_wartosci['gwarancja'];
                $cena = $row_wartosci['cena'];
                $ocena_eksperta = $row_wartosci['ocenaEksperta'];
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

            <button type="button"  class="btn btn-primary btn-lg btn-block">Witaj w kreatorze modyfikowania parametrów drukarki</button>

        </div>

        

        <form autocomplete="off" action="mod_wybrane.php"  method='POST' enctype="multipart/form-data">
            <div id='producent' class='params' >
                    <h2>Wpisz producenta drukarki</h2>
                    <div class="autocomplete" style="width:300px;">
          
                        <input type='hidden' value='$wybrane_id' name='wybrane_id' >
                        <input type='hidden' value='$lokalizacja_zdjecia' name='lokalizacja_zdjecia' >
           
                        <input class='basic_validation_inputs' id="myInput" type="text" value='$producent_mod'  name="producent" placeholder="wpisz producenta">
                    </div>
                    
            </div>
            

        <div id='model' class='params' >
                <h2>Wpisz model drukarki</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs' id='model_input' value='$model' type="text" name="model" placeholder="wpisz model">
                </div>
                
            </div>
            

            <div id='typ' class='params' >
                <h2>Wpisz typ drukarki</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs' id="myInput_typy" value="$typ_mod" type="text" name="typ" placeholder="wpisz typ">
                </div>
                
            </div>


            <div id='szybkosc_kolor' class='params' >
                <h2>Podaj szybkosc druku stron kolorowych (str/min)</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs' id='szybkosc_kolor' value="$szybkosc_kolor" type="number" min='1' name="szybkosc_kolor" placeholder="wpisz szybkosc">
                </div>
                
            </div>


            <div id='szybkosc_czarny' class='params' >
                <h2>Podaj szybkosc druku stron czarnych (str/min)</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs' id='szybkosc_czarny' value="$szybkosc_czarny" type="number"  min='1' name="szybkosc_czarny" placeholder="wpisz szybkosc">
                </div>
                
            </div>


            <div id='gwarancja' class='params' >
                <h2>podaj dlugosc gwarancji (miesiące)</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs' id='gwarancja' value="$gwarancja" type="number" name="gwarancja" placeholder="wpisz dlugosc">
                </div>
                
            </div>


            <div id='wifi' class='params' >
            <h2>wi-fi</h2>
                <div class="autocomplete" style="width:300px;">
                        $wifi
                </div>
                
            </div>


            <div id='duplex' class='params' >
            <h2>duplex</h2>
                <div class="autocomplete" style="width:300px;">
                    $duplex
                </div>
                
            </div>


            <div id='cena' class='params' >
            <h2>Podaj cene</h2>
                <div class="autocomplete" style="width:300px;">
                    <input id="myInput_cena" value='$cena' type="text" id='cena' name="cena" placeholder="wpisz cene">
                </div>
                
            </div>


            <div id='ocena_eksperta' class='params' >
            <h2>Podaj ocene eksperta</h2>
                <div class="autocomplete" style="width:300px;">
                    <input  type="text" id='ocena' value='$ocena_eksperta' name="ocena_eksperta" placeholder="wpisz opinie eksperta">
                </div>
                
            </div>

            <div id='zdjecie' class='params' >
                <h2>załącz zdjecie drukarki</h2>
                <div class="autocomplete" >
                    <img  id='zdjecie_drukarki'  src="../$lokalizacja_zdjecia" >
                    <input style='width:300px'  id='plik_zdjecie' name="zdjecie" type="file" accept="image/jpeg "  >
                    
                </div>
                
            </div>

            <div id='zakoncz' class='params' >
                <input id='button12' class='btn btn-primary' type="submit" value='zakoncz i dodaj do bazy' >
            </div>
            
        </form>
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

