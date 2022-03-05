<div>
    @if (empty($fileName))
        <img src="{{asset('images/no_image.jpg')}}" alt="画像が設定されていません">
    @else
        <img src="{{ asset('storage/shops/' . $fileName) }}" alt="店舗画像">
    @endif
</div>