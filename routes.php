<?php
use System\Classes\UpdateManager;
use System\Models\PluginVersion;
use Mcore\ClientMonitor\Models\MonitorSetting;
use Illuminate\Http\Request;


Route::post('/monitoring-api/client-info', function(Request $request) {

	$responseJson = [];
	$api_token = post('api_token');
	$api_key = MonitorSetting::get('api_key');
	
	$domain = $request->getScheme().'://'.$request->getHost();    
    
    if($api_token === $api_key) {
    	
	    $projectVersion = UpdateManager::instance()->getCurrentVersion();
	    $pluginVersionList = PluginVersion::get()
	    ->keyBy('code')
	    ->map(function ($record) {
	        return [
	            'code' => $record->code,
	            'name' => $record->name,
	            'description' => $record->description,
	            'author' => $record->author,
	            'version' => $record->version,
	            'is_frozen' => $record->is_frozen,
	            'is_disabled' => $record->is_disabled,
	        ];
	    })
	    ->toArray();

	    $responseJson = [
	    	'domain' => $domain,
	    	'version' => $projectVersion,
	    	'plugins' => $pluginVersionList,
	    ];
    }

    return response()->json($responseJson);
});


Route::post('/monitoring-api/client-ping', function() {
    
    $statusCode = 400;
    $api_token = post('api_token');
    $api_key = MonitorSetting::get('api_key');

    if($api_token === $api_key) {	
    	$statusCode = 201;
	    return response(['statusCode' => $statusCode, 'message' => $api_key], $statusCode);
    }
	
    return response(['statusCode' => $statusCode, 'message' => 'Wrong api key'], $statusCode);
});
