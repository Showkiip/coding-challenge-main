<div class="my-2 shadow  text-white bg-dark p-1" id="">
    <div class="row d-flex justify-content-between">

        @foreach ($suggestions as $item)
            <div class="col-md-8">
                <table class="ms-1">
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle"> - </td>
                    <td class="align-middle">{{ $item->email }}</td>
                    <td class="align-middle">
                </table>
            </div>
            <div class="col-md-4 mt-3" style="text-align:right">
                <button id="create_request_btn_" class="btn btn-primary me-1"
                    onclick="sendRequest('{{ auth()->user()->id }}','{{ $item->id }}')">Connect</button>
            </div>
        @endforeach

    </div>
</div>


<div id="skeleton" class="d-none">
    @for ($i = 0; $i < 10; $i++)
        <x-skeleton />
    @endfor
</div>

{{-- <span class="fw-bold">"Load more"-Button</span> --}}
<div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
    <button class="btn btn-primary" onclick="getMoreSuggestions('{{$suggestions->count()}}')" id="load_more_btn">Load more</button>
</div>
