<?php

include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/PackageController.php";


class ResourceController
{

	private $controlMap = 
	[
		"package" => "PackageController",
		"user" => "UserController",
	];

	public function createResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->register($request);
	}

	public function searchResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->search($request);
	}

	public function updateResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->update($request);
	}

	public function deleteResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->delete($request);
	}
}