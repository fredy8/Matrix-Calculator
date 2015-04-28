<?php
	function parseMatrix($rawMatrix) {
		$matrix = [];

		$rows = explode(";", $rawMatrix);

		for($i = 0; $i < count($rows); $i++) {
			array_push($matrix, explode(",", $rows[$i]));
		}

		return $matrix;
	}

	function scale($m1, $scalar) {

		for($i = 0; $i < count($m1); $i++) {
			for($j = 0; $j < count($m1[0]); $j++) {
				$m1[$i][$j] *= $scalar;
			}
		}

		return $m1;
	}

	function add($m1, $m2) {
		$R = count($m1);
		$C = count($m1[0]);

		for($i = 0; $i < $R; $i++) {
			for($j = 0; $j < $C; $j++) {
				$m1[$i][$j] += $m2[$i][$j];
			}
		}

		return $m1;
	}

	function subtract($m1, $m2) {
		$neg = scale($m2, -1);
		return add($m1, $neg);
	}

	function multiply($m1, $m2) {
		$result = [];

		$R = count($m1);
		$C = count($m2[0]);

		for($i = 0; $i < $R; $i++) {
			array_push($result, []);
			for($j = 0; $j < $R; $j++) {
				array_push($result[$i], 0);
			}
		}

		for($i = 0; $i < $R; $i++) {
			for($j = 0; $j < $C; $j++) {
				for($k = 0; $k < count($m1[0]); $k++) {
					$result[$i][$j] += $m1[$i][$k] * $m2[$k][$j];
				}
			}
		}

		return $result;
	}

	function swap(&$x,&$y) {
		$x ^= $y ^= $x ^= $y;
	}

	function inverse($a) {
		// $b = identity(count($m));
		// $n = count(m)
		// $m = count($b[0]);

		// $EPS = .00000001;

		// $irow = [], $icol = [], $ipiv = [];
		// for($i = 0; $i < $n; $i++) {
		// 	array_push($irow, 0);
		// 	array_push($icol, 0);
		// 	array_push($ipiv, 0);
		// }

		// $det = 1;

		// for($i = 0; $i < $n; $i++) {
		// 	$pj = -1, $pk = -1;

		// 	for($j = 0; $j < $n; $j++) if ($ipiv[$j] == 0)
		// 		for($k = 0; $k < $n; $k++) if ($ipiv[$k] == 0)
		// 			if ($pj == -1 || abs($a[$j][$k]) > abs(a[$pj][$pk])) { $pj = $j; $pk = $k; }

		// 	if (abs($a[$pj][$pk]) < $EPS) return -1;

		// 	$ipiv[$pk]++;
		// 	swap($a[$pj], $a[$pk]);
		// 	swap($b[$pj], $b[$pk]);

		// 	if ($pj != $pk) det *= -1;

		// 	$irow[$i] = $pj;
		// 	$icol[$i] = $pk;

		// 	$c = 1 / $a[$pk][$pk];
		// 	$det *= $a[$pk][$pk];
		// 	$a[$pk][$pk] = 1.0;

		// 	for($p = 0; $p < $n; $p++)
		// 		$a[$pk][$p] *= $c;

		// 	for($p = 0; $p < $m; $p++)
		// 		$b[$pk][$p] *= $c;

		// 	for($p = 0; $p < $n; $p++) if ($p != $pk) {
		// 		$c = $a[$p][$pk];
		// 		$a[$p][$pk] = 0;

		// 		for($q = 0; $q < $n; $q++)
		// 			$a[$p][$q] -= $a[$pk][$q] * $c;

		// 		for($q = 0; $q < $m; $q++)
		// 			$b[$p][$q] -= $b[$pk][$q] * $c;
		// 	}
		// }

		// for($p = $n-1; $p >= 0; $p--) if ($irow[$p] != $icol[$p]) {
		// 	for($k = 0; $k < $n; $k++) swap($a[$k][$irow[$p]], $a[$k][$icol[$p]]);
		// }

		// return A;
	}

	function identity($size) {
		$result = [];
		for($i = 0; $i < $size; $i++) {
			array_push($result, []);
			for($j = 0; $j < $size; $j++) {
				array_push($result[$i], $i == $j ? 1 : 0);
			}
		}

		return $result;
	}

	function power($m, $exp) {
		if($exp == 1) {
			return $m;
		}

		$result = identity(count($m));

		if($exp == 0) {
			return $result;
		}

		while($exp !== 0) {
			if($exp%2 == 1) {
				$result = multiply($result, $m);
			};

			$m = multiply($m, $m);
			$exp = (int) $exp/2;
		}

		return $result;
	}

	function toString($m) {
		$result = "";

		for($i = 0; $i < count($m); $i++) {
			if ($i !== 0) {
				$result .= ";";
			}

			$result .= implode(",", $m[$i]);
		}

		return $result;
	}

	$matrix1 = parseMatrix($_REQUEST["matrix1"]);
	// echo "input: ";
	// echo toString($matrix1);
	// echo "<pre>\n</pre>";
	switch($_REQUEST["op"]) {
		case "add":
			$matrix2 = parseMatrix($_REQUEST["matrix2"]);
			echo toString(add($matrix1, $matrix2));
			break;
		case "subtract":
			$matrix2 = parseMatrix($_REQUEST["matrix2"]);
			echo toString(subtract($matrix1, $matrix2));
			break;
		case "scale":
			$scalar = intval($_REQUEST["scalar"]);
			echo toString(scale($matrix1, $scalar));
			break;
		case "multiply":
			$matrix2 = parseMatrix($_REQUEST["matrix2"]);
			echo toString(multiply($matrix1, $matrix2));
			break;
		case "power":
			$exp = intval($_REQUEST["exp"]);
			echo toString(power($matrix1, $exp));
			break;
		case "inverse":
			echo toString(inverse($matrix1));
			break;
	}
	
?>
