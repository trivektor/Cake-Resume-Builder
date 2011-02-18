<?
/*
Created By : Santosh R. Yadav
Created Date : 24-Sep-2010
Company Name : Technomile Software Solution
Email : santosh.yadav.wms@gmail.com */
class FileUploadComponent extends Object {
var $fileType = array('application/msword', );
var $showError;

function uploadFile($data, $inputFileName, $folderName=NULL, $fileName=NULL, $checkSize=NULL, $checkWidth=NULL, $checkHeight=NULL) {
$getModelName = array_keys($data['data']);
$checkType = $this->fileType;
// to check if limitation in height is specified by user //
$errorFilesHeight = $this->checkFileHeight($data, $inputFileName, $checkHeight);
if(!empty($errorFilesHeight)) {
return $errorFilesHeight;
exit;
}
// to check if limitation in width is specified by user //
$errorFilesWidth = $this->checkFileWidth($data, $inputFileName, $checkWidth);
if(!empty($errorFilesWidth)) {
return $errorFilesWidth;
exit;
}
// to check if limitation in size is specified by user //
$errorFilesSize = $this->checkFileSize($data, $inputFileName, $checkSize);
if(!empty($errorFilesSize)) {
return $errorFilesSize;
exit;
}
// to check file type //
$errorFilesType = $this->checkFileType($data, $inputFileName, $checkType);
if(!empty($errorFilesType)) {
return $errorFilesType;
exit;
}

// to check if folder name is specified by user //
if(!empty($folderName)) {
if(!file_exists(WWW_ROOT.$folderName)) {
mkdir(WWW_ROOT.$folderName);
chmod(WWW_ROOT.$folderName, 0777);
}
$destinationFolder = WWW_ROOT.$folderName.DS;
} else {
$destinationFolder = WWW_ROOT.'img'.DS;

}
// to check if file name is changed by user //
if(!empty($fileName)) {
$destinationFile = $fileName;
if(file_exists($destinationFolder.$destinationFile)) {
$fileExistError = 'This File is already exist';
return $this->showError($fileExistError);
exit;
} else {
copy($data['data'][$getModelName[0]][$inputFileName]['tmp_name'], $destinationFolder.$destinationFile);
}
} else {
if(file_exists($destinationFolder.$data['data'][$getModelName[0]][$inputFileName]['name'])) {
$fileExistError = 'This File is already exist';
return $this->showError($fileExistError);
exit;
} else {
copy($data['data'][$getModelName[0]][$inputFileName]['tmp_name'], $destinationFolder.$data['data'][$getModelName[0]][$inputFileName]['name']);
}

}

}

function removeFile($fileName, $folderName=NULL) {
if(!empty($folderName)) {
$destinationFolder = WWW_ROOT.$folderName.DS;
} else {
$destinationFolder = WWW_ROOT.'img'.DS;
}
if(file_exists($destinationFolder.$fileName)) {
unlink($destinationFolder.$fileName);
} else {
$fileDeleteError = 'File Delete Error';
return $this->showError($fileDeleteError);
}
}

function checkFileType($data, $inputFile, $fileType=NULL) {
$getModelName = array_keys($data['data']);
if(!empty($fileType)) {
$getFileType = $data['data'][$getModelName[0]][$inputFile]['type'];
if(!in_array($getFileType,$fileType)) {
$fileTypeError = 'File Type Error';
return $this->showError($fileTypeError);
}
}
}

function checkFileSize($data, $inputFile, $fileSize=NULL) {
$getModelName = array_keys($data['data']);
if(!empty($fileSize)) {
$getFileSize = $data['data'][$getModelName[0]][$inputFile]['size']/1024;
if($getFileSize > $fileSize) {
$fileSizeError = 'File size Error';
return $this->showError($fileSizeError);
}
}
}

function checkFileWidth($data, $inputFile, $fileWidth=NULL) {
$getModelName = array_keys($data['data']);
$getFileDim = getimagesize($data['data'][$getModelName[0]][$inputFile]['tmp_name']);
if(!empty($fileWidth)) {
if($getFileDim[1] > $fileWidth) {
$fileWidthError = 'File Width Error';
return $this->showError($fileWidthError);
}
}
}

function checkFileHeight($data, $inputFile, $fileHeight=NULL) {
$getModelName = array_keys($data['data']);
$getFileDim = getimagesize($data['data'][$getModelName[0]][$inputFile]['tmp_name']);
if(!empty($fileHeight)) {
if($getFileDim[0] > $fileHeight) {
$fileHightError = 'File height Error';
return $this->showError($fileHightError);
}
}
}

function showError($errorDisplay) {
if(!empty($errorDisplay)) {
$this->showError = $errorDisplay;
return $this->showError;

}
}

}
?>