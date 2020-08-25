<?php
	require_once('nusoap.php');

	//Success : Call web service uccess
	//Function_Error : Can't connect to web service
	//Service_Error : Error from web service
	function isValidSessionId($authenKey){

		$sessionId = $_REQUEST['sessionId'];
		$service = new IDMService();
		if($sessionId!=""){
			 $results = $service->verifySession($authenKey,$sessionId);
			 //print_r($results);
			 $err = $soapclient->$results['ErrorDesc'];
			if ($err) {
				return array('Status'=>'Function_Error', 'ErrorDesc'=>$err);
			}else{
					$ResponseCode = $results['VerifySessionResult']['ResponseCode'];
					$ResponseMsg  = $results['VerifySessionResult']['ResponseMsg'];
					$userId            = $results['VerifySessionResult']['ResultObject']['UserId'];

echo "Res :".$ResponseCode;
	 			    if($ResponseCode=="WSV0000"){
							return array('Status'=>'Success', 'UserId'=>$userId);
					}else{
							return array('Status'=>'Service_Error', 'ErrorDesc'=>$ResponseCode.",".$ResponseMsg);
					}
			}
		}else{
				return array('Status'=>'Session_Empty');
		}
	}




/* Create Class and Function */
/*
---> login
---> getUserAccount
---> getRolesForUser
---> isUserInRole
---> getPrivilegesForUser
---> isUserInPrivilege
---> verifySession
---> isUserInApplication
---> saveApplicationLog
---> logOut
---> webLogin
---> createSession
---> sUserLoggedIn
---> getEmployeeInfoByUserId
---> getEmployeeInfoByEmployeeId
---> getEmployeeInfoByUsername
---> callWebService
*/
class IDMService{
	 	var $idmURL      = 'http://idm.pea.co.th/webservices/IdmServices.asmx?wsdl';
		var $employeeURL = 'http://idm.pea.co.th/webservices/employeeservices.asmx?wsdl';
		var $wsEncode    = 'UTF-8';

/*-------------- function------------------------------*/
		function login($wsAuthenKey, $userName, $password){
			 $parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('Username'=>$userName, 'Password'=>$password))

				);
			 return $this->callWebService('Login', $parameters, $this->idmURL);
		}


		function getUserAccount($wsAuthenKey, $userId){
			// echo "getUserAccount >>> <br/>";
			// echo "wsAuthenKey : ".$wsAuthenKey."<br/>";
			// echo "userId : ".$userId."<br/><br/>";
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey, 'ClientUserId'=>$clientUserId, 'ClientUserIp'=>$clientUserIp, 'ClientUserName'=>$clientUserName,
										'InputObject'=>array('UserId'=>$userId))

			);
			return $this->callWebService('GetUserAccount', $parameters, $this->idmURL);
		}

		function getRolesForUser($wsAuthenKey, $applicationId, $userId){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('ApplicationId'=>$applicationId, 'UserId'=>$userId))

			);
			return $this->callWebService('GetRolesForUser', $parameters, $this->idmURL);
		}

		function isUserInRole($wsAuthenKey, $roleId, $userId){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('RoleId'=>$roleId, 'UserId'=>$userId))

			);
			return $this->callWebService('IsUserInRole', $parameters, $this->idmURL);
		}

		function getPrivilegesForUser($wsAuthenKey, $userId, $applicationId){
			 $parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('UserId'=>$userId, 'ApplicationId'=>$applicationId))

				);
			 return $this->callWebService('GetPrivilegesForUser', $parameters, $this->idmURL);
		}

		function isUserInPrivilege($wsAuthenKey, $userId, $privilegeID){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('UserId'=>$userId, 'PrivilegeId'=>$privilegeID))

				);
			 return $this->callWebService('IsUserInPrivilege', $parameters, $this->idmURL);
		}

		function verifySession($wsAuthenKey, $sessionId){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('SessionId'=>$sessionId))

			);
			return $this->callWebService('VerifySession', $parameters, $this->idmURL);
		}

		function isUserInApplication($wsAuthenKey, $applicationId, $userId){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('ApplicationId'=>$applicationId, 'UserId'=>$userId))

			);
			return $this->callWebService('IsUserInApplication', $parameters, $this->idmURL);
		}

		function saveApplicationLog($wsAuthenKey, $clientEventType, $clientEventDetail, $clientEventStatus, $userId, $username, $userIp){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('ClientEventType'=>$clientEventType, 'ClientEventDetail'=>$clientEventDetail,
															 'ClientEventStatus'=>$clientEventStatus, 'UserId'=>$userId,
															 'Username'=>$username, 'UserIp'=>$userIp))

			);
			return $this->callWebService('SaveApplicationLog', $parameters, $this->idmURL);
		}

		function logOut($wsAuthenKey, $userId){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('UserId'=>$userId))

			);
			return $this->callWebService('LogOut', $parameters, $this->idmURL);
		}

		function webLogin($wsAuthenKey, $userName, $password, $sessionId){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('Username'=>$userName, 'Password'=>$password, 'SessionId'=>$sessionId))

			);
			return $this->callWebService('WebLogin', $parameters, $this->idmURL);
		}

		function createSession(){
			$parameters = array();
			return $this->callWebService('CreateSession', $parameters, $this->idmURL);
		}

		function isUserLoggedIn($wsAuthenKey, $sessionId){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('SessionId'=>$sessionId))

			);
			return $this->callWebService('IsUserLoggedIn', $parameters, $this->idmURL);
		}

		function getEmployeeInfoByUserId($wsAuthenKey, $userId){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('UserId'=>$userId))

			);
			return $this->callWebService('GetEmployeeInfoByUserId', $parameters, $this->employeeURL);
		}

		function getEmployeeInfoByEmployeeId($wsAuthenKey, $employeeId){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('EmployeeId'=>$employeeId))

			);
			return $this->callWebService('GetEmployeeInfoByEmployeeId', $parameters, $this->employeeURL);
		}

		function getEmployeeInfoByUsername($wsAuthenKey, $userName){
			$parameters = array(
					'request'=> array('WSAuthenKey'=>$wsAuthenKey,
										'InputObject'=>array('Username'=>$userName))

			);
			return $this->callWebService('GetEmployeeInfoByUsername', $parameters, $this->employeeURL);
		}

		function callWebService($serviceName, $parameters, $url){
			 // echo "<br/> servicename :".$serviceName;
			 // echo "<br/> parameters :".$parameters;
			 // echo "<br/> url :".$url."<br/><br/>";
			 try{
				 $soapclient=new nusoap_client($url,true);
				 //print_r($soapclient);
				 $soapclient->soap_defencoding = $this -> wsEncode;
				 $soapclient->decode_utf8 = false;
				 $results = $soapclient->call($serviceName,$parameters);
				 $err = $soapclient->getError();
				 if($err) {
					return array('Status'=>'Fail', 'ErrorDesc'=>$err);
				 }else{
				   return $results;

				 }
			 }catch(SoapFault $e){
				 echo "<br/> error SoapFault : ".$e->getMessage();
				//print_r($e);
			 }

		}


	}

?>
