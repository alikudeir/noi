<?php
error_reporting(0);

// Terminal Color
$biru    = "\e[34m";
$kuning  = "\e[33m";
$cyan    = "\e[96m";
$magenta = "\e[35m";
$hijau   = "\e[92m";
$merah   = "\e[91m";
$putih   = "\e[0m";

echo $kuning . "~~ AUTO VISITOR BLOG ~~\n";
echo "Github: github.com/alikudeir \n\n";
echo $hijau . "Url Website: ";
$url = trim(fgets(STDIN));
echo $hijau . "Number of bot visitors: ";
$max = trim(fgets(STDIN));
echo $hijau . "Delay (milliseconds)(1 sec = 1000): ";
$delay = trim(fgets(STDIN));
echo "\n";

// List of proxy servers
$proxies = [
    "proxy1:port1",
    "proxy2:port2",
    "proxy3:port3"
    // Add more proxies as needed
];

for ($i = 1; $i < $max + 1; $i++) {
    $proxy = $proxies[array_rand($proxies)];
    $class = new autovisitor($url, $proxy);
    echo $putih . "[$i] VISITORS SENT FROM (" . $class->run() . ") USING PROXY $proxy\n";
    usleep($delay * 1000); // converting milliseconds to microseconds
}
echo "\n";
echo $hijau . "[x] FINISHED $putih\n";

class Random_UA
{
    public $linux_proc;
    public $mac_proc;
    public $lang;

    function __construct()
    {
        $this->linux_proc = ['i686', 'x86_64'];
        $this->mac_proc   = ['Intel', 'PPC', 'U; Intel', 'U; PPC'];
        $this->lang       = ['en-US', 'sl-SI'];
    }

    function firefox()
    {
        $ver = [
            'Gecko/' . date('Ymd', rand(strtotime('2011-1-1'), strtotime('today'))) . ' Firefox/' . rand(5, 7) . '.0',
            'Gecko/' . date('Ymd', rand(strtotime('2011-1-1'), strtotime('today'))) . ' Firefox/' . rand(5, 7) . '.0.1',
            'Gecko/' . date('Ymd', rand(strtotime('2010-1-1'), strtotime('today'))) . ' Firefox/3.6.' . rand(1, 20),
            'Gecko/' . date('Ymd', rand(strtotime('2010-1-1'), strtotime('today'))) . ' Firefox/3.8'
        ];
        $platforms = [
            '(Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . '; ' . $this->lang[array_rand($this->lang)] . '; rv:1.9.' . rand(0, 2) . '.20) ' . $ver[array_rand($ver)],
            '(X11; Linux ' . $this->linux_proc[array_rand($this->linux_proc)] . '; rv:' . rand(5, 7) . '.0) ' . $ver[array_rand($ver)],
            '(Macintosh; ' . $this->mac_proc[array_rand($this->mac_proc)] . ' Mac OS X 10_' . rand(5, 7) . '_' . rand(0, 9) . ' rv:' . rand(2, 6) . '.0) ' . $ver[array_rand($ver)]
        ];
        return $platforms[array_rand($platforms)];
    }

    function safari()
    {
        $saf = rand(531, 535) . '.' . rand(1, 50) . '.' . rand(1, 7);
        $ver = rand(4, 5) . '.' . (rand(0, 1) == 0 ? rand(0, 1) : '0.' . rand(1, 5));
        $platforms = [
            '(Windows; U; Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . ") AppleWebKit/$saf (KHTML, like Gecko) Version/$ver Safari/$saf",
            '(Macintosh; U; ' . $this->mac_proc[array_rand($this->mac_proc)] . ' Mac OS X 10_' . rand(5, 7) . '_' . rand(0, 9) . ' rv:' . rand(2, 6) . '.0; ' . $this->lang[array_rand($this->lang)] . ") AppleWebKit/$saf (KHTML, like Gecko) Version/$ver Safari/$saf",
            '(iPod; U; CPU iPhone OS ' . rand(3, 4) . '_' . rand(0, 3) . ' like Mac OS X; ' . $this->lang[array_rand($this->lang)] . ") AppleWebKit/$saf (KHTML, like Gecko) Version/" . rand(3, 4) . ".0.5 Mobile/8B" . rand(111, 119) . " Safari/6$saf"
        ];
        return $platforms[array_rand($platforms)];
    }

    function iexplorer()
    {
        $ie_extra  = ['', '; .NET CLR 1.1.' . rand(4320, 4325), '; WOW64'];
        $platforms = [
            '(compatible; MSIE ' . rand(5, 9) . '.0; Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . '; Trident/' . rand(3, 5) . '.' . rand(0, 1) . ')'
        ];
        return $platforms[array_rand($platforms)];
    }

    function opera()
    {
        $op_extra  = ['', '; .NET CLR 1.1.' . rand(4320, 4325), '; WOW64'];
        $platforms = [
            '(X11; Linux ' . $this->linux_proc[array_rand($this->linux_proc)] . '; U; ' . $this->lang[array_rand($this->lang)] . ') Presto/2.9.' . rand(160, 190) . ' Version/' . rand(10, 12) . '.00',
            '(Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . '; U; ' . $this->lang[array_rand($this->lang)] . ') Presto/2.9.' . rand(160, 190) . ' Version/' . rand(10, 12) . '.00'
        ];
        return $platforms[array_rand($platforms)];
    }

    function chrome()
    {
        $saf       = rand(531, 536) . rand(0, 2);
        $platforms = [
            '(X11; Linux ' . $this->linux_proc[array_rand($this->linux_proc)] . ") AppleWebKit/$saf (KHTML, like Gecko) Chrome/" . rand(13, 15) . '.0.' . rand(800, 899) . ".0 Safari/$saf",
            '(Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . ") AppleWebKit/$saf (KHTML, like Gecko) Chrome/" . rand(13, 15) . '.0.' . rand(800, 899) . ".0 Safari/$saf",
            '(Macintosh; U; ' . $this->mac_proc[array_rand($this->mac_proc)] . ' Mac OS X 10_' . rand(5, 7) . '_' . rand(0, 9) . ") AppleWebKit/$saf (KHTML, like Gecko) Chrome/" . rand(13, 15) . '.0.' . rand(800, 899) . ".0 Safari/$saf"
        ];
        return $platforms[array_rand($platforms)];
    }

    function generate()
    {
        $x = rand(1, 5);
        switch ($x) {
            case 1:
                return "Mozilla/5.0 " . $this->firefox();
            case 2:
                return "Mozilla/5.0 " . $this->safari();
            case 3:
                return "Mozilla/" . rand(4, 5) . ".0 " . $this->iexplorer();
            case 4:
                return "Opera/" . rand(8, 9) . '.' . rand(10, 99) . ' ' . $this->opera();
            case 5:
                return 'Mozilla/5.0' . $this->chrome();
        }
    }
}


