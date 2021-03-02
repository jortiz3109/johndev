<?php

namespace Tests\Unit;

use App\Helpers\PostBodyHelper;
use Tests\TestCase;

class PostBodyHelperTest extends TestCase
{
    public function testItSanitizes()
    {
        $body = '<p class="css">Example paragraph</p>';
        $preparedBody = PostBodyHelper::prepare($body);

        $this->assertSame('<p>Example paragraph</p>', $preparedBody);
    }
}
