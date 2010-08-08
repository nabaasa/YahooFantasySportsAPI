<?php

// Hardcoded from here:
// http://developer.yahoo.com/fantasysports/guide/game-resource.html
function get_league_ids( $types = 'all' ) {
	$leagues = array(
		'nfl' => array(
			2001 => 57,
			2002 => 49,
			2003 => 79,
			2004 => 101,
			2005 => 124,
			2006 => 153,
			2007 => 175,
			2008 => 199,
			2009 => 222,
			2010 => 242,
		),
		'pnfl' => array(
			2001 => 58,
			2002 => 62,
			2003 => 78,
			2004 => 102,
			2005 => 125,
			2006 => 154,
			2007 => 176,
			2008 => 200,
			2009 => 223,
			2010 => '',
		),
		'mlb' => array(
			2001 => 12,
			2002 => 39,
			2003 => 74,
			2004 => 98,
			2005 => 113,
			2006 => 147,
			2007 => 171,
			2008 => 195,
			2009 => 215,
			2010 => 238,
		),
		'pmlb' => array(
			2001 => '',
			2002 => 44,
			2003 => 73,
			2004 => 99,
			2005 => 114,
			2006 => 148,
			2007 => 172,
			2008 => 196,
			2009 => 216,
			2010 => '',
		),
	);
	
	if ( $types !== 'all' && is_array( $types ) ) {
		$r = array();
		foreach ( $types as $type ) {
			$r[$type] = $leagues[$type];
		}
		return $r;
	}
	return $leagues;
}

// Not tested or researched, yet
function exportToCsv( $data, $filename = 'tmp.csv' ) {
	
	$fp = fopen( $filename, 'w' );
	if ( !$fp ) {
		return FALSE;
	}
	
	$count = 0;
	foreach ( $data as $line ) {
		++$count;
		fputcsv( $fp, $line, ',', '"' );
	}
	return $count;
}
