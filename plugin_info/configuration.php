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

require_once dirname(__FILE__) . '/../../../core/php/core.inc.php';
include_file('core', 'authentification', 'php');
if (!isConnect()) {
    include_file('desktop', '404', 'php');
    die();
}
?>
	<form class="form-horizontal">
	<div class="panel panel-info" style="height: 100%;">
		<div class="panel-heading" role="tab">
			<h4 class="panel-title">
				Plugin fullyKiosK

			</h4>
		</div>
	</div>
	<div class="form-group">
		<br>
		<label class="col-sm-4 control-label">{{Configuration}} :</label>
		<div class="col-lg-4">
			<a class="btn btn-info" href=/index.php?v=d&m=fullyKiosK&p=fullyKiosK> {{Accès à la configuration des tablettes}}</a>
		</div>
	</div>	

	<div class="form-group">
		<label class="col-sm-3 control-label">{{Activer MQTT}}</label>
		<div class="col-sm-3">
			<input class="configKey form-control" data-l1key="fullyKiosKMQTT" type="checkbox" placeholder="{{}}">
		</div>
	</div>

  
	<div class="form-group">
		<label class="col-sm-3 control-label">{{utilisateur MQTT}}</label>
		<div class="col-sm-3">
			<input class="configKey form-control" data-l1key="fullyKiosKUser" type="text" placeholder="{{Optionnel}}">
		</div>
	</div>  
	<div class="form-group">
		<label class="col-sm-3 control-label">{{Mot de passe MQTT}}</label>
		<div class="col-sm-3">
			<input class="configKey form-control" data-l1key="fullyKiosKPass" type="password" placeholder="{{Optionnel}}">
		</div>
	</div>                      
	<div class="form-group">
		<label class="col-sm-3 control-label">{{Port MQTT}}</label>
		<div class="col-sm-3">
			<input class="configKey form-control" data-l1key="fullyKiosKPort" type="number" placeholder="{{1883}}">
		</div>
	</div>
  
  	<legend>
	     {{Pour activer la fonction MQTT aller dans Settings-Other Settings-MQTT integration-enable MQTT}}
	     <br>
	     {{Renseigner adresse IP de jeedom et le port 1883 par défaut}}
	     <br>               
	    {{Il est préférable d arrêter le démon en cas de non utilisation de MQTT }}
	</legend>  

</form>
