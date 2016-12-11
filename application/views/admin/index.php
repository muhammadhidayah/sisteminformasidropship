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
						<table class="table table-bordered">
						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">Item Name</th>
						        <th data-field="name"  data-sortable="true">Item Stock</th>
						        <th data-field="price" data-sortable="true">Item Price</th>
						        <th data-field="price" data-sortable="true">Item Photo</th>
						        <th data-field="price" data-sortable="true">Options</th>
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
				url: '<?php echo site_url();?>/admin/tampilproduk',
				type: 'POST',
				dataType: 'json',
				async: false,
				success: function(data){
					var hasil = '';
					var i;
					for(i = 0; i < data.length; i++ ) {
						hasil += '<tr>' +
									'<td>'+data[i].name_item+'</td>'+
									'<td>'+data[i].stock+'</td>'+
									'<td>Rp.'+data[i].selling_price+'</td>'+
									'<td><center><img src="<?php echo base_url('upload/');?>'+data[i].foto+'" height="40" width="30" id="image"></center></td>'+
									'<td><center>'+
										'<a href="javascript:;" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span>&nbsp&nbspEdit</a>&nbsp&nbsp&nbsp&nbsp'+
										'<a href="javascript:;" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbspHapus</a>'+
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
