<?php

include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/PackageController.php";
include_once "control/DeliveryController.php";

class ResourceController
{

	private $controlMap = 
	[
		"package" => "PackageController",
		"user" => "UserController",
		"delivery" => "DeliveryController",
	];

	public function createResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->register($request);
	}

	public function searchResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->search($request);
	}
}