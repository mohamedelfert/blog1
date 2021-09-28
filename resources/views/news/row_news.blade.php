<tr>
    <td>{!! $news->id !!}</td>
    <td>{!! $news->title !!}</td>
    <td>{!! $news->desc !!}</td>
    <td>{!! $news->getUserName()->first()->name !!}</td>
    <td>{!! $news->content !!}</td>
    <td>{!! $news->status !!}</td>
    <td>{!! !empty($new->deleted_at)?'Trashed':'Published' !!}</td>
    <td>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="checkbox" name="id[]" value="{!! $news->id !!}">
    </td>
</tr>