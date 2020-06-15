<?php
namespace IW\Tests\Workshop;
use Mockery\Adapter\Phpunit\MockeryTestCase;


class PostServiceTest extends MockeryTestCase {
  public function tearDown() {
    \Mockery::close();
  }

  public function testCreatePost() {
    $mock = \Mockery::mock('PostService');
    $mock->shouldReceive('createPost')->with([1, "text"])->andReturn(1);

    $mockResult = $mock->createPost([1, "text"]);

    $this->assertEquals(1, $mockResult);
  }
}