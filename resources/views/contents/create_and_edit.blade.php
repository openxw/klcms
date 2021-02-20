@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card " style="width: 1000px">

        <div class="card-body" >
          <h2 class="">
            <i class="far fa-edit"></i>
            @if($content->id)
            编辑话题
            @else
            新建话题
            @endif
          </h2>

          <hr>

          @if($content->id)
            <form action="{{ route('contents.update', $content->id) }}" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_method" value="PUT">
          @else
            <form action="{{ route('contents.store') }}" method="POST" accept-charset="UTF-8">
          @endif

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('shared._error')

              <div class="form-group">
                <input class="form-control" type="text" name="title" value="{{ old('title', $content->title ) }}" placeholder="请填写标题" required />
              </div>

              <div class="form-group">
                <select class="form-control" name="category_id" required>
                  <option value="" hidden disabled {{ $content->id ? '' : 'selected' }}>请选择分类</option>
                    @foreach ($categories as $value)
                      <option value="{{ $value->id }}" {{ $content->category_id == $value->id ? 'selected' : '' }}>
                        {{ $value->name }}
                      </option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <input class="form-control" type="text" name="title_img" value="{{ old('title', $content->title_img ) }}" placeholder="标题图片" required />
              </div>

              <div class="form-group">
                <textarea name="body" class="form-control" id="editor" rows="6" >{{$content->body }}</textarea>
              </div>

              <div class="well well-sm">
                <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script src="/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#editor',
        //skin:'oxide-dark',
        content_style: "img {max-width:100%;}",
        language:'zh_CN',
        plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template code codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount imagetools textpattern help emoticons autosave bdmap indent2em autoresize formatpainter axupimgs',
        toolbar: 'code undo redo restoredraft | cut copy paste pastetext | image forecolor backcolor bold italic underline strikethrough link anchor | alignleft aligncenter alignright alignjustify outdent indent | \
        styleselect formatselect fontselect fontsizeselect | bullist numlist | blockquote subscript superscript removeformat | \
        tablemedia charmap emoticons hr pagebreak insertdatetime print preview | fullscreen | bdmap indent2em lineheight formatpainter axupimgs',
        height: 650, //编辑器高度
        min_height: 400,
        /*content_css: [ //可设置编辑区内容展示的css，谨慎使用
            '/static/reset.css',
            '/static/ax.css',
            '/static/css.css',
        ],*/
        fontsize_formats: '12px 14px 16px 18px 24px 36px 48px 56px 72px',
        font_formats: '微软雅黑=Microsoft YaHei,Helvetica Neue,PingFang SC,sans-serif;苹果苹方=PingFang SC,Microsoft YaHei,sans-serif;宋体=simsun,serif;仿宋体=FangSong,serif;黑体=SimHei,sans-serif;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;',
        link_list: [
            { title: '预置链接1', value: 'http://www.tinymce.com' },
            { title: '预置链接2', value: 'http://tinymce.ax-z.cn' }
        ],
        image_list: [
            { title: '预置图片1', value: 'https://www.tiny.cloud/images/glyph-tinymce@2x.png' },
            { title: '预置图片2', value: 'https://www.baidu.com/img/bd_logo1.png' }
        ],
        image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
        ],
        importcss_append: true,
        //自定义文件选择器的回调内容
        file_picker_callback: function (callback, value, meta) {
            if (meta.filetype === 'file') {
            callback('https://www.baidu.com/img/bd_logo1.png', { text: 'My text' });
            }
            if (meta.filetype === 'image') {
            callback('https://www.baidu.com/img/bd_logo1.png', { alt: 'My alt text' });
            }
            if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.baidu.com/img/bd_logo1.png' });
            }
        },
        autosave_ask_before_unload: false,
        images_upload_handler: function (blobInfo, succFun, failFun) {

            var xhr, formData;
            var file = blobInfo.blob();//转化为易于理解的file对象
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '{{ route('files.upload_image') }}');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); //自行增加部分,解决Laravel的csrf校验需要
            xhr.onload = function() {
                var json;
                if (xhr.status != 200) {
                    failFun('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);
                if (!json || typeof json.location != 'string') {
                    failFun('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                succFun(json.location);
            };
            formData = new FormData();

            formData.append('file', file, file.name );//此处与源文档不一样
            xhr.send(formData);
        }
    });

    </script>
@stop
