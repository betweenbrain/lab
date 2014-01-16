<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Database
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * MySQLi database driver
 *
 * @package     Joomla.Platform
 * @subpackage  Database
 * @see         http://php.net/manual/en/book.mysqli.php
 * @since       12.1
 */
class JDatabaseDriverMysqli extends JDatabaseDriver {
	/**
	 * The name of the database driver.
	 *
	 * @var    string
	 * @since  12.1
	 */
	public $name = 'mysqli';

	/**
	 * The character(s) used to quote SQL statement names such as table names or field names,
	 * etc. The child classes should define this as necessary.  If a single character string the
	 * same character is used for both sides of the quoted name, else the first character will be
	 * used for the opening quote and the second for the closing quote.
	 *
	 * @var    string
	 * @since  12.2
	 */
	protected $nameQuote = '`';

	/**
	 * The null or zero representation of a timestamp for the database driver.  This should be
	 * defined in child classes to hold the appropriate value for the engine.
	 *
	 * @var    string
	 * @since  12.2
	 */
	protected $nullDate = '0000-00-00 00:00:00';

	/**
	 * @var    string  The minimum supported database version.
	 * @since  12.2
	 */
	protected static $dbMinimum = '5.0.4';

	/**
	 * Constructor.
	 *
	 * @param   array $options  List of options used to configure the connection
	 *
	 * @since   12.1
	 */
	public function __construct($options) {
		// Get some basic values from the options.
		$options['host']     = (isset($options['host'])) ? $options['host'] : 'localhost';
		$options['user']     = (isset($options['user'])) ? $options['user'] : 'root';
		$options['password'] = (isset($options['password'])) ? $options['password'] : '';
		$options['database'] = (isset($options['database'])) ? $options['database'] : '';
		$options['select']   = (isset($options['select'])) ? (bool) $options['select'] : TRUE;
		$options['port']     = NULL;
		$options['socket']   = NULL;

		// Finalize initialisation.
		parent::__construct($options);
	}

	/**
	 * @param $tableName
	 * @param $rows
	 *
	 *
	 *
	 *
	 *
	 *
	 */
	public static function createNew($tableName, $rows) {

		$query = NULL;
		$db    = JFactory::getDbo();

		switch ($name) :

			case 'mysqli':
				$query = 'CREATE TABLE IF NOT EXISTS' . $db->quoteName($tableName) . ' (';

				foreach ($rows as $name => $value) {
					$query .= $db->quoteName($name) . $value . ',';
				}

				reset($rows);

				$query .= 'PRIMARY KEY (' . key($array) . ')';
				$query .= ') COMMENT=""';
				break;


		endswitch;
	}
}
