<html>
	<head>
		<title>glitch.me</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<section id="head">
		</section>
		<section id="content">
				<?php
					if(isset($_FILES['image'])) {
						$image_data = $_FILES['image']['tmp_name'];
						$image_base64 = base64_encode(file_get_contents($image_data));
						$image_original = 'data:image/;base64,'. $image_base64;
                                                echo '<img id="image_glitch" src="'. $image_original . '" /> ';	
						$n = 2;		
						for($i = 0; $i < $n; $i++) {
							$rand = substr(md5(microtime()), rand(0, 26), 2);
							$image_base64 = str_replace($rand, strrev($rand) , $image_base64);
						
							$image_glitch = 'data:image/;base64,'. $image_base64;
							echo '<img id="image_glitch' . $i . '" src="'. $image_glitch . '" /> ';
						}
					}
					else {
				?>
		                <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                	<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                        <input name="image" type="file"/>
                                        <input type="submit" value="SEND FILE"/>
                                </form>
				<?php 
					}
				?> 
		</section>
		<section id="footer">
		</section>
	</body>
</html>
