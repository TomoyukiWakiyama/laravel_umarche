<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    //
    public function showServiceProviderTest()
    {
        $encrypt = app()->make('encrypter');
        $password = $encrypt -> encrypt('password');

        $sample = app()->make('serviceProviderTest');
        dd($sample ,$password, $encrypt -> decrypt($password));
    }
    public function showServiceContainerTest()
    {
        app()->bind('lifeCycleTest', function(){
            return 'ライフサイクルテスト';
        });

        $test = app()->make('lifeCycleTest');

        // サービスコンテナなしで記述する場合
        // $message = new Message();
        // $sample = new Sample($message);
        // $sample->run();

        // サービスコンテナを使用する場合
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample');
        $sample->run();
        dd($test ,app());
    }
}

class Sample
{
    // $messageの変数を宣言する
    public $message;
    // 初期化した際の実行内容を記載する
    public function __construct(Message $message)
    {
        // メッセージクラスを入れて使えるようにする
        $this -> message = $message;
    }
    public function run()
    {
        // メッセージクラスのsendメソッドを呼び出す
        $this -> message -> send();
    }
}

class Message
{
    public function send()
    {
        // Messageクラスのsendメソッドでエコーを実行する
        echo('メッセージ表示 Message>send');
    }
}
