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

for ($i = 1; $i < $max + 1; $i++) {
  $class = new autovisitor($url);
  echo $putih . "[$i] VISITORS SENT FROM (" . $class->run() . ")\n";
  // delay milisecond
  usleep($delay);
}
echo "\n";
echo $hijau . "[x] FINISHED $putih\n";

class Random_UA
{
  public $linux_proc = array(
    'i686',
    'x86_64'
  );

  public $mac_proc = array(
    'Intel',
    'PPC',
    'U; Intel',
    'U; PPC'
  );

  public $lang = array(
    'en-US',
    'sl-SI'
  );

  function __construct()
  {
    $this->linux_proc = array(
      'i686',
      'x86_64'
    );
    $this->mac_proc   = array(
      'Intel',
      'PPC',
      'U; Intel',
      'U; PPC'
    );
    $this->lang       = array(
      'en-US',
      'sl-SI'
    );
  }

  function firefox()
  {
    $ver = array(
      'Gecko/' . date('Ymd', rand(strtotime('2011-1-1'), strtotime('today'))) . ' Firefox/' . rand(5, 7) . '.0',
      'Gecko/' . date('Ymd', rand(strtotime('2011-1-1'), strtotime('today'))) . ' Firefox/' . rand(5, 7) . '.0.1',
      'Gecko/' . date('Ymd', rand(strtotime('2010-1-1'), strtotime('today'))) . ' Firefox/3.6.' . rand(1, 20),
      'Gecko/' . date('Ymd', rand(strtotime('2010-1-1'), strtotime('today'))) . ' Firefox/3.8'
    );
    $platforms = array(
      '(Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . '; ' . $this->lang[array_rand($this->lang, 1)] . '; rv:1.9.' . rand(0, 2) . '.20) ' . $ver[array_rand($ver, 1)],
      '(X11; Linux ' . $this->linux_proc[array_rand($this->linux_proc, 1)] . '; rv:' . rand(5, 7) . '.0) ' . $ver[array_rand($ver, 1)],
      '(Macintosh; ' . $this->mac_proc[array_rand($this->mac_proc, 1)] . ' Mac OS X 10_' . rand(5, 7) . '_' . rand(0, 9) . ' rv:' . rand(2, 6) . '.0) ' . $ver[array_rand($ver, 1)]
    );
    return $platforms[array_rand($platforms, 1)];
  }

  function safari()
  {
    $saf = rand(531, 535) . '.' . rand(1, 50) . '.' . rand(1, 7);
    if (rand(0, 1) == 0) {
      $ver = rand(4, 5) . '.' . rand(0, 1);
    } else {
      $ver = rand(4, 5) . '.0.' . rand(1, 5);
    }
    $platforms = array(
      '(Windows; U; Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . ") AppleWebKit/$saf (KHTML, like Gecko) Version/$ver Safari/$saf",
      '(Macintosh; U; ' . $this->mac_proc[array_rand($this->mac_proc, 1)] . ' Mac OS X 10_' . rand(5, 7) . '_' . rand(0, 9) . ' rv:' . rand(2, 6) . '.0; ' . $this->lang[array_rand($this->lang, 1)] . ") AppleWebKit/$saf (KHTML, like Gecko) Version/$ver Safari/$saf",
      '(iPod; U; CPU iPhone OS ' . rand(3, 4) . '_' . rand(0, 3) . ' like Mac OS X; ' . $this->lang[array_rand($this->lang, 1)] . ") AppleWebKit/$saf (KHTML, like Gecko) Version/" . rand(3, 4) . ".0.5 Mobile/8B" . rand(111, 119) . " Safari/6$saf"
    );
    return $platforms[array_rand($platforms, 1)];
  }

  function iexplorer()
  {
    $ie_extra  = array(
      '',
      '; .NET CLR 1.1.' . rand(4320, 4325) . '',
      '; WOW64'
    );
    $platforms = array(
      '(compatible; MSIE ' . rand(5, 9) . '.0; Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . '; Trident/' . rand(3, 5) . '.' . rand(0, 1) . ')'
    );
    return $platforms[array_rand($platforms, 1)];
  }

  function opera()
  {
    $op_extra  = array(
      '',
      '; .NET CLR 1.1.' . rand(4320, 4325) . '',
      '; WOW64'
    );

    $platforms = array(
      '(X11; Linux ' . $this->linux_proc[array_rand($this->linux_proc, 1)] . '; U; ' . $this->lang[array_rand($this->lang, 1)] . ') Presto/2.9.' . rand(160, 190) . ' Version/' . rand(10, 12) . '.00',
      '(Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . '; U; ' . $this->lang[array_rand($this->lang, 1)] . ') Presto/2.9.' . rand(160, 190) . ' Version/' . rand(10, 12) . '.00'
    );
    return $platforms[array_rand($platforms, 1)];
  }

  function chrome()
  {
    $saf       = rand(531, 536) . rand(0, 2);
    $platforms = array(
      '(X11; Linux ' . $this->linux_proc[array_rand($this->linux_proc, 1)] . ") AppleWebKit/$saf (KHTML, like Gecko) Chrome/" . rand(13, 15) . '.0.' . rand(800, 899) . ".0 Safari/$saf",
      '(Windows NT ' . rand(5, 6) . '.' . rand(0, 1) . ") AppleWebKit/$saf (KHTML, like Gecko) Chrome/" . rand(13, 15) . '.0.' . rand(800, 899) . ".0 Safari/$saf",
      '(Macintosh; U; ' . $this->mac_proc[array_rand($this->mac_proc, 1)] . ' Mac OS X 10_' . rand(5, 7) . '_' . rand(0, 9) . ") AppleWebKit/$saf (KHTML, like Gecko) Chrome/" . rand(13, 15) . '.0.' . rand(800, 899) . ".0 Safari/$saf"
    );
    return $platforms[array_rand($platforms, 1)];
  }

  function generate()
  {
    $x = rand(1, 5);
    switch ($x) {
      case 1:
        return "Mozilla/5.0 " . $this->firefox();
        break;
      case 2:
        return "Mozilla/5.0 " . $this->safari();
        break;
      case 3:
        return "Mozilla/" . rand(4, 5) . ".0 " . $this->iexplorer();
        break;
      case 4:
        return "Opera/" . rand(8, 9) . '.' . rand(10, 99) . ' ' . $this->opera();
        break;
      case 5:
        return 'Mozilla/5.0' . $this->chrome();
        break;
    }
  }
}


