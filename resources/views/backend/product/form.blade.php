<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class=" p-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="pro_name"
                               value="{{ old('pro_name',$product->pro_name ?? '') }}">
                        @if($errors->first('pro_name'))
                            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('pro_name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select name="pro_category_id" class="form-control" id="">
                            <option value="">__Chọn danh mục__</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->id }}" {{ old('pro_category_id',$product->pro_category_id ?? 0) == $item->id ? "selected" : "" }}>{{ $item->c_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->first('pro_category_id'))
                            <small id="emailHelp"
                                   class="form-text text-danger">{{ $errors->first('pro_category_id') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Manufacturer</label>
                        <select name="pro_manufacturer_id" class="form-control" id="">
                            @foreach($manufacturers as $item)
                                <option value="{{ $item->id }}" {{ old('pro_manufacturer_id',$product->pro_manufacturer_id ?? 0) == $item->id ? "selected" : "" }}>{{ $item->m_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="pro_description" class="form-control" id="" cols="30"
                                  rows="3">{{ old('pro_description',$product->pro_description ?? '') }}</textarea>
                        @if($errors->first('pro_description'))
                            <small id="emailHelp"
                                   class="form-text text-danger">{{ $errors->first('pro_description') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Từ khoá</label>
                        <select name="keywords[]" class="form-control js-tags" id="" multiple>
                            <option value="">__Chọn từ khoá__</option>
                            @foreach($keywords as $keyword)
                                <option value="{{ $keyword->id }}" {{ in_array($keyword->id, $keywordOld) ? "selected" : "" }}>{{ $keyword->k_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="box-header with-border">
                        <label for="exampleInputEmail1">Album ảnh</label>
                    </div>
                    <div class="box-body">
                        @if (isset($images))
                            <div class="row" style="margin-bottom: 15px;">
                                @foreach($images as $item)
                                    <div class="col-sm-2">
                                        <a href="{{ route('admin.product.delete_image', $item->id) }}"
                                           style="display: block;">
                                            <img src="{{ pare_url_file($item->pi_slug) }}"
                                                 style="width: 100%;height: auto">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="file-loading">
                                <input id="images" type="file" name="file[]" multiple class="file"
                                       data-overwrite-initial="false" data-min-file-count="0">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Content</label>
                        <textarea name="pro_content" class="form-control" id="content" cols="30"
                                  rows="3">{{ old('pro_content',$product->pro_content ?? '') }}</textarea>
                        @if($errors->first('pro_content'))
                            <small id="emailHelp"
                                   class="form-text text-danger">{{ $errors->first('pro_content') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class=" p-3">
                    <div class="box-header with-border">
                        <label for="exampleInputEmail1">Cấu hình sản phẩm</label>
                        <div class="" id="wrap-row-menu">
                            @if (isset($product) && $configuration =  json_decode($product->pro_configuration, true))
                                @foreach($configuration['key'] ?? [] as $key => $value)
                                <div class="row row-menu {{ $key == 0 ? 'row-menu-temple' : '' }}" style="margin-top: 10px;">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="pro_configuration[key][]"
                                               value="{{ $value }}" placeholder="Màn hình">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pro_configuration[value][]"
                                               value="{{ $configuration['value'][$key] }}" placeholder="OLED6.7Super Retina XDR">
                                    </div>
                                    <div class="col-md-2 action-row-menu {{ $key == 0 ? 'hide' : '' }}">
                                        <div class="form-group">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-remove"><i class="fa fa-trash"></i>  </a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-move-up"><i class="fa fa-arrow-up"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-move-down"><i class="fa fa-arrow-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="row row-menu row-menu-temple" style="margin-top: 10px;">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="pro_configuration[key][]"
                                               value="" placeholder="Màn hình">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="pro_configuration[value][]"
                                               value="" placeholder="OLED6.7Super Retina XDR">
                                    </div>
                                    <div class="col-md-2 action-row-menu hide">
                                        <div class="form-group">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-remove"><i class="fa fa-trash"></i>  </a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-move-up"><i class="fa fa-arrow-up"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-default btn-move-down"><i class="fa fa-arrow-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="margin-top: 10px;"><a href="javascript:;void(0)" id="copy_menu">Thêm mới</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="p-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" class="form-control" name="pro_price"
                               value="{{ old('pro_price',$product->pro_price ?? 0) }}">
                        @if($errors->first('pro_price'))
                            <small id="emailHelp"
                                   class="form-text text-danger">{{ $errors->first('pro_price') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sale</label>
                        <input type="number" min="0" max="50" class="form-control" name="pro_sale"
                               value="{{ old('pro_sale',$product->pro_sale ?? 0) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Number</label>
                        <input type="text" class="form-control" name="pro_number"
                               value="{{ old('pro_number',$product->pro_number ?? 0) }}">
                        @if($errors->first('pro_number'))
                            <small id="emailHelp"
                                   class="form-text text-danger">{{ $errors->first('pro_number') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="pro_hot" value="0"
                                   {{ ($product->pro_hot ?? 0) == 0 ? "checked" : "" }}  class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Mặc định</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="pro_hot" value="1"
                                   {{ ($product->pro_hot ?? 0) == 1 ? "checked" : "" }} class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Nổi bật</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" id="customFile"
                                   name="pro_avatar">
                            <label class="custom-file-label" for="customFile">Chọn ảnh từ máy của bạn</label>
                        </div>
                        @if(isset($product) && $product->pro_avatar)
                            <img src="{{ pare_url_file($product->pro_avatar) }}" alt="" class="img-thumbnail"
                                 style="width: 100%;height: auto;max-width: 100%;margin-top: 15px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Xử lý thông tin</button>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
      rel="stylesheet" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"
        type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"
        type="text/javascript"></script>
{{--<script src="{{  asset('static_admin/bower_components/jquery/dist/jquery.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">

    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    CKEDITOR.replace('content', options);
</script>



