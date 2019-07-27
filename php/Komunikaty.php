<?php

namespace php;

/**
 *
 * @author Edi
 *        
 */
class Komunikaty
{

	static public function komunikat()
	{
		?><div id="komunikat">
		<?php echo "{$user->getLogin()}"; ?>
		<?php echo "{$user->getEmail()}"; ?>
		<?php echo "{$user->getAcces()}"; ?>
		</div><?php
	}

	static public function zmiany()
	{
		?><div id="zmiany"><?php
		if (isset ( $_SESSION ['zmiany'] ))
		{
			echo $_SESSION ['zmiany'];
			unset ( $_SESSION ['zmiany'] );
		}
		?>
		</div><?php
	}
}

