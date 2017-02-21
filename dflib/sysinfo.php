<html>

<head><title>System information page</title></head>

<?php
phpinfo();
global $hostname, $referral, $connection, $blah;
$hostname=@gethostbyaddr( $REMOTE_ADDR );
?>

<script language='JavaScript'>
<!--
	window.onerror=null;
	colors=window.screen.colorDepth;
	var navname=navigator.appName;
	var navver=navigator.appVersion;
	var scrcolordepth=window.screen.colorDepth;
	var scrwidth=window.screen.width;
	var scrheight=window.screen.height;
	var navcodename=navigator.appCodeName;
	var navplatform=navigator.platform;
	if ( navigator.javaEnabled() < 1 ) var javaenbl="No";
	if ( navigator.javaEnabled() == 1 ) var javaenbl="Yes";
	if ( navigator.javaEnabled() && ( navigator.appName != "Microsoft Internet Explorer" )) {
		var vartool=java.awt.Toolkit.getDefaultToolkit();
		var addr=java.net.InetAddress.getLocalHost();
		var host=addr.getHostName();
		var ip=addr.getHostAddress();
		alert( "Your host name is '"+host+"'\nYour IP address is "+ip );
	}
//-->
</script>

<table border='0' width='100%'>
<tr>
	<td>Platform:<b>
		<script language='JavaScript'>document.write( navplatform );</script>
	</b></td>
</tr>
<tr>
	<td>Browser:<b>
		<script language='JavaScript'>document.write( navname );</script>
	</b></td>
</tr>
<tr>
	<td>Browser codename:<b>
		<script language='JavaScript'>document.write( navcodename );</script>
	</b></td>
</tr>
<tr>
	<td>Browser version:<b>
		<script language='JavaScript'>document.write( navver );</script>
	</b></td>
</tr>
<tr>
	<td>Java enabled:<b>
		<script language='JavaScript'>document.write( javaenbl );</script>
	</b></td>
</tr>
<tr>
	<td>JavaScript version:<b>
		<script language='JavaScript'>var jsver=1;</script>
		<script language='JavaScript1.1'>var jsver=1.1;</script>
		<script language='JavaScript1.2'>var jsver=1.2;</script>
		<script language='JavaScript1.3'>var jsver=1.3;</script>
		<script language='JavaScript1.4'>var jsver=1.4;</script>
		<script language='JavaScript1.5'>var jsver=1.5;</script>
		<script language='JavaScript1.6'>var jsver=1.6;</script>
		<script language='JavaScript1.7'>var jsver=1.7;</script>
		<script language='JavaScript'>document.write( jsver );</cript>
	</b></td>
</tr>
<tr>
	<td>Resolution:<b>
		<script language='JavaScript'>document.write( scrwidth+' x '+scrheight );</script>
	</b></td>
</tr>
<tr>
	<td>Color depth (bits):<b>
		<script language='JavaScript'>document.write( scrcolordepth );</script>
	</b></td>
</tr>
<tr>
	<td>IP-address:<b><?php echo $REMOTE_ADDR;?></b></td>
</tr>
<tr>
	<td>Hostmask (IP-address in word format):<b><?php echo $hostname;?></b></td>
</tr>
</table>

</html>
