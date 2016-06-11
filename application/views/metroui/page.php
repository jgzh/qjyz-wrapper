<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <h3 class="fg-orange text-light margin5">
            <?php echo "\n";
            echo (isset($title) && isset($date) && isset($orig_link) ? "<a href='./{$cate['name']}/'>{$cate['cname']}</a>" : $cate['cname']) . "<span class='mif-chevron-right mif-2x'></span>";
            if (isset($title) && isset($date) && isset($orig_link)) {
                echo "<small>{$title} [{$date}] </small>";
                echo "<small><a target='_blank' href='{$orig_link}'>原文链接</a></small>";
            }
            ?>
        </h3>

        <div class="listview set-border padding10">
            <?php echo "\n";
            echo $content;
            ?>
        </div>
