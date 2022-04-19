
<?php session_start();
// error_reporting(0);
include "connect.php";
if(!isset($_SESSION['name']))
	header("location: home.php");
else{
?>


<?php 

if(isset($_POST["submit"])){
    $message = $_POST['message'];
    // $name = $_POST['name'];
    $sql =  "INSERT INTO `tripodschat` VALUES ('','$message',now())";
    if (mysqli_query($conn, $sql)) {
        
     } else {
     echo "Error: " . $sql . "
 " . mysqli_error($conn);
  }
 
     }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chat Application </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                overflow: hidden;
            }
            .home{
                background-color: #232323;
                padding: 1em;
               
            }
            .home .home-head{
                display: flex;
                justify-content:space-around;
                align-items: center;
            }
            .home  h1{
                text-align: center;
                color: blue;
                font-weight: bold;
                text-transform: uppercase;
                font-size: 25px;
                margin:10px;
            }
            .home .home-head button{
                outline: none;
                border: none;
                border-radius: 5px;
                padding: 10px;
                background: #FF416C;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #FF4B2B, #FF416C);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #FF4B2B, #FF416C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            }
            .home .home-head button a{
                text-decoration: none;
                color: black;
            font-weight: bold;
            }
            .home .home-head h3{
                color: blue;
                font-size: 20px;
                text-transform: uppercase;
            }
            .home-chat{
                position: relative;
            }
            
            .home-chat .home-chat-input form{
                position:fixed;
                bottom: 4px;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0 1em;
            }

            .home-chat .home-chat-input input{
                padding: 1em;
                width: 1100px;  
                outline: none;
                border: 2px solid coral;
            }

            @media screen and (max-width:1200px) {
                .home-chat .home-chat-input input{
                padding: 1em;
                width: 900px;  
            }
            }
           
            .home-chat .home-chat-input button{
                padding: 1.15em 0.9em;
                outline: none;
                border: none;
                color: black;
                font-weight: bold;
                text-transform: uppercase;
                background: #FF416C;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #FF4B2B, #FF416C);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #FF4B2B, #FF416C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            }
         
            .chat-content{
                height: 380px;
                   /* width: 562px; */
            overflow-y: scroll;  
                /* background-color: coral; */
            margin: 10px;
                border-bottom: 2px solid #FF416C;
            }

            .chat-content .chat-msg{
                background-color: wheat;
                margin-bottom: 10px;
            }
            .chat-content .chat-msg h3{
                background: #FF416C;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #FF4B2B, #FF416C);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #FF4B2B, #FF416C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                width: fit-content;
                border-radius:50%;
                padding: 5px 10px;
                
            }
            .chat-content .chat-msg p{
                text-align: justify;
                /* width: 200px; */
                margin: 10px;
            }
            .chat-content .chat-msg .chat-msg-two{
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 0 10px;
            }
            .chat-content .chat-msg span{
                color: red;
                font-weight: bold;
                margin: 10px;
            }
            .chat-content .chat-msg .chat-msg-two h4{
                color: blue;
                text-transform: uppercase;
            }
            @media screen and (max-width:500px) {
                .home-chat .home-chat-input input{
                padding: 1em;
                width: 220px;  
            }
            .chat-content{
                height: 310px;
            }
            }
        </style>
    </head>
    <body>

        <section class="home">
        <h1>Tripods</h1>
            <div class="home-head">
                <h3 style="display: flex;align-items:center"><i class="fa fa-user" style="margin-right: 10px;"></i> <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></h3>
                <button><a href="user-logout.php">LOGOUT</a></button>
            </div>
  
        </section>
        <section class="home-two">
            <section class="chat-content">
                          <?php
$respond = "SELECT * FROM tripodschat";
			$getMCase = mysqli_query($conn,$respond);
			if($getMCase && mysqli_num_rows($getMCase)>0){
				$r = 1;
				while($tData = mysqli_fetch_array($getMCase)){
          ?>
            <div class="chat-msg">
                        <p><?php echo $tData['message'];?></p>
                        <div class="chat-msg-two">
                            <h4><?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></h4>     
                        <span><?php echo $tData['time'];?></span>
                    </div>
            </div>
            <?php }} ?>
            </section>
        <div class="home-chat">
            <div class="home-chat-window">
                <div class="home-chat-input">
                    <form action="" method="POST">
                <input type="text" placeholder="message" name="message"/>
                <button type="submit" name="submit">send</button>
                    </form>
                </div>
            </div>
            </div>
        </section>
    </body>
</html>


<?php 
}
?>