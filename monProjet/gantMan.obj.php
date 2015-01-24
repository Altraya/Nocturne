<?php
	require 'proj.obj.php';
	require 'tache.obj.php';

	class GantManager
	{
		private $bdd;

		private $project;
		private $tasks;

		private $taskNames;
		private $resNames;
		private $beginHours;
		private $endHours;
		private $prg;

		public function __construct()
		{
			$this->taskNames = array();
			$this->resNames = array();
			$this->beginHours = array();
			$this->endHours = array();
			$this->prg = array();
		}

		public function connect()
		{
			try
			{
				//On se connecte à la BDD avec un PDO
				//(ce TP a été fait sur un VPS personnel, il faudra changer les valeurs d'accès)
				$this->bdd = new PDO('mysql:host=localhost;dbname=nuit_du_projet', 'web', 'cambart', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
				die('Error: ' . $e->getMessage());
			}
		}

		public function toString()
		{
			$res = '<table class="table">';
			$res .= $this->project->toString();
			foreach($this->tasks as $key => $value)
			{
				$res .= $value->toString();
			}
			$res .= '</table>';

			return $res;
		}

		public function build($n)
		{
			$this->buildNames($n);
			$this->buildRes($n);
			$this->buildHours($n);
			$this->buildPrg($n);

			$this->project = new Project(69);
			$this->tasks = array();

			for($i = 0; $i < $n; $i++)
			{
				$this->tasks[] = new Task($this->taskNames[$i], $this->resNames[$i], $this->beginHours[$i], $this->endHours[$i], true, true);
			}
		}

		public function buildNames($n)
		{
			for($i = 0; $i < $n; $i++)
			{
				$this->taskNames[] = "" . $i;
			}
		}

		public function buildRes($n)
		{
			for($i = 0; $i < $n; $i++)
			{
				$this->resNames[] = "" . $i;
			}
		}

		public function buildHours($n)
		{
			for($i = 0; $i < $n; $i++)
			{
				$this->beginHours[] = rand(20,32) % 24;
				$this->endHours[] = rand(20,32) % 24;
			}
		}		

		public function buildPrg($n)
		{
			for($i = 0; $i < $n; $i++)
			{
				$this->prg[] = rand(0,100);
			}
		}
	}
?>