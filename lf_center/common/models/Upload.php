<?php
namespace common\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;


/**
 * 文件上传处理
 */
class Upload extends Model
{   
    public $file;


    private $_appendRules;


    public function init() 
    {
        parent::init();
        $extensions = Yii::$app->params['webuploader']['baseConfig']['accept']['extensions'];
        $this->_appendRules = [
            [['file'], 'file', 'extensions' => $extensions],
        ];
    }


    public function rules()
    {
        $baseRules = [];
        return array_merge($baseRules, $this->_appendRules);
    }


    /**
     * 图片上传过程
     */
    public function upImage()
    {
        $model = new static;
        $model->file = UploadedFile::getInstanceByName('file');
        if (!$model->file) {
            return false;
        }

        $relativePath = $successPath = '';


        if ($model->validate()) {
            $relativePath = Yii::$app->params['imageUploadRelativePath'];
            $successPath = Yii::$app->params['imageUploadSuccessPath'];
            // $baseName = \Yii::$app->user->identity->id;
            // $fileName = $baseName . '.' . $model->file->extension;
            $fileName = $model->file->baseName . '.' . $model->file->extension;
            
            if (!is_dir($relativePath)) {
                FileHelper::createDirectory($relativePath);    
            }

            $model->file->saveAs($relativePath . $fileName);

            return [
                'code' => 0,
                'url' => Yii::$app->params['domain'] . $successPath . $fileName,
                'attachment' => $fileName
            ];
        } else {
            $errors = $model->errors;
            return [
                'code' => 1,
                'msg' => current($errors)[0]
            ];
        }
    }
}