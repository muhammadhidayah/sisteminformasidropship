<!-- HEADER -->
<?php echo $header;?>
<!-- END HEADER -->

<!-- MENU -->
<?php echo $menu;?>
<!-- END MENU -->

<!-- SIDEMENU -->
<?php echo $sidemenu;?>
<!-- END SIDEMENU -->
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
					<div class="panel-heading">Tambah Produk</div>
					<?php echo validation_errors(); ?>
						<?php echo form_open_multipart('admin/addProduct', 'class="form-horizontal" id="myform" style="padding-top: 20px; padding-bottom: 20px;"');?>
						 	<div class="form-group">				 
						   		<label for="IDItem" class="col-sm-3 control-label">ID Item</label>
						    	<div class="col-sm-5">
						    		<input type="text" class="form-control" id="txtId" name="txtId" placeholder="ID Item">
						    	</div>
						  	</div>
						 	<div class="form-group">				 
						   		<label for="NamaItem" class="col-sm-3 control-label">Nama Item</label>
						    	<div class="col-sm-5">
						    		<input type="text" class="form-control" id="txtNama" name="txtNama" placeholder="Nama Item">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label for="StockItem" class="col-sm-3 control-label">Stock Item</label>
						    	<div class="col-sm-5">
						    		<input type="text" class="form-control" id="txtStock" name="txtStock" placeholder="Stock">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label for="PriceItem" class="col-sm-3 control-label">Harga Item</label>
						    	<div class="col-sm-5">
						    		<input type="text" class="form-control" id="txtprice" name="txtprice" placeholder="Harga Item">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label for="inputcategory" class="col-sm-3 control-label">Category</label>
						    	<div class="col-sm-5">
						    		<select class="multiple" id="optioCategory" name="optioCategory">
						    			<option value="">Pilih Category</option>
						    			<?php foreach ($this->db->get('tbl_category')->result() as $row): ?>
						    				<option value="<?php echo $row->id_category ?>"><?php echo $row->explanation;?></option>
						    			<?php endforeach; ?>
						    		</select>
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label for="inputnama" class="col-sm-3 control-label">Photo</label>
						    	<div class="col-sm-5">
						    		<input type="file" class="form-control" id="fotoitem" name="fotoitem">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<div class="col-sm-offset-7 col-sm-10">
						      		<button type="submit" id="simpan" name="simpan" class="btn btn-success">Simpan</button>
						    	</div>
						    </div>
						</form>
				</div>
			</div>
		</div>	

</div>	<!--/.main-->
<!-- FOOTER -->	
<?php echo $footer;?>
<!-- END FOOTER -->