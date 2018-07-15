<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="style.css">
	<script src="sandy.js"></script>
	<title>yulebao</title>
</head>

<body>
	<header>
		<div class="top">
			<div class="logo"><img src="images/logo.png" alt=""></div>
			<nav>
				<a href="index.php">项目</a>
				<a href="new.php">新人入职须知</a>
				<a href="guideline.php">UI规范</a>
				<a href="assets.php" class="active">资产</a>
				<a href="share.php">团队分享</a>
			</nav>
		</div>
	</header>
	<div class="content">
		<ul class="tabtitle">
			<li class="tabhover"><a href="#" style="border-top:none">图书</a></li>
 			<li class="taba"><a href="#">电子产品</a></li>
		</ul>
		<div class="tabcontent">
			<h1>图书</h1>
			<table id="booktable">
				<thead>
					<td>编号</td>
					<td>书名</td>
					<td>借用人</td>
					<td>借用日期</td>
				</thead>
				<?php 
				$json_string_book = file_get_contents('bookdata.json');
				$bookdata = json_decode($json_string_book,true);
				$n = count($bookdata);
				for($i=0;$i<$n;$i++){
					echo "<tr>";
					echo "<td>".$bookdata[$i]["book_num"]."</td>";
					echo "<td>".$bookdata[$i]["book_name"]."</td>";
					echo "<td>".$bookdata[$i]["borrow_to"]."</td>";
					echo "<td>".$bookdata[$i]["borrow_time"]."</td>";
					echo '</tr>';
				} ?>
			</table>
			<p class="tips">*若有借用需求，请联系@姗娣借用</p>
		<!-- <div class="line"></div> -->
		</div>
		<div class="tabcontent" style="display: none">
			<h1>电子产品</h1>
			<table id="electable">
				<thead>
					<td>产品名称</td>
					<td>责任人</td>
					<td>借用人</td>
					<td>借用日期</td>
				</thead>
				<?php 
				$json_string_elec = file_get_contents('elecdata.json');
				$elecdata = json_decode($json_string_elec,true);
				$n = count($elecdata);
				for($i=0;$i<$n;$i++){
					echo "<tr>";
					echo "<td>".$elecdata[$i]["elec_name"]."</td>";
					echo "<td>".$elecdata[$i]["elec_belong_to"]."</td>";
					echo "<td>".$elecdata[$i]["borrow_to"]."</td>";
					echo "<td>".$elecdata[$i]["borrow_time"]."</td>";
					echo '</tr>';
				} ?>
			</table>
			<p class="tips">*若有借用需求，请联系责任人借用</p>
		</div>
	</div>
</body>
</html>