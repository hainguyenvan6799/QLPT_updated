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
    <!-- Nhật -->
    <!-- <div class="main-sec inner-page" id="contain-header"> -->
        <!-- //header -->
        <div class="header-desktop">
            <?php require_once "mvc/Views/Layout/header.php"; ?>
        </div>
        <div class="header-mobile">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" id="header-mobile">
              <a class="navbar-brand" href="#">Phong Tro DN</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php if(!isset($_SESSION["user_id"])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Register/getFormRegister">Đăng ký</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login/getFormLogin">Đăng nhập</a>
                    </li>
                <?php }else{ ?>
                    <?php if(isset($_SESSION['admin'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Admin/Home">Đến trang quản trị</a>
                        </li>
                    <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Xin chào <?php echo $_SESSION["name"]; ?></a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Login/logout">Đăng xuất</a>
                    </li>
                <?php } ?>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                  </div>
              </li> -->
              <!-- <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
            <div class="search-form-mobile ml-auto">
                <div class="form-w3layouts-grid">
                    <form action="TrangChu/TimKiem" method="post" class="newsletter" style="background: #74D2E7;">
                        &nbsp;&nbsp;&nbsp;
                        <select id="quan-mobile" name="quan">
                            <option selected value="0">Chọn quận</option>
                            <option value="Quận 1">Quận 1</option>
                            <option value="Quận 2">Quận 2</option>
                            <option value="Quận 3">Quận 3</option>
                            <option value="Quận 4">Quận 4</option>
                            <option value="Quận 5">Quận 5</option>
                            <option value="Quận 6">Quận 6</option>
                            <option value="Quận 7">Quận 7</option>
                            <option value="Quận 8">Quận 8</option>
                            <option value="Quận 9">Quận 9</option>
                            <option value="Quận 10">Quận 10</option>
                            <option value="Quận 11">Quận 11</option>
                            <option value="Quận 12">Quận 12</option>
                            <option value="Quận Bình Tân">Quận Bình Tân</option>
                            <option value="Quận Bình Thạnh">Quận Bình Thạnh</option>
                            <option value="Quận Gò Vấp">Quận Gò Vấp</option>
                            <option value="Quận Phú Nhuận">Quận Phú Nhuận</option>
                            <option value="Quận Tân Bình">Quận Tân Bình</option>
                            <option value="Quận Tân phú">Quận Tân phú</option>
                            <option value="Quận Thủ Đức">Quận Thủ Đức</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        <select id="gia-mobile" name="gia">
                            <option selected value="0">Chọn giá</option>
                            <option value="1">Dưới 500k</option>
                            <option value="2">500k - 700k</option>
                            <option value="3">Trên 700k</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;
                        <input type="submit" name="" value="Lọc" id="loc-mobile">
                    </form>
                </div>
            </div>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
  </div>
</nav>
</div>
<!-- //header -->
<!-- </div> -->
<!-- //banner-->
<!--/banner-bottom -->
<div class="container-fluid">
    <?php
              require_once "mvc/Views/".$data["page"].".php"; // nếu trang Home sẽ load DSPT-TRangChu.php, nêú bấm xem chi tiết thì sẽ load TrangChu/XemChiTiet.php
              ?>
              <?php if(isset($_SESSION["user_id"])){ ?>
                <?php require_once "mvc/Views/ChatRealtime/chatElements.php"; ?>
            <?php } ?>
        </div>

        <div class="popup-box chat-popup" id="qnimate" style="border: 3px solid black;">
          <div class="popup-head">

            <div class="popup-head-left pull-left">
            </div>

            <div class="popup-head-right pull-right">
                <div class="btn-group">
                  <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                     <i class="glyphicon glyphicon-cog"></i> </button>
                     <ul role="menu" class="dropdown-menu pull-right">
                        <li><a href="#">Media</a></li>
                        <li><a href="#">Block</a></li>
                        <li><a href="#">Clear Chat</a></li>
                        <li><a href="#">Email Chat</a></li>
                    </ul>
                </div>

                <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
            </div>
        </div>
        <div class="popup-messages" style="overflow: auto">
            <?php 
            $a = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
            ?>
            <input type="hidden" name="my_id" id="my_id" value="<?php echo $a; ?>"> 
            <div class="col-md-12" id="messages" style="margin-top: 5px; margin-bottom: 15px;">
                <div class="message-wrapper">
                    <ul class="messages">
                                <!-- <li class="message clearfix">
                                    <div class="sent">
                                        <p>Lorem ispum</p>
                                        <p class="date">1 sep 2020</p>
                                    </div>
                                </li>

                                <li class="message clearfix">
                                    <div class="received">
                                        <p>Lorem ispum</p>
                                        <p class="date">1 sep 2020</p>
                                    </div>
                                </li> -->
                            </ul>
                        </div>

                        

                    </div>











                </div>
                <div class="popup-messages-footer">
                    <!-- <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea> -->

                    <!-- <input type="submit" name="submit" value="Gửi"> -->

                    <div class="btn-footer">
                        <div class="input-text col-md-12">
                            <input type="text" name="message" class="submit col-md-12" style="border: 3px solid black;" id="typeMessage" placeholder="Enter to send Message">
                            <!-- <input type="submit" name="submit" value="Gửi" class="col-md-2 btn btn-primary" style="margin-left: 10px; margin-top: 9px; width: 100%; height: 100%;"> -->
                        </div>
                <!-- <button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
                <button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
                <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
                <button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button> -->
            </div>
        </div>
    </div>

    <!--//shipping
       footer -->
       <?php require_once "mvc/Views/Layout/footer.php"; ?>
       <!-- //footer -->
       <!-- copyright -->
       <div class="cpy-right text-center py-3">
        <p>© 2020 Phòng trọ. All rights reserved | Design by 
            <a href="#"> Herry.</a>
        </p>
    </div>
    <!-- //copyright -->
    <!-- Nhật -->

    <!-- Hải -->
    
    
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