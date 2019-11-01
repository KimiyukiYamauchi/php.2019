<?php 

namespace MyApp;

class ImageUploader {

    private $_imageFileName;
    private $_imageType;

    public function upload() {
        try {
            // error check
            $this->_validateUpload();

            // type check
            $ext = $this->_validateImageType();
            /* var_dump($ext); */
            /* exit; */

            // save
            $savepath = $this->_save($ext);

            // create thumbnail
            $this->_createThumbnail($savepath);

        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
        // redirect
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/bbs');
        exit;
    }

    private function _createThumbnail($savepath) {
        $imagesize = getimagesize($savepath);
        $width = $imagesize[0];
        $height = $imagesize[1];

        if ($width > THUMBNAIL_WIDTH) {
            $this->_createThumbnailMain($savepath, $width, $height);
        }
    }

    private function _createThumbnailMain($savepath, $width, $height) {
        switch($this->imageType) {
            case IMAGETYPE_GIF:
                $srcImage = imagecreatefromgif($savepath);
                break;
            case IMAGETYPE_JPEG:
                $srcImage = imagecreatefromjpeg($savepath);
                break;
            case IMAGETYPE_PNG:
                $srcImage = imagecreatefrompng($savepath);
                break;
        }
        $thumbHeight = round($height * THUMBNAIL_WIDTH / $width);
        $thumbImage = imagecreatetruecolor(THUMBNAIL_WIDTH, $thumbHeight);
        imagecopyresampled($thumbImage, $srcImage, 0, 0, 0, 0, THUMBNAIL_WIDTH, $thumbHeight, $width, $height);

        switch($this->imageType) {
        case IMAGETYPE_GIF:
            imagegif($thumbImage, THUMBNAIL_DIR . '/' . $this->imageFileName);
            break;
        case IMAGETYPE_JPEG:
            imagejpeg($thumbImage, THUMBNAIL_DIR . '/' . $this->imageFileName);
            break;
        case IMAGETYPE_PNG:
            imagepng($thumbImage, THUMBNAIL_DIR . '/' . $this->imageFileName);
            break;
        }
    }

    private function _save($ext) {
        $this->imageFileName = sprintf(
            '%s_%s.%s',
            time(),
            sha1(uniqid(mt_rand(), true)),
            $ext
        );
        $savepath = IMAGES_DIR . '/' . $this->imageFileName;
        $res = move_uploaded_file($_FILES['image']['tmp_name'], $savepath);
        if ($res === false) {
            throw new \Exception('Could not upload!');
        }

        return $savepath;
    }

    private function _validateImageType() {
        $this->imageType = exif_imagetype($_FILES['image']['tmp_name']);
        switch($this->imageType) {
            case IMAGETYPE_GIF:
                return 'gif';
            case IMAGETYPE_JPEG:
                return 'jpg';
            case IMAGETYPE_PNG:
                return 'png';
            default:
                throw new \Exception('PNG/JPEG/GIF only!');
        }
    }

    private function _validateUpload() {
        /* var_dump($_FILES); */
        /* exit; */

        if (!isset($_FILES['image']) || !isset($_FILES['image']['error'])) {
            throw new \Exception('Upload Error');
        }

        switch($_FILES['image']['error']) {
            case UPLOAD_ERR_OK:
                return true;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new \Exception('File too large!');
            default:
                throw new \Exception('Err: ' . $_FILES['image']['error']);
        }

    }
}
