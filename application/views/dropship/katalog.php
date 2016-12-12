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

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Daftar Produk</div>
					<div class="panel-body">
						<table class="table table-hover">
						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true"><center>Item Name</center></th>
						        <th data-field="name"  data-sortable="true"><center>Item Stock</center></th>
						        <th data-field="price" data-sortable="true"><center>Item Price</center></th>
						        <th data-field="price" data-sortable="true"><center>Item Photo</center></th>
						        <th data-field="price" data-sortable="true"><center>Options</center></th>
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
		
		tampilproduk();

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
										'<a href="javascript:;" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-shopping-cart"></span>beli</a>&nbsp&nbsp&nbsp&nbsp'+
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