<?php
// 데이터는 이곳에서 가져온다.
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

	<title>title</title>
</head>
<body>
	<header>
		<h1>title</h1>
	</header>

	<section id="cd-timeline" class="cd-container">

		<div class="cd-timeline-block">

			<div class="cd-timeline-img cd-picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>title</h2> <!-- 타이틀 넣어야함 -->
				<p>content</p> <!-- 글내용 들어갈 부분 -->
				<span class="cd-date">date</span> <!-- 날짜 들어갈 부분 -->

				<form method="get" action="reply.php">
					<input type="text" name="reply<?=$cnt?>" placeholder="댓글을 입력해주세요">
					<a type="submit" class="reply">댓글달기</a>
				</form>

				<div class="replys">
					replys<br><br>
					replys
				</div>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

	</section> <!-- cd-timeline -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>