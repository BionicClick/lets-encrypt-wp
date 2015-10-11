<?php

namespace LEWP\Keys;

class KeyPairTest extends \PHPUnit_Framework_TestCase {
	public function testTemp() {
		$keyPair = new KeyPair( 'test' );
		$keyPair->generate( 'hunter2' );

		$this->assertInternalType( 'string', $keyPair->export_public_key() );
		$this->assertInternalType( 'string', $keyPair->export_private_key() );

		$this->assertFalse( $keyPair->get_private_key( 'hunter1' ) );

		$private = $keyPair->get_private_key( 'hunter2' );

		$this->assertNotFalse( $private );
		$this->assertInternalType( 'resource', $private );

		$this->assertSame( 'test', $keyPair->get_id() );

	}
}