<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public $data=[];
	public function __construct() {
		parent::__construct();
		
        // $this->load->model('admin/Dashboard_model');
		// $this->admin_aut();
		
		
	}
	public function setAnalystics(){
		if($this->input->post('setAnalystics')){
			$setAnalystics = $this->input->post('setAnalystics')?$this->input->post('setAnalystics'):0;
			if($setAnalystics>0){
				$this->session->set_userdata('setAnalystics',$setAnalystics);
				redirect('admin/dashboard');
			}
		}
		$analytics  = $this->authUser();
		$this->data['availableData']=$availableData  = $this->getAnalyticsList($analytics);
		$this->load->view('admin/setAnalystics', $this->data);
	}
	public function _top10LandingPages(){
		$analytics  = $this->authUser();
		$analyticsID = $this->session->userdata('setAnalystics');

		$google_analytics_dimensions 	= 'ga:landingPagePath,ga:pageTitle'; //no change needed (optional)
$google_analytics_metrics 		= 'ga:landingPagePath'; //no change needed (optional)
$google_analytics_sort_by 		= '-ga:entrances'; //no change needed (optional)
$google_analytics_max_results 	= '10'; //no change needed (optional)


		// $params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'filters' => 'ga:medium==organic','max-results' => $google_analytics_max_results);
		$params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'max-results' => $google_analytics_max_results);

		$results =  $analytics->data_ga->get(
    		'ga:' . $analyticsID,
    		'30daysAgo',
    		'yesterday',
    		'ga:entrances',
    		$params
    	);

    	if (count($results->getRows()) > 0) {
    		$profileName = $results->getProfileInfo()->getProfileName();
    		$rows = $results->getRows();
    		echo '<pre>';
    		print_r($rows);
    		echo '</pre>';
    		die();
    		
    	}
	}
	public function avgPageLoadTime(){
		$analytics  = $this->authUser();
		$analyticsID = $this->session->userdata('setAnalystics');

		$google_analytics_dimensions 	= 'ga:pageTitle,ga:landingPagePath'; //no change needed (optional)
$google_analytics_metrics 		= 'ga:landingPagePath'; //no change needed (optional)
$google_analytics_sort_by 		= '-ga:avgPageLoadTime'; //no change needed (optional)
$google_analytics_max_results 	= '10'; //no change needed (optional)


		// $params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'filters' => 'ga:medium==organic','max-results' => $google_analytics_max_results);
		$params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'max-results' => $google_analytics_max_results);

		$results =  $analytics->data_ga->get(
    		'ga:' . $analyticsID,
    		'30daysAgo',
    		'yesterday',
    		'ga:avgPageLoadTime',
    		$params
    	);

    	if (count($results->getRows()) > 0) {
    		$profileName = $results->getProfileInfo()->getProfileName();
    		$rows = $results->getRows();
    		echo '<pre>';
    		print_r($rows);
    		echo '</pre>';
    		die();
    		
    	}
	}
	public function bounceRateByBrowser($start='7daysAgo',$end='yesterday'){
		$analytics  = $this->authUser();
		$analyticsID = $this->session->userdata('setAnalystics');
		$google_analytics_dimensions 	= 'ga:browser'; //no change needed (optional)
$google_analytics_metrics 		= 'ga:sessionToTransaction'; //no change needed (optional)
$google_analytics_sort_by 		= '-ga:bounceRate'; //no change needed (optional)
$google_analytics_max_results 	= '10'; //no change needed (optional)
		// $params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'filters' => 'ga:medium==organic','max-results' => $google_analytics_max_results);
		// ga:users,ga:sessions,ga:hits,ga:pageviewsPerSession,ga:avgSessionDuration,ga:bounceRate,ga:goalCompletionsAll,ga:goalConversionRateAll',
		$params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'max-results' => $google_analytics_max_results);
		$results =  $analytics->data_ga->get(
    		'ga:' . $analyticsID,
    		$start,
			$end,
    		'ga:bounceRate',
    		$params
    	);
    	if (count($results->getRows()) > 0) {
    		$profileName = $results->getProfileInfo()->getProfileName();
    		return $rows = $results->getRows();
    	}
    	return [];
	}
	public function bestPagesByGender($start='7daysAgo',$end='yesterday'){
		$analytics  = $this->authUser();
		$analyticsID = $this->session->userdata('setAnalystics');
		$google_analytics_dimensions 	= 'ga:userGender,ga:pageTitle,ga:pagePath'; //no change needed (optional)
$google_analytics_metrics 		= 'ga:sessionToTransaction'; //no change needed (optional)
$google_analytics_sort_by 		= '-ga:hits'; //no change needed (optional)
$google_analytics_max_results 	= '20'; //no change needed (optional)
		// $params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'filters' => 'ga:medium==organic','max-results' => $google_analytics_max_results);
		// ga:users,ga:sessions,ga:hits,ga:pageviewsPerSession,ga:avgSessionDuration,ga:bounceRate,ga:goalCompletionsAll,ga:goalConversionRateAll',
		$params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'max-results' => $google_analytics_max_results);
		$results =  $analytics->data_ga->get(
    		'ga:' . $analyticsID,
    		$start,
			$end,
    		'ga:hits',
    		$params
    	);
    	if (count($results->getRows()) > 0) {
    		$profileName = $results->getProfileInfo()->getProfileName();
    		return $rows = $results->getRows();
    		
    	}
    	return [];
	}
	public function top10LandingPages($start='7daysAgo',$end='yesterday'){
		$analytics  = $this->authUser();
		$analyticsID = $this->session->userdata('setAnalystics');
		$google_analytics_dimensions 	= 'ga:pagePath'; //no change needed (optional)
$google_analytics_metrics 		= 'ga:sessionToTransaction'; //no change needed (optional)
$google_analytics_sort_by 		= '-ga:entrances'; //no change needed (optional)
$google_analytics_max_results 	= '10'; //no change needed (optional)
		// $params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'filters' => 'ga:medium==organic','max-results' => $google_analytics_max_results);
		// ga:users,ga:sessions,ga:hits,ga:pageviewsPerSession,ga:avgSessionDuration,ga:bounceRate,ga:goalCompletionsAll,ga:goalConversionRateAll',
		$params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'max-results' => $google_analytics_max_results);
		$results =  $analytics->data_ga->get(
    		'ga:' . $analyticsID,
    		$start,
			$end,
    		'ga:entrances',
    		$params
    	);
    	if (count($results->getRows()) > 0) {
    		$profileName = $results->getProfileInfo()->getProfileName();
    		return $rows = $results->getRows();

    	}
    	return [];
	}
	public function organicVsPaid($start='7daysAgo',$end='yesterday'){
		$analytics  = $this->authUser();
		$analyticsID = $this->session->userdata('setAnalystics');
		$google_analytics_dimensions 	= 'ga:medium'; //no change needed (optional)
$google_analytics_metrics 		= 'ga:sessionToTransaction'; //no change needed (optional)
$google_analytics_sort_by 		= '-ga:hits'; //no change needed (optional)
$google_analytics_max_results 	= '20'; //no change needed (optional)
		// $params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'filters' => 'ga:medium==organic','max-results' => $google_analytics_max_results);
		// ga:users,ga:sessions,ga:hits,ga:pageviewsPerSession,ga:avgSessionDuration,ga:bounceRate,ga:goalCompletionsAll,ga:goalConversionRateAll',
		$params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'max-results' => $google_analytics_max_results);
		$results =  $analytics->data_ga->get(
    		'ga:' . $analyticsID,
    		$start,
			$end,
    		'ga:hits',
    		$params
    	);
    	if (count($results->getRows()) > 0) {
    		$profileName = $results->getProfileInfo()->getProfileName();
    		return $rows = $results->getRows();
    		
    	}
    	return [];
	}
	public function tempData(){
		$analytics  = $this->authUser();
		$analyticsID = $this->session->userdata('setAnalystics');
		$google_analytics_dimensions 	= 'ga:searchKeyword'; //no change needed (optional)
$google_analytics_metrics 		= 'ga:sessionToTransaction'; //no change needed (optional)
$google_analytics_sort_by 		= '-ga:searchDuration'; //no change needed (optional)
$google_analytics_max_results 	= '20'; //no change needed (optional)
		// $params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'filters' => 'ga:medium==organic','max-results' => $google_analytics_max_results);
		// ga:users,ga:sessions,ga:hits,ga:pageviewsPerSession,ga:avgSessionDuration,ga:bounceRate,ga:goalCompletionsAll,ga:goalConversionRateAll',
		$params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,'max-results' => $google_analytics_max_results);
		$results =  $analytics->data_ga->get(
    		'ga:' . $analyticsID,
    		'30daysAgo',
    		'yesterday',
    		'ga:searchDuration',
    		$params
    	);
    	if (count($results->getRows()) > 0) {
    		$profileName = $results->getProfileInfo()->getProfileName();
    		$rows = $results->getRows();
    		echo '<pre>';
    		print_r($rows);
    		echo '</pre>';
    		die();
    	}
	}
	public function getData(){
		$validKPIs=[
			"1"=>"Sessions and Users",
			"2"=>"New and Returning Visitors",
			"3"=>"Bounce Rate",
			"4"=>"Goal Conversion Rate",
			"5"=>"Time on Page",
			"6"=>"Average Page Load Time",
			"7"=>"Bounce Rate by Browser",
			"8"=>"Organic vs Paid Sessions",
			"9"=>"Average Session Duration",
			"10"=>"Top 5 Search Queries",
			"11"=>"Users by Gender",
			"12"=>"Pages per Session",
			"13"=>"Best Pages by Gender",
			"14"=>"Top 10 Landing Pages",
		];
		$startDate = $this->input->post('startDate')?$this->input->post('startDate'):date('Y-m-d',strtotime('-1 day'));;
		$endDate = $this->input->post('endDate')?$this->input->post('endDate'):date('Y-m-d',strtotime('-1 day'));;
		$kpi = $this->input->post('kpi')?$this->input->post('kpi'):1;
		$this->data['boxes']=[];
		$analytics  = $this->authUser();
		$analyticsID = $this->session->userdata('setAnalystics');
		if($kpi==1){
			$res=$this->getBasicAnalytics($analytics,$analyticsID,$startDate,$endDate,'sessions');
			$res['name']='Sessions';
			$res['icon']='unlock-alt';
			$this->data['boxes'][]=$res;
			$res=$this->getBasicAnalytics($analytics,$analyticsID,$startDate,$endDate,'users');
			$res['name']='Users';
			$res['icon']='users';
			$this->data['boxes'][]=$res;
		}elseif($kpi==3){
			$res=$this->getBasicAnalytics($analytics,$analyticsID,$startDate,$endDate,'bounceRate');
			$res['name']='Bounce Rate';
			$res['icon']='close';
			$res['val']=number_format($res['val'],2);
			$this->data['boxes'][]=$res;
		}elseif($kpi==12){
			$res=$this->getBasicAnalytics($analytics,$analyticsID,$startDate,$endDate,'pageviewsPerSession');
			$res['name']='Pages per Session';
			$res['icon']='close';
			$res['val']=number_format($res['val'],2);
			$this->data['boxes'][]=$res;
		}elseif($kpi==9){
			$res=$this->getBasicAnalytics($analytics,$analyticsID,$startDate,$endDate,'avgSessionDuration');
			$res['name']='Average Session Duration';
			$res['icon']='clock-o';
                        $seconds=$res['val'];
                        $hours = floor($seconds / 3600);
                        $minutes = floor(($seconds / 60) % 60);
                        $seconds = $seconds % 60;
			$res['val']= "$hours:$minutes:$seconds";
//			$res['val']=number_format($res['val'],2);
			$this->data['boxes'][]=$res;
		}elseif($kpi==6){
			$res=$this->getBasicAnalytics($analytics,$analyticsID,$startDate,$endDate,'avgPageLoadTime');
			// $res1=[];
			// $res1['val']=isset($res[0][1])?$res[0][1]:0;;
			// $res1['name']=isset($res[0][0])?$res[0][0]:0;
			// $res1['icon']='female';
			// $this->data['boxes'][]=$res1;
			// $res1['val']=isset($res[1][1])?$res[1][1]:0;;
			// $res1['name']=isset($res[1][0])?$res[1][0]:0;
			// $res1['icon']='male';
			// $this->data['boxes'][]=$res1;
			$res['name']='Average Page Load Time';
			$res['icon']='clock-o';
			$res['val']=number_format($res['val'],2);
			$this->data['boxes'][]=$res;
		}elseif($kpi==4){
			$res=$this->getBasicAnalytics($analytics,$analyticsID,$startDate,$endDate,'goalConversionRateAll');
		
			$res['name']='Goal Conversion Rate';
			$res['icon']='rocket';
			$res['val']=number_format($res['val'],2);
			$this->data['boxes'][]=$res;
		}elseif($kpi==5){
			$res=$this->getBasicAnalytics($analytics,$analyticsID,$startDate,$endDate,'avgTimeOnPage');
			$res['val']=number_format($res['val'],2);
			$res['name']='Time on Page';
			$res['icon']='rocket';
			$this->data['boxes'][]=$res;
		}elseif($kpi==11){
			$res=$this->getBasicAnalyticsGender($analytics,$analyticsID,$startDate,$endDate,'sessions');
			$res1=[];
			$res1['val']=isset($res[0][1])?$res[0][1]:0;;
			$res1['name']=isset($res[0][0])?$res[0][0]:0;
			$res1['icon']='female';
			$this->data['boxes'][]=$res1;
			$res1['val']=isset($res[1][1])?$res[1][1]:0;;
			$res1['name']=isset($res[1][0])?$res[1][0]:0;
			$res1['icon']='male';
			$this->data['boxes'][]=$res1;
		}elseif($kpi==2){
			$res=$this->getBasicAnalyticsGender($analytics,$analyticsID,$startDate,$endDate,'users',['dimensions'=>'ga:userType']);
			$res1=[];
			$res1['val']=isset($res[0][1])?$res[0][1]:0;;
			$res1['name']=isset($res[0][0])?$res[0][0]:0;
			$res1['icon']='user';
			$this->data['boxes'][]=$res1;
			$res1['val']=isset($res[1][1])?$res[1][1]:0;;
			$res1['name']=isset($res[1][0])?$res[1][0]:0;
			$res1['icon']='users';
			$this->data['boxes'][]=$res1;
		}elseif($kpi==7){
			$res=$this->bounceRateByBrowser($startDate,$endDate);
			$table=$this->load->view('admin/bounceRateByBrowser', ['res'=>$res], true);
			$res1=[];
			$this->data['is_table']=1;
			$this->data['tableHtml']=$table;
		}elseif($kpi==13){
			$res=$this->bestPagesByGender($startDate,$endDate);
			$table=$this->load->view('admin/bestPagesByGender', ['res'=>$res], true);
			$res1=[];
			$this->data['is_table']=1;
			$this->data['tableHtml']=$table;
		}elseif($kpi==14){
			$res=$this->top10LandingPages($startDate,$endDate);
			$table=$this->load->view('admin/top10LandingPages', ['res'=>$res], true);
			$res1=[];
			$this->data['is_table']=1;
			$this->data['tableHtml']=$table;
		}elseif($kpi==8){
			$res=$this->organicVsPaid($startDate,$endDate);
			$table=$this->load->view('admin/organicVsPaid', ['res'=>$res], true);
			$res1=[];
			$this->data['is_table']=1;
			$this->data['tableHtml']=$table;
		}

		$this->data['title']=isset($validKPIs[$kpi])?$validKPIs[$kpi]:'';
		$html = $this->load->view('admin/modal', $this->data, TRUE);
		echo json_encode(['data'=>$html]);
	}
	function getBasicAnalyticsGender($analytics, $profileId,$start='7daysAgo',$end='yesterday',$type='sessions',$dimen=['dimensions'=>'ga:userGender']) {
		$return=[];
		$return['val']=0;
		$results =  $analytics->data_ga->get(
			'ga:' . $profileId,
			$start,
			$end,
			'ga:'.$type,
			$dimen
		);
		if (count($results->getRows()) > 0) {
			$profileName = $results->getProfileInfo()->getProfileName();
			$rows = $results->getRows();
			
			return $rows;
		}
		return $return;
    }
	function getBasicAnalytics($analytics, $profileId,$start='7daysAgo',$end='yesterday',$type='sessions') {
  		$return=[];
  		$return['val']=0;
    	$results =  $analytics->data_ga->get(
    		'ga:' . $profileId,
    		$start,
    		$end,
    		'ga:'.$type
    	);
    	if (count($results->getRows()) > 0) {
    		$profileName = $results->getProfileInfo()->getProfileName();
    		$rows = $results->getRows();
    		$sessions = isset($rows[0][0])?$rows[0][0]:0;
    		$return['val']=$sessions;
    	}
    	return $return;
    }
	public function index() {
		
		
		$access_token = $this->session->userdata('access_token2');
		
		if(!$access_token){
			redirect('admin/login');
		}
		$setAnalystics = $this->session->userdata('setAnalystics');
		
		if(!$setAnalystics){
			redirect('admin/dashboard/setAnalystics');
		}
		$analytics  = $this->authUser();
		/*$this->data['availableData']=$availableData  = $this->getAnalyticsList($analytics);
		$all_keys = array_keys($availableData);
		$firstProfileId='';
		$first_key = isset($all_keys[0])?$all_keys[0]:'';*/
		$all_keys=[$setAnalystics];
		$this->data['is_data']=0;
		$this->data['is_data2']=0;
		$profileId = $this->input->get('profileId')?$this->input->get('profileId'):$setAnalystics;
		if($profileId!='' && in_array($profileId,$all_keys)){
			$this->data['profileId']=$profileId;
			/*$results =$this->getResults($analytics, $profileId);
			if (count($results->getRows()) > 0) {

				$profileName = $results->getProfileInfo()->getProfileName();

				$rows = $results->getRows();
				$sessions = $rows[0][0];
				$this->data['is_data']=1;
				$this->data['total_sessions']=$sessions;;
				// print "Total sessions: $sessions\n";
			}	
			$results =$this->getResults2($analytics, $profileId);
			if (count($results->getRows()) > 0) {

				$profileName = $results->getProfileInfo()->getProfileName();

				$rows = $results->getRows();
				$sessions = $rows[0][0];
				$this->data['is_data2']=1;
				$this->data['total_users']=$sessions;;
				// print "Total sessions: $sessions\n";
			}*/	
		}
		

		
		$this->load->view('admin/vw_dashboard', $this->data);
	}

	public function getAnalyticsList($analytics){
		$accounts = $analytics->management_accounts->listManagementAccounts();
		$arr=[];
		if (count($accounts->getItems()) > 0) {
			$items = $accounts->getItems();
			foreach($items as $item){
				$firstAccountId = $item->getId();
				$profileName = $item->getName();
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
        				// $profileName = $item->getName();
					
						$arr[$profileId]=$profileName;
					}

				}
			}
		}
		return $arr;
	}

	public function authUser()
	{
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
		$access_token2 = $this->session->userdata('access_token2');

		$client->setAccessToken($access_token2);
		return $analytics = new Google_Service_Analytics($client);
		$profileId=0;
		$accounts = $analytics->management_accounts->listManagementAccounts();


	}
	public function auth()
	{
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
if (! isset($_GET['code'])) {
	$auth_url = $client->createAuthUrl();
	header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
	if(!isset($_SESSION['access_token'])){
		$client->authenticate($_GET['code']);
		$_SESSION['access_token'] = $client->getAccessToken();
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
    function getResults($analytics, $profileId,$start='7daysAgo',$end='yesterday') {
  
    	return $analytics->data_ga->get(
    		'ga:' . $profileId,
    		$start,
    		$end,
    		'ga:sessions');
    }

    function getResults2($analytics, $profileId) {
  // Calls the Core Reporting API and queries for the number of sessions
  // for the last seven days.
    	return $analytics->data_ga->get(
    		'ga:' . $profileId,
    		'7daysAgo',
    		'yesterday',
    		'ga:users');
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
