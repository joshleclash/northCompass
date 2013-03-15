<?php
function genera_password($longitud,$tipo="alfanumerico"){

if ($tipo=="alfanumerico"){
$exp_reg="[^A-Z0-9]";
} elseif ($tipo=="numerico"){
$exp_reg="[^0-9]";
}

return substr(preg_replace($exp_reg, "", md5(time())) .
                preg_replace($exp_reg, "", md5(time())) .
                preg_replace($exp_reg, "", md5(time())),
0, $longitud);
}
?>