<?php
  /*
   *  RouteMap for application. This is not properly set up yet.
   */

  class CMHLRouteMap extends SparkLib\Application\RouteMap {
    public $defaultToSSL = false;
    public $redirectSSL = false;
    public $directRoutes = array(
      '{^ /teams/ (?<id> [a-z0-9_]+) /? $}ix' => array('teams', 'view'),
      '{^ /players/ (?<id> [a-z0-9\-]+) \/?$}ix' => array('players', 'view'),
      '{^ /rosters/ (?<id> [a-z0-9\-]+) \/?$}ix' => array('rosters', 'view'),
    );

    public $routes = array(
      'GET' => array(
        'shortlink' => 'view',
        'action/id' => null,
        'bson'      => 'view',
      ),
      'POST' => array(
        'bson'      => 'update',
      ),
    );
  }
