<?php

include('sphinxapi.php');

$cl = new SphinxClient();
$cl->SetServer( "localhost", 9312 );

$cl->SetMatchMode( SPH_MATCH_ALL  ); // ищем хотя бы 1 слово из поисковой фразы

$result = $cl->Query($argv[1]); // поисковый запрос
//Веселые и грустные (комплект из 5 аудиокниг MP3)
// обработка результатов запроса
if ( $result === false ) { 
echo "Query failed: " . $cl->GetLastError() . ".\n"; // выводим ошибку если произошла
}
else {
if ( $cl->GetLastWarning() ) {
echo "WARNING: " . $cl->GetLastWarning() . " // выводим предупреждение если оно было";
}

if ( ! empty($result["matches"]) ) { // если есть результаты поиска - обрабатываем их
foreach ( $result["matches"] as $product => $info ) {
echo "\n".$product . "\n"; // просто выводим id найденных товаров
}
}
}

  exit;
