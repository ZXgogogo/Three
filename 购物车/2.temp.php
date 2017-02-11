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
			
			.top {
				width: 80%;
				/*text-align: center;*/
				background-color: greenyellow;
				margin-left: 10%;
				margin-top: 20px;
				display: hidden;
			}
			
			.t_left {
				width: 60%;
				float: left;
				padding: 70px 50px;
				background-color: gainsboro;
			}
			
			.t_left h1 {
				font-size: 50px;
				padding-bottom: 20px;
			}
			
			.t_left p {
				padding-bottom: 20px;
				font-size: 20px;
			}
			
			.t_right {
				width: 30%;
				float: left;
				padding-top: 30px;
			}
			
			.t_right h1 {
				padding-left: 80px;
			}
			
			.t_right form {
				text-align: center;
				width: 250px;
				padding-left: 80px;
				padding-top: 20px;
			}
			
			.t_right form input {
				height: 30px;
				margin-bottom: 10px;
			}
			
			.t_right form #load,
			#reg {
				width: 50px;
				margin-left: 20px;
				margin-right: 20px;
			}
			.main{
				width: 60%;
				margin-left: 10%;
				text-align: center;
			}
			li img{
				width: 200px;
				height: 250px;
			}
			.main li{
				list-style-type: none;
				width: 300px;
				height: 380px;
				float: left;
				border: 1px solid black;
				text-align: center;
				margin-right: 40px;
				margin-bottom: 30px;
			}
			li h2,p{
				margin-top: 30px;
			}
			li p{
				margin-left: -100px;
			}
			.main a{
				display: inline-block;
				text-align: center;
				color: red;
				border: 1px solid black;
				width: 20px;
				height: 20px;
				line-height: 20px;
				margin-left: -4px;
			}
			.main a:hover{
				background-color: green;
			}
			.main li a{
				display: block;
				width: 100px;
				height: 30px;
				background-color: green;
				color: white;
				line-height: 30px;
				margin-right: 20px;
				margin-top: -20px;
				float: right;
			}
			/*.main{
				border: 1px solid red;
				width: 80%;
				margin-left: 10%;
				position: absolute;
				top: 950px;
				text-align: center;
				}
			#imgs{
					border: 0;
					width: 180px;
					height: 300px;
					margin-top: 20px;
				}
				#hh{
					color: red;
				}
				#price{
					margin-left: -70px;
				}
				.main  li{
					list-style-type: none;
				}
				#lis{
					float: left;
				}*/
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
					<a href="Add1.html">
						<li>添加图书</li>
					</a>
				</ul>
			</div>
			<div class="top"  style="overflow: hidden;">
				<div class="t_left">
					<h1>我的书城</h1>
					<p>这里拥有世界各地的书籍，只有你想不到，没有我们这里没有的图书</p>
					<img src="img/9E89F9C8-CFFF-4314-918E-9A75E819F00E.png"/>
				</div>
			</div>
<ul class="main" style="margin-top:50px;">
<?php
$db=mysql_connect("localhost","root","");
mysql_select_db("books");
mysql_query("set names utf8");
define('PAGESIZE',6);
$page=0;
if(isset($_GET["page"])){
	$page=$_GET["page"];
}


$query="select * from bookes limit ".$page*PAGESIZE.",".PAGESIZE;
$result=mysql_query($query);
if(mysql_num_rows($result)){
	while ($row=mysql_fetch_assoc($result)){
	?>
	<li>
		
		<img src="<?php echo $row["picture"];?>" >
		<h2><?php echo $row["name"]?></h2>
		<p>
			<?php echo "￥".$row["price"]?>
		</p>
	<a href="3.Buy.php?page=<?php echo $row["bookId"]?>">立即购买</a>
	</li>

<?php
}
}

$query="select count(bookid) from bookes";   
$result=mysql_query($query);
$row=mysql_fetch_row($result);
$count= $row[0];
//	算出总共需要多少页
	$pages=ceil($count/PAGESIZE);
	for ($i=0; $i < $pages; $i++){ 
		?>
		
		<a href="2.fenye.php?page=<?php echo $i;?>">
			<?php $num=$i+1;echo $num;?>
		</a>
<?php
	}
	?>

			</ul>

		</div>
	</body>

</html>