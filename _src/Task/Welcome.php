<?php # -*- coding: utf-8 -*-

namespace InpsydeBoilerplate\Task;

use
	BrightNucleus\Boilerplate\Scripts\Task;

/**
 * Class Welcome
 *
 * @package InpsydeBoilerplate\Task
 */
class Welcome extends Task\AbstractTask {

	/**
	 * Pints boilerplate logo
	 */
	public function complete() {

		$logo = <<<ASCI
  ___                                _
 |_ _| _ __   _ __   ___  _   _   __| |  ___
  | | | '_ \ | '_ \ / __|| | | | / _` | / _ \
  | | | | | || |_) |\__ \| |_| || (_| ||  __/
 |___||_| |_|| .__/ |___/ \__, | \__,_| \___|
             |_|          |___/
  ____          _  _                     _         _
 | __ )   ___  (_)| |  ___  _ __  _ __  | |  __ _ | |_  ___
 |  _ \  / _ \ | || | / _ \| '__|| '_ \ | | / _` || __|/ _ \
 | |_) || (_) || || ||  __/| |   | |_) || || (_| || |_|  __/
 |____/  \___/ |_||_| \___||_|   | .__/ |_| \__,_| \__|\___|
                                 |_|
ASCI;

		$this->io->write( "<info>{$logo}</info>" );
	}

}