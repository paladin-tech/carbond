<?php

Yii::import('application.extensions.image.Image');

class PhotoController extends Controller
{

	public static function savePhotos($modelPhotoArray, $fileData, $vehicleId)
	{
		foreach ($modelPhotoArray as $i => $photo) {

			$fileName = $fileData['Photo']['name'][$i]['file_name'];
			if ($fileName != '') {
				$photo->vehicle_id = $vehicleId;
				$photo->file_name  = $fileName;
				if ($photo->validate()) {
					$photo->save(false);
					$imageFile          = 'images/vehicle/normal/vehicle-' . $vehicleId . '-' . $fileName;
					$imageFileThumb     = 'images/vehicle/thumb/vehicleThumb-' . $vehicleId . '-' . $fileName;
					$imageFileTinyThumb = 'images/vehicle/tinyThumb/vehicleTinyThumb-' . $vehicleId . '-' . $fileName;
					$image              = CUploadedFile::getInstanceByName("Photo[$i][file_name]");
					$image->saveAs($imageFile);
					$imageResized = new Image($imageFile);
					$imageResized->resize('100', '100');
					$imageResized->save($imageFileThumb);
					$imageResized->resize('60', '60');
					$imageResized->save($imageFileTinyThumb);
				}
			}
		}
	}

}