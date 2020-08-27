@extends('frontend.master')
@section('title','chi tiết sản phẩm')
@section('main')
	<link rel="stylesheet" href="css/details.css">
	
			<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
						<h3>{{$item->pro_name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
								<img width="250px" src="{{asset('lib/storage/app/avatar/'.$item->pro_img)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{number_format($item->pro_price,0,',','.')}}</span></p>
								<p>Bảo hành: {{$item->pro_warranty}}</p> 
								<p>Phụ kiện: {{$item->pro_accessories}}</p>
								<p>Tình trạng: {{$item->pro_coditison}}</p>
								<p>Khuyến mại: {{$item->pro_promotion}}</p>
									<p>Còn hàng: @if($item->pro_status==1)còn hàng @else hết hàng @endif</p>
								<p class="add-cart text-center"><a href="{{asset('cart/add/'.$item->pro_id)}}">Đặt hàng online</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
						<p class="text-justify"> {!!$item->pro_description!!}</p>
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
									{{ csrf_field() }}
								</form>
							</div>
						</div>
						<div id="comment-list">
							{{-- <h1>abc</h1> --}}
								@foreach ($comments as $comment )
								<ul>
								<li class="com-title">
									{{$comment->com_name}}
									<br>
								<span>{{date('d/m/y H:i',strtotime($comment->created_at))}}</span>	
								</li>
								<li class="com-details">
									{{$comment->com_content}}
								</li>
							</ul> 
							@endforeach
						
						</div>
					</div>					
					<!-- end main -->
					@stop
					{{-- @endsection	 --}}