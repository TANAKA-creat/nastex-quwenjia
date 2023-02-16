<x-layout>
  <x-slot name="title">
    @foreach($posts as $post)
      {{ $post->title }} - 業務報告
    @endforeach
  </x-slot>

<div class="back-link">
  <a href="{{ route('posts.index') }}">&laquo; トップページに戻る</a>
  <a href="{{ route('photos.create') }}">&laquo; 投稿ページに移動する</a>
</div>

<h1>画像集</h1>

<table border="2" style="solid black 2px">
  <thead>
    <tr>
      <th class="column">画像イメージ・日付等</th>
      <th class="column">投稿画像</th>
      <th class="column">編集</th>
      <th class="column">削除</th>
    </tr>
  </thead>
  <tbody>
    @foreach($photos as $photo)
    <tr>
      <td class="column">{{ $photo->name}}</td>
      <td class="column"><img src="{{ asset('storage/images/' . $photo->image) }}"></td>
      <td class="column"><a href="/photos/edit/{{ $photo->id}}">編集</a></td>
      <td class="column">
        <form method="POST" action="{{ route('photos.destroy', $photo->id )}}" id="delete">
          @method('DELETE')
          @csrf
          <button>削除</button>
        </form>
      </td>
      @endforeach
    </tr>
  </tbody>
</table>

</x-layout>

      