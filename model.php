<?php

$conn = mysqli_connect('localhost', 'ylengw21', 'ylengw21136', 'C354_ylengw21');

function delete_idea($id){
    global $conn;
    $sql = "delete from NewIdea where Id='{$id}'";
    $result = mysqli_query($conn,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

function get_all_newidea(){
    global $conn;
    $sql = "select * from NewIdea";
    $result = mysqli_query($conn,$sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result))
        $data[] = $row;
    return $data;
}


function post_into_newidea($username,$c){
    global $conn;
    $id = get_user_id($username);
    $sql = "insert into NewIdea (UserId,NewIdea) values ('{$id}','{$c}')";
    $result = mysqli_query($conn,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

function post_questionnaire($username,$c1,$c2,$c3,$c4){
    global $conn;
    $id = get_user_id($username);
    $sql = "insert into Questionnaire (C1,C2,C3,C4,UserId) values ('{$c1}','{$c2}','{$c3}','{$c4}','{$id}')";
    $result = mysqli_query($conn,$sql);
    if($result){
        return true;
    }else{
        return false;
    }

}


function post_get_all_answer(){
    global $conn;
    $sql = "select * from Questions where AnswerContext!=''";
    $result = mysqli_query($conn,$sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result))
        $data[] = $row;
    return $data;
}

function post_delete_username($username){
    global $conn;
    $sql = "delete from UserLeng where Username='{$username}'";
    $result = mysqli_query($conn,$sql);
    return $result;
}

function post_update_username($username,$password){
    global $conn;
    $sql = "update UserLeng set Password='{$password}' where Username='{$username}'";
    $result = mysqli_query($conn,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

function post_update_icon_username($username,$icon){
    global $conn;
    $sql = "update UserLeng set Icon='$icon' where Username='{$username}'";
    $result = mysqli_query($conn,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}


function post_delete_question($id){
    global $conn;
    $sql = "delete from Questions where Id='{$id}'";
    $result = mysqli_query($conn,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

function post_all_question(){
    global $conn;
    $sql = 'select * from Questions';
    $result = mysqli_query($conn,$sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result))
        $data[] = $row;
    return $data;
}

function post_into_question_context($id,$c){
    global $conn;
    $sql = "update Questions set AnswerContext='{$c}' where Id='{$id}'";
    $result = mysqli_query($conn,$sql);
    if($result){
        return true;
    }else{
        return false;
    }
}

function check_validity($u, $p)
{
    global $conn;

    $sql = "select * from UserLeng where Username = '$u' and Password = '$p'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function check_existence($u)
{
    global $conn;

    $sql = "select * from UserLeng where Username = '$u'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function join_a_user($u, $p, $email)
{
    global $conn;

    $date = date("Ymd");

    $sql = "Insert into UserLeng values (NULL, '$u', '$p', '$email', $date,NULL)";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function get_user_id($u)
{
    global $conn;

    $sql = "select * from UserLeng where Username = '$u'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['Id'];
    } else
        return -1;
}




function post_a_question($q, $u)
{
    global $conn;

    $uid = get_user_id($u);
    $current_date = date("Ymd");
    $sql = "insert into Questions (Question,UserId,Date,AnswerContext) values ('$q', $uid, $current_date,'')";
    $result = mysqli_query($conn, $sql);
    if ($result)
        return true;
    else
        return false;
}

function search_questions($term)
{
    global $conn;

    $sql = "select * from Questions where Question like '%$term%'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result))
        $data[] = $row;
    return $data;
}

function get_user_name($uid)
{
    global $conn;

    $sql = "select * from UserLeng where Id = $uid";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
        return "";
    else {
        $row = mysqli_fetch_assoc($result);
        return($row['Username']);
    }
}
function get_user_icon($username)
{
    global $conn;

    $sql = "select * from UserLeng where Username = '{$username}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
        return "";
    else {
        $row = mysqli_fetch_assoc($result);
        return($row['Icon']);
    }
}

function post_user_image($username,$url){
    global $conn;
    $id = get_user_id($username);
    $sql = "insert into UserImages values(default ,$id,'$url')";
    $result = mysqli_query($conn, $sql);
    if ($result)
        return true;
    else
        return false;
}

function get_user_images($username){
    global $conn;
    $id = get_user_id($username);
    $sql = "select * from UserImages where UserId = $id";
    $result = mysqli_query($conn, $sql);
    $res = [];

    foreach ($result as $item){
        array_push($res,$item);
    }

    return $res;
}

function del_user_images($id){
    global $conn;
    $sql = "delete from UserImages where Id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result)
        return true;
    else
        return false;
}



function list_questions()
{
    global $conn;
    $u = $_SESSION['username'];
    $uid = get_user_id($u);
    if ($uid < 0)
        return array();

    $sql = "select * from Questions where UserId = '$uid'";
    $result = mysqli_query($conn, $sql);
    $data = array();
	$i = 0;


    while($row = mysqli_fetch_assoc($result)){
		$data[$i] = $row;
		$i++;
	}
    return $data;
}

?>
