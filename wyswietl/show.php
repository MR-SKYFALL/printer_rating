<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../ism/css/my-slider.css" />
    <script src="../ism/js/ism-2.2.min.js"></script>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="show.css">
	<script type="text/javascript"  src="../jquery-3.3.1.js"></script>
	
	
    
</head>
<body>
       
    



<div id="php">
	<div id="head_bar2" >
        <button type="button" style='width=100%'  class="btn btn-secondary btn-lg btn-block">Drukarki znajdujace się w naszej bazie urządzeń</button>

</div>
	
<?php
$connect=new mysqli('localhost', 'root', '', 'drukarki');

if($connect->connect_errno){
	echo $connect->connect_errno;
	echo $connect->connect_error;
}
else
{

	//echo "polaczono z baza";
	$connect->query("SET CHARSET utf8");
	echo<<<HTML1
	<table  id='tabela'>
	
	<tr>
	<td class="kategoria">Producent <br> drukarki</td>
	<td class="kategoria" >Model</td>
	<td class="kategoria" >Typ</td>
	<td class="kategoria" >Szybkość druku <br> stron <br> kolor(na minutę)</td>
	<td class="kategoria" >Szybkość druku <br> stron <br> czarny(na minutę)</td>
	<td class="kategoria" >Obsługa Wifi</td>
	<td class="kategoria" >Dupleks</td>
	<td class="kategoria" >Okres gwarancyjny <br> ( w miesiącach)</td>
	<td class="kategoria" >Cena</td>
	<td class="kategoria" >Ocena <br> eksperta</td>
    <td class="kategoria" >Ocena <br> społeczności</td>
    <td class="kategoria" > Zdjecie </td>
	</tr>
HTML1;

    $query="SELECT * FROM drukarka";
	$result=$connect->query($query);

	
	
	$LICZNIK = 1;
	while($row=$result->fetch_assoc())
{
		
        $Producent_drukarki_ID = $row['producent_ID'];
        $Producent_drukarki_ID = (int)$Producent_drukarki_ID;

            $query_producent="SELECT * FROM producent WHERE producentID=$Producent_drukarki_ID";
            $result_producent=$connect->query($query_producent);
            $producent_array = $result_producent->fetch_assoc();
			$producent = $producent_array['producent'];
			
			

        $Model = $row['model'];
        $Typ_ID = $row['typ_ID'];

            $query_typ="SELECT * FROM typdrukarki WHERE typID=$Typ_ID";
            $result_typ=$connect->query($query_typ);
            $typ_array = $result_typ->fetch_assoc();
            $typ = $typ_array['typDrukarki'];
        
		$szybkosc_druku_kolor = $row['szybkoscDrukuKolor'];
		$szybkosc_druku_czarny = $row['szybkoscDrukuCzarny'];
		$obsluga_wifi = $row['wifi'];
		$duplex = $row['duplex'];
		$okres_gwarancyjny = $row['gwarancja'];
		$ocena_eksperta = $row['ocenaEksperta'];		
		$ocena_spolecznosci = $row['ocenaSpolecznosci'];
		$photo_path = $row['lokalizacja_zdjecia'];
		$cena = $row['cena'];
		if($szybkosc_druku_kolor==0)
		{
			$szybkosc_druku_kolor2 = "nie dotyczy";
		}
		else
		{
			$szybkosc_druku_kolor2 = $szybkosc_druku_kolor;
		}
		if($szybkosc_druku_czarny==0)
		{
			$szybkosc_druku_czarny2 = "nie dotyczy";
		}
		else
		{
				$szybkosc_druku_czarny2 = $szybkosc_druku_czarny;
		}
       	//$ocena_spolecznosci = number_format((float)$ocenaSpolecznosci, 2, '.', '');
		
echo<<<HTML2
	<tr>
	 <td  width="50" align="center"><div class='parameters$LICZNIK' ><div class='text' >$producent</div></div></td>
	<td  width="100" align="center"><div class='parameters$LICZNIK' ><div class='text' >$Model</div></div></td>
	<td  width="100" align="center"><div class='parameters$LICZNIK' ><div class='text' >$typ</div></div></td>
	<td  width="100" align="center"><div class='parameters$LICZNIK' ><div class='text' >$szybkosc_druku_kolor2</div></div></td>
	<td  width="100" align="center"><div class='parameters$LICZNIK' ><div class='text' >$szybkosc_druku_czarny2</div></div></td>
	<td  width="100" align="center"><div class='parameters$LICZNIK' ><div class='text' >$obsluga_wifi</div></div></td>
	<td  width="100" align="center"><div class='parameters$LICZNIK' ><div class='text' >$duplex</div></div></td>
	<td  width="100" align="center"><div class='parameters$LICZNIK' ><div class='text' >$okres_gwarancyjny</div></div></td>
	<td  width="100" align="center"><div class='parameters$LICZNIK' ><div class='text' >$cena</div></div></td>
	 <td  width="50" align="center"><div class='parameters$LICZNIK' ><div class='text' >$ocena_eksperta</div></div></td>
	 <td  width="50" align="center"><div class='parameters$LICZNIK' ><div class='text' >$ocena_spolecznosci</div></div></td>
	
	 <td  width="50" align="center"><div class='parameters$LICZNIK' ><div class='text' ></div><a href="$photo_path" ><img  class="zdjecie" src="$photo_path" alt="gallery thumbnail" /></a></div></td>

	</form>
	</td>
	</tr>
HTML2;
	
if($LICZNIK==1)
{
	$LICZNIK=2;
}
else
{
	$LICZNIK=1;
}
	}

	echo "</table>";	
}

	$connect->close();

?>
</div>



 <a id='powrot' href="../index.php">
            <button type="button" style="width: 100px"class="btn btn-outline-primary">powrot</button>
        </a>
<div id="margin" ></div>


<script src="show.js" ></script>




</body>
</html>