<?php

/*
 * Criado por VinnyBrown;
 */

$ativo = true; 
$pagina = "adx";
$pagina2 = "adx2"; 

################### Não alterar o código ###################
$ads = <<<EOF
			<!-- Start Tags for tanksystem.net-MB-SSP-091416(8721) - tanksystem.net-MB-SSP-091416(10459) - 300x250 -->
<script type='text/javascript' src='http://a.ad-sys.com/c/banner_s?tenant=AD&selection=10459&size=300x250&skin=script&di=1'></script>
<!-- End Tags for tanksystem.net-MB-SSP-091416(8721) - tanksystem.net-MB-SSP-091416(10459) - 300x250 -->

EOF;
$ads2 = <<<EOF
			<!-- Start Tags for tanksystem.net-MB-SSP-091416(8721) - tanksystem.net-MB-SSP-091416(10459) - 300x250 -->
<script type='text/javascript' src='http://a.ad-sys.com/c/banner_s?tenant=AD&selection=10459&size=300x250&skin=script&di=1'></script>
<!-- End Tags for tanksystem.net-MB-SSP-091416(8721) - tanksystem.net-MB-SSP-091416(10459) - 300x250 -->

EOF;
$rd = rand(0,9999999).rand(0,9999999).uniqid();
$aif = <<<EOF




EOF;
switch ($_SERVER['QUERY_STRING']) {
    case $pagina:
        if ($ativo) {
            echo $aif;
            echo <<<EOF
    <head>
    <style>body{margin:0;padding:0;overflow:hidden}</style><script type="text/javascript">if(window.self===window.top){window.location="/index.php"}else{};</script>
	
			<body>
				{$ads}
			</body>
EOF;
        }
    case $pagina2:
        if ($ativo) {
            echo $aif;
            echo <<<EOF
            <style>body{margin:0;padding:0;overflow:hidden}</style><script type="text/javascript">if(window.self===window.top){window.location="/index.php"}else{};</script>
			<body>
				{$ads2}
			</body>
EOF;
        }
        exit();

    default:

        if($ativo) {
            echo <<<EOF
            <script type="text/javascript" src=""></script>
EOF;
        }
        break;
}

  ?>