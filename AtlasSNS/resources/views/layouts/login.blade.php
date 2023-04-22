<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!-- jQuery -->
    <script src="js/jquery-3.6.1.min.js"></script>
</head>
<body>
    <!-- jQuery file-->
    <script src="js/script.js"></script>
    <!-- content -->
    <header>
        <div id = "header_block">
            <!-- ヘッダーロゴ -->
            <div class="header_logo">
                <!-- <h1> -->
                    <a href="/top"><img src="{{ asset('images\atlas.png')}}"></a>
                <!-- </h1> -->
            </div>
            <!-- アコーディオンメニュー -->
            <div class="accordion_menu">
                    <!-- クリックイベントを設定するボタン -->
                    <p class="js_btn">{{ Auth::user()->username }}さん</p>
                    <!-- 開閉する要素 -->
                    <ul class="menu">
                        <li class="menu_item"><a href="/top" class="menu_link">HOME</a></li>
                        <li class="menu_item"><a href="/profile" class="menu_link">プロフィール編集</a></li>
                        <li class="menu_item"><a href="/logout" method="get" class="menu_link">ログアウト</a></li>
                    </ul>
            </div>
            <!-- ヘッダーアイコン -->
            <a class="header_item"><img src="{{ asset('storage/images/'. Auth::user()->images) }}" class="icon"></a>
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="side_username side-font">{{ Auth::user()->username }}さんの</p>
                <div class="count">
                    <p class="side-font">フォロー数</p>
                    <!-- ログイン情報 -> Userモデルのfollowsメソッド -> 情報を取得 -> 情報の数を数える -->
                    <p class="side-font side-count">{{ Auth::user()->follows()->get()->count() }}人</p>
                </div>
                <p class=" btn_list"><a href="/followList" class="btn">フォローリスト</a></p>
                <div class="count">
                    <p class="side-font">フォロワー数</p>
                    <p class="side-font side-count">{{ Auth::user()->followers()->get()->count() }}人</p>
                </div>
                <p class=" btn_list"><a href="/followerList" class="btn">フォロワーリスト</a></p>
            </div>
            <p class=" btn_hover btn_search"><a href="/search" class=" btn">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <!-- <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script> -->
</body>
</html>
