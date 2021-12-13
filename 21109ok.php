<?php
include("connect.php");

$userid = $userpwd = $username = $major = "";
$userbirth = $userhobby = $useraddress = "";
$userintroduce = $temphobby ="";
//  이전페이지 정보
$temppage = $_SERVER['HTTP_REFERER'];
$userid = test_input($_POST["userid"]);
$userpwd = test_input($_POST["userpwd"]);
$username = test_input($_POST["username"]);
$major = test_input($_POST["major"]);
$userbirth = test_input($_POST["userbirth"]);
foreach ($_POST['userhobby'] as $item) {
    $temphobby = $temphobby.$item . " ";
}
$userhobby = test_input($temphobby);
$useraddress = test_input($_POST["useraddress"]);
$userintroduce = test_input($_POST["userintroduce"]);
if (empty($userid)) { ?>
    <script>
        alert("아이디 오류!!");
        history.back();
    </script>
    <?php
}
if (empty($userpwd)) { ?>
    <script>
        alert("비밀번호 오류!!");
        history.back();
    </script>
    <?php
}
if (empty($username)) { ?>
    <script>
        alert("이름오류 오류!!");
        history.back();
    </script>
    <?php
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//echo "사용자 ID는 : " . $userid . "<br>";
//echo "사용자 비밀번호 : " . $userpwd . "<br>";
//echo "사용자 성명 : " . $username. "<br>";
//echo "사용자 전공 : " . $major. "<br>";
//echo "생년월일 :  " . $userbirth . "<br>";
//echo "관심분야 : " . $userhobby . "<br>";
//echo "거주지 :  " . $useraddress. "<br>";
//echo "간단소개 :  " . $userintroduce . "<br>";

// prepare and bind
$stmt = $conn->prepare("INSERT INTO member 
    (userid, userpwd, username,major,userbirth,userhobby, useraddress,userintroduce) 
    VALUES (?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $userid, $userpwd, $username,
    $major,$userbirth,$userhobby,$useraddress,$userintroduce);

$stmt->execute();
header('location:/21109.html');
$stmt->close();
$conn->close();
?>