# DMS / 納期管理システム

<img width="1680" alt="スクリーンショット 2023-12-06 10 58 22" src="https://github.com/Y-A0403/Portfolio/assets/138664273/0fdc58b9-ce46-46a1-9a7b-7dd5335fec30">

## サービス概要
DMSは、製造業などの大量の製品、注文がある中で管理者や一般の社員が納期を確認しやすくして、納期遅れなどをなくしたいという自身の経験から作りました。是非ご覧になってください。

## DMS（サイトリンク）
http://dms-aws-maron.com/login

管理者ユーザーでログインしてください。

メールアドレス　user@user.com

パスワード　password1111

## 内容詳細

・LaravelとVue.js(JavaScript)を使用したCRUD処理

・インフラ構成
    AWS(EC2 RDS Route53)
    
・環境構築
    開発環境　Laravel sail
    本番環境　DockerCompose

・実際の開発を意識して作業用のブランチを作成してプルリクとマージを実施

## バージョン管理

・Git（GitHub）

## 環境

・PHP8.1　・Laravel10.1　・mysql8.0　・Inertia.js(JavaScript)

・Docker　・DockerCompose　・nginx1.12

## 機能・画面

・アカウント、パスワードの登録、編集、削除

・管理者ページと一般ページの差別化（注文管理、製品管理、顧客管理は管理者ページのみ表示）

・ログイン、ログアウト

・注文、製品、顧客の表示、登録、編集、削除

・検索機能(注文ページと製品ページは製品名、顧客ページは顧客名から検索可能)

・お知らせ機能（注文で登録した納期が現在の日付から1週間以内になった未完成の注文がある場合にお知らせページに注文内容を表示させる）

<img width="1680" alt="スクリーンショット 2023-12-06 10 59 05" src="https://github.com/Y-A0403/Portfolio/assets/138664273/9192815f-3d92-48c2-9309-cc60ae7038a3">

・ページネーション

・レスポンシブ対応
