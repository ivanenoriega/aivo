<?php
namespace App\Controllers;
use Facebook;

class FacebookController
{
	const APP_ID_ENV_NAME = 118597492105224;
	const APP_SECRET_ENV_NAME = '92f2bb3cba3c7995e2a0e38d25c3966c';
	const ACCESSS_TOKEN = '118597492105224|wYxHDJRs0FZ7iA9pHueRv9HMjjc';

	// Facebook SDK class instance
	private $fb;

	public function __construct() {
		$this->fb = new Facebook\Facebook([
			'app_id' => self::APP_ID_ENV_NAME,
			'app_secret' => self::APP_SECRET_ENV_NAME
		]);
	}
	
	public function get($request, $response, $args){
		$result = array('errors' => '');
		$statusCode = 400;
		
		if(is_numeric($args['id'])){
			try {
				$faceResponse = $this->fb->get('/' . $args['id'], self::ACCESSS_TOKEN);

			} catch(\Facebook\Exceptions\FacebookResponseException $e) {
				$result['errors'][] = 'Graph returned an error: ' . $e->getMessage();

			} catch(\Facebook\Exceptions\FacebookSDKException $e) {
				$result['errors'][] = 'Facebook SDK returned an error: ' . $e->getMessage();
			}

			if(!$result['errors']){
				$statusCode = 200;
				$user = $faceResponse->getGraphUser();
				$result = array(
					'id' => $user->getId(),
					'name' => $user->getName(),
					'first_name' => $user->getFirstName(),
					'middle_name' => $user->getMiddleName(),
					'last_name' => $user->getLastName(),
					'email' => $user->getEmail(),
					'gender' => $user->getGender(),
					'link' => $user->getLink(),
					'birthday' => $user->getBirthday(),
					'location' => $user->getLocation(),
					'hometown' => $user->getHometown(),
					'significant_other' => $user->getSignificantOther(),
					'picture' => $user->getPicture(),
				);
			}
		} else {
			$result['errors'][] = "Facebook user's Id should be a number";
		}

		return $response->withStatus($statusCode)->withJson($result);
  	}
}