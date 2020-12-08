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