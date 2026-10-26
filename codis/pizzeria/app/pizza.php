<?php
	$preu = 10;
	if (empty($_GET['ingr'])) {
		echo "Has demanat només la pizza bàsica. El preu és $pvp € (IVA inclòs)<br>";
		exit(0);
	}
	else {
		$IVA=21;
		$pvp=((100+$IVA)/100)* ($preu+count($_GET['ingr']));
		echo "Has demanat la pizza bàsica amb:<br> ";
		foreach ($_GET['ingr'] as $ingredient) {
			if ($ingredient) {
				echo "* $ingredient<br>";
			}
		}
		echo "El preu de venda al públic és \$pvp € (IVA inclòs) <br>";
		// exit(0);
	}
?>