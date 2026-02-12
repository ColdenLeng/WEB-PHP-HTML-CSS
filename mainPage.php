<!DOCTYPE html>

<html>


<head>

    <style>
        .navbar-nav.navbar-center {
            position: absolute;
            left: 50%;
            transform: translatex(-50%);
        }

        .modal-window2 {
            width: 900px;
            /*height: 1000px;*/
            border: 1px solid black;
            background-color: white;
            display: none;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            top: -15px;
            z-index: 2;
            opacity: 0.8;
            text-align: center;
        }

        .part-img1 {
            width: 400px;
            height: 400px;
            margin: 20px;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            margin-top: 100px;
            background-image: url("iconfinder_discord_2308078.png");
        }

        .desc-img1, .desc-img2 {
            width: 400px;
            height: 400px;
            margin: 20px;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            margin-top: 100px;
        }

        .desc-img1 {
            background-image: url("fiveScreenBottomRightBig1.jpg");

        }

        .desc-img2 {
            background-image: url("fiveScreenTopRightBig.jpg");
        }

        .desc-img-box {
            display: flex;
            flex-direction: row;
            -moz-box-sizing: border-box;
            justify-content: center;
            align-content: center;
        }

        .desc-content {
            margin-top: 100px;
        }

        #desc-close, #part-close {
            position: absolute;
            right: 20px;
            top: 10px;
            width: 100px;
            height: 40px;
            line-height: 40px;
            border-radius: 20px;
            border: 1px solid #ff2152;
            cursor: pointer;
        }


        #msg, #search-term {
            padding: 20px;
        }

        .modal-backdrop {
            z-index: -10;
        }
    </style>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>


<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">

    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li><a href="#game">The Game Project 912</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-center">
            <li><a href="#desc" id='Description'>Description</a></li>
            <!--            Q&A-->
            <li>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a id="Surv" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">Q&A <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href='#postquestionModel' data-target="#postquestionModel" data-toggle="modal">Post Question</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#listquestion" onclick="getPostedMsg()">List Question</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#postsearchquestion" data-toggle="modal">Search Question</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!--            answer -->
            <li>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a id="Answer" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">Answer <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href='#' onclick="getAllQuestion()">List All Question</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#listallanswer" onclick="getAllAnswer()">List All Answer</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!--            Partner-->
            <li><a href="#part" id='Partner'>Images</a></li>
            <!--            Questionnaire-->
            <li><a href="#ques" id='Questionnaire' data-toggle="modal">Questionnaire</a></li>
            <!--            new Idea-->
            <li>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a id="NewIdea" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">NewIdea <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href='#postnewideaModal' data-toggle="modal">Post New Idea</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#getAllNewIdea" onclick="getAllNewIdea()">List All New Idea</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#accountName" data-toggle="modal">
                        <span id="usericon">
                            <?php
                            if ($_SESSION['icon'] == null) {
                                echo "<span id='menu-accountName' class='glyphicon glyphicon-user'></span>";
                            } else {
                                $icon = $_SESSION['icon'];
                                echo "<img src='$icon' width='20' height='20'>";
                            }
                            ?>
                        </span>


                        Hi!&nbsp;<?php echo $_SESSION['username']; ?>
                    </a>
                </li>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">MyAccount <span class="caret"></span></a>
						  
                        <ul class="dropdown-menu">
                            <li><a href="#signout" data-toggle="modal">SignOut</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#changeusername" data-toggle="modal">Change Profile</a></li>
							<li role="separator" class="divider"></li>
                            <li><a href="#uploadImage" data-toggle="modal">Upload Image</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#unsubscribe" data-toggle="modal">Unsubscribe</a></li>
                        </ul>
                    </li>
                </ul>&nbsp;&nbsp;
            </ul>
        </ul>
    </div>
</nav>

