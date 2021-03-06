<?php
	/**
	* Classe représentant un projet 
	*/

	class Project
	{
		private $progress;		//Avancée du projet en %

		//$n : progression du projet
		public function __construct($n)
		{
			$this->progress = $n;
		}

		//Renvoie la durée
		public function getLength()
		{
			return '12';
		}

		//Renvoie l'heure de début
		public function getBegin()
		{
			return '20';
		}

		//Renvoie l'heure de fin (format H24)
		public function getEnd()
		{
			return '08';
		}

		//Renvoie la limite horaire de la planification
		public function getLim()
		{
			return '22';
		}

		//Renvoie une entête de tableau HTML avec tout qui va bien
		public function toString()
		{
			$html = '	<tr>
							<th>Tache</th>
							<th>Ressource</th>
							<th>Heure début</th>
							<th>Heure fin</th>';

			for($i = 0; $i < $this->getLength(); $i++)
			{
				$html .= '	<th class="hourSpan">' . $this->formatHours($this->getLength() + $i) . 'h</th>';
			}
			
			$html .= '		<th colspan="4" class="actionTag">Actions</th>
						</tr>';

			return $html;
		}

		//Renvoie l'heure $n au format H24 précédée d'un 0 si nécéssaire, pour l'affichage
		private function formatHours($n)
		{
			$res = $n % 24;
			if ($res < 10)
			{
				$res = '0' . $res;
			}

			return $res;
		}

		public function setProgress($n)
		{
			$this->progress = $n;
		}
	}

?>