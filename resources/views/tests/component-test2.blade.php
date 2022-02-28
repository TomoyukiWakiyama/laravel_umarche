<x-tests.app>
    <x-slot name="header">
        ヘッダー２
    </x-slot>
コンポーネントテスト２
    <x-test-class-base classBaseMessage="クラスベースにbladeからメッセージを差し込んでいます。" />
    <div class="mb-4"></div>
    <x-test-class-base classBaseMessage="クラスベースにbladeからメッセージを差し込んでいます。" defaultMessage="デフォルトメッセージから変更しています。" />
</x-tests.app>