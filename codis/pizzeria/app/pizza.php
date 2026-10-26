<?php
	$pvp = 8;
	if (empty($_GET['ingr'])) {
		echo "Has demanat només la pizza bàsica. El preu és $pvp € (IVA inclòs)<br>";
		exit(0);
	}
	else {
		$IVA=21;
		$pvp=((100+$IVA)/100)*(8+count($_GET['ingr']));
		echo "Has demanat la pizza bàsica amb:<br> ";
		foreach ($_GET['ingr'] as $ingredient) {
			if ($ingredient) {
				echo "* $ingredient<br>";
			}
		}
		echo "El preu és $pvp € (IVA inclòs)<br>";
		exit(0);
	}
?>