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
        <div id='powrot' >
            <a href="../index.php">
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
                        
            }
        ?>
        
        <div id="head_bar" >

            <button type="button" style="width:  70%;" class="btn btn-primary btn-lg btn-block">Witaj w kreatorze dodawania nowej drukarki</button>

        </div>

        

        <form autocomplete="off" action="dodaj.php"  id='ismForm'  method='POST' enctype="multipart/form-data">
            <div id='producent' class='params' >
                    <h2>Wpisz producenta drukarki</h2>
                    <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs' id="myInput" type="text" name="producent" placeholder="wpisz producenta">
                    </div>
                    <input id='button1' class='btn btn-primary basic_validation_buttons' type="button" value='dodaj' >
            </div>
            

        <div id='model' class='params' >
                <h2>Wpisz model drukarki</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs'  type="text" name="model" placeholder="wpisz model">
                </div>
                <input id='button2' class='btn btn-primary basic_validation_buttons' type="button" value='dodaj' >
            </div>
            

            <div id='typ' class='params' >
                <h2>Wpisz typ drukarki</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs' id="myInput_typy" type="text" name="typ" placeholder="wpisz typ">
                </div>
                <input id='button3' class='btn btn-primary basic_validation_buttons' type="button" value='dodaj' >
            </div>


            <div id='szybkosc_kolor' class='params' >
                <h2>Podaj szybkosc druku stron kolorowych (str/min)</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs'  type="number" min='0' name="szybkosc_kolor" placeholder="wpisz szybkosc">
                </div>
                <input id='button4' class='btn btn-primary basic_validation_buttons' type="button" value='dodaj' >
            </div>


            <div id='szybkosc_czarny' class='params' >
                <h2>Podaj szybkosc druku stron czarnych (str/min)</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs'  type="number"  min='0' name="szybkosc_czarny" placeholder="wpisz szybkosc">
                </div>
                <input id='button5' class='btn btn-primary basic_validation_buttons' type="button" value='dodaj' >
            </div>


            <div id='gwarancja' class='params' >
                <h2>podaj dlugosc gwarancji (miesiące)</h2>
                <div class="autocomplete" style="width:300px;">
                        <input class='basic_validation_inputs'  type="number" name="gwarancja" placeholder="wpisz dlugosc">
                </div>
                <input id='button6' class='btn btn-primary basic_validation_buttons' type="button" value='dodaj' >
            </div>


            <div id='wifi' class='params' >
            <h2>wi-fi</h2>
                <div class="autocomplete" style="width:300px;">
                        <select name='wifi' >
                            <option value="Nie">Nie</option>
                            <option value="Tak">Tak</option>
                        </select>
                </div>
                <input id='button7' class='btn btn-primary ' type="button" value='dodaj' >
            </div>


            <div id='duplex' class='params' >
            <h2>duplex</h2>
                <div class="autocomplete" style="width:300px;">
                        <select name='duplex'  >
                            <option value="Nie">Nie</option>
                            <option value="Tak">Tak</option>
                        </select>
                </div>
                <input id='button8' class='btn btn-primary ' type="button" value='dodaj' >
            </div>


            <div id='cena' class='params' >
            <h2>Podaj cene</h2>
                <div class="autocomplete" style="width:300px;">
                    <input id="myInput_cena" type="text" name="cena" placeholder="wpisz cene">
                </div>
                <input id='button9' class='btn btn-primary' type="button" value='dodaj' >
            </div>


            <div id='ocena_eksperta' class='params' >
            <h2>Podaj ocene eksperta</h2>
                <div class="autocomplete" style="width:300px;">
                    <input id="myInput_typy" type="text" name="ocena_eksperta" placeholder="wpisz opinie eksperta">
                </div>
                <input id='button10' class='btn btn-primary' type="button" value='dodaj' >
            </div>

            <div id='zdjecie' class='params' >
                <h2>załącz zdjecie drukarki</h2>
                <div class="autocomplete" >
                    <input style='width:300px' id='plik_zdjecie' name="zdjecie" type="file" accept="image/jpeg"  >
                </div>
                <input id='button11' class='btn btn-primary' type="button" value='dodaj' >
            </div>

            <div id='zakoncz' class='params' >
                <input id='button12' class='btn btn-primary' type='submit' value='zakoncz i dodaj do bazy' >
            </div>
            
        </form>
        <div id='margin' ></div>

        <script>
            
                var producenci =  <?php  echo  json_encode ( $producenci ); ?> ;
                var typy =  <?php  echo  json_encode ( $typy ); ?> ;
                
        </script>
        
        <script src='autocomplete_typ.js' ></script>
        <script src='autocomplete_producent.js' ></script>
        <script src='animation.js'></script>
        <script src='next_params.js' ></script>
        <script src='validation_cena.js' ></script>
        
        

    </body>
</html>

