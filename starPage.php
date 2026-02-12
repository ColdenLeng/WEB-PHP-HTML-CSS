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
            height: 1100px;
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


        .desc-img1,.desc-img2{
            width: 400px;
            height: 400px;
            margin: 20px;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            margin-top: 100px;
        }
        .desc-img1{
            background-image: url("fiveScreenBottomRightBig1.jpg");

        }
        .desc-img2{
            background-image: url("fiveScreenTopRightBig.jpg");
        }
        .desc-img-box{
            display: flex;
            flex-direction: row;
            -moz-box-sizing: border-box;
            justify-content: center;
            align-content: center;
        }
        .desc-content{
            margin-top:100px;
        }

        #desc-close{
            position: absolute;
            right: 20px;
            top:10px;
            width: 100px;
            height: 40px;
            line-height: 40px;
            border-radius: 20px;
            border:1px solid #ff2152;
            cursor: pointer;
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

        </ul>


        <ul class="nav navbar-nav navbar-right">
            <li><a href="#JoinModal" data-toggle="modal"><span id='menu-joinin' class="glyphicon glyphicon-user"></span>
                    Join Us</a></li>
            <li><a href="#signModal" data-toggle="modal"><span id='menu-signin'
                                                               class="glyphicon glyphicon-log-in"></span> Log In</a>
            </li>
        </ul>
    </div>
</nav>

<center><img src="titleOne.jpg" style="position:relative; left:0; top:-20px; z-index:-1;"/>
    <center>

        <div id='blanket'>
        </div>


        <div id='JoinModal' class='modal fade' roll='dialog'>    <!-- something similar to the above #signinModal -->

            <div class='modal-dialog'>
                <div class='modal-content'>


                    <form method='post' action='controller.php'>
                        <div class='modal-hearder'>
                            <h2 style='text-align:center'>Join Us</h2>
                        </div>


                        <div class='modal-body'>
                            <input type='hidden' name='page' value='starPage'></input>
                            <input type='hidden' name='command' value='Join'></input>

                            <center>
                                <label class='modal-label'>Username:</label>
                                <input type='text' name='username' placeholder='Enter username' required></input>

                                <?php if (!empty($error_msg_username)) echo $error_msg_username; ?>
                                <!-- error message -->

                                <br>
                                <br>

                                <label class='modal-label'>Password:</label>
                                <input type='password' name='password' placeholder='Enter password' required></input>
                                <br>
                                <br>
                                <label class='modal-label'>Email Adr: </label>
                                <input type='text' name='email' placeholder='Enter email address' required></input>
                            </center>
                        </div>


                        <div class='modal-footer'>
                            <button type='submit' value='Submit' class='btn btn-primary'>Submit</button>
                            <button type='reset' value='Reset' class='btn btn-default'>Reset</button>
                            <button type='button' value='Cancel' class='btn btn-default' data-dismiss="modal">Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <div id='signModal' class='modal fade' roll='dialog'> <!-- modal window; Trial 6 -->

            <div class='modal-dialog'>
                <div class='modal-content'>

                    <form method='post' action='controller.php'>


                        <div class='modal-header'>
                            <h2 style='text-align:center; font-family:Arial'><b>Sign In</b></h2>
                        </div>


                        <div class='modal-body'>
                            <input type='hidden' name='page' value='starPage'></input>
                            <input type='hidden' name='command' value='SignIn'></input>

                            <center>
                                <label class='modal-label'>Username:</label>
                                <input type='text' name='username' placeholder='Enter username' required></input>

                                <?php if (!empty($error_msg_username)) echo $error_msg_username; ?>
                                <!-- error message -->

                                <br>
                                <br>

                                <label class='modal-label'>Password:</label>
                                <input type='password' name='password' placeholder='Enter password' required></input>

                                <?php if (!empty($error_msg_password)) echo $error_msg_password; ?>
                                <!-- error message -->
                            </center>

                        </div>


                        <div class='modal-footer'>
                            <button type='submit' value='Submit' class='btn btn-primary'>Submit</button>
                            <button type='reset' value='Reset' class='btn btn-default'>Reset</button>
                            <button type='button' value='Cancel' class='btn btn-default' data-dismiss="modal">Cancel
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>


        <script>
            $('#sign-out').click(function () {
                $("#form-sign-out").submit();
                //alert("Sign out");

            });

        </script>


        <div id='description' class='modal-window2'>
            <div id="desc-close">close</div>
            <p style="margin-top:50px">description of game description of game description of game description of game</p>
            <div class="desc-content">
                The background of the game story is that the protagonist woke up from bed one day and found that the surrounding environment had changed. Because of the nuclear war,
                his family was still on the other half of the earth, so he drove home by himself regardless of the dissuasion of his friends. Although far away, he has been working hard to drive home.
                During the journey, he did not differ in some details and memories around him. It was not until the night on the grassland on the border of two neighboring countries that he raised his
                head and suddenly found that two moons suddenly appeared in the sky. This was when he realized that he had crossed into a parallel world. In the following days, he was devastated and spent every
                day in a small town. Until he meets a traveler one day, the traveler tells him some secrets that only he knows, which may help the protagonist return to the original world, so the protagonist embarks on a new adventure,
                an adventure about returning home.

                The style of the game is set in anime style, with cyberpunk cities and desolate nuclear war relics. The game runs on both PC and mobile platforms, and the data is interoperable on each platform. The PC is an open world sandbox game,
                and the mobile terminal is a semi-open linear process model. The plot is updated weekly, and the total duration may be half a year.
            </div>
            <div class="desc-img-box">
                <div class="desc-img1"></div>
                <div class="desc-img2"></div>
            </div>
        </div>


</body>

<script>
    $(document).ready(function () {
        $("#Description").click(function () {
            $("#description").show();

        });
        $("#desc-close").click(function (){
            $("#description").hide();
        })

    });


</script>


<script>

</script>

<?php
//     using $display_type, decide whether SignIn or Join modal window should be displayed
//if ($display_type == 'none')
//    echo "";
//else if ($display_type == 'signin')
//    echo '$("#menu-signin").click();';  // It triggers a 'click' event on #menu-signin.
//else if ($display_type == 'joinin')
//    echo '$("#menu-joinin").click();';
//else
//    echo "";
?>
<html>