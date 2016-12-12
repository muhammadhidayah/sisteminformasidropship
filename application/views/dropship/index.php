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
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
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
					<div class="panel-heading"><h2>Profile</h2></div>
					<div class="panel-body">
						<button type="button" class="btn btn-success" style="margin-bottom: 20px;">Ubah Data</button>
						<table class="table table-bordered" >
						 	<tr>
								<td rowspan="4" class="col-sm-3" style="padding-top: 1px;">
									<div>
										<img src="http://localhost/si/upload/BT%20332.png" class="img-responsive" alt="Responsive image">
									</div>
								</td>
								<td width="10%">Nama Toko</td>
								<td width="2%">:</td>
								<td><?php echo $biodata->fullname; ?></td>
							</tr>
							<tr>
								<td width="10%">Alamat</td>
								<td width="2%">:</td>
								<td><?php echo $biodata->address; ?></td>
							</tr>
							<tr>
								<td width="10%">No HP</td>
								<td width="2%">:</td>
								<td><?php echo $biodata->no_hp; ?></td>
							</tr>
							<tr>
								<td width="10%">E-mail</td>
								<td width="2%">:</td>
								<td><?php echo $biodata->email; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
</div>	<!--/.main-->
<!-- END CONTENT -->

<!-- FOOTER -->
<?php echo $footer;?>
<!-- END FOOTER -->

