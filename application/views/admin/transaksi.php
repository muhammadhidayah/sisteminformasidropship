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
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Daftar Transaksi</div>
					<div class="panel-body">
						<table data-toggle="table" id="data_transaksi" data-url="<?php echo site_url('admin/getAllTransaksi');?>" data-show-refresh="true" data-show-toggle="false" data-show-columns="true" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id_purchase" data-sortable="true"><center>ID Purchase</center></th>
						        <th data-field="nama_toko"  data-sortable="true"><center>Nama Dropship</center></th>
						        <th data-field="status"  data-sortable="true"><center>Status</center></th>
						        <th data-field="option"  data-sortable="true"><center>Optional</center></th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div>

</div>	<!--/.main-->

<!--Lihat Detail Transaksi Pembelian-->
<div class="modal fade" tabindex="-1" role="dialog" id="detailTransaksi">
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
        	<tbody id="showdata">
        	</tbody>
        	<tfoot id="showtotal">
        		
        	</tfoot>
        </table>
      </div>
      <div class="modal-footer">
      	
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- END CONTENT -->
<script type="text/javascript">
	$(function() {
		
		$('#data_transaksi').on('click','.btn-lihat-detail', function() {
			var id = $(this).attr('data');
			$('#detailTransaksi').modal('show');
			$('#detailTransaksi').find('.modal-title').html('Detail Transaksi');
			$.ajax({
				url: '<?php echo site_url('admin/getDetailTransaksi'); ?>',
				data: {id: id},
				dataType: 'json',
				method: 'POST',
				async: false,
				success: function(data) {
					var hasil = '';
					var total = 0;
					var hasiltotal = '';
					var alamat = '';
					var i;
					for(i = 0; i < data.length; i++) {
						 hasil += '<tr>' +
		                            '<td><center>'+data[i].name_item+'</center></td>'+
		                            '<td><center>'+data[i].amount+'</center></td>'+
		                            '<td><center>'+data[i].selling_price+'</center></td>'+
		                            '<td><center>'+data[i].selling_price * data[i].amount+'</center></td>'+
		                           '</tr>';

		                 total += parseInt(data[i].selling_price * data[i].amount);
		                 alamat = data[i].alamat;
					}
					hasiltotal += '<tr>'+
									'<td colspan="3" align="right">Total</td>'+
        							'<td>'+ total +'</td>'+
        						'</tr>';

        			$('#showdata').html(hasil);
        			$('#showtotal').html(hasiltotal);
        			$('#detailTransaksi').find('.modal-footer').html('Keterangan: '+alamat);

				}

			});
		});

		$('#data_transaksi').on('click','.btn-confirm', function() {
			var id = $(this).attr('data');
			if(confirm('Anda akan melakukan konfirmasi pada ID' + id + ' ?')) {
				$.ajax({
					url: '<?php echo site_url('admin/confirmTransaksi'); ?>',
					data: {id: id},
					method: 'POST',
					dataType: 'json',
					success: function(response) {
						if(response.success) {
							alert('Pemesanan berhasil dikonfirmasi!');
							location.reload();
						}
					},
					error: function() {
						alert('Pemesanan gagal dikonfirmasi!');
						location.reload();
					}
				});
			}
		});
	});
</script>
<!-- FOOTER -->	
<?php echo $footer;?>
<!-- END FOOTER -->
