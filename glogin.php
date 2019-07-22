<?php
session_start();
require_once 'vendor/autoload.php';

define( 'APPROOT', 'http://localhost/ecom' );

$CLIENT_ID = "356114307720-h8fgmj20l7ifvu091fd13s2mcrn0cr5e.apps.googleusercontent.com";

// client object does all the talk with google apis
$client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
$client->setAuthConfig("client_secret.json"); // identify yourself by providing api keys
$client -> setRedirectUri("http://localhost/ecom/glogin.php"); // the url to redirect after successful login or abortion
$client -> addScope("email"); // what are the things you would access, prmissions
$client -> addScope("profile");


$auth_url = $client -> createAuthUrl(); // get the url for login (consent screen)

if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $id_token = $token['id_token'];
  $attr = $client -> verifyIdToken($id_token);
  $gid = $attr['sub'];


  $query = ("SELECT * FROM glogin INNER JOIN customers ON glogin.user_id = customers.id WHERE glogin.id = '$gid' ");
  require_once("core/Model.php");
  $result = Model :: db_static() -> query($query);
  if($result -> num_rows == 1)
  {
      $_SESSION['user'] = $result -> fetch_assoc();
      $_SESSION['logged_in'] = true;
      header("Location: " . APPROOT);
  }

  echo "<pre>";
  print_r($attr);
  echo "</pre>";

  // if user already registered
  //    set the SESSION flags and redirect to home page
  // else ask user for the missing information


}
?>

<?php if(!isset($_GET['code'])) { ?>
    <a href="<?php echo $auth_url ?>">Login with Google</a>
<?php } else { ?>


        <form action="<?php echo APPROOT?>/signup/authenticate" method="post">
            <h2>Almost there, Please fill the following information.</h2>
            <input type="text" name="gid" value="<?php echo $attr['sub']?>">
			<div class="form_group" hidden>
				<label for="first_name">
					First Name
				</label>
				<input type="text" name="first_name" placeholder="Enter Your First Name" value="<?php echo $attr['given_name'] ?>">
			</div>


			<div class="form_group" hidden>
				<label for="first_name">
					Last Name
				</label>
				<input type="text" name="last_name" placeholder="Enter Your Last Name" value="<?php echo $attr['family_name'] ?>">
			</div>


			<div class="form_group">
				<label for="first_name">
					username
				</label>
				<input type="text" name="username" placeholder="Enter a unique username">
			</div>

			<div class="form_group" hidden>
				<label for="first_name">
					Email
				</label>
				<input type="text" name="email" placeholder="Enter Your Email Address" value="<?php echo $attr['email'] ?>">
			</div>


			<div class="form_group">
				<label for="first_name">
					Password
				</label>
				<input type="password" name="password" placeholder="Enter Your Password">
			</div>


			<div class="form_group">
				<label for="first_name">
					Gender
				</label>
				<select name = "gender">
					<option value = "m">Male</option>
					<option value = "f">Female</option>
				</select>
			</div>


			<div class="form_group">
				<input type="submit" value="Complete Registration" name="reg">
			</div>

		</form>
    </form>

<?php } ?>
