
  <?php $this->load->view('admin/product/head'); ?>
  <?php 
  $this->load->view('admin/mess', $this->data);
   ?>
  <hr class="mb-3">
   
    <span> <h3> <i class="fas fa-list-ul pr-3"></i> Danh sách sản phẩm</h3> </span>
    <span><h5> Tổng số lượng: <?php echo $total_row ?> </h5></span>

    <form action = "<?php echo admin_url('product') ?>" method = "get" action="">
      <div class="form-row align-items-center">
        <h5 class="ml-2">Mã số:</h5>
        <div class="col-auto">
         
          <input type="text" class="form-control mb-2" value = "<?php echo $this->input->get('id') ?>" name = "id" id="id">
        </div>
        <h5 class="ml-4">Tên:</h5>
        <div class="col-auto">

          <input type="text" class="form-control mb-2" name = "name" value="<?php echo $this->input->get('name') ?>" id="name">
        </div>
        <h5 class="ml-4">Thể loại:</h5>
        <div class="col-auto">  
         
          <select type = "input" name = "catalog" class="custom-select mb-2">
           <option value="0" > Lựa chọn hình thức lọc </option>  
          <?php foreach ($catalogs as $row): ?>
          <option value="<?php echo $row->id ?>" ><?php echo $row->name ?></option>
            <?php endforeach; ?> 
          </select>

        </div>
        <div class="col-auto">
          <button type="submit" value = "Lọc" class="btn btn-primary mb-2">Lọc</button>
        </div>
        <div class="col-auto">
          <button type="reset" class="btn btn-danger mb-2" onClick = "window.location.href = '<?php echo admin_url('product') ?>'">Reset</button>
        </div>
      </div>
    </form>


    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="tableMaterialCheck1">
              <label class="form-check-label" for="tableMaterialCheck1"></label>
            </div>
          </th>
          <th>Mã số</th>
          <th>Ảnh</th>
          <th>Tên</th>
          <th>Giá</th>
          <th>Ngày tạo</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody class = "list_item">
        <tr>
        <?php foreach ($list as $row): ?>
          <td>
            <div class="form-check">
              <input type="checkbox" value="<?php echo $row->id ?>" class="form-check-input" id="id[]">
              <label class="form-check-label" for="tableMaterialCheck1"></label>
              </div>
          </td>
          <td><?php echo $row->id ?></td>
          <td>
            <img style="width: 80px; height: 50px" src="<?php echo base_url('upload/product/'.$row->image_link)?>" alt="">
          </td>
          <td>
            <div>
              <div> <strong><?php echo $row->name ?></strong> </div>
              <span><small>Đã bán: <?php echo $row->buyed ?> | Đã xem: <?php echo $row->view ?></small> </span>    
            </div>
          </td>
          <td>
            <?php if ($row->discount > 0): ?>
              <?php $price_new = $row->price - $row->discount?>
              <strong class = "text-info"> <p> <?php echo number_format($price_new) ?> </p> </strong>
              <p style = "margin-top: -20px ;text-decoration: line-through; "> <?php echo number_format($row->price) ?> </p>
            <?php else: ?>
              <p><?php echo number_format($row->price) ?></p>
            <?php endif; ?>
          </td>
          <td>17-12-2018</td>
          <td>
            <a href = "<?php echo admin_url('product/edit/'.$row->id) ?>"><span class="table-pause"> <button  type="button" class="btn btn-secondary btn-rounded btn-sm my-0"><i class="fas fa-pause"></i></button></span></a>
            <a href = "<?php echo admin_url('product/delete/'.$row->id) ?>" onClick = "deleteUser()"><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><i class="fas fa-trash-alt"></i></button></span></a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
   </table>
     <span class="table-pause"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"> Xóa Hết </button></span>

  <?php echo $this->pagination->create_links() ?>
  <?php $pagtemp = $this->uri->segment(4); ?>
  <?php $pagtemp = intval($pagtemp);?>
  <?php $pagtempN = $pagtemp + 1;?>
  <?php $pagtempP = $pagtemp - 1;?>
  <?php $total_row = intval($total_row); ?>
  <?php $lastpage = ceil($total_row/5)?>
    <span> <button  class="btn btn-success text-white btn-rounded btn-sm my-0 btn"><a class = "text-white" href="<?php echo admin_url('product/index/')?>">  Trang đầu  </a></button></span>    
    <span> <button  class="btn btn-info text-white btn-rounded btn-sm my-0 btn"><a class = "text-white" href="<?php echo admin_url('product/index/'.$pagtempP)?>">  <?php echo $pagtempP ?> </a></button></span>        
    <span> <button  class="btn btn-info btn-rounded btn-sm my-0"> <a class = "text-white" href="<?php echo admin_url('product/index/'.$pagtempN)?>"> <?php echo $pagtempN ?> </button></span>
    <span> <button  class="btn btn-success text-white btn-rounded btn-sm my-0 btn"><a class = "text-white" href="<?php echo admin_url('product/index/'.$lastpage)?>">  Trang cuối </a></button></span>    
   <script>
        function deleteUser(){
            confirm("Bạn có chắc là muốn xóa Danh mục này không?");
        }
    </script>
