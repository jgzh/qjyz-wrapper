<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <h3 class="fg-orange text-light margin5">
            <a href="./<?php echo $cate['name'];?>/"><?php echo $cate['cname'];?></a><span class="mif-chevron-right mif-2x"></span>
            <small><?php echo $title;?> [<?php echo $date;?>]</small>
            <small><a target="_blank" href="<?php echo $orig_link;?>">原文链接</a></small>
        </h3>

        <div class="listview set-border padding10">
            <?php echo "\n";
            echo $content;
            ?>
        </div>
