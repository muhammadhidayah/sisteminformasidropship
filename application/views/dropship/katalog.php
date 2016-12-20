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
				<li class="active">Katalog</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Katalog</h1>
			</div>
		</div><!--/.row-->
		<div class="alert" style="display: none"></div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Daftar Produk
						<div class="pull-right">
							<button class="btn btn-primary" id="detail-mybasket"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><?php echo $this->cart->total_items(); ?> Items
							</button>
						</div>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
						    <thead>
						    <tr>
						        <th><center>Item Name</center></th>
						        <th><center>Item Stock</center></th>
						        <th><center>Item Price</center></th>
						        <th><center>Item Photo</center></th>
						        <th><center>Options</center></th>
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

<div class="modal fade" tabindex="-1" role="dialog" id="inMyBasket">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>Nama Barang</th>
        			<th>QTY</th>
        			<th>Harga</th>
        			<th>Subtotal</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php $total = 0; foreach ($this->cart->contents() as $items) { $total += $items['subtotal'];?>
        			<tr>
        				<td><?=$items['name']?></td>
        				<td><?=$items['qty']?></td>
        				<td><?=$items['price']?></td>
        				<td><?=$items['subtotal']?></td>
        			</tr>
        		<?php } ?>
        	</tbody>
        	<tfoot>
        		<tr>
        			<td colspan="3" align="right">Total</td>
        			<td><?php echo $total; ?></td>
        		</tr>
        	</tfoot>
        </table>
      </div>
      <div class="modal-footer">
      	<center>
      		<button type="buton" class="btn btn-danger" id="clear-cart">Clear Cart</button>
		    <button type="button" class="btn btn-primary" data-dismiss="modal">Continue Shopping</button>
		    <button type="button" class="btn btn-success" data-dismiss="modal" id="checkout">Check Out</button>
        </center>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Untuk Alamat Tujuan-->
<div class="modal fade" tabindex="-1" role="dialog" id="alamatTujuan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="" method="POST" id="myFormTujuan">
			<div class="form-group">
		    	<label for="inputnama" class="col-sm-2 control-label">Nama</label>
		    	<div class="col-sm-10">
		    		<input type="text" class="form-control" id="txtNama" name="txtNama" placeholder="Nama">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputalamat" class="col-sm-2 control-label">Alamat</label>
		    	<div class="col-sm-10">
		    		<input type="text" class="form-control" id="txtAlamat" name="txtAlamat" placeholder="Alamat">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputprovinsi" class="col-sm-2 control-label">Provinsi</label>
		    	<div class="col-sm-10">
		    		<input type="text" class="form-control" id="txtProvinsi" name="txtProvinsi" placeholder="Provinsi">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputkabupaten" class="col-sm-2 control-label">Kabupaten</label>
		    	<div class="col-sm-10">
		    		<input type="text" class="form-control" id="txtKabupaten" name="txtKabupaten" placeholder="Kabupaten">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputkecamatan" class="col-sm-2 control-label">Kecamatan</label>
		    	<div class="col-sm-10">
		    		<input type="text" class="form-control" id="txtKecamatan" name="txtKecamatan" placeholder="Kecamatan">
		    	</div>
		  	</div>
		  	<div class="form-group">
		    	<label for="inputnohp" class="col-sm-2 control-label">No HP</label>
		    	<div class="col-sm-10">
		    		<input type="text" class="form-control" id="txtNohp" name="txtNohp" placeholder="No Hp">
		    	</div>
		  	</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="btnOrder">Order</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- END CONTENT -->
