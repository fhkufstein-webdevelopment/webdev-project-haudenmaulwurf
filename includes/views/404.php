<?php
echo $this->header;
?>
<div class="error_main"><br><br><br><br>
   <div class="error_inner">
	<h1>404 Seite nicht gefunden</h1>

	<h3><p>Leider konnte Deine Anfrage nicht richtig verarbeitet werden. <br><br>Mögliche Ursachen hierfür sind:</p></h3>
       <div class ="liste">
	<h4><ul>
		<li>Die URL, die du eingegeben hast, enthält einen Tippfehler  </li>
		<li>Die Seite, die du versucht hast aufzurufen, existiert nicht mehr</li>
	</ul></h4></div>
	<p><br>
       <h3>Was kannst du jetzt tun?</h3>
	</p>
       <div class="liste">
	<h4><ul>
		<li>Prüfe ob die URL, die du eingegeben hast, tatsächlich richtig ist </li>
		<li>Nutze die Navigation, um zu der Seite zu gelangen, die du eig. aufrufen wolltest</li>
	</ul></h4>
   </div>

</div>
</div>
<?php

echo $this->footer;

?>