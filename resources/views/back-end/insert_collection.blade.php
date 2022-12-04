<!DOCTYPE html>
<html lang="en">
<head>
    @include('back-end.common.css')
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
            @include('back-end.common.menu')
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Chèn bộ sưu tập</p>
                        <div class="right__formWrapper">
                            <form action="/admin/collection-add" method="post" modelAttribute="category">
                            @csrf
                            	<input type="hidden" name="id" value="{{$collec->id}}" >
                                <div class="right__inputWrapper">
									<label>Tiêu đề</label>
									<input type="text" class="form-control" name="name" value="{{$collec->name}}" required/>
									<small id="emailHelp" class="form-text text-muted">
											Tối đa 15 kí tự.
									</small>
								</div>
                                <div class="right__inputWrapper">
                                    <label>Mô tả</label>
									<textarea id="txtDetailDescription" class="form-control" name="description" value="{{$collec->description}}" ></textarea>
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