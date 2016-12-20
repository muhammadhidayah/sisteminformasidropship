<!-- Header -->
<?php echo $header; ?>
<!-- End Header-->

<!-- Menu -->
<?php echo $menu; ?>
<!-- End Menu-->

<!-- Side Menu -->
<?php echo $sidemenu; ?>
<!-- End Side Menu-->


<div class ="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Category</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Category</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Daftar Produk</div>
					<div class="panel-body">
						<button class="btn btn-success btn-sm" id="addcategory"><span class="glyphicon glyphicon-plus"></span>Add Category</button>
						<table data-toggle="table" id="data_category" data-url="<?php echo site_url('admin/showAllCategory');?>" data-show-refresh="true" data-show-toggle="false" data-show-columns="true" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id_category" data-sortable="true"><center>ID Category</center></th>
						        <th data-field="explanation"  data-sortable="true"><center>Nama Category</center></th>
						        <th data-field="option" data-sortable="true"><center>Options</center></th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div>

</div>	<!--/.main-->

<div class="modal fade" tabindex="-1" role="dialog" id="myModalCategory">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Modal title</h4>
		      </div>
		      <div class="modal-body">
		        <form class="form-horizontal" action="" method="POST" id="myFormCategory">
				    <div class="form-group">
				      <input type="hidden" name="txtId" value=0>
				      <label class="control-label col-sm-4" for="category">ID Category:</label>
				      <div class="col-sm-8">
				        <input type="text" class="form-control" name="txtIdCategory" id="txtIdCategory" placeholder="Enter ID Category">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-4" for="category">Category:</label>
				      <div class="col-sm-8">          
				        <input type="text" class="form-control" name="txtCategory" id="txtCategory" placeholder="Enter Category">
				      </div>
				    </div>
			  </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="btnSaveCategory">Save changes</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


<script type="text/javascript">

$(function(){
		
		$('#addcategory').on('click',function(){
			$('#myModalCategory').modal('show');
			$('#myModalCategory').find('.modal-title').html('Tambah Category');
			$('#myFormCategory').attr('action', '<?php  echo site_url('admin/addCategory');?>');
		});

		$('#btnSaveCategory').click(function() {
			var url = $('#myFormCategory').attr('action');
			var data = $('#myFormCategory').serialize();

			var id_category = $('input[name=txtIdCategory]');
			var category = $('input[name=txtCategory]');
			var nilai = '';
			if(id_category.val() == '') {
				id_category.parent().parent().addClass('has-error');
			}
			else {
				id_category.parent().parent().removeClass('has-error');
				nilai += '1';
			}
			if(category.val() == '') {
				category.parent().parent().addClass('has-error');
			}
			else {
				category.parent().parent().removeClass('has-error');
				nilai += '2';
			}

			if(nilai == '12') {
				$.ajax({
					url: url,
					type: 'ajax',
					method: 'POST',
					dataType: 'json',
					data: data,
					success: function(response) {
						if(response.success) {
							alert('Berhasil Ditambah');
						}
					},
					error: function() {
						alert('Gagal Menambahkan');
					}
					});			
			}

	});

		$('#data_category').on('click', '.category-delete', function() {
			var id = $(this).attr('data');
			var status = confirm('Apakah anda yakin akan mendelete?');

			if(status) {
				$.ajax({
					url: '<?php echo site_url('admin/deleteCategory'); ?>',
					type: 'POST',
					dataType: 'json',
					data: {id: id},
					success: function(response) {
						if(response.success) {
							alert('Data Berhasil di Hapus!');
							location.reload();
						}
					},
					error: function() {
						alert('Data Tidak Berhasil di Hapus!');

					}			
				});
			}
			

		});


});


</script>
<!-- Footer -->
<?php echo $footer; ?>
<!-- End Footer-->

