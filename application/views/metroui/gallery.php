<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <h3 class="fg-orange text-light margin5"><?php echo $cate['cname'];?><span class="mif-chevron-right mif-2x"></span></h3>

        <div class="listview set-border padding10">

            <div class="tile-area no-padding">
                <div class="tile-container bg-darkCobalt">
                    <?php
                    for ($i = 0; $i < count($pics[0]); $i++) { echo "\n";?>
                        <a href='<?php echo "./{$cate['name']}/{$pics[2][$i]}";?>'>
                            <div class="tile-wide fg-white" data-role="tile">
                                <div class="tile-content zooming">
                                    <div class="slide">
                                        <img src="<?php echo $pics[1][$i]; ?>" width="620" height="300"
                                             onLoad="if(this.width/this.height<1.1) {this.parentElement.parentElement.parentElement.setAttribute('class','tile fg-white');}">
                                    </div>
                                    <div class="tile-label"><?php echo $pics[3][$i]; ?></div>
                                </div>
                            </div>
                        </a>
                    <?php echo "\n";} ?>
                </div>
            </div>
        </div>

        <div data-role="group" data-group-type="one-state" class="align-center">
            <?php echo "\n";
            for($i=1; $i<=$pages; $i++) {
                echo "<a href='./{$cate['name']}/{$i}'><button class='button" . ($page == $i ? ' active' : '') . "'>{$i}</button></a>\n";
            }
            ?>
        </div>
