<x-default-layout>
<h2>{{__('menu.Groups')}}</h2>
<a class="btn btn-success" href="{{ route('levels.create') }}">{{__('fa.Create')}}</a>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table border="1">
    <thead>
    <tr>
        <th>#</th>
        <th>{{__('fa.Title')}}</th>
        <th>{{__('fa.Category')}}</th>
        <th>{{__('fa.Comment')}}</th>
        <th>{{__('fa.isActive')}}</th>
        <th>{{__('fa.order')}}</th>
        <th>{{__('fa.Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($levels as $level)
        <tr>
            <td>{{ $level->id }}</td>
            <td>{{ $level->title }}</td>
            <td>{{ $level->group->title }}</td>
            <td>{{ $level->comment }}</td>
            <td>{{ $level->is_active }}</td>
            <td>{{ $level->order }}</td>
            <td>
                <form action="{{ route('levels.destroy',$level->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('levels.create').'/'.$level->id }}">{{__('fa.Edit')}}</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{__('fa.Delete')}}</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </x-default-layout>
