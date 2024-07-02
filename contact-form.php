<?php
// check if user coming from a request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // assign variables
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $cellphone = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);



    //     $userError = '';
    //     $messageErroe ='';

    //     if(strlen($user) <= 3){

    //         $userError = 'Username Must be larger than 3 characters';

    //     }

    //     if(strlen($message) < 10){

    //         $messageErroe = 'Message Must be larger than 10 characters';


    //    }

    // creating array of errors

    $formerrors = array();

    if (strlen($user) <= 3) {

        $formerrors[] = 'Username Must be larger than <strong> 3 </strong> characters';
    }

    if (strlen($message) < 10) {

        $formerrors[] = 'Message Must be larger than <strong> 10 </strong> characters';
    }

    // If No Errors Send The Email [mail(To بريد المستلم,Subjectعنوان الرسالة ,Message محتوى الرسالة,Headers معرفة نوع الرسالة ومن المرسل,Parameters لو اردت تمرير متغير للدالة)]
    $headers = 'From' . $email . '\r\n';
    if (empty($formerrors)) {
        //mail('abdullahalsamet@gmail.com','Contact form',$message,$headers)

        $user = '';
        $email = '';
        $cellphone = '';
        $message = '';

        $success = '<div class="alert alert-success" > <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>We Have Recieved Your Message</div>';
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>alameer_contact_form</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contact.css">


    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- start form -->
    <div class="container">
        <h1 class="text-center">Contact Me</h1>
        <div class="errors">





        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="contact-form">

            <?php if (!empty($formerrors)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>

                    </button>
                    <?php

                    foreach ($formerrors as $error) {

                        echo $error . '<br>';
                    }
                    ?>

                </div>


            <?php } ?>

            <?php if (isset($success)) {
                echo $success;
            } ?>
            <div class="form-group group">

                <input type="text" class="username form-control" name="username" placeholder="Your username" value="<?php if (isset($user)) {
                                                                                                                        echo $user;
                                                                                                                    } ?>">

                <i class="fa fa-user fa-fw"></i>
                <span class="astrisc">*</span>
                <div class="alert alert-danger custom-alert">Username Must be larger than <strong> 3 </strong>
                    characters</div>
            </div>
            <div class="form-group group">
                <input type="email" class="email form-control" name="email" placeholder="Your email" value="<?php if (isset($email)) {
                                                                                                                echo $email;
                                                                                                            } ?>">

                <i class="fa fa-envelope fa-fw"></i>
                <span class="astrisc">*</span>
                <div class="alert alert-danger custom-alert">Emai Can't Be Empty</div>
            </div>
            <div class="form-group group">
                <input type="phone" class="form-control" name="cellphone" placeholder="Your cellphone" value="<?php if (isset($cellphone)) {
                                                                                                                    echo $cellphone;
                                                                                                                } ?>">

                <i class="fa fa-phone fa-fw"></i>

            </div>
            <div class="form-group group">
                <textarea name="message" id="" class="message form-control" placeholder="Your Message"><?php if (isset($message)) {
                                                                                                            echo $message;
                                                                                                        } ?></textarea>
                <span class="astrisc">*</span>
                <div class="alert alert-danger custom-alert">Message Can't Be less than <strong> 10 </strong> characters
                </div>
            </div>
            <div class="form-group ">
                <input class="btn btn-success btn-lg " type="submit" value="send message!">

                <i class="fa fa-paper-plane fa-fw send-icon"></i>

            </div>
        </form>
    </div>

    <!-- end form -->



    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>