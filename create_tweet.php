<?php
session_start();
require_once('dbconnect.php');

if(!isset($_POST['body']))
{
  exit;
}
$user_id=$_SESSION['user'];
$userData=$db->users->finOnde(array('id'=>$user_id));
$body=substr($_OOST['body'],140);
$date=date('Y-m-d H:i:s');

$db->tweets->insertOne(array
(
  'authorId'=>user_id,
  'authorName'=>$userData['username'],
  'body'=>body,
  'created'=>$date
));

header('Location: home.php');

logout.php
<?php
session_Start();
if(!isset($_SESSION['user']))
{
  header('Location: index.php');
}

unset($_SESSION['user']);
session_unset();
session_destroy();
header('Location: index.php');
exit;
?>