<?php

namespace App\Providers;

use App\Http\ViewComposers\UserComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //連想配列を渡す
        //キーにコンポーザーを指定し、値にビューを指定する（ワイルドカードも使える）
        //この場合、layoutsディレクトリ配下のビューテンプレートが読み込まれた場合にUserComposerを読み込む(=$userが作られる)という設定の方法
        View::composers([
            UserComposer::class => 'layouts.*'
        ]);
    }
}
