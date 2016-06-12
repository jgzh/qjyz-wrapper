<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <script>
            function showDialog(id){
                var dialog = $("#"+id).data('dialog');
                if (!dialog.element.data('opened')) {
                    dialog.open();
                } else {
                    dialog.close();
                }
            }
        </script>

        <footer>
            <div class="bottom-menu-wrapper">
                <ul class="horizontal-menu compact">
                    <li>
                        <a target="_blank" href="http://metroui.org.ua/">Powered by Metro UI CSS</a>
                        <a href="http://ynqjyz.com/">&copy; 2016 YNQJYZ.COM</a>
                        <a target="_blank" href="https://mit-license.org/">The MIT License (MIT)</a>
                    </li>
                    <li class="place-right"><a href="javascript:void(0);" onclick="showDialog('statdlg')">免责声明</a></li>
                </ul>
            </div>
        </footer>

        <div data-role="dialog" id="statdlg" class="padding20" data-close-button="true" data-overlay="true"  data-overlay-color="op-dark" data-overlay-click-close="true">
            <h1>免责声明</h1>
            <p>本站不提供任何信息上传和发布功能，所有内容信息均来源于<a target="_blank" href="http://www.ynqjdyz.ccoo.cn">巧家一中官网</a>，仅修改网页样式使其适应宽屏阅读。</p>
            <p>本站所有代码已通过 <a target="_blank" href="https://mit-license.org/">MIT</a> 协议开源，您可以从<a target="_blank" href="https://github.com/jgzh/qjyz-wrapper">此处</a>获取到所有源代码。</p>
        </div>

    </div>

</body>
</html>
