<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="<?php echo site_url();?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			
			<!--Menu Untuk User Dropshiper-->
			<?php if($this->session->userdata('id_level') == '2' ) { ?>
				<li><a href="<?php echo site_url();?>/dropshipper/katalog"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Katalog</a></li>
				<li><a href="<?php echo site_url();?>/dropshipper/transaksi"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Transaksi</a></li>
			<!-- Menu Untuk Admin-->
			<?php } else { ?>
				<li><a href="<?php echo site_url('admin/category'); ?>"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"></use></svg>Category</a></li>
				<li><a href="<?php echo site_url();?>/admin/manajemen_user"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Manajemen User</a></li>
				<li><a href="<?php echo site_url();?>/admin/transaksi"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Transaksi</a></li>
			<?php } ?>

		</ul>

	</div><!--/.sidebar-->