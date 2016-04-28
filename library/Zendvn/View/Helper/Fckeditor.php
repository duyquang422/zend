<?php
/**
 * Created by PhpStorm.
 * User: Quang
 * Date: 9/12/2015
 * Time: 7:58 PM
 */

namespace Zendvn\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Fckeditor extends AbstractHelper{
    public function __invoke($content, $name){
        echo '<textarea name="'. $name .'" id="'. $name .'"></textarea>';
?>
        <script>
            CKEDITOR.replace('<?php echo $name?>');
        </script>
<?php
    }
}