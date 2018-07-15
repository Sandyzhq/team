<?php


	if ($_GET['action'] == "add"){
		add();
	}else if($_GET['action']=="delete"){
		delete(); 	
	}else if($_GET['action']=="edit"){
		edit();
	}


	function add(){
		$json_string = file_get_contents('data.json');
		$data = json_decode($json_string,true);
		array_push($data,$_POST);
		$json_array = json_encode($data);
		if(file_put_contents("data.json", $json_array)){
			header("Location: index.php");
			echo "success";
		}else {
			echo "fail";
		};
	};


	function delete(){
		$json_string = file_get_contents('data.json');
		$data = json_decode($json_string,true);
		foreach($data as $k=>$v){
			if($k==$_GET["id"]){
				array_splice($data,$k,1);
			}
		}
		$json_array = json_encode($data);
		if(file_put_contents("data.json", $json_array)){
			header("Location: index.php");
			echo "success";
		}else {
			echo "fail";
		};
	};

	function edit(){
		$json_string = file_get_contents('data.json');
		$data = json_decode($json_string,true);
		foreach($data as $k=>$v){
			if($k==$_POST['code']){
				 foreach($v as $key => $value){
				 	$v[$key]=$_POST[$key];
				 }
				$data[$k] = $_POST;
			}
		}
		$json_array = json_encode($data);
		if(file_put_contents("data.json", $json_array)){
			header("Location: index.php");
			echo "success";
		}else {
			echo "fail";
		};
	};
	
?>