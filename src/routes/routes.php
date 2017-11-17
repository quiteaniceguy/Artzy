<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Artzy/src/models/sqlmodels/SQLInterface.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/RemoteFileLibrary/S3Interface.php");




	function call($controllerName, $action, $conn){
		$s3 = require $_SERVER['DOCUMENT_ROOT'] . "/Artzy/config/S3Connect.php";
		$fileUploader = new S3Interface($config['s3']['bucket'], $s3);

		$sqlInterface = new SQLInterface($conn);


		require_once($_SERVER['DOCUMENT_ROOT'] . "/Artzy/src/controllers/{$controllerName}_controller.php");

		switch($controllerName){
			case 'test':
				$controller = new TestController();
				break;
			case 'login':
				$controller = new LoginController();
				break;
			case 'createAcc':
				$controller = new CreateAccountController();
				break;
			case 'uploadMedia':
				$controller = new UploadMediaController();
				break;
			case 'messageViewer':
				$controller = new MessageViewerController($sqlInterface);
				break;
			case 'muralReview':
				$controller = new MuralReviewController();
				break;
			case 'groupViewer':
				$controller = new GroupViewerController($sqlInterface);
				break;
			case 'profileViewer':
				$controller = new ProfileViewerController($sqlInterface);
				break;
			case 'mediaViewer':
				$controller = new MediaViewerController($sqlInterface);
				break;
			case 'logout':
				$controller = new LogoutController();
				break;
			case 'profileEditor':
				$controller = new ProfileEditorController($sqlInterface);
				break;

		}

		$controller->{$action}();


	}

	$controllers = array('test' => ['home', 'error'],
						'login' => ['home', 'error'],
						'createAcc' => ['home', 'error'],
						'uploadMedia' => ['home', 'error'],
						'messageViewer' => ['home', 'error'],
						'muralReview' => ['home', 'error'],
						'groupViewer' => ['home', 'error'],
						'profileViewer' => ['home', 'error'],
						'mediaViewer' => ['home', 'error'],
						'logout' => ['home', 'error'],
						'profileEditor' => ['home', 'error']);

	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])){
			call($controller, $action, $conn);
		}else{
			call('test', 'error', $conn);
		}
	}else{
		call('test', 'error', $conn);
	}

?>
