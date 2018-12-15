
	<?php 
	$this->load->view('admin/admin/head', $this->data);
	$this->load->view('admin/mess', $this->data);
	 ?>
    <table class="table table-hover table-striped mt-5">
      <thead>
        <tr>
          <th></th>
          <th><i class="fas fa-users"></i></th>
          <th>Danh sách quản trị viên</th>
          <th></th>
          <th>Tổng số: <?php echo $total; ?></th>
        </tr>
      </thead>
      <tbody class = "list_item">
        <tr class="table-success text-dark font-weight-bold">
          <td>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="tableMaterialCheck1">
              <label class="form-check-label" for="tableMaterialCheck1"></label>
              </div>
          </td>
          <td>Mã số</td>
          <td>Họ và tên</td>
          <td>Username</td>
          <td>Hành động</td>
    <?php foreach ($list as $row):?>	
        </tr>
        <tr>
          <td>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="id[]" value="<?php echo $row->id; ?>">
              <label class="form-check-label" for="tableMaterialCheck1"></label>
              </div>
          </td>
          <td><?php echo $row->id; ?></td>
          <td><?php echo $row->name; ?></td>
          <td><?php echo $row->username; ?></td>
          <td>
            <a href="<?php echo admin_url('admin/edit/'.$row->id) ?>"><span class="table-pause"><button type="button" class="btn btn-secondary btn-rounded btn-sm my-0"><i class="fas fa-tools"></i></button></span></a>

            <a onclick="deleteUser()" href="<?php echo admin_url('admin/delete/'.$row->id) ?>"><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><i class="fas fa-trash-alt"></i></button></span></a>
          </td>
        </tr>
    <?php endforeach; ?>
      </tbody>
    </table>
    <hr>
    <span class="table-pause"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0"> Xóa Hết </button></span>

    <script>
        function deleteUser(){
            confirm("Bạn có chắc là muốn xóa User này không?");
        }
    </script>
