<?php

if (empty($_POST['page'])) {
    $display_type = 'none';
    $error_message_username = "";
    $error_message_password = "";
    include('starPage.php');
    exit();
}

require('model.php');


session_start();

if ($_POST['page'] == 'starPage') {
    $command = $_POST['command'];
    switch ($command) {
        case 'SignIn':
            if (!check_validity($_POST['username'], $_POST['password'])) {
                $error_msg_username = '* Wrong username, or';
                $error_msg_password = '* Wrong password';

                $display_type = 'signin';

                include('starPage.php');
            } else {
                $_SESSION['SignIn'] = 'Yes';
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['icon'] = get_user_icon($_SESSION['username']);
                include('mainPage.php');
            }
            exit();

        case 'Join':

            if (check_existence($_POST['username'])) {
                $join_error_msg_username = '* Username exists';
                $display_type = 'join';

                include('starPage.php');
            } else if (join_a_user($_POST['username'], $_POST['password'], $_POST['email'])) {
                $error_msg_username = '';
                $error_msg_password = '';
                $display_type = 'signin';
                echo "<script>onload=function() {
                  alert('success registered')
                }</script>";
                include('starPage.php');
            } else {
                $join_error_msg_username = '* Something wrong';
                $display_type = 'join';

                include('starPage.php');
            }
            exit();
        //...
    }
} else if ($_POST['page'] == 'MainPage') {
    if (!isset($_SESSION['SignIn'])) {
        $display_type = 'none';
        include('starPage.php');
        exit();
    }

    $command = $_POST['command'];
    switch ($command) {
        case 'PostAQuestion':
            $result = post_a_question($_POST['question'], $_SESSION['username']);
            if ($result) $result = "Posted succesfuly!";
            else $result = "Not posted";
            include('mainPage.php');
            break;
        case 'SearchQuestions':
            $data = search_questions($_POST['search-term']);
            $result = "<table class='table table-bordered table-condensed'>";
            $result .= "<tr><th>Question</th><th>Username</th><th>Date</th></tr>";
            for ($i = 0; $i < count($data); $i++) {
                $result .= "<tr>";
                $result .= "<td>" . $data[$i]['Question'] . "</td>";
                $result .= "<td>" . get_user_name($data[$i]['UserId']) . "</td>";
                $result .= "<td>" . $data[$i]['Date'] . "</td>";
                $result .= "</tr>";
            }
            $result .= "</table>";
            include('mainPage.php');
            break;
        case 'SignOut':
            session_unset();
            session_destroy();
            $display_type = 'none';
            include('starPage.php');
            break;
        case 'PostUpdateUsername':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = post_update_username($username, $password);
            if ($result) {
                echo "Modification succeeded!" . "<a href='starPage.php'>to back</a>";
            } else {
                echo "Modification failed" . "<a href='starPage.php'>to back</a>";
            }
            break;
        case 'PostUnsubscribe':
            $username = $_POST['username'];
            $username = trim($username, " ");
            $result = post_delete_username($username);
            if ($result) {
                echo "Delete succeeded" . "<a href='starPage.php'>to back</a>";
            } else {
                echo "Delete failed" . "<a href='starPage.php'>to back</a>";
            }
            break;
        case 'PostQuestion':
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $question = $_POST['question'];
                $result = post_a_question($question, $username);
            }
            break;
        case 'PostListQuestion':
            $result = list_questions();
            header('Content-Type: application/json');
            echo json_encode($result);
            break;
        case 'PostDeleteQuestion':
            $id = $_POST['questionId'];
            $result = post_delete_question($id);
            break;
        case 'PostSearchQuestion':
            $que = $_POST['searchquestion'];
            $result = search_questions($que);
            header('Content-Type: application/json');
            echo json_encode($result);
            break;
        case 'PostAllQuestion':
            $result = post_all_question();
            $_SESSION['allquestion'] = $result;
            header('Content-Type: application/json');
            echo json_encode($result);
            break;
        case 'PostAnswer':
            $qid = $_POST['qid'];
            $context = $_POST['answercontext'];
            $result = post_into_question_context($qid, $context);
            break;
        case 'PostAllAnswer':
            $result = post_get_all_answer();
            header('Content-Type: application/json');
            echo json_encode($result);
            break;
        case 'PostQuestionnaire':
            $c1 = $_POST['Question1'];
            $c2 = $_POST['Question2'];
            $c3 = $_POST['Question3'];
            $c4 = $_POST['Question4'];
            if (isset($_SESSION['username'])) {
                $result = post_questionnaire($_SESSION['username'], $c1, $c2, $c3, $c4);
            }
            break;
        case 'PostNewIdea':
            if (isset($_SESSION['username'])) {
                $newidea = $_POST['newidea'];
                $result = post_into_newidea($_SESSION['username'], $newidea);
            }
            break;
        case 'PostGetAllNewIdea':
            $result = get_all_newidea();
            $_SESSION['allidea'] = $result;
            header('Content-Type: application/json');
            echo json_encode($result);
            break;
        case 'UploadImage':
            $filepath = 'images/'.date('YmdHis') . $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);
            if (isset($_POST['type']) && $_POST['type'] == 'icon') {
                post_update_icon_username($_SESSION['username'], $filepath);
                $_SESSION['icon'] = $filepath;
            } else if (isset($_POST['type']) && $_POST['type'] == 'images') {
                post_user_image($_SESSION['username'], $filepath);
            }
            echo $filepath;
            break;
        case 'ReadUserImages':
            $images = get_user_images($_SESSION['username']);
            header('Content-Type: application/json');
            echo json_encode($images);
            break;
        case 'DeleteUserImages':
            echo del_user_images($_POST['id']);
            break;
        case 'PostDeleteNewIdea':
            $ideaid = $_POST['ideaid'];
            $result = delete_idea($ideaid);
            break;
    }
}
