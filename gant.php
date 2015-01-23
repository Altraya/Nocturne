<html>
<head>
	<meta charset="utf-8">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="fa/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/styleGant.css" rel="stylesheet">
	<title>Planification</title>
</head>
<body>
	<div id="title" class="well well-sm">
		<div id="titleText">Gantt du projet</div>
		<div id="teamName">Les Fragiclowns</div>
		<div id="grayText">Progression :</div>
		<div class="progress">
			<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100" style="width:69%;">
				69%
			</div>
  		</div>
	</div>
	<!-- 12 plages horaires : 100% / 12 = 8,33333333... % -->
	<div id="ganttContainer">
		<table class="table">
			<tr>
				<th>Tache</th>
				<th>Ressource</th>
				<th>Heure début</th>
				<th>Heure fin</th>
				<th class="hourSpan">20h</th>
				<th class="hourSpan">21h</th>
				<th class="hourSpan">22h</th>
				<th class="hourSpan">23h</th>
				<th class="hourSpan">00h</th>
				<th class="hourSpan">01h</th>
				<th class="hourSpan">02h</th>
				<th class="hourSpan">03h</th>
				<th class="hourSpan">04h</th>
				<th class="hourSpan">05h</th>
				<th class="hourSpan">06h</th>
				<th class="hourSpan">07h</th>
				<th class="hourSpan">08h</th>
				<th colspan="4" class="actionTag">Actions</th>
			</tr>
			<tr>
				<td>Lire et comprendre le sujet</td>
				<td>Pink Guy</td>
				<td>20h00</td>
				<td>20h30</td>
				<td colspan="12">
					<div class="progress" style="margin-left: 0%; margin-right: 95.833%">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
			  		</div>
				</td>
				<td class="actionTag npTag"></td>
				<td class="actionTag editTag"></td>
 				<td class="actionTag delTag"><i class="fa fa-trash"></i></td>
 				<td class="actionTag cmplTag"><i class="fa fa-check"></i></td>
			</tr>
			<tr>
				<td>Planifier le projet</td>
				<td>Red Dick</td>
				<td>20h00</td>
				<td>21h30</td>
				<td colspan="12">
					<div class="progress" style="margin-left: 0%; margin-right: 87.5%">
						<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100" style="width:47%;">
							47%
						</div>
			  		</div>
				</td>
				<td class="actionTag npTag">(NP)</td>
 				<td class="actionTag editTag"><i class="fa fa-pencil"></i></td>
 				<td class="actionTag delTag"><i class="fa fa-trash"></i></td>
 				<td class="actionTag prgTag"><i class="fa fa-clock-o"></i></td>
			</tr>
			<tr>
				<td>Installer le framework</td>
				<td>Chin Chin</td>
				<td>20h30</td>
				<td>22h00</td>
				<td colspan="12">
					<div class="progress" style="margin-left: 4.167%; margin-right: 83.333%">
						<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100" style="width:86%;">
							86%
						</div>
			  		</div>
				</td>
				<td class="actionTag npTag"></td>
 				<td class="actionTag editTag"><i class="fa fa-pencil"></i></td>
 				<td class="actionTag delTag"><i class="fa fa-trash"></i></td>
 				<td class="actionTag prgTag"><i class="fa fa-clock-o"></i></td>
			</tr>
			<tr>
				<td>Installer le SVN</td>
				<td>Filthy Frank</td>
				<td>22h30</td>
				<td>05h30</td>
				<td colspan="12">
					<div class="progress" style="margin-left: 20.833%; margin-right: 12.5%">
						<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100" style="width:86%;">
							86%
						</div>
			  		</div>
				</td>
				<td class="actionTag npTag"></td>
 				<td class="actionTag editTag"><i class="fa fa-pencil"></i></td>
 				<td class="actionTag delTag"><i class="fa fa-trash"></i></td>
 				<td class="actionTag prgTag"><i class="fa fa-clock-o"></i></td>
			</tr>
		</table>
	</div>
</body>
</html>