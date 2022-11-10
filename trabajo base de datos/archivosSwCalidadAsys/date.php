<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
</head>
	<body>
		<?php  
		$fecha_hoy= date("Y-m-d H:i:s");   
		echo "Fecha: $fecha_hoy";
		echo "<br> Now: $now()";
		?>

		<input ng-class="{'input-harbor':calculate.from.type=='Harbor', 'input-city':calculate.from.type=='InlandPoint'}" type="text" name="from" uib-typeahead="fromLocation as fromLocation.displayName for fromLocation in getFromLocations($viewValue)" typeahead-editable="true" typeahead-min-length="2" typeahead-no-results="noFromResults" typeahead-template-url="src/app/pages/regular/search/partials/location-typeahead-tpl.html" ng-model="calculate.from" typeahead-on-select="getContainers()" ng-change="getContainers()" uib-tooltip-template="'src/app/pages/regular/search/partials/tooltips/origin-tooltip.html'" tooltip-trigger="'focus'" tooltip-placement="top" required="" class="ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead-178-2068" style="">


	</body>
</html>
