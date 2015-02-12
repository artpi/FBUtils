<?php
/*
Various Facebook utility methods
@author artpi (http://piszek.com)
To use this class you have to:
- download FB PHP API
- require autoload.php
define FACEBOOK_SDK_V4_SRC_DIR
*/

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

class FBUtils {
    private $session;

    function __construct($app_id, $app_secret, $token) {
        FacebookSession::setDefaultApplication($app_id, $app_secret);
        $this->session = new FacebookSession($token);
    }

    function post($profile, $message, $link) {
        $page_post = (new FacebookRequest( $this->session, 'POST', '/'. $profile .'/feed', array(
            'token' => FB_TOKEN,
            'message' => $message,
            'link' => $link
          ) ))->execute()->getGraphObject()->asArray();
        return $page_post['id'];
    }
}



?>