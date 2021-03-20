<?php


class GetContents extends Curl
{
    private $url = 'https://tjournal.ru/news/entries/new';


    public $name = '';
    public $arrRes = [];

    public function __construct(){
        $this->api = $this->get_contents($this->url);
        $this->res = $this->getDataByOrder($this->api, '<div class="feed__chunk">', 'data-gtm="Feed — Item 2 — Click"', 1);
        $this->figure = $this->getDataByOrder($this->res, '<figure>', '</figure>', 1);
    }

    public function header(){
        $this->arrRes['style'] = $this->getDataByOrder($this->api, '<head>', '</head>', 1);
        return $this->arrRes;
    }

    public function contents(){
        $this->arrRes['title'] = $this->getDataByOrder($this->res, '<div class="content-title content-title--short l-island-a">', '<a href="/editorial">', 1);
        $this->arrRes['paragraph'] = $this->getDataByOrder($this->res, '<p>', '</p>', 1);
        $this->arrRes['images'] = $this->getDataByOrder($this->figure, 'data-image-src="', '"', 1);
        $this->arrRes['video'] = $this->getDataByOrder($this->figure, 'data-video-mp4="', '"', 1);

//        $this->arrRes['content-header'] = $this->getDataByOrder($this->res, '<figure>', '<div class="andropov_tweet__media andropov_tweet__media--photo andropov_tweet__media--center">', 1);
        $this->arrRes['content-header'] = $this->getDataByOrder($this->figure, '<div class="andropov_tweet__header">', '</div>', 1);
        $this->arrRes['content-text'] = $this->getDataByOrder($this->figure, '<div class="andropov_tweet__text"', '</div>', 1);
//        $this->arrRes['hidden'] = $this->getDataByOrder($this->figure, '<div class="andropov_telegram__text__full l-hidden">', '</div>', 1);

        if(empty($this->arrRes['title'])){
            $this->arrRes['title'] = $this->getDataByOrder($this->res, '<div class="content-title content-title--short l-island-a">', '</div>', 1);

        }

        if(empty($this->arrRes['content-header'])){
            $this->arrRes['content-header'] = $this->getDataByOrder($this->figure, '<div class="andropov_tweet__header">', '</div>', 1);

        }

        if(empty($this->arrRes['video'])){
            $this->arrRes['video'] = $this->getDataByOrder($this->figure, 'data-source-url="', '"', 1);
        }

        if(!empty($this->arrRes['images'])){
            $this->arrRes['content'] = $this->getDataByOrder($this->res, '<figure>', '</div>', 2);
        }

        return $this->arrRes;
    }

    public function saveImg(){
        if(!empty($this->arrRes['images'])){
            $dir = __DIR__.'\..\img';
            if(!file_exists($dir)) {
                mkdir($dir, 0777);
            }

            $this->name = $this->getDataByOrder($this->arrRes['images'], 'https://leonardo.osnova.io/', '/', 1);;

            $ch = curl_init($this->arrRes['images']);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
            $out = curl_exec($ch);
            $img_sv = $dir."/$this->name.jpg";
            $img_sc = file_put_contents($img_sv, $out);
            curl_close($ch);
        }
    }
}