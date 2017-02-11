<!DOCTYPE htmlata

<html>

	<head>
		<meta charset="utf-8" />
		<title>网上书城</title>
		<style type="text/css">
			* {
				padding: 0;
				margin: 0;
				text-decoration: none;
				width: 100%;
			}
			
			.wrap {
				width: 100%;
				position: relative;
			}
			
			.nav {
				width: 100%;
				background-color: black;
				height: 60px;
				border: 1px solid black;
			}
			
			.nav ul {
				margin-left: 150px;
				margin-top: 20px;
			}
			
			.nav ul li {
				list-style-type: none;
				color: white;
				width: 100px;
				float: left;
				text-align: center;
				font-size: 15px;
			}
			
			.nav ul #first:hover {
				background-color: red;
			}
			
			td img {
				/*display: block;*/
				width: 40px;
				height: 50px;
			}
			
			.main table {
				width: 1200px;
				height: 100px;
				text-align: center;
			}
			
			table td{
				width: 20px;
				height: 20px;
			}
			
			.main {
				margin-left: 200px;
			}
			
			.main h1 {
				margin-top: 100px;
				margin-left: 500px;
			}
		</style>
	</head>

	<body>
		<div class="wrap">
			<div class="nav">
				<ul>
				<li>书吧</li>
				<a href="index.php"><li id="first">网站首页</li></a>
				<li>关于我们</li>
				<a href="2.fenye.php"><li>图书展示</li></a>
				<li>联系我们</li>
				<a href="53.car.php">
				<li>购物车</li>
				</a>
				<a href="4.Add1.html"><li>添加图书</li></a>
				</ul>
			</div>
		
		<div class="main">
				<h1>购物车</h1>
				<table border="1" cellspacing="0" cellpadding="0" id="tab">
					<tr>
						<td>图书</td>
						<td>书名</td>
						<td>数量</td>
						<td>单价</td>
						<td>结算</td>
						<td>删除</td>
					</tr>
		
		<?php 
		$db=mysql_connect("localhost","root","");
			mysql_select_db("car");
			mysql_query("set names utf8");
			$page=$_GET["dd"];
			
			//如何进行字符串的拆分呢？？
			$hello = explode(',',$page); 
			
			$valstr="";
			for($index=0;$index<count($hello);$index++) 
			{ 
			$arr[]=$hello[$index];
			}
//			var_dump($arr);
			foreach ($arr as $key => $value){
				$valstr.="'".$value."',";
				}
			$valstr = substr($valstr,0,-1);
		
//			echo "</br>"; 
//			好像也不对???????
			$stu="insert into car (carId,picture,name,num,price) values ($valstr)";
			$result=mysql_query($stu);
			//重新从car这个新的数据库取出数据
			$query="select * from car";
			$result=mysql_query($query);
			while ($row=mysql_fetch_assoc($result)){
				?>	
						<tr class="trr">
						<td><img src="<?php echo $row["picture"];?>"/></td>
						<td>
							<?php echo $row["name"];?>
						</td>
						<td>
							<?php echo $row["num"];?>本</td>
						<td>
							<?php $pri=$row["price"]*$row["num"];
							echo "￥".$pri;
							?>
						</td>
						<td>
							<a href="">付款</a>
						</td>
<!--//						<td><a href="53.Car_delect.php?del=<?php echo $row["carId"]?>">删除</a></td>-->
						<td onclick="delect(<?php echo $row["carId"];?>)">删除</td>
					      
					</tr>
				
				<?php 
				}
					?>
				</table>
			</div>

		</div>
		
	</body>
	<script type="text/javascript" src="js/JQuery-3.1.1.min.js"></script>
	<script type="text/javascript">
	var tab=document.all.tab;

	
	$.ajax({
		type:"get",
		url:"54.Car_reset.php",
		dataType:"json",
		success:function(data){
//			console.log(data);
//			console.log(22)
			},
		async:true
	});
	
	
	
	function delect(obj){
			$.ajax({
			type:"get",
			url:"53.Car_delect.php",
			data:{
				del:obj
			},
			dataType:"json",
		success:function(data){
			
//			console.log("心塞");
			$("#tab").html();
//			tab.innerHTML="";
			console.log("重新获取到了新数据");
			var trobj1=$('<tr><td>图书</td><td>书名</td><td>数量</td><td>单价</td><td>结算</td><td>删除</td></tr>');
			$("#tab").append(trobj1)
		for (var i=1;i<data.length;i++){
			console.log(data[i].carId);
				var trobj2=$('<tr><td><img src="'
				+data[i].picture+'"/></td><td>'
				+data[i].name+'</td><td>'
				+data[i].num+'</td><td>'
				+data[i].price+'</td><td><a href="">付款</a></td><td onclick="'
				+delect(data[i].carId)+'">删除</td></tr>');
				$("#tab").append(trobj2)
			}
			}
		});
		}
		
	</script>
	<!--数量没传进来-->
	<!--删除的时候没有把一行全删完-->
	<!--如果删除还是在最原始的页面，那么上面获取的内容会多余，显示找不到-->

</html>