class autovisitor extends Random_UA
{
    public $url;
    public $proxy;

    public function __construct($url, $proxy)
    {
        parent::__construct();
        $this->url = $url;
        $this->proxy = $proxy;
    }

    private function curl()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Referer: ' . $this->acakReferer(),
            'User-Agent: ' . $this->generate()
        ]);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->generate());
        curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    private function xflush()
    {
        static $output_handler = null;
        if ($output_handler === null) {
            $output_handler = @ini_get('output_handler');
        }
        if ($output_handler == 'ob_gzhandler') {
            return;
        }
        flush();
        if (function_exists('ob_flush') && function_exists('ob_get_length') && ob_get_length() !== false) {
            @ob_flush();
        } else if (function_exists('ob_end_flush') && function_exists('ob_start') && function_exists('ob_get_length') && ob_get_length() !== false) {
            @ob_end_flush();
            @ob_start();
        }
    }

    private function acakReferer()
    {
        $list = [
            "https://facebook.com",
            "https://www.beinyu.com",
            "https://google.com",
            "https://youtube.com",
            "https://tmall.com",
            "https://baidu.com",
            "https://qq.com",
            "https://sohu.com",
            "https://taobao.com",
            "https://360.cn",
            "https://jd.com",
            "https://amazon.com",
            "https://yahoo.com",
            "https://wikipedia.org",
            "https://zoom.us",
            "https://weibo.com",
            "https://sina.com.cn",
            "https://live.com",
            "https://reddit.com",
            "https://xinhuanet.com",
            "https://netflix.com",
            "https://microsoft.com",
            "https://okezone.com",
            "https://office.com",
            "https://vk.com",
            "https://instagram.com",
            "https://csdn.net",
            "https://alipay.com",
            "https://microsoftonline.com",
            "https://myshopify.com",
            "https://yahoo.co.jp",
            "https://zhanqi.tv",
            "https://panda.tv",
            "https://google.com.hk",
            "https://bongacams.com",
            "https://twitch.tv",
            "https://amazon.in",
            "https://naver.com",
            "https://bing.com",
            "https://apple.com",
            "https://ebay.com",
            "https://aliexpress.com",
            "https://tianya.cn",
            "https://stackoverflow.com",
            "https://amazon.co.jp",
            "https://adobe.com",
            "https://google.co.in",
            "https://livejasmin.com",
            "https://twitter.com",
            "https://yandex.ru",
            "https://tribunnews.com",
            "https://wikipedia.org",
            "https://whatsapp.com",
            "https://xvideos.com",
            "https://pornhub.com",
            "https://xnxx.com",
            "https://tiktok.com",
            "https://docomo.ne.jp",
            "https://linkedin.com",
            "https://openai.com",
            "https://dzen.ru",
            "https://xhamster.com",
            "https://weather.com",
            "https://samsung.com",
            "https://vk.com",
            "https://turbopages.org",
            "https://naver.com",
            "https://discord.com",
            "https://pinterest.com",
            "https://duckduckgo.com"
        ];
        return $list[array_rand($list)];
    }

    public function run()
    {
        $this->xflush();
        $this->curl();
        return $this->acakReferer();
    }
}
