<?php
  use Models\User as User;
  use Models\UserInfo as UserInfo;
  use Models\RespuestaGetUsersInfo as RespuestaGetUsersInfo;
  use Models\RespuestaGetUsers as RespuestaGetUsers;
  use Models\RespuestaSetUser as RespuestaSetUser;
  use Models\RespuestaSetUserInfo as RespuestaSetUserInfo;
  use Models\RespuestaUpdateUser as RespuestaUpdateUser;
  use Models\RespuestaUpdateUserInfo as RespuestaUpdateUserInfo;

  require_once 'app/start.php';

  class RHConnection{

    protected $REST_URL;

    public function __construct(string $url) {
      $this->REST_URL = $url;
    }

    function getUsersInfo(){
      $ch =  curl_init();
      curl_setopt($ch, CURLOPT_URL, $this->REST_URL.'/api/UserInfo');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);
      if( curl_errno($ch) ) {
        return new RespuestaGetUsersInfo("Library ".curl_errno($ch), curl_error($ch), "Error", new UserInfo());
      } 
      curl_close($ch);
      $result = json_decode($response,true);

      $data = json_decode($result["data"],true);
      $usersInfo = array();
      
      foreach ($data as &$user) {
          array_push($usersInfo, new UserInfo($user["correo"], $user["nombre"], $user["rol"], $user["telefono"]));
      }

      return new RespuestaGetUsersInfo($result["code"], $result["message"], $result["status"], $usersInfo);
    } 

    function getUsers(){
      $ch =  curl_init();
      curl_setopt($ch, CURLOPT_URL, $this->REST_URL.'/api/User');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);
      if( curl_errno($ch) ) {
        return new RespuestaGetUsers("Library ".curl_errno($ch), curl_error($ch), "Error", new User());
      } 
      curl_close($ch);
      $result = json_decode($response,true);

      $data = json_decode($result["data"],true);
      $users = array();
      
      foreach ($data as $key => &$password) {
        array_push($users, new User($key, $password));
      }

      return new RespuestaGetUsers($result["code"], $result["message"], $result["status"], $users);
    } 

    function setUser($user, $pass, $newUser, $newPass){
      $curl = curl_init();
      $url = $this->REST_URL . "/api/User?user=" . $user . "&pass=" . $pass . "&newUser=".$newUser."&newPass=" . $newPass;

      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_POSTFIELDS => http_build_query(array()),
        CURLOPT_FOLLOWLOCATION => true
      ));

      $response = curl_exec($curl);
      if( curl_errno($curl) ) {
        return new RespuestaSetUser("Library ".curl_errno($curl), curl_error($curl), "Error", new User());
      } 
      curl_close($curl);
      $result = json_decode($response,true);

      return new RespuestaSetUser($result["code"], $result["message"], $result["status"], $result["data"]);
    }

    function setUserInfo($user, $pass, $searchedUser, $userInfoJSON){
      $curl = curl_init();

      $json = json_encode($userInfoJSON, true);
      echo($json);

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://localhost:5001/api/UserInfo?user='. $user .'&pass='. $pass .'&searchedUser='. $searchedUser .'&userInfoJSON='. urlencode($json),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => array('Content-Type: plain/text'),
        CURLOPT_POSTFIELDS => http_build_query(array()),
      ));

      $response = curl_exec($curl);
      if( curl_errno($curl) ) {
        echo curl_error($curl);
      } 
      curl_close($curl);
      $result = json_decode($response,true);

      echo($response);
      

    } 

    function updateUser($user, $pass, $newUser, $newPass){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->REST_URL .'/api/User/'.$newUser.'?user='.$user.'&pass='. $pass.'&newPass='. $newPass,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query(array()),
        CURLOPT_SSL_VERIFYPEER => false,
      ));
 
      $response = curl_exec($curl);
      if( curl_errno($curl) ) {
        return new RespuestaUpdateUser("Library ".curl_errno($curl), curl_error($curl), "Error", "");
      } 
      curl_close($curl);
      $result = json_decode($response,true);

      echo($response);

      return new RespuestaUpdateUser($result["code"], $result["message"], $result["status"], $result["data"]);
    } 

    function updateUserInfo($user, $pass, $searchedUser, $userInfoJSON){
      $curl = curl_init();

      $json = json_encode($userInfoJSON, true);
      echo($json);

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://localhost:5001/api/UserInfo/'. $searchedUser .'?user='. $user .'&pass='. $pass .'&userInfoJSON='. urlencode($json),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => array('Content-Type: plain/text'),
        CURLOPT_POSTFIELDS => http_build_query(array()),
      ));

      $response = curl_exec($curl);
      if( curl_errno($curl) ) {
        echo curl_error($curl);
      } 
      curl_close($curl);
      $result = json_decode($response,true);

      echo($response);
    }
    

  }

 
  // GETUSERSINFO
  // $usersInfo = $conn->getUsersInfo();
  // foreach($usersInfo->data as &$userInfo){
  //   echo($userInfo->getNombre());
  // }

  // GETUSERS
  // $users = $conn->getUsers();
  // foreach($users->data as &$user){
  //   echo($user->getUsername());
  // }

  // SETUSER
  //$conn->setUser("pruebas3", "12345678c", "test", "123456789j");
  
  // $conn = new RHConnection("https://localhost:44386");
  // // SETUSERINFO

  // $nuevoUserInfo = new UserInfo("john@doe.com", "John Doe", "rh", "2281004088"); 
  // $conn->setUserInfo("pruebas3", "12345678c", "test", $nuevoUserInfo);

  // UPDATEUSER
  //$conn->updateUser("pruebas3", "12345678c", "test", "123456789j");

  // UPDATEUSERINFO
  //$nuevoUserInfo = new UserInfo("john@doe.com", "John Doey", "ventas", "2281004088"); 
  //$conn->updateUserInfo("pruebas3", "12345678c", "test", $nuevoUserInfo);

?>