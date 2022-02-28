@props([
    'title' => 'titleの値が設定されておりません。',
    'content' => 'contentの値が設定されておりません。',
    'message' => 'messageの値が設定されておりません。',
    ]);
<div class="border-2 shadow-md w-1/4 p-2">
    <div>{{ $title }}</div>
    <div>画像</div>
    <div>{{ $content }}</div>
    <div>{{ $message }}</div>
</div>