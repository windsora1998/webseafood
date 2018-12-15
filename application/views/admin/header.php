  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Xin chào Admin</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

         <!-- Navbar -->
         <ul class="navbar-nav ml-auto ml-md-0">
           <li class="nav-item dropdown no-arrow">
             <a href="#" class="text-white">
               <i class="fas fa-home"></i>
               <span>Trang chủ</span>
             </a>
              <a href="<?php echo admin_url('admin/logout') ?>" class="text-white ml-3">
                <i class="fas fa-sign-out-alt"></i>
                <span>Đăng xuất</span>
             </a>
           </li>
         </ul>

      </div>

    </nav>
