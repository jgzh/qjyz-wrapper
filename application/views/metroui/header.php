<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>

    <base href="<?php echo BASEHREF;?>"/>
    <link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/metro/3.0.14/css/metro.min.css"/>
    <link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/metro/3.0.14/css/metro-icons.min.css"/>
    <link type="text/css" rel="stylesheet" href="//cdn.bootcss.com/metro/3.0.14/css/metro-responsive.min.css"/>
    <style>
        body, h1, h2, h3, h4, h5, h6, span, p {
            font-family: "微软雅黑", "Segoe UI","Open Sans",sans-serif,serif;
        }
        .underline span:hover {
            text-decoration: underline;
        }
    </style>

    <script type="text/javascript" src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.bootcss.com/metro/3.0.14/js/metro.min.js"></script>
</head>
<body>
    <div class="container">
        <header class="margin20 no-margin-left no-margin-right">
            <div class="clear-float">
                <a class="place-left" href="./">
                    <h1>巧家一中 Wrapper&nbsp;<a target="_blank" href="https://github.com/jgzh/qjyz-wrapper"><small class="underline"><span>开源项目</span></small></a> <a target="_blank" href="http://www.ynqjdyz.ccoo.cn"><small class="underline"><span>巧家一中官网</span></small></a></h1>
                </a>
            </div>

            <div class="main-menu-wrapper">
                <ul class="horizontal-menu" style="margin-left: -20px">
                    <?php echo "\n";
                    $cate_keys = array_keys($site['cate']);
                    echo "<li><a href=\"./\">主页</a></li>\n";
                    for($i=0; $i<(count($cate_keys)>=5?5:count($cate_keys)); $i++) {
                        echo "<li><a href=\"./{$cate_keys[$i]}/\">{$site['cate'][$cate_keys[$i]]['cname']}</a></li>\n";
                    }
                    ?>
                    <li class="place-right">
                        <a href="#" class="dropdown-toggle">更多</a>
                        <ul class="d-menu place-right" data-role="dropdown">
                            <?php echo "\n";
                            if (count($cate_keys) > 5) {
                                for($i=5; $i<count($cate_keys); $i++) {
                                    echo "<li><a href=\"./{$cate_keys[$i]}/\">{$site['cate'][$cate_keys[$i]]['cname']}</a></li>\n";
                                }
                            } else {
                                echo "<li><a href=\"#\">无</a></li>";
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
