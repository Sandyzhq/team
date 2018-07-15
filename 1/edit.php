<?php
	if(isset($_GET['action'])){
		$action = $_GET['action'];
		$code = $_GET['id'];
		$projectItem = array(
			'time'=> '',
			'title'=> '',
			'project_status'=> '',
			'platform' => '',
			'demand' => '',
			'yunpan' => '',
			'demo_UI' => '',
			'demo_GUI' => '',
		);
	}
	
			
	if ($action == 'getEditPage' && $code !== '') {
		$action = 'edit';
		$json_string = file_get_contents('data.json');
		$data = json_decode($json_string,true);
		foreach($data as $k=>$v){
			if($k==$code){
				$projectItem['time']=$data[$k]['time'];
				$projectItem['title']=$data[$k]['title'];
				$projectItem['project_status']=$data[$k]['project_status'];
				$projectItem['platform']=$data[$k]['platform'];
				$projectItem['belong_to']=$data[$k]['belong_to'];
				$projectItem['demand']=$data[$k]['demand'];
				$projectItem['yunpan']=$data[$k]['yunpan'];
				$projectItem['demo_UI']=$data[$k]['demo_UI'];
				$projectItem['demo_GUI']=$data[$k]['demo_GUI'];
			}
		}
	} else {
		$action = 'add';	
	}
?>