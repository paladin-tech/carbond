<?php

class Helper extends CApplicationComponent
{

	public static function getYearsArray()
	{

		$yearArray = array();
		for($year = date('Y'); $year >= 1950; $year--)
		{
			$yearArray[$year] = $year;
		}
		return $yearArray;

	}

	public static function getVehicleTypeData($vehicleTypeId)
	{

		$vehicleTypeName              = VehicleType::model()->findByPk($vehicleTypeId)->vehicle_type;
		$modelClass                   = str_replace(' ', '', ucwords($vehicleTypeName));
		$vehicleType                  = lcfirst(str_replace(' ', '', ucwords($modelClass)));
		$vehicleTypeName              = ucwords($vehicleTypeName);

		return array('vehicleTypeId' => $vehicleTypeId, 'vehicleTypeName' => $vehicleTypeName, 'modelClass' => $modelClass, 'vehicleType' => $vehicleType);

	}

	public static function getRoleList($userRoles)
	{

		$roleListArray = array(
			'isPhysicalPerson'             => false,
			'isCompanyTrial'               => false,
			'isCompanyRegistered'          => false,
			'isVehicleDistributor'         => false,
			'isVehicleOfficialDistributor' => false,
			'isOfficialService'            => false,
			'isUnofficialService'          => false,
		);

		foreach($userRoles as $roleId => $roleName)
		{

			switch (array_keys($roleName)[0])
			{
				case 1:
					$roleListArray['isPhysicalPerson'] = true;
					break;
				case 2:
					$roleListArray['isCompanyTrial'] = true;
					break;
				case 3:
					$roleListArray['isCompanyRegistered'] = true;
					break;
				case 4:
					$roleListArray['isVehicleDistributor'] = true;
					break;
				case 5:
					$roleListArray['isVehicleOfficialDistributor'] = true;
					break;
				case 6:
					$roleListArray['isOfficialService'] = true;
					break;
				case 7:
					$roleListArray['isUnofficialService'] = true;
					break;
			}
		}

		return $roleListArray;

	}

}