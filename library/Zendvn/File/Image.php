<?php

namespace Zendvn\File;

use PHPImageWorkshop\ImageWorkshop;

class Image {
	
	public function upload($fileInput, $options = null){
        $uploadObj 			= new Upload();
		if($options['task'] == 'product'){
			$uploadDirectory	= PATH_FILES . '/product/';
			$fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'product_');
				
			$layer = ImageWorkshop::initFromPath(PATH_FILES . '/product/' . $fileName);
            $layer->resizeInPixel(400, 400, false,null,100);
            $layer->save(PATH_FILES . '/product/400x400', $fileName, true,null,100);
			$layer->resizeInPixel(224, 224, false,null,100);
			$layer->save(PATH_FILES . '/product/293x293', $fileName, true,null,100);
            $layer->resizeInPixel(203, 235, false,null,100);
            $layer->save(PATH_FILES . '/product/203x235', $fileName, true,null,100);
            $layer->resizeInPixel(231, 242, false,null,100);
            $layer->save(PATH_FILES . '/product/231x242', $fileName, true,null,100);
            $layer->resizeInPixel(100, 100, false);
            $layer->save(PATH_FILES . '/product/100x100', $fileName, true,null,100);
		}

        if($options['task'] == 'product-slide'){
            $uploadDirectory    = PATH_FILES . '/product/';
            $fileName           = $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'product_');
                
