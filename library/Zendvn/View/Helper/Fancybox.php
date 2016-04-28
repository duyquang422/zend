<?php
/**
 * Created by PhpStorm.
 * User: Quang
 * Date: 9/11/2015
 * Time: 10:50 AM
 */
namespace Zendvn\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

class Fancybox extends AbstractHelper{
    public function __invoke($link, $content, $type = ''){
        $urlCSS		= URL_TEMPLATE . '/backend/css';
        $urlJS		= URL_TEMPLATE . '/backend/js';
        echo $this->view->headLink()->appendStylesheet($urlCSS . '/jquery.fancybox.css');
        echo $this->view->headScript()->appendFile($urlJS. '/jquery.fancybox.pack.js');

        echo '<a class="various" data-fancybox-type="iframe" href="'. $link .'">'. $content .'</a>';

        ?>
<script>
        $(function() {
            $(".various").fancybox({
                maxWidth: 800,//set chiều rộng  tối đa của box tính bằng px
                maxHeight: 600, //set chiều cao tối đa của box
                width: '70%',
                height: '70%',
                autoSize: false,// tự động resize
                closeClick: false, // khi click vào ngoài màn hình sẽ đóng box
                openEffect: 'none',
                closeEffect: 'none',
                helpers: {
                    media: {}
                }
            });
        });
</script>
<?php
    }
}
