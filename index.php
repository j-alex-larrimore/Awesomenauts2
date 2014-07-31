<!DOCTYPE html>

<?php

require_once 'php/core/init.php';
include 'php/functions.php';
$state = 0;
$player = '';

//$doc = new DOMDocument();
//$doc->validateOnParse = true;
//$doc->loadHTML('index.php');
//$nodes = $doc->getElementsByTagName('body');
//for($i = 0; $i < $nodes->length; $i++){
//    $attr = $nodes->item($i);
//    echo $attr->firstChild->localName;
//}

//echo $doc;
 
if(Input::exists()){
    if(isset($_POST['register'])){
        //echo 'submitted';
        $state = 3;
        $player = newProf();
        echo $player->data()->username;
         
    }else if(isset($_POST['load'])){
       //echo 'load';
       $state = 4;
       $player = playerLoad();
        
    }else if(isset($_POST['save'])){
       //echo 'save';
       $state = 4;
       $player = playerSave($player);
    }
    else {
        echo 'error';
    }
}

 ?>

 <html>
	<head>
		<title>Awesomenauts?</title>
		<link rel="stylesheet" type="text/css" media="screen" href="index.css">
		<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
	</head>
	<body>
		<!-- Canvas placeholder -->
            <div id="screen"></div>
            <form action='' id="input" method="post">
                <input type='submit' name='save' id='save' value='Save Your Progress'>
                <div class="field">
                    <label for="username">Username</label>
                    <input type='text' name='username' id='username' value='<?php echo escape(Input::get('username'));?>' autocomplete ='off'>
                </div>

                <div class='password'>
                    <label for='password'>Choose a password</label>
                    <input type='password' name='password' id='password'>
                </div>

                <div class='field' id='passAgain'>
                    <label for='password_again'>Enter your password again</label>
                    <input type='password' name='password_again' id='password_again'>
                </div>


                <input type='hidden' name='token' value="<?php echo Token::generate(); ?>">
                <input type='submit' name='register' id='register' value='Register'>
                <input type='submit' name='load' id='load' value='Load'>
                <input type ='hidden' name='exp' id='exp' value =<?php 
                if($player != ''){
                    echo $player->data()->EXP; 
                }
                ?>>
                <input type ='hidden' name='exp1' id='exp1' value =<?php 
                if($player != ''){
                    echo $player->data()->EXP1; 
                }
                ?>>
                <input type ='hidden' name='exp2' id='exp2' value =<?php 
                if($player != ''){
                    echo $player->data()->EXP2; 
                }
                ?>>
                <input type ='hidden' name='exp3' id='exp3' value =<?php 
                if($player != ''){
                    echo $player->data()->EXP3; 
                }
                ?>>
                <input type ='hidden' name='exp4' id='exp4' value =<?php 
                if($player != ''){
                    echo $player->data()->EXP4; 
                }
                ?>>
                <input type ='hidden' name='player' id='player' value=<?php 
                if($player != ''){
                    echo $player->data()->username; 
                }
                ?>>
                <input type ='hidden' name='pword' id='password' value=<?php 
                if($player != ''){
                    echo $player->data()->password; 
                }
                ?>>
            </form>
                
                
                <div id="state" name='Hi'><?php echo $state; ?></div>
<!--                <div id='pName'><?php 
//                if($player != ''){
//                    echo $player->data()->username; 
//                }
                ?> </div>-->
                
		<!-- melonJS Library -->
		<script type="text/javascript" src="lib/melonJS-1.0.2.js"></script>

		<!-- Plugin(s) -->
		<script type="text/javascript" src="lib/plugins/debugPanel.js"></script>
		
		<!-- Game Scripts -->
		<script type="text/javascript" src="js/game.js"></script>
		<script type="text/javascript" src="js/resources.js"></script>

		<script type="text/javascript" src="js/entities/entities.js"></script>
		<script type="text/javascript" src="js/entities/HUD.js"></script>

		<script type="text/javascript" src="js/screens/title.js"></script>
		<script type="text/javascript" src="js/screens/play.js"></script>
                <script type="text/javascript" src="js/screens/pause.js"></script>
                <script type="text/javascript" src="js/screens/gameOver.js"></script>
                <script type="text/javascript" src="js/screens/charSelect.js"></script>
                <script type="text/javascript" src="js/screens/spendExp.js"></script>
                <script type="text/javascript" src="js/screens/spendGold.js"></script>
                <script type="text/javascript" src="js/screens/newProfile.js"></script>
                <script type="text/javascript" src="js/screens/loadProfile.js"></script>
                
                <script type="text/javascript" src="js/screens/Menu.js"></script>
                
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		<!-- Bootstrap & Mobile optimization tricks -->
		<script type="text/javascript">
			window.onReady(function onReady() {         //This stuff runs the game
				game.onload();

				// Mobile browser hacks
				if (me.device.isMobile && !navigator.isCocoonJS) {
					// Prevent the webview from moving on a swipe
					window.document.addEventListener("touchmove", function (e) {
						e.preventDefault();
						window.scroll(0, 0);
						return false;
					}, false);

					// Scroll away mobile GUI
					(function () {
						window.scrollTo(0, 1);
						me.video.onresize(null);
					}).defer();

					me.event.subscribe(me.event.WINDOW_ONRESIZE, function (e) {
						window.scrollTo(0, 1);
					});
				}
			});
		</script>
                
                <script>
                    //if
                </script>
	</body>
</html>

<!--if(save){
    $player = save(input, $player)
}


save(input, player)
return $player-->