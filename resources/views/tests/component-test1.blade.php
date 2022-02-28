<x-tests.app><!-- どのコンポーネントを使うかファイル名で指定している -->
    <x-slot name="header">
        ヘッダー１
    </x-slot>
コンポーネントテスト１
    <x-tests.card title="カードタイトル"
                  content="カードコンテント"
                  :message="$message" />
</x-tests.app><!-- どのコンポーネントを使うかファイル名で指定している -->