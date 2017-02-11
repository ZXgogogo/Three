<!DOCTYPE html>

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
					<a href="index.html">
						<li id="first">网站首页</li>
					</a>
					<li>关于我们</li>
					<li>图书展示</li>
					<li>联系我们</li>
					<li>购物车</li>
					<a href="Add1.html">
						<li>添加图书</li>
					</a>
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
			<!--如何保存上一次的更新结果呢？？？？-->
		<?php 
//			$page=$_GET["dd"];
//			定义一个数组接收一下每一次传过来的索引
//			为啥每次传过来的一个索引，下次却保存不了？？？？？
			$arr[]=$_GET["dd"];
			foreach ($arr as $key => $value){
				echo $value;
			}
			echo $arr[0];
			$db=mysql_connect("localhost","root","");
			mysql_select_db("books");
			mysql_query("set names utf8");
			$query="select * from bookes where bookId='$value'";
//			$query="select * from bookes where bookId=".$value;
			$result=mysql_query($query);
			for ($i=0; $i <count("bookId"); $i++){
			$row=mysql_fetch_assoc($result)
			
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
						<td onclick="delect('tab',this)">删除</td>
					</tr>
				
				
				</table>
			</div>

		</div>
		<?php 
		}
			?>
	</body>
	<script type="text/javascript">
		function delect(id, obj) {
			alert("你确定要删除吗");
			//		获取被删行的索引
			var rowIndex = obj.parentElement.rowIndex;
			document.getElementById(id).deleteRow(rowIndex);
		}
	</script>
	<!--数量没传进来-->
	<!--删除的时候没有把一行全删完-->
	<!--如果删除还是在最原始的页面，那么上面获取的内容会多余，显示找不到-->

</html>