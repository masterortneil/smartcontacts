@props(['status'])

@if ($status)
    <div {{$attributes->merge(['class' => 'bg-green-100 border-l-4 border-green-500 text-green-600 p-4 m-10'])}} >
        <p class="font-bold">Success</p>
        <p> {{ $status }}</p>
    </div>

@endif