<script type="text/javascript">
	$(function(){
		
		tampilproduk();

		$("#detail-mybasket").click(function() {
			$("#inMyBasket").modal("show");
			$("#inMyBasket").find('.modal-title').html('Barang di Keranjang');
		});

		$("#clear-cart").click(function(){
			$.ajax({
				url: '<?php echo site_url('dropshipper/emptyBasket'); ?>',
				dataType: 'json',
				success: function(response) {
					if(response.success) {
						location.reload();
					}
				}
			});
			
		});

		$("#checkout").click(function() {
			<?php if($this->cart->total() == 0) { ?>
				alert('Mohon berbelanja terlebih dahulu');
			<?php } else { ?>
				$("#inMyBasket").modal('hide');
				$("#alamatTujuan").modal('show');
				$("#alamatTujuan").find('.modal-title').html('Alamat Tujuan');
				$("#myFormTujuan").attr('action', '<?php echo site_url('dropshipper/order'); ?>');
			<?php } ?>
		});

		$("#btnOrder").click(function(){
			var data = $('#myFormTujuan').serialize();
			var url = $('#myFormTujuan').attr('action');

			var nama = $('input[name=txtNama]');
			var alamat = $('input[name=txtAlamat]');
			var provinsi = $('input[name=txtProvinsi]');
			var kabupaten = $('input[name=txtKabupaten]');
			var kecamatan = $('input[name=txtKecamatan]');
			var nohp = $('input[name=txtNohp]');
			var result = '';

			if(nama.val() == '') {
				nama.parent().parent().addClass('has-error');
			} else {
				nama.parent().parent().removeClass('has-error');
				result += '1';
			}

			if(alamat.val() == '') {
				alamat.parent().parent().addClass('has-error');
			} else {
				alamat.parent().parent().removeClass('has-error');
				result += '2';
			}

			if(provinsi.val() == '') {
				provinsi.parent().parent().addClass('has-error');
			} else {
				provinsi.parent().parent().removeClass('has-error');
				result += '3';
			}

			if(kabupaten.val() == '') {
				kabupaten.parent().parent().addClass('has-error');
			} else {
				kabupaten.parent().parent().removeClass('has-error');
				result += '4';
			}

			if(kecamatan.val() == '') {
				kecamatan.parent().parent().addClass('has-error');
			} else {
				kecamatan.parent().parent().removeClass('has-error');
				result += '5';
			}

			if(nohp.val() == '') {
				nohp.parent().parent().addClass('has-error');
			} else {
				nohp.parent().parent().removeClass('has-error');
				result += '6'
			}

			if(result == '123456') {
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'json',
					data: data,
					success: function(response) {
						if(response.success) {
							alert('berhasil');
							location.reload();
						}
					},
					error: function() {
						alert('Tidak Berhasil');
					}
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			}


		});

		$("#showdata").on("click",".btn-beli", function(){
			var id = $(this).attr('data');
			$.ajax({
				url: '<?php echo site_url('dropshipper/addBasket'); ?>',
				type: 'POST',
				dataType: 'json',
				data: {id: id},
				success: function(response) {
					if(response.success) {
						window.location.reload();
					}					
				},
				error: function() {
					alert('Tidak Bisa Menambahkan Ke Keranjang Belanja');
				}
			});	
			
		});

		function tampilproduk(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url();?>/dropshipper/tampilproduk',
				type: 'POST',
				dataType: 'json',
				async: false,
				success: function(data){
					var hasil = '';
					var i;
					for(i = 0; i < data.length; i++ ) {
						hasil += '<tr>' +
									'<td><center>'+data[i].name_item+'</center></td>'+
									'<td><center>'+data[i].stock+'</center></td>'+
									'<td><center>Rp.'+data[i].selling_price+'</center></td>'+
									'<td><center><img src="<?php echo base_url('upload/');?>'+data[i].foto+'" height="40" width="30" id="image"></center></td>'+
									'<td><center>'+
										'<a href="javascript:;" class="btn btn-primary btn-sm btn-beli" data="'+data[i].id_item+'"><span class="glyphicon glyphicon-shopping-cart"></span>beli</a>&nbsp&nbsp&nbsp&nbsp'+
										'<a href="<?php echo base_url('upload/');?>'+data[i].foto+'" download class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download-alt"></span> Download foto</a>'+

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