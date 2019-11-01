<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php $song_count = 5678; ?>
		<p>
			I love music.
			I have <?= $song_count ?> total songs,
			which is over <?= (int)($song_count/10) ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops)
		<div class="section">
			<h2>Yahoo! Top Music News</h2>
			<ol>
			<?php 
				for($i = 1 ; $i <= 7 ; $i++){
			?>
					<li><a href="http://music.yahoo.com/news/archive/?page=<?= $i ?>">Page <?= $i ?></a></li>
			<?php 
				} 
			?>
			</ol>
		</div>
		-->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Yahoo! Top Music News</h2>
			<ol>
			<?php 
				$newspages = $_GET["newspages"];
				if(!isset($newspages)){
					$newspages = 5;
				}
				for($i = 1 ; $i <= $newspages ; $i++){ 
			?>
					<li><a href="http://music.yahoo.com/news/archive/?page=<?= $i ?>">Page <?= $i ?></a></li>
			<?
				} 
			?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
				<?php 
					$singers = file("favorite.txt");
					foreach($singers as $singer){
						$singerurl = explode(" ", $singer);
						$url = implode("_", $singerurl);
				?>
						<li><a href="http://en.wikipedia.org/wiki/<?= $url ?>"><?= $singer ?></a></li>
				<? 
					} 
				?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
			<?php 
				$songs = glob("lab5/musicPHP/songs/*.mp3");
				foreach($songs as $song){
					$fsize[] = (int)(filesize($song)/1024);
					$slist[] = $song;
				}
				$sorted = array_combine($slist,$fsize);
				arsort($sorted);        
					
				foreach($sorted as $slist => $fsize){
			?>
					<li class="mp3item">
						<a href="<?= $slist ?>" download><?= basename($slist) ?></a> (<?= $fsize ?> KB)
					</li>
			<? 
				} 
			?>

			<!-- Exercise 8: Playlists (Files) -->
			<?php 
				$m3ufiles = glob("lab5/musicPHP/songs/*.m3u");
				rsort($m3ufiles);
				foreach($m3ufiles as $m3ufile){
					$m3usongs = file($m3ufile);
					shuffle($m3usongs);
			?>
					<li class="playlistitem"><?= basename($m3ufile) ?>:
						<ul>
						<?php 
							foreach($m3usongs as $m3usong){	
								if(strpos($m3usong, "#") === false){
						?>

									<li><?= $m3usong ?></li>	
						<?
								}
							}
						?>
						</ul>
					</li>
			<? 
				} 
			?>
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
