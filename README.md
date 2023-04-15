# Training-app

Training-app は行った筋トレの内容を記録し、トレーニング結果を見ることができます。

# DEMO

![training-app](https://user-images.githubusercontent.com/123351457/232206787-9cbcaae9-a42f-4219-a881-c6a73e009e96.gif)

# Features

Training-app ではトレーニングを行った部位、メニューごとにカレンダーでわかるようになっています。
また、直近 2 週間のトレーニング結果をグラフで見ることができます。

# Requirement

-   php 8.0.2
-   laravel 9.19
-   bootstrap 5.2.3
-   chart.js 3.5.1
-   jquery 3.6.1

# Installation

1.リポジトリのクローン

```bash
$ git clone https://github.com/saka-git/laravel-training-app.git
```

2.ライブラリのインストール

```bash
$ composer install
$ npm install
```

3..env ファイルの修正

```bash
APP_NAME=Training-app
DB_DATABASE=laravel_training_app
DB_PASSWORD=root
DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
```

4.データベースの作成

phpMyAdmin で laravel_todo_app という名前のデータベースを作成

5.マイグレーション

```bash
$ php artisan migrate
```

6.シーディング

```bash
$ php artisan db:seed --class=TrainingCategoriesTableSeeder
$ php artisan db:seed --class=TrainingMenusTableSeeder
```

# Usage

## ホームページ

-   +トレーニングのボタンから行ったトレーニングを入力
-   最新のトレーニング結果が表示される
-   カレンダーにはトレーニングを行った日付に色がつく

## Training ページ

-   +トレーニングメニューからトレーニングメニューを追加できる
-   トレーニング結果に従って、カレンダーとグラフが表示される
-   部位やメニューを選ぶことにより、ソートすることができる

# Future features

-   [ ] グループ機能および共有機能
-   [ ] グラフの期間の変更機能
-   [ ] メニューの理論削除機能の追加
-   [ ] materialize によるデザイン変更

# Author

-   作成者 坂本竜也
-   E-mail sakamoto.tatsuya1997a@gmail.com

# License

"Training-app" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).
