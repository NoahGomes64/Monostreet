<?php
include("Propriete.php");

$maPropri = new Propriete("bonjour",1);

echo($maPropri->getNom());
?>
<a href="javascript:ouvre_popup('popup.html')">Ouverture d'un popup</a>
<script type="text/javascript">
function ouvre_popup(page) {
 window.open(page,"nom_popup","menubar=no, status=no, scrollbars=no, menubar=no, width=200, height=100");
}
</script>