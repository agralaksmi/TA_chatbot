<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Users
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List User</h3>
              <?php if ($this->session->flashdata('failed')) {?>
                <p class="alert alert-danger"><?php echo $this->session->flashdata('failed'); ?></p>
              <?php } ?>
              <?php if ($this->session->flashdata('success')) {?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
              <?php } ?>

            </div>
            <div class="box-body">
              <p><a href="#" class="btn btn-primary " data-toggle="modal" data-target="#modal-add">Tambah User</a></p>
              <?php //print_r($this->session->userdata()) ?>
              <table id="table" class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($data as $key => $value): ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $value->username ?></td>
                      <td>
                        <button type="button" onclick="edit(<?php echo $value->id ?>)" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit">
                          Edit
                        </button>
                        <?php if ($value->id==$this->session->userdata('id')){ ?>
                          <button type="button" class="btn btn-danger" data-toggle="modal" disabled data-target="#modal-sakarepmu">
                            Delete
                          </button>
                        <?php } ?>
                        <?php if ($value->id!=$this->session->userdata('id')){ ?>
                          <a href="<?php echo base_url('users/deleteUser/').$value->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete user ? ')">
                            Delete
                          </a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php $i++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
      </section>
    </div>

  </section>
</div>

<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row">
            <form class="" action="<?php echo base_url('users/createUser') ?>" method="post">
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" autofocus class="form-control" name="add_username" id="add_username" placeholder="" value="" required>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="add_password" id="txtNewPassword" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" id="txtConfirmPassword" placeholder="" required>
              </div>
              <div id="divCheckPasswordMatch"></div>
              <div class="form-group">
                <button type="submit" id="save" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit User</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row">
            <form class="" action="<?php echo base_url('users/process_edit') ?>" method="post">
              <div class="form-group">
                <label for="">Username</label>
                <input type="hidden" name="edt_id" id="edt_id" value="">
                <input type="text" class="form-control" name="edt_username" id="edt_username" placeholder="">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="edt_password" id="txtNewPassword" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" id="txtConfirmPassword" placeholder="" required>
              </div>
              <div id="divCheckPasswordMatch"></div>
              <div class="form-group">
                <button type="submit" id="save" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword){
      $("#divCheckPasswordMatch").html("<div class='alert alert-danger'>Password tidak sesuai !!</div>");
      document.getElementById("save").disabled = true;
    }
    else{
      $("#divCheckPasswordMatch").html("<div class='alert alert-success'>Password sesuai :)</div>");
      document.getElementById("save").disabled = false;
    }
  }

  function edit(id) {
    console.log(id);
    $.ajax({
      url: '<?php echo base_url('users/getUser/') ?>'+id,
      type: 'GET',
      dataType: 'json',
      // beforeSend: function() {
      //   alert('jancuk')
      // }
    })
    .done(function(data) {
      //console.log(data);
      document.getElementById('edt_id').value = data.id
      document.getElementById('edt_username').value = data.username
    })
    .fail(function() {
      console.log("error");
    })
  }

  $(document).ready(function () {
     $("#txtConfirmPassword").keyup(checkPasswordMatch);
  });
</script>
