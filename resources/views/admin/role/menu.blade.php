@extends('layouts.admin_base')

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{__('translates.menu')}}
        </h2>
    </div>
    <form class="flex flex-col" action="{{route('roles.menu-update', $role)}}" method="POST">
        @csrf
        @method('put')

        <div class="grid grid-cols-4 gap-6 mt-5">

                <div class="intro-y box ">
                    <div class="modal-header">
                        <div class="form-check mt-2">
                            <input class="group_head" type="checkbox"
                                   data-name="all"  {{count($rolemenus)>0?'checked':''}} > {{-- {{(count(array_intersect($permissions->where('group', $group)->pluck('id')->toArray(), $rolepermissions))>0)?'checked':''}}--}}
                            <label class="form-check-label">{{__('translates.menu')}}</label>
                        </div>
                    </div>
                    <ul class="modal-content pl-5 pt-4 h-full flex flex-col  items-start gap-2">
                        @foreach ($menus as $menu)
                            <li class="list-group-item  gap-2">
                                <input class="group_head_all" type="checkbox" name="menus[]"
                                       value="{{$menu->id}}" {{(in_array($menu->id, $rolemenus)) ? 'checked' : ''}}>
                                <label class="form-check-label">{{$menu->name}}</label>
                            </li>
                        @endforeach

                    </ul>
                </div>

        </div>
        <div class="text-right mt-5">
            <a href="{{ Session::get('prev-url') ?? URL::previous() }}"
               class="btn btn-outline-secondary w-24 mr-1 whitespace-nowrap">{{__('translates.back')}}</a>
            <button type="submit" class="btn btn-primary w-24 whitespace-nowrap">{{__('translates.save')}}</button>
        </div>

    </form>


@endsection

@section('my_own_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.group_head').on('click', function () {
                console.log("clicked");
                if ($(this).is(':checked'))
                    $('.group_head_' + $(this).data('name')).prop('checked', true);
                else
                    $('.group_head_' + $(this).data('name')).prop('checked', false);
            });
        });
    </script>

@endsection
