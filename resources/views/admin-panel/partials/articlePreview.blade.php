<tr class="article-preview">
  <td>
    <a href="{{route('articles.show', [
      'article' => $article->id,
      'slug'    => $article->slug])
    }}">
      {{$article->title}}
    </a>
  </td>
  <td>{{$article->slug}}</td>
  <td>
    {{$article->is_published ? 'Published' : 'Not Published'}}
  </td>
  <td>{{$article->published_at}}</td>
  <td>{{$article->created_at}}</td>
  <td>{{$article->updated_at}}</td>

  <td>
    <a href="{{route('admin-panel.articles.edit', ['article' => $article->id])}}">
      Edit
    </a>
  </td>
  <td>
      <a href="{{route('admin-panel.articles.destroy', ['article' => $article->id])}}">
        Delete
      </a>
    </td>
</tr>
