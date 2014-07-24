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

		<!-- melonJS Library -->
		<script type="text/javascript" src="lib/melonJS-1.0.1.js"></script>

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
			window.onReady(function onReady() {
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
	</body>
</html>