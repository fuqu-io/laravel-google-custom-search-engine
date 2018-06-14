<?php

namespace JanDrda\LaravelGoogleCustomSearchEngine;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider{
	CONST SHORT_NAME = 'jandra-gsearch';

	public function boot(){
		$this->publishes([__DIR__ . '/../config/main.php' => config_path(self::SHORT_NAME . '.php')], 'config');
	}

	public function register(){
		$this->app->bind(Engine::class, function (){

			$google_cse_id  = config(SELF::SHORT_NAME . '.engineId');
			$google_api_key = config(self::SHORT_NAME . '.apiKey');

			return new Engine($google_cse_id, $google_api_key);
		});
	}
}
