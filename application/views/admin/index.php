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
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jumpro;?></div>
							<div class="text-muted">Jumlah</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jumlahdrop;?></div>
							<div class="text-muted">Dropshiper</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jumlah;?></div>
							<div class="text-muted">Users</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Daftar Produk</div>
					<div class="panel-body">
						<button class="btn btn-success btn-sm" id="btnTambahProduk"><span class="glyphicon glyphicon-plus"></span> Tambah Product</button>
						<table data-toggle="table" id="data" data-url="<?php echo site_url('admin/tampilProdukDataTables');?>" data-show-refresh="true" data-show-toggle="false" data-show-columns="true" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="name_item" data-sortable="true"><center>Item Name</center></th>
						        <th data-field="stock"  data-sortable="true"><center>Item Stock</center></th>
						        <th data-field="selling_price" data-sortable="true"><center>Item Price</center></th>
						        <th data-field="foto" data-sortable="true"><center>Item Photo</center></th>
						        <th data-field="option" data-sortable="true"><center>Options</center></th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div>

</div>	<!--/.main-->

<!-- Modal Untuk Edit Item Produk-->
<div class="modal fade" tabindex="-1" role="dialog" id="editProduct">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="" method="POST" id="myFormEditItem">
			<div class="form-group">
				<input type="hidden" id="txtId" name="txtId">
				<input type="hidden" id="txtfoto" name="txtfoto">
		    	<label for="inputnama" class="col-sm-3 control-label">Nama Item</label>
		    	<div class="col-sm-9">
		    		<input type="text" class="form-control" id="txtNama" name="txtNama">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputnama" class="col-sm-3 control-label">Stock Item</label>
		    	<div class="col-sm-9">
		    		<input type="text" class="form-control" id="txtStock" name="txtStock">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputnama" class="col-sm-3 control-label">Harga Item</label>
		    	<div class="col-sm-9">
		    		<input type="text" class="form-control" id="txtprice" name="txtprice">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputcategory" class="col-sm-3 control-label">Category</label>
		    	<div class="col-sm-9">
		    		<select class="multiple" id="optioCategory" name="optioCategory">
		    			<option value="">Pilih Category</option>
		    			<?php foreach ($this->db->get('tbl_category')->result() as $row): ?>
		    				<option value="<?php echo $row->id_category ?>"><?php echo $row->explanation;?></option>
		    			<?php endforeach; ?>
		    		</select>
		    	</div>
		  	</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="btnSimpan">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal Untuk Tambah Produk-->
<div class="modal fade" tabindex="-1" role="dialog" id="addProduct">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="" method="POST" id="myFormEditItem">
			<div class="form-group">
		    	<label for="inputnama" class="col-sm-3 control-label">ID Item</label>
		    	<div class="col-sm-9">
		    		<input type="text" class="form-control" id="txtId" name="txtId">
		    	</div>
		  	</div>
			<div class="form-group">
		    	<label for="inputnama" class="col-sm-3 control-label">Nama Item</label>
		    	<div class="col-sm-9">
		    		<input type="text" class="form-control" id="txtNama" name="txtNama">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputnama" class="col-sm-3 control-label">Stock Item</label>
		    	<div class="col-sm-9">
		    		<input type="text" class="form-control" id="txtStock" name="txtStock">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputnama" class="col-sm-3 control-label">Harga Item</label>
		    	<div class="col-sm-9">
		    		<input type="text" class="form-control" id="txtprice" name="txtprice">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputcategory" class="col-sm-3 control-label">Category</label>
		    	<div class="col-sm-9">
		    		<select class="multiple" id="optioCategory" name="optioCategory">
		    			<option value="">Pilih Category</option>
		    			<?php foreach ($this->db->get('tbl_category')->result() as $row): ?>
		    				<option value="<?php echo $row->id_category ?>"><?php echo $row->explanation;?></option>
		    			<?php endforeach; ?>
		    		</select>
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputnama" class="col-sm-3 control-label">Foto</label>
		    	<div class="col-sm-9">
		    		<input type="file" id="inputPhoto" name="inputPhoto">
		    	</div>
		  	</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="btnAddSimpan">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- END CONTENT -->
