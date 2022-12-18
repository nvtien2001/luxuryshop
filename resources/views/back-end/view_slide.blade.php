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
                        <p class="right__desc">Xem slide: <a href="/admin/slide-add"><button type="button" class="add btn-outline-dark">Thêm slide</button></a></p>
                        <div class="right__table">
                            <div class="right__tableWrapper">
                                <table id="myTable" style="border:none;">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Tên slide</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($slides as $slide)
	                                        <tr>
	                                            <td data-label="STT" scope="row">{{ $loop->iteration }}</td>
	                                            <td data-label="Tên slide">{{$slide->name}}</td>
                                                <td data-label="Ảnh" style="text-align: center;"><img style="width: 50px;height: 50px; object-fit: cover;" src="/file/upload/{{$slide->url_img}}" alt=""></td>
	                                            <td data-label="Mô tả">{{$slide->description}}</td>
	                                            <td data-label="Sửa" class="right__iconTable"><a href="/admin/slides/{{$slide->id}}"><img src="/assets/icon-edit.svg" alt=""></a></td>
	                                            <td data-label="Xoá" class="right__iconTable"><a href="javascript:void(0)" onclick="myFunction({{$slide->id}})"><img src="/assets/icon-trash-black.svg" alt=""></a></td>
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
			  var r = confirm("Bạn có muốn xoá slide này ?");
			  if (r == true) {
			    window.location = "/admin/slides-delete/" + id;
			  } else {
			    window.location = "/admin/slides";
			  }
		}

		$(document).ready( function () {
		    $('#myTable').DataTable();
		} );
	</script>
</body>
</html>
