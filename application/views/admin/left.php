  <div id="wrapper">
     <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link bg-success" href="<?php echo admin_url('') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="text-white">BẢNG ĐIỀU KHIỂN</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link bg-primary" href="charts.html">
            <i class="fas fa-truck"></i>
            <span class="text-warning">BÁN HÀNG</span></a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle bg-warning" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
            <i class="fab fa-product-hunt"></i>
            <span class="text-primary">SẢN PHẨM</span> </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">       
              <a class="dropdown-item" href="<?php echo admin_url('product')?>"> 
              Sản phẩm </a>
              <a class="dropdown-item" href="<?php echo admin_url('catalog')?>"> 
              Danh mục </a>
              <a class="dropdown-item" href="tables.html"> 
              Phản hồi </a>
            </div>        
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-alt"></i>
            <span class="text-success">TÀI KHOẢN</span></a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">       
              <a class="dropdown-item" href="<?php echo admin_url('admin') ?>"> 
              Ban quản trị </a>
              <a class="dropdown-item" href="tables.html"> 
              Nhóm quản trị </a>            
              <a class="dropdown-item" href="tables.html"> 
              Thành viên </a>
            </div>        
        </li>

        <li class="nav-item">
          <a class="nav-link bg-danger" href="tables.html">
            <i class="fab fa-hire-a-helper"></i>
            <span class="text-dark">HỖ TRỢ VÀ LIÊN HỆ</span></a>
        </li>

          <li class="nav-item">
          <a class="nav-link bg-dark" href="tables.html">
            <i class="fas fa-book-reader"></i>
            <span class="text-white">NỘI DUNG</span></a>
        </li>
      </ul>

   