@extends('backend.master')
@section('title','danhsachsanpham')
@section('main')
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">phung Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li><a href="#"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a href="#"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li class="active"><a href="#"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Danh mục</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Sửa danh mục
						</div>
						<div class="panel-body">
							<form action="" method="post">
							<div class="form-group">
								<label>Tên danh mục:</label>
							<input type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$cate->cate_name}}"> <br>
								<input required type="submit" name="submit" value="sưa sản phẩm" class="btn btn-primary btn-sm">
							</div>
							<div class="fom-group">
							<a href="{{asset('admin/caterory')}}" class="form_control btn btn-danger">hủy bỏ</a>

							</div>
							{{ csrf_field() }}
						</form>
						</div>
						
					</div>

			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

