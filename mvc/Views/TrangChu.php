<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ</title>
    <link rel="shortcut icon" type="image/png" href="client/images/favicon.png">
    <?php 
    require_once "mvc/Views/setup-link-and-script.php";
    ?>
</head>
<body>
    <!-- //header -->
    <div class="header-desktop">
        <?php require_once "mvc/Views/Layout/header.php"; ?>
    </div>
    <?php require_once "mvc/Views/Layout/header-mobile.php"; ?>

    <div class="container-fluid">
        <?php
              require_once "mvc/Views/".$data["page"].".php"; // nếu trang Home sẽ load DSPT-TRangChu.php, nêú bấm xem chi tiết thì sẽ load TrangChu/XemChiTiet.php
              ?>
          </div>

          <!-- popup chat -->
          <?php require_once "mvc/Views/TrangChu/popupchat.php"; ?>        
          <!-- popupchat -->

          <!-- click button to open popup chatbox -->
        <div id="notification-messages">
            <?php if(isset($_SESSION['user_id'])){ ?>
                <?php if($data['countMessageFromAdmin'] > 0){ ?>
                    <span id="countMessageFromAdmin"><?php echo $data['countMessageFromAdmin']; ?></span>
                <?php }else{ ?>
                    <span id="countMessageFromAdmin">0</span>
                <?php } ?>
            <?php } ?>
            <a id="inbox">Inbox</a>
        </div>
        <!-- click button to open popup chatbox -->        

        <!-- footer -->
        <?php require_once "mvc/Views/Layout/footer.php"; ?>
        <!-- //footer -->

        <!-- copyright -->
        <div class="cpy-right text-center py-3">
            <p>© 2020 Phòng trọ. All rights reserved | Design by 
                <a href="#"> Herry.</a>
            </p>
        </div>
        <!-- //copyright -->



    </body>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script type="text/javascript" src="client/js/chatbox.js"></script>
    </html>