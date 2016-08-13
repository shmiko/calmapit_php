<?php

header("Content-Type: application/json");

define('WWW_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);

require_once WWW_ROOT . 'vendor' . DIRECTORY_SEPARATOR .  'autoload.php';
require_once WWW_ROOT . 'src/Travellar/include' . DIRECTORY_SEPARATOR . 'helpers.php';

use Travellar\Model\DayModel;
use Travellar\Model\UserModel;
use Travellar\Model\TripModel;
use Travellar\Model\TransportModel;
use Travellar\Model\SleepplaceModel;
use Travellar\Model\LocationModel;

use Travellar\Controller\UserController;
use Travellar\Controller\TripController;

use Slim\Slim;

class api {
    private $app;
    private $userModel;
    private $feedback = array("status" => "error", "message" => "Invalid or no parameters given.");

    function __construct() {
        $this->userModel = new UserModel();
        $this->tripModel = new TripModel();
        $this->dayModel = new DayModel();
        $this->transportModel = new TransportModel();
        $this->sleepplaceModel = new SleepplaceModel();
        $this->locationModel = new LocationModel();

        $this->app = new Slim();

        $this->app->get('/', array($this, 'index'));

        $this->app->post('/day', array($this, 'insertDay'));
        $this->app->put('/day/:id', array($this, 'updateDayById'));
        $this->app->get('/day/:id', array($this, 'getDayById'));

        $this->app->post('/user', array($this, 'insertUser'));
        $this->app->put('/user/:id', array($this, 'updateUserById'));
        $this->app->get('/user/:id', array($this, 'getUserById'));
        $this->app->post('/user/check', array($this, 'checkLogin'));

        $this->app->get('/transports', array($this, 'getTransports'));
        $this->app->get('/sleepplaces', array($this, 'getSleepplaces'));
        $this->app->post('/location', array($this, 'insertLocation'));
        
        $this->app->post('/trip', array($this, 'insertTrip'));
        $this->app->get('/trip/:id', array($this, 'getTripById'));
        $this->app->put('/trip/:id', array($this, 'updateTripById'));
        $this->app->delete('/trip/:id', array($this, 'deleteTripById'));
        $this->app->get('/trips/:user_id', array($this, 'getTripsByUserId'));

        $this->app->run();
    }

    public function index() {
        $this->display();
    }

    public function insertDay() {
        $post = (array) json_decode($this->app->request()->getBody());
        $response = $this->dayModel->insertDay($post);

        if($response === false)
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function getTransports() {
        $response = $this->transportModel->getAll();

        if($response === false) 
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }
    
    public function getSleepplaces() {
        $response = $this->sleepplaceModel->getAll();

        if($response === false) 
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function getTripById($id) {
        $response = $this->tripModel->getTripByTripId($id);

        if($response === false) 
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function getDayById($id) {
        $response = $this->dayModel->getDayById($id);

        if($response === false) 
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function insertUser() {
        $post = (array) json_decode($this->app->request()->getBody());
        $response = $this->userModel->insertUser($post);
        if($response === true) {
            $response = array("status" => "success", "message" => $response);
            UserController::sendRegisterMail($post);
        }
        else
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function updateUserById($id) {
        $post = (array) json_decode($this->app->request()->getBody());
        $response = $this->userModel->updateUser($id, $post);

        if($response !== false) {
            $response = array("status" => "success", "message" => true, "data" => $response);
            UserController::sendUpdateMail($post);
        }
        else
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function updateDayById($id) {
        $post = (array) json_decode($this->app->request()->getBody());
        $response = $this->dayModel->updateDayById($id, $post);

        if($response === false)
            $response = array("status" => "error", "message" => $response);
        else
            $response = $this->dayModel->getDayById($id);

        $this->feedback = $response;

        $this->display();
    }

    public function getUserById($id) {
        $response = $this->userModel->getUserById($id);

        if($response === false) 
            $response = array("status" => "error", "message" => $response);
        else
            $response = array("status" => "success", "message" => true, "data" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function insertLocation() {
        $post = (array) json_decode($this->app->request()->getBody());
        $response = $this->locationModel->insertLocation($post);

        if($response === false)
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function insertTrip() {
        $post = (array) json_decode($this->app->request()->getBody());
        $response = $this->tripModel->insertTrip($post);

        if($response === false)
            $response = array("status" => "error", "message" => $response);
        else {
            $data = array("trip" => $response, "user" => $this->userModel->getUserById($post['user_id']));
            TripController::sendCreationNotice($data);
        }

        $this->feedback = $response;

        $this->display();
    }

    public function updateTripById($id) {
        $post = (array) json_decode($this->app->request()->getBody());
        $response = $this->tripModel->updateTrip($id, $post);

        if($response !== false) {
            if(isset($response['notRegistered'])) {
                TripController::sendInviteMails($response);
            }
        }
        else
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function getTripsByUserId($user_id) {
        $response = $this->tripModel->getTripsByUserId($user_id);

        if($response === false) 
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function deleteTripById($id) {
        // Get user data before deleting the trip
        $userData = array("companions" => $this->tripModel->getCompanionsByTripId($id), "trip" => $this->tripModel->getTripByTripId($id));

        // Delete the trip itself
        $response = $this->tripModel->deleteTripById($id);

        if($response === false) 
            $response = array("status" => "error", "message" => $response);
        else {
            $response = array("status" => "success", "message" => $response);
            TripController::sendDeletionNotice($userData);

            // Not needed in the app, we don't want trash in the model
            unset($response['notAdded']);
            unset($response['notRegistered']);
        }

        $this->feedback = $response;

        $this->display();
    }

    public function checkLogin() {
        $post = $this->app->request()->post();
        $response = $this->userModel->checkLogin($post);

        if(is_array($response))
            $response = array("status" => "success", "message" => true, "data" => $response);
        else
            $response = array("status" => "error", "message" => $response);

        $this->feedback = $response;

        $this->display();
    }

    public function display() {
        die(json_encode($this->feedback));
    }
}

new api();