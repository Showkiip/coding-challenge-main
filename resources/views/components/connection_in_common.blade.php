
@foreach ($connectionInCommon as $item)
<div class="p-2 shadow rounded mt-2  text-white bg-dark">{{ $item->user->name }} -
    {{ $item->user->email }}</div>
@endforeach

