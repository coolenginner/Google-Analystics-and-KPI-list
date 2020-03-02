<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->lang->load("account","english");
		$this->load->model('admin/Admin_model');
		// @session_start();
	}
	public function set_sess(){
		$this->session->userdata('access_token2','sdfsdfs');
	}
	public function index() {
		$user_data = $this->session->userdata('userData');
		$user_id = isset($user_data['admin_id']) ? $user_data['admin_id'] : 0;
		
		$data = '';
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() != FALSE) {
			$result = $this->Admin_model->Authenticate($this->input->post('email'), md5($this->input->post('password')));
			if (isset($result->admin_id)) {
				$this->session->set_userdata('userData', array(
					'admin_id' => $result->admin_id,
					'admin_username' => $result->admin_username,
					'admin_fname' => $result->admin_fname,
					'admin_lname' => $result->admin_lname
				));
				redirect('admin/dashboard');
			} else {
				$data['error'] = 'Invalid email or password';
			}
		}
		$this->load->view('admin/login', $data);
	}
	public function logout() {

		$this->session->set_userdata('userData', '');
		@session_destroy();
		redirect('admin/login');
	}
	public function auth()
	{
		$access_token = $this->session->userdata('access_token2');

		if($access_token){
			redirect('admin/dashboard/setAnalystics');
		}
		include_once APPPATH . '/libraries/Google/autoload.php';
        //Insert your cient ID and secret
        //You can get it from : https://console.developers.google.com/
		$client_id = '357122621734-22q70ba47p945nhcj11q959ppca3l1ak.apps.googleusercontent.com';
		$client_secret = 'qkH6k9RO3ZL4Una_DCwjaBE_';
		$redirect_uri = base_url() . 'auth';
		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->addScope("email");
		$client->addScope("profile");
		$client->addScope('https://www.googleapis.com/auth/analytics.readonly');
        // $client->setScopes([]);
        // $client->setAccessType("online");
		$service = new Google_Service_Oauth2($client);
     /*  if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  // Set the access token on the client.
  $client->setAccessToken($_SESSION['access_token']);
  // Create an authorized analytics service object.
  $analytics = new Google_Service_AnalyticsReporting($client);
  $accounts = $analytics->management_accounts->listManagementAccounts();
  echo '<pre>';
  print_r($accounts);
  echo '</pre>';
  die();
}else{
	$auth_url = $client->createAuthUrl();
	header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
}
die();*/
$a=1;
// if (! isset($_GET['code'])) {
if (!isset($_GET['code'])) {
	$auth_url = $client->createAuthUrl();
	header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
	$access_token = $this->session->userdata('access_token2');
	if(!$access_token){
		$client->authenticate($_GET['code']);
		$_SESSION['access_token2'] = $client->getAccessToken();
		$this->session->set_userdata('access_token2',$_SESSION['access_token2']);
		$this->session->set_userdata('userData', $_SESSION['access_token2']);
			redirect('admin/dashboard/setAnalystics');
			exit();
        		/*$getAccessToken = $client->getAccessToken();
        		if($getAccessToken!=''){
        			$getAccessToken_ar = json_decode($getAccessToken);	
        			$access_token = isset($getAccessToken_ar->access_token)?$getAccessToken_ar->access_token:'';
        			if($access_token!=''){
        				$_SESSION['access_token'] = $access_token;		
        			}
        		}*/
        	}
        	
        	// echo $_SESSION['access_token'];
        	$client->setAccessToken($_SESSION['access_token']);

        	$analytics = new Google_Service_Analytics($client);
        	$profileId=0;
        	$accounts = $analytics->management_accounts->listManagementAccounts();
        	if (count($accounts->getItems()) > 0) {
        		$items = $accounts->getItems();
        		$firstAccountId = $items[0]->getId();
        		$profileName = $items[0]->getName();
    // Get the list of properties for the authorized user.
        		$properties = $analytics->management_webproperties
        		->listManagementWebproperties($firstAccountId);
        		if (count($properties->getItems()) > 0) {
        			$items = $properties->getItems();
        			$firstPropertyId = $items[0]->getId();
      // Get the list of views (profiles) for the authorized user.
        			$profiles = $analytics->management_profiles
        			->listManagementProfiles($firstAccountId, $firstPropertyId);
        			if (count($profiles->getItems()) > 0) {
        				$items = $profiles->getItems();
        // Return the first view (profile) ID.
        				$profileId = $items[0]->getId();
        				// $profileName = $items[0]->getName();
        				echo '<pre>';
        				print_r($profileName);
        			} 
        		}
        	}
        	echo '<pre>';
        	print_r($accounts);
        	if($profileId>0){
        		$results =$this->getResults($analytics, $profileId);
        		$this->printResults( $results);
        	}
        	/*$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));*/
        }
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        	$client->setAccessToken($_SESSION['access_token']);
        } else {
        	$auth_url = $client->createAuthUrl();
        	header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        }
        if (isset($_GET['code'])) {
            /*$client->authenticate($_GET['code']);
            unset($_SESSION['access_token']);
            $_SESSION['access_token'] = $client->getAccessToken();
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;*/
        }
    }
    function getResults($analytics, $profileId) {
  // Calls the Core Reporting API and queries for the number of sessions
  // for the last seven days.
    	return $analytics->data_ga->get(
    		'ga:' . $profileId,
    		'7daysAgo',
    		'today',
    		'ga:sessions');
    }
    function printResults($results) {
  // Parses the response from the Core Reporting API and prints
  // the profile name and total sessions.
    	if (count($results->getRows()) > 0) {
    // Get the profile name.
    		$profileName = $results->getProfileInfo()->getProfileName();
    // Get the entry for the first entry in the first row.
    		$rows = $results->getRows();
    		$sessions = $rows[0][0];
    // Print the results.
    // print "First view (profile) found: $profileName\n";
    		print "Total sessions: $sessions\n";
    	} else {
    		print "No results found.\n";
    	}
    }
}
