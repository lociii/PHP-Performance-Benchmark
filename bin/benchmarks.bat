@ECHO off
REM Benchmarks
REM
REM Jens Nistler <jens.nistler@kwick.de>
REM Sven Strittmatter <sven.strittmatter@kwick.de>
REM
REM Kwick
REM Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)

REM Assume php.exe is executable, and that performancetests.php will reside in
REM the same file as this one
SET PHP_BIN=php.exe
SET PHP_DIR=%~dp0
SET BENCHMARKS_SCRIPT=%PHP_DIR%\benchmarks.php
"%PHP_BIN%" -d safe_mode=Off -f "%BENCHMARK_SCRIPTS%" -- %*