class autovisitor extends Random_UA
{
  public $url;

  public function __construct($url)
  {
    $this->url = $url;
  }

  private function curl()
  {
    $ch = curl_init();
    CURL_SETOPT($ch, CURLOPT_URL, $this->url);
    CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array(
      'Referer: ' . $this->acakReferer(),
      'User-Agent: ' . $this->generate()
    ));
    CURL_SETOPT($ch, CURLOPT_FOLLOWLOCATION, true);
    CURL_SETOPT($ch, CURLOPT_SSL_VERIFYHOST, 0);
    CURL_SETOPT($ch, CURLOPT_SSL_VERIFYPEER, 0);
    CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, 1);
    CURL_SETOPT($ch, CURLOPT_USERAGENT, $this->generate());
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
    if (function_exists('ob_flush') and function_exists('ob_get_length') and ob_get_length() !== false) {
      @ob_flush();
    } else if (function_exists('ob_end_flush') and function_exists('ob_start') and function_exists('ob_get_length') and ob_get_length() !== FALSE) {
      @ob_end_flush();
      @ob_start();
    }
  }

  private function acakReferer()
  {
    $list   = array();
    /* List asal traffic */
    $list[] = "http://facebook.com";
    $list[] = "http://www.beinyu.com";
    $list[] = "http://google.com";
    $list[] = "http://youtube.com";
    $list[] = "http://tmall.com";
    $list[] = "http://baidu.com";
    $list[] = "http://qq.com";
    $list[] = "http://sohu.com";
    $list[] = "http://taobao.com";
    $list[] = "http://360.cn";
    $list[] = "http://jd.com";
    $list[] = "http://amazon.com";
    $list[] = "http://yahoo.com";
    $list[] = "http://wikipedia.org";
    $list[] = "http://zoom.us";
    $list[] = "http://weibo.com";
    $list[] = "http://sina.com.cn";
    $list[] = "http://live.com";
    $list[] = "http://reddit.com";
    $list[] = "http://xinhuanet.com";
    $list[] = "http://netflix.com";
    $list[] = "http://microsoft.com";
    $list[] = "http://okezone.com";
    $list[] = "http://office.com";
    $list[] = "http://vk.com";
    $list[] = "http://instagram.com";
    $list[] = "http://csdn.net";
    $list[] = "http://alipay.com";
    $list[] = "http://microsoftonline.com";
    $list[] = "http://myshopify.com";
    $list[] = "http://yahoo.co.jp";
    $list[] = "http://zhanqi.tv";
    $list[] = "http://panda.tv";
    $list[] = "http://google.com.hk";
    $list[] = "http://bongacams.com";
    $list[] = "http://twitch.tv";
    $list[] = "http://amazon.in";
    $list[] = "http://naver.com";
    $list[] = "http://bing.com";
    $list[] = "http://apple.com";
    $list[] = "http://ebay.com";
    $list[] = "http://aliexpress.com";
    $list[] = "http://tianya.cn";
    $list[] = "http://stackoverflow.com";
    $list[] = "http://amazon.co.jp";
    $list[] = "http://adobe.com";
    $list[] = "http://google.co.in";
    $list[] = "http://livejasmin.com";
    $list[] = "http://twitter.com";
    $list[] = "http://yandex.ru";
    $list[] = "http://tribunnews.com";
    $list[] = "http://wikipedia.org";
    $list[] = "http://whatsapp.com";
    $list[] = "http://xvideos.com";
    $list[] = "http://pornhub.com";
    $list[] = "http://xnxx.com";
    $list[] = "http://tiktok.com";
    $list[] = "http://docomo.ne.jp";
    $list[] = "http://linkedin.com";
    $list[] = "http://openai.com";
    $list[] = "http://dzen.ru";
    $list[] = "http://xhamster.com";
    $list[] = "http://weather.com";
    $list[] = "http://samsung.com";
    $list[] = "http://vk.com";
    $list[] = "http://turbopages.org";
    $list[] = "http://facebook";
    $acak   = array_rand($list, 1);
    return $list[$acak];
  }

  public function run()
  {
    $this->xflush();
    $this->curl();
    return $this->acakReferer();
  }
}
