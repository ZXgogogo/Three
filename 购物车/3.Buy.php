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
			
			#left {
				width: 30%;
				/*border: 1px solid red;*/
				padding: 0px 50px;
				float: left;
			}
			
			#left img {
				width: 500px;
				height: 800px;
			}
			
			#right {
				width: 50%;
				float: left;
			}
			
			#right h1 {
				margin-top: 20px;
			}
			
			#right p {
				margin-top: 20px;
				margin-left: 40px;
			}
			
			hr {
				margin-top: 20px;
			}
			
			.moban {
				width: 70%;
				background-color: darkgray;
			}
			
			*#right .moban p {
				margin-left: 10px;
			}
			
			#right #cars {
				display: inline-block;
				width: 130px;
				height: 30px;
				color: white;
				background-color: royalblue;
				text-align: center;
				line-height: 30px;
				margin-top: 70px;
			}
			
			#right #like {
				display: inline-block;
				margin-left: 200px;
				width: 130px;
				height: 30px;
				color: red;
				background-color: pink;
				text-align: center;
				line-height: 30px;
				margin-top: 70px;
			}
			
			#lesss {
				width: 30px;
			}
			
			#add {
				width: 30px;
			}
			
			#text1 {
				width: 30px;
			}
			
			.num {
				margin-top: 30px;
			}
		</style>
	</head>

	<body>
		<div class="wrap">
			<div class="nav">
				<ul>
					<li>书吧</li>
					<a href="1.index.html">
						<li id="first">网站首页</li>
					</a>
					<li>关于我们</li>
					<li>图书展示</li>
					<li>联系我们</li>
					<li>购物车</li>
					<a href="4.Add.html">
						<li>添加图书</li>
					</a>
				</ul>
			</div>

			<?php 
			$page=$_GET["page"];
			$db=mysql_connect("localhost","root","");
			mysql_select_db("books");
			mysql_query("set names utf8");
			$query="select * from bookes bookes where bookid=".$page;
			$result=mysql_query($query);
			$row=mysql_fetch_assoc($result)
			?>
			<div id="left">
				<img src="<?php echo $row["picture"];?>"/>
			</div>

			<!--右边-->
			<div id="right">
				<h1><?php echo $row["name"];?></h1>
				<p>
					<?php echo $row["intro"];?>
				</p>
				<hr/>
				<div class="moban">
					<p>作者：
						<?php echo $row["writer"];?>
					</p>
					<p>出版社：
						<?php echo $row["chubanshe"];?>
					</p>
					<p>出版时间：
						<?php echo $row["date"];?>
					</p>
					<p>国际标准书号ISBN：
						<?php echo $row["ISBN"];?>
					</p>
					<p>友情价格：
						<?php echo "￥".$row["price"];?>
					</p>
				</div>
				<a href="53.car.php?dd=<?php echo $row["bookId"].",".$row["picture"].",".$row["name"].",".$row["num"].",".$row["price"];?>" id="cars">加入购物车</a>
				<a href="" id="like">立即购买</a>
				<div class="num">
					数量：
					<input type="button" name="lesss" id="lesss" value="-" onclick="dianji()" />
					<input type="text" name="text1" id="text1" value="1" />
					<input type="button" name="add" id="add" value="+" onclick="jiafa()" />
				</div>
			</div>
		</div>

	</body>
	<script type="text/javascript">
		var text1 = document.all.text1;

		function dianji() {
			text1.value--;
			if(text1.value <= 0) {
				text1.value = 1;
			}
		}

		function jiafa() {
			text1.value++;
		}
	</script>

</html>