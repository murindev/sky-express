<?php

namespace App\Services\Crawlers;



use App\Models\Settings\Countries;

class WikiCountries
{

    public $arr;

    public function __construct()
    {
        $link = 'https://ru.wikipedia.org/wiki/ISO_3166-1';
        $html = file_get_contents($link);
        $crawler = new \Symfony\Component\DomCrawler\Crawler(null, $link);
        $crawler->addHtmlContent($html, 'UTF-8');
        $tr = $crawler->filter('.wikitable > tbody tr');
        $this->tr($tr);
    }

    public function tr($tr) {
        $tr->each(function (\Symfony\Component\DomCrawler\Crawler $node, $i) {
            $this->td($node, $i);

            if($this->arr) {
                dump(Countries::create($this->arr));
            }

        });
    }

    public function td($td, $i) {
        $td->filter('td')->each(function (\Symfony\Component\DomCrawler\Crawler $td, $k) {

            if($k == 0) { // name
                $name = $td->text();
                $name = str_replace("\xc2\xa0",'',$name);
                echo '-> '.$name;
                $this->arr = [
                    'order' => 500,
                    'active' => 1
                ];
                $this->arr['slug'] =  \Str::slug($name);
                $this->arr['name'] = $name;
            }

            if($k == 1) { // name
                $alpha_short = $td->text();
                $alpha_short = str_replace("\xc2\xa0",'',$alpha_short);
                echo '-> '.$alpha_short;
                $this->arr['alpha_short'] = $alpha_short;
            }

            if($k == 2) { // name
                $alpha = $td->text();
                $alpha = str_replace("\xc2\xa0",'',$alpha);
                echo '-> '.$alpha;
                $this->arr['alpha'] = $alpha;
            }

            if($k == 3) { // name
                $digital = $td->text();
                $digital = str_replace("\xc2\xa0",'',$digital);
                echo '-> '.$digital;
                $this->arr['digital'] = $digital;
            }

            if($k == 4) { // name
                $code = $td->text();
                $code = str_replace("\xc2\xa0",'',$code);
                echo '-> '.$code;
                $this->arr['code'] = $code;
            }
        });


    }


}
