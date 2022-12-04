<!DOCTYPE html>
<html lang="en">
<head>
    @include('back-end.common.css')
    <link href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
    .add{
    	padding: 20px 10px;
    	width: 150px;
    	float:right;
    	border: 1px solid black;
    	border-radius: 15px;
    	color: black;
    	background-color: white;
    	margin-bottom: 20px;
    	font-weight: bolder;
    	
    }
    
    .add:hover{
    	background-color:black;
    	color:white;
    	transition: 0.5s;
    }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
                @include('back-end.common.menu')
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Xem sản phẩm: <a href="/admin/product-add"><button type="button" class="add btn-outline-dark">Thêm sản phẩm</button></a></p>
                        <div class="right__table">
                            <div class="right__tableWrapper">
                                <table id="myTable" style="border:none;">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá bán</th>
                                            <th scope="col">Giá Cũ</th>
                                            <th scope="col">Đã bán</th>
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
	                                        <tr>
	                                            <td data-label="STT" scope="row">{{ $loop->iteration }}</td>
	                                            <td data-label="Tên sản phẩm">{{$product->title}}</td>
	                                            <td data-label="Giá SP">{{number_format($product->price,3)}}</td>
	                                            <td data-label="Giá Sale">{{number_format($product->price_old,3)}}</td>
	                                            <td data-label="Đã bán">1</td>
	                                            <td data-label="Sửa" class="right__iconTable"><a href="/admin/product-add/{{$product->id}}"><img src="/assets/icon-edit.svg" alt=""></a></td>
	                                            <td data-label="Xoá" class="right__iconTable"><a href="javascript:void(0)" onclick="myFunction({{$product->id}})"><img src="/assets/icon-trash-black.svg" alt=""></a></td>
                                        	</tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('back-end.common.js')
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
		function myFunction(id){
			  var r = confirm("Bạn có muốn xoá sản phẩm này ?");
			  if (r == true) {
			    window.location = "/admin/product-delete/" + id;
			  } else {
			    window.location = "/admin/products";
			  }
		}
		
		$(document).ready( function () {
		    $('#myTable').DataTable();
		} );
	</script>
</body>
</html>