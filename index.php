<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="ism/css/my-slider.css" />
    <script src="ism/js/ism-2.2.min.js"></script>
    <link rel="stylesheet" href="style.css">
    

 <?php 
$db_location = "localhost"; 
$db_user = "root"; 
$db_psw = ""; 
$connect = new mysqli($db_location, $db_user, $db_psw);
if($connect->connect_errno){
	echo $connect->connect_errno;
	echo $connect->connect_error;
}
$db_name = "drukarki";
$utf8 = "SET CHARSET `UTF8`";
$createDB = "CREATE DATABASE IF NOT EXISTS `$db_name`";
// CREATE DATABASE IF NOT EXISTS `drukarki`

$createTab = "CREATE TABLE `drukarka` (
  `drukarkaID` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `szybkoscDrukuKolor` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `szybkoscDrukuCzarny` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `wifi` varchar(4) COLLATE utf8_polish_ci NOT NULL,
  `duplex` varchar(4) COLLATE utf8_polish_ci NOT NULL,
  `gwarancja` int(4) NOT NULL,
  `cena` float(10,0) NOT NULL,
  `ocenaEksperta` float NOT NULL,
  `ocenaSpolecznosci` float NOT NULL,
  `ilosc_ocen` int(10) NOT NULL,
  `lokalizacja_zdjecia` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `producent_ID` int(4) NOT NULL,
  `typ_ID` int(4) NOT NULL,
  PRIMARY KEY (`drukarkaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
";

$create_forgin_key = "ALTER TABLE `drukarka`
  ADD KEY `producent_ID` (`producent_ID`),
  ADD KEY `typ_ID` (`typ_ID`);";


$createProducent = "CREATE TABLE `producent` (
  `producentID` int(11) NOT NULL AUTO_INCREMENT,
  `producent` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`producentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
";


$createTyp = "CREATE TABLE `typdrukarki` (
  `typID` int(11) NOT NULL AUTO_INCREMENT,
  `typDrukarki` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`typID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
";

if($connect->connect_errno)
			{
				echo "<script> console.log('Nie zaladowano bazy'); </script>";
			} else { 
        $connect->query($createDB);
        $connect->select_db($db_name);
        $connect->query($createTab);
        $connect->query($createProducent);
        $connect->query($createTyp);
        $connect->query($create_forgin_key);
        
       }
$connect->close(); 




      
?>

    
</head>
<body>
    
    <div id="head_bar" >
        <button type="button" style="width:  70%;" class="btn btn-primary btn-lg btn-block">ocen-drukarke.pl - z nami
    prześwietlisz każdą drukarkę</button>

    </div>

<div id="back">
    <div id="main">
        <a href="wyswietl/show.php">
            <button type="button" style="width: 100px"class="btn btn-outline-primary">wyświetl</button>
        </a>
        <a href="dodaj/index.php">
            <button type="button" style="width: 100px"class="btn btn-outline-primary">dodaj</button>
        </a>
        <a href="usun/show.php">
            <button type="button" style="width: 100px"class="btn btn-outline-primary">usuń</button>
        </a>
        <a href="modyfikuj/show.php">
            <button type="button" style="width: 100px"class="btn btn-outline-primary">modyfikuj</button>
        </a>
        <a href="ocen/show.php">
            <button type="button" style="width: 100px"class="btn btn-outline-primary">oceń</button>
        </a>
        <a href="./kontakt/index.html">
            <button type="button" style="width: 100px"class="btn btn-outline-primary">kontakt</button>
        </a>
    </div>
</div>



</div>

<div id="slider_main" >
    <div id="slider">
        <div class="ism-slider" data-play_type="loop" data-image_fx="zoompan" id="my-slider">
            <ol>
                <li>
                    <img src="ism/image/slides/_u/1549479529907_279860.jpg">
                </li>
              
                <li>
                    <img src="ism/image/slides/_u/1549479529244_486217.jpg">
                </li>
                <li>
                    <img src="ism/image/slides/_u/1549479529089_729624.jpeg">
                </li>
                <li>
                    <img src="ism/image/slides/_u/1549479529035_609027.jpg">
                </li>
            </ol>
        </div>
    </div> 
</div>


<div id="margin" ></div>

<button type="button" class="btn btn-secondary btn-lg btn-block">created by Dawid Matras </button>
</body>
</html>