<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <h3 class="fg-orange text-light margin5"><?php echo $cate['cname'];?><span class="mif-chevron-right mif-2x"></span></h3>

        <div class="listview set-border padding10">
            <?php echo "\n";
            for ($i = 0; $i < (count($news[1]) > 16 ? 16 : count($news[1])); $i++) {
                ?>
                <div class="list underline">
                    <img src="./assets/img/folder-documents.png" class="list-icon">
                    <a href='./<?php echo "./{$cate['name']}/{$news[1][$i]}";?>'>
                        <div><span class="list-title"><?php echo $news[2][$i];?></span><span class='place-right'><?php echo $news[3][$i];?></span></div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>

        <div data-role="group" data-group-type="one-state" class="align-center">
            <?php echo "\n";
            for($i=1; $i<=$pages; $i++) {
                echo "<a href='./{$cate['name']}/{$i}'><button class='button" . ($page == $i ? ' active' : '') . "'>{$i}</button></a>\n";
            }
            ?>
        </div>
