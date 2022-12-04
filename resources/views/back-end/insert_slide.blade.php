<!DOCTYPE html>
<html lang="en">
<head>
    @include('back-end.common.css')
    <style>
    .checkBox{
    	display:inline-block;
    	font-size: 25px;
    }
    
    .checkBox span{
    	margin-right: 20px;
    	padding-right: 20px;
    	
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
                        <div class="right__formWrapper">
                            
                            <form action="/admin/slide-add" method="post" enctype="multipart/form-data">
                            @csrf
                            	<input type="hidden" name="id" value="{{$sli->id}}">
                            	
                            	<div class="right__inputWrapper">
									<label>Tên slide</label>
									<input type="text" class="form-control" name="name" value="{{$sli->name}}" required>
									<small id="emailHelp" class="form-text text-muted">
											Tối đa 15 kí tự.
									</small>
								</div>                   
                                <div class="right__inputWrapper">
                                    <label>Ảnh</label>
                                    <input type="file" name="images[]" class="form-control" multiple="multiple" value="{{$sli->url_img}}" required>
                                </div>								
                                <div class="right__inputWrapper">
                                    <label>Mô tả</label>
									<textarea id="description" class="form-control" name="description"></textarea>
                                </div>                     
                                <input type="hidden" name="detail_id">                            
                                <button class="btn" type="submit">Thêm</button>
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @include('back-end.common.js')
    <script>

	$('#txtDetailDescription').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
</body>
</html>