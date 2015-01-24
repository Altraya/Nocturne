<?php
	/**
	* Classe représentant une tâche d'un Gantt de projet
	*/

	class Task
	{
		private $name;			//Nom de la tâche
		private $res;			//Nom de la ressource affectée
		private $begin;			//Heure de début de la tache (format H24)
		private $end;			//Heure de fin prévue de la tache (format H24)
		private $progress;		//Progression en %

		private $np;			//Indique si la tache a été planifiée avant ou après l'heure limite
		private $edit;			//Indique si on peut éditer la tache
		private $state;			//Indique l'état de la tache : 0 = pas commencée, 1 = en cours, 2 = terminée
		private $del;			//Indique si on peut éditer la tâche

		/**
		* $n : nom de la tache
		* $r : nom de la ressource affectée
		* $b : heure de début planifiée (H24)
		* $e : heure de fin planifiée (H24)
		* $np : indique si la tache est NP
		* $del : indique si la tache peut être supprimée
		*/
		public function __construct($n, $r, $b, $e, $isnp, $candel)
		{
			$name = $n;
			$res = $r;
			$begin = $b;
			$end = $e;
			$progress = 0;		//0 à la création

			$np = $isnp;
			$state = 0;			//La tâche n'a pas commencé
			$canEdit = true;	//Puisque la tâche n'a pas commencé, on peut l'éditer
			$del = $candel;
		}

		//Renvoie le nom de la tâche
		public function getName()
		{
			return $name;
		}

		//Renvoie le nom de la ressource affectée
		public function getRes()
		{
			return $res;
		}

		//Renvoie l'heure (H24) de début de la tâche
		public function getBegin()
		{
			return $begin;
		}

		//Renvoie l'heure (H24) panifiée de fin
		public function getEnd()
		{
			return $end;
		}

		//Renvoie la durée planifiée de la tache
		public function getLength()
		{
			$res = $end - $begin;
			if($end <= $begin)
			{
				$res += 24;		//Si l'heure de fin est plus petite que l'heure de début, c'est probablement qu'elle est le jour suivant
			}

			return $res;
		}

		//Renvoie le progrès actuel de la tache
		public function getProgress()
		{
			return $progress;
		}

		//Renvoie si la tâche est NP ou non
		public function isNP()
		{
			return $np;
		}

		//Renvoie si la tache peut être éditée ou non
		public function canEdit()
		{
			return $edit;
		}

		//Renvoie si la tache peut être supprimée ou non
		public function canDel()
		{
			return $del;
		}

		//Renvoie l'état actuel de la tache
		public function getState()
		{
			return $state;
		}

		//Renvoie une ligne de tableau HTML avec tout qui va bien
		public function toString()
		{
			$html = '	<tr>
							<td>' . $name . '</td>
							<td>' . $res . '</td>
							<td>' . $begin . '</td>
							<td>' . $end . '</td>
							<td colspan="12">
								<div class="progress" style="margin-left: ' . calcLeftM() . '%; margin-right: ' . calcRightM() . '%">
									<div class="progress-bar ' . ($progress == 100 ? 'progress-bar-success' : 'progress-bar-warning progress-bar-striped active') . 
									'" role="progressbar" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100" style="width:100%;">' .
										((($progress != 0) && ($progress != 100)) ? $progress : '')
									. '</div>
						  		</div>
							</td>
							<td class="actionTag npTag">' .
								($np ? '(NP)' : '')
							. '</td>
							<td class="actionTag editTag">' .
								($edit ? '<i class="fa fa-pencil"></i>' : '' )
							. '</td>
			 				<td class="actionTag delTag">' .
			 					($del ? '<i class="fa fa-trash"></i>' : '')
			 				. '</td>
			 				<td class="actionTag cmplTag">' .
			 					($state == 1 ? '<i class="fa fa-clock-o"></i>' : ($state == 2 ? '<i class="fa fa-check"></i>' : ''))
			 				. '</td>
						</tr>';
			//Ternaires dégueulasses pour remplir la ligne du tableau en fonction des attributs de l'objet

			return $html;
		}

		//Calcule la marge gauche à appliquer à la barre de progression pour qu'elle soit correctement placée sur le diagramme de Gantt
		private function calcLeftM()
		{
			//Formule maison :
			//[Durée du projet] / ([Début de la tache] - [Début du projet])
			//Exemple avec une tâche commençant à 22h30 :
			//$begin = 22,5
			//$begin - 20 = 2,5
			//12 / 2,5 = 4,8
			//100 / 4,8 = % de marge gauche
			//Il y a un %24 car on préfère éviter d'avoir un résultat négatif
			return (100 / 12) * (($begin - 20) % 24);
		}

		//Même chose avec la marge droite
		private function calcRightM()
		{
			return (100 / 12) * ((8 - $end) % 24);
		}

		//Modifie la progression de la tâche
		public function setProgress($n)
		{
			$progress = $n;
		}

		//Modifie la ressource affectée à la tâche
		public function setRes($r)
		{
			$res = $r;
		}
	}
?>