<?php
/**
 * Created by PhpStorm.
 * User: gabriel.malaquias
 * Date: 03/03/2016
 * Time: 16:15
 */

$emails ="";
$result = array();

$path = "C:/Users/gabriel.malaquias/desktop/EMAIL";
$diretorio = dir($path);
while ($arquivo = $diretorio->read()) {
    if($arquivo != "." && $arquivo != "..") {
        $arquivo = $path . "/" . $arquivo;
        $fp = fopen($arquivo, 'r');
        if (!$fp) {

        } else {
            $conteudo = fread($fp, filesize($arquivo));
            $emails .= $conteudo;
            fclose($fp);
        }
    }
}
$diretorio->close();


preg_match_all("/([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3}))/mi", $emails, $out, PREG_SET_ORDER);
if (is_array($out)) :
    $count = count($out);
    for ($i = 0; $i < $count; ++$i):
        $email = $out[$i][0];
        $ex = explode("@",$email);
        $result[$email] = $ex[1];
    endfor;
endif;

echo "<pre>";
print_r($result);



