$(document).ready(function(){
	odd= {"background":"#ffffff"}; //奇数
	even={"background":"#efefef"}; //偶数
	odd_even("#table, #booktable, #electable",odd,even);

	dialog(".mask",".dialog");//弹窗
	$("#btn_close").bind("click", function(){
		window.location.href='index.php';
	});

	$('.tabtitle li').click(function () {
		console.log("111");
		var index = $(this).index();
		$(this).attr('class',"tabhover").siblings('li').attr('class','taba');
		$('.tabcontent').eq(index).show().siblings('.tabcontent').hide();
	});
});
	function table(){
		$('#table').DataTable({
		
			iDisplayLength: 20,
			sPaginationType: "full_numbers",
			bLengthChange : false,

			"aaSorting": [
				[ 0, "desc" ]
			],

			aoColumnsDefs : [
				{
					aTargets : [0],
					bSortable : true,
				},
				{
					// aTargets : [1],
					// bSortable : false,
					// fnRender : function(row){
					// 	var status='working';
					// 	switch(row['project_status']){
					// 		case '111':
					
					// 			break;
					// 		case '222':
					// 			status = 'working';
					// 		break;
					// 		default:
					// 			status = 'over';
					// 		break;
					// 	}
					// 	return row["title"]+"<span class='"+row['project_status']+"'>&nbsp;"+row['project_status']+"</span>"
					// }
				},
				{
					sClass: "demo",
					sTitle: "线上演示",
					bSortable : false,
					render : function(data,type,row){
						return "<a href='"+row['demo_UI']+"' class='UI'  target='_blank'>交互</a>&nbsp;&nbsp;<a href='"+row['demo_GUI']+"' class='GUI'  target='_blank'>视觉</a>"
					}
				}			
			]
		});
	};

	function booktable(){
		$('#booktable').DataTable({
		
			iDisplayLength: 20,
			sPaginationType: "full_numbers",
			bLengthChange : false,

			aoColumnsDefs : []
		});
	};

	//使用jquery获取url中的参数
	function getUrlParam(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
        var r = window.location.search.substr(1).match(reg);  //匹配目标参数
        if (r != null) return unescape(r[2]); return null; //返回参数值
    }

    //点击增加项目显现dialog
	function dialog(mask,dialog){
			if(getUrlParam('action')=="getEditPage"){
				$(mask).show();
				$(dialog).show().animate({top:'10%'},'swing');
			}else {
				$("#btn_red").bind("click",function(){
					$(mask).show();
					$(dialog).show().animate({top:'10%'},'swing');
				});
					
			}
	};
	//表格斑马线
	function odd_even(id,odd,even){
		$(id).find("tr").each(function(index){
			if(index%2==1){
				$(this).css(odd);
			}else{$(this).css(even);}
		});

	};

	


