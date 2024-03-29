@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Редактировать изделие</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Упр. изделиями</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          @include('admin.errors')
          {{ Form::open(['route' => ['products.update', $product->id ], 'method' => 'put']) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="productName">Имя изделия</label>
                    <input type="text" class="form-control" id="productName" name="name" value="{{$product->name}}">
                  </div>
                  <div class="form-group">
                    <label for="description">Краткое описание</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}">
                  </div>
                  <div class="form-group">
                    <label for="price">Цена себестоимости изделия</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                  </div>
                  <div class="form-group">
                    <label for="price_sale">Цена продажи изделия</label>
                    <input type="number" class="form-control" id="price_sale" name="price_sale" value="{{ $product->price_sale }}">
                  </div>
                  <div class="form-group">
                    <label for="sort">Сортировка</label>
                    <input type="number" class="form-control" id="sort" name="sort" value="{{$product->sort}}">
                  </div>
                  <div class="form-group">
                    <label>Единица измерения</label>
                    {{Form::select('measure', 
                        $measure, 
                        $product->measure, 
                        ['class' => 'form-control', 'placeholder' => 'Нет'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Заметки</label>
                    {{ Form::select('notices[]',
                      $notices,
                      $sel_notices,
                      ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Выберите заметки']
                    )}}
                  </div>
                  <div class="form-group">
                    <label>Родительская категория</label>
                    <select name="category" class="form-control">
                        <option selected="selected" value ="{{ $product->categories->id }}">{{ $product->categories->name }}</option>
                        @include('admin.parts.category', ['categories' => $categories])
                    </select>
                  </div>
                  <div class="form-group">
                    <h3>Материалы</h3>
                    @include('admin.parts.prod_mat_edit')
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        @php $product->status != null ? $status = 'checked' : $status = ''; @endphp
                        <input type="checkbox" id="checkbox" name="status" value="1" {{ $status }}>
                        <label for="checkbox">Отображение изделия</label>
                      </div>
                    </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        @php $product->popular != null ? $popular = 'checked' : $popular = ''; @endphp
                        <input type="checkbox" id="checkbox2" name="popular" value="1" {{ $popular }}>
                        <label for="checkbox2">Популярный товар</label>
                      </div>
                    </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        @php $product->action != null ? $action = 'checked' : $action = ''; @endphp
                        <input type="checkbox" id="checkbox3" name="action" value="1" {{ $action }}>
                        <label for="checkbox3">Акция</label>
                      </div>
                    </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        @php $product->hit != null ? $hit = 'checked' : $hit = ''; @endphp
                        <input type="checkbox" id="checkbox4" name="hit" value="1" {{ $hit }}>
                        <label for="checkbox4">Хит</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Редактировать изделие</button>
                </div>
          {{ Form::close() }}
        </div>
      </div>
    </section>
  </div>
  @endsection
  @section('custom_script')
  <script>
    $(function () {
        $(".select2").select2()
    })
  </script>
  @endsection

