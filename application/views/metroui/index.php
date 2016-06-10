<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <div class="main-content clear-float">

            <div class="grid">
                <div class="row cells2">
                    <div class="cell">
                        <div class="carousel square-bullets" data-height="360" data-role="carousel" data-direction="left">
                            <?php echo "\n";
                            for ($i = 0; $i < (count($imgs[1]) > 8 ? 8 : count($imgs[1])); $i++) {
                                echo "<div class=\"slide\"><a target=\"_blank\" href=\"./image/{$imgs[1][$i]}\"><img src=\"{$imgs[2][$i]}\" data-role=\"fitImage\" data-format=\"fill\"></a></div>\n";
                            }
                            ?>
                        </div>

                        <br/>
                        <div class="panel success">
                            <div class="heading">
                                <span class="title">信息公开</span>
                            </div>
                            <div class="content">
                                <div class="clear-float"></div>
                                <ul class="simple-list green-bullet underline">
                                    <?php echo "\n";
                                    for ($i = 0; $i < (count($publicity[1]) > 8 ? 8 : count($publicity[1])); $i++) {
                                        echo "<li><a target='_blank' href='./publicity/{$publicity[1][$i]}'><div><span>{$publicity[2][$i]}</span><span class='place-right'>{$publicity[3][$i]}</span></div></a></li>\n";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="cell">
                        <div class="panel">
                            <div class="heading">
                                <span class="title">校园资讯</span>
                            </div>
                            <div class="content">
                                <div class="clear-float"></div>
                                <ul class="simple-list blue-bullet underline">
                                    <?php echo "\n";
                                    for ($i = 0; $i < (count($news[1]) > 20 ? 20 : count($news[1])); $i++) {
                                        echo "<li><a target='_blank' href='./news/{$news[1][$i]}'><div><span>{$news[2][$i]}</span><span class='place-right'>{$news[3][$i]}</span></div></a></li>\n";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel alert">
                <div class="heading">
                    <span class="title">教学动态</span>
                </div>
                <div class="content">
                    <div class="clear-float"></div>
                    <div class="grid">
                        <div class="row cells2">
                            <div class="cell">
                                <ul class="simple-list large-bullet red-bullet underline">
                                    <?php echo "\n";
                                    for ($i = 0; $i < (count($nemt[1]) > 8 ? 8 : count($nemt[1])); $i++) {
                                        echo "<li><a target='_blank' href='./nemt/{$nemt[1][$i]}'><div><span>{$nemt[2][$i]}</span><span class='place-right'>{$nemt[3][$i]}</span></div></a></li>\n";
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="cell">
                                <ul class="simple-list large-bullet red-bullet underline">
                                    <?php echo "\n";
                                    for ($i = 0; $i < (count($award[1]) > 8 ? 8 : count($award[1])); $i++) {
                                        echo "<li><a target='_blank' href='./award/{$award[1][$i]}'><div><span>{$award[2][$i]}</span><span class='place-right'>{$award[3][$i]}</span></div></a></li>\n";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
