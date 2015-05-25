<?php

namespace App\Controllers;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class UserController
{

    protected $UserService;

    public function __construct($service)
    {
        $this->UserService = $service;
    }

    public function getAll()
    {
        return new JsonResponse($this->UserService->getAll());
    }

    public function save(Request $request)
    {

        $user = $this->getDataFromRequest($request);
        return new JsonResponse(array("id" => $this->UserService->save($user)));

    }

    public function update($id, Request $request)
    {
        $user = $this->getDataFromRequest($request);
        $this->UserService->update($id, $user);
        return new JsonResponse($user);

    }

    public function delete($id)
    {

        return new JsonResponse($this->UserService->delete($id));

    }

    public function getDataFromRequest(Request $request)
    {
        return $user = array(
            "user" => $request->request->get("user")
        );
    }
}
