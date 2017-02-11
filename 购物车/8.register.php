

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
			
			.t_right #reg {
				margin-left: 180px;
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
			<div class="top">
				<div class="t_left">
					<h1>我的书城</h1>
					<p>这里拥有世界各地的书籍，只有你想不到，没有我们这里没有的图书</p>
					<img src="img/9E89F9C8-CFFF-4314-918E-9A75E819F00E.png" />
				</div>
				<div class="t_right">
					<h1>快速登录</h1>
					<form action="8.1register.php" method="post">
						<input type="text" name="username" id="" value="" placeholder="用户名" />
						<input type="password" name="password" id="" value="" placeholder="密码" />
						<input type="submit" value="注册" id="load" />
					</form>
				</div>
			</div>

		</div>
	</body>

</html>