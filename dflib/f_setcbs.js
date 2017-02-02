<script language='JavaScript'>
//test group items checkboxes
function test0( gr, cbname ) {
	var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
	var gr_items=1000000000;
	var gr_allchecked=1;
	for ( var k=0; k<gr_items; k++ ) {
		var elname=String( cbname )+gggg+String( k );
		var el_=document.getElementById( elname )
		if ( String( el_ )=='null' ) break;
		else {
			var el_state=Boolean( el_.checked )*1;
			if ( el_state==0 ) var gr_allchecked=0;
		}
	}
	gr_cli0( gggg, Boolean( gr_allchecked ));
	all_reset0();
}

//set group items checkboxes
function cli0( gr, el_state, cbname ) {
	var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
	var gr_items=1000000000;
	var el_bool=Boolean( el_state );
	for ( var k=0; k<gr_items; k++ ) {
		var elname=String( cbname )+gggg+String( k );
		var el_=document.getElementById( elname );
		if ( String( el_ )=='null' ) break;
		el_.checked=el_bool;
	}
}

//test group header/footer checkboxes
function gr_test0( gr ) {
	var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
	var gr_checked=1;
	for ( var k=0; k<2; k++ ) {
		var elname='gr_cb'+gggg+String( k );
		var el_=document.getElementById( elname )
		if ( String( el_ )!='null' ) {
			var el_state=Boolean( el_.checked )*1;
			if ( el_state==0 ) var gr_checked=0;
		}
	}
	return gr_checked;
}

//set group header/footer checkboxes
function gr_cli0( gr, el_state ) {
	var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
	var el_bool=Boolean( el_state );
	for ( var k=0; k<2; k++ ) {
		var elname='gr_cb'+gggg+String( k );
		var el_=document.getElementById( elname );
		if ( String( el_ )=='null' ) break;
		el_.checked=el_bool;
	}
	if ( el_state*1==0 ) e_state=0; else e_state=1;
	document.cookie=User_Get()+"_gscbs="+e_state+";path=/";
}

//set group header/footer checkboxes
function gr_set0( gr, gr_cb, cbname ) {
	var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
	var gr_items=1000000000;
	var grs=1000000000;
	var elname='gr_cb'+gggg+String( gr_cb );
	var el_state=Boolean( document.getElementById( elname ).checked );
	cli0( gggg, el_state, cbname );
	gr_cli0( gggg, el_state );
	all_reset0();
}

//reset page header/footer checkboxes
function all_reset0() {
	var grs=1000000000;
	var all_checked=all_test0();
	for ( var gr=0; gr<grs; gr++ ) {
		var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
		var elname='all_cb'+gggg+'0';
		var el_=document.getElementById( elname );
		if ( String( el_ )=='null' ) break;
		else all_cli0( gggg, Boolean( all_checked ));
	}
}

//test page header/footer checkboxes
function all_test0() {
	var grs=1000000000;
	var all_checked=1;
	for ( var gr=0; gr<grs; gr++ ) {
		var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
		var elname='gr_cb'+gggg+'0';
		var el_=document.getElementById( elname );
		if ( String( el_ )=='null' ) break;
		var gr_checked=gr_test0( gggg );
		if ( gr_checked==0 ) var all_checked=0;
		if ( gr_checked==-1 ) break;
	}
	return all_checked;
}

//set page header/footer checkboxes to checked/unchecked
function all_cli0( gr, el_state ) {
	var el_bool=Boolean( el_state );
	for ( var k=0; k<2; k++ ) {
		var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
		var elname='all_cb'+gggg+String( k );
		var el_=document.getElementById( elname );
		if ( String( el_ )=='null' ) break;
		el_.checked=el_bool;
	}
}

//set page header/footer checkboxes
function all_set0( gr, all_cb, cbname ) {
	var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
	var grs=1000000000;
	var elname='all_cb'+gggg+String( all_cb );
	var el_state=Boolean( document.getElementById( elname ).checked );
	for ( var gr=0; gr<grs; gr++ ) {
		var gggg=String( gr ); while( gggg.length<4 ) var gggg="0"+gggg;
		var el1name='gr_cb'+gggg+'0';
		var el1_=document.getElementById( el1name );
		if ( String( el1_ )=='null' ) break
		else {
			cli0( gggg, el_state, cbname );
			gr_cli0( gggg, el_state );
			all_cli0( gggg, el_state );
		}
	}
}

function do_click( el ) {
	el.click();
}

function do_setgroupcoo( group_type, id, i, k, cbname ) {
	elname=String( cbname )+String( i )+String( k );
	var el_state=Number( Boolean( document.getElementById( elname ).checked ));
	var id_state=1;
	if ( el_state==0 ) id_state=-1;
	if ( Number( group_type )==1 ) var group_typ='cw_l';
	if ( Number( group_type )==2 ) var group_typ='cw_g';
	if ( Number( group_type )==3 ) var group_typ='cw_s';
	if ( Number( group_type )==4 ) var group_typ='cw_b';
	document.cookie=User_Get()+"_"+group_typ+"="+id+";path=/";
	document.cookie=User_Get()+"_"+group_typ+"state="+id_state+";path=/";
}

function do_setgroupscoo( group_type, id, i, k ) {
	elname='gr_cb'+String( i )+String( k );
	var el_state=Number( Boolean( document.getElementById( elname ).checked ));
	var id_state=1;
	if ( el_state==0 ) id_state=-1;
	if ( Number( group_type )==1 ) var group_typ='cw_l';
	if ( Number( group_type )==2 ) var group_typ='cw_g';
	if ( Number( group_type )==3 ) var group_typ='cw_s';
	if ( Number( group_type )==4 ) var group_typ='cw_b';
	document.cookie=User_Get()+"_"+group_typ+"="+id+";path=/";
	document.cookie=User_Get()+"_"+group_typ+"state="+id_state+";path=/";
}
</script>
