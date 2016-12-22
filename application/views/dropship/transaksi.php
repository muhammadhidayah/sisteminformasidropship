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
				<li class="active">Transaksi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Transaksi</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Detail Transaksi</div>
					<div class="panel-body">
						
						<table data-toggle="table" id="data_category" data-url="<?php echo site_url('dropshipper/showTransaksi');?>" data-show-refresh="true" data-show-toggle="false" data-show-columns="true" data-search="false" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id_purchase" data-sortable="true"><center>ID Purchase</center></th>
						        <th data-field="option" data-sortable="true"><center>Status</center></th>
						        <th data-field="option" data-sortable="true"><center>Tanggal</center></th>
						        <th data-field="option" data-sortable="true"><center>id Item</center></th>
						        <th data-field="option" data-sortable="true"><center>Jumlah</center></th>
						        <th data-field="option" data-sortable="true"><center>harga</center></th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div>

</div>	<!--/.main-->



<!-- Footer -->
<?php echo $footer; ?>
<!-- End Footer-->