<script type="text/javascript">
	$(function() {

		$('#btnTambahProduk').click(function(){
			$('#addProduct').modal('show');
			$('#addProduct').find('.modal-title').html('Tambah Produk');
			$('#addProduct').attr('action','<?php echo site_url('admin/addProduct') ?>');
		});

		$('#btnAddSimpan').click(function(){
			var url = $('#addProduct').attr('action');
			var data = $('#addProduct').serialize();

			var id = $('input[name=txtId]');
			var name = $('input[name=txtNama]');
			var stock = $('input[name=txtStock]');
			var price = $('input[name=txtprice]');
			var category = $('select[name=optioCategory]');
			var foto = $('input[name=inputPhoto]');
			var result = '';

			if(id.val() == "") {
				id.parents().parents().addClass('has-error');
			} else {
				id.parents().parents().removeClass('has-error');
				result += '1';
			}

			if(name.val() == "") {
				name.parents().parents().addClass('has-error');
			} else {
				name.parents().parents().removeClass('has-error');
				result += '1'
			}

			if(stock.val() == '') {
				stock.parents().parents().addClass('has-error');
			} else {
				stock.parents().parents().removeClass('has-error');
				result += '2';
			}

			if(price.val() == '') {
				stock.parents().parents().addClass('has-error');
			} else {
				stock.parents().parents().removeClass('has-error');
				result += '3';
			}

			if(category.val() == '') {
				category.parents().parents().addClass('has-error');
			} else {
				category.parents().parents().removeClass('has-error');
				result += '4';
			}

			if(foto.val() == '') {
				foto.parents().parents().addClass('has-error');
			} else {
				foto.parent().parents().removeClass('has-error');
				result += '5';
			}

			if(result == '112345') {
				$.ajax({
					url: url,
					data: data,
					dataType: 'json',
					method: 'POST',
					type: 'ajax',
					success: function() {

					},
					error: function() {
						alert('Gagal Menambahkan Product');
					}
				});
			}


		});

		$("#data").on('click', '.btn-edit', function() {
			var id = $(this).attr('data');
			$("#editProduct").modal('show');
			$("#editProduct").find('.modal-title').html('Edit Item');
			$("#myFormEditItem").attr('action','<?php echo site_url('admin/editProduct'); ?>');
			$.ajax({
				url: '<?php echo site_url('admin/getItemById'); ?>',
				method: 'GET',
				type: 'ajax',
				dataType: 'json',
				data: {id: id},
				success: function(data) {
					$('input[name=txtId]').val(data.id_item);
					$('input[name=txtfoto]').val(data.foto);
					$('input[name=txtNama]').val(data.name_item);
					$('input[name=txtStock]').val(data.stock);
					$('input[name=txtprice]').val(data.selling_price);
					$('select[name=optioCategory]').val(data.id_category);
				},
				error: function() {
					alert('Tidak Bisa Edit Data');
				}

			});
		});

		$("#data").on('click', '.btn-delete', function(){
			var status = confirm('Apakah anda yakin akan mengahpus Item ini?');
			var id = $(this).attr('data');

			if(status) {
				$.ajax({
					url: '<?php echo site_url('admin/deleteProduct'); ?>',
					data: {id: id},
					dataType: 'json',
					method: 'post',
					success: function(response) {
						if(response.success) {
							alert('Data Berhasil di Hapus!');
							location.reload();
						}
					},
					error: function() {
						alert('Data tidak berhasil dihapus');
					}
				});
			}
		});

		$("#btnSimpan").click(function() {
			var url = $("#myFormEditItem").attr('action');
			var data = $("#myFormEditItem").serialize();

			var name = $('input[name=txtNama]');
			var stock = $('input[name=txtStock]');
			var price = $('input[name=txtprice]');
			var category = $('select[name=optioCategory]');
			var result = '';

			if(name.val() == "") {
				name.parents().parents().addClass('has-error');
			} else {
				name.parents().parents().removeClass('has-error');
				result += '1'
			}

			if(stock.val() == '') {
				stock.parents().parents().addClass('has-error');
			} else {
				stock.parents().parents().removeClass('has-error');
				result += '2';
			}

			if(price.val() == '') {
				stock.parents().parents().addClass('has-error');
			} else {
				stock.parents().parents().removeClass('has-error');
				result += '3';
			}

			if(category.val() == '') {
				category.parents().parents().addClass('has-error');
			} else {
				category.parents().parents().removeClass('has-error');
				result += '4';
			}

			if(result == '1234') {
				$.ajax({
					url: url,
					data: data,
					method: 'POST',
					type: 'ajax',
					dataType: 'json',
					succes: function(response) {
						if(response.success) {
							alert('Data Berhasil di Hapus!');
							location.reload();
						}
					},
					error: function() {
						alert('Tidak Bisa di Edit');
					}

				});
			}

		});

	});
</script>
<!-- FOOTER -->	
<?php echo $footer;?>
<!-- END FOOTER -->
