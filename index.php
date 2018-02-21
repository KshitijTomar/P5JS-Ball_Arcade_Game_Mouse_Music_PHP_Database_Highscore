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
		}
		h1{
			font-size: 52px;
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
		    width: 500px;
		    height: 300px;
		    background: rgba(0,0,0,0.7);

		    position:absolute;
		    top:50%;
		    left:50%;
		    margin-left:-253px;/* half width*/
		    margin-top:-180px;/* half height*/
		    text-align: center;
		}
		#texts{
			text-align: center;
			margin: -20px 100px 20px 100px;
		}
		#text{
			font-size: 24px;
		}
		input{
			margin-top: 10px;
			font-size: 20px;
			width: 108%;
		}
		button{
			background: #555;
			color: #fff;
			height: 50px;
			width: 150px;
		}
	</style>

</head>

<body id="body">
	<?php
		// $host = "localhost";
		// $db_user = "id860052_kshitij";
		// $db_password = "kshitij123";
		// $db_name = "id860052_kshitij_db";

		// $host = "localhost";
		// $db_user = "root";
		// $db_password = "";
		// $db_name = "ball_arcade_game_db";

		$conn = mysqli_connect($host,$db_user,$db_password,$db_name);

		$query = "SELECT * FROM `ball_arcade_game`;";
		
		$result = mysqli_query($conn,$query);
		$data = mysqli_fetch_assoc($result);
		$timesplayed = $data['timesplayed'];
		$highscore = $data['highscore'];

		if(isset($_COOKIE["highscore"])){
			setcookie("highscore", "", time() - 3600);
		}
		setcookie("highscore", $highscore);
		
		//increment timesplayed
		$timesplayed = $timesplayed + 1;
		$mysql_qry = "UPDATE `ball_arcade_game` SET `timesplayed`=".$timesplayed.";";
		$mysqli_result  = mysqli_query($conn,$mysql_qry);
		
		if(!isset($_COOKIE["score"])) {
			setcookie("score", 0);
		}
		else{
			if($highscore < $_COOKIE["score"] ){
				$highscore = $_COOKIE["score"];
				$ch = curl_init("updatehighscore.php?highscore=".$highscore);
				curl_exec($ch);
	    	}
		}

		if(isset($_COOKIE["highscore"])){
			setcookie("highscore", "", time() - 3600);
			setcookie("highscore", $highscore);
		}
	?>
	
	<div id="container">
		<div id="box" class="center">
			<h1><u>Ball Arcade Game</u></h1>
			<div id="texts">
				<div id="text">Highscore : <span id="highscore">0</span></div>
				<div id="text">Your Score : <span id="score">0</span></div>
			</div>
			<center><button onclick="begingame()">START</button></center>
			<!-- <div id="text">Name:</div> -->
			<!-- <center><button onclick="begingame()">START</button></center> -->
					<!-- </div> -->

			<?php
				// $host = "localhost";
				// $db_user = "id860052_kshitij";
				// $db_password = "kshitij123";
				// $db_name = "id860052_kshitij_db";

				// $host = "localhost";
				// $db_user = "root";
				// $db_password = "";
				// $db_name = "ball_arcade_game_db";

				// $conn = mysqli_connect($host,$db_user,$db_password,$db_name);


				//highscore timesplayed score					

				//read for highscore and timesplayed
				// $query = "SELECT * FROM `ball_arcade_game`;";
				
				// $result = mysqli_query($conn,$query);
				// $data = mysqli_fetch_assoc($result);
				// $timesplayed = $data['timesplayed'];
				// $highscore = $data['highscore'];
				
				// //increment timesplayed
				// $timesplayed = $timesplayed + 1;

				//check for high score
				if(isset($_COOKIE["score"]) && $highscore < $_COOKIE["score"] )
				{
						//update times played and highscore
				    	$mysql_qry = "UPDATE `ball_arcade_game` SET `highscore`=".$_COOKIE["score"].";";
				    	$mysqli_result  = mysqli_query($conn,$mysql_qry);
				    	$highscore=$_COOKIE["score"];
						setcookie("highscore", ($_COOKIE["score"]>$highscore ? $_COOKIE["score"] :$highscore));
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
	</div>
</body>
<script type="text/javascript">
	document.getElementById("highscore").innerText =getCookie("highscore");		
	document.getElementById("score").innerText =getCookie("score");
	function begingame(){
		location.href = "game.html";
	}

	function getCookie(cname) {
	    var name = cname + "=";
	    var decodedCookie = decodeURIComponent(document.cookie);
	    var ca = decodedCookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0) == ' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length, c.length);
	        }
	    }
	    return "";
	}
</script>
</html>
