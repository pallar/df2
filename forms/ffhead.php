<?php
/* DF_2: reports/ffhead.php
form head
c: 08.09.2015
m: 11.09.2015 */

echo "
<style>
@media only screen and (max-width:800px), (min-device-width:768px) and (max-device-width: 1024px) {
  /* Force table to be not like table anymore */
  table, thead, tbody, th, tr { display:block; }
  .frm_block { display:block; }
  /* Hide table headers (but not display:none; for accessibility) */
  thead tr { left:-9999px; position:absolute; top:-9999px; }
  /* Behave like a 'row' */
  #frm_tbody tr { border:none; }
  #frm_tbody td { border:none; }";
if ( $_mod_rep_CSS==1 ) echo $_mod_rep_CSS_content;
echo "
}
</style>
</head>";
?>
