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
                            
                            <form action="/admin/product-add" method="post" enctype="multipart/form-data">
                            @csrf
                            	<input type="hidden" name="id" value="{{$prod->id}}">
                            	
                            	<div class="right__inputWrapper">
									<label>Tiêu đề</label>
									<input type="text" class="form-control" name="title" value="{{$prod->title}}">
									<small id="emailHelp" class="form-text text-muted">
											Tối đa 15 kí tự.
									</small>
								</div>
								
								 <div class="right__inputWrapper">
                                	<label>Danh mục</label>
									<select class="form-control form-control-line" name="category_id">
                                        @foreach($categories as $category) 
										<option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
									</select>
                                </div>
                                
                                <div class="right__inputWrapper">
                                    <label>Ảnh</label>
                                    <input type="file" name="images[]" class="form-control" multiple="multiple">
                                </div>
                                
                                <div>
									<input type="checkbox" name="isHot"  class="checkBox"/><span>Hot</span>
									<input type="checkbox" name="isSale" class="checkBox"/><span>Sale</span>
									<input type="checkbox" name="isNew" class="checkBox"/><span>New</span>
								</div>
                                
                                <div class="right__inputWrapper">
									<label>Giá cũ</label>
									<input type="input" type="text" class="form-control" name="priceOld" value="{{$prod->price_old}}">
									<small id="emailHelp" class="form-text text-muted">
											Tối đa 15 kí tự.
									</small>
								</div>
								
								<div class="right__inputWrapper">
									<label>Giá bán</label>
									<input type="input" type="text" class="form-control" name="price" value="{{$prod->price}}">
									<small id="emailHelp" class="form-text text-muted">
											Tối đa 15 kí tự.
									</small>
								</div>
								
                                <div class="right__inputWrapper">
                                    <label>Mô tả</label>
									<textarea id="txtDetailDescription" class="form-control" name="detailDescription"></textarea>
                                </div>
                                
                                <input type="hidden" name="detail_id">
                                
								<div class="right__inputWrapper">
									<label>Chất liệu</label>
									<input type="input" type="text" class="form-control" name="material" value="{{$prod->material}}">
								</div>
								<div class="right__inputWrapper">
									<label>Xuất xứ</label>
									<input type="input" type="text" class="form-control" name="origin" value="{{$prod->origin}}">
								</div>
								
                                
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