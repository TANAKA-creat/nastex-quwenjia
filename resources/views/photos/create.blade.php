<x-layout>
  <x-slot name="title">
      画像投稿 - 業務報告
  </x-slot>

<div class="back-link">
  <a href="{{ route('posts.index' )}}">&laquo; トップページに戻る</a>
  <a href="{{ route('photos.show' )}}">&laquo; 画像集に移動する</a>
</div>

<h1>画像投稿ページ</h1>
<div class="form-group">
  <form method="POST" action="{{ route('photos.store')}}" enctype="multipart/form-data">
    @csrf
    <label>
      <input type="string" name="name" class="typing_place" placeholder="photoイメージ・日付等" value="{{ old('name')}}">
    </label>
    <label>
      <input type="file" name="image">
    </label>
    <label>
      <button type="submit" class="btn btn-primary btn-sm shadow-sm">投稿</button>
    </label>
  </form>
</div>

</x-layout>