            $layer = ImageWorkshop::initFromPath(PATH_FILES . '/product/' . $fileName);
            $layer->resizeInPixel(780, 434, false,null,100);
            $layer->save(PATH_FILES . '/product/780x434', $fileName, true,null,100);
            $layer->resizeInPixel(98, 105, false,null,100);
            $layer->save(PATH_FILES . '/product/98x105', $fileName, true,null,100);
        }

        if($options['task'] == 'category'){
            $uploadDirectory	= PATH_FILES . '/category/';
            $fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'category_');

            $layer = ImageWorkshop::initFromPath(PATH_FILES . '/category/' . $fileName);
            $layer->resizeInPixel(436, 502, false);
            $layer->save(PATH_FILES . '/category/430x465', $fileName, true,null,100);
            $layer->resizeInPixel(215, 230, false);
            $layer->save(PATH_FILES . '/category/215x230', $fileName, true,null,100);
            $layer->resizeInPixel(100, 100, false);
            $layer->save(PATH_FILES . '/category/100x100', $fileName, true,null,100);
        }

        if($options['task'] == 'manufacturer'){
            $uploadDirectory	= PATH_FILES . '/manufacturer/';
            $fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'manufacturer_');

            $layer = ImageWorkshop::initFromPath(PATH_FILES . '/manufacturer/' . $fileName);
            $layer->resizeInPixel(120,60, null, false);
            $layer->save(PATH_FILES . '/manufacturer/120x60', $fileName, true,null,100);
        }

        if($options['task'] == 'posts-category'){
            $uploadDirectory	= PATH_FILES . '/posts-category/';
            $fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'post_category_');
            $layer = ImageWorkshop::initFromPath(PATH_FILES . '/posts-category/' . $fileName);
            $layer->resizeInPixel(390,217, null, false);
            $layer->save(PATH_FILES . '/posts-category/390x217', $fileName, true,null,100);
            $layer->resizeInPixel(176, 98, false);
            $layer->save(PATH_FILES . '/posts-category/176x98', $fileName, true,null,100);
            $layer->resizeInPixel(42, 42, false);
            $layer->save(PATH_FILES . '/posts-category/42x42', $fileName, true,null,100);
        }

        if($options['task'] == 'posts'){
            $uploadDirectory	= PATH_FILES . '/posts/';
            $fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'posts_');
            $layer = ImageWorkshop::initFromPath(PATH_FILES . '/posts/' . $fileName);
            $layer->resizeInPixel(176, 98, false);
            $layer->save(PATH_FILES . '/posts/176x98', $fileName, true,null,100);
            $layer->resizeInPixel(42, 42, false);
            $layer->save(PATH_FILES . '/posts/42x42', $fileName, true,null,100);
        }

        if($options['task'] == 'bannerMenu'){
            $uploadDirectory	= PATH_FILES . '/upload/';
            $fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'bannerMenu_');
            $layer = ImageWorkshop::initFromPath(PATH_FILES . '/upload/' . $fileName);
            $layer->resizeInPixel(625, 425, false);
            $layer->save(PATH_FILES . '/upload', $fileName, true,null,100);
        }
        if($options['task'] == 'logo_image'){
            $uploadDirectory	= PATH_FILES . '/upload/';
            $fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'logoImage_');
            $layer = ImageWorkshop::initFromPath($uploadDirectory . $fileName);
            $layer->resizeInPixel(220, 55, false);
            $layer->save(PATH_FILES . '/upload', $fileName, true,null,100);
        }
        if($options['task'] == 'slideshow'){
            $uploadDirectory	= PATH_FILES . '/upload/';
            $fileName			= $uploadObj->uploadFile($fileInput, $uploadDirectory, array('task' => 'rename'), 'slideshow_');
            $layer = ImageWorkshop::initFromPath(PATH_FILES . '/upload/' . $fileName);
            $layer->resizeInPixel(623, 424, false);
            $layer->save(PATH_FILES . '/upload', $fileName, true,null,100);
        }
        return $fileName;
	}
	
	public function removeImage($fileName, $options = null){
        if($options['task'] == 'slideshow'){
            $fileMain	= PATH_FILES . '/upload/' . $fileName;
            @unlink($fileMain);
        }
        if($options['task'] == 'bannerMenu'){
            $fileMain	= PATH_FILES . '/upload/' . $fileName;
            @unlink($fileMain);
        }
        if($options['task'] == 'logo_image'){
            $fileMain	= PATH_FILES . '/upload/' . $fileName;
            @unlink($fileMain);
        }
		if($options['task'] == 'product-slide'){
			$fileMain	= PATH_FILES . '/product/' . $fileName;
			@unlink($fileMain);

            $fileMain	= PATH_FILES . '/product/780x434/' . $fileName;
            @unlink($fileMain);
			
			$fileThumb	= PATH_FILES . '/product/98x105/' . $fileName;
			@unlink($fileThumb);
		}
        if($options['task'] == 'posts-category'){
            $fileMain	= PATH_FILES . '/posts-category/' . $fileName;
            @unlink($fileMain);
            $fileMain	= PATH_FILES . '/posts-category/390x217/' . $fileName;
            @unlink($fileMain);
            $fileMain	= PATH_FILES . '/posts-category/176x98/' . $fileName;
            @unlink($fileMain);
            $fileMain	= PATH_FILES . '/posts-category/42x42/' . $fileName;
            @unlink($fileMain);
        }
        if($options['task'] == 'posts'){
            $fileMain	= PATH_FILES . '/posts/' . $fileName;
            @unlink($fileMain);
            $fileMain	= PATH_FILES . '/posts/176x98/' . $fileName;
            @unlink($fileMain);
            $fileMain	= PATH_FILES . '/posts/42x42/' . $fileName;
            @unlink($fileMain);
        }
        if($options['task'] == 'product'){
            $fileMain   = PATH_FILES . '/product/' . $fileName;
            @unlink($fileMain);

            $fileMain   = PATH_FILES . '/product/293x293/' . $fileName;
            @unlink($fileMain);
            
            $fileThumb  = PATH_FILES . '/product/203x235/' . $fileName;
            @unlink($fileThumb);

            $fileThumb  = PATH_FILES . '/product/231x242/' . $fileName;
            @unlink($fileThumb);

            $fileThumb  = PATH_FILES . '/product/100x100/' . $fileName;
            @unlink($fileThumb);
        }

        if($options['task'] == 'category'){
            $fileMain	= PATH_FILES . '/category/' . $fileName;
            @unlink($fileMain);

            $fileThumb	= PATH_FILES . '/category/430x465/' . $fileName;
            @unlink($fileThumb);

            $fileThumb	= PATH_FILES . '/category/215x230/' . $fileName;
            @unlink($fileThumb);

            $fileThumb	= PATH_FILES . '/category/100x100/' . $fileName;
            @unlink($fileThumb);
        }

        if($options['task'] == 'manufacturer'){
            $fileMain	= PATH_FILES . '/manufacturer/' . $fileName;
            @unlink($fileMain);

            $fileThumb	= PATH_FILES . '/manufacturer/120x60/' . $fileName;
            @unlink($fileThumb);
        }
	}
}