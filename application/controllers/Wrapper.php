<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wrapper extends CI_Controller {

    private $site = array(
        'id'=>78586,
        'path'=>'http://www.cc.iccoo.cn/webdiy/1600-78586-18775/',
        'cate'=>array(
            'about'     =>array('method'=>'page','cname'=>'学校概况','ctrl'=>'jga_main.asp','cateid'=>676345),
            'education'=>array('method'=>'list_a','cname'=>'教育教学','ctrl'=>'jga_news.asp','cateid'=>676270),
            'award'     =>array('method'=>'list_a','cname'=>'奖学助学','ctrl'=>'jga_news.asp','cateid'=>676237),
            'news'      =>array('method'=>'list_a','cname'=>'校园新闻','ctrl'=>'jga_news.asp','cateid'=>676266),
            'record'    =>array('method'=>'list_a','cname'=>'月潭流韵','ctrl'=>'jga_news.asp','cateid'=>676235),
            'huofeng'   =>array('method'=>'list_a','cname'=>'火凤文学','ctrl'=>'jga_news.asp','cateid'=>676236),
            'image'     =>array('method'=>'gallery','cname'=>'一中览胜','ctrl'=>'imgmsg.asp','cateid'=>676232),
            'party'     =>array('method'=>'list_a','cname'=>'党团建设','ctrl'=>'jga_news.asp','cateid'=>676233),
            'nemt'      =>array('method'=>'list_a','cname'=>'高考聚焦','ctrl'=>'jga_news.asp','cateid'=>676267),
            'publicity'=>array('method'=>'list_a','cname'=>'校务公开','ctrl'=>'jga_news.asp','cateid'=>677360),
            'faculty'   =>array('method'=>'gallery','cname'=>'师资力量','ctrl'=>'imgmsg.asp','cateid'=>676368),
            'video'     =>array('method'=>'gallery','cname'=>'精彩视频','ctrl'=>'imgmsg.asp','cateid'=>676371),
            'fame'      =>array('method'=>'gallery','cname'=>'名人堂','ctrl'=>'imgmsg.asp','cateid'=>676399)
        )
    );

    public function __construct()
    {
        parent::__construct();
        // 定义全局 BASE 变量
        if ((isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))) || $_SERVER['SERVER_PORT'] == 443) {
            $protocol = 'https://';
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        define('BASEHREF', $protocol . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/.\\') . '/');

    }

    public function _remap($method, $params = array())
    {
        $method_a = isset($this->site['cate'][$method]) ? $this->site['cate'][$method]['method'] : $method;
        if (!method_exists($this, $method_a)) {
            show_404();
        }
        if($method !== 'index') {
            $cate = $this->site['cate'][$method];
            $cate['name'] = $method;
            array_splice($params, 0, 0, array($cate));
        }
        return call_user_func_array(array($this, $method_a), $params);
    }

    public function index()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $this->site['path']);
        $src = mb_convert_encoding(curl_exec($ch), 'UTF-8', 'GBK');
        curl_close($ch);
        $pattern = "/<a href='pic_show.asp\?id=78586&cateid=676232&pid=([1-9][0-9]{5,6})'><img src='(.*?)'.*?><\/a>/si";
        preg_match_all($pattern, $src, $imgs);
        $pattern = "/<td align=left> <a href='newsshow.asp\?id=78586&cateid=676266&nid=([1-9][0-9]{5,6})'>(.*?)<\/a> <\/td><td  width='80px' >(.*?) <\/td>/si";
        preg_match_all($pattern, $src, $news);
        $pattern = "/<td align=left> <a href='newsshow.asp\?id=78586&cateid=677360&nid=([1-9][0-9]{5,6})'>(.*?)<\/a> <\/td><td  width='80px' >(.*?) <\/td>/si";
        preg_match_all($pattern, $src, $publicity);
        $pattern = "/<td align=left> <a href='newsshow.asp\?id=78586&cateid=676267&nid=([1-9][0-9]{5,6})'>(.*?)<\/a> <\/td><td  width='80px' >(.*?) <\/td>/si";
        preg_match_all($pattern, $src, $nemt);
        $pattern = "/<td align=left> <a href='newsshow.asp\?id=78586&cateid=676237&nid=([1-9][0-9]{5,6})'>(.*?)<\/a> <\/td><td  width='80px' >(.*?) <\/td>/si";
        preg_match_all($pattern, $src, $award);
        $this->load->view('metroui/header', array(
            'site' => $this->site,
            'title'=> '主页 - 巧家一中 Wrapper'
        ));
        $this->load->view('metroui/index', array(
            'imgs' => $imgs,
            'news' => $news,
            'publicity' => $publicity,
            'nemt' => $nemt,
            'award'=> $award
        ));
        $this->load->view('metroui/footer');
    }

    private function page($cate, $id = NULL)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        if($id == NULL) {
            $url = $this->site['path'] . "{$cate['ctrl']}?id={$this->site['id']}&cateid={$cate['cateid']}";
            curl_setopt($ch, CURLOPT_URL, $url);
            $src = mb_convert_encoding(curl_exec($ch), 'UTF-8', 'GBK');
            curl_close($ch);
            $pattern = '/<table width="708" border="0">(.*?)        <\/table>/si';
            preg_match_all($pattern, $src, $content);
            $content[0][0] = preg_replace('/(width="[0-9]{3}")/si', '', $content[0][0]);
            $data =  array(
                'cate' => $cate,
                'content' => $content[0][0],
                'orig_link' => $url
            );
        } else {
            $url = $this->site['path'] . "newsshow.asp?id={$this->site['id']}&cateid={$cate['cateid']}&nid={$id}";
            curl_setopt($ch, CURLOPT_URL, $url);
            $src = mb_convert_encoding(curl_exec($ch), 'UTF-8', 'GBK');
            curl_close($ch);
            $pattern = "/<td  id=\"fontColor\" height=\"30\" colspan=\"3\" style=\"font-size:16px; color:#000000;font-weight: bold;\" align=\"center\">(.*?)<\/td>/si";
            preg_match_all($pattern, $src, $title);
            $pattern = "/来源:本站　　时间:(.*?) <\/font><\/div><\/td>/si";
            preg_match_all($pattern, $src, $date);
            $pattern = "/<td id=\"cctent\" align=\"left\">(.*?)<\/td>\r?\n +<td align=\"center\">&nbsp;<\/td>/si";
            preg_match_all($pattern, $src, $content);
            $content[1][0] = preg_replace('/(onload="fade\(this,[0-9]+,[0-9]+\)")/si', '', $content[1][0]);
            $data = array(
                'cate' => $cate,
                'title' => $title[1][0],
                'date' => $date[1][0],
                'content' => $content[1][0],
                'orig_link' => $url
            );
        }
        $this->load->view('metroui/header', array(
            'site' => $this->site,
            'title'=> $cate['cname'] .' - 巧家一中 Wrapper'
        ));
        $this->load->view('metroui/page', $data);
        $this->load->view('metroui/footer');
    }

    private function list_a($cate, $id = 1)
    {
        $id = (int)$id;
        if ($id > 1000) {
            $this->page($cate, $id);
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $url = $this->site['path'] . $cate['ctrl'] . "?id={$this->site['id']}&cateid={$cate['cateid']}&page={$id}";
            curl_setopt($ch, CURLOPT_URL, $url);
            $src = mb_convert_encoding(curl_exec($ch), 'UTF-8', 'GBK');
            curl_close($ch);
            $pattern = "/<a href='newsshow.asp\?id=78586&cateid={$cate['cateid']}&nid=(.*?)'>(.*?)<\/a> <span class=\"newsTime\">(.*?)<\/span>/si";
            preg_match_all($pattern, $src, $news);
            $pattern = "/&nbsp;&nbsp;&nbsp; [1-9][0-9]*\/([1-9][0-9]*)         <\/select><\/td>/si";
            preg_match_all($pattern, $src, $pages);
            $this->load->view('metroui/header', array(
                'site' => $this->site,
                'title'=> $cate['cname'] .' - 巧家一中 Wrapper'
            ));
            $this->load->view('metroui/list', array(
                'cate' => $cate,
                'page' => $id,
                'pages'=> (int)$pages[1][0],
                'news' => $news
            ));
            $this->load->view('metroui/footer');
        }
    }

    private function picture($cate, $id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $url = $this->site['path'] . "pic_show.asp?id={$this->site['id']}&cateid={$cate['cateid']}&pid={$id}";
        curl_setopt($ch, CURLOPT_URL, $url);
        $src = mb_convert_encoding(curl_exec($ch), 'UTF-8', 'GBK');
        curl_close($ch);
        $pattern = '/<table width="708" border="0">(.*?)        <\/table>/si';
        preg_match_all($pattern, $src, $content);
        $content[0][0] = preg_replace('/(width="480" height="400")/si', 'width="100%" height="480"', $content[0][0]);
        $content[0][0] = preg_replace("/(pic_show.asp\?id=78586&cateid={$cate['cateid']}&pid=)/si", "./{$cate['name']}/", $content[0][0]);
        $content[0][0] = preg_replace('/(width="[0-9]{3}")/si', '', $content[0][0]);
        $content[0][0] = preg_replace('/(onload="fade\(this,[0-9]+,[0-9]+\)")/si', '', $content[0][0]);
        $this->load->view('metroui/header', array(
            'site' => $this->site,
            'title'=> $cate['cname'] .' - 巧家一中 Wrapper'
        ));
        $this->load->view('metroui/page', array(
            'cate' => $cate,
            'content' => $content[0][0],
            'orig_link' => $url
        ));
        $this->load->view('metroui/footer');
    }

    private function gallery($cate, $id = 1)
    {
        $id = (int)$id;
        if ($id > 1000) {
            $this->picture($cate, $id);
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $url = $this->site['path'] . $cate['ctrl'] . "?id={$this->site['id']}&cateid={$cate['cateid']}&page={$id}";
            curl_setopt($ch, CURLOPT_URL, $url);
            $src = mb_convert_encoding(curl_exec($ch), 'UTF-8', 'GBK');
            curl_close($ch);
            $pattern = "/<img src='(.*?)' width='160' height='110' border='0' ><\/a><br>\r?\n +<a href='pic_show.asp\?id=78586&cateid={$cate['cateid']}&pid=(.*?)' >(.*?) *<\/a>\r?\n +<\/td>/si";
            preg_match_all($pattern, $src, $pics);
            $pattern = "/&nbsp;&nbsp;&nbsp; [1-9][0-9]*\/([1-9][0-9]*)         <\/select><\/td>/si";
            preg_match_all($pattern, $src, $pages);
            $this->load->view('metroui/header', array(
                'site' => $this->site,
                'title'=> $cate['cname'] .' - 巧家一中 Wrapper'
            ));
            $this->load->view('metroui/gallery', array(
                'cate' => $cate,
                'page' => $id,
                'pages'=> (int)$pages[1][0],
                'pics' => $pics
            ));
            $this->load->view('metroui/footer');
        }
    }
}
