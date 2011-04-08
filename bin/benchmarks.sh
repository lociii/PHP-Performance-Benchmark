#!/bin/sh

#############################################################################
# Benchmarks
#
# Jens Nistler <jens.nistler@kwick.de>
# Sven Strittmatter <sven.strittmatter@kwick.de>
#
# Kwick
# Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
#############################################################################

PHP_BIN=php

# find benchmrks.php: same directory 2nd
SELF_LINK="$0"
SELF_LINK_TMP="$(readlink "$SELF_LINK")"
while test -n "$SELF_LINK_TMP"; do
	SELF_LINK="$SELF_LINK_TMP"
	SELF_LINK_TMP="$(readlink "$SELF_LINK")"
done
PHP_DIR="$(dirname "$SELF_LINK")"

"$PHP_BIN" -d safe_mode=Off -f "$PHP_DIR/benchmarks.php" -- "$@"