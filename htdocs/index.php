<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

error_reporting(E_ALL | E_STRICT);
$baseDir = dirname(dirname(__FILE__));

// temporary disable opcode caches
ini_set('eaccelerator.enable', '0');
ini_set('eaccelerator.optimizer', '0');
ini_set('xcache.cacher', 'Off');
ini_set('xcache.size', 0);

// set include path
set_include_path(implode(PATH_SEPARATOR, array(
	$baseDir . DIRECTORY_SEPARATOR . 'lib',
	get_include_path()
)));

function listTests($dir) {
	$dir = new DirectoryIterator($dir);

	$html = '';
	foreach ($dir as $entry) {
		if ($entry->isDir()) {
			continue;
		}
		$file = $entry->getFilename();

		$benchmark = str_replace('.php', '', $file);
		$html .= '<input type="checkbox" name="tests[]" value="' . $benchmark . '"';

		if (isset($_GET['tests']) && in_array($benchmark, $_GET['tests'])) {
			$html .= ' checked="checked"';
		}

		$html .= '>' . $benchmark . '<br />';
	}

	return $html;
}

function benchmarking($dir) {
	require_once 'Benchmark/Report/Html.php';

	if (isset($_GET['submit'])) {
		set_time_limit(0);

		foreach ($_GET['tests'] as $benchmarkName) {
			require $dir . DIRECTORY_SEPARATOR . $benchmarkName . '.php';
			$benchmark = new $benchmarkName();
			$benchmark->execute();
			$report = new Benchmark_Report_Html($benchmark);
			echo $report;
			flush();
			@ob_flush();
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv=content-type content="text/html; charset=UTF-8" />
	<title>Benchmarks</title>
	<style type="text/css">
		body, tr, td {
			margin: 0px;
			padding: 0px;
			font-family: Verdana, Arial, Sans-Serif;
			color: #000000;
		}

		body {
			padding-left: 40px;
			margin-right: 50px;
		}

		h1 {
			width: 100%;
			background-color: aqua;
			font-size: 16pt;
			margin-left: -40px;
			padding: 3px;
			padding-left: 40px;
		}

		h2 {
			font-size: 12pt;
		}

		code {
			display: block;
			background-color: silver;
			margin-bottom: 15px;
			padding: 3px;
		}

		table.result {
			width: 100%;
			margin-bottom: 20px;
		}

		table.result tr {
			background-color: #FB8080;
		}

		table.result tr th {
			text-align: left;
			background-color: aqua;
		}

		table.result tr.winner {
			background-color: #C3FFB3;
		}

		table.result tr.good {
			background-color: #FFFBBD;
		}

		table.result tr td, table.result tr th {
			padding: 3px;
		}
	</style>
</head>
<body>
<?php $benchmarkDir = $baseDir . DIRECTORY_SEPARATOR . 'benchmarks'; ?>
<form method="get" action="<?= $_SERVER['PHP_SELF']; ?>">
	<?php echo listTests($benchmarkDir); ?>
	<input type="submit" name="submit" value="Test!" />
</form>

<?php benchmarking($benchmarkDir); ?>
</body>
</html>
<?php unset($benchmarkDir, $baseDir); ?>