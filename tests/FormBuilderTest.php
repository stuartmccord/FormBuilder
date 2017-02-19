<?php

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteCollection;
use Stuartmccord\FormBuilder\FormBuilder;

class FormBuilderTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->urlGenerator = new \Illuminate\Routing\UrlGenerator(new RouteCollection(), Request::create('/foo', 'GET'));
        $this->viewFactory = Mockery::mock(Factory::class);
        $this->htmlBuilder = new \Collective\Html\HtmlBuilder($this->urlGenerator, $this->viewFactory);
        $collectivFormBuilder = new \Collective\Html\FormBuilder($this->htmlBuilder, $this->urlGenerator, $this->viewFactory, 'abc');

        $this->formBuilder = new FormBuilder($collectivFormBuilder, new \Stuartmccord\FormBuilder\Bulma\Renderer());
    }

    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    /** @test */
    public function testTextField()
    {
        $text = $this->formBuilder->label('label text')->text('textinput');
        $textDocument = new DOMDocument($text);

        $expected = new DOMDocument('
            <label class="label">label text</label>
            <p class="control">
                <input class="input" name="textinput" type="text">
            </p>
            ');

        $this->assertEquals(
            $expected->saveHTML(),
            $textDocument->saveHTML()
        );
    }
}