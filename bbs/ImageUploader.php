<?php 

namespace MyApp;

class ImageUploader {

    public function upload() {
        try {
            // error check
            $this->_validateUpload();

            // type check
            // save
            // create thumbnail
        } catch(\Exception $e) {
            echo $e->geMessage();
            exit;
        }
        // redirect
        header('Location: http://' . $_SERVER['HTTP_HOST'] . 'bbs');
        exit;
    }

    private function _validateUpload() {
        var_dump($_FILES);
        exit;

    }
}
