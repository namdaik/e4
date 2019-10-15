<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function indexUrlSitemap()
    {
        return view('url.urlsitemap');
    }
    public function storeUrlSitemap(Request $request)
    {
        $urlc  = new UrlController();
        $param = $request->all();
        unset($param['sitemap']);
        unset($param['_token']);
        $strParam = "?";
        foreach ($param as $key => $value) {
            $strParam .= "&$key=$value";
        }
        Domain::firstOrCreate(
            ['url' => UrlUnits::getDomainPath($request->sitemap)],
            ['title' => UrlUnits::getDomainTitle($request->sitemap)]
        );
        $urls = $this->readLogXml($request->sitemap);
        foreach ($urls as $long_url) {
            $long_url.=$strParam; 
            $shortUrl = Url::whereLongUrl($long_url)
                ->whereNull('user_id')
                ->first();

            if ($shortUrl) {
                continue;
            }
            $ky_generator = Url::key_generator();
            $shortUrl = Url::create([
                'long_url'   => $long_url,
                'meta_title' => $long_url,
                'url_key'    => $ky_generator,
                'user_id'    => \Auth::id(),
                'is_custom'  =>  0,
            'ip'         => $request->ip(),
            ]);
        }

    }
    public function readContentUrl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        $xmlstr = curl_exec($ch);
        curl_close($ch);

        return $xmlstr;
    }
    public function readLogXml($urlxml)
    {
        $xmlstr = $this->readContentUrl($urlxml);
        try {
            $doc = new SimpleXMLElement($xmlstr);
        } catch (\Exception $ex) {
            return [];
        }

        $logs = (array) $doc;
        if (isset($logs['sitemap'])) {
            $logs = $logs['sitemap'];
        } else if (isset($logs['url'])) {
            $logs = (array) $logs['url'];
        } else if (empty($logs)) {
            return [];
        } else {
            dd($logs);
        }
        if (isset($logs['loc'])) {
            return [$logs['loc']];
        }

        $urls = [];
        foreach ($logs as $log) {
            $log = (array) $log;
            if (isset($log['loc'])) {
                $url = $log['loc'];
            } else {
                $url = $log;
            }

            $duoiXml = substr($url, -4);
            if ($duoiXml == '.xml') {
                $url2 = $this->readLogXml($url);
                $urls = array_merge($urls, $url2);
            } else {
                $urls[] = $url;
            }
        }

        return $urls;
    }
}
