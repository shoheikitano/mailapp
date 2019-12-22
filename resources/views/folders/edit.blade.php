@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">タイトルを編集して下さい</div>
          <div class="panel-body">
            <form action="{{ route('folders.edit', ['id' => $folder->id,]) }}" method="post">
              @csrf
              <div class="form-group">
                <label for="title">フォルダ名</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $folder->title }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-info">編集</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
