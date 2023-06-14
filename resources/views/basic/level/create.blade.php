<x-default-layout>
<h2>{{__('menu.Groups')}}</h2>
<a class="btn btn-success" href="{{ route('levels.index') }}">{{__('fa.Back')}}</a>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (isset($level))
    <form action="{{ route('levels.update', $level->id)}}" method="post">
    @method('PUT')
@else
    <form action="{{ route('levels.store')}}" method="post">
    @endif
    @csrf
        <label>{{__('fa.Title')}}</label><input name="title" value="{{ old('title', $level->title ?? '') }}"><br>
        <label>{{__('fa.Comment')}}</label><input name="comment"  value="{{ old('comment', $level->comment ?? '') }}"><br>
        <label>{{__('fa.isActive')}}</label><input name="is_active"  value="{{ old('is_active', $level->is_active ?? '') }}"><br>
        <label>{{__('fa.isFree')}}</label><input name="is_free"  value="{{ old('is_active', $level->is_active ?? '') }}"><br>
        <label>{{__('fa.order')}}</label><input name="order"  value="{{ old('order', $level->order ?? '') }}"><br>
        <label>{{__('fa.Group')}}</label>
            <select name="group">
                        <option value=""></option>
                @foreach ($groups as $group)
                    @if($group->id == old('category',$level->group_id?? ''))
                        <option selected value="{{ $group->id }}">{{ $group->title }}</option>
                    @else
                        <option value="{{ $group->id }}">{{ $group->title }}</option>
                    @endif

                @endforeach
            </select><br>
    <input type="submit" value="{{__('fa.Save')}}">
</form>
</x-default-layout>
