<tr>
    <td>{{ $news->id }}</td>
    <td><a href="{{url('news/' . $news->id)}}">{{ $news->title }}</a></td>
    <td>{{ $news->desc }}</td>
    <td>{{ $news->getUserName()->first()->name }}</td>
    <td>{{ $news->content }}</td>
    <td>{{ $news->status }}</td>
    <td>{{ !empty($new->deleted_at)?'Trashed':'Published' }}</td>
    <td><a href="{{url('user/delete/' . $news->add_by)}}">Delete User</a></td>
    <td>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="checkbox" name="id[]" value="{{ $news->id }}">
    </td>
</tr>