<?php

namespace App\Core;

class Router
{
    private $routes = [];
    private $params = [];

    // Ajouter une route
    public function add($route, $params = [])
    {
        $this->routes[$route] = $params;
    }

    // Obtenir les paramètres de la route
    public function getParams()
    {
        return $this->params;
    }

    // Vérifier si une route correspond à l'URL
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if ($this->compare($route, $url, $params)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    // Comparer une route avec l'URL
    private function compare($route, $url, &$params)
    {
        $routeParts = explode('/', trim($route, '/'));
        $urlParts = explode('/', trim($url, '/'));

        if (count($routeParts) != count($urlParts)) {
            return false;
        }

        foreach ($routeParts as $key => $part) {
            if (strpos($part, '{') === false) {
                if ($part != $urlParts[$key]) {
                    return false;
                }
            } else {
                $params[trim($part, '{}')] = $urlParts[$key];
            }
        }

        return true;
    }
}
