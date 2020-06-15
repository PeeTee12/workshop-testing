<?php
namespace IW\Tests\Workshop;
use IW\Workshop\Client\Curl;
use IW\Workshop\PostService;
use PHPUnit\Framework\TestCase;
use RuntimeException;


class PostServiceTest extends TestCase {
  public function testCreatePost() {
    $mock = $this->createMock(Curl::class);

    $input = ['id' => 1];

    $mock->method('post')->willReturn([201, json_encode($input)]);

    $postService = new PostService($mock);

    $mockResult = $postService->createPost($input);

    $this->assertEquals(1, $mockResult);
  }

  public function testBadStatusCode() {
    $mock = $this->createMock(Curl::class);

    $input = ['id' => 1];

    $mock->method('post')->willReturn([400, json_encode($input)]);

    $postService = new PostService($mock);

    $this->expectException(RuntimeException::class);
    $this->expectExceptionMessage('Post could not be created.');
    $postService->createPost($input);

  }

  public function testIdDoesNotExist() {
    $mock = $this->createMock(Curl::class);

    $input = ['aaa' => 1];

    $mock->method('post')->willReturn([201, json_encode($input)]);

    $postService = new PostService($mock);

    $this->expectException(RuntimeException::class);
    $this->expectExceptionMessage('An id of article could not be retrieved.');
    $postService->createPost($input);

  }
}