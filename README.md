# Tutorial-Laravel7

---

## Demo

[動画](demo.mp4)

## 設定値

-   アプリケーション名: `Tutorial-Laravel7`

---

### Composer のインストール

[Composer](https://getcomposer.org/download/)から、
[Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe)をダウンロードして実行

### Laravel プロジェクトの作成

```ps
$ composer global require laravel/installer
```

```
Changed current directory to C:/Users/y/AppData/Roaming/Composer
Using version ^3.0 for laravel/installer
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 0 installs, 1 update, 0 removals
  - Updating laravel/installer (v2.2.1 => v3.0.1): Downloading (100%)
Writing lock file
Generating autoload files
```

```ps
$ cd C:\Users\y\Documents\GitHub
$ composer require laravel/helpers
$ composer require doctrine/dbal
$ laravel new Tutorial-Laravel7 --auth --force
```

```
Crafting application...

Application ready! Build something amazing.
```

```ps
$ cd .\Tutorial-Laravel7\
```

### Laravel のバージョンを確認

```ps
$ php artisan --version
```

> Laravel Framework 7.0.2

### ロケールの設定

-   config/app.php

```php
'timezone' => 'Asia/Tokyo',
'locale' => 'ja',

'faker_locale' => 'ja_JP',
```

### Database を SQLite に設定

-   .env

```
DB_CONNECTION=sqlite
```

```ps
$ php artisan migrate
```

### とりあえずサーバーを起動してみる

```ps
$ php artisan serve
```

```
Laravel development server started: http://127.0.0.1:8000
```

[http://127.0.0.1:8000](http://127.0.0.1:8000)にアクセスして動作確認する

## アイテム格納用にデータベースとモデルを作成

### マイグレーションファイルとモデル、ファクトリの生成

```ps
$ php artisan make:model Item --migration --factory
$ php artisan make:model SubItem --migration --factory
```

生成されたファイルのパスを確認、それぞれ開き、カラムを追記する

> Created Migration: 2020_03_05_084214_create_items_table
>
> Created Migration: 2020_03_05_084232_create_sub_items_table

-   `database/migrations/2020_03_05_084214_create_items_table.php`
-   `database/migrations/2020_03_05_084232_create_sub_items_table.php`

### モデルの編集

ユーザーに値を格納させないフィールドを指定する

-   `app/Item.php`
-   `app/SubItem.php`

```php
protected $guarded = array('id');
```

### マイグレーションの実行

```ps
$ php artisan migrate
```

> Migrating: 2020_03_05_084232_create_sub_items_table
>
> Migrated: 2020_03_05_084232_create_sub_items_table (0.01 seconds)

### コントローラーを作成・編集

```ps
$ php artisan make:controller ItemController --resource
$ php artisan make:controller SubItemController --resource
```

作成されたコントローラーに `use` 句を追記する

-   `app\Http\Controllers\ItemController.php`
-   `app\Http\Controllers\SubItemController.php`

### ビューを追加

-   `resources\views\item\*.blade.php`
-   `resources\views\subitem\*.blade.php`

### テストデータの挿入

ファクトリを編集

-   `database/factories/ItemFactory.php`
-   `database/factories/SubItemFactory.php`

シーダ―を作成

```ps
$ php artisan make:seeder ItemSeeder
$ php artisan make:seeder SubItemSeeder
```

-   `database/seeds/ItemSeeder.php`

```php
factory('App\Item', 10)->create(); // 追記
```

-   `database/seeds/SubItemSeeder.php`

```php
factory('App\SubItem', 10)->create(); // 追記
```

-   `database/seeds/DatabaseSeeder.php` // 追記

```php
$this->call(ItemSeeder::class);
```

シーダーを実行

```ps
$ REM 一旦DBをリセットしてからテストデータを入れる場合は右のコマンドを実行する: $ php artisan migrate:refresh
$ php artisan db:seed
```

> Seeding: ItemSeeder
>
> Seeded: ItemSeeder (0.09 seconds)
>
> Seeding: SubItemSeeder
>
> Seeded: SubItemSeeder (0.07 seconds)
>
> Database seeding completed successfully.

### とりあえずサーバーを起動してみる

```ps
$ php artisan serve
```

```
Laravel development server started: http://127.0.0.1:8000
```

[http://127.0.0.1:8000](http://127.0.0.1:8000)にアクセスして動作確認する

## 画像アップロード機能を追加する

```ps
$ php artisan make:migration add_filepath_to_subitem_table --table=sub_items
```

-   `database\migrations\2020_03_08_133427_add_filepath_to_subitem_table.php`

```
$table->string('filepath')->nullable();

$table->dropColumn('filepath');
```

```ps
$ php artisan migrate
```

ビューを更新

-   `create.blade.php`
-   `edit.blade.php`

コントローラーを更新

-   `SubItemController.php`

公開ディレクトリからアップロード先ディレクトリにシンボリックリンクを張る

```bat
$ php artisan storage:link

$ cd C:\Users\y\Documents\GitHub\Tutorial-Laravel7\public
$ mklink temp C:\Users\y\Documents\GitHub\Tutorial-Laravel7\public\storage\temp /D
$ mklink uploaded C:\Users\y\Documents\GitHub\Tutorial-Laravel7\public\storage\uploaded /D
```

## バリデーションを追加する

```ps
$ php artisan make:request ItemRequest
$ php artisan make:request SubItemRequest
```

## 検索機能を追加する

コントローラーとビューを変更する

-   `app\Http\Controllers\ItemController.php`
-   `app\Http\Controllers\SubItemController.php`
-   `resources\views\item\index.blade.php`
-   `resources\views\subitem\index.blade.php`

## ページネーションを追加する

検索機能を追加した時の 4 ファイルと、設定ファイル( `view.php` )、CSS ファイル( `custom.css` )を変更する。
CSS はページリンクの配置を中央揃えにするために使用した(th タグ等に中央揃えを指定しても効かない)

## デバッグログを記録する

## JWT 認証の API を追加する

### jwt-auth (1.0.0) をインストールする

```ps
$ composer require tymon/jwt-auth

$ php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

$ php artisan jwt:secret
```

---

Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
