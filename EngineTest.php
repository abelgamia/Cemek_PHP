<?php
require_once 'src/Engine.php';

/**
 * Engine test case.
 */
class EngineTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 * @var Engine
	 */
	private $engine;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp();

		// TODO Auto-generated EngineTest::setUp()

		$this->engine = new Engine(/* parameters */);
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated EngineTest::tearDown()
		$this->engine = null;

		parent::tearDown();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

	/**
	 * Tests Engine->__construct()
	 */
	public function test__construct() {
		// TODO Auto-generated EngineTest->test__construct()
		$this->markTestIncomplete("__construct test not implemented");

		$this->engine->__construct(/* parameters */);
	}

	/**
	 * Tests Engine->kuki()
	 */
	public function testKuki() {
		// TODO Auto-generated EngineTest->testKuki()
		$this->markTestIncomplete("kuki test not implemented");

		$this->engine->kuki(/* parameters */);
	}
}

