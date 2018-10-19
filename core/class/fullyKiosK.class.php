<?php

/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/
/*


/* * ***************************Includes********************************* */
require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';

class fullyKiosK extends eqLogic {
	public static $_widgetPossibility = array('custom' => true);
	/*     * *************************Attributs****************************** */

	public static $_infosMap = array();
	public static $_actionMap = array();
	/*     * ***********************Methode static*************************** */

	/*
	* Fonction exécutée automatiquement toutes les minutes par Jeedom
	public static function cron() {

	}

	*/

	
	
	public static function initInfosMap(){

		self::$_actionMap = array(
			'screenOn' => array(
				'name' => __('Allumer écran',__FILE__),
				'cmd' => 'screenOn',
			),
			'screenOff' => array(
				'name' => __('Eteindre écran',__FILE__),
				'cmd' => 'screenOff',
			),
			//'screenOff3' => array(
			//	'name' => __('Eteindre écran3',__FILE__),
			//	'cmd' => 'screenOff3',
			//	'icon' => '<i class="icon animal-spotted1">meuuh</i>',
			//),
			'clearCache' => array(
				'name' => __('Vider cache',__FILE__),
				'cmd' => 'clearCache',
			),	
			'clearCookies' => array(
				'name' => __('Supprimer cookies',__FILE__),
				'isvisible' => false,				
				'cmd' => 'clearCookies',
			),			
			'forceSleep' => array(
				'name' => 'forceSleep',
				'cmd' => 'forceSleep',
			),	
			'startScreensaver' => array(
				'name' => __('Ecran de veille',__FILE__),
				'cmd' => 'startScreensaver',
			),	
			'stopScreensaver' => array(
				'name' => __('Arrêter écran veille',__FILE__),
				'cmd' => 'stopScreensaver',
			),	
			'startDaydream' => array(
				'name' => 'startDaydream',
				'isvisible' => false,
				'cmd' => 'startDaydream',
			),	
			'stopDaydream' => array(
				'name' => 'stopDaydream',
				'isvisible' => false,
				'cmd' => 'stopDaydream',
			),	

			'enableLockedMode' => array(
				'name' => __('Activer mode maintenance',__FILE__),
				'isvisible' => false,				
				'cmd' => 'enableLockedMode',
			),
	
			'disableLockedMode' => array(
				'name' => __('Désactiver mode maintenance',__FILE__),
				'isvisible' => false,				
				'cmd' => 'disableLockedMode',
			),
				
			'popFragment' => array(
				'name' => __('Retourner vue web',__FILE__),
				'isvisible' => false,
				'cmd' => 'popFragment',
			),	

			'loadStartURL' => array(
				'name' => __('Lancer URL de démarrage',__FILE__),
				'cmd' => 'loadStartURL',
			),
			'restartApp' => array(
				'name' => __('Redémarrer application',__FILE__),
				'cmd' => 'restartApp',
			),
			'exitApp' => array(
				'name' => __('Quitter application',__FILE__),
				'cmd' => 'exitApp',
			),
	
			'triggerMotion' => array(
				'name' => __('Simuler mouvement',__FILE__),
				'isvisible' => false,
				'cmd' => 'triggerMotion',
			),
			'toForeground' => array(
				'name' => __("Basculer vers fully",__FILE__),
				'isvisible' => false,				
				'cmd' => 'toForeground',
			),
			'JavascriptOn' => array(
				'name' => __("Activer Javascript",__FILE__),
				'isvisible' => false,				
				'cmd' =>  "setBooleanSetting&key=websiteIntegration&value=true",
			),
			'JavascriptOff' => array(
				'name' => __("Désactiver Javascript",__FILE__),
				'isvisible' => false,			
				'cmd' =>  "setBooleanSetting&key=websiteIntegration&value=false",
			),			
			'loadURL' => array(
				'name' => __('Charger URL',__FILE__),
				'cmd' => 'loadURL&url=#title#',
				'subtype' => 'message',
				'message_disable' => true,
				'forceReturnLineBefore' => true,

			),
			'javascript' => array(
				'name' => __('Commande javascript',__FILE__),
				'cmd' => 'loadURL&url=javascript:#title#',
				'message_placeholder' => "exemple: fully.setStartUrl('url')",
				'subtype' => 'message',
				'title_possibility_list' => array(
					'fully.turnScreenOn()',
					'fully.turnScreenOff() ',
					'fully.turnScreenOff(boolean keepAlive) ',
					'fully.forceSleep()',
					'fully.showToast(String text) ',
					'fully.setScreenBrightness(float level)',
					'fully.enableWifi()',
					'fully.disableWifi()',
					'fully.showKeyboard()',
					'fully.hideKeyboard()',
					'fully.openWifiSettings()',
					'fully.openBluetoothSettings()',
					'fully.vibrate()',
					'fully.textToSpeech(String text)',
					'fully.textToSpeech(String text, String locale)',
					'fully.playVideo(String url, boolean loop, boolean showControls, boolean exitOnTouch, boolean exitOnCompletion)',
					'fully.setAudioVolume(int level, int streamType)',
					'fully.playSound(String url, boolean loop)',
					'fully.stopSound()',
					'fully.showPdf(String url) ',
					'fully.loadStartUrl()',
					'fully.setActionBarTitle(String text)',
					'fully.startScreensaver()',
					'fully.stopScreensaver()',
					'fully.startDaydream()',
					'fully.stopDaydream()',
					'fully.addToHomeScreen()',
					'fully.print()',
					'fully.exit()',
					'fully.restartApp()',
					'fully.clearCache()',
					'fully.clearFormData()',
					'fully.clearHistory()',
					'fully.clearCookies()',
					'fully.clearWebstorage()',
					'fully.focusNextTab()  ',
					'fully.focusPrevTab()',
					'fully.focusTabByIndex(int index)',
					'fully.startApplication(String packageName)',
					'fully.startApplication(String packageName, String action, String url)',
					'fully.startIntent(String url)',
					'fully.bringToForeground()',
					'fully.bringToForeground(long millis)',
					'fully.setStartUrl(String url)',
					'fully.getAudioVolume(int streamType)',
				),
					
				'title_disable' => false,
				'message_disable' => true,
			),	
			'startApplication' => array(
				'name' => __('Démarrer application',__FILE__),
				'cmd' => 'startApplication&package=#title#',
				'subtype' => 'message',
				'message_disable' => true,

			),
			'getCamshot' => array(
				'name' => __('Enregister image cam',__FILE__),
				'cmd' => 'getCamshot',
				'subtype' => 'message',
				'message_placeholder' => __('camshot.jpg par défaut',__FILE__),	
				'title_placeholder' => __('/var/www/html/plugins/fullyKiosK/resources/ par défaut',__FILE__),	
			
			),	
	
			'loadTab' => array(
				'name' => __('Charger onglet N°',__FILE__),
				'cmd' => "focusTabByIndex&index=#title#",
				'title_placeholder' => '0 = premier onglet',
				'subtype' => 'message',
				'message_disable' => true,

			),
		// /?cmd=playSound&url=[url]&loop=[true|false]&password=[pass]
			'playSound' => array(
				'name' => __('Jouer musique/son',__FILE__),
				'cmd' => "playSound&url='#title#'",
				'subtype' => 'message',
				'title_placeholder' => __('URL musique/son',__FILE__),
				'message_disable' => true,
			),
	
			'stopSound' => array(
				'name' => __('Arrêter musique',__FILE__),
				'cmd' => "stopSound",
			),
			
			'textToSpeech' => array(
				'name' => __('Envoyer TTS',__FILE__),
				'cmd' => "textToSpeech&text='#title#'",
				'subtype' => 'message',
				'title_placeholder' => __('Message à envoyer',__FILE__),
				'message_disable' => true,

			),
			'TTS_javascript' => array(
				'name' => __('TTS javascript',__FILE__),
				'cmd' => 'loadURL&url=javascript:fully.textToSpeech("#message#","#title#")',
				'message_placeholder' => "Message à envoyer",
				'title_placeholder' => "fr_FR pour le français",
				'subtype' => 'message',
				'title_possibility_list' => array(
                                 'fr_FR',
                                 'en_EN',
                                 'es_ES',
			         'de_DE',)
					
				//'title_disable' => true,
			),	
			'setAudioVolume' => array(
				'name' => __('Changer volume tablette',__FILE__),
				'cmd' => "setAudioVolume&level=#message#&stream=#title#",
				'subtype' => 'message',
				'message_placeholder' => __('Volume 0-100',__FILE__),
				'title_placeholder' => __('stream 0-10',__FILE__),
				'title_possibility_list' => array(
				 '0 Volume voix appel', 
			         '1 Système',
			         '2 Sonnerie',
				 '3 Média',
				 '4 Alarme',
				 '5 Notification',
				 '8 DMTF',
				 '10 Accessibilité',	
					
				),
/*

STREAM_ACCESSIBILITY
added in API level 26
public static final int STREAM_ACCESSIBILITY
Used to identify the volume of audio streams for accessibility prompts

Constant Value: 10 (0x0000000a)

STREAM_ALARM
added in API level 1
public static final int STREAM_ALARM
Used to identify the volume of audio streams for alarms

Constant Value: 4 (0x00000004)

STREAM_DTMF
added in API level 5
public static final int STREAM_DTMF
Used to identify the volume of audio streams for DTMF Tones

Constant Value: 8 (0x00000008)

STREAM_MUSIC
added in API level 1
public static final int STREAM_MUSIC
Used to identify the volume of audio streams for music playback

Constant Value: 3 (0x00000003)

STREAM_NOTIFICATION
added in API level 3
public static final int STREAM_NOTIFICATION
Used to identify the volume of audio streams for notifications

Constant Value: 5 (0x00000005)

STREAM_RING
added in API level 1
public static final int STREAM_RING
Used to identify the volume of audio streams for the phone ring

Constant Value: 2 (0x00000002)

STREAM_SYSTEM
added in API level 1
public static final int STREAM_SYSTEM
Used to identify the volume of audio streams for system sounds

Constant Value: 1 (0x00000001)

STREAM_VOICE_CALL
added in API level 1
public static final int STREAM_VOICE_CALL
Used to identify the volume of audio streams for phone calls

Constant Value: 0 (0x00000000)

*/
				'title_disable' => false,

			),

			'setBooleanSetting' => array(
				'name' => __('Paramètre true/false',__FILE__),
				'title_placeholder' => __('Choisir paramètre',__FILE__),
				'message_placeholder' => __('true ou false',__FILE__),	
				'cmd' => "setBooleanSetting&key=#title#&value=#message#",
				'title_possibility_list' => array(
                                 'setRemoveSystemUI',
                                 'showMenuHint',
                                 'screenOffInDarkness',
				'useWideViewport',
				'geoLocationAccess',
				'launchOnBoot',
				'showBackButton',
				'enablePullToRefresh',
				'ignoreMotionWhenMoving',
				'kioskHomeStartURL',
				'disableCamera',
				'keepSleepingIfUnplugged',
				'microphoneAccess',
				'actionBarInSettings',
				'remoteAdminLan',
				'desktopMode',
				'thirdPartyCookies',
				'knoxDisableStatusBar',
				'disablePowerButton',
				'reloadOnInternet',
				'screensaverFullscreen',
				'pageTransitions',
				'playAlarmSoundUntilPin',
				'showAppLauncherOnStart',
				'usageStatistics',
				'movementDetection',
				'restartOnCrash',
				'sleepOnPowerConnect',
				'readNfcTag',
				'swipeNavigation',
				'screenOnOnMovement',
				'acra.legacyAlreadyConvertedToJson',
				'sleepOnPowerDisconnect',
				'knoxDisableUsbHostStorage',
				'deleteHistoryOnReload',
				'autoplayVideos',
				'loadOverview',
				'enableZoom',
				'reloadOnWifiOn',
				'advancedKioskProtection',
				'motionDetectionAcoustic',
				'reloadOnScreenOn',
				'enableBackButton',
				'mdmDisableUsbStorage',
				'setWifiWakelock',
				'lockSafeMode',
				'deleteWebstorageOnReload',
				'knoxDisableMtp',
				'audioRecordUploads',
				'showHomeButton',
				'autoplayAudio',
				'showPrintButton',
				'knoxDisableScreenCapture',
				'enableVersionInfo',
				'forceScreenUnlock',
				'waitInternetOnReload',
				'disableVolumeButtons',
				'showStatusBar',
				'disableStatusBar',
				'detectIBeacons',
				'screensaverDaydream',
				'videoCaptureUploads',
				'stopScreensaverOnMovement',
				'webcamAccess',
				'knoxDisableSafeMode',
				'disableOtherApps',
				'playAlarmSoundOnMovement',
				'forceImmersive',
				'enableTapSound',
				'showActionBar',
				'ignoreJustOnceLauncher',
				'remoteAdmin',
				'keepScreenOn',
				'cameraCaptureUploads',
				'showCamPreview',
				'pauseMotionInBackground',
				'setCpuWakelock',
				'softKeyboard',
				'enablePopups',
				'mdmDisableStatusBar',
				'textSelection',
				'fileUploads',
				'jsAlerts',
				'disableHomeButton',
				'webviewDebugging',
				'showNavigationBar',
				'showAddressBar',
				'mdmDisableScreenCapture',
				'autoImportSettings',
				'motionDetection',
				'kioskMode',
				'singleAppMode',
				'enableUrlOtherApps',
				'cloudService',
				'isRunning',
				'websiteIntegration',
				'reloadOnScreensaverStop',
				'deleteCookiesOnReload',
				'knoxDisableCamera',
				'knoxEnabled',
				'showProgressBar',
				'formAutoComplete',
				'playMedia',
				'showRefreshButton',
				'stopScreensaverOnMotion',
				'redirectBlocked',
				'showForwardButton',
				'mdmDisableADB',
				'restartAfterUpdate',
				'enableFullscreenVideos',
				'clearCacheEach',
				'confirmExit',
				'ignoreSSLerrors',
				'runInForeground',
				'deleteCacheOnReload',
				'screenOnOnMotion') ,
				'subtype' => 'message',

			),
	
			'setStringSetting' => array(
				'name' => __('Paramètre valeur',__FILE__),
				'title_placeholder' => __('Choisir paramètre',__FILE__),
				'message_placeholder' => __('valeur',__FILE__),					
				'cmd' => "setStringSetting&key='#title#'&value=#message#",
				'subtype' => 'message',
				'title_possibility_list' => array(
				        'wifiKey',
                                         'movementBeaconList',
                                         'authUsername',
                                         'motionSensitivity',
                                         'remoteAdminPassword',
                                         'graphicsAccelerationMode',
                                         'authPassword',
                                         'addressBarBgColor',
                                         'motionSensitivityAcoustic',
                                         'kioskWifiPin',
                                         'wifiSSID',
                                         'darknessLevel',
                                         'cacheMode',
                                         'movementBeaconDistance',
                                         'screensaverBrightness',
                                         'alarmSoundFileUrl',
                                         'actionBarTitle',
                                         'urlBlacklist',
                                         'appLauncherScaling',
                                         'timeToScreensaverV2',
                                         'remotePdfFileMode',
                                         'mdmApkToInstall',
                                         'startURL',
                                         'actionBarBgColor',
                                         'compassSensitivity',
                                         'searchProviderUrl',
                                         'defaultWebviewBackgroundColor',
                                         'reloadPageFailure',
                                         'actionBarIconUrl',
                                         'initialScale',
                                         'actionBarBgUrl',
                                         'acra.lastVersionNr',
                                         'actionBarFgColor',
                                         'fadeInOutDuration',
                                         'reloadEachSeconds',
                                         'accelerometerSensitivity',
                                         'kioskExitGesture',
                                         'kioskAppWhitelist',
                                         'screensaverWallpaperURL',
                                         'forceScreenOrientation',
                                         'kioskPin',
                                         'appLauncherBackgroundColor',
                                         'motionCameraId',
                                         'urlWhitelist',
                                         'volumeLicenseKey',
                                         'launcherInjectCode',
                                         'sleepSchedule',
                                         'timeToScreenOffV2',
                                         'statusBarColor',
                                         'lastVersionInfo',
                                         'screensaverPlaylist',
                                         'launcherApps',
                                         'batteryWarning',
                                         'localPdfFileMode',
                                         'navigationBarColor',
                                         'motionFps',
                                         'errorURL',
                                         'screenBrightness',
                                         'remoteFileMode',
                                         'fontSize',
                                         'singleAppIntent',
                                         'userAgent')


			),

	
			'Refresh' => array(
				'name' => 'Refresh',
				'cmd' => 'deviceInfo&type=json&password=#password#',

			),			
		);

		self::$_infosMap = array(
	 		//'default' => array(
	 		//	'type' => 'info',
	 		//	'subtype' => 'numeric',
	 		//	'isvisible' => true,
	 		//	'restkey' =>'',
	 		//),
	
			'batteryLevel' => array(
				'name' => __('Batterie',__FILE__),
				'type' => 'info',
				'icon' => '<i class="fa jeedom-batterie2"></i>',
				'subtype' => 'numeric',
				'isvisible' => true,
				'unite' => '%',
				'restkey' => 'batteryLevel',

			),	
			'wifiSignalLevel' => array(
				'name' => __('Niveau Wifi',__FILE__),
				'type' => 'info',
				'subtype' => 'numeric',
				'isvisible' => true,
				'restkey' => 'wifiSignalLevel',

			),	
			'motionDetectorState' => array(
				'name' => __('Détection mouvement',__FILE__),
				'type' => 'info',
				'subtype' => 'numeric',
				'isvisible' => false,
				'restkey' => 'motionDetectorState',

			),				
			'displayHeightPixels' => array(
				'name' => __('Résolution écran, hauteur',__FILE__),
				'type' => 'info',
				'subtype' => 'numeric',
				'isvisible' => false,
				'restkey' => 'displayHeightPixels',

			),		 		
			'displayWidthPixels' => array(
				'name' => __('Résolution écran, largeur',__FILE__),
				'type' => 'info',
				'subtype' => 'numeric',
				'isvisible' => false,
				'restkey' => 'displayWidthPixels',

			),	 	 		
			'appFreeMemory' => array(
				'name' => __('Mémoire disponible',__FILE__),
				'type' => 'info',
				'subtype' => 'numeric',
				'isvisible' => false,
				'restkey' => 'appFreeMemory',

			),	 			 		
			'appUsedMemory' => array(
				'name' => __('Mémoire utilisée par application',__FILE__),
				'type' => 'info',
				'subtype' => 'numeric',
				'isvisible' => false,
				'restkey' => 'appUsedMemory',

			),	 			 		
			'totalFreeMemory' => array(
				'name' => __('Mémoire disponible totale',__FILE__),
				'type' => 'info',
				'subtype' => 'numeric',
				'isvisible' => false,
				'restkey' => 'totalFreeMemory',

			),	 			 		
			'totalUsedMemory' => array(
				'name' => __('Utilisation mémoire totale',__FILE__),
				'type' => 'info',
				'subtype' => 'numeric',
				'isvisible' => false,
				'restkey' => 'totalUsedMemory',

			),
			'currentTabIndex' => array(
				'name' => __('onglet Actuel',__FILE__),
				'type' => 'info',
				'subtype' => 'numeric',
				'isvisible' => false,
				'restkey' => 'currentTabIndex',

			),			
			'plugged' => array(
				'name' => __('Branché',__FILE__),
				'type' => 'info',
				'subtype' => 'binary',
				'isvisible' => true,
				//'icon' => '<i class="fa techno-charging"></i>',
				'restkey' => 'plugged',

			),
	 		
			'kioskMode' => array(
				'name' => __('Mode kiosque',__FILE__),
				'type' => 'info',
				'subtype' => 'binary',
				'isvisible' => true,
				'restkey' => 'kioskMode',

			),
			'isScreenOn' => array(
				'name' => __('Ecran allumé',__FILE__),
				'type' => 'info',
				'subtype' => 'binary',
				'isvisible' => true,
				'restkey' => 'isScreenOn',

			),
	 		'keyguardLocked' => array(
				'name' => __('Verrouillage keyguard',__FILE__),
				'type' => 'info',
				'subtype' => 'binary',
				'isvisible' => false,
				'restkey' => 'keyguardLocked',

			),
	 		'isDeviceAdmin' => array(
				'name' => __('Administrateur tablette',__FILE__),
				'type' => 'info',
				'subtype' => 'binary',
				'isvisible' => false,
				'restkey' => 'isDeviceAdmin',

			),
	 		'deviceModel' => array(
				'name' => __('Modèle équipement',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => true,
				'restkey' => 'deviceModel',

			),
			
	 		'foregroundApp' => array(
				'name' => __('Application en cours',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => true,
				'restkey' => 'foregroundApp',

			),

			
	 		'appVersionName' => array(
				'name' => __('Version',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => false,
				'restkey' => 'appVersionName',

			),
			
	 		'ssid' => array(
				'name' => "ssid",
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => false,
				'restkey' => 'ssid',

			),
	 		'deviceManufacturer' => array(
				'name' => __('Fabricant',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => false,
				'restkey' => 'deviceManufacturer',

			),

	 		'ip4' => array(
				'name' => "ip",
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => true,
				'restkey' => 'ip4',

			),
			
	 		'locationProvider' => array(
				'name' => __('Position',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => false,
				'restkey' => 'locationProvider',

			),
			'locationLongitude' => array(
				'name' => __('Position, Longitude',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => false,
				'restkey' => 'locationLongitude',

			),
				
	 		'locationLatitude' => array(
				'name' => __('Postion, Latitude',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => false,
				'restkey' => 'locationLatitude',

			),		
	 		'locationAltitude' => array(
				'name' => __('Position, altitude',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => false,
				'restkey' => 'locationAltitude',

			),
	 		'screenBrightness' => array(
				'name' => __('Luminosité écran',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => false,
				'restkey' => 'screenBrightness',

			),
			'startUrl' => array(
				'name' => __('Page de démarrage',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => true,
				'restkey' => 'startUrl',

			),

			'currentPage' => array(
				'name' => __('Page courante',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => true,
				'restkey' => 'currentPage',

			),

			'lastAppStart' => array(
				'name' => __('Application démarrée le',__FILE__),
				'type' => 'info',
				'subtype' => 'string',
				'isvisible' => false,
				'restkey' => 'lastAppStart',

			),

		//	),

		);
	}

	public static function cron() {
		$notfound = true;
		foreach (eqLogic::byType('fullyKiosK') as $fullyKiosK)
		{
			if($fullyKiosK->getConfiguration('refreshDelay')=='1'){ 
		                $notfound = false;
				$fullyKiosK->getInformations();
				$mc = cache::byKey('fullyKiosKWidgetmobile' . $fullyKiosK->getId());
				$mc->remove();
				$mc = cache::byKey('fullyKiosKWidgetdashboard' . $fullyKiosK->getId());
				$mc->remove();
				$fullyKiosK->toHtml('mobile');
				$fullyKiosK->toHtml('dashboard');
				$fullyKiosK->refreshWidget(); 
		        } 
		}
		if($notfound){ config::save('functionality::cron::enable', 0 ,'fullyKiosK'); }
		
	}

	/*
	* Fonction exécutée automatiquement toutes les heures par Jeedom
	public static function cronHourly() {

	}
	*/

	//* Fonction exécutée automatiquement tous les jours par Jeedom
	public static function cron5() {
		$notfound = true;
		foreach (eqLogic::byType('fullyKiosK') as $fullyKiosK)
		{
			if($fullyKiosK->getConfiguration('refreshDelay')=='5'){ 
				$found = false;
				$fullyKiosK->getInformations();
				$mc = cache::byKey('fullyKiosKWidgetmobile' . $fullyKiosK->getId());
				$mc->remove();
				$mc = cache::byKey('fullyKiosKWidgetdashboard' . $fullyKiosK->getId());
				$mc->remove();
				$fullyKiosK->toHtml('mobile');
				$fullyKiosK->toHtml('dashboard');
				$fullyKiosK->refreshWidget(); 
		        } 
		}
		if($notfound){ config::save('functionality::cron5::enable', 0 ,'fullyKiosK'); }
	}
	
	//* Fonction exécutée automatiquement tous les jours par Jeedom
	public static function cron30() {
                $notfound = true;
		foreach (eqLogic::byType('fullyKiosK') as $fullyKiosK)
		{  
			if($fullyKiosK->getConfiguration('refreshDelay')=='30'){ 
		                $notfound = false;
				$fullyKiosK->getInformations();
				$mc = cache::byKey('fullyKiosKWidgetmobile' . $fullyKiosK->getId());
				$mc->remove();
				$mc = cache::byKey('fullyKiosKWidgetdashboard' . $fullyKiosK->getId());
				$mc->remove();
				$fullyKiosK->toHtml('mobile');
				$fullyKiosK->toHtml('dashboard');
				$fullyKiosK->refreshWidget(); 
		        } 
		}
		if($notfound){ config::save('functionality::cron30::enable', 0 ,'fullyKiosK'); }

	}	
	//* Fonction exécutée automatiquement tous les jours par Jeedom
	public static function cronHourly() {
		$notfound = true;
		foreach (eqLogic::byType('fullyKiosK') as $fullyKiosK)
		{
			if($fullyKiosK->getConfiguration('refreshDelay')=='60'){ 
		                $notfound = false;
				$fullyKiosK->getInformations();
				$mc = cache::byKey('fullyKiosKWidgetmobile' . $fullyKiosK->getId());
				$mc->remove();
				$mc = cache::byKey('fullyKiosKWidgetdashboard' . $fullyKiosK->getId());
				$mc->remove();
				$fullyKiosK->toHtml('mobile');
				$fullyKiosK->toHtml('dashboard');
				$fullyKiosK->refreshWidget(); 
		        } 
		}
		if($notfound){ config::save('functionality::cronHourly::enable', 0 ,'fullyKiosK'); }

	}	
	
	//* Fonction exécutée automatiquement tous les jours par Jeedom
	public static function cron15() {
		$notfound = true;
		foreach (eqLogic::byType('fullyKiosK') as $fullyKiosK)
		{
			if($fullyKiosK->getConfiguration('refreshDelay')=='15'){ 
		                $notfound = false;
				$fullyKiosK->getInformations();
				$mc = cache::byKey('fullyKiosKWidgetmobile' . $fullyKiosK->getId());
				$mc->remove();
				$mc = cache::byKey('fullyKiosKWidgetdashboard' . $fullyKiosK->getId());
				$mc->remove();
				$fullyKiosK->toHtml('mobile');
				$fullyKiosK->toHtml('dashboard');
				$fullyKiosK->refreshWidget(); 
		        } 
		}
		if($notfound){ config::save('functionality::cron15::enable', 0 ,'fullyKiosK');}
		
	}

	/*     * *********************Méthodes d'instance************************* */

	public function refresh() {
		try {
			$this->getInformations();
			$mc = cache::byKey('fullyKiosKWidgetmobile' . $fullyKiosK->getId());
			$mc->remove();
			$mc = cache::byKey('fullyKiosKWidgetdashboard' . $fullyKiosK->getId());
			$mc->remove();
			$fullyKiosK->toHtml('mobile');
			$fullyKiosK->toHtml('dashboard');
			$fullyKiosK->refreshWidget();
		} catch (Exception $exc) {
			log::add('fullyKiosK', 'error', __('Erreur pour ', __FILE__) . $eqLogic->getHumanName() . ' : ' . $exc->getMessage());
		}
	}

	public function getInformations($jsondata=null)
	{
		if ($this->getIsEnable() == 1)
		{
			$equipement = $this->getName();

			//if(is_null($jsondata))
			//{
				$ip = $this->getConfiguration('addressip');
				$password = $this->getConfiguration('password');

				$url = "http://{$ip}:2323/?type=json&cmd=deviceInfo&password=".$password;
				log::add('fullyKiosK', 'debug', __METHOD__.' '.__LINE__.' requesting '.$url);

				//$jsondata = file_get_contents($url);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$jsondata = curl_exec($ch);
				curl_close($ch);
			//}

 			log::add('fullyKiosK', 'debug', __METHOD__.' '.__LINE__.' $jsondata '.$jsondata);

 			$json = json_decode($jsondata,true);

 			if (is_null($json))
 			{
				log::add('fullyKiosK', 'info', 'Connexion KO for '.$equipement.' ('.$ip.')');
				$this->checkAndUpdateCmd('communicationStatus',false);
				return false;
			}

			$this->checkAndUpdateCmd('communicationStatus',true);

			self::initInfosMap();

			//update cmdinfo value
			foreach(self::$_infosMap as $cmdLogicalId=>$params)
			{
				if(isset($params['restkey'], $json[$params['restkey']]))
				{
					//log::add('fullyKiosK', 'debug',  __METHOD__.' '.__LINE__.' '.$cmdLogicalId.' => '.json_encode($json[$params['restkey']]));
					$value = $json[$params['restkey']];
					str_replace("\\n", " ", $value);
					if(isset($params['cbTransform']) && is_callable($params['cbTransform']))
					{
						$value = call_user_func($params['cbTransform'], $value);
						//log::add('fullyKiosK', 'debug', __METHOD__.' '.__LINE__.' Transform to => '.json_encode($value));
					}

					$this->checkAndUpdateCmd($cmdLogicalId,$value);
				}
			}
			return true;
		}
	}
        public function preSave() {
  		$this->setDisplay("width","536px");
      		$this->setDisplay("height","820px");	
	}
	public function postSave() {
		self::initInfosMap();
		$order = 0;
                
		switch ($this->getConfiguration('refreshDelay','')){
			case '1' : config::save('functionality::cron1::enable', 1 ,'fullyKiosK'); break;
 			case '5' : config::save('functionality::cron5::enable', 1 ,'fullyKiosK'); break;
 			case '15' : config::save('functionality::cron15::enable', 1 ,'fullyKiosK'); break;
 			case '30' : config::save('functionality::cron30::enable', 1 ,'fullyKiosK'); break;
 			case '60' : config::save('functionality::cronHourly::enable', 1 ,'fullyKiosK'); break;
 		 }
		
		//Cmd Infos
		foreach(self::$_infosMap as $cmdLogicalId=>$params)
		{
			$fullyKiosKCmd = $this->getCmd('info', $cmdLogicalId);
			
			if (!is_object($fullyKiosKCmd))
			{
				log::add('fullyKiosK', 'debug', __METHOD__.' '.__LINE__.' cmdInfo create '.$cmdLogicalId.'('.__($params['name'], __FILE__).') '.($params['subtype'] ?: 'subtypedefault'));
				$fullyKiosKCmd = new fullyKiosKCmd();

				$fullyKiosKCmd->setLogicalId($cmdLogicalId);
				$fullyKiosKCmd->setEqLogic_id($this->getId());
				$fullyKiosKCmd->setName(__($params['name'], __FILE__));
				$fullyKiosKCmd->setType($params['type'] ?: 'info');
				$fullyKiosKCmd->setSubType($params['subtype'] ?: 'numeric');
				$fullyKiosKCmd->setIsVisible($params['isvisible'] ?: false);
				$fullyKiosKCmd->setDisplay('icon', $params['icon'] ?: null);

				$fullyKiosKCmd->setConfiguration('cmd', $params['cmd'] ?: null);


				$fullyKiosKCmd->setDisplay('forceReturnLineBefore', $params['forceReturnLineBefore'] ?: false);

				if(isset($params['unite']))
					$fullyKiosKCmd->setUnite($params['unite']);
				$fullyKiosKCmd->setTemplate('dashboard',$params['tpldesktop']?: 'badge');
				$fullyKiosKCmd->setTemplate('mobile',$params['tplmobile']?: 'badge');
				$fullyKiosKCmd->setOrder($order++);

				$fullyKiosKCmd->save();
			}elseif($fullyKiosKCmd->getConfiguration('restKey','') != '') {
			  	$fullyKiosKCmd->setConfiguration('restKey', $params['restKey'] ?: null);
				$fullyKiosKCmd->save();

			}
		}
		//Cmd Actions
		foreach(self::$_actionMap as $cmdLogicalId => $params)
		{
			$fullyKiosKCmd = $this->getCmd('action', $cmdLogicalId);
		        if(is_object($fullyKiosKCmd) && $fullyKiosKCmd->getConfiguration('cmd','') != $params['cmd']) {
			              $fullyKiosKCmd->remove(); 
		        }
			
			if (!is_object($fullyKiosKCmd))
			{
				log::add('fullyKiosK', 'debug', __METHOD__.' '.__LINE__.' cmdAction create '.$cmdLogicalId.'('.__($params['name'], __FILE__).') '.($params['subtype'] ?: 'subtypedefault'));
				$fullyKiosKCmd = new fullyKiosKCmd();

				$fullyKiosKCmd->setLogicalId($cmdLogicalId);
				$fullyKiosKCmd->setEqLogic_id($this->getId());
				$fullyKiosKCmd->setName(__($params['name'], __FILE__));
				$fullyKiosKCmd->setType($params['type'] ?: 'action');
				$fullyKiosKCmd->setSubType($params['subtype'] ?: 'other');
				$fullyKiosKCmd->setIsVisible($params['isvisible'] ?: true);

				$fullyKiosKCmd->setConfiguration('cmd', $params['cmd'] ?: null);

				$fullyKiosKCmd->setConfiguration('listValue', json_encode($params['listValue']) ?: null);

				$fullyKiosKCmd->setDisplay('forceReturnLineBefore', $params['forceReturnLineBefore'] ?: false);
	                        $fullyKiosKCmd->setDisplay('message_disable', $params['message_disable'] ?: false);
	                        $fullyKiosKCmd->setDisplay('title_disable', $params['title_disable'] ?: false);
				$fullyKiosKCmd->setDisplay('title_placeholder', $params['title_placeholder'] ?: false);
				$fullyKiosKCmd->setDisplay('icon', $params['icon'] ?: false);				
			        $fullyKiosKCmd->setDisplay('message_placeholder', $params['message_placeholder'] ?: false);

				$fullyKiosKCmd->setDisplay('title_possibility_list', json_encode($params['title_possibility_list'] ?: null));//json_encode(array("1","2"));
				$fullyKiosKCmd->setDisplay('icon', $params['icon'] ?: null);

				if(isset($params['tpldesktop']))
					$fullyKiosKCmd->setTemplate('dashboard',$params['tpldesktop']);
				if(isset($params['tplmobile']))
					$fullyKiosKCmd->setTemplate('mobile',$params['tplmobile']);
				$fullyKiosKCmd->setOrder($order++);

				if(isset($params['linkedInfo']))
					$fullyKiosKCmd->setValue($this->getCmd('info', $params['linkedInfo']));

				$fullyKiosKCmd->save();
			} elseif($fullyKiosKCmd->getConfiguration('cmd','') != '') {
			  	$fullyKiosKCmd->setConfiguration('cmd', $params['cmd'] ?: null);
				$fullyKiosKCmd->setLogicalId($cmdLogicalId);
				$fullyKiosKCmd->setEqLogic_id($this->getId());
				$fullyKiosKCmd->setName(__($params['name'], __FILE__));
				$fullyKiosKCmd->setType($params['type'] ?: 'action');
				$fullyKiosKCmd->setSubType($params['subtype'] ?: 'other');
				$fullyKiosKCmd->setIsVisible($params['isvisible'] ?: true);

				$fullyKiosKCmd->setConfiguration('cmd', $params['cmd'] ?: null);

				$fullyKiosKCmd->setConfiguration('listValue', json_encode($params['listValue']) ?: null);

				$fullyKiosKCmd->setDisplay('forceReturnLineBefore', $params['forceReturnLineBefore'] ?: false);
	                        $fullyKiosKCmd->setDisplay('message_disable', $params['message_disable'] ?: false);
	                        $fullyKiosKCmd->setDisplay('title_disable', $params['title_disable'] ?: false);
				$fullyKiosKCmd->setDisplay('title_placeholder', $params['title_placeholder'] ?: false);
				$fullyKiosKCmd->setDisplay('icon', $params['icon'] ?: false);				
			        $fullyKiosKCmd->setDisplay('message_placeholder', $params['message_placeholder'] ?: false);

				$fullyKiosKCmd->setDisplay('title_possibility_list', json_encode($params['title_possibility_list'] ?: null));//json_encode(array("1","2"));
				$fullyKiosKCmd->setDisplay('icon', $params['icon'] ?: null);				
				$fullyKiosKCmd->save();

			}
				
		}
		//refreshcmdinfo
  	   		
		$this->getInformations();
		
	}
	

	public function toHtml($_version = 'dashboard') {
		$replace = $this->preToHtml($_version);
		if (!is_array($replace)) {
			return $replace;
		}
		$version = jeedom::versionAlias($_version);
		$cmd_html = '';
		$br_before = 1;
		foreach ($this->getCmd('info', null, true) as $cmd) {
			if (isset($replace['#refresh_id#']) && $cmd->getId() == $replace['#refresh_id#']) {
				continue;
			}
			//if (isset($replace['#batteryLevel_id#']) && $cmd->getId() == $replace['#batteryLevel_id#']) {
			//	            $replace['#' . $cmd->getLogicalId() . '_history#'] = '';
			if($cmd->getLogicalId() == 'batteryLevel'){
		            $replace['#' . $cmd->getLogicalId() . '_id#'] = $cmd->getId();
            	            $replace['#' . $cmd->getLogicalId() . '#'] = $cmd->execCmd();
                            $replace['#' . $cmd->getLogicalId() . '_collect#'] = $cmd->getCollectDate();
				continue;
			}
			if($cmd->getLogicalId() == 'plugged'){
			    if($cmd->execCmd()){ 	
		            $replace['#' . $cmd->getLogicalId() . '_icon#'] = 'techno-charging'; }
		            else { $replace['#' . $cmd->getLogicalId() . '_icon#'] = 'notechno-low2'; }
			}
			
			if ($br_before == 0 && $cmd->getDisplay('forceReturnLineBefore', 0) == 1) {
				$cmd_html .= '<br/>';
			}
			$cmd_html .= $cmd->toHtml($_version, '', $replace['#cmd-background-color#']);
			//log::add('fullyKiosK', 'debug', ' cmdAction to html '. $cmd->toHtml($_version, '', $replace['#cmd-background-color#']));
			$br_before = 0;
			if ($cmd->getDisplay('forceReturnLineAfter', 0) == 1) {
				$cmd_html .= '<br/>';
				$br_before = 1;
			}
	
		}
		foreach ($this->getCmd('action', null, true) as $cmd) {
			if (isset($replace['#refresh_id#']) && $cmd->getId() == $replace['#refresh_id#']) {
				continue;
			}
			//if (isset($replace['#batteryLevel_id#']) && $cmd->getId() == $replace['#batteryLevel_id#']) {
			//	            $replace['#' . $cmd->getLogicalId() . '_history#'] = '';
			if($cmd->getLogicalId() == 'batteryLevel'){
		            $replace['#' . $cmd->getLogicalId() . '_id#'] = $cmd->getId();
            	            $replace['#' . $cmd->getLogicalId() . '#'] = $cmd->execCmd();
                            $replace['#' . $cmd->getLogicalId() . '_collect#'] = $cmd->getCollectDate();
				continue;
			}
			if($cmd->getLogicalId() == 'plugged'){
			    if($cmd->execCmd()){ 	
		            $replace['#' . $cmd->getLogicalId() . '_icon#'] = 'techno-charging'; }
		            else { $replace['#' . $cmd->getLogicalId() . '_icon#'] = 'notechno-low2'; }
			}
			
			if ($br_before == 0 && $cmd->getDisplay('forceReturnLineBefore', 0) == 1) {
				$cmd_html .= '<br/>';
			}
			$cmd_html .= $cmd->toHtml($_version, '', $replace['#cmd-background-color#']);
			
			//log::add('fullyKiosK', 'debug', ' cmdAction to html '. $cmd->toHtml($_version, '', $replace['#cmd-background-color#']));
			$br_before = 0;
			if ($cmd->getDisplay('forceReturnLineAfter', 0) == 1) {
				$cmd_html .= '<br/>';
				$br_before = 1;
			}
	
		}

		
		//$eqlogic = $cmd->getEqLogic();
		$ip = $this->getConfiguration('addressip');
		$password = $this->getConfiguration('password');

		$replace['#cmd#'] = $cmd_html;
		$replace['#ipaddress#'] = $ip;
		$replace['#password#'] = $password;
		$replace['width: 146px'] = 'width: 256px';
		//$replace['resize:vertical;'] = 'resize:both;';
		//$replace['rows="2"'] = 'rows="1"';

		return template_replace($replace, getTemplate('core', $version, 'fullyKiosK', 'fullyKiosK'));
	}

	/*     * **********************Getteur Setteur*************************** */
}

class fullyKiosKCmd extends cmd {
	/*     * *************************Attributs****************************** */

	/*     * ***********************Methode static*************************** */

	/*     * *********************Methode d'instance************************* */

	/*
	* Non obligatoire permet de demander de ne pas supprimer les commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
	public function dontRemoveCmd() {
	return true;
	}
	*/
	public function execute($_options = array())
 	{
		log::add('fullyKiosK', 'debug', __METHOD__.'('.json_encode($_options).') Type: '.$this->getType().' logicalId: '.$this->getLogicalId());

		if ($this->getLogicalId() == 'refresh')
		{
			$this->getEqLogic()->refresh();
			return;
		}

		if( $this->getType() == 'action' )
		{

			if( $this->getSubType() == 'slider' && $_options['slider'] == '')
				return;

			fullyKiosK::initInfosMap();
			$command = $this->getConfiguration('cmd','');
			if (isset(fullyKiosK::$_actionMap[$this->getLogicalId()]) || $command != '')
			{
				$params = fullyKiosK::$_actionMap[$this->getLogicalId()];

				if(isset($params['callback']) && is_callable($params['callback']))
				{
					log::add('fullyKiosK', 'debug', __METHOD__.'calling back');
					call_user_func($params['callback'], $this);
				}elseif(isset($params['cmd']) || $command != '') 
				{
					$cmdval = $params['cmd'];
					$cmdval = $this->getConfiguration('cmd');
					if($this->getSubType() == 'slider')
						$cmdval = str_replace('[[[VALUE]]]',$_options['slider'],$cmdval);
					
					if($this->getLogicalId()  == 'setAudioVolume'){
						$cmdval = str_replace('#message#',intval($_options['message']),$cmdval);
						if ($_options['title'] === ""){ $_options['title'] = 3 ; }
						$stream[0] = '3';
						$stream = explode(" ", $_options['title']);
						   $cmdval = str_replace('#title#',intval($stream[0]),$cmdval);
					}
					

					if($this->getLogicalId()  == 'TTS_javascript'){
                                                   if($_options['title'] === "" ){ $_options['title'] = 'fr_FR' ;} 
						   $cmdval = str_replace('#title#', urlencode($_options['title']),$cmdval);
						   $cmdval = str_replace('#message#', urlencode(str_replace("'","\'", $_options['message'])),$cmdval);
                                        }
					
					if($this->getLogicalId()  == 'javascript'){
						   $cmdval = str_replace('#title#',urlencode($_options['title']),$cmdval);
						   $cmdval = str_replace('#message#',urlencode(str_replace("'","\'",$_options['message'])),$cmdval);
					}
					
					
					if($this->getSubType()  == 'message') {
						$cmdval = str_replace('#message#',urlencode($_options['message']),$cmdval);
                                                $cmdval = str_replace('#title#',urlencode($_options['title']),$cmdval);
                                                if($this->getLogicalId()  == 'setBooleanSetting')
						   $cmdval = str_replace('#message#',$_options['message'] === 'true',$cmdval);

					}
					$eqLogic = $this->getEqLogic();
					$ip = $eqLogic->getConfiguration('addressip');
					$password = $eqLogic->getConfiguration('password');
					$url = 'http://'.$ip.':2323/?cmd='.$cmdval.'&password='.$password;

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS,$cmdval);
					$jsondata = curl_exec($ch);

					
					if($this->getLogicalId()  == 'getCamshot'){
						
						$resource_path = realpath(dirname(__FILE__) . '/../../resources/');
						
						if($_options['title'] == ''){
							$path = $resource_path;
						} else
						{
							$path = $_options['title'];
						}						
						
						
						if($_options['message'] == ''){
							$camshot = $path.'/camshot.jpg';
						} else
						{
							$camshot = $path.'/'.$_options['message'];
						}
						file_put_contents($camshot, $jsondata);
					}
					
					curl_close($ch);
					log::add('fullyKiosK', 'debug', __METHOD__.'('.$url.' with '.$cmdval.') '.$jsondata);

					$eqLogic->getInformations($jsondata);
				}

				return true;
			}
		} else {
			throw new Exception(__('Commande non implémentée actuellement', __FILE__));
		}
		return false;
	}

	/*     * **********************Getteur Setteur*************************** */
}
/*
*/
?>
