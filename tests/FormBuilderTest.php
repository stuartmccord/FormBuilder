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
        $collectiveFormBuilder = new \Collective\Html\FormBuilder($this->htmlBuilder, $this->urlGenerator, $this->viewFactory, 'abc');

        $this->formBuilder = new FormBuilder($collectiveFormBuilder, new \Stuartmccord\FormBuilder\Bulma\Renderer());
    }

    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    public function assertEqualHTML($expected, $given)
    {
        $expected = preg_replace('~>\s+<~', '><', $expected);
        $expected = trim($expected);

        $given = preg_replace('~>\s+<~', '><', $given);
        $given = trim($given);

        return $this->assertEquals($expected, $given);
    }

    /** @test */
    public function testTextField()
    {
        $text = $this->formBuilder->label('label text')->text('textinput')->placeholder('test placeholder');

        $expected = '
            <label class="label">label text</label>
            <p class="control">
                <input class="input" placeholder="test placeholder" name="textinput" type="text">
            </p>
        ';

        $this->assertEqualHTML(
            $expected,
            $text
        );
    }

    /** @test */
    public function testTextAreaField()
    {
        $textArea = $this->formBuilder->label('Message')->textarea('textareainput')->placeholder('Textarea placeholder');

        $expected = '
            <label class="label">Message</label>
            <p class="control">
                <textarea class="textarea" placeholder="Textarea placeholder" name="textareainput" cols="50" rows="10"></textarea>
            </p>
        ';

        $this->assertEqualHTML(
            $expected,
            $textArea
        );
    }

    /** @test */
    public function testRadioButton()
    {
        $radio = $this->formBuilder->label('Radio Label')->radio('question')->value(10)->checked();

        $expected = '
              <label class="radio">
              <input checked="checked" name="question" type="radio" value="10">Radio Label</label>
        ';

        $this->assertEqualHTML(
            $expected,
            $radio
        );
    }

    /** @test */
    public function testCheckbox()
    {
        $checkbox = $this->formBuilder->label('Remember me')->checkbox('remember')->value('test');

        $expected = '
            <p class="control">
                <label class="checkbox">
                    <input name="remember" type="checkbox" value="test">Remember me</label>
            </p>
        ';

        $this->assertEqualHTML(
            $expected,
            $checkbox
        );
    }

    /** @test */
    public function testSelect()
    {
        $select = $this->formBuilder->label('Subject')->value(2)->options([
            1 => 'Select dropdown',
            2 => 'With options'
        ])->select();

        $expected = '
            <label class="label">Subject</label>
            <p class="control">
                <span class="select">
                    <select>
                        <option value="1">Select dropdown</option>
                        <option value="2" selected="selected">With options</option>
                    </select>
                </span>
            </p>
        ';

        $this->assertEqualHTML(
            $expected,
            $select
        );
    }
}
