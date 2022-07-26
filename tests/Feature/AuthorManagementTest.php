<?php

namespace Tests\Feature;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
   /**
    * @test
    */
    
    public function an_author_can_be_created()
    {
        $this->withoutExceptionHandling();
        $this->post('/authors', [
            'name' => 'Author Name',
            'dob' => '08/29/1985',
        ]);
        //Asert that there is 1 record when I select all from the Author's table 
        //$this->assertCount(1, Author::all());

        $author = Author::all();

        $this->assertCount(1, $author);

        //check if the dob is carbon instance
        $this->assertInstanceOf(Carbon::class, $author->first()->dob); 
        //check if its a carbon instance but change the date format
        $this->assertEquals('1985/29/08', $author->first()->dob->format('Y/d/m'));

    }
}
