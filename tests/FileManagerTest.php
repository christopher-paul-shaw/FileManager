<?php
use PHPUnit\Framework\TestCase;

class FileManagerTest extends TestCase {

	public function testDefaultDirectory () {
		$path = '/tmp/';
		$filemanager = new FileManager();
		$this->assertEquals($path, $filemanager->path);
	}

	public function testCanSetDirectory () {
		$path = '/tmp/test/';
		$filemanager = new FileManager($path);
		$this->assertEquals($path, $filemanager->path);
	}

	public function testCanCreateFile () {
		$filename = 'test.txt';
		$content = 'some content';

		$filemanager = new FileManager();
		$result = $filemanager->addFile($filename,$content);
		$this->assertTrue($result);
	}

	public function testCanReadFile () {
		$filename = 'test.txt';
		$content = 'some content';

		$filemanager = new FileManager();
		$filemanager->addFile($filename,$content);
		
		$result = $filemanager->readFile($filename);
		$this->assertEquals($result, $content);
	}

	public function testCanDeleteFile () {
		$filename = 'test.txt';
		$content = 'some content';

		$filemanager = new FileManager();
		$filemanager->addFile($filename,$content);
		$result = $filemanager->deleteFile($filename);
		$this->assertTrue($result);

		$result2 = $filemanager->readFile($filenmame);
		$this->assertFalse($result2);
	}

	public function testCanListFiles () {

	}

	public function testFailure () {
		$this->assertTrue(false);
	}

}
