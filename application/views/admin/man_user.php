<!-- HEADER -->
<?php echo $header;?>
<!-- END HEADER -->

<!-- MENU -->
<?php echo $menu;?>
<!-- END MENU -->

<!-- SIDEMENU -->
<?php echo $sidemenu;?>
<!-- END SIDEMENU -->

<!-- CONTENT -->
<div class ="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Manajemen User</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Manajemen user</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="alert bg-success" role="alert" style="display: none;"> </div>
					<div class="panel-heading">Daftar Pengguna</div>
					<div class="panel-body">
					<button type="button" class="btn btn-success btn-sm" id="btnTambahUser">
			          <span class="glyphicon glyphicon-plus"></span> Tambah User
			        </button>
						<table class="table table-hover" style="margin-top: 20px;">
						    <thead>
						    <tr>
						        <th data-field="idl" data-sortable="true"><center>Jenis User</center></th>
						        <th data-field="name"  data-sortable="true"><center>Username</center></th>
						        <th data-field="pass" data-sortable="true"><center>Password</center></th>
						        <th data-field="lastlogin" data-sortable="true"><center>Login Terakhir</center></th>
						        <th data-field="option" data-sortable="true"><center>Options</th>
						    </tr>
						    </thead>
						    <tbody id="showdata">
						    	
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" tabindex="-1" role="dialog" id="myModalUser">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Modal title</h4>
		      </div>
		      <div class="modal-body">
		        <form class="form-horizontal" action="" method="POST" id="myFormUser">
				    <div class="form-group">
				      <input type="hidden" name="txtId" value=0>
				      <label class="control-label col-sm-4" for="username">Username:</label>
				      <div class="col-sm-8">
				        <input type="text" class="form-control" name="txtUsername" id="username" placeholder="Enter Username">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-4" for="pwd">Password:</label>
				      <div class="col-sm-8">          
				        <input type="password" class="form-control" name="txtPassword" id="pwd" placeholder="Enter password">
				      </div>
				    </div>
				    <div class="form-group">
				   		<label class="control-label col-sm-4">Jenis User:</label>
				   		<div class="col-sm-8">
					    	<select name="pilihJenisUser" class="multiple">
					    		<option value="1">Admin</option>
					    		<option value="2">Dropshiper</option>
					    	</select>
				    	</div>
				    </div>
			  </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="btnSave">Save changes</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</div>	<!--/.main-->
<!-- END CONTENT -->
<script type="text/javascript">
	$(function(){

		tampiluser();

		$('#btnTambahUser').click(function() {
			$('#myModalUser').modal('show');
			$('#myModalUser').find('.modal-title').html('<span class="glyphicon glyphicon-user"></span>&nbsp&nbspTambah User');
			$('#myFormUser').attr('action', '<?php echo site_url('admin/tambahUser');?>');
		});

		$('#btnSave').click(function() {
			var url = $('#myFormUser').attr('action');
			var data = $('#myFormUser').serialize();

			//Validasi FORM
			var username = $('input[name=txtUsername]');
			var password = $('input[name=txtPassword]');
			var jenisuser = $('select[name=pilihJenisUser]');
			var result = '';

			if(username.val() == '')
				username.parent().parent().addClass('has-error');
			else {
				username.parent().parent().removeClass('has-error');
				result += '1';
			}

			if(password.val() == '') 
				password.parent().parent().addClass('has-error');
			else {
				password.parent().parent().removeClass('has-error');
				result += '2';
			}

			if(jenisuser.val() == '')
				jenisuser.parent().parent().addClass('has-error');
			else {
				jenisuser.parent().parent().removeClass('has-error');
				result += '3';
			}

			if(result == '123') {
				$.ajax({
					url: url,
					type: 'ajax',
					method: 'POST',
					dataType: 'json',
					data: data,
					success: function(response) {
						if(response.success) {
							$('#myModalUser').modal('hide');			
							$('#myFormUser')[0].reset();
							if(response.type == 'add') {
								$('.alert').html('<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> User berhasil di Tambah').fadeIn().delay(4000).fadeOut('slow');
							} else if(response.type == 'update'){
								$('.alert').html('<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> User berhasil di Update').fadeIn().delay(4000).fadeOut('slow');
							} else {
								alert('Gagal update user');
							}
							tampiluser();
						} else {
							alert('Tidak Bisa Mengupdate User');
						}
					},
					error: function() {
						/* Act on the event */
						alert('Tidak Bisa Menambah User');
					}
				});				
			}
		});

		$('#showdata').on('click', '.item-edit', function() {
			var id = $(this).attr('data');
			$('#myModalUser').modal('show');
			$('#myModalUser').find('.modal-title').html('<span class="glyphicon glyphicon-pencil">&nbsp&nbspEdit User');
			$('#myFormUser').attr('action', '<?php echo site_url('admin/updateUser');?>');
			$.ajax({
				url: '<?php echo site_url('admin/editUser')?>',
				type: 'GET',
				dataType: 'json',
				data: {id: id},
				success: function(data){
					$('input[name=txtId]').val(data.id_user);
					$('input[name=txtUsername]').val(data.username);
					$('input[name=txtPassword]').val(data.password);
					$('select[name=pilihJenisUser]').val(data.id_level);
				},
				error: function(){
					alert('Tidak bisa melakukan edit');
				}
			});
			
		});

		$('#showdata').on('click','.item-hapus', function(){
			var id = $(this).attr('data');
			var status = confirm('Apakah anda yakin ingin menghapus?');
			if(status) {
				$.ajax({
					url: '<?php echo site_url('admin/deleteUser'); ?>',
					method: 'post',
					dataType: 'json',
					data: {id: id},
					success: function(response) {
						if(response.success) {
							$('.alert').addClass('bg-danger').html('<svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg> User berhasil di Delete').fadeIn().delay(4000).fadeOut('slow');
							tampiluser();
						}
					},
					error: function() {
						alert('Tidak bisa menghapus');
					}
				});
			}

		});

		function tampiluser(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url();?>/admin/tampiluser',
				type: 'POST',
				dataType: 'json',
				async: false,
				success: function(data){
					var hasil = '';
					var i;
					for(i = 0; i < data.length; i++ ) {
						hasil += '<tr>' +
									'<td><center>'+data[i].jenis_user+'</center></td>'+
									'<td><center>'+data[i].username+'</center></td>'+
									'<td><center>'+data[i].password+'</center></td>'+
									'<td><center>'+data[i].last_login+'</center></td>'+
									'<td><center>'+
										'<a href="javascript:;" class="btn btn-success btn-sm item-edit" data="'+data[i].id_user+'"><span class="glyphicon glyphicon-pencil"></span>&nbsp&nbspEdit</a>&nbsp&nbsp&nbsp&nbsp'+
										'<a href="javascript:;" class="btn btn-danger btn-sm item-hapus" data="'+data[i].id_user+'"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbspHapus</a>&nbsp&nbsp&nbsp&nbsp' +
										'<a href="javascript:;" class="btn btn-info" id="detail-dropship">Lihat detail Dropshiper</a>'
									'</center></td>'+
								'</tr>';	

					}
					$('#showdata').html(hasil);
				},
				error: function(){
					alert('Tidak Bisa Mengambil Data');
				}
		});
		}
		
	});
</script>
<!-- FOOTER -->
<?php echo $footer;?>
<!-- END FOOTER -->
