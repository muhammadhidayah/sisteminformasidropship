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
					<div class="panel-heading">Daftar Pengguna</div>
					<div class="panel-body">
						<table class="table table-bordered">
						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">Id User</th>
						        <th data-field="idl" data-sortable="true">Id Level</th>
						        <th data-field="name"  data-sortable="true">Username</th>
						        <th data-field="pass" data-sortable="true">Password</th>
						        <th data-field="lastlogin" data-sortable="true">Login Terakhir</th>
						        <th data-field="option" data-sortable="true">Options</th>
						    </tr>
						    </thead>
						    <tbody id="showdata">
						    	
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

</div>	<!--/.main-->
<!-- END CONTENT -->
<script type="text/javascript">
	$(function(){
		
		tampiluser();

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
									'<td>'+data[i].id_user+'</td>'+
									'<td>'+data[i].id_level+'</td>'+
									'<td>'+data[i].username+'</td>'+
									'<td>'+data[i].password+'</td>'+
									'<td>'+data[i].last_login+'</td>'+
									'<td><center>'+
										'<a href="javascript:;" class="btn btn-success">Edit</a>&nbsp&nbsp&nbsp&nbsp'+
										'<a href="javascript:;" class="btn btn-danger">Hapus</a>&nbsp&nbsp&nbsp&nbsp'+
										'<a href="javascript:;" class="btn btn-info">Lihat detail Dropshiper</a>'
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
