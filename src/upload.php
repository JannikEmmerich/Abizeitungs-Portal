<?php
include "Templates/login.inc.php";
?>
<?php
	$title = "Bilderupload";
	include "Templates/header.inc.php";
?>
			<div id="main">

				<em>Wenn du bereits ein Bild hochgeladen hast kannst du es durch einen erneuten Upload überschreiben!</em>

				<br>
				<br>

				<table style="border: 0px" cellpadding="5">
					<colgroup>
						<col width="50%"/>
						<col width="50%"/>
					</colgroup>
					<tr><th>Aktuelles Bild:</th><th>Altes Bild:</th></tr>
					<tr>
						<td>
							<img 
								alt="Du hast noch kein aktuelles Bild hochgeladen!" 
								width=400px 
								src='data:image/png;base64,<?php
                                $img = imagescale(imagecreatefromstring(file_get_contents("Images/" . $user . "_current.png")), 400);
                                ob_start(); // Let's start output buffering.
                                imagejpeg($img); //This will normally output the image, but because of ob_start(), it won't.
                                $contents = ob_get_contents(); //Instead, output above is saved to $contents
                                ob_end_clean(); //End the output buffer.
                                echo base64_encode($contents);
                                ?>'
							>
						</td>
						<td>
							<img 
								alt="Du hast noch kein altes Bild hochgeladen!" 
								width=400px 
								src='data:image/png;base64,<?php
                                $img = imagescale(imagecreatefromstring(file_get_contents("Images/" . $user . "_old.png")), 400);
                                ob_start(); // Let's start output buffering.
                                imagejpeg($img); //This will normally output the image, but because of ob_start(), it won't.
                                $contents = ob_get_contents(); //Instead, output above is saved to $contents
                                ob_end_clean(); //End the output buffer.
                                echo base64_encode($contents);
                                ?>'
							>
						</td>
					</tr>
					<tr>
						<td>
							<form action="save_upload.php" method="post" enctype="multipart/form-data">
								<input type="file" name="current"><br>
								<input type="submit">
							</form>
						</td>
						<td>
							<form action="save_upload.php" method="post" enctype="multipart/form-data">
								<input type="file" name="old"><br>
								<input type="submit">
							</form>
						</td>
					</tr>
				</table>
			</div>
<?php 
	include('Templates/navigation.inc.php');  
	include('Templates/footer.inc.php'); 
?>
