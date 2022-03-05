@php
if($type==='shops'){
    $path = 'storage/shops/';
}
if($type==='products'){
    $path = 'storage/products/';
}
@endphp
<div>
    @if (empty($fileName))
        <img src="{{asset('images/no_image.jpg')}}" alt="画像が設定されていません">
    @else
        <img src="{{ asset($path . $fileName) }}">
    @endif
</div>