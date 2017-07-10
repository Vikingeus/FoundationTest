<head>
    <link href="https://fonts.googleapis.com/css?family=Stalinist+One" rel="stylesheet">
    <title>Coding valhalla dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text"><i class="fa fa-server" aria-hidden="true"></i> Coding Valhalla dashboard</li>
                <li class="active"><a href="#">Web</a></li>
                <li><a href="#">Games</a></li>
                <li><a href="#">VPS</a></li>
            </ul>
        </div>
        <div class="top-bar-right">
                <ul class="menu">
                    <li><input type="search" placeholder="Server id..."></li>
                    <li><button type="button" class="button">Search</button></li>
                </ul>
        </div>
    </div>
<?php 
include("function.php");
?>
    <div class="body grid-x grid-margin-x small-up-1 medium-up-2 large-up-5 full-up-5">
        <div class="cell margin30">
            <div class="card">
                <div class="card-divider grid-x grid-margin-x up-2">
                    <h4 class="auto cell">New server</h4>
                    <a class="hollow button shrink cell" href="#">Create here</a>
                </div>
                <img src="png/plus.png">
                <div class="card-section">
                    <h4>Create new server</h4>
                    <p>You can create new server by clicking on button in top right corner of the card.</p>
                </div>
            </div>        
        </div>
        <?php 
        $card = new card;
        foreach(glob("users/*") as $user){
            $id = str_replace(array(".json","users/"),"",$user);
            $json = file_get_contents($user);
            $userDecoded = json_decode($json, true);
            $card->CreateCard($id, $userDecoded['name'], $userDecoded['mail'], $userDecoded['date'], $userDecoded['tel'], $userDecoded['ico'], $userDecoded['apache2'], $userDecoded['mysql'], $userDecoded['backup'], $userDecoded['analytics'], $userDecoded['RAM'], $userDecoded['DS'], $userDecoded['CPU']);
        }
        ?>
    </div>
    <div class="footer">
        server icons from <a href="http://game-icons.net">game-icons.net</a> | GUI icons from <a href="http://fontawesome.io">fontawesome.io</a> | Build on <a href="http://foundation.zurb.com">Foundation</a> web framework ver.: 6.4.1
    </div>
</body>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
