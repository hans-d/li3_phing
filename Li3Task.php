<?php

require_once "phing/tasks/system/ExecTask.php";

/**
 * Li3 Taask extends the ExecTask to execute a Li3 task.
 *
 * @author: Hans Donner
 * Copyright (c) Hans Donner, 2012.
 * Distributed under the MIT license.
 */
class Li3Task extends ExecTask {

        /**
         * Holds a reference to the php binary. Defaults to `php`
         */
	protected $php;

        /**
         * Holds a reference to the li3 lithium.php console. Defaults to `lithium/console/lithium.php`
         */
	protected $li3php;

        /**
         * Holds a reference to a prefix for the li3 lithium.php console. Defaults to ``.
         * This is for easy modification of the `$li3php` path.
         */
	protected $li3pathprefix;

	public function setPhp($value) {
		$this->php = $value;
	}
	
	public function setLi3pathprefix($value) {
		$this->li3pathprefix = $value;
	}
	
	public function setLi3php($value) {
		$this->li3php = $value;
	}

        /**
         * Sets defaults.
         *
         * Exec has no init() so not called.
         */
	public function init() {
		$this->php = 'php';
		$this->li3php = 'lithium/console/lithium.php';
                $this->li3pathprefix = '';
	}

        /**
         * Creates the command to execute, so the parent can do the hard work.
         */
        public function main() {
		$this->prepareLi3Exec();
		parent::main();
        }
	
         /**
          * Build a commandline. Prepends the given command to include the reference php binary
          * and the li3 lithium.php entry point.
          */
	protected function prepareLi3Exec()
	{
                $path = $this->li3pathprefix . $this->li3php;
                $command = array($this->php, $path, $this->command);
		$this->command = implode(' ', $command);
	}
}

?>