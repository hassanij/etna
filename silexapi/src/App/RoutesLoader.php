<?php

namespace App;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['user.controller'] = $this->app->share(function () {
            return new Controllers\userController($this->app['user.service']);
        });
    }
	//Routes url
    public function bindRoutesToControllers()
    {
        $api = $this->app["controllers_factory"];

        $api->get('/user', "user.controller:getAll");
        $api->post('/user', "user.controller:save");
        $api->put('/user/{id}', "user.controller:update");
        $api->delete('/user/{id}', "user.controller:delete");

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $api);
    }
}

