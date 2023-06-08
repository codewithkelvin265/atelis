<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';


$dompdf = new Dompdf(); 
$dompdf->loadHtml('
<table border=1 align=center width=400>
<tr><td>Name : </td><td>Name</td></tr>
<tr><td>Email : </td><td>Email</td></tr>
<tr><td>Age : </td><td>Age</td></tr>
<tr><td>Country : </td><td>COuntry</td></tr>
</table>
');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("",array("Attachment" => false));
exit(0);

?>

