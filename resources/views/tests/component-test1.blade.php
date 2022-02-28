<x-tests.app><!-- どのコンポーネントを使うかファイル名で指定している -->
    <x-slot name="header">
        ヘッダー１
    </x-slot>
コンポーネントテスト１
    <x-tests.card title="カードタイトル1"
                  content="カードコンテント"
                  :message="$message" />
    <x-tests.card title="カードタイトル2"
                  />
</x-tests.app><!-- どのコンポーネントを使うかファイル名で指定している -->