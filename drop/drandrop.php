<?php
error_reporting(0);
include('scripts/php/conexion.php');
include('scripts/php/queries/insert.php');
include('scripts/php/banners/head.php');
?>
<link rel="stylesheet" href="style.css" />
<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
    <div id="drag_upload_file">
        <p>Arrastre un archivo aqui</p>
        <p>o</p>
        <p><input type="button" value="Seleccione archivo" onclick="file_explorer();" /></p>
        <input type="file" id="selectfile" />
    </div>
</div>
<div class="img-content"></div>
<script src="custom.js"></script>