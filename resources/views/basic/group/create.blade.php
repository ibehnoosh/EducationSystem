<x-default-layout>
<h2>{{__('menu.Groups')}}</h2>
<a class="btn btn-success" href="{{ route('groups.index') }}">{{__('fa.Back')}}</a>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (isset($group))
    <form action="{{ route('groups.update', $group->id)}}" method="post">
    @method('PUT')
@else
    <form action="{{ route('groups.store')}}" method="post">
    @endif
    @csrf
        <label>{{__('fa.Title')}}</label><input name="title" value="{{ old('title', $group->title ?? '') }}"><br>
        <label>{{__('fa.Comment')}}</label><input name="comment"  value="{{ old('comment', $group->comment ?? '') }}"><br>
        <label>{{__('fa.isActive')}}</label><input name="is_active"  value="{{ old('is_active', $group->is_active ?? '') }}"><br>
        <label>{{__('fa.order')}}</label><input name="order"  value="{{ old('order', $group->order ?? '') }}"><br>
        <label>{{__('fa.Category')}}</label>
            <select name="category">
                        <option value=""></option>
                @foreach ($categories as $category)
                    @if($category->id == old('category',$group->category_id?? ''))
                        <option selected value="{{ $category->id }}">{{ $category->title }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endif

                @endforeach
            </select><br>
    <input type="submit" value="{{__('fa.Save')}}">
</form>
</x-default-layout>
