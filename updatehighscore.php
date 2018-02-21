<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet">
	<style type="text/css">
		body{
			width:100%;
			height: 100%;
		    margin: 0;
		    padding: 0;
		    font-family: 'Kavivanar', cursive;
		    background-repeat: no-repeat cover;
		}
		#container{
			background-image: url("webball_arcade_game_Mouse_music2.jpg");
		    background-repeat: no-repeat;
		    background-size: cover;
		    background-color: #cccccc;
			color: white;
			width:100%;
			height: 100%;
		    margin: 0;
		    padding: 0;
		}
		.center {
		    margin: auto;
		    border: 5px solid green;
		    padding: 10px;
		    width: 50%;
		    height: 50%;
		    background: rgba(0,0,0,0.7);

		    position:absolute;
		    top:50%;
		    left:50%;
		    margin-left:-26%;/* half width*/
		    margin-top:-15%;/* half height*/
		    text-align: center;
		}
		h1{
			font-size: 300%;
		}
		#texts{
			text-align: center;
			margin: -20px 100px 20px 100px;
		}
		#text{
			font-size: 130%;
		}
		input{
			margin-top: 10px;
			font-size: 20px;
			width: 70%;
		}
		button{
			background: #555;
			color: #fff;
			height: 50px;
			width: 150px;
		}
		@media only screen and (max-width: 825px) {
    		h1{
				font-size: 200%;
			}
			.center {
			    margin: auto;
			    border: 5px solid green;
			    padding: 10px;
			    width: 70%;
			    height: 50%;
			    background: rgba(0,0,0,0.7);

			    position:absolute;
			    top:50%;
			    left:50%;
			    margin-left:-35%;/* half width*/
			    margin-top:-25%;/* half height*/
			    text-align: center;
			}
			#text{
				font-size: 100%;
			}
		}
		@media only screen and (max-width: 546px) {
			#text{
				font-size: 80%;
			}
			.center {
			    margin: auto;
			    border: 5px solid green;
			    padding: 10px;
			    width: 70%;
			    height: 50%;
			    background: rgba(0,0,0,0.7);

			    position:absolute;
			    top:50%;
			    left:50%;
			    margin-left:-35%;/* half width*/
			    margin-top:-40%;/* half height*/
			    text-align: center;
			}
			#texts{
				margin: -20px 20px 20px 20px;
			}
		}
	</style>

</head>

<body id="body">
	<?php
		$host = "localhost";
		$db_user = "id860052_kshitij";
		$db_password = "kshitij123";
		$db_name = "id860052_kshitij_db";

		// $host = "localhost";
		// $db_user = "root";
		// $db_password = "";
		// $db_name = "ball_arcade_game_db";

		$conn = mysqli_connect($host,$db_user,$db_password,$db_name);

		$mysql_qry = "UPDATE `ball_arcade_game` SET `highscore`=".$_GET["highscore"].";";
		$mysqli_result  = mysqli_query($conn,$mysql_qry);

		if(isset($_COOKIE["highscore"])){
			setcookie("highscore", "", time() - 3600);
			setcookie("highscore", $_GET["highscore"]);
		}
		// if ($conn->query($mysql_qry) === TRUE) {
		// 	$ch = curl_init("https://kshitijtomar.github.io/project/other_projects/ball_arcade_game_Mouse_music/game.html");
		// 	curl_exec($ch);
		// }
		// else{
		// 	$ch = curl_init("https://kshitijtomar.github.io/project/other_projects/ball_arcade_game_Mouse_music/game.html");
		// 	curl_exec($ch);
		// }
	?>

	<div id="container">
		<div id="box" class="center">
			<h1><u>Ball Arcade Game</u></h1>
			<div id="texts">
				<div id="text">Congratulations on scoring <br> a new Highscore of 
					<span id="highscore">
						<?php echo $_GET["highscore"];?>
					</span> points.
				</div>
				<!-- <div id="text">Name : <input id="score"></span></div> -->
			</div>
			<center><button onclick="begingame()">PLAY AGAIN</button></center>
		</div>
	</div>
</body>
<script type="text/javascript">
	function begingame(){
		location.href = "game.html";
	}
	// setInterval(function(){ location.href="game.html"; }, 10000);
</script>