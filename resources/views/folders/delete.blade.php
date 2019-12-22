@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">本当に削除しますか？</div>
          <div class="panel-body">
            <form action="{{ route('folders.delete', ['id' => $folder->id,]) }}" method="post">
              @csrf
              <div class="form-group">
                <label for="title">フォルダ名</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $folder->title }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-danger">削除</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
