<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="sandy.js"></script>
	<script>
		$(document).ready(function(){
			table();
		})
	</script>
	<title>yulebao ued</title>
</head>

<body>
	<?php
		include 'edit.php';
	?>
		<div class="mask"></div>
	<header>
		<div class="top">
			<div class="logo"><img src="images/logo.png" alt="">UED</div>
			<nav>
				<a href="index.php" class="active">项目</a>
				<a href="new.php">新人入职须知</a>
				<a href="guideline.php">UI规范</a>
				<a href="assets.php">资产</a>
				<a href="share.php">团队分享</a>
			</nav>
		</div>
	</header>
	<div class="content">
		<div class="content-title">
			<h1>产品项目</h1>
			<a href="#" class="btn btn-red btn-add" id="btn_red">+新增项目</a>
		</div>
		<table id="table" class="display">
			<thead>
				<tr>
					<th>项目开始时间</th>
					<th>项目标题</th>
					<th>平台</th>
					<th>归属人</th>
					<th>需求方</th>
					<th>云盘地址</th>
					<th>线上演示</th>
					<th>操作</th>
				</tr>
			</thead>
			<?php 
				$json_string = file_get_contents('data.json');
				$data = json_decode($json_string,true);
				$n = count($data);
				for($i=0;$i<$n;$i++){
					$code = $i;
					echo "<tr>";
					echo "<td>".$data[$i]["time"]."</td>";
					echo "<td>".$data[$i]["title"]."<span class='working'>&nbsp;".$data[$i]["project_status"]."</td>";
					echo "<td>".$data[$i]["platform"]."</td>";
					echo "<td>".$data[$i]["belong_to"]."</td>";
					echo "<td>".$data[$i]["demand"]."</td>";
					echo "<td class='yunpan'><a href='".$data[$i]["yunpan"]."'><i class='fa fa-cloud'></i>&nbsp;点击查看</a></td>";
					echo "<td class='demo'><a href='".$data[$i]["demo_UI"]."' class='UI'>交互</a>&nbsp;&nbsp;<a href='".$data[$i]["demo_GUI"]."' class='GUI'>视觉</a></td>";
					echo '<td class="option">';
					//echo $code;
					echo '<a href="?action=getEditPage&id='.$code.'" class="getEditPage" id="getEditPage"><i class="fa fa-edit"></i></a>';
					echo '<a onClick="return confirm('."'确定要删除&nbsp;".$data[$i]["title"]."么？'".')" href="/save.php?action=delete&id='.$code.'"><i class="fa fa-trash-o"></i></a>';
					echo '</td>';
					echo '</tr>';
				} ?>
		</table>
	</div>
	<div class="dialog">
		<div class="dialog_title">
			<h3>
				<?php
					if(isset($_GET['action']) && $_GET['action'] == "getEditPage"){
						echo "编辑项目";
					}else{
						echo "新增项目";
					} 
				?>
			</h3>
			<a href="#" id="btn_close"><i class="fa fa-close"></i></a>
		</div>
		<form action="/save.php?action=<?php echo $action ?>" method="post" class="form" id="form">
			<div>
				<input type="text" value="<?php echo $_GET['id'] ?>" name="code" id="text">
			</div>
			<div>
				<label for="time"><strong>*&nbsp;</strong>项目时间</label>
				<input id="username" type="text" placeholder="2016.3.8" name="time" required data-msg-required='请输入时间' value="<?php if (isset($projectItem['time'])){echo $projectItem['time'];} ?>">
			</div>
			<div>
				<label for="title"><strong>*&nbsp;</strong>项目标题</label>
				<input id="title" type="text" placeholder="App2.0 大圣归来" name="title" required value="<?php if (isset($projectItem['title'])){echo $projectItem['title'];} ?>">
			</div>
			<div>
				<label for="project_status"><strong>*&nbsp;</strong>项目状态</label>
				<select name="project_status" id="project_status" required height="40px">
					<option value="未开始">未开始</option>
					<option value="进行中" selected="selected">进行中</option>
					<option value="已结束">已结束</option>
					<option value="项目暂停">项目暂停</option>
				</select>
			</div>
			<div>
				<label for="platform"><strong>*&nbsp;</strong>平台</label>
				<input id="platform" type="text" placeholder="IOS/H5" name="platform" required value="<?php if (isset($projectItem['platform'])){echo $projectItem['platform'];} ?>">
	
			</div>
			<div>
				<label for="belong_to"><strong>*&nbsp;</strong>归属人</label>
				<input id="belong_to" type="text" placeholder="花名1/花名2/花名3" name="belong_to" required value="<?php if (isset($projectItem['belong_to'])){echo $projectItem['belong_to'];} ?>">
			</div>
			<div>
				<label for="demand"><strong>*&nbsp;</strong>需求方</label>
				<input type="demand" placeholder="加丁" name="demand" required value="<?php if (isset($projectItem['demand'])){echo $projectItem['demand'];} ?>">
			</div>
			<div>
				<label for="yunpan"><strong>*&nbsp;</strong>云盘地址</label>
				<input type="text" placeholder="直接将云盘地址复制过来" name="yunpan" required value="<?php if (isset($projectItem['yunpan'])){echo $projectItem['yunpan'];} ?>">
			</div>
			<div>
				<label for="demo_UI">线上演示—交互</label>
				<input type="text" placeholder="为选填项" name="demo_UI" value="<?php if (isset($projectItem['demo_UI'])){echo $projectItem['demo_UI'];} ?>">
			</div>
			<div>
				<label for="demo_GUI">线上演示—视觉</label>
				<input type="text" placeholder="为选填项" name="demo_GUI" value="<?php if (isset($projectItem['demo_GUI'])){echo $projectItem['demo_GUI'];} ?>">
			</div>
			<button class="btn btn-blue btn-ok" type="submit">确定</button>
		</div>
	</div>
</body>
</html>