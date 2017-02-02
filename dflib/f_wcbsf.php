<?php
$cards_arr=array_keys( $cards_checkboxes );
$fo=fopen( "../cache/o_cards.txt", "w+" );
for ( $i=0; $i<count( $cards_arr ); $i++ ) {
	$fo_str=$fo_str.$cards_arr[$i].chr( 13 ).chr( 10 );
}
fwrite( $fo, $fo_str );
?>
