@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Подарки/Правка</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="{{ route('administrator.product.update',$data['id']) }}">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Название</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{old('title')?old('title'):$data['title']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Категория</label>
                                <div class="col-md-6">
                                    <select name="id_cat" class="form-control">
                                        <option>Выберите категорию</option>
                                        @if($category):
                                            @foreach($category as $one)
                                                @if($one->id == $data->id_cat)
                                                    <option value="{{$one->id}}" selected>{{$one->title}}</option>
                                                    <?php continue?>
                                                @endif
                                                <option value="{{$one->id}}">{{$one->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Цена</label>
                                <div class="col-md-6">
                                     <div class="input-group">
                                         <input type="number" class="form-control" name="price" value="{{old('price')?old('price'):$data['price']}}">
                                         <span class="input-group-addon">сом</span>
                                     </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Состав</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="consist">{{old('consist')?old('consist'):$data['consist']}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Описание</label>
                                <div class="col-md-6">
                                    <textarea name="desc" class="form-control">{{old('desc')?old('desc'):$data['desc']}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Упаковка</label>
                                <div class="col-md-6">
                                    <textarea name="boxing" class="form-control">{{old('boxing')?old('boxing'):$data['boxing']}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Размер</label>
                                <div class="col-md-6">
                                    <input name="size" type="text" class="form-control" value="{{old('size')?old('size'):$data['size']}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Вес</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input name="weight" type="number" class="form-control" value="{{old('weight')?old('weight'):$data['weight']}}">
                                        <span class="input-group-addon"> кг.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Срок изготовления</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input name="prod_time" type="number" class="form-control" value="{{old('prod_time')?old('prod_time'):$data['prod_time']}}">
                                        <span class="input-group-addon">день</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Сохранить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection