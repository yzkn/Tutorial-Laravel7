# Tutorial-Laravel7

---

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
$ laravel new Tutorial-Laravel7 --auth --force
```

```
Crafting application...
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
Package operations: 94 installs, 0 updates, 0 removals
  - Installing doctrine/inflector (1.3.1): Downloading (100%)
  - Installing doctrine/lexer (1.2.0): Downloading (100%)
  - Installing dragonmantank/cron-expression (v2.3.0): Downloading (100%)
  - Installing voku/portable-ascii (1.4.8): Downloading (100%)
  - Installing symfony/polyfill-ctype (v1.14.0): Downloading (100%)
  - Installing phpoption/phpoption (1.7.2): Downloading (100%)
  - Installing vlucas/phpdotenv (v4.1.1): Downloading (100%)
  - Installing symfony/css-selector (v5.0.5): Downloading (100%)
  - Installing tijsverkoyen/css-to-inline-styles (2.2.2): Downloading (100%)
  - Installing symfony/polyfill-mbstring (v1.14.0): Downloading (100%)
  - Installing symfony/var-dumper (v5.0.5): Downloading (100%)
  - Installing symfony/routing (v5.0.5): Downloading (100%)
  - Installing symfony/process (v5.0.5): Downloading (100%)
  - Installing symfony/polyfill-php72 (v1.14.0): Downloading (100%)
  - Installing symfony/polyfill-intl-idn (v1.14.0): Downloading (100%)
  - Installing symfony/mime (v5.0.5): Downloading (100%)
  - Installing symfony/polyfill-php73 (v1.14.0): Downloading (100%)
  - Installing symfony/http-foundation (v5.0.5): Downloading (100%)
  - Installing psr/event-dispatcher (1.0.0): Downloading (100%)
  - Installing symfony/event-dispatcher-contracts (v2.0.1): Downloading (100%)
  - Installing symfony/event-dispatcher (v5.0.5): Downloading (100%)
  - Installing psr/log (1.1.2): Downloading (100%)
  - Installing symfony/error-handler (v5.0.5): Downloading (100%)
  - Installing symfony/http-kernel (v5.0.5): Downloading (100%)
  - Installing symfony/finder (v5.0.5): Downloading (100%)
  - Installing psr/container (1.0.0): Loading from cache
  - Installing symfony/service-contracts (v2.0.1): Downloading (100%)
  - Installing symfony/console (v5.0.5): Downloading (100%)
  - Installing symfony/polyfill-iconv (v1.14.0): Downloading (100%)
  - Installing egulias/email-validator (2.1.17): Downloading (100%)
  - Installing swiftmailer/swiftmailer (v6.2.3): Downloading (100%)
  - Installing paragonie/random_compat (v9.99.99): Downloading (100%)
  - Installing ramsey/uuid (3.9.3): Downloading (100%)
  - Installing psr/simple-cache (1.0.1): Downloading (100%)
  - Installing opis/closure (3.5.1): Downloading (100%)
  - Installing symfony/translation-contracts (v2.0.1): Downloading (100%)
  - Installing symfony/translation (v5.0.5): Downloading (100%)
  - Installing nesbot/carbon (2.31.0): Downloading (100%)
  - Installing monolog/monolog (2.0.2): Downloading (100%)
  - Installing league/flysystem (1.0.64): Downloading (100%)
  - Installing league/commonmark (1.3.1): Downloading (100%)
  - Installing laravel/framework (v7.0.2): Downloading (100%)
  - Installing fideloper/proxy (4.3.0): Downloading (100%)
  - Installing asm89/stack-cors (1.3.0): Downloading (100%)
  - Installing fruitcake/laravel-cors (v1.0.4): Downloading (100%)
  - Installing ralouphie/getallheaders (3.0.3): Loading from cache
  - Installing psr/http-message (1.0.1): Loading from cache
  - Installing guzzlehttp/psr7 (1.6.1): Loading from cache
  - Installing guzzlehttp/promises (v1.3.1): Loading from cache
  - Installing guzzlehttp/guzzle (6.5.2): Downloading (100%)
  - Installing jakub-onderka/php-console-color (v0.2): Downloading (100%)
  - Installing nikic/php-parser (v4.3.0): Downloading (100%)
  - Installing jakub-onderka/php-console-highlighter (v0.4): Downloading (100%)
  - Installing dnoegel/php-xdg-base-dir (v0.1.1): Downloading (100%)
  - Installing psy/psysh (v0.9.12): Downloading (100%)
  - Installing laravel/tinker (v2.2.0): Downloading (100%)
  - Installing laravel/ui (v2.0.1): Downloading (100%)
  - Installing scrivo/highlight.php (v9.18.1.1): Downloading (100%)
  - Installing filp/whoops (2.7.1): Downloading (100%)
  - Installing facade/ignition-contracts (1.0.0): Downloading (100%)
  - Installing facade/flare-client-php (1.3.2): Downloading (100%)
  - Installing facade/ignition (2.0.0): Downloading (100%)
  - Installing fzaninotto/faker (v1.9.1): Downloading (100%)
  - Installing hamcrest/hamcrest-php (v2.0.0): Downloading (100%)
  - Installing mockery/mockery (1.3.1): Downloading (100%)
  - Installing nunomaduro/collision (v4.1.2): Downloading (100%)
  - Installing webmozart/assert (1.7.0): Downloading (100%)
  - Installing phpdocumentor/reflection-common (2.0.0): Downloading (100%)
  - Installing phpdocumentor/type-resolver (1.1.0): Downloading (100%)
  - Installing phpdocumentor/reflection-docblock (5.1.0): Downloading (100%)
  - Installing phpunit/php-token-stream (3.1.1): Downloading (100%)
  - Installing sebastian/version (2.0.1): Downloading (100%)
  - Installing sebastian/type (1.1.3): Downloading (100%)
  - Installing sebastian/resource-operations (2.0.1): Downloading (100%)
  - Installing sebastian/recursion-context (3.0.0): Downloading (100%)
  - Installing sebastian/object-reflector (1.1.1): Downloading (100%)
  - Installing sebastian/object-enumerator (3.0.3): Downloading (100%)
  - Installing sebastian/global-state (3.0.0): Downloading (100%)
  - Installing sebastian/exporter (3.1.2): Downloading (100%)
  - Installing sebastian/environment (4.2.3): Downloading (100%)
  - Installing sebastian/diff (3.0.2): Downloading (100%)
  - Installing sebastian/comparator (3.0.2): Downloading (100%)
  - Installing phpunit/php-timer (2.1.2): Downloading (100%)
  - Installing phpunit/php-text-template (1.2.1): Downloading (100%)
  - Installing phpunit/php-file-iterator (2.0.2): Downloading (100%)
  - Installing theseer/tokenizer (1.1.3): Downloading (100%)
  - Installing sebastian/code-unit-reverse-lookup (1.0.1): Downloading (100%)
  - Installing phpunit/php-code-coverage (7.0.10): Downloading (100%)
  - Installing doctrine/instantiator (1.3.0): Downloading (100%)
  - Installing phpspec/prophecy (v1.10.2): Downloading (100%)
  - Installing phar-io/version (2.0.1): Downloading (100%)
  - Installing phar-io/manifest (1.0.3): Downloading (100%)
  - Installing myclabs/deep-copy (1.9.5): Downloading (100%)
  - Installing phpunit/phpunit (8.5.2): Downloading (100%)
voku/portable-ascii suggests installing ext-intl (Use Intl for transliterator_transliterate() support)
symfony/var-dumper suggests installing ext-intl (To show region name in time zone dump)
symfony/routing suggests installing doctrine/annotations (For using the annotation loader)
symfony/routing suggests installing symfony/config (For using the all-in-one router or any loader)
symfony/routing suggests installing symfony/expression-language (For using expression matching)
symfony/routing suggests installing symfony/yaml (For using the YAML loader)
symfony/polyfill-intl-idn suggests installing ext-intl (For best performance)
symfony/event-dispatcher suggests installing symfony/dependency-injection
symfony/http-kernel suggests installing symfony/browser-kit
symfony/http-kernel suggests installing symfony/config
symfony/http-kernel suggests installing symfony/dependency-injection
symfony/service-contracts suggests installing symfony/service-implementation
symfony/console suggests installing symfony/lock
egulias/email-validator suggests installing ext-intl (PHP Internationalization Libraries are required to use the SpoofChecking validation)
swiftmailer/swiftmailer suggests installing ext-intl (Needed to support internationalized email addresses)
swiftmailer/swiftmailer suggests installing true/punycode (Needed to support internationalized email addresses, if ext-intl is not installed)
paragonie/random_compat suggests installing ext-libsodium (Provides a modern crypto API that can be used to generate random bytes.)
ramsey/uuid suggests installing ext-libsodium (Provides the PECL libsodium extension for use with the SodiumRandomGenerator)
ramsey/uuid suggests installing ext-uuid (Provides the PECL UUID extension for use with the PeclUuidTimeGenerator and PeclUuidRandomGenerator)
ramsey/uuid suggests installing moontoast/math (Provides support for converting UUID to 128-bit integer (in string form).)
ramsey/uuid suggests installing paragonie/random-lib (Provides RandomLib for use with the RandomLibAdapter)
ramsey/uuid suggests installing ramsey/uuid-console (A console application for generating UUIDs with ramsey/uuid)
ramsey/uuid suggests installing ramsey/uuid-doctrine (Allows the use of Ramsey\Uuid\Uuid as Doctrine field type.)
symfony/translation suggests installing symfony/config
symfony/translation suggests installing symfony/yaml
monolog/monolog suggests installing aws/aws-sdk-php (Allow sending log messages to AWS services like DynamoDB)
monolog/monolog suggests installing doctrine/couchdb (Allow sending log messages to a CouchDB server)
monolog/monolog suggests installing elasticsearch/elasticsearch (Allow sending log messages to an Elasticsearch server via official client)
monolog/monolog suggests installing ext-amqp (Allow sending log messages to an AMQP server (1.0+ required))
monolog/monolog suggests installing ext-mongodb (Allow sending log messages to a MongoDB server (via driver))
monolog/monolog suggests installing graylog2/gelf-php (Allow sending log messages to a GrayLog2 server)
monolog/monolog suggests installing mongodb/mongodb (Allow sending log messages to a MongoDB server (via library))
monolog/monolog suggests installing php-amqplib/php-amqplib (Allow sending log messages to an AMQP server using php-amqplib)
monolog/monolog suggests installing php-console/php-console (Allow sending log messages to Google Chrome)
monolog/monolog suggests installing rollbar/rollbar (Allow sending log messages to Rollbar)
monolog/monolog suggests installing ruflin/elastica (Allow sending log messages to an Elastic Search server)
league/flysystem suggests installing league/flysystem-aws-s3-v2 (Allows you to use S3 storage with AWS SDK v2)
league/flysystem suggests installing league/flysystem-aws-s3-v3 (Allows you to use S3 storage with AWS SDK v3)
league/flysystem suggests installing league/flysystem-azure (Allows you to use Windows Azure Blob storage)
league/flysystem suggests installing league/flysystem-cached-adapter (Flysystem adapter decorator for metadata caching)
league/flysystem suggests installing league/flysystem-eventable-filesystem (Allows you to use EventableFilesystem)
league/flysystem suggests installing league/flysystem-rackspace (Allows you to use Rackspace Cloud Files)
league/flysystem suggests installing league/flysystem-sftp (Allows you to use SFTP server storage via phpseclib)
league/flysystem suggests installing league/flysystem-webdav (Allows you to use WebDAV storage)
league/flysystem suggests installing league/flysystem-ziparchive (Allows you to use ZipArchive adapter)
league/flysystem suggests installing spatie/flysystem-dropbox (Allows you to use Dropbox storage)
league/flysystem suggests installing srmklive/flysystem-dropbox-v2 (Allows you to use Dropbox storage for PHP 5 applications)
laravel/framework suggests installing aws/aws-sdk-php (Required to use the SQS queue driver, DynamoDb failed job storage and SES mail driver (^3.0).)
laravel/framework suggests installing doctrine/dbal (Required to rename columns and drop SQLite columns (^2.6).)
laravel/framework suggests installing ext-memcached (Required to use the memcache cache driver.)
laravel/framework suggests installing ext-pcntl (Required to use all features of the queue worker.)
laravel/framework suggests installing ext-posix (Required to use all features of the queue worker.)
laravel/framework suggests installing ext-redis (Required to use the Redis cache and queue drivers.)
laravel/framework suggests installing league/flysystem-aws-s3-v3 (Required to use the Flysystem S3 driver (^1.0).)
laravel/framework suggests installing league/flysystem-cached-adapter (Required to use the Flysystem cache (^1.0).)
laravel/framework suggests installing league/flysystem-sftp (Required to use the Flysystem SFTP driver (^1.0).)
laravel/framework suggests installing moontoast/math (Required to use ordered UUIDs (^1.1).)
laravel/framework suggests installing nyholm/psr7 (Required to use PSR-7 bridging features (^1.2).)
laravel/framework suggests installing pda/pheanstalk (Required to use the beanstalk queue driver (^4.0).)
laravel/framework suggests installing pusher/pusher-php-server (Required to use the Pusher broadcast driver (^4.0).)
laravel/framework suggests installing symfony/cache (Required to PSR-6 cache bridge (^5.0).)
laravel/framework suggests installing symfony/psr-http-message-bridge (Required to use PSR-7 bridging features (^2.0).)
laravel/framework suggests installing wildbit/swiftmailer-postmark (Required to use Postmark mail driver (^3.0).)
guzzlehttp/psr7 suggests installing zendframework/zend-httphandlerrunner (Emit PSR-7 responses)
guzzlehttp/guzzle suggests installing ext-intl (Required for Internationalized Domain Name (IDN) support)
psy/psysh suggests installing ext-pcntl (Enabling the PCNTL extension makes PsySH a lot happier :))
psy/psysh suggests installing ext-pdo-sqlite (The doc command requires SQLite to work.)
psy/psysh suggests installing ext-posix (If you have PCNTL, you'll want the POSIX extension as well.)
psy/psysh suggests installing hoa/console (A pure PHP readline implementation. You'll want this if your PHP install doesn't already support readline or libedit.)
filp/whoops suggests installing whoops/soap (Formats errors as SOAP responses)
facade/ignition suggests installing laravel/telescope (^2.0)
sebastian/global-state suggests installing ext-uopz (*)
sebastian/environment suggests installing ext-posix (*)
phpunit/php-code-coverage suggests installing ext-xdebug (^2.7.2)
phpunit/phpunit suggests installing ext-soap (*)
phpunit/phpunit suggests installing ext-xdebug (*)
phpunit/phpunit suggests installing phpunit/php-invoker (^2.0.0)
Generating optimized autoload files
> @php -r "file_exists('.env') || copy('.env.example', '.env');"
> @php artisan key:generate --ansi
Application key set successfully.
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover --ansi
Discovered Package: facade/ignition
Discovered Package: fideloper/proxy
Discovered Package: fruitcake/laravel-cors
Discovered Package: laravel/tinker
Discovered Package: laravel/ui
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Package manifest generated successfully.
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

---

Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
