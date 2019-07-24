<?php
namespace Core;

class Application
{
    public function run()
    {
        $url = (isset($_GET['url']) ? '/' . $_GET['url'] : '/');
        $url = $this->router($url);
		$params = array();

		if (!empty($url) && $url != '/') {
			$url = explode('/', $url);
			array_shift($url);

			$currentController = ucfirst($url[0] . 'Controller');
			array_shift($url);

			if (isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

            $params = count($url) > 0 ? $url : array();
		} else {
			$currentController = 'HomeController';
			$currentAction = 'index';
		}

		$prefix = '\Controllers\\';

		if (!file_exists('controllers/' . $currentController . '.php') ||
			!method_exists($prefix . $currentController, $currentAction)) {
			$currentController = 'NotFoundController';
			$currentAction = 'index';
		}

		$newController = $prefix . $currentController;
		$controller = new $newController;
		call_user_func_array(array($controller, $currentAction), $params);
	}

    private function router($url)
    {
        global $routes;
		foreach ($routes as $pt => $newurl) {

			// Identifies the arguments and substitutes for regex
			$pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);

			// Matches the URL
			if (preg_match('#^(' . $pattern . ')*$#i', $url, $matches) === 1) {
				array_shift($matches);
				array_shift($matches);

				// Get all arguments to associate
				if (preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
					$itens = preg_replace('(\{|\})', '', $m[0]);
				}

				// Do the association
				foreach ($matches as $key => $match) {
					$arg[$itens[$key]] = $match;
				}

				// Generates the new url
				foreach ($arg as $argkey => $argvalue) {
					$newurl = str_replace(':' . $argkey, $argvalue, $newurl);
				}
				$url = $newurl;
				break;
			}
        }

		return $url;
	}
}