<center><img src="titleOne.jpg" style="position:relative; left:0; top:-20px; z-index:-1;"/>
    <center>

        <div id='blanket'>
        </div>

        <!--        Questionnaire-->
        <div class='modal fade' id='ques'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <form class='' id="PostQuestionnaire" method='post' action='controller.php'>
                        <div class='modal-header'>
                            <h2 class='modal-title'>Questionnaire</h2>
                        </div>
                        <div class='modal-body'>
                            <input type='hidden' name='page' value='MainPage'>
                            <input type='hidden' name='command' value='PostQuestionnaire'>
                            <div class='form-group'>
                                <label class="control-label" for="Question1">What is your favourite game:</label>
                                <input class="form-control" type="text" name="Question1" id="Question1" value=""
                                       required>
                            </div>
                            <div class='form-group'>
                                <label class="control-label" for="Question2">What kind of the game do you like:RPG or
                                    FPS or More?</label>
                                <input class="form-control" type="text" name="Question2" id="Question2" value=""
                                       required>
                            </div>
                            <div class='form-group'>
                                <label class="control-label" for="Question3">Do you like realistic style games or anime
                                    style games?</label>
                                <input class="form-control" type="text" name="Question3" id="Question3" value=""
                                       required>
                            </div>
                            <div class='form-group'>
                                <label class="control-label" for="Question4">How long do you spend on games every
                                    day?</label>
                                <input class="form-control" type="text" name="Question4" id="Question4" value=""
                                       required>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <div class="form-group">
                                <button type="button" id="PostQuestionnaireClose" class="btn btn-default"
                                        data-dismiss="modal">Cancel
                                </button>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $("#PostQuestionnaire").submit(function () {
                $.post("controller.php", $("#PostQuestionnaire").serializeArray())
                $("#PostQuestionnaireClose").click()
                return false
            })
        </script>

        <!--        end Questionnaire-->

        <!--MyAccount-->
        <!-- changeusername and password -->
        <div class='modal fade' id='changeusername'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <form class='' method='post' action='controller.php'>
                        <div class='modal-header'>
                            <h2 class='modal-title'>Change Profile</h2>
                        </div>
                        <div class='modal-body'>
                            <input type='hidden' name='page' value='MainPage'>
                            <input type='hidden' name='command' value='PostUpdateUsername'>
                            <div class='form-group'>
                                <label class="control-label" for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name='username'
                                       placeholder="Enter you username!">
                            </div>
                            <div class='form-group'>
                                <label class="control-label" for="password">Password:</label>
                                <input type="text" class="form-control" id="password" name='password'
                                       placeholder="Enter you new password!">
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <div class="form-group">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-default">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--MyAccount-->
        <!-- UploadImage -->
        <div class='modal fade' id='uploadImage'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <form class='' id="uiform" method='post' action='controller.php'>
                        <div class='modal-header'>
                            <h2 class='modal-title'>upload image</h2>
                        </div>
                        <div class='modal-body'>
                            <input type='hidden' name='page' value='MainPage'>
                            <input type='hidden' name='command' value='UploadImage'>
                            <div class='form-group'>
                                <label class="control-label" for="file">Upload Image File:</label>
                                <input type="file" id="file" name='file'>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <div class="form-group">
                                <button type="button" id="cui" class="btn btn-default" data-dismiss="modal">Cancel
                                </button>
                                <button type="button" id="uuicon" class="btn btn-default">Upload User Icon</button>
                                <button type="button" id="uimage" class="btn btn-default">Upload Images</button>
                            </div>
                        </div>
                        <script>
                            function ajaxUpload(type, callback) {
                                var form = new FormData($("#uiform")[0]);
                                form.append("type", type);
                                $.ajax({
                                    type: "POST",
                                    url: "controller.php",
                                    data: form,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: callback
                                });
                            }

                            $("#uuicon").click(function () {
                                ajaxUpload('icon', function (res) {
                                    $("#usericon").html(`<img src='${res}' width='20' height='20'>`)
                                    $("#cui").click()
                                })
                            });

                            $("#uimage").click(function () {
                                ajaxUpload('images', function (res) {
                                    $("#cui").click()
                                    userImagesAjax()
                                })
                            });
                        </script>
                    </form>
                </div>
            </div>
        </div>

        <!--        unsubscribe -->
        <div class='modal fade' id='unsubscribe'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <form class='' method='post' action='controller.php'>
                        <div class='modal-header'>
                            <h2 class='modal-title'>Unsubscribe</h2>
                        </div>
                        <input type='hidden' name='page' value='MainPage'>
                        <input type='hidden' name='command' value='PostUnsubscribe'>
                        <input type="hidden" name='username' value='<?php echo $_SESSION['username'] ?>'>
                        <div class='modal-footer'>
                            <div class="form-group">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-default">Unsubscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Signout -->
        <div id='survContent' class='modal-window2'>
            <div id="msg">
                <p>QuationContext</p>
                <table class="table table-striped">

                </table>
            </div>

            <div id="search-term">
                <p>SearchQuestion</p>
                <table class="table table-striped">
                    <tr>
                        <td>Id</td>
                        <td>Question</td>
                    </tr>

                </table>
            </div>
        </div>
        <!--end myAccount-->

        <!-- Modal Window for PostAQuestion -->
        <div class='modal fade' id='signout'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <form class='' method='post' action='controller.php'>
                        <div class='modal-header'>
                            <h2 class='modal-title'>SignOut</h2>
                        </div>
                        <input type='hidden' name='page' value='MainPage'>
                        <input type='hidden' name='command' value='SignOut'>
                        <div class='modal-footer'>
                            <div class="form-group">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-default">SignOut</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Window for SearchQuestions -->
        <div class='modal fade' id='modal-post-a-question'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <form class='' method='post' action='w6_controller.php'>
                        <div class='modal-header'>
                            <h2 class='modal-title'>Post A Question</h2>
                        </div>
                        <div class='modal-body'>
                            <input type='hidden' name='page' value='MainPage'>
                            <input type='hidden' name='command' value='PostAQuestion'>
                            <div class='form-group'>
                                <label class="control-label" for="question">Question:</label>
                                <input type="text" class="form-control" id="question" name='question'
                                       placeholder="Enter a question!">
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <div class="form-group">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--  Content  -->
        <div class='modal fade' id='modal-search-questions'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <form class='' method='post' action='w6_controller.php'>
                        <div class='modal-header'>
                            <h2 class='modal-title'>Search Questions</h2>
                        </div>
                        <div class='modal-body'>
                            <input type='hidden' name='page' value='MainPage'>
                            <input type='hidden' name='command' value='SearchQuestions'>
                            <div class='form-group'>
                                <label class="control-label" for="search-term">Search term:</label>
                                <input type="text" class="form-control" id="search-term" name='search-term'
                                       placeholder="Enter a question!">
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <div class="form-group">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id='description' class='modal-window2'>
            <div id="desc-close">close</div>
            <p style="margin-top:50px">description of game description of game description of game description of
                game</p>
            <div class="desc-content">
                The background of the game story is that the protagonist woke up from bed one day and found that the
                surrounding environment had changed. Because of the nuclear war,
                his family was still on the other half of the earth, so he drove home by himself regardless of the
                dissuasion of his friends. Although far away, he has been working hard to drive home.
                During the journey, he did not differ in some details and memories around him. It was not until the
                night on the grassland on the border of two neighboring countries that he raised his
                head and suddenly found that two moons suddenly appeared in the sky. This was when he realized that he
                had crossed into a parallel world. In the following days, he was devastated and spent every
                day in a small town. Until he meets a traveler one day, the traveler tells him some secrets that only he
                knows, which may help the protagonist return to the original world, so the protagonist embarks on a new
                adventure,
                an adventure about returning home.

                The style of the game is set in anime style, with cyberpunk cities and desolate nuclear war relics. The
                game runs on both PC and mobile platforms, and the data is interoperable on each platform. The PC is an
                open world sandbox game,
                and the mobile terminal is a semi-open linear process model. The plot is updated weekly, and the total
                duration may be half a year.
            </div>
            <div class="desc-img-box">
                <div class="desc-img1"></div>
                <div class="desc-img2"></div>
            </div>
        </div>

 
        <div id='partContent' class='modal-window2'>
            <div id="part-close">close</div>
            <h1><p style="margin-top:50px">Image share</p></h1>
            <div class="desc-content">
                Share the image if you want
            </div>
           
            <div id="user-images" style="display: flex;justify-content: center;flex-wrap: wrap">

            </div>

            <script>
                $("#Partner").click(function () {
                    userImagesAjax()
                });

                function userImagesAjax() {
                    $.post('controller.php', {
                        page: 'MainPage',
                        command: 'ReadUserImages'
                    }, res => {
                        var html = '';
                        res.forEach(v => {
                            html += `<img style="margin: 10px 0" src="${v.Url}" alt="" width="600">`;
                            html += `<img onclick="delImageAjax(${v.Id})" style="margin: 10px 0" src="delete.png"  width="40" height="40">`
                        })
                        $("#user-images").html(html)
                    })
                }

                function delImageAjax(id) {
                    $.post('controller.php', {
                        page: 'MainPage',
                        command: 'DeleteUserImages',
                        id
                    }, function (res) {
                        userImagesAjax()
                    })
                }
            </script>
        </div>
        <form action="controller.php" method='post' id="listquestion">
            <input type='hidden' name='page' value='MainPage'>
            <input type='hidden' name='command' value='PostListQuestion'>
        </form>
        <script>
            $("#listquestion").submit(function () {
                fetchlistquestion($("#listquestion").serializeArray());
                return false;
            });

            function fetchlistquestion(params) {
                $.post("controller.php", params, function (res) {
                    $("#survContent #msg table").html(`<thead><tr>
                        <td>Id</td>
                        <td>Question</td>
                        <td>Delete</td>
                    </tr></thead>`)
                    res.forEach(item => {
                        $(`<tr>
                            <td>${item.Id}</td>
                            <td>${item.Question}</td>
                            <td>
                                <form action="controller.php" class="PostDeleteQuestion" method="post">
                                    <input type='hidden' name='page' value='MainPage'>
                                    <input type='hidden' name='command' value='PostDeleteQuestion'>
                                    <input type="hidden" value="${item.Id}" name="questionId">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>`).appendTo($("#survContent #msg table"))
                    })
                    $(".PostDeleteQuestion").submit(function () {
                        $.post("controller.php", $(this).serializeArray())
                        fetchlistquestion($("#listquestion").serializeArray());
                        return false
                    })
                });
            }

        </script>
        <form action="controller.php" method='post' id="allquestion">
            <input type='hidden' name='page' value='MainPage'>
            <input type='hidden' name='command' value='PostAllQuestion'>
        </form>

        <script>
            $("#allquestion").submit(function () {
                allquestionAJAX();
                return false
            });

            function allquestionAJAX() {
                $.post("controller.php", $("#allquestion").serializeArray(), function (res) {
                    $("#answerContent #aqt table").html(`<thead><tr><td>Id</td><td>Question</td><td>Answer</td></tr></thead>`)
                    res.forEach(item => {
                        let tr = `<tr>
                            <td>${item.Id}</td>
                            <td>${item.Question}</td>
                            <td>`
                        if (item.AnswerContext === '' || item.AnswerContext === null) {
                            tr += `<button class='btn btn-primary' onclick='PostAnswer(${item.Id})'>Asnwerit</button>`
                        } else {
                            tr += `<span class="label label-success">Already Answered</span>`
                        }

                        tr += `</td>
                        </tr>`;


                        $(tr).appendTo($("#answerContent #aqt table"));
                    })
                });
            }

            function PostAnswer(id) {
                $.post("controller.php", {
                    page: "MainPage",
                    command: "PostAnswer",
                    qid: id,
                    answercontext: prompt("Question Answer")
                }, function (res) {
                    allanserAJAX()
                    allquestionAJAX()
                })
            }
        </script>

        <form action="controller.php" method='post' id="allanswer">
            <input type='hidden' name='page' value='MainPage'>
            <input type='hidden' name='command' value='PostAllAnswer'>
        </form>
        <script>
            $("#allanswer").submit(function () {
                allanserAJAX()
                return false
            })

            function allanserAJAX() {
                $.post("controller.php",$("#allanswer").serializeArray(),function (response) {
                    $("#aat table").html(` <thead><tr><td>Id</td><td>Question</td><td>Answer</td></tr></thead>`);

                    response.forEach(item=>{
                        $(`
                            <tr>
                                <td>${item.Id}</td>
                                <td>${item.Question}</td>
                                <td>${item.AnswerContext}</td>
                            </tr>
                        `).appendTo($("#aat table"))
                    })
                });
            }
        </script>
        <!-- Modal1 -->
        <div class="modal fade" id="postquestionModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Post A Question</h1>
                    </div>
                    <div class="modal-body">
                        <form action="controller.php" method="POST" id="PostQuestion">
                            <input type='hidden' name='page' value='MainPage'>
                            <input type='hidden' name='command' value='PostQuestion'>
                            <div>
                                <label for="question">Question</label>
                                <input type="text" id="question" name="question" class="form-control"
                                       placeholder="Enter Question!">
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="PostQuestionClose" class="btn btn-secondary"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <script>
                            $("#PostQuestion").submit(function () {
                                $.post("controller.php", $("#PostQuestion").serializeArray(), function () {
                                    fetchlistquestion($("#listquestion").serializeArray());
                                })
                                $("#PostQuestionClose").click()
                                return false
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <!--        searchQuestion -->
        <div class="modal fade" id="postsearchquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">SearchQuestion</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controller.php" id="PostSearchQuestionForm" method="POST">
                            <input type='hidden' name='page' value='MainPage'>
                            <input type='hidden' name='command' value='PostSearchQuestion'>
                            <div>
                                <label for="username">SearchQuestion</label>
                                <input type="text" id="searchquestion" name="searchquestion" class="form-control"
                                       placeholder="Enter Question!">
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="PostSearchQuestionFormClose" class="btn btn-secondary"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        <script>
                            $("#PostSearchQuestionForm").submit(function () {
                                $.post("controller.php", $(this).serializeArray(), function (response) {
                                    $("#search-term table").html("<thead><tr><td>Id</td><td>Question</td></tr></thead>")
                                    response.forEach(item => {
                                        $(`<tr><td>${item.Id}</td><td>${item.Question}</td></tr>`).appendTo($("#search-term table"))
                                    })
                                });
                                $("#PostSearchQuestionFormClose").click()
                                return false
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!--        end Q&A -->

        <!--        New Idea Modal-->

        <form action="controller.php" method='post' id="allnewidea">
            <input type='hidden' name='page' value='MainPage'>
            <input type='hidden' name='command' value='PostGetAllNewIdea'>
        </form>

        <script>
            function newIdeaAjax() {
                $.post("controller.php", $("#allnewidea").serializeArray(), function (res) {
                    $("#newideaContent table").html(`<tr><td>Id</td><td>New Idea</td><td>Delete</td></tr>`)
                    res.forEach(item => {
                        $(`<tr>
                            <td>${item.Id}</td>
                            <td>${item.NewIdea}</td>
                            <td>
                                <form action="controller.php" class="PostDeleteNewIdea" method="post">
                                    <input type='hidden' name='page' value='MainPage'>
                                    <input type='hidden' name='command' value='PostDeleteNewIdea'>
                                    <input type="hidden" value="${item.Id}" name="ideaid">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>`).appendTo($("#newideaContent table"))

                        $(".PostDeleteNewIdea").submit(function () {
                            $.post("controller.php", $(this).serializeArray(), function () {
                                newIdeaAjax()
                            })
                            return false
                        })
                    })
                });
            }

            $("#allnewidea").submit(function () {
                newIdeaAjax()
                return false
            })
        </script>

        <div class="modal fade" id="postnewideaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Post New Idea</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controller.php" id="PostNewIdeaForm" method="POST">
                            <input type='hidden' name='page' value='MainPage'>
                            <input type='hidden' name='command' value='PostNewIdea'>
                            <div>
                                <label for="newidea">New Idea</label>
                                <input type="text" id="newidea" name="newidea" class="form-control"
                                       placeholder="Enter Question!">
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="PostNewIdeaClose" class="btn btn-secondary"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" onclick="NewIdeaAlert()" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <script>
                            $("#PostNewIdeaForm").submit(function () {
                                $.post("controller.php", $("#PostNewIdeaForm").serializeArray())
                                $("#PostNewIdeaClose").click()
                                newIdeaAjax()
                                return false
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!--        ned New Idea Modal-->
        <!--        Answer -->
        <?php if (isset($_SESSION['allquestion'])): ?>
            <?php foreach ($_SESSION['allquestion'] as $k => $v): ?>
                <div class="modal fade" id="<?php echo 'answermodal' . $v['Id'] ?>" tabindex="-1" role="dialog"
                     aria-labelledby="<?php echo 'answermodal' . $v['Id'] ?>"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="exampleModalLabel">Question</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="controller.php" method="post">
                                    <input type='hidden' name='page' value='MainPage'>
                                    <input type='hidden' name='command' value='PostAnswer'>
                                    <input type="hidden" value="<?php echo $v['Id']; ?>" name="qid">
                                    <input type="text" class="form-control" placeholder="Answer it!"
                                           name="answercontext">
                                    <button type="submit" class="btn btn-primary">Asnwerit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div id='answerContent' class='modal-window2'>
            <div style="padding:20px" id="aqt">
                <p>Answer</p>
                <table class="table table-striped">
                    <tr>
                        <td>Id</td>
                        <td>Question</td>
                        <td>Answer</td>
                    </tr>
                </table>
            </div>
            <div style="padding: 20px" id="aat">
                <p>All Answer</p>
                    <table class="table table-striped">
                        <tr>
                            <td>Id</td>
                            <td>Question</td>
                            <td>Answer</td>
                        </tr>

                    </table>
            </div>
        </div>


        <!--        end answer -->
        <div id='newideaContent' class='modal-window2'>
            <div style="padding:20px">
                <p>New Idea</p>
                <table class="table table-striped">

                </table>
            </div>
        </div>

        <!-- end Content -->
</body>

<script>
    $(document).ready(function () {
        $("#Description").click(function () {
            $("#description").show();
            $("#partContent").hide();
            $("#survContent").hide();
            $("#answerContent").hide();
            $("#newideaContent").hide();
        });
        $("#desc-close").click(function () {
            $("#description").hide();
        })

        $('#Partner').click(function () {
            $("#partContent").show();
            $("#description").hide();
            $("#survContent").hide();
            $("#answerContent").hide();
            $("#newideaContent").hide();
        })
        $("#part-close").click(function () {
            $("#partContent").hide();
        })

        $("#Surv").click(function () {
            $("#survContent").show();
            $("#description").hide();
            $("#partContent").hide();
            $("#answerContent").hide();
            $("#newideaContent").hide();
        })

        $("#Answer").click(function () {
            $("#answerContent").show()
            $("#description").hide();
            $("#partContent").hide();
            $("#survContent").hide();
            $("#newideaContent").hide();
        })

        $("#NewIdea").click(function () {
            $("#newideaContent").show()
            $("#answerContent").hide()
            $("#description").hide();
            $("#partContent").hide();
            $("#survContent").hide();
        })
    });

    function getPostedMsg() {
        $("#listquestion").submit();
    }

    function getAllQuestion() {
        $('#allquestion').submit();
    }

    function getAllAnswer() {
        $('#allanswer').submit();
    }

    function NewIdeaAlert() {
        alert('Thankyouforyourhelp!');
    }

    //PostGetAllNewIdea
    function getAllNewIdea() {
        $("#allnewidea").submit();
    }

    function tourl() {
        location.href = "https://discord.gg/GmSPcmXj";
    }
</script>


<script>

</script>


<html>
