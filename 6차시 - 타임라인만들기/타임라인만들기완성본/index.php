<?php
require "medoo.min.php";

$database = new medoo();

$data = $database->select("10hours_content", "*", ["user"=>$_GET['user']]);

$user = $database->select("10hours_user", "*", ["id"=>$_GET['user']]);


// var_dump($data);

?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<title><?=$user[0]['title']?></title>
</head>
<body>
	<header>
		<h1><?=$user[0]['title']?></h1>
	</header>

	<section id="cd-timeline" class="cd-container">

		<?php if(count($data) == 0) { ?>
		<p>아직 작성된 글이 없습니다.</p>
		<?php } $cnt = 0;
		foreach ($data as $key => $value) { ?>

		<div class="cd-timeline-block">

			<div class="cd-timeline-img cd-picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2><?=$value['title']?></h2>
				<p><?=$value['content']?></p>
				<span class="cd-date"><?=$value['date']?></span>

				<form method="get" action="reply.php">
					<input type="text" name="reply<?=$cnt?>" placeholder="댓글을 입력해주세요">
					<a type="submit" class="reply">댓글달기</a>
				</form>

				<div class="replys">
					정말 대단하군요<br><br>
					와 정말 대단해!
				</div>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<?php $cnt++; } ?>

	</section> <!-- cd-timeline -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>