# FormBuilder
Fluent interface to [Laravel Collective's Formbuilder](https://github.com/LaravelCollective/html) with [Bulma](http://bulma.io) support

### Installation
To install the package run this from your project root:

    composer require stuartmccord/formbuilder

Now, add the Laravel collective provider to your `app/config.php` along with the one from this package:

    'providers' => [
        // ...
        Collective\Html\HtmlServiceProvider::class,
        Stuartmccord\FormBuilder\FormBuilderServiceProvider::class,
        // ...
    ],

You will also need to add the aliases to your `aliases` array:

    'aliases' => [
        // ...
            'Form' => Collective\Html\FormFacade::class,
            'Bulma' => Stuartmccord\FormBuilder\BulmaFormFacade::class,
            'Html' => Collective\Html\HtmlFacade::class, // optional
        // ...
    ],
    
### Usage
You can use the Bulma FormBuilder as follows:

    Form::label('foo')
        ->text('bar')
        ->placeholder('baz');
        
and provided you have included the Bulma styles it will render the following HTML:

    <label for="bar" class="label">foo</label>
    <p class="control">
        <input class="input" placeholder="baz" name="bar" type="text" id="bar">
    </p>

Other methods are available for other input types, (this is also where you set the name